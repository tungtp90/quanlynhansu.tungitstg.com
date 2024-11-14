<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  // create  var default
  
  $maNhanVien = "MNV" . time();

  // show data
  // ----- Quốc tịch
  $quocTich = "SELECT id, ten_quoc_tich FROM quoc_tich";
  $resultQuocTich = mysqli_query($conn, $quocTich);
  $arrQuocTich = array();
  while ($rowQuocTich = mysqli_fetch_array($resultQuocTich)) 
  {
    $arrQuocTich[] = $rowQuocTich;
  }

  // ----- Tôn giáo
  $tonGiao = "SELECT id, ten_ton_giao FROM ton_giao";
  $resultTonGiao = mysqli_query($conn, $tonGiao);
  $arrTonGiao = array();
  while ($rowTonGiao = mysqli_fetch_array($resultTonGiao)) 
  {
    $arrTonGiao[] = $rowTonGiao;
  }

  // ----- Dân tộc
  $danToc = "SELECT id, ten_dan_toc FROM dan_toc";
  $resultDanToc = mysqli_query($conn, $danToc);
  $arrDanToc = array();
  while ($rowDanToc = mysqli_fetch_array($resultDanToc)) 
  {
    $arrDanToc[] = $rowDanToc;
  }

  // ----- Loại nhân viên
  $loaiNhanVien = "SELECT id, ten_loai_nv FROM loai_nv";
  $resultLoaiNhanVien = mysqli_query($conn, $loaiNhanVien);
  $arrLoaiNhanVien = array();
  while ($rowLoaiNhanVien = mysqli_fetch_array($resultLoaiNhanVien)) 
  {
    $arrLoaiNhanVien[] = $rowLoaiNhanVien;
  }
  // ----- Loại hợp đồng LĐ
  /*$loaihdld = "SELECT id, ten_loai_hop_dong FROM loai_hop_dong";
  $resultLoaihdld = mysqli_query($conn, $loaihdld);
  $arrLoaihdld = array();
  while ($rowLoaihdld = mysqli_fetch_array($resultLoaihdld)) 
  {
    $arrLoaihdld[] = $rowLoaihdld;
  }*/

  // ----- Trình độ
  $trinhDo = "SELECT id, ten_trinh_do FROM trinh_do";
  $resultTrinhDo = mysqli_query($conn, $trinhDo);
  $arrTrinhDo = array();
  while ($rowTrinhDo = mysqli_fetch_array($resultTrinhDo)) 
  {
    $arrTrinhDo[] = $rowTrinhDo;
  }

  // ----- Chuyên môn
  $chuyenMon = "SELECT id, ten_chuyen_mon FROM chuyen_mon";
  $resultChuyenMon = mysqli_query($conn, $chuyenMon);
  $arrChuyenMon = array();
  while ($rowChuyenMon = mysqli_fetch_array($resultChuyenMon)) 
  {
    $arrChuyenMon[] = $rowChuyenMon;
  }

  // ----- Bằng cấp
  $bangCap = "SELECT id, ten_bang_cap FROM bang_cap";
  $resultBangCap = mysqli_query($conn, $bangCap);
  $arrBangCap = array();
  while ($rowBangCap = mysqli_fetch_array($resultBangCap)) 
  {
    $arrBangCap[] = $rowBangCap;
  }

  // ----- Phòng ban
  $phongBan = "SELECT id, ten_phong_ban FROM phong_ban";
  $resultPhongBan = mysqli_query($conn, $phongBan);
  $arrPhongBan = array();
  while ($rowPhongBan = mysqli_fetch_array($resultPhongBan)) 
  {
    $arrPhongBan[] = $rowPhongBan;
  }

  // ----- chức vụ
  $chucVu = "SELECT id, ten_chuc_vu FROM chuc_vu";
  $resultChucvu = mysqli_query($conn, $chucVu);
  $arrChucVu = array();
  while ($rowChucvu = mysqli_fetch_array($resultChucvu)) 
  {
    $arrChucVu[] = $rowChucvu;
  }

  // ----- Đơn vị cơ sở
  $donvi = "SELECT id, ten_don_vi FROM don_vi";
  $resultdonvi = mysqli_query($conn, $donvi);
  $arrdonvi = array();
  while ($rowdonvi = mysqli_fetch_array($resultdonvi)) 
  {
    $arrdonvi[] = $rowdonvi;
  }

  // ----- Hôn nhân
  $honNhan = "SELECT id, ten_tinh_trang FROM tinh_trang_hon_nhan";
  $resultHonNhan = mysqli_query($conn, $honNhan);
  $arrHonNhan = array();
  while ($rowHonNhan = mysqli_fetch_array($resultHonNhan)) 
  {
    $arrHonNhan[] = $rowHonNhan;
  }


  // chuc nang them nhan vien
  if(isset($_POST['save']))
  {
    // tao bien bat loi
    $error = array();
    $success = array();
    $showMess = false;

    // lay du lieu ve
    $tenNhanVien = $_POST['tenNhanVien'];
    //$bietDanh = $_POST['bietDanh'];
    $honNhan = $_POST['honNhan'];
    $CMND = $_POST['CMND'];
    $ngayCapcmnd = $_POST['ngayCapcmnd'];
    $noiCapcmnd = $_POST['noiCapcmnd'];    
    $quocTich = $_POST['quocTich'];
    $tonGiao = $_POST['tonGiao'];
    $danToc = $_POST['danToc'];
    $loaiNhanVien = $_POST['loaiNhanVien'];
    $bangCap = $_POST['bangCap'];
    $trangThailv = $_POST['trangThailv'];
    $phamvichuyenmon = $_POST['phamvichuyenmon'];
    $chungchikhac = $_POST['chungchikhac'];
    $thoigianlamviec = $_POST['thoigianlamviec'];
    //$loaihdld = $_POST['loaihdld'];
    $ngaybatdaulam = $_POST['ngaybatdaulam'];
    $ngaythuviec = $_POST['ngaythuviec'];
    $gioiTinh = $_POST['gioiTinh'];
    $ngaySinh = $_POST['ngaySinh'];    
    $diachi = $_POST['diachi'];
    $phongBan = $_POST['phongBan'];
    $chucVu = $_POST['chucVu'];
    $trinhDo = $_POST['trinhDo'];
    $chuyenMon = $_POST['chuyenMon'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];
    $ngaythamgiabhxh = $_POST['ngaythamgiabhxh'];
    $luongcoban = $_POST['luongcoban'];
    $ngaynangluong = $_POST['ngaynangluong'];
    $huongbhxh = $_POST['huongbhxh'];
    $hoctap = $_POST['hoctap'];
    $kyluat = $_POST['kyluat'];
    $ngaythoiviec = $_POST['ngaythoiviec'];
    $lydothoiviec = $_POST['lydothoiviec'];
    $ghichu = $_POST['ghichu'];
    $id_user = $row_acc['id'];
    $ngayTao = date("Y-m-d H:i:s");
    $nhiemvu = $_POST['nhiemvu'];
    $socchn = $_POST['socchn'];
    $donvi = $_POST['donvi'];
    $ngaycapcchn = $_POST['ngaycapcchn'];
    $noicapcchn = $_POST['noicapcchn'];
    //$ngaykyhopdong = $_POST['ngaykyhopdong'];
    $hoKhau = $_POST['hoKhau'];


    // cau hinh o chon anh
    $hinhAnh = $_FILES['hinhAnh']['name'];
    $target_dir = "../uploads/staffs/";
    $target_file = $target_dir . basename($hinhAnh);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // validate
    if(empty($tenNhanVien))
      $error['tenNhanVien'] = 'error';
    if($honNhan == 'chon')
      $error['honNhan'] = 'error';
    /*if(empty($CMND))
      $error['CMND'] = 'error';
    if(empty($noiCap))
      $error['noiCap'] = 'error'; */
    if(empty($sodienthoai))
      $error['sodienthoai'] = 'error';
    if(empty($email))
      $error['email'] = 'error';
    if($quocTich == 'chon')
      $error['quocTich'] = 'error';
    if($danToc == 'chon')
      $error['danToc'] = 'error';
     if($loaiNhanVien == 'chon')
      $error['loaiNhanVien'] = 'error';
    if($trangThailv == 'chon')
      $error['trangThailv'] = 'error';
    if($gioiTinh == 'chon')
      $error['gioiTinh'] = 'error';
     if(empty($hoKhau))
      $error['hoKhau'] = 'error';
    if(empty($diachi))
      $error['diachi'] = 'error';
    if($phongBan == 'chon')
      $error['phongBan'] = 'error';
    if($chucVu == 'chon')
      $error['chucVu'] = 'error';
    if($trinhDo == 'chon')
      $error['trinhDo'] = 'error';
    /*if($loaihdld == 'chon')
      $error['loaihdld'] = 'error'; */
    if($donvi == 'chon')
      $error['donvi'] = 'error';
    
    // validate file
    if($hinhAnh)
    {
      if($_FILES['hinhAnh']['size'] > 50000000)
        $error['kichThuocAnh'] = 'error';
      if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif')
        $error['kieuAnh'] = 'error';
    }

    if(!$error)
    {
      if($hinhAnh)
      {
        $imageName = time() . "." . $imageFileType;
        $moveFile = $target_dir . $imageName;

        // insert data
        $insert = "INSERT INTO nhanvien(ma_nv, hinh_anh, ten_nv, ngay_sinh, gioi_tinh, dan_toc_id, so_cchn, ngay_cap_cchn, noi_cap_cchn, trang_thai_lv, 
        pham_vi_hoat_dong_cm, chung_chi_khac, toantg_bantg, trinh_do_id, chuyen_mon_id, chuc_vu_id, ngay_bat_dau_lam_viec,
        ngay_thu_viec, nhiem_vu, ngay_tham_gia_bhxh, luong_co_ban, thoi_han_nang_luong,huong_che_do_bhxh, hoc_tap, ky_luat, thoi_gian_nghi_viec, ly_do_nghi_viec, 
        phong_ban_id, don_vi_id, bang_cap_id, so_cmnd, ngay_cap_cmnd, noi_cap_cmnd, dia_chi, ho_khau, so_dien_thoai, email, loai_nv_id, quoc_tich_id, hon_nhan_id, ton_giao_id, 
        nguoi_tao_id, ngay_tao, nguoi_sua_id, ngay_sua, ghi_chu_nv)
        VALUES('$maNhanVien', '$imageName', '$tenNhanVien', '$ngaySinh', '$gioiTinh', '$danToc', '$socchn', '$ngaycapcchn', '$noicapcchn', '$trangThailv', '$phamvichuyenmon',
        '$chungchikhac', '$thoigianlamviec', '$trinhDo', '$chuyenMon', '$chucVu', '$ngaybatdaulam', '$ngaythuviec', '$nhiemvu', '$ngaythamgiabhxh', '$luongcoban', '$ngaynangluong', 
        '$huongbhxh', '$hoctap', '$kyluat', '$ngaythoiviec', '$lydothoiviec', '$phongBan', '$donvi', '$bangCap', '$CMND', '$ngayCapcmnd', '$noiCapcmnd', '$diachi','$hoKhau', '$sodienthoai', '$email',
        '$loaiNhanVien','$quocTich', '$honNhan', '$tonGiao', '$id_user', '$ngayTao','$id_user', '$ngayTao','$ghichu'  )";
        $result = mysqli_query($conn, $insert);
        if($result)
        {
          $showMess = true;
          // move image
          move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $moveFile);

          $success['success'] = 'Thêm nhân viên thành công';
          echo '<script>setTimeout("window.location=\'them-nhan-vien.php?p=staff&a=add-staff\'",1000);</script>';
        }
      }
      else
      {
        $showMess = true;
        $hinhAnh = "demo-3x4.jpg";
        // insert data
        $insert = "INSERT INTO nhanvien(ma_nv, hinh_anh, ten_nv, ngay_sinh, gioi_tinh, dan_toc_id, so_cchn, ngay_cap_cchn, noi_cap_cchn, trang_thai_lv, 
        pham_vi_hoat_dong_cm, chung_chi_khac, toantg_bantg, trinh_do_id, chuyen_mon_id, chuc_vu_id, ngay_bat_dau_lam_viec,
        ngay_thu_viec, nhiem_vu, ngay_tham_gia_bhxh, luong_co_ban, thoi_han_nang_luong,huong_che_do_bhxh, hoc_tap, ky_luat, thoi_gian_nghi_viec, ly_do_nghi_viec, 
        phong_ban_id, don_vi_id, bang_cap_id, so_cmnd, ngay_cap_cmnd, noi_cap_cmnd, dia_chi, ho_khau, so_dien_thoai, email, loai_nv_id, quoc_tich_id, hon_nhan_id, ton_giao_id, 
        nguoi_tao_id, ngay_tao, nguoi_sua_id, ngay_sua, ghi_chu_nv)
        VALUES('$maNhanVien', '$hinhAnh', '$tenNhanVien', '$ngaySinh', '$gioiTinh', '$danToc', '$socchn', '$ngaycapcchn', '$noicapcchn', '$trangThailv', '$phamvichuyenmon',
        '$chungchikhac', '$thoigianlamviec', '$trinhDo', '$chuyenMon', '$chucVu', '$ngaybatdaulam', '$ngaythuviec', '$nhiemvu', '$ngaythamgiabhxh', '$luongcoban', '$ngaynangluong', 
        '$huongbhxh', '$hoctap', '$kyluat', '$ngaythoiviec', '$lydothoiviec', '$phongBan', '$donvi', '$bangCap', '$CMND', '$ngayCapcmnd', '$noiCapcmnd', '$diachi','$hoKhau', '$sodienthoai', '$email',
        '$loaiNhanVien','$quocTich', '$honNhan', '$tonGiao', '$id_user', '$ngayTao','$id_user', '$ngayTao','$ghichu'  )";
        $result = mysqli_query($conn, $insert);
        if($result)
        {
          $success['success'] = 'Thêm nhân viên thành công';
          echo '<script>setTimeout("window.location=\'them-nhan-vien.php?p=staff&a=add-staff\'",1000);</script>';
        }
      }
    }
  }

