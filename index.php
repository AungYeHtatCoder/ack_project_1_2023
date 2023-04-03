<?php 
include('./db/functions.php');
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
    <?php foreach($posts as $post) : ?>
    <div class="card mb-4">
     <a href="#!"><img class="card-img-top" src="actions/post_photo/<?= $post['post_img']; ?>" alt="..." width="850px"
       height="350px" /></a>
     <div class="card-body">
      <div class="small text-muted">
       <!-- posted date with date format - day - month name - year -->
       Posted on <?= date('d M Y', strtotime($post['created_at'])); ?>
      </div>
      <h2 class="card-title"> <?= $post['post_title']; ?></h2>
      <p class="card-text">
       <!-- description with limit 100 -->
       <?php 
       $description = $post['description'];
       $description = substr($description, 0, 100);
       echo $description;
       ?>
      </p>
      <a class="btn btn-primary" href="detail.php?id=<?= $post['id']; ?>">Read more →</a>
     </div>
    </div>

    <?php endforeach ?>
   </div>
   <!-- Side widgets-->
   <div class="col-lg-4">
    <!-- Search widget-->

   </div>
  </div>
 </div>
 <!-- Footer-->
 <?php include('layouts/footer.php'); ?>