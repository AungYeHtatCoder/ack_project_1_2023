<?php
include('../db/functions.php');

if(isset($_POST['create_category'])){
    $category_name = $_POST['category_name'];
    $category_create = category_create($category_name);
    if($category_create){
        header('location: ../category_index.php');
    }else{
        echo "Category Create Failed";
    }
}