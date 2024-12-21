<?php
require_once(__DIR__ . '/model.php');
class Admin extends Model {

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

// Function to retrieve name, email, and feedback from tb_user table
public function retrieveUsers() {
    $query = "SELECT name, email, feedback FROM tb_user";
    $result = $this->conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch all results as an associative array
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users; // Return the array of users
    } else {
        return []; // Return an empty array if no users found
    }
}


}
?>