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

public function login()
{
  $username=$_REQUEST['username'];
  $password=$_REQUEST['password'];
  $this->model->signIn($username,$password);
}

public function rating()
{
  $username=$_REQUEST['username'];
  $feedback=$_REQUEST['feedback'];
  $this->model->submitFeedback($username,$feedback);
}

}
?>