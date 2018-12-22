<?php 
	require_once("init.php");
	require_once("function.php");
	//Xử lý Logic
	$page = "post";
	$success = false;
	$flag = false; // check trống nội dung
	if (isset($_POST['post-btn']))
	{
		if (isset($_POST['content']))
		{
			$id = $currentUser['id'];
			$content = $_POST['content'];
			$time = date('Y-m-d H:i:s');
			createpost($content, $id, $time);
			$success = true;
		}
	}
 ?>
 <?php include 'header.php'; ?>
 <main class="container">
	<h1>Đăng Bài</h1>
	<?php if (!$success) : ?>
	<form acction="post.php" method="POST">
	    <div class="form-group">
	    <label for="content">Nội dung</label>
	    <input type="text" class="form-control" id="content" name="content" placeholder="Bạn đang nghĩ gì?">
	  </div>
	  <button type="submit" name="post-btn" class="btn btn-primary">Đăng</button>
	</form>
	<?php endif; ?>
</main>
<?php include 'footer.php'; ?>