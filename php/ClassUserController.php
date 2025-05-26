<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new ClassUserController();

    if (isset($_POST["login"])) {
        $user->login();
    } elseif (isset($_POST["logout"])) {
        $user->logout();
    } elseif (isset($_POST["register"])) {
        $user->register();
    } elseif (isset($_POST["delete"])) {
        $user->delete();
    } elseif (isset($_POST["update"])) {
        $user->update();
    }
}

class ClassUserController {
    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "NearHere";

        try {
            $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function login(): void {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $this->conn->prepare("SELECT name, email, password, profile_picture FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $row["email"];
                $_SESSION['image'] = $row['profile_picture'];
                $this->conn = null;
                header("Location: ../home_reg.php");
                exit();
            } else {
                $_SESSION["logged"] = false;
                $_SESSION['error'] = "Incorrect password";
                $this->conn = null;
                header("Location: ../login.php?error=Invalid+username+or+password");
                exit();
            }
        } else {
            $_SESSION["logged"] = false;
            $_SESSION['error'] = "User does not exist";
            $this->conn = null;
            header("Location: ../login.php?error=Invalid+username+or+password");
            exit();
        }
    }

    public function logout(): void {
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }

    public function register(): void {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmpassword'];
        $pronouns = $_POST['pronouns'];
        $phone_number = $_POST['pnumber'];
        $socials = $_POST['socials'];
        $nameImage = 'default.png';

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = "Passwords do not match";
            header("Location: ../registration.php");
            exit();
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $nameImage = basename($_FILES['image']['name']);
            $typeImage = $_FILES['image']['type'];
            $sizeImage = $_FILES['image']['size'];
            $target_dir = "../img/";
            $targetFile = $target_dir . $nameImage;

            if ($sizeImage > 2000000) {
                $_SESSION['error'] = "File too large (max 2MB allowed)";
                header("Location: ../registration.php");
                exit();
            }

            $allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
            if (!in_array($typeImage, $allowedTypes)) {
                $_SESSION['error'] = "Only JPG, JPEG, PNG files are allowed";
                header("Location: ../registration.php");
                exit();
            }

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $_SESSION['error'] = "Failed to upload image";
                header("Location: ../registration.php");
                exit();
            }
        }

        $checkStmt = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username OR email = :email");
        $checkStmt->bindParam(':username', $username);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();
        if ($checkStmt->fetchColumn() > 0) {
            $_SESSION['error'] = "Username or email already exists.";
            header("Location: ../registration.php");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO users 
            (name, surname, username, email, password, pronouns, phone_number, socials, profile_picture) 
            VALUES (:name, :surname, :username, :email, :password, :pronouns, :phone, :socials, :image)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':pronouns', $pronouns);
        $stmt->bindParam(':phone', $phone_number);
        $stmt->bindParam(':socials', $socials);
        $stmt->bindParam(':image', $nameImage);
 
        if ($stmt->execute()) {
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $username;
            $_SESSION["image"] = $nameImage;
            $this->conn = null;
            header("Location: ../home_reg.php");
            exit();
        } else {
            $_SESSION['error'] = "Registration failed.";
            header("Location: ../registration.php");
            exit();
        }
    }

    public function delete(): void {
        $username = $_SESSION['username'];

        try {
            $stmt = $this->conn->prepare("DELETE FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);

            if ($stmt->execute()) {
                session_unset();
                session_destroy();
                header("Location:  ../index.php");
                exit();
            } else {
                $_SESSION['error'] = "Failed to delete account.";
                header("Location: ../profile.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            header("Location: ../profile.php");
            exit(); 
        }
    }
    public function update(): void {
    
        $username = $_SESSION['username'];
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone_number = $_POST['pnumber'] ?? '';
        $pronouns = $_POST['pronouns'] ?? '';
        $socials = $_POST['socials'] ?? '';
        $profile_picture = $_SESSION['image'] ?? 'default.png';
    
      
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $nameImage = basename($_FILES['image']['name']);
            $typeImage = $_FILES['image']['type'];
            $sizeImage = $_FILES['image']['size'];
            $target_dir = "../img/";
            $targetFile = $target_dir . $nameImage;

            if ($sizeImage > 2000000) {
                $_SESSION['error'] = "File too large (max 2MB allowed)";
                header("Location: ../profile.php");
                exit();
            }

            $allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
            if (!in_array($typeImage, $allowedTypes)) {
                $_SESSION['error'] = "Only JPG, JPEG, PNG files are allowed";
                header("Location: ../profile.php");
                exit();
            }

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $_SESSION['error'] = "Failed to upload image";
                header("Location: ../profile.php");
                exit();
            }
        }
    
        $stmt = $this->conn->prepare("UPDATE users SET 
            name = :name, 
            surname = :surname, 
            email = :email, 
            phone_number = :phone, 
            pronouns = :pronouns, 
            socials = :socials, 
            profile_picture = :image 
            WHERE username = :username");
    
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone_number);
        $stmt->bindParam(':pronouns', $pronouns);
        $stmt->bindParam(':socials', $socials);
        $stmt->bindParam(':image', $profile_picture);
        $stmt->bindParam(':username', $username);
    
        if ($stmt->execute()) {
            $_SESSION["image"] = $profile_picture;
            $_SESSION['success'] = "Profile updated successfully.";
            header("Location: ../profile.php");
            exit();
        } else {
            $_SESSION['error'] = "Failed to update profile.";
            header("Location: ../profile.php");
            exit();
        }
    }
    
}
?>
