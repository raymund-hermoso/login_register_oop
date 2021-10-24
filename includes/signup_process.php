<?php
if(isset($_POST['submit'])) {

    //start session
    session_start();
    
    // Get Data in Field
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRpt = $_POST['passwordRpt'];

    // Instantiate Signup class
    include_once '../classes/Database.php';
    include_once '../classes/SignUp_Class.php';
    include_once '../classes/SignUp_Control.php';
    $signup = new Signup_Control($firstname, $middlename, $lastname, $email, $username, $password, $passwordRpt);

    // Error Handlers
    $signup->signupUser();

    // Homepage
    $_SESSION['msg'] = 'Account Created';
    header('location: ../index.php');

}