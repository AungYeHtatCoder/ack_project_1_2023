<?php 
include('../db/functions.php');

// post delete
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = post_delete($id);
    if($post){
        header('location: ../post_index.php');
    }else{
        echo "Post Delete Failed";
    }
}