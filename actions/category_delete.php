<?php 
include('../db/functions.php');

// category delete
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category_delete = category_delete($id);
    if($category_delete){
        header('location: ../category_index.php');
    }else{
        echo "Category Delete Failed";
    }
}