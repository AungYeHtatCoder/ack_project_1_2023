<?php 
session_start();
include('db/functions.php');
$id = $_GET['id'];
$posts = get_post_by_id($id);
// echo "<pre>";
// print_r($posts);
// echo "</pre>";
// die();
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
    <div class="card">
     <div class="card-header">
      <h2 class="card-title">Post Detail</h2>
     </div>
     <div class="card-body">
      <table class="table">
       <tr>
        <th>ID</th>
        <td><?= $posts['id']?></td>
       </tr>
       <tr>
        <th>Post Title</th>
        <td><?= $posts['post_title']?></td>
       </tr>
       <tr>
        <th>Description</th>
        <td><?= $posts['description']?></td>
       </tr>

       <tr>
        <th>IMG</th>
        <td>
         <img src="actions/post_photo/<?= $posts['post_img']; ?>" alt="" width="100px">
         <span>
          <!-- post_img update form -->
          <form action="actions/post_img_update.php" method="post" enctype="multipart/form-data">
           <input type="hidden" name="id" value="<?= $posts['id']; ?>">
           <input type="file" name="post_img" class="form-control">
           <button type="submit" name="post_img_update" class="btn btn-primary btn-sm">Update</button>
          </form>
         </span>
        </td>
       </tr>
       <tr>
        <th>PStatus</th>
        <td>
         <!-- post_status with badge  Active / anactive-->
         <?php
          if ($posts['post_status'] == 'Active'):
          ?>
         <span class="badge bg-success"><?= $posts['post_status']; ?></span>
         <span>
          <!-- post_status update form -->
          <form action="actions/post_status_update.php" method="post">
           <input type="hidden" name="id" value="<?= $posts['id']; ?>">
           <input type="hidden" name="post_status" value="InActive">
           <button type="submit" name="post_status_update" class="btn btn-primary btn-sm">InActive</button>
          </form>
         </span>
         <?php
          else:
          ?>
         <span class="badge bg-danger"><?= $posts['post_status']; ?></span>
         <span>
          <!-- post_status update form -->
          <form action="actions/post_status_update.php" method="post">
           <input type="hidden" name="id" value="<?= $posts['id']; ?>">
           <input type="hidden" name="post_status" value="Active">
           <button type="submit" name="post_status_update" class="btn btn-primary btn-sm">Active</button>
          </form>
         </span>
         <?php
          endif;
          ?>
        </td>
       </tr>
       <tr>
        <th>Action</th>
        <td>
         <a href="post_edit.php?id=<?= $posts['id']?>" class="btn btn-primary">Edit</a>
         <a href="actions/post_delete.php?id=<?= $posts['id']?>" class="btn btn-danger">Delete</a>
        </td>
       </tr>
       <tr>
        <th>Created At</th>
        <td><?= $posts['created_at']?></td>

       </tr>
       <tr>
        <th>Updated At</th>
        <td><?= $posts['updated_at']?></td>
       </tr>
      </table>
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