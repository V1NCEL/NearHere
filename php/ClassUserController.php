<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


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
    
                $this->conn->close();
                header("Location: ../home_reg.html");
                exit();
            } else {
                $_SESSION["logged"] = false;
                $this->conn->close();
                header("Location: ../login.html?error=Invalid+username+or+password");
                exit();
            }
        } else {
            $_SESSION["logged"] = false;
            $this->conn->close();
            header("Location: ../login.html?error=Invalid+username+or+password");
            exit();
        }
    }
    

    public function logout(): void {
        session_unset();
        session_destroy();
        header("Location: ../index.html");
        exit();
    }

    public function register() {
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirmpassword'] ?? '';
        $pronouns = $_POST['pronouns'] ?? '';
        $phone_number = $_POST['pnumber'] ?? '';
        $socials = $_POST['socials'] ?? '';
        
        if ($password !== $confirmPassword) {
            header("Location: ../register.html?error=Passwords+do+not+match");
            exit();
        }
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $profilePicPath = '';
        if (isset($_FILES['pfp']) && $_FILES['pfp']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = '../uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            $fileName = basename($_FILES['pfp']['name']);
            $targetFile = $uploadDir . uniqid() . "_" . $fileName;
    
            if (move_uploaded_file($_FILES['pfp']['tmp_name'], $targetFile)) {
                $profilePicPath = $targetFile;
            } else {
                header("Location: ../register.html?error=Profile+picture+upload+failed");
                exit();
            }
        }
    
        $stmt = $this->conn->prepare("INSERT INTO users (name, surname, username, email, password, pronouns, phone_number, socials, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $name, $surname, $username, $email, $hashedPassword, $pronouns, $phone_number, $socials, $profilePicPath);
    
        if ($stmt->execute()) {
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $username;
            $_SESSION["password"] = $hashedPassword;
            header("Location: ../home_reg.html");
        } else {
            header("Location: ../register.html?error=Registration+failed.+Try+again");
        }
    
        $this->conn->close();
        exit();
    }
}

?>