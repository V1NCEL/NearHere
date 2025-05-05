<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new ClassUserController();

    if (isset($_POST["login"])) {
        $user->login();
    } elseif (isset($_POST["logout"])) {
        $user->logout();
    } elseif (isset($_POST["register"])) {
        $user->register();
    }
}
class ClassUserController {

    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "NearHere";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }


    public function login(): void {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $stmt = $this->conn->prepare("SELECT name, email, password FROM users WHERE username=?");
        $stmt->bind_param("s", $username);  
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $row["name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION['image'] = $row['profile_picture'];

                $this->conn->close();
                header("Location: ../home_reg.php");
                exit();
            } else {
                $_SESSION["logged"] = false;
                $_SESSION['error'] = "Incorrect password";
                $this->conn->close();
                header("Location: ../login.php?error=Invalid+username+or+password");
                exit();
            }
        } else {
            $_SESSION["logged"] = false;
            $_SESSION['error'] = "User does not exist";
            $this->conn->close();

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
    
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $nameImage = $_FILES['image']['name'];
            $typeImage = $_FILES['image']['type'];
            $sizeImage = $_FILES['image']['size'];
    
            $target_dir = "../img/";
            $targetFile = $target_dir . basename($nameImage);
    
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
    
        if ($password !== $confirmPassword) {
            $_SESSION['error'] = "Passwords do not match";
            header("Location: ../registration.php");
            exit();
        }
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $stmt = $this->conn->prepare("INSERT INTO users (name, surname, username, email, password, pronouns, phone_number, socials, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $name, $surname, $username, $email, $hashedPassword, $pronouns, $phone_number, $socials, $nameImage);
    
        if ($stmt->execute()) {
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $username;
            $_SESSION["image"] = $nameImage;
            $stmt->close();
            header("Location: ../home_reg.php");
        } else {
            $_SESSION['error'] = "Registration failed. Username or email might already exist.";
            header("Location: ../registration.php");
        }
        
        exit();
    }
}


?>