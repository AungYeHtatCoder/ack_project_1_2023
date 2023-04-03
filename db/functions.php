<?php
include('db_con.php');

// user create function -> user table column -> user_name, email, password, phone, address 
function UserCreate($user_name, $email, $password, $phone, $address){
    global $conn;
    $sql = "INSERT INTO users (user_name, email, password, phone, address) VALUES ('$user_name', '$email', '$password', '$phone', '$address')";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}


function user_login($email, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}


// user logout function
function user_logout(){
    session_start();
    session_destroy();
    header('location: ../login_form.php');
} 

// user profile only update function
function profile_update($id, $profile)
{
    global $conn;
    $sql = "UPDATE users SET profile = '$profile' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

// create category function
function category_create($category_name){
    global $conn;
    $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

// category index function
function category_index(){
    global $conn;
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }else{
        return false;
    }
}

// category by id function
function category_by_id($id){
    global $conn;
    $sql = "SELECT * FROM categories WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        return $row;
    }else{
        return false;
    }
}

// category update function
function category_update($id, $category_name){
    global $conn;
    $sql = "UPDATE categories SET category_name = '$category_name' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

// category delete function
function category_delete($id){
    global $conn;
    $sql = "DELETE FROM categories WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

// PostCreate function
function PostCreate($data){
    global $conn;
    $category_id = $data['category_id'];
    $user_id = $data['user_id'];
    $title = $data['post_title'];
    $description = $data['description'];
    $image = $data['post_img'];
    $status = $data['post_status'];
    $sql = "INSERT INTO posts (category_id, user_id, post_title, description, post_img, post_status) VALUES ('$category_id', '$user_id', '$title', '$description', '$image', '$status')
";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}


// get all post function with category name and user name
function get_all_post(){
    global $conn;
    $sql = "SELECT posts.*, categories.category_name, users.user_name FROM posts LEFT JOIN categories ON posts.category_id = categories.id LEFT JOIN users ON posts.user_id = users.id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }else{
        return false;
    }
}

// post_status_update function
function post_status_update($id, $status){
    global $conn;
    $sql = "UPDATE posts SET post_status = '$status' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

// get post by id function
function get_post_by_id($id){
    global $conn;
    $sql = "SELECT * FROM posts WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        return $row;
    }else{
        return false;
    }
}

// get post by users table and categories join
function get_post_by_user_id($id){
    global $conn;
    $sql = "SELECT posts.*, categories.category_name, users.user_name, users.profile FROM posts LEFT JOIN categories ON posts.category_id = categories.id LEFT JOIN users ON posts.user_id = users.id WHERE posts.user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        return $row;
    }else{
        return false;
    }
}


// post update function category_id, post_title, description 
function post_update($id, $data){
    global $conn;
    $category_id = $data['category_id'];
    $title = $data['post_title'];
    $description = $data['description'];
    // $image = $data['post_img'];
    // $status = $data['post_status'];
    $sql = "UPDATE posts SET category_id = '$category_id', post_title = '$title', description = '$description' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

// post_img update function
// function post_img_update($id, $image){
//     global $conn;
//     $sql = "UPDATE posts SET post_img = '$image' WHERE id = '$id'";
//     $result = mysqli_query($conn, $sql);
//     if($result){
//         return true;
//     }else{
//         return false;
//     }
// }

function post_img_update($id, $image){
    global $conn;
    $sql = "UPDATE posts SET post_img = '$image' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

// post delete function
function post_delete($id){
    global $conn;
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}