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
        $event_name = $_POST['event_name'];
        $description = $_POST['description'];
        $event_date = $_POST['event_date'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $tickets_available = $_POST['tickets_available'];
        $ticket_price = $_POST['ticket_price'];
        $location = $_POST['location'];
        $main_event_picture = 'default.png';


        if (isset($_FILES['main_event_picture']) && $_FILES['main_event_picture']['error'] === UPLOAD_ERR_OK) {
            $nameImage = basename($_FILES['main_event_picture']['name']);
            $typeImage = $_FILES['main_event_picture']['type'];
            $sizeImage = $_FILES['main_event_picture']['size'];
            $target_dir = "../img/";
            $targetFile = $target_dir . $nameImage;
        
            if ($sizeImage > 2000000) {
                $_SESSION['error'] = "File too large (max 2MB allowed)";
                header("Location: ../create-event.php");
                exit();
            }
        
            $allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
            if (!in_array($typeImage, $allowedTypes)) {
                $_SESSION['error'] = "Only JPG, JPEG, PNG files are allowed";
                header("Location: ../create-event.php");
                exit();
            }
        
            if (!move_uploaded_file($_FILES['main_event_picture']['tmp_name'], $targetFile)) {
                $_SESSION['error'] = "Failed to upload image";
                header("Location: ../create-event.php");
                exit();
            }
        
            $main_event_picture = $nameImage;
        }
        

        $stmt = $this->conn->prepare("INSERT INTO events 
        (event_name, description, event_date, start_time, end_time, ticket_price, location, main_event_picture, tickets_available) 
        VALUES (:event_name, :description, :event_date, :start_time, :end_time, :ticket_price, :location, :main_event_picture, :tickets_available)");

                
        $stmt->bindParam(':event_name', $event_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':event_date', $event_date);
        $stmt->bindParam(':start_time', $start_time);
        $stmt->bindParam(':end_time', $end_time);
        $stmt->bindParam(':ticket_price', $ticket_price);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':main_event_picture', $main_event_picture);
        $stmt->bindParam(':tickets_available', $tickets_available);

        if ($stmt->execute()) {
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $event_name;
            $_SESSION["image"] = $main_event_picture;
            $this->conn = null;
            header("Location: ../profile.php");
            exit();
        } else {
            $_SESSION['error'] = "Registration failed.";
            header("Location: ../create-event.php");
            exit();
        }
    }

    public function edit() : void {
        
    }

    public function update() : void {

    }

    public function delete() : void { 

    }

    public function read(): void {
        try {
            $stmt = $this->conn->prepare("SELECT event_id, event_name, description, event_date, start_time, end_time, ticket_price, location, main_event_picture, tickets_available FROM events");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<table border="1" class="event-table">';
            echo '<thead><tr><th>ID</th><th>Event Name</th><th>Description</th><th>Event Date</th><th>Start Time</th><th>End Time</th><th>Ticket Price</th><th>Location</th><th>Event Picture</th><th>Tickets Available</th></tr></thead>';
            echo '<tbody>';

            if (empty($results)) {
                echo '<tr><td colspan="4">No events found</td></tr>';
            } else {
                foreach ($results as $row) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['event_id']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['event_name']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['description']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['event_date']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['start_time']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['end_time']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['ticket_price']) . ' € ' . '</td>';
                    echo '<td>' . htmlspecialchars($row['location']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['main_event_picture']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['tickets_available']) . '</td>';
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

    public function getEvents(): array {
        try {
            $stmt = $this->conn->prepare("SELECT event_id, event_name, description, event_date, start_time, end_time, ticket_price, location, main_event_picture, tickets_available FROM events");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $events = [];
    
            foreach ($results as $row) {
                $eventName = $row['event_name'];
    
                $events[$eventName] = [
                    'quantity' => $row['tickets_available'], 
                    'price' => $row['ticket_price'],
                    'cost' => $row['ticket_price'] * $row['tickets_available'], 
                    'event_id' => $row['event_id'],
                    'description' => $row['description'],
                    'event_date' => $row['event_date'],
                    'start_time' => $row['start_time'],
                    'end_time' => $row['end_time'],
                    'location' => $row['location'],
                    'main_event_picture' => $row['main_event_picture']
                ];
            }
    
            return $events;
    
        } catch (PDOException $e) {
            return [];
        }
    }
    

    public function calculateTotal() : int {

    }


}
?>