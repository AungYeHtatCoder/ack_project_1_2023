<?php 
include('../db/functions.php');
$id = $_POST['id'];
$data = [
 //'id' => $_POST['id'],
 'categoy_id' => $_POST['category_id'],
 // post_title with real_ecape_string
 'post_title' => mysqli_real_escape_string($conn, $_POST['post_title']),
 // description with real_ecape_string
 'description' => mysqli_real_escape_string($conn, $_POST['description']),

];

if(post_update($id, $data)){
 header('location: ../post_index.php');
}else{
 echo "Post Update Failed";
}