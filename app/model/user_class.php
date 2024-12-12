<?php
require_once(__DIR__ . '/model.php');
class User extends Model {

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    // Sign up 
     function signUp($name, $email, $password, $confirmPassword) {
        if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
            return "All fields are required.";
        }

        if ($password !== $confirmPassword) {
            return "Passwords do not match.";
        }

        // Check for duplicate email
        $query = "SELECT * FROM tb_user WHERE email = ? AND password=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $email,$password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return "Email is already taken.";
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert new user into the database with hashed password
        $query = "INSERT INTO tb_user (name, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            return "Signup successful.";
        } else {
            return "Error occurred during signup.";
        }
    }

    // Sign in 
     function signIn($username, $password) {
        if (empty($username) || empty($password)) {
            return "Both fields are required.";
        }

        $query = "SELECT * FROM tb_user WHERE name = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify password using password_verify()
            if ( $user['password']) {
                session_start();
                $_SESSION["username"] = $user['name'];
                return "Login successful.";
            } else {
                return "Invalid password.";
            }
        } else {
            return "Invalid username.";
        }
    }      
    }


?>
