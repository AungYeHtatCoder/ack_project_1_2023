<?php 
session_start();
include('../db/functions.php');
if(isset($_POST['post_status_update'])){
 $id = $_POST['id'];
$status = $_POST['post_status'];
if(post_status_update($id, $status)){
    $_SESSION['success'] = "Post status updated successfully";
    header('location: ../post_index.php');
}else{
 echo "Error";
}
}