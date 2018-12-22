<?php 
  require_once("init.php");
  require_once("function.php");
  //Xử lý Logic
  $page = "login";
  $success=false;
  if (isset($_POST['submit']))
 {
      if (isset($_POST['email']) && isset($_POST['pwd']))
  {
    $email=$_POST['email'];
    $password=$_POST['pwd'];
    $user = FindUserbyEmail($email);
    if ($user)
	{
		$check = password_verify($password, $user['password']);
		if ($check)
		{
			$_SESSION['userID']=$user['id'];
		    header('Location:index.php');
		    $success=true;
		}
		else{
			echo "Sai tài khoản hoặc mật khẩu";
		}
	} 
	else{
			echo "Sai tài khoản hoặc mật khẩu";
		}   
  }
 }

 ?>
<?php include "header.php" ?>
<main class="container">
<h1>Đăng Ký</h1>
    <form action="login.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Nhập Email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Nhập Mật Khẩu" name="pwd">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Đăng Nhập</button>
  </form>
</main>
<?php include "footer.php" ?>
