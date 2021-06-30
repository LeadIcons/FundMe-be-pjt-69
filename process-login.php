<?php
session_start();
require_once('app/AuthenticateUser.php');
require_once('helpers/function.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $auth = new AuthenticateUser;

    $auth_user = $auth->authenticate($_POST['email'], $_POST['password']);

    if($auth_user == true) {

        redirect('index.php');

    } else if($auth_user == false) {

        $_SESSION['error'] = $auth->hasError;
        
        redirect('login.php');
    }
}