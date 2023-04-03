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
      <h2 class="card-title">Category</h2>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>ID</th>
         <th>CategoryName</th>
         <th>Action</th>
        </tr>
       </thead>
       <tbody>
        <?php
        include('db/functions.php');
        $categories = category_index();
        if ($categories) :
         foreach ($categories as $category) :
        ?>
        <tr>
         <td><?= $category['id']; ?></td>
         <td><?= $category['category_name']; ?></td>
         <td>
          <a href="category_edit.php?id=<?= $category['id']; ?>" class="btn btn-primary">Edit</a>
          <a href="actions/category_delete.php?id=<?= $category['id']; ?>" class="btn btn-danger">Delete</a>
        </tr>
        <?php 
        endforeach;
        endif;
        ?>
       </tbody>
      </table>
     </div>
    </div>

   </div>
   <!-- Side widgets-->
   <div class="col-lg-4">
    <!-- Search widget-->
    <div class="card">
     <div class="card-header">
      <h2 class="card-title">CategoryCreate</h2>
     </div>
     <div class="card-body">
      <form action="actions/category_create.php" method="post">
       <div class="form-group">
        <label for="category_name">CategoryName</label>
        <input type="text" name="category_name" id="category_name" class="form-control">
       </div>
       <div class="form-group mt-5">
        <input type="submit" name="create_category" value="Create" class="btn btn-primary">
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Footer-->
 <?php include('layouts/footer.php'); ?>