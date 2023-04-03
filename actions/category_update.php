<?php
include('../db/functions.php');

if(isset($_POST['update_category'])){
    $id = $_POST['id'];
    $category_name = $_POST['category_name'];
    $category_update = category_update($id, $category_name);
    if($category_update){
        header('location: ../category_index.php');
    }else{
        echo "Category Create Failed";
    }
}