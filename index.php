<?php 
	require_once("init.php");
	require_once("function.php");
	//Xử lý Logic
	$page = "index";
	$posts = FindAllPosts();
  //$comments = findcomment();
 ?>
<?php include'header.php'; ?>
<main class="container">
<?php if ($currentUser): ?>	
<div> Xin chào <?php echo $currentUser['fullname']; ?> </div>
<?php endif; ?>
<?php foreach ($posts as $post) : ?>
<div class="card">
  <div class="card-header">
   <strong><?php echo $post['fullname'];?></strong> Create at: <?php echo $post['createdAt']; $postID= $post['id'];?> <?php echo "<a href='post-detail.php?id=$postID'>Xem chi tiết</a>";?>
  </div>
  <div class="card-body">
    <p class="card-text"><?php echo $post['content'];?></p>
  </div>
  <div class="card-footer">
  <strong> Like </strong>
  <strong>Bình Luận</strong>
  </div>
</div>
</br>
<?php endforeach; ?>
</main>
<?php include'footer.php'; ?>