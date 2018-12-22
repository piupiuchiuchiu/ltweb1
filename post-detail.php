<?php 
	require_once("init.php");
	require_once("function.php");
	//Xử lý Logic
	$page = "post-detail";
	$success = false;
  //$comments = findcomment();
	$postID = (isset($_GET['id']) ? $_GET['id'] : '');
	if (isset($_POST['submit']))
	{
		if (isset($_POST['text']))
		{
			
			$name = $currentUser['fullname'];
			//$time = date('Y-m-d');
			$comment = $_POST['text'];
			createComment($name, $postID, $comment);
			$success = true;
		}
	}
 ?>
<?php include'header.php'; ?>
<?php echo $postID;?>
<main class="container">
<h1>Tiêu Đề</h1>
<h2>Nội Dung</h2>
<form action="post-detail.php" method="post">
    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
  <div>
  	<?php if(!$success): ?>
  	<?php echo "thành công";?>
  <?php endif;?>
  </div>
	</main>
<?php include'footer.php'; ?>