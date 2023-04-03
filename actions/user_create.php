<?php 
include('../db\functions.php');

// $data = array(
//     'user_name' => $_POST['user_name'],
//     'email' => $_POST['email'],
//     'password' => $_POST['password'],
//     'phone' => $_POST['phone'],
//     'address' => $_POST['address']
// );

// echo "<pre>";
// print_r($data);
// echo "</pre>";

if(isset($_POST['user_create'])){
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $result = UserCreate($user_name, $email, $password, $phone, $address);
    if($result){
        //echo "User created successfully";
        header('location: ../login_form.php');
    }else{
        echo "User create failed";
    }
}