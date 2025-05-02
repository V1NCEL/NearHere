<?php
session_start();

if (isset($_SESSION["error"])) {
    echo "<p style='color: red; text-align: center;'>" . $_SESSION["error"] . "</p>";
    unset($_SESSION["error"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new ClassUserController();

    if (isset($_POST["login"])) {
        $user->login();
        echo __LINE__;
    } elseif (isset($_POST["logout"])) {
        $user->logout();
        echo __LINE__;
    } elseif (isset($_POST["register"])) {
        $user->register();
        echo __LINE__;
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

        $stmt = $this->conn->prepare("SELECT name, email FROM users WHERE name=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $row["name"];
            $_SESSION["email"] = $row["email"];

            $this->conn->close();
            header("Location: ../index.html");
            exit();
        } else {
            $_SESSION["logged"] = false;
            $_SESSION["error"] = "Invalid username or password.";
            $this->conn->close();
            header("Location: ../login.html");
            
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
            // Collect and sanitize inputs
            $name = $_POST['name'] ?? '';
            $surname = $_POST['surname'] ?? '';
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $pronouns = $_POST['pronouns'] ?? '';
            $phone = $_POST['pnumber'] ?? '';
            $socials = $_POST['socials'] ?? '';
        
            if ($password !== $confirmPassword) {
                $_SESSION["error"] = "Passwords do not match.";
                header("Location: ../register.html");
                exit();
            }
        
            // Handle profile picture upload
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
                    $_SESSION["error"] = "Profile picture upload failed.";
                    header("Location: ../register.html");
                    exit();
                }
            }
        
            // Insert user into database
            $stmt = $this->conn->prepare("INSERT INTO users (name, surname, username, email, password, pronouns, phone, socials, profile_pic) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $name, $surname, $username, $email, $password, $pronouns, $phone, $socials, $profilePicPath);
        
            if ($stmt->execute()) {
                $_SESSION["logged"] = true;
                $_SESSION["user"] = $username;
                $_SESSION["email"] = $email;
                header("Location: ../index.html");
            } else {
                $_SESSION["error"] = "Registration failed. Try again.";
                header("Location: ../register.html");
            }
        
            $this->conn->close();
            exit();
        }
        
    

    

    public function testConnection() {
        echo $this->conn ? "Connected successfully!" : "Connection failed!";
    }
}

?>