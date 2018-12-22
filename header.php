<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Trần Bá Hoàng</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="default.css">

</head>
<body>
  <header class="container-fluid">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">TBH</a>
        
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Trang Chủ</a>
          </li>
          <?php if($currentUser): ?>
          <li class="nav-item">
            <a class="nav-link" href="post.php">Đăng Bài</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php"> 
              <strong>
              <?php if($currentUser) : ?>
              <?php  echo $currentUser['fullname']; ?>
              <?php endif;?>
              </strong>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="changepwd.php">Đổi Mật Khẩu</a>
          </li>
          <?php endif; ?>
          <?php if(!$currentUser) : ?>
           <li class="nav-item">
            <a class="nav-link" href="signup.php">Đăng Ký</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="login.php">Đăng Nhập</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="forgot-pwd.php">Quên Mật Khẩu</a>
          </li>
          <?php else:?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Đăng Xuất</a>
          </li>
        <?php endif ;?>
         </ul>
</nav>
  </header>