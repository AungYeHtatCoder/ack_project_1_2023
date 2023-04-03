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
    <div class="card">
     <div class="card-header">
      <h2 class="card-title">Register</h2>
     </div>
     <div class="card-body">
      <form action="actions/user_create.php" method="post">
       <!-- user_name -->
       <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" name="user_name" id="user_name" class="form-control">
       </div>
       <!-- email -->
       <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
       </div>
       <!-- password -->
       <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
       </div>
       <!-- phone -->
       <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control">
       </div>
       <!-- address -->
       <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control">
       </div>
       <!-- submit button -->
       <div class="form-group mt-5">
        <input type="submit" name="user_create" value="Register" class="btn btn-primary">
       </div>
      </form>
     </div>
    </div>
   </div>
   <!-- Side widgets-->
   <div class="col-lg-4">
    <!-- Search widget-->

   </div>
  </div>
 </div>
 <!-- Footer-->
 <?php include('layouts/footer.php'); ?>