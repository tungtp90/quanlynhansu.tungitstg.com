<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  // active nhan vien
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $act = "SELECT nv.id as idNhanVien, ma_nv, ten_nv, ma_hd, loai_hop_dong, ngay_soan_hd, ngay_ky_hd, ngay_hieu_luc_hd, dia_diem_ky_hd,
     noi_dung_hd, ghi_chu_hd, dia_diem_lv, phuong_tien, tg_ngay, tg_tuan, tg_nghi_ngoi, luong_can_ban, pc_cong_viec, pc_doc_hai, pc_an_trua,
      pc_dien_thoai, pc_xang_xe, chi_phi_di_lai, le_tet, hinh_thuc_tra_luong, thoi_gian_tra_luong, che_do_nang_luong, bhyt_bhxh, khd.nguoi_tao, khd.ngay_tao
    FROM ky_hop_dong khd, nhanvien nv WHERE khd.nhan_vien_id = nv.id AND khd.id = $id " ;
    $resultAct = mysqli_query($conn, $act);
    $rowAct = mysqli_fetch_array($resultAct);
    $idNhanVien = $rowAct['idNhanVien'];  // get id nhân viên
  }
  //echo "<script>alert('ID là.$id')</script>";
  // Get lại hợp đồng
  

  // delete record
  if(isset($_POST['save']))
  {
    // create array error
    $error = array();
    $success = array();
    $showMess = false;

    // get id in form
    $loaiHD = $_POST['loaiHD'];
    $ngaySoanHD = $_POST['ngaySoanHD'];
    $ngayKyHD = $_POST['ngayKyHD'];
    $ngayHieuLucHD = $_POST['ngayHieuLucHD'];
    $diaDiemKyHD = $_POST['diaDiemKyHD'];
    $noiDungCV = $_POST['noiDungCV'];
    $ghiChuHD = $_POST['ghiChuHD'];  
    $diaDiemLV = $_POST['diaDiemLV'];
    $phuongTien = $_POST['phuongTien'];
    $thoiGianNgay = $_POST['thoiGianNgay'];
    $thoiGianTuan = $_POST['thoiGianTuan'];
    $thoiGianNghiNgoi = $_POST['thoiGianNghiNgoi'];
    $luongCanBan = $_POST['luongCanBan'];
    $phuCapCV = $_POST['phuCapCV'];
    $phuCapDocHai = $_POST['phuCapDocHai'];
    $phuCapAnTrua = $_POST['phuCapAnTrua'];
    $phuCapDT = $_POST['phuCapDT'];
    $phuCapXang = $_POST['phuCapXang'];
    $chiPhiDiLai = $_POST['chiPhiDiLai'];
    $leTet = $_POST['leTet'];
    $hinhThucTraLuong = $_POST['hinhThucTraLuong'];
    $thoiGianTraLuong = $_POST['thoiGianTraLuong'];
    $cheDoNangLuong = $_POST['cheDoNangLuong'];
    $BHYT_BHXH = $_POST['BHYT_BHXH'];
    $nguoiTao = $_POST['nguoiTao'];
    $ngayTao = date("Y-m-d H:i:s");
    //echo "<script>alert('loại hd là.$loaiHD')</script>";
    // validate
    /* if($maNhanVien == 'chon')
      $error['maNhanVien'] = 'error';
    if(empty($ngayKetThuc))
      $error['ngayKetThuc'] = 'error';
    if(!empty($ngayKetThuc) && ($ngayBatDau > $ngayKetThuc))
      $error['loiNgay'] = 'error';
    if(empty($diaDiem))
      $error['diaDiem'] = 'error'; */


    if(!$error)
    {
      $showMess = true;
      $update = " UPDATE ky_hop_dong SET                  
                  loai_hop_dong = '$loaiHD',
                  ngay_soan_hd = '$ngaySoanHD',
                  ngay_ky_hd = '$ngayKyHD',
                  ngay_hieu_luc_hd = '$ngayHieuLucHD',
                  dia_diem_ky_hd = '$diaDiemKyHD',
                  noi_dung_hd = '$noiDungCV',
                  ghi_chu_hd = '$ghiChuHD',
                  dia_diem_lv = '$diaDiemLV',
                  phuong_tien = '$phuongTien',
                  tg_ngay = '$thoiGianNgay',
                  tg_tuan = '$thoiGianTuan',
                  tg_nghi_ngoi = '$thoiGianNghiNgoi',
                  luong_can_ban = '$luongCanBan',
                  pc_cong_viec = '$phuCapCV',
                  pc_doc_hai = '$phuCapDocHai',
                  pc_an_trua = '$phuCapAnTrua',
                  pc_dien_thoai = '$phuCapDT',
                  pc_xang_xe = '$phuCapXang',
                  chi_phi_di_lai = '$chiPhiDiLai',
                  le_tet = '$leTet',
                  hinh_thuc_tra_luong = '$hinhThucTraLuong',
                  thoi_gian_tra_luong = '$thoiGianTraLuong',
                  che_do_nang_luong = '$cheDoNangLuong',
                  bhyt_bhxh = '$BHYT_BHXH',
                  nguoi_tao = '$nguoiTao',
                  ngay_tao = '$ngayTao'
                  WHERE id = $id";

      $result = mysqli_query($conn, $update);
      if($result)
      {
        $success['success'] = 'Lưu lại thành công';
        echo '<script>setTimeout("window.location=\'sua-hop-dong.php?id='.$id.'\'",5000);</script>';
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
                    <h1>Sửa hợp đồng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa hợp đồng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
        <div class="col-xs-12">
          <div class="card card-info">
            <div class="card-header with-border">
              <h3 class="card-title">Sửa hợp đồng</h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php 
                // show error
                if($row_acc['quyen'] != 1) 
                {
                  echo "<div class='alert alert-warning alert-dismissible'>";
                  echo "<h4><i class='icon fa fa-ban'></i> Thông báo!</h4>";
                  echo "Bạn <b> không có quyền </b> thực hiện chức năng này.";
                  echo "</div>";
                }
              ?>
              <?php 
                // show success
                if(isset($success)) 
                {
                  if($showMess == true)
                  {
                    echo "<div class='alert alert-success alert-dismissible'>";
                    echo "<h4><i class='icon fa fa-check'></i> Thành công!</h4>";
                    foreach ($success as $suc) 
                    {
                      echo $suc . "<br/>";
                    }
                    echo "</div>";
                  }
                }
              ?>
              <form action="" method="POST">
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mã hợp đồng: </label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="maHopDong" value="<?php echo $rowAct['ma_hd']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nhân viên: </label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="maNhanVien" value="<?php echo $rowAct['ma_nv']; ?> - <?php echo $rowAct['ten_nv']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Loại hợp đồng <span style="color: red;">*</span>: </label>
                          <select class="form-control" name="loaiHD">
                          <?php 
                            if($rowAct['loai_hop_dong'] == 1)
                            {
                              echo "<option value='1' selected>Hợp đồng không xác định thời hạn</option>";
                              echo "<option value='2'>Hợp đồng có xác định thời hạn</option>";
                              echo "<option value='3'>Hợp đồng thử việc</option>";
                            }
                            if($rowAct['loai_hop_dong'] == 2)
                            {
                              echo "<option value='1' >Hợp đồng không xác định thời hạn</option>";
                              echo "<option value='2' selected>Hợp đồng có xác định thời hạn</option>";
                              echo "<option value='3'>Hợp đồng thử việc</option>";
                            }
                            if($rowAct['loai_hop_dong'] == 3)
                            {
                              echo "<option value='1' selected>Hợp đồng không xác định thời hạn</option>";
                              echo "<option value='2'>Hợp đồng có xác định thời hạn</option>";
                              echo "<option value='3' selected>Hợp đồng thử việc</option>";
                            }
                          ?>
                          </select>
                          <small style="color: red;"><?php if(isset($error['loaiHopDong'])){ echo "Vui lòng chọn loại hợp đồng"; } ?></small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ngày soạn<span style="color: red;">*</span>: </label>
                          <input type="date" class="form-control" id="exampleInputEmail1" name="ngaySoanHD" value="<?php echo date_format(date_create($rowAct['ngay_soan_hd']), 'Y-m-d'); ?>">
                          <small style="color: red;"><?php if(isset($error['loiNgay'])){ echo 'Ngày bắt đầu <b> không được sau </b> ngày kết thúc';} ?></small>
                        </div>  
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ngày ký<span style="color: red;">*</span>: </label>
                          <input type="date" class="form-control" id="exampleInputEmail1" name="ngayKyHD" value="<?php echo date_format(date_create($rowAct['ngay_ky_hd']), 'Y-m-d'); ?>">
                          <small style="color: red;"><?php if(isset($error['ngayKyHD'])){ echo 'Vui lòng chọn ngày ký';} ?></small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ngày hiệu lực HĐ<span style="color: red;">*</span>: </label>
                          <input type="date" class="form-control" id="exampleInputEmail1" name="ngayHieuLucHD" value="<?php echo date_format(date_create($rowAct['ngay_hieu_luc_hd']), 'Y-m-d'); ?>">
                          <small style="color: red;"><?php if(isset($error['ngayHieuLucHD'])){ echo 'Vui lòng chọn ngày ký';} ?></small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Địa điểm ký hợp đồngc<span style="color: red;">*</span>: </label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="diaDiemKyHD" placeholder="Vui lòng nhập địa điểm" value="<?php echo $rowAct['dia_diem_ky_hd']; ?>">
                          <small style="color: red;"><?php if(isset($error['diaDiemKyHD'])){ echo 'Vui lòng nhập địa điểm công tác';} ?></small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nội dung công việc: </label>
                          <textarea  id="editor1" rows="1" class="form-control" cols="108" name="noiDungCV"><?php echo $rowAct['noi_dung_hd']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ghi chú: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="ghiChuHD"><?php echo $rowAct['ghi_chu_hd']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Địa điểm làm việc: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="diaDiemLV"><?php echo $rowAct['dia_diem_lv']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phương tiện đi lại: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="phuongTien"><?php echo $rowAct['phuong_tien']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Thời gian ngày: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="thoiGianNgay"><?php echo $rowAct['tg_ngay']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Thời gian tuần: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="thoiGianTuan"><?php echo $rowAct['tg_tuan']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Người tạo: </label>
                          <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>" name="nguoiTao" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ngày tạo: </label>
                          <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="ngayTao" readonly>
                        </div>

                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Thời gian nghỉ ngơi: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="thoiGianNghiNgoi"><?php echo $rowAct['tg_nghi_ngoi']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Lương căn bản: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="luongCanBan"><?php echo $rowAct['luong_can_ban']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phụ cấp công việc: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="phuCapCV"><?php echo $rowAct['pc_cong_viec']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phụ cấp độc hại: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="phuCapDocHai"><?php echo $rowAct['pc_doc_hai']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phụ cấp ăn trưa: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="phuCapAnTrua"><?php echo $rowAct['pc_an_trua']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phụ cấp điện thoại: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="phuCapDT"><?php echo $rowAct['pc_dien_thoai']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phụ cấp xăng xe: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="phuCapXang"><?php echo $rowAct['pc_xang_xe']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Chi phí đi lại: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="chiPhiDiLai"><?php echo $rowAct['chi_phi_di_lai']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Lễ tết: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="leTet"><?php echo $rowAct['le_tet']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Hình thức trả lương: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="hinhThucTraLuong"><?php echo $rowAct['hinh_thuc_tra_luong']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Thời gian trả lương: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="thoiGianTraLuong"><?php echo $rowAct['thoi_gian_tra_luong']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Chế độ nâng lương: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="cheDoNangLuong"><?php echo $rowAct['che_do_nang_luong']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">BHYT-BHXH: </label>
                          <textarea id="editor1" rows="1" class="form-control" cols="108" name="BHYT_BHXH"><?php echo $rowAct['bhyt_bhxh']; ?></textarea>
                        </div>
                      </div>
                    <!-- /.form-group -->
                    <?php 
                      if($_SESSION['level'] == 1)
                        echo "<button type='submit' class='btn btn-warning' name='save'><i class='fa fa-save'></i> Lưu lại</button>";
                    ?>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      
    </section>
    <!-- /.content -->
  </div>

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