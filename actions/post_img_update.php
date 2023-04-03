<?php
include('../db/functions.php');
if(isset($_POST['post_img_update'])) {
    $id = $_POST['id'];
    $file_name = $_FILES['post_img']['name'];
    $file_tmp = $_FILES['post_img']['tmp_name'];
    $file_size = $_FILES['post_img']['size'];
    $file_errors = $_FILES['post_img']['error'];
    $type = $_FILES['post_img']['type'];

    if($file_errors == 0) {
        if(($type == 'image/jpeg' || $type == 'image/png') && $file_size <= 5242880) { // limit file size to 5 MB
            $image = time() . '_' . $file_name;
            if(post_img_update($id, $image)) {
                move_uploaded_file($file_tmp, 'post_photo/' . $image);
                header('Location: ../post_index.php');
                exit();
            } else {
                echo "Post Image Update Failed";
            }
        } else {
            echo "File type is not supported or file size is too large (maximum 5 MB)";
        }
    } else {
        echo "File upload error";
    }
}