<?php 
	require_once("init.php");
	require_once("function.php");
	//Xử lý Logic
	$page = "changepwd";
	$success = false;
	$check_process = false; //Kiểm tra đổi mật khẩu thành công
	$flag1 = false; //Kiểm tra nhập thông tin
	$flag2 = false; //Kiểm tra pwd cũ
	$flag3 = true; // Kiểm tra trùng mk mới
	if (isset($_POST['submit']))
	{
		if (isset($_POST['o-pwd']) && isset($_POST['n-pwd']) && isset($_POST['r-n-pwd']))
		{
			$flag1 = true;
			$o_pwd = $_POST['o-pwd'];
			$n_pwd = $_POST['n-pwd'];
			$r_n_pwd = $_POST['r-n-pwd'];
			$email = $currentUser['email'];
			$check_old_pwd = password_verify($o_pwd, $currentUser['password']);
			if ($check_old_pwd)
			{
				$flag2 = true;
				if ($n_pwd == $r_n_pwd)
				{
					$n_pwd_Hash = password_hash($n_pwd, PASSWORD_DEFAULT);
					changepwd($email, $n_pwd_Hash);
					$check_process = true;
				}
				else
				{
					$check_process = false;
					$flag3 = false; // Mật khẩu mới không trùng nhau
				}
			}
			else
			{
				$flag2 = false; // Sai mật khẩu cũ
			}
		}
		else
		{
			$flag1 = false;
		}
	}
 ?>
<?php include'header.php'; ?>
<main class="container">
<h1>Đổi mật khẩu</h1>
	<form action="changepwd.php" method="post">
	    <div class="form-group">
	      <label for="pwd">Mật Khẩu Cũ:</label>
	      <input type="password" class="form-control" id="pwd" placeholder="Nhập Mật Khẩu Cũ" name="o-pwd">
	    </div>
	   	<div class="form-group">
	      <label for="pwd">Mật Khẩu Mới:</label>
	      <input type="password" class="form-control" id="pwd" placeholder="Nhập Mật Khẩu Mới" name="n-pwd">
	    </div>
	   	<div class="form-group">
	      <label for="pwd">Nhập Lại Mật Khẩu Mới:</label>
	      <input type="password" class="form-control" id="pwd" placeholder="Nhập Lại Mật Khẩu Mới" name="r-n-pwd">
	    </div>
	    <button type="submit" class="btn btn-primary" name="submit">Đổi Mật Khẩu</button>
  	</form>
  	<?php if (isset($_POST['submit'])) : ?>
	  	<?php if(!$check_process) : ?>
	  		  	<?php if(!$flag1) : ?>
	  				<div class="alert alert-warning">
	 				<strong>Sai rồi!</strong> Bạn chưa nhập đủ thông tin.
					</div>
	  			<?php endif; ?>
	  			<?php if(!$flag2) : ?>
	  				<div class="alert alert-warning">
	 				<strong>Sai rồi!</strong> Sai mật khẩu nhé!
					</div>
				<?php endif; ?>
	  	  		<?php if(!$flag3) : ?>
	  				<div class="alert alert-warning">
	 				<strong>À Há!</strong> Mật khẩu mới nhập không giống nhau nhé!
					</div>
	  			<?php endif; ?>
	  	<?php else : ?>
	  		 <div class="alert alert-success">
	   		 <strong>Thành công!</strong> Bạn đã đổi mật khẩu thành công.
	 		 </div>
	  	<?php endif; ?>
  	<?php endif; ?>
</main>
<?php include'footer.php'; ?>