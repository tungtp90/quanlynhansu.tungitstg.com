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
  $NV = "SELECT id, ma_nv, ten_nv FROM nhanvien";
  $resultNV = mysqli_query($conn, $NV);
  $arrNV = array();
  while ($rowNV = mysqli_fetch_array($resultNV)) {
    $arrNV[] = $rowNV;
  }

  /* $LHD = "SELECT id, ten_loai_hop_dong FROM loai_hop_dong";
  $resultLHD = mysqli_query($conn, $LHD);
  $arrLHD = array();
  while ($rowLHD = mysqli_fetch_array($resultLHD)) {
    $arrLHD[] = $rowLHD;
  } */

   // lấy số hd lớn nhất
   $hd = "SELECT MAX(id) as id FROM ky_hop_dong";
	$resultHD = mysqli_query($conn, $hd);
	$rowHD = mysqli_fetch_array($resultHD);
	$shd = $rowHD['id'];    
  $i=$shd;
  if($i ==  $shd){
    $i = $i+1;
    //echo "<script>alert('$i');</script>";
  }  
  // lấy ngày tháng hiện tại 
  $date = getdate();
  //echo "Thứ: ".$date['weekday']."<hr>";
  //echo "Ngày: ".$date['mday']."<hr>";
  //echo "Tháng: ".$date['mon']."<hr>";
  //echo "Năm: ".$date['year']."<hr>";
  //echo "Giờ: ".$date['hours']."<hr>";
  //echo "Phút: ".$date['minutes']."<hr>";
  //echo "Giây: ".$date['seconds']."<hr>";

  
  // create code room
  $MahopDong = $i.'.'.$date['year']."/HĐLĐ-HT";

  // delete record
  if(isset($_POST['save']))
  {
    // create array error
    $error = array();
    $success = array();
    $showMess = false;

    // get id in form
    $maNhanVien = $_POST['maNhanVien'];
    $loaiHD = $_POST['loaiHD'];
    $ngaySoanHD = $_POST['ngaySoanHD'];   
    $ngayKyHD = $_POST['ngayKyHD']; 
    $ngayhieulucHD = $_POST['ngayhieulucHD'];   
    $diaDiemKyHD = $_POST['diaDiemKyHD'];
    $noiDungHD = $_POST['noiDungHD'];
    $ghiChuHD = $_POST['ghiChuHD'];    
    $diaDiemLV = $_POST['diaDiemLV'];
    $phuongTien = $_POST['phuongTien'];
    $thoigianNgay = $_POST['thoigianNgay'];
    $thoigianTuan = $_POST['thoigianTuan'];
    $thoigianNghingoi = $_POST['thoigianNghingoi'];
    $luongCanBan = $_POST['luongCanBan'];
    $phuCapCV = $_POST['phuCapCV'];
    $phuCapDH = $_POST['phuCapDH'];
    $phucapAn = $_POST['phucapAn'];
    $phucapDT = $_POST['phucapDT'];
    $phucapXang = $_POST['phucapXang'];
    $chiPhidiLai = $_POST['chiPhidiLai'];
    $thuongLeTet = $_POST['thuongLeTet'];
    $hinhthucTraLuong = $_POST['hinhthucTraLuong'];
    $thoigianTraLuong = $_POST['thoigianTraLuong'];
    $cheDoNangLuong = $_POST['cheDoNangLuong'];
    $BHXH_BHYT_BHTN = $_POST['BHXH_BHYT_BHTN'];
    $nguoiTao = $_POST['nguoiTao'];
    $ngayTao = date("Y-m-d H:i:s");
    
        

    // validate
    if($maNhanVien == 'chon')
      $error['maNhanVien'] = 'error';
    //if(empty($ngayKetThuc))
      //$error['ngayKetThuc'] = 'error';
    //if(!empty($ngayKetThuc) && ($ngayBatDau > $ngayKetThuc))
     // $error['loiNgay'] = 'error';
    if(empty($diaDiemKyHD))
      $error['diaDiemKyHD'] = 'error'; 

    // kiem tra nhan vien co dang trong qua trinh cong tac
    $check = "SELECT nhan_vien_id FROM ky_hop_dong   WHERE nhan_vien_id = '$maNhanVien'";
    $resultCheck = mysqli_query($conn, $check);
    if(mysqli_num_rows($resultCheck) != 0)
    {
      $error['dangCongTac'] = 'error';
      echo "<script>alert('Nhân viên này đã có hợp đồng, vui lòng kiểm tra lại!');</script>";
    }

    echo '$_POST';
    if(!$error)
    {
      $showMess = true;
      $insert = "INSERT INTO ky_hop_dong (ma_hd, nhan_vien_id, loai_hop_dong, ngay_soan_hd, ngay_ky_hd, ngay_hieu_luc_hd, dia_diem_ky_hd, noi_dung_hd, ghi_chu_hd, dia_diem_lv, phuong_tien, tg_ngay, tg_tuan, tg_nghi_ngoi, luong_can_ban, pc_cong_viec, pc_doc_hai, pc_an_trua, pc_dien_thoai, pc_xang_xe, chi_phi_di_lai, le_tet, hinh_thuc_tra_luong, thoi_gian_tra_luong, che_do_nang_luong, bhyt_bhxh, nguoi_tao, ngay_tao, xoa) 
      VALUES('$MahopDong','$maNhanVien','$loaiHD' ,'$ngaySoanHD','$ngayKyHD','$ngayhieulucHD', '$diaDiemKyHD', '$noiDungHD', '$ghiChuHD', '$diaDiemLV','$phuongTien','$thoigianNgay','$thoigianTuan', '$thoigianNghingoi', '$luongCanBan', '$phuCapCV', '$phuCapDH','$phucapAn','$phucapDT','$phucapXang','$chiPhidiLai','$thuongLeTet','$hinhthucTraLuong','$thoigianTraLuong' , '$cheDoNangLuong','$BHXH_BHYT_BHTN','$nguoiTao','$ngayTao','0')";
      $result = mysqli_query($conn, $insert);
      // update loai hop dong bang nhan vien
      $update = "UPDATE nhanvien SET loai_hd = '$loaiHD' WHERE id = '$maNhanVien' ";
      $result2 = mysqli_query($conn, $update);
      if($result)
      {
        $success['success'] = 'Khởi tạo hợp đồng thành công';
        echo '<script>setTimeout("window.location=\'ky-hop-dong.php?\'",3000);</script>';
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
                    <h1>Ký hợp đồng ngoài Y Tế</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Ký hợp đồng</li>
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
              <h3 class="card-title">Tạo mới hợp đồng</h3>
              
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
                      <label for="exampleInputEmail1">Mã hợp đồng: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="MahopDong" value="<?php echo $MahopDong; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Chọn nhân viên: <span style="color: red;">*</span> : </label>
                      <select class="form-control" name="maNhanVien">
                        <option value="chon">--- Chọn nhân viên ---</option>
                        <?php 
                        foreach ($arrNV as $nv) 
                        {
                          echo "<option value='".$nv['id']."'>". $nv['ma_nv'] ." - ".$nv['ten_nv']."</option>";
                        }
                        ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['maNhanVien'])){ echo 'Vui lòng chọn nhân viên';} ?></small>
                    </div>
                    <div class="form-group">
                      <label>Loại hợp đồng <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="loaiHD">
                        <option value="chon">--- Chọn trạng loại hợp đồng ---</option>
                        <option value="1">Hợp đồng không xác định thời hạn</option>
                        <option value="2">Hợp đồng có xác định thời hạn</option>
                        <option value="3">Hợp đồng thử việc</option>
                      </select>
                      <small style="color: red;"><?php if(isset($error['loaiHD'])){ echo "Vui lòng chọn loại hợp đồng"; } ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ngày soạn hợp đồng: </label>
                        <input type="date" class="form-control" id="exampleInputEmail1" name="ngaySoanHD" value="<?php echo date('Y-m-d'); ?>"  >
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ngày ký hợp đồng: <span style="color: red;">*</span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="ngayKyHD" value="<?php echo date('Y-m-d'); ?>">
                      <small style="color: red;"><?php if(isset($error['loiNgay'])){ echo 'Ngày bắt đầu <b> không được sau </b> ngày kết thúc';} ?></small>
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ngày hiệu lực hợp đồng: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="ngayhieulucHD" value="<?php echo date('Y-m-d'); ?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Địa điểm ký hợp đồng<span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="diaDiemKyHD" placeholder="Vui lòng nhập địa điểm">
                      <small style="color: red;"><?php if(isset($error['diaDiemKyHD'])){ echo 'Vui lòng nhập địa điểm ký hợp đồng';} ?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nội dung công việc: </label>
                      <textarea id="editor" rows="1" cols="" class="form-control" name="noiDungHD">
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ghi chú: </label>
                      <textarea id="editor" rows="1" class="form-control" name="ghiChuHD"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Địa điểm làm việc: </label>
                      <textarea id="editor" rows="1" class="form-control" name="diaDiemLV">Các cơ sở y tế trực thuộc Công ty TNHH Hoàng Tuấn</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phương tiện đi lại: </label>
                      <textarea id="editor" rows="1" class="form-control" name="phuongTien">Cá nhân tự túc</textarea>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Thời gian ngày: </label>
                        <textarea id="editor" rows="1" class="form-control" name="thoigianNgay">08 h/ngày - Sáng từ 07h đến 11h, Chiều từ 13h đến 17h.</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Thời gian tuần: </label>
                        <textarea id="editor" rows="1" class="form-control" name="thoigianTuan">06 ngày/tuần.</textarea>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">Người tạo: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>" name="nguoiTao" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ngày tạo: </label>
                      <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="ngayTao" readonly>
                    </div>
                    <!-- /.form-group -->
                    <?php 
                      if($_SESSION['level'] == 1)
                        echo "<button type='submit' class='btn btn-primary' name='save'><i class='fa fa-plus'></i> Khởi tạo hợp đồng</button>";
                    ?>
                  </div>
                  <!-- /.col -->

                  <div class="col-md-6">                    
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Thời gian nghỉ ngơi: </label>
                        <textarea id="editor" rows="1" class="form-control" name="thoigianNghingoi">Nghỉ hằng năm, nghỉ lễ, tết, nghỉ việc riêng: Theo quy định của Luật lao động.</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Lương căn bản: </label>
                        <textarea id="editor" rows="1" class="form-control" name="luongCanBan">5.096.000</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phụ cấp công việc: </label>
                        <textarea id="editor" rows="1" class="form-control" name="phuCapCV">Không có</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phục cấp độc hại: </label>
                        <textarea id="editor" rows="1" class="form-control" name="phuCapDH">182.000</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Hỗ trợ ăn trưa: </label>
                        <textarea id="editor" rows="1" class="form-control" name="phucapAn">1.300.000</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Hỗ trợ điện thoại: </label>
                        <textarea id="editor" rows="1" class="form-control" name="phucapDT">200.000</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Hỗ trợ tiền xăng xe: </label>
                        <textarea id="editor" rows="1" class="form-control" name="phucapXang">200.000</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Hỗ trợ chi phí đi lại: </label>
                        <textarea id="editor" rows="1" class="form-control" name="chiPhidiLai">1.000.000</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Thưởng lễ - Tết: </label>
                        <textarea id="editor" rows="1" class="form-control" name="thuongLeTet">Theo Quy chế Lương thưởng của Công ty</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Hình thức trả lương: </label>
                        <textarea id="editor" rows="1" class="form-control" name="hinhthucTraLuong">Một lần bằng tiền mặt.</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Thời gian trả lương: </label>
                        <textarea id="editor" rows="1" class="form-control" name="thoigianTraLuong">Từ ngày 02 đến ngày 05 của tháng tiếp theo.</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Chế độ nâng lương: </label>
                        <textarea id="editor" rows="1" class="form-control" name="cheDoNangLuong">Thực hiện theo quy chế lương thưởng của Công ty và căn cứ vào kết quả thực hiện công việc của người lao động.</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">BHXH-BHYT-BHTN: </label>
                        <textarea id="editor" rows="1" class="form-control" name="BHXH_BHYT_BHTN">Được tham gia bảo hiểm theo quy định của Luật bảo hiểm về mức tham gia và tỷ lệ đóng.</textarea>
                      </div>
                      
                      <!-- /.form-group -->                    
                    
                  </div>
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