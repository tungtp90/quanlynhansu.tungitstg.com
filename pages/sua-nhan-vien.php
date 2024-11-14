<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  // show data
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $showData = "SELECT nv.id AS id, quoc_tich_id, ton_giao_id, dan_toc_id, loai_nv_id, bang_cap_id, phong_ban_id, chuc_vu_id, trinh_do_id, chuyen_mon_id, hon_nhan_id,
    ma_nv, hinh_anh, ten_nv, gioi_tinh, nv.ngay_tao AS ngay_tao, ngay_sinh, so_cmnd, ten_tinh_trang, ngay_cap_cmnd, noi_cap_cmnd,don_vi_id, email, ghi_chu_nv,
   ten_quoc_tich, ten_dan_toc, ten_ton_giao, dia_chi, ho_khau, ten_loai_nv, ten_trinh_do, ten_chuyen_mon, ten_bang_cap, ten_phong_ban, ten_chuc_vu, trang_thai_lv ,
   so_cchn, ngay_cap_cchn, noi_cap_cchn, pham_vi_hoat_dong_cm,chung_chi_khac, toantg_bantg, ngay_bat_dau_lam_viec, ngay_thu_viec, ngay_tham_gia_bhxh, nhiem_vu,
   luong_co_ban, thoi_han_nang_luong, huong_che_do_bhxh, hoc_tap, ky_luat, thoi_gian_nghi_viec, ly_do_nghi_viec, ten_phong_ban, ten_don_vi, ten_bang_cap, so_dien_thoai
  FROM nhanvien nv
  INNER JOIN quoc_tich qt ON nv.quoc_tich_id = qt.id
  INNER JOIN dan_toc dt ON nv.dan_toc_id = dt.id
  INNER JOIN ton_giao tg ON nv.ton_giao_id = tg.id
  INNER JOIN loai_nv lnv ON nv.loai_nv_id = lnv.id
  INNER JOIN trinh_do td ON nv.trinh_do_id = td.id
  INNER JOIN chuyen_mon cm ON nv.chuyen_mon_id = cm.id
  INNER JOIN bang_cap bc ON nv.bang_cap_id = bc.id
  INNER JOIN phong_ban pb ON nv.phong_ban_id = pb.id
  INNER JOIN chuc_vu cv ON nv.chuc_vu_id = cv.id
  INNER JOIN tinh_trang_hon_nhan hn ON nv.hon_nhan_id = hn.id
  INNER JOIN don_vi dv ON nv.don_vi_id = dv.id
  WHERE nv.id = $id; ";
    $result = mysqli_query($conn, $showData);
    $row = mysqli_fetch_array($result);
    //var_dump($row);
    // set option active
    $qt_id = $row['quoc_tich_id'];
    $ten_qt = $row['ten_quoc_tich'];

    $tg_id = $row['ton_giao_id'];
    $ten_tg = $row['ten_ton_giao'];

    $dt_id = $row['dan_toc_id'];
    $ten_dt = $row['ten_dan_toc'];

    $nv_id = $row['loai_nv_id'];
    $ten_nv = $row['ten_loai_nv'];

    $bc_id = $row['bang_cap_id'];
    $ten_bc = $row['ten_bang_cap'];

    $pb_id = $row['phong_ban_id'];
    $ten_pb = $row['ten_phong_ban'];

    $cv_id = $row['chuc_vu_id'];
    $ten_cv = $row['ten_chuc_vu'];

    $td_id = $row['trinh_do_id'];
    $ten_td = $row['ten_trinh_do'];

    $cm_id = $row['chuyen_mon_id'];
    $ten_cm = $row['ten_chuyen_mon'];

    $hn_id = $row['hon_nhan_id'];
    $ten_hn = $row['ten_tinh_trang'];

    //$hd_id = $row['loai_hop_dong_id'];
    //$ten_hd = $row['ten_loai_hop_dong'];

    $dv_id = $row['don_vi_id'];
    $ten_dv = $row['ten_don_vi'];


    // set value option another
    $qt = "SELECT id, ten_quoc_tich FROM quoc_tich WHERE id <> $qt_id";
    $resultQT = mysqli_query($conn, $qt);
    $arrQT = array();
    while ($rowQT = mysqli_fetch_array($resultQT)) 
    {
      $arrQT[] = $rowQT;
    }

    $tg = "SELECT id, ten_ton_giao FROM ton_giao WHERE id <> $tg_id";
    $resultTG = mysqli_query($conn, $tg);
    $arrTG = array();
    while ($rowTG = mysqli_fetch_array($resultTG)) 
    {
      $arrTG[] = $rowTG;
    }

    $dt = "SELECT id, ten_dan_toc FROM dan_toc WHERE id <> $dt_id";
    $resultDT = mysqli_query($conn, $dt);
    $arrDT = array();
    while ($rowDT = mysqli_fetch_array($resultDT)) 
    {
      $arrDT[] = $rowDT;
    }

    $lnv = "SELECT id, ten_loai_nv FROM loai_nv WHERE id <> $nv_id";
    $resultLNV = mysqli_query($conn, $lnv);
    $arrLNV = array();
    while ($rowLNV = mysqli_fetch_array($resultLNV)) 
    {
      $arrLNV[] = $rowLNV;
    }

    $bc = "SELECT id, ten_bang_cap FROM bang_cap WHERE id <> $bc_id";
    $resultBC = mysqli_query($conn, $bc);
    $arrBC = array();
    while ($rowBC = mysqli_fetch_array($resultBC)) 
    {
      $arrBC[] = $rowBC;
    }

    $pb = "SELECT id, ten_phong_ban FROM phong_ban WHERE id <> $pb_id";
    $resultPB = mysqli_query($conn, $pb);
    $arrPB = array();
    while ($rowPB = mysqli_fetch_array($resultPB)) 
    {
      $arrPB[] = $rowPB;
    }

    $cv = "SELECT id, ten_chuc_vu FROM chuc_vu WHERE id <> $cv_id";
    $resultCV = mysqli_query($conn, $cv);
    $arrCV = array();
    while ($rowCV = mysqli_fetch_array($resultCV)) 
    {
      $arrCV[] = $rowCV;
    }

    $td = "SELECT id, ten_trinh_do FROM trinh_do WHERE id <> $td_id";
    $resultTD = mysqli_query($conn, $td);
    $arrTD = array();
    while ($rowTD = mysqli_fetch_array($resultTD)) 
    {
      $arrTD[] = $rowTD;
    }

    $cm = "SELECT id, ten_chuyen_mon FROM chuyen_mon WHERE id <> $cm_id";
    $resultCM = mysqli_query($conn, $cm);
    $arrCM = array();
    while ($rowCM = mysqli_fetch_array($resultCM)) 
    {
      $arrCM[] = $rowCM;
    }

    $hn = "SELECT id, ten_tinh_trang FROM tinh_trang_hon_nhan WHERE id <> $hn_id";
    $resultHN = mysqli_query($conn, $hn);
    $arrHN = array();
    while ($rowHN = mysqli_fetch_array($resultHN)) 
    {
      $arrHN[] = $rowHN;
    }

    //$hd = "SELECT id, ten_loai_hop_dong FROM loai_hop_dong WHERE id <> $hd_id";
    //$resultHD = mysqli_query($conn, $hd);
    //$arrHD = array();
    //while ($rowHD = mysqli_fetch_array($resultHD)) 
    //{
    //  $arrHD[] = $rowHD;
    //}

    $dv = "SELECT id, ten_don_vi FROM don_vi WHERE id <> $dv_id";
    $resultDV = mysqli_query($conn, $dv);
    $arrDV = array();
    while ($rowDV = mysqli_fetch_array($resultDV)) 
    {
      $arrDV[] = $rowDV;
    }


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
    $hoKhau = $_POST['hoKhau'];
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

        // remove old image
        $oldImage = $row['hinh_anh'];

        // update data
        $update = " UPDATE nhanvien SET 
                    hinh_anh = '$imageName',
                    ten_nv ='$tenNhanVien',
                    ngay_sinh ='$ngaySinh', 
                    gioi_tinh ='$gioiTinh', 
                    dan_toc_id ='$danToc', 
                    so_cchn ='$socchn', 
                    ngay_cap_cchn ='$ngaycapcchn', 
                    noi_cap_cchn ='$noicapcchn', 
                    trang_thai_lv ='$trangThailv', 
                    pham_vi_hoat_dong_cm ='$phamvichuyenmon',
                    chung_chi_khac ='$chungchikhac', 
                    toantg_bantg ='$thoigianlamviec',                     
                    trinh_do_id ='$trinhDo', 
                    chuyen_mon_id ='$chuyenMon', 
                    chuc_vu_id ='$chucVu', 
                    ngay_bat_dau_lam_viec ='$ngaybatdaulam',                    
                    ngay_thu_viec ='$ngaythuviec', 
                    nhiem_vu ='$nhiemvu', 
                    ngay_tham_gia_bhxh ='$ngaythamgiabhxh', 
                    luong_co_ban ='$luongcoban', 
                    thoi_han_nang_luong ='$ngaynangluong', 
                    huong_che_do_bhxh = '$huongbhxh', 
                    hoc_tap  ='$hoctap', 
                    ky_luat ='$kyluat', 
                    thoi_gian_nghi_viec ='$ngaythoiviec', 
                    ly_do_nghi_viec ='$lydothoiviec', 
                    phong_ban_id ='$phongBan', 
                    don_vi_id ='$donvi', 
                    bang_cap_id ='$bangCap', 
                    so_cmnd ='$CMND', 
                    ngay_cap_cmnd ='$ngayCapcmnd', 
                    noi_cap_cmnd ='$noiCapcmnd', 
                    dia_chi ='$diachi',
                    ho_khau ='$hoKhau',  
                    so_dien_thoai ='$sodienthoai', 
                    email  ='$email',
                    loai_nv_id ='$loaiNhanVien',
                    quoc_tich_id ='$quocTich', 
                    hon_nhan_id ='$honNhan', 
                    ton_giao_id ='$tonGiao', 
                    nguoi_tao_id ='$id_user', 
                    ngay_tao ='$ngayTao',
                    nguoi_sua_id ='$id_user', 
                    ngay_sua ='$ngayTao',
                    ghi_chu_nv ='$ghichu'
                    WHERE id = $id";
        $result = mysqli_query($conn, $update);
        if($result)
        {
          $showMess = true;

          // remove old image
          if($oldImage != "demo-3x4.jpg")
          {
            unlink($target_dir . $oldImage);
          }

          // move image
          move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $moveFile);

          $success['success'] = 'Lưu thông tin thành công';
          echo '<script>setTimeout("window.location=\'sua-nhan-vien.php?p=staff&a=list-staff&id='.$id.'\'",1000);</script>';
        }
      }
      else
      {
        $showMess = true;
        // update data
        $update = " UPDATE nhanvien SET 
                    ten_nv ='$tenNhanVien',
                    ngay_sinh ='$ngaySinh', 
                    gioi_tinh ='$gioiTinh', 
                    dan_toc_id ='$danToc', 
                    so_cchn ='$socchn', 
                    ngay_cap_cchn ='$ngaycapcchn', 
                    noi_cap_cchn ='$noicapcchn', 
                    trang_thai_lv ='$trangThailv', 
                    pham_vi_hoat_dong_cm ='$phamvichuyenmon',
                    chung_chi_khac ='$chungchikhac', 
                    toantg_bantg ='$thoigianlamviec',                     
                    trinh_do_id ='$trinhDo', 
                    chuyen_mon_id ='$chuyenMon', 
                    chuc_vu_id ='$chucVu', 
                    ngay_bat_dau_lam_viec ='$ngaybatdaulam',                    
                    ngay_thu_viec ='$ngaythuviec', 
                    nhiem_vu ='$nhiemvu', 
                    ngay_tham_gia_bhxh ='$ngaythamgiabhxh', 
                    luong_co_ban ='$luongcoban', 
                    thoi_han_nang_luong ='$ngaynangluong', 
                    huong_che_do_bhxh = '$huongbhxh', 
                    hoc_tap  ='$hoctap', 
                    ky_luat ='$kyluat', 
                    thoi_gian_nghi_viec ='$ngaythoiviec', 
                    ly_do_nghi_viec ='$lydothoiviec', 
                    phong_ban_id ='$phongBan', 
                    don_vi_id ='$donvi', 
                    bang_cap_id ='$bangCap', 
                    so_cmnd ='$CMND', 
                    ngay_cap_cmnd ='$ngayCapcmnd', 
                    noi_cap_cmnd ='$noiCapcmnd', 
                    dia_chi ='$diachi',
                    ho_khau ='$hoKhau',  
                    so_dien_thoai ='$sodienthoai', 
                    email  ='$email',
                    loai_nv_id ='$loaiNhanVien',
                    quoc_tich_id ='$quocTich', 
                    hon_nhan_id ='$honNhan', 
                    ton_giao_id ='$tonGiao', 
                    nguoi_tao_id ='$id_user', 
                    ngay_tao ='$ngayTao',
                    nguoi_sua_id ='$id_user', 
                    ngay_sua ='$ngayTao',
                    ghi_chu_nv ='$ghichu'
                    WHERE id = $id";
        $result = mysqli_query($conn, $update);
        if($result)
        {
          $success['success'] = 'Lưu thông tin thành công';
          echo '<script>setTimeout("window.location=\'sua-nhan-vien.php?p=staff&a=list-staff&id='.$id.'\'",1000);</script>';

        }
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
                    <h1>Thêm nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa nhân viên</li>
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
              <h3 class="card-title">Chỉnh sửa thông tin nhân viên</h3> &emsp;
              <small>Những ô nhập có dấu <span style="color: red;">*</span> là bắt buộc</small>
              
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
                      <input type="text" class="form-control" id="exampleInputEmail1" name="maNhanVien" value="<?php echo $row['ma_nv']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tên nhân viên <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên nhân viên" name="tenNhanVien" value="<?php echo $row['ten_nv']; ?>">
                      <small style="color: red;"><?php if(isset($error['tenNhanVien'])){ echo "Tên nhân viên không được để trống"; } ?></small>
                    </div>
                    
                    <div class="form-group">
                      <label>Tình trạng hôn nhân <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="honNhan">
                      <option value="<?php echo $hn_id; ?>"><?php echo $ten_hn; ?></option>
                        <?php 
                          foreach ($arrHN as $hn)
                          {                           
                            echo "<option value='".$hn['id']."'>".$hn['ten_tinh_trang']."</option>";
                          }                          
                             
                        ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['honNhan'])){ echo "Vui lòng chọn tình trạng hôn nhân"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Số CMND <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập số CMND" name="CMND" value="<?php echo $row['so_cmnd']; ?>">
                      <small style="color: red;"><?php if(isset($error['CMND'])){ echo "Vui lòng nhập số CMND"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày cấp CMND <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày cấp" name="ngayCapcmnd" value="<?php echo $row['ngay_cap_cmnd']; ?>">
                    </div>
                    
                    
                    <div class="form-group">
                      <label>Quốc tịch <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="quocTich">
                      <option value="<?php echo $qt_id; ?>"><?php echo $ten_qt; ?></option>
                      <?php 
                        foreach ($arrQT as $qt)
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
                      <option value="<?php echo $tg_id; ?>"><?php echo $ten_tg; ?></option>
                      <?php 
                      foreach ($arrTG as $tg)
                      {
                        echo "<option value='".$tg['id']."'>".$tg['ten_ton_giao']."</option>";
                      }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Dân tộc <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="danToc">
                      <option value="<?php echo $dt_id; ?>"><?php echo $ten_dt; ?></option>
                      <?php 
                      foreach ($arrDT as $dt)
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
                      <option value="<?php echo $nv_id; ?>"><?php echo $ten_nv; ?></option>
                      <?php 
                        foreach ($arrLNV as $lnv)
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
                      <option value="<?php echo $bc_id; ?>"><?php echo $ten_bc; ?></option>
                      <?php 
                        foreach ($arrBC as $bc)
                        {
                          echo "<option value='".$bc['id']."'>".$bc['ten_bang_cap']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Trạng thái làm việc <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="trangThailv">
                      <?php 
                        if($row['trang_thai_lv'] == 1)
                        {
                          echo "<option value='1' selected>Đang làm việc</option>";
                          echo "<option value='0'>Đã nghỉ việc</option>";
                        }
                        else
                        {
                          echo "<option value='1'>Đang làm việc</option>";
                          echo "<option value='0' selected>Đã nghỉ việc</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['trangThailv'])){ echo "Vui lòng chọn trạng thái làm việc"; } ?></small>
                    </div>
                      
                      <div class="form-group">
                      <label>Phạm vi hoạt động chuyên môn <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập phạm vi chuyên môn" name="phamvichuyenmon" value="<?php echo $row['pham_vi_hoat_dong_cm']; ?>">
                      <small style="color: red;"><?php if(isset($error['phamvichuyenmon'])){ echo "Vui lòng nhập phạm vi hoạt động chuyên môn"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Chứng chỉ khác <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập chứng chỉ khác" name="chungchikhac" value="<?php echo $row['chung_chi_khac']; ?>">
                      <small style="color: red;"><?php if(isset($error['chungchikhac'])){ echo "Vui lòng nhập chứng chỉ khác"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Thời gian làm việc ( Toàn TG - Bán TG) <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập thời gian làm việc" name="thoigianlamviec" value="<?php echo $row['toantg_bantg']; ?>">
                      <small style="color: red;"><?php if(isset($error['thoigianlamviec'])){ echo "Vui lòng nhập thời gian làm việc"; } ?></small>
                    </div>
                    
                    <div class="form-group">
                      <label>Đơn vị cơ sở <span style="color: red;">*</span> : </label>
                      <select class="form-control" name="donvi">
                      <option value="<?php echo $dv_id; ?>"><?php echo $ten_dv; ?></option>
                      <?php 
                        foreach ($arrDV as $donvi)
                        {
                          echo "<option value='".$donvi['id']."'>".$donvi['ten_don_vi']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['donvi'])){ echo "Vui lòng chọn đơn vị cơ sở"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày bắt đầu làm việc <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày bắt đầu làm việc" name="ngaybatdaulam" value="<?php echo $row['ngay_bat_dau_lam_viec']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Ngày thử việc <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày thử việc" name="ngaythuviec" value="<?php echo $row['ngay_thu_viec']; ?>">
                    </div>
                                    
                    <div class="form-group">
                      <label>Số CCHN <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Số CCHN" name="socchn" value="<?php echo $row['so_cchn']; ?>">
                      <small style="color: red;"><?php if(isset($error['socchn'])){ echo "Vui lòng nhập"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày cấp CCHN <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày cấp CCHN" name="ngaycapcchn" value="<?php echo $row['ngay_cap_cchn']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Nơi cấp CCHN <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Số CCHN" name="noicapcchn" value="<?php echo $row['noi_cap_cchn']; ?>">
                      <small style="color: red;"><?php if(isset($error['socchn'])){ echo "Vui lòng nhập nơi cấp CCHN"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nhiệm vụ <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập nhiệm vụ" name="nhiemvu" value="<?php echo $row['nhiem_vu']; ?>  ">
                      <small style="color: red;"><?php if(isset($error['nhiemvu'])){ echo "Vui lòng nhập nhiệm vụ"; } ?></small>
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
                      <?php 
                        if($row['gioi_tinh'] == 1)
                        {
                          echo "<option value='1' selected>Nam</option>";
                          echo "<option value='0'>Nữ</option>";
                        }
                        else
                        {
                          echo "<option value='1'>Nam</option>";
                          echo "<option value='0' selected>Nữ</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['gioiTinh'])){ echo "Vui lòng chọn giới tính"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày sinh: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="ngaySinh" value="<?php echo $row['ngay_sinh']; ?>">
                    </div>                  
                    <div class="form-group">
                    <label>Địa chỉ hiện tại: <span style="color: red;">*</span>: </label>
                      <textarea class="form-control" name="diachi" rows="1"><?php echo $row['dia_chi']; ?></textarea>
                      <small style="color: red;"><?php if(isset($error['diachi'])){ echo "Vui lòng nhập địa chỉ nơi ở hiện tại"; } ?></small>
                    </div>
                    <div class="form-group">
                    <label>Hộ khẩu: <span style="color: red;">*</span>: </label>
                      <textarea class="form-control" name="hoKhau" rows="1"><?php echo $row['ho_khau']; ?></textarea>
                      <small style="color: red;"><?php if(isset($error['hoKhau'])){ echo "Vui lòng nhập hộ khẩu"; } ?></small>
                    </div>
                    
                    <div class="form-group">
                      <label>Nơi cấp CMND <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập nơi cấp CMND" name="noiCapcmnd" value="<?php echo $row['noi_cap_cmnd']; ?>">
                      <small style="color: red;"><?php if(isset($error['noiCapcmnd'])){ echo "Vui lòng nhập nơi cấp CMND"; } ?></small>
                    </div>

                    <div class="form-group">
                      <label>Phòng ban <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="phongBan">
                      <option value="<?php echo $pb_id; ?>"><?php echo $ten_pb; ?></option>
                      <?php 
                        foreach ($arrPB as $pb)
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
                      <option value="<?php echo $cv_id; ?>"><?php echo $ten_cv; ?></option>
                      <?php 
                      foreach ($arrCV as $cv)
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
                      <option value="<?php echo $td_id; ?>"><?php echo $ten_td; ?></option>
                      <?php 
                        foreach ($arrTD as $td)
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
                      <option value="<?php echo $cm_id; ?>"><?php echo $ten_cm; ?></option>
                      <?php 
                        foreach ($arrCM as $cm)
                        {
                          echo "<option value='".$cm['id']."'>".$cm['ten_chuyen_mon']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                    
                    <!-- so dien thoai-->
                    <div class="form-group">
                      <label>Số điện thoại <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập Số điện thoại" name="sodienthoai" value="<?php echo $row['so_dien_thoai']; ?>">
                      <small style="color: red;"><?php if(isset($error['sodienthoai'])){ echo "Vui lòng nhập số điện thoại"; } ?></small>
                    </div>
                    <!-- End so dien thoai-->
                    <!-- Địa chỉ email-->
                    <div class="form-group">
                      <label>Email <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ Email" name="email" value="<?php echo $row['email']; ?>">
                      <small style="color: red;"><?php if(isset($error['email'])){ echo "Vui lòng nhập địa chỉ Email"; } ?></small>
                    </div>
                    <!-- End Địa chỉ email-->
                    <div class="form-group">
                      <label>Ngày tham gia BHXH <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày tham gia BHXH" name="ngaythamgiabhxh" value="<?php echo $row['ngay_tham_gia_bhxh']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Lương cơ bản <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập mức lương cơ bản" name="luongcoban" value="<?php echo $row['luong_co_ban']; ?>">
                      <small style="color: red;"><?php if(isset($error['luongcoban'])){ echo "Vui lòng nhập mức lương cơ bản"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Thời điểm nâng lương <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập thời điểm nâng lương" name="ngaynangluong" value="<?php echo $row['thoi_han_nang_luong']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Hưởng chế độ BHXH <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập chế độ hưởng BHXH" name="huongbhxh" value="<?php echo $row['huong_che_do_bhxh']; ?>">
                      <small style="color: red;"><?php if(isset($error['huongbhxh'])){ echo "Vui lòng nhập chế độ hưởng BHXH"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Học tập - nâng cao <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập chế độ học tập" name="hoctap" value="<?php echo $row['hoc_tap']; ?>">
                      <small style="color: red;"><?php if(isset($error['hoctap'])){ echo "Vui lòng nhập chế độ học tập"; } ?></small>
                    </div>
                      <div class="form-group">
                      <label>Kỷ luật lao động <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập kỷ luật lao động" name="kyluat" value="<?php echo $row['ky_luat']; ?>">
                      <small style="color: red;"><?php if(isset($error['kyluat'])){ echo "Vui lòng nhập kỷ luật lao động"; } ?></small>
                    </div>
                      <div class="form-group">
                      <label>Ngày chấm dứt HĐLĐ <span style="color: red;"></span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày chấm dứt HĐLĐ" name="ngaythoiviec" value="<?php echo $row['thoi_gian_nghi_viec']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Lý do chấm dứt <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập lý do thôi việc" name="lydothoiviec" value="<?php echo $row['ly_do_nghi_viec']; ?>">
                      <small style="color: red;"><?php if(isset($error['lydothoiviec'])){ echo "Vui lòng nhập Email liên hệ"; } ?></small>
                    </div>
                    
                    <div class="form-group">
                      <label>Ghi chú <span style="color: red;"></span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $row['ghi_chu_nv']; ?>">
                      <small style="color: red;"><?php if(isset($error['ghichu'])){ echo "Vui lòng nhập ghi chú"; } ?></small>
                    </div>
                    

                  </div>                                 
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <?php 
                if($_SESSION['level'] == 1)
                  echo "<button type='submit' class='btn btn-warning' name='save'><i class='fa fa-save'></i> Lưu lại thông tin</button>";
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