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
      <h2 class="card-title">CategoryUpdate</h2>
     </div>
     <div class="card-body">
      <?php 
      include('db/functions.php');
      $id = $_GET['id'];
      $category = category_by_id($id);
      ?>
      <form action="actions/category_update.php" method="post">
       <input type="hidden" name="id" value="<?= $id; ?>">
       <div class="form-group">
        <label for="category_name">CategoryName</label>
        <input type="text" name="category_name" id="category_name" class="form-control"
         value="<?= $category['category_name']; ?>">
       </div>
       <div class="form-group mt-5">
        <input type="submit" name="update_category" value="Category Update" class="btn btn-primary">
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