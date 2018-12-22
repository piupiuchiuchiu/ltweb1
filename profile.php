<?php 
	require_once("init.php");
	require_once("function.php");
	//Xử lý Logic
	$page = "profile";
	$success = false;
	$flag = true;
	if(isset($_POST['update-btn']))
	{
		if (isset($_POST['fullname']) && isset($_POST['phonenumber']) && isset($_POST['sex']))
		{
			$fullname = $_POST['fullname'];
			$phonenumber = $_POST['phonenumber'];
			$sex = $_POST['sex'];
			$email = $currentUser['email'];

			if ( $sex < 1 || $sex >2)
			{
				$flag = false;
			}
			else
			{
				updateprofile($fullname, $phonenumber, $sex, $email);
				$flag = true;
				$success = true;
			}
		}
	}

 ?>
 <?php include 'header.php'; ?>
 <main class="container">
	<?php if ($currentUser): ?>	
	<div class="card">
	  <div class="card-header">
	   <strong><?php echo $currentUser['fullname'];?>
	  </div>
	  <div class="card-body">
	    <p class="card-text">
	    	Email: <?php echo $currentUser['email'];?> <br>
	    	Số điện thoại: (+84) <?php echo $currentUser['phonenumber'];?> <br>
	    	Giới tính: 
	    	<?php 
	    	switch ($currentUser['sex']) 
	    	{
	    		case '1':
	    			echo 'Nam';
	    			break;
	    		case '2':
	    			echo 'Nữ';
	    			break;
	    		default:
	    			echo 'Chưa cập nhật';
	    			break;
	    	}
	    	?>	<br>
	    	Ngày đăng ký: <?php echo $currentUser['created_date'];?>
	    </p>
	  </div>
	</div>
	<?php endif; ?>
	<form acction="profile.php" method="POST">
	<button type="submit" name="btn" class="btn btn-primary">Cập Nhật</button>
	</form>
	<?php if(isset($_POST['btn'])) : ?>
	<form acction="profile.php" method="POST">
	<div class="form-group">
      <label for="email">Họ và Tên:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Họ và Tên" name="fullname">
    </div>
      <div class="form-group">
      <label for="email">Số điện thoại:</label>
      <input type="number" class="form-control" id="fullname" placeholder="Nhập Số điện thoại" name="phonenumber">
    </div>
    <div class="form-group">
      <label for="pwd">Giới tính:</label>
      <input type="number" class="form-control" id="pwd" placeholder="Giới tính ( 1 nếu là Nam , 2 nếu là nữ )" name="sex">
    </div>
	<button type="submit" name="update-btn" class="btn btn-primary">Lưu lại thay đổi</button>
	</form>
	<?php endif; ?>
	<?php if(isset($_POST['update-btn'])) : ?>
	<?php if(!$flag) : ?>
		<div class="alert alert-warning">
	 		<strong>Sai rồi</strong> Vui lòng nhập đúng giới tính.
		</div>
	<?php else : ?>
		<div class="alert alert-success">
	   		 <strong>Thành công!</strong> Bạn đã cập nhật thông tin Profile.
	 	</div>
	<?php endif; ?>
	<?php endif; ?>
</main>
<?php include 'footer.php'; ?>