<?php
session_start();
include('../db/functions.php');

$file_name = $_FILES['profile']['name'];
$file_tmp = $_FILES['profile']['tmp_name'];
$errors = $_FILES['profile']['error'];
$type = $_FILES['profile']['type'];

if(isset($_POST['profile_update'])){
 $id = $_POST['id'];
 $profile = $file_name;
 $result = profile_update($id, $profile);
 if($result){
  move_uploaded_file($file_tmp, 'profile/'.$file_name);
  header('location: ../profile.php');
 }else{
  echo "Profile update failed";
 }
 
}