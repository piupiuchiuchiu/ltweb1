<?php 
  require_once("init.php");
  require_once("function.php");
  //Xử lý Logic
  $page = "signup";
  $success=false;
  if (isset($_POST['submit']))
 {
      if (isset($_POST['email']) && isset($_POST['fullname']) && isset($_POST['pwd']))
  {
    $email=$_POST['email'];
    $fullname=$_POST['fullname'];
    $password=$_POST['pwd'];
    $default = 0;
    $time = date('Y-m-d');
    $passwordHash= password_hash($password, PASSWORD_DEFAULT);
    $userID= createUser($email, $fullname, $passwordHash, $default, $default, $time);
    $_SESSION['userID']=$userID;
    header('Location:index.php');
    $success=true;
  }
 }

 ?>
<?php include "header.php" ?>
<main class="container">
<h1>Đăng Ký</h1>
    <form action="signup.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Nhập Email" name="email">
    </div>
      <div class="form-group">
      <label for="email">Full Name:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Nhập Họ Tên" name="fullname">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Nhập Mật Khẩu" name="pwd">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Đăng Ký</button>
  </form>
</main>
<?php include "footer.php" ?>
