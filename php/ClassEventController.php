<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new ClassEventController();

    if (isset($_POST["add"])) {
        $user->login();
    } elseif (isset($_POST["edit"])) {
        $user->logout();
    } elseif (isset($_POST["update"])) {
        $user->register();
    } elseif (isset($_POST["delete"])) {
        $user->register();
    } elseif (isset($_POST["total"])) {
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

    public function create() : void{

    }

    public function edit() : void {
        
    }

    public function update() : void {

    }

    public function delete() : void {

    }

    public function calculateTotal() : int {

    }


}
