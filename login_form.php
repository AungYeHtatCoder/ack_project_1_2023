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
      <h2 class="card-title">User Login</h2>
     </div>
     <div class="card-body">
      <form action="actions/user_login.php" method="post">

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

       <!-- submit button -->
       <div class="form-group mt-5">
        <input type="submit" name="login" value="User Login" class="btn btn-primary">
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