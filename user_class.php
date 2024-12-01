<?php
class User {
    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    // Sign up 
    public function signUp($name, $email, $password, $confirmPassword) {
        if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
            return "All fields are required.";
        }

        if ($password !== $confirmPassword) {
            return "Passwords do not match.";
        }

        // Check for duplicate email
        $query = "SELECT * FROM tb_user WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return "Email is already taken.";
        }

        
        $query = "INSERT INTO tb_user (name, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            return "Signup successful.";
        } else {
            return "Error occurred during signup.";
        }
    }

    // Sign in 
    public function signIn($username, $password) {
        if (empty($username) || empty($password)) {
            return "Both fields are required.";
        }

        $query = "SELECT * FROM tb_user WHERE name = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            session_start();
            $_SESSION["username"] = $user['name'];
            return "Login successful.";
        } else {
            return "Invalid username or password.";
        }
    }
}
?>
