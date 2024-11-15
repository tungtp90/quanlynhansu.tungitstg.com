<?php

// get active sidebar
if (isset($_GET['p']) && isset($_GET['a'])) {
  $p = $_GET['p'];
  $a = $_GET['a'];
}
?>
<!-- Main Sidebar Container -->
<style type="text/css">
  .main-sidebar {

  }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../index.php" class="brand-link">
    <img src="../uploads/images/Logo_bvht_new.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>CÔNG TY TNHH<br>BỆNH VIỆN HOÀNG TUẤN</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Tổng quan
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thống kê</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon  fas fa-building"></i>
            <p>
              Phòng Ban - Chức Vụ
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="phong-ban.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Phòng ban</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="chuc-vu.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Chức vụ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="trinh-do.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Trình độ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="chuyen-mon.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Chuyên môn</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bang-cap.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Bằng cấp<small></small></p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Nhân Viên
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="loai-nhan-vien.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Loại nhân viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="them-nhan-vien.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Thêm nhân viên</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="danh-sach-nhan-vien.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Danh sách nhân viên</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bullhorn"></i>
            <p>
              Nhắc hẹn thử việc
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="them-thu-viec.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Tạo nhắc hẹn thử việc</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="danh-sach-thu-viec.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Danh sách thử việc</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
              Ký hợp đồng
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="ky-hop-dong-yte.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Ký hợp đồng NV Y Tế</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ky-hop-dong-khac.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Ký hợp đồng Khác</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="danh-sach-da-ky-hd.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Danh sách hợp đồng</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Tài khoản người dùng
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="thong-tin-tai-khoan.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Thông tin tài khoản</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tao-tai-khoan.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Tạo tài khoản</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ds-tai-khoan.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Danh sách tài khoản</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="doi-mat-khau.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Đổi mật khẩu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="dang-xuat.php" class="nav-link">
                <i class="far fa-circle"></i>
                <p>Đăng xuất</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>