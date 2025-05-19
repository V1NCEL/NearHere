<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event = new ClassEventController();

    if (isset($_POST["create"])) {
        $event->create();
    } elseif (isset($_POST["edit"])) {
        $event->edit();
    } elseif (isset($_POST["update"])) {
        $event->update();
    } elseif (isset($_POST["delete"])) {
        $event->delete();
    } elseif (isset($_POST["read"])) {
        //array
        $event->read();
    }
}
class ClassEventController {

    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "NearHere";
    
        try {
            $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
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

    public function read(): void {
        try {
            $stmt = $this->conn->prepare("SELECT event_id, event_name, description FROM eventos");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<table border="1" class="event-table">';
            echo '<thead><tr><th>ID</th><th>Event Name</th><th>Description</th><th>Actions</th></tr></thead>';
            echo '<tbody>';

            if (empty($results)) {
                echo '<tr><td colspan="4">No events found</td></tr>';
            } else {
                foreach ($results as $row) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['event_id']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['event_name']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['description']) . '</td>';
                    echo '<td class="actions">';
                    echo '<a href="?edit=' . $row['event_id'] . '" class="btn-edit">Edit</a> ';
                    echo '<a href="?delete=' . $row['event_id'] . '" class="btn-delete" onclick="return confirm(\'Are you sure?\')">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }

            echo '</tbody></table>';
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function calculateTotal() : int {

    }


}
?>