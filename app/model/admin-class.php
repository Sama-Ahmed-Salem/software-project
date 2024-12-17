<?php
require_once(__DIR__ . '/model.php');
class Admin extends Model {

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }
}
?>