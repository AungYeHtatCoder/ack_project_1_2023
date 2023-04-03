<?php 
session_start();
include('db/functions.php');

if(!isset($_SESSION['id'])){
    header('location: login_form.php');
}else{
    $id = $_SESSION['id'];
    
}

$posts = get_all_post();
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
      <h2 class="card-title">Post List</h2>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>ID</th>
         <th>PostTitle</th>
         <th>Description</th>
         <th>IMG</th>
         <th>PStatus</th>
         <th>Action</th>
        </tr>
       </thead>
       <tbody>
        <tr>
         <?php 
         if($posts) :
         foreach($posts as $post) :?>
         <td><?= $post['id']; ?></td>
         <td><?= $post['post_title']; ?></td>
         <td>
          <?php
          $description = $post['description'];
          $description = substr($description, 0, 20);
          echo $description;
          ?>
         </td>
         <td>
          <img src="actions/post_photo/<?= $post['post_img']; ?>" alt="" width="100px">
          <span>
           <!-- post_img update form -->
           <form action="actions/post_img_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $post['id']; ?>">
            <input type="file" name="post_img" class="form-control">
            <button type="submit" name="post_img_update" class="btn btn-primary btn-sm">Update</button>
           </form>
          </span>
         </td>
         <td>
          <!-- post_status with badge  Active / anactive-->
          <?php
          if ($post['post_status'] == 'Active'):
          ?>
          <span class="badge bg-success"><?= $post['post_status']; ?></span>
          <span>
           <!-- post_status update form -->
           <form action="actions/post_status_update.php" method="post">
            <input type="hidden" name="id" value="<?= $post['id']; ?>">
            <input type="hidden" name="post_status" value="InActive">
            <button type="submit" name="post_status_update" class="btn btn-primary btn-sm">InActive</button>
           </form>
          </span>
          <?php
          else:
          ?>
          <span class="badge bg-danger"><?= $post['post_status']; ?></span>
          <span>
           <!-- post_status update form -->
           <form action="actions/post_status_update.php" method="post">
            <input type="hidden" name="id" value="<?= $post['id']; ?>">
            <input type="hidden" name="post_status" value="Active">
            <button type="submit" name="post_status_update" class="btn btn-primary btn-sm">Active</button>
           </form>
          </span>
          <?php
          endif;
          ?>
         </td>
         <td>
          <a href="post_edit.php?id=<?= $post['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
          <a href="post_detail.php?id=<?= $post['id']; ?>" class="btn btn-success btn-sm">Detail</a>
          <a href="actions/post_delete.php?id=<?= $post['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
         </td>
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
    <div class="card">
     <div class="card-header">
      <h1>Post Create</h1>
     </div>
     <div class="card-body">
      <form action="actions/post_create.php" method="post" enctype="multipart/form-data">

       <div class="mb-3">
        <!-- category_id options -->
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
         <option selected>select Category</option>
         <?php
        //include('db/functions.php');
        $categories = category_index();
        if ($categories) :
         foreach ($categories as $category) :
        ?>
         <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
         <?php
         endforeach;
         endif;
         ?>
        </select>
       </div>
       <div class="mb-3">
        <label for="postTitle" class="form-label">Post Title</label>
        <input type="text" class="form-control" id="postTitle" name="post_title" placeholder="Post Title">
       </div>
       <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
       </div>
       <div class="mb-3">
        <label for="img" class="form-label">Image</label>
        <input class="form-control" type="file" id="img" name="post_img">
       </div>
       <div class="mb-3">
        <label for="pStatus" class="form-label">Post Status</label>
        <select class="form-select" aria-label="Default select example" id="pStatus" name="post_status">
         <option selected>Select Post Status</option>
         <option value="Active">Active</option>
         <option value="Inactive">Inactive</option>
        </select>
       </div>
       <button type="submit" name="post_create" class="btn btn-primary">Submit</button>
      </form>
     </div>
    </div>

   </div>
  </div>
 </div>
 <!-- Footer-->
 <?php include('layouts/footer.php'); ?>