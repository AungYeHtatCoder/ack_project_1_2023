<?php 
include('db/functions.php');
// if(isset($_GET['id'])){
//     $id = $_GET['id'];
//     $post = get_post_by_id($id);
//     // echo "<pre>";
    // print_r($post);
    // echo "</pre>";
    // die();
// }else{
//     header('location: post_index.php');
// }

$id = $_GET['id'];
$post = get_post_by_id($id);

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
      <h1>Post Create</h1>
     </div>
     <div class="card-body">
      <form action="actions/post_update.php" method="post">
       <input type="hidden" name="id" value="<?= $id; ?>">
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
         <option value="<?= $category['id']; ?>" selected><?= $category['category_name']; ?></option>
         <?php
         endforeach;
         endif;
         ?>
        </select>
       </div>
       <div class="mb-3">
        <label for="postTitle" class="form-label">Post Title</label>
        <input type="text" class="form-control" id="postTitle" name="post_title" value="<?= $post['post_title']; ?>">
       </div>
       <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"
         rows="3"><?= $post['description']; ?></textarea>
       </div>

       <button type="submit" name="update" class="btn btn-primary">Submit</button>
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