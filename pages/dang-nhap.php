<?php 

// create session
session_start();

// connect database
include('../config.php');

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
	header("Location: index.php");
}
else
{

	if(isset($_POST['login']))
	{
		// array error
		$error = array();
		// array success
		$success = array();
		// showMess
		$showMess = false;

		// validate form 
		if(empty($_POST['email']))
		{
			$error['email'] = 'Bạn chưa nhập <b> email </b>';
		}

		if(empty($_POST['password']))
		{
			$error['password'] = 'Bạn chưa nhập <b> mật khẩu </b>';
		}

		if(!$error)
		{	
			
			$email = $_POST['email'];
			$password = md5($_POST['password']);

			// check user
			$check = "SELECT email, mat_khau, quyen, truy_cap FROM tai_khoan WHERE email = '$email'";
			$result = mysqli_query($conn, $check);
			$row = mysqli_fetch_array($result);
			$level = $row['quyen'];

			if(mysqli_num_rows($result) == 1)
			{
				if($row['mat_khau'] == $password)
				{
					$showMess = true;
					// create var session username
					$_SESSION['username'] = $email;
					// create var session level
					$_SESSION['level'] = $level;

          // set access
          $access = $row['truy_cap'] + 1;
          $update = "UPDATE tai_khoan SET truy_cap = $access WHERE email = '$email'";
          mysqli_query($conn, $update); 

					$success['mess'] = 'Đăng nhập thành công';
					header("Refresh: 1; index.php?p=index&a=statistic");
				}
				else
				{
					$error['check'] = 'Nhập sai <b> mật khẩu </b>. Vui lòng thử lại';
				}
			}
			else
			{
				$error['check'] = 'Nhập sai <b> email </b>. Vui lòng thử lại';
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="login-page" style="min-height: 466px;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center text-Primary">
      <a href="../pages/dang-nhap.php" class="h1" ><b>QUẢN LÝ NHÂN SỰ</b></a>
    </div>
    <div class="card-body text-red">
      <p class="login-box-msg">Đăng nhập tài khoản</p>

    <?php
    	// show error
    	if(isset($error))
    	{
    		if($showMess == false)
    		{
	    		echo "<div class='alert alert-danger alert-dismissible'>";
	    		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	    		echo "<h4><i class='icon fa fa-ban'></i> Lỗi!</h4>";
	    		foreach ($error as $err)
	    		{
	    			echo $err . "<br/>";
	    		}
	    		echo "</div>";
	    	}
    	}
    ?>

    <?php 
    	// show success
    	if(isset($success))
    	{
    		if($showMess == true)
    		{
    			echo "<div class='alert alert-success alert-dismissible'>";
	    		echo "<h4><i class='icon fa fa-check'></i> Chúc mừng!</h4>";
	    		foreach ($success as $suc)
	    		{
	    			echo $suc . "<br/>";
	    		}
	    		echo "</div>";
    		}
    	}
    ?>

    <form method="POST">
      	<div class="input-group mb-3">
			<input type="email" class="form-control" placeholder="Nhập Email" name="email"
			value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
				<div class="input-group-append">
					<div class="input-group-text">
					<span class="fas fa-envelope"></span>
					</div>
				</div>
      	</div>
      	<div class="input-group mb-3">
        	<input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
        		<div class="input-group-append">
					<div class="input-group-text">
					<span class="fas fa-lock"></span>
					</div>
          		</div>
      	</div>
      	<div >        
			<div clsss = "social-auth-links text-center mt-2 mb-3">
			<button type="submit" class="btn btn-block btn-success" name="login">Đăng nhập</button>
			</div>			
      	</div>
		<div class="box mt-3">
			<p class="mb-1">
				<a href="#">Quên mật khẩu đăng nhập?</a>
			</p>
			<p class="mb-0">
				<a href="#" class="text-center">Đăng ký tài khoản người dùng</a>
			</p>
		</div>
    </form>    
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

<?php 
}
// end check session
?>