?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST">
          <div class="modal-header">
            <span style="font-size: 18px;">Thông báo</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="idStaff">
            Bạn có thực sự muốn xóa nhân viên này?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
            <button type="submit" class="btn btn-primary" name="delete">Xóa</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm nhân viên</li>
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
              <h3 class="card-title">Thêm mới nhân viên<h3>
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
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mã nhân viên: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="maNhanVien" value="<?php echo $maNhanVien; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tên nhân viên <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên nhân viên" name="tenNhanVien" value="<?php echo isset($_POST['tenNhanVien']) ? $_POST['tenNhanVien'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['tenNhanVien'])){ echo "Tên nhân viên không được để trống"; } ?></small>
                    </div>
                    
                    <div class="form-group">
                      <label>Tình trạng hôn nhân <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="honNhan">
                        <option value="chon">--- Chọn tình trạng hôn nhân ---</option>
                        <?php 
                          foreach ($arrHonNhan as $hn)
                          {                           
                            echo "<option value='".$hn['id']."'>".$hn['ten_tinh_trang']."</option>";
                          }                          
                             
                        ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['honNhan'])){ echo "Vui lòng chọn tình trạng hôn nhân"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Số CMND <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập số CMND" name="CMND" value="<?php echo isset($_POST['CMND']) ? $_POST['CMND'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['CMND'])){ echo "Vui lòng nhập số CMND"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày cấp CMND <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày cấp" name="ngayCapcmnd" value="<?php echo date(""); ?>">
                    </div>
                    
                    
                    <div class="form-group">
                      <label>Quốc tịch <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="quocTich">
                      <option value="chon">--- Chọn quốc tịch ---</option>
                      <?php 
                        foreach ($arrQuocTich as $qt)
                        {
                          echo "<option value='".$qt['id']."'>".$qt['ten_quoc_tich']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['quocTich'])){ echo "Vui lòng chọn quốc tịch"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Tôn giáo: </label>
                      <select class="form-control" name="tonGiao">
                      <?php 
                      foreach ($arrTonGiao as $tg)
                      {
                        echo "<option value='".$tg['id']."'>".$tg['ten_ton_giao']."</option>";
                      }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Dân tộc <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="danToc">
                      <option value="chon">--- Chọn dân tộc ---</option>
                      <?php 
                      foreach ($arrDanToc as $dt)
                      {
                        echo "<option value='".$dt['id']."'>".$dt['ten_dan_toc']."</option>";
                      }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['danToc'])){ echo "Vui lòng chọn dân tộc"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Loại nhân viên <span style="color: red;">*</span> : </label>
                      <select class="form-control" name="loaiNhanVien">
                      <option value="chon">--- Chọn loại nhân viên ---</option>
                      <?php 
                        foreach ($arrLoaiNhanVien as $lnv)
                        {
                          echo "<option value='".$lnv['id']."'>".$lnv['ten_loai_nv']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['loaiNhanVien'])){ echo "Vui lòng chọn loại nhân viên"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Bằng cấp chuyên môn: </label>
                      <select class="form-control" name="bangCap">
                      <?php 
                        foreach ($arrBangCap as $bc)
                        {
                          echo "<option value='".$bc['id']."'>".$bc['ten_bang_cap']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Trạng thái làm việc <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="trangThailv">
                        <option value="chon">--- Chọn trạng thái làm việc ---</option>
                        <option value="1">Đang làm việc</option>
                        <option value="2">Đã nghỉ việc</option>
                      </select>
                      <small style="color: red;"><?php if(isset($error['trangThailv'])){ echo "Vui lòng chọn trạng thái làm việc"; } ?></small>
                    </div>
                      
                      <div class="form-group">
                      <label>Phạm vi hoạt động chuyên môn <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập phạm vi chuyên môn" name="phamvichuyenmon" value="<?php echo isset($_POST['phamvichuyenmon']) ? $_POST['phamvichuyenmon'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['phamvichuyenmon'])){ echo "Vui lòng nhập phạm vi hoạt động chuyên môn"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Chứng chỉ khác <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập chứng chỉ khác" name="chungchikhac" value="<?php echo isset($_POST['chungchikhac']) ? $_POST['chungchikhac'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['chungchikhac'])){ echo "Vui lòng nhập chứng chỉ khác"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Thời gian làm việc ( Toàn TG - Bán TG) <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập thời gian làm việc" name="thoigianlamviec" value="<?php echo isset($_POST['thoigianlamviec']) ? $_POST['thoigianlamviec'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['thoigianlamviec'])){ echo "Vui lòng nhập thời gian làm việc"; } ?></small>
                    </div>
                    <!-- <div class="form-group">
                      <label>Loại HĐLĐ <span style="color: red;">*</span> : </label>
                      <select class="form-control" name="loaihdld">
                      <option value="chon">--- Chọn loại hợp đồng lao động ---</option>
                      //<?php 
                       // foreach ($arrLoaihdld as $loaihdld)
                       // {
                       //   echo "<option value='".$loaihdld['id']."'>".$loaihdld['ten_loai_hop_dong']."</option>";
                       // }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['loaihdld'])){ echo "Vui lòng chọn loại hợp đồng lao động"; } ?></small>
                    </div> -->
                    <div class="form-group">
                      <label>Đơn vị cơ sở <span style="color: red;">*</span> : </label>
                      <select class="form-control" name="donvi">
                      <option value="chon">--- Chọn đơn vị cơ sở ---</option>
                      <?php 
                        foreach ($arrdonvi as $donvi)
                        {
                          echo "<option value='".$donvi['id']."'>".$donvi['ten_don_vi']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['donvi'])){ echo "Vui lòng chọn đơn vị cơ sở"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày bắt đầu làm việc <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày bắt đầu làm việc" name="ngaybatdaulam" value="<?php echo date(""); ?>">
                    </div>
                    <div class="form-group">
                      <label>Ngày thử việc <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày thử việc" name="ngaythuviec" value="<?php echo date(""); ?>">
                    </div>
                    <!-- <div class="form-group">
                      <label>Ngày ký hợp đồng chính thức <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày ký hợp đồng" name="ngaykyhopdong" value="<?php echo date("Y-m-d"); ?>">
                    </div>   -->                          
                    <div class="form-group">
                      <label>Số CCHN <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Số CCHN" name="socchn" value="<?php echo isset($_POST['socchn']) ? $_POST['socchn'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['socchn'])){ echo "Vui lòng nhập"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày cấp CCHN <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày cấp CCHN" name="ngaycapcchn" value="<?php echo date(""); ?>">
                    </div>
                    <div class="form-group">
                      <label>Nơi cấp CCHN <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Số CCHN" name="noicapcchn" value="<?php echo isset($_POST['noicapcchn']) ? $_POST['noicapcchn'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['socchn'])){ echo "Vui lòng nhập nơi cấp CCHN"; } ?></small>
                    </div>

                  </div>
                  
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ảnh 3x4 (Nếu có): </label>
                      <input type="file" class="form-control" id="exampleInputEmail1" name="hinhAnh">
                      <small style="color: red;"><?php if(isset($error['kichThuocAnh'])){ echo "Kích thước ảnh quá lớn"; } ?></small>
                      <small style="color: red;"><?php if(isset($error['kieuAnh'])){ echo "Chỉ nhận file ảnh dạng: jpg, jpeg, png, gif"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Giới tính <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="gioiTinh">
                        <option value="chon">--- Chọn giới tính ---</option>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                      </select>
                      <small style="color: red;"><?php if(isset($error['gioiTinh'])){ echo "Vui lòng chọn giới tính"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày sinh: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="ngaySinh" value="<?php echo date(""); ?>">
                    </div>                    
                    <div class="form-group">
                      <label>Địa chỉ hiện tại: <span style="color: red;">*</span>: </label>
                      <textarea class="form-control" name="diachi" rows="1"><?php echo isset($_POST['diachi']) ? $_POST['diachi'] : ''; ?></textarea>
                      <small style="color: red;"><?php if(isset($error['diachi'])){ echo "Vui lòng nhập địa chỉ nơi ở hiện tại"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Hộ khẩu thường trú: <span style="color: red;">*</span>: </label>
                      <textarea class="form-control" name="hoKhau" rows="1"><?php echo isset($_POST['hoKhau']) ? $_POST['hoKhau'] : ''; ?></textarea>
                      <small style="color: red;"><?php if(isset($error['hoKhau'])){ echo "Vui lòng nhập nơi đăng ký HKTT"; } ?></small>
                    </div>
                    
                    <div class="form-group">
                      <label>Nơi cấp CMND <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập nơi cấp CMND" name="noiCapcmnd" value="<?php echo isset($_POST['noiCapcmnd']) ? $_POST['noiCapcmnd'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['noiCapcmnd'])){ echo "Vui lòng nhập nơi cấp CMND"; } ?></small>
                    </div>

                    <div class="form-group">
                      <label>Phòng ban <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="phongBan">
                      <option value="chon">--- Chọn phòng ban ---</option>
                      <?php 
                        foreach ($arrPhongBan as $pb)
                        {
                          echo "<option value='".$pb['id']."'>".$pb['ten_phong_ban']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['phongBan'])){ echo "Vui lòng chọn phòng ban"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Chức vụ <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="chucVu">
                      <option value="chon">--- Chọn chức vụ ---</option>
                      <?php 
                      foreach ($arrChucVu as $cv)
                      {
                        echo "<option value='".$cv['id']."'>".$cv['ten_chuc_vu']."</option>";
                      }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['chucVu'])){ echo "Vui lòng chọn chức vụ"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Trình độ <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="trinhDo">
                      <option value="chon">--- Chọn trình độ ---</option>
                      <?php 
                        foreach ($arrTrinhDo as $td)
                        {
                          echo "<option value='".$td['id']."'>".$td['ten_trinh_do']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['trinhDo'])){ echo "Vui lòng chọn trình độ"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Chuyên môn: </label>
                      <select class="form-control" name="chuyenMon">
                      <?php 
                        foreach ($arrChuyenMon as $cm)
                        {
                          echo "<option value='".$cm['id']."'>".$cm['ten_chuyen_mon']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                    <!-- so dien thoai-->
                    <div class="form-group">
                      <label>Số điện thoại <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập số điện thoại" name="sodienthoai" value="<?php echo isset($_POST['sodienthoai']) ? $_POST['sodienthoai'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['sodienthoai'])){ echo "Vui lòng nhập Số điện thoại liên hệ"; } ?></small>
                    </div>
                    <!-- End so dien thoai-->
                    <!-- Địa chỉ Email-->
                    <div class="form-group">
                      <label>Email <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ Email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['email'])){ echo "Vui lòng nhập Email liên hệ"; } ?></small>
                    </div>
                    <!-- End Địa chỉ Email-->
                    <div class="form-group">
                      <label>Ngày tham gia BHXH <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày tham gia BHXH" name="ngaythamgiabhxh" value="<?php echo date(""); ?>">
                    </div>
                    <div class="form-group">
                      <label>Lương cơ bản <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập mức lương cơ bản" name="luongcoban" value="<?php echo isset($_POST['luongcoban']) ? $_POST['luongcoban'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['luongcoban'])){ echo "Vui lòng nhập mức lương cơ bản"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Thời điểm nâng lương <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập thời điểm nâng lương" name="ngaynangluong" value="<?php echo date(""); ?>">
                    </div>
                    <div class="form-group">
                      <label>Hưởng chế độ BHXH <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập chế độ hưởng BHXH" name="huongbhxh" value="<?php echo isset($_POST['huongbhxh']) ? $_POST['huongbhxh'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['huongbhxh'])){ echo "Vui lòng nhập chế độ hưởng BHXH"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Học tập - nâng cao <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập chế độ học tập" name="hoctap" value="<?php echo isset($_POST['hoctap']) ? $_POST['hoctap'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['hoctap'])){ echo "Vui lòng nhập chế độ học tập"; } ?></small>
                    </div>
                      <div class="form-group">
                      <label>Kỷ luật lao động <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập kỷ luật lao động" name="kyluat" value="<?php echo isset($_POST['kyluat']) ? $_POST['kyluat'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['kyluat'])){ echo "Vui lòng nhập kỷ luật lao động"; } ?></small>
                    </div>
                      <div class="form-group">
                      <label>Ngày chấm dứt HĐLĐ <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày chấm dứt HĐLĐ" name="ngaythoiviec" value="<?php echo date(""); ?>">
                    </div>
                    <div class="form-group">
                      <label>Lý do chấm dứt <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập lý do thôi việc" name="lydothoiviec" value="<?php echo isset($_POST['lydothoiviec']) ? $_POST['lydothoiviec'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['lydothoiviec'])){ echo "Vui lòng nhập Email liên hệ"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nhiệm vụ <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập nhiệm vụ" name="nhiemvu" value="<?php echo isset($_POST['nhiemvu']) ? $_POST['nhiemvu'] : ''; ?>  ">
                      <small style="color: red;"><?php if(isset($error['nhiemvu'])){ echo "Vui lòng nhập nhiệm vụ"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ghi chú <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo isset($_POST['ghichu']) ? $_POST['ghichu'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['ghichu'])){ echo "Vui lòng nhập ghi chú"; } ?></small>
                    </div>
                    

                  </div>                                 
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <?php 
                  if($_SESSION['level'] == 1)
                    echo "<button type='submit' class='btn btn-primary' name='save'><i class='fa fa-plus'></i> Thêm mới nhân viên</button>";
                ?>
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