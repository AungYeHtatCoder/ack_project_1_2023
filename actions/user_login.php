<?php
session_start();
include('../db/functions.php'); // user_login function
$email = $_POST['email'];
$password = md5($_POST['password']);

$user = user_login($email, $password);

if($user){
 // store login session 
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['address'] = $user['address'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['profile'] = $user['profile'];
    header('location: ../profile.php');
}else{
 header('Location: ../login_form.php');
}