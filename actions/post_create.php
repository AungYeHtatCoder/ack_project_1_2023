<?php 
session_start();
include('../db/functions.php');
$id = $_SESSION['id'];
$file_name = $_FILES['post_img']['name'];
$tmp = $_FILES['post_img']['tmp_name'];
$error = $_FILES['post_img']['error'];
$type = $_FILES['post_img']['type'];

$data = [
    'category_id' => $_POST['category_id'],
    'user_id' => $id,
    'post_title' => mysqli_real_escape_string($conn, $_POST['post_title']),
    'description' => mysqli_real_escape_string($conn, $_POST['description']),
    'post_img' => $file_name,
    'post_status' => $_POST['post_status'],
];


// echo "<pre>";
// print_r($data);
// echo "</pre>";

if($error == 0){
    $file_name = time().$file_name;
    $destination = 'post_photo/'.$file_name;
    move_uploaded_file($tmp, $destination);
    $data['post_img'] = $file_name;
}

if(PostCreate($data)){
    $_SESSION['success'] = "Post created successfully";
    header('location: ../post_index.php');
}else{
 echo "Error";
}