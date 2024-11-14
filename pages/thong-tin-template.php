<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');


  // save
  if(isset($_POST['save']))
  {
    // create error array
    $error = array();
    $success = array();
    $showMess = false;

    // validate
    if(empty($_POST['lastName']))
      $error['lastName'] = 'Vui lòng nhập <b> họ </b>';

    if(empty($_POST['firstName']))
      $error['firstName'] = 'Vui lòng nhập <b> tên </b>';

    // validate file image
    $target_dir = '../uploads/images/';
    $image = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($image)
    {
      // check file type
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif")
      {
        $error['formatImage'] = 'Ảnh không đúng định dạng: <b>jpg</b>, <b>jpeg</b>, <b>png</b>, <b>gif</b>';
      }
      else
      {
        // check exists
        if (file_exists($target_file)) 
        {
          $nameImage = time() . "." . $imageFileType;
        }
        else
        {
          $nameImage = time() . "." . $imageFileType;
        }
      }
    }

    // save to db
    if(!$error)
    {
      $showMess = true;
      $email = $row_acc['email'];
      $lastName = $_POST['lastName'];
      $firstName = $_POST['firstName'];
      $phone = $_POST['phone'];
      // set for admin
      if($_SESSION['level'] == 1)
      { 
        $level = $_POST['level'];
        $status = $_POST['status'];
      }
      else
      {
        $level = $row_acc['quyen'];
        $status = $row_acc['trang_thai'];
      }
      
      
      $date_update = date("Y-m-d H:i:s");

      if($image)
      {
        // update record
        $update = "UPDATE tai_khoan SET
                    ho = '$lastName',
                    ten = '$firstName',
                    hinh_anh = '$nameImage',
                    so_dt = '$phone',
                    quyen = $level,
                    trang_thai = $status,
                    ngay_sua = '$date_update'
                    WHERE email = '$email'";   
        mysqli_query($conn, $update);
        // remove old image
        if($row_acc['hinh_anh'] != 'admin.png')
        {
          unlink($target_dir . $row_acc['hinh_anh']);
        }
        // add image to folder
        $dirFile = $target_dir . $nameImage;
        move_uploaded_file($_FILES["image"]["tmp_name"], $dirFile);
        $success['success'] = 'Thay đổi tài khoản thành công.';
        echo '<script>setTimeout("window.location=\'thong-tin-tai-khoan.php?p=account&a=profile\'",1000);</script>';
      }
      else
      {
        // update record
        $update = "UPDATE tai_khoan SET
                    ho = '$lastName',
                    ten = '$firstName',
                    so_dt = '$phone',
                    quyen = $level,
                    trang_thai = $status,
                    ngay_sua = '$date_update'
                    WHERE email = '$email'";   
        mysqli_query($conn, $update);
        $success['success'] = 'Thay đổi tài khoản thành công.';
        echo '<script>setTimeout("window.location=\'thong-tin-tai-khoan.php?p=account&a=profile\'",1000);</script>';
      }
    }
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thông tin tài khoản</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
  // include
  include('../layouts/footer.php');
}
else
{
  // go to pages login
  header('Location: dang-nhap.php');
}

?>