<style>
  /*.navbar {
    position: fixed;
    width: 89%;
    z-index: 1000; /* Đảm bảo hiển thị trên cùng của các lớp khác */
  }
  /*.content-wrapper {
    margin-top: 0px; /* Đặt giá trị này là chiều cao của navbar để tránh bị che phủ nội dung bên dưới */
  }
</style>


<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">     
          <li class="dropdown user user-menu mt-1 pb-1 mb-1 d-flex">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header bg-info">
                <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?> - 
                  <?php 
                    if($row_acc['quyen'] == 1)
                    {
                      echo "Quản trị viên";
                    }
                    else
                    {
                      echo "Nhân viên";
                    }
                  ?>
                  <small>
                    <?php 
                      echo "Lượt truy cập: " . $row_acc['truy_cap']; 
                    ?>
                  </small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer bg-light">
                <div class="float-left d-none d-sm-inline-block">
                  <a href="thong-tin-tai-khoan.php?p=account&a=profile" class="btn btn-success" >Thông tin</a>
                </div>
                <div class="float-right d-none d-sm-inline-block">
                  <a href="dang-xuat.php" class="btn btn-danger">Đăng xuất</a>
                </div>
              </li>
            </ul>
          </li>
    </ul>
  </nav>
  <!-- /.navbar -->