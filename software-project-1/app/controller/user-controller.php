<?php
require_once("../controller/Controller.php");
class UserController extends Controller{
public function Register()
{
  $name=$_REQUEST['name'];
  $email=$_REQUEST['email'];
  $password=$_REQUEST['password'];
  $confirmPassword=$_REQUEST['confirmPassword'];
  $this->model->signUp($name,$email,$password,$confirmPassword);
}

public function login() {
  if (isset($_POST['username'], $_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      // Call the model to handle login
      $loginMessage = $this->model->signIn($username, $password);
      
      if ($loginMessage === "Login successful.") {
          // Redirect to the profile page after successful login
          header("Location: profile.php");
          exit;
      } else {
          // Show login error message
          echo "<script>alert('$loginMessage');</script>";
      }
  }
}


public function rating()
{
  $username=$_REQUEST['username'];
  $feedback=$_REQUEST['feedback'];
  $this->model->submitFeedback($username,$feedback);
}

}
?>