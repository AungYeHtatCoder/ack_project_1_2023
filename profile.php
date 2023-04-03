<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location: ../login_form.php');
}elseif(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
}else{
    header('location: ../login_form.php');
}
$email_session = $_SESSION['email'];
$password_session = $_SESSION['password'];

$user_name = $_SESSION['user_name'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];
$profile = $_SESSION['profile'];
$id = $_SESSION['id'];
$email = $_SESSION['email'];

?>
<?php include('layouts/head.php'); ?>

<body>
 <!-- Responsive navbar-->
 <?php include('layouts/navbar.php'); ?>
 <!-- Page content-->
 <div class="container">
  <div class="row">
   <!-- Blog entries-->
   <div class="col-lg-8">
    <!-- Featured blog post-->

    <table class="table">
     <tr>
      <th>Profile</th>
      <td>
       <img src="actions/profile/<?= $profile; ?>" width="200px" height="200px" alt="">
      </td>
     </tr>
     <tr>
      <th>ID</th>
      <td><?= $id; ?></td>
     </tr>
     <tr>
      <th>User Name</th>
      <td><?= $user_name; ?></td>
     </tr>
     <tr>
      <th>Email</th>
      <td><?= $email; ?></td>
     </tr>
     <tr>
      <th>Phone</th>
      <td><?= $phone; ?></td>
     </tr>
     <tr>
      <th>Address</th>
      <td><?= $address; ?></td>
     </tr>
    </table>

   </div>
   <!-- Side widgets-->
   <div class="col-lg-4">
    <!-- Search widget-->
    <div class="card">
     <div class="card-header">
      <h4 class="card-title">Profile Update</h4>
     </div>
     <div class="card-body">
      <!-- profile update form -->
      <form action="actions/profile_update.php" enctype="multipart/form-data" method="post">
       <input type="hidden" name="id" value="<?= $id; ?>">
       <div class="form-group">
        <input type="file" name="profile" class="form-control">
       </div>

       <div class="form-group mt-5">
        <input type="submit" name="profile_update" value="UpdateProfile" class="btn btn-primary">
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Footer-->
 <?php include('layouts/footer.php'); ?>