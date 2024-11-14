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
    $showData = "SELECT nv.id AS id, ma_nv, hinh_anh, ten_nv, gioi_tinh, nv.ngay_tao AS ngay_tao, ngay_sinh, so_cmnd, ten_tinh_trang, ngay_cap_cmnd, noi_cap_cmnd,
    ten_quoc_tich, ten_dan_toc, ten_ton_giao, dia_chi, ten_loai_nv, ten_trinh_do, ten_chuyen_mon, ten_bang_cap, ten_phong_ban, ten_chuc_vu, trang_thai_lv ,
    so_cchn, ngay_cap_cchn, noi_cap_cchn, pham_vi_hoat_dong_cm,chung_chi_khac, toantg_bantg, ngay_bat_dau_lam_viec, ngay_thu_viec, ngay_tham_gia_bhxh, nhiem_vu,
    luong_co_ban, thoi_han_nang_luong, huong_che_do_bhxh, hoc_tap, ky_luat, thoi_gian_nghi_viec, ly_do_nghi_viec, ten_phong_ban, ten_don_vi, ten_bang_cap, so_dien_thoai,
     loai_hd, ghi_chu_nv
    FROM nhanvien nv, quoc_tich qt, dan_toc dt, ton_giao tg, loai_nv lnv, trinh_do td, chuyen_mon cm, bang_cap bc, phong_ban pb, chuc_vu cv, tinh_trang_hon_nhan hn , don_vi dv
    WHERE nv.quoc_tich_id = qt.id AND nv.dan_toc_id = dt.id AND nv.ton_giao_id = tg.id AND nv.loai_nv_id = lnv.id AND nv.trinh_do_id = td.id AND nv.chuyen_mon_id = cm.id AND nv.bang_cap_id = bc.id AND nv.phong_ban_id = pb.id AND nv.chuc_vu_id = cv.id AND nv.hon_nhan_id = hn.id AND nv.id = $id";
    $result = mysqli_query($conn, $showData);
    $row = mysqli_fetch_array($result);
    
  }
  

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thông tin nhân viên
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i></a></li>
        <li><a href="danh-sach-nhan-vien.php?p=staff&a=list-staff"></a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
        <div class="col-xs-12">
          <div class="card card-info">
            <div class="card-header with-border">
            <?php
              if (empty($id) ) {
                echo "mã rỗng";
                }else{
                  echo "-";
                  echo"$id";
                }
                //kiểm tra mảng rỗng
                if(empty($row)){
                  
                  echo "mảng rỗng";
                }else{
                  echo "";
                }             
              
            ?>
              <h3 class="card-title">Mã nhân viên: <?php echo $row['ma_nv']; ?></h3>
              
            </div>
            
            
            <!-- /.box-header -->
            <div class="card-body">
              <div class="row invoice-info">
                <div class="col-lg-2">
                  <img src="../uploads/staffs/<?php echo $row['hinh_anh']; ?>" width="80%">
                </div>
                <div class="col-sm-2 invoice-col">
                  <p class="box-title">Tên nhân viên: 
                    <b><?php echo $row['ten_nv']; ?></b>
                  </p>
                  <p class="box-title">Ngày sinh: 
                    <b><?php $date = date_create($row['ngay_sinh']); echo date_format($date, 'd-m-Y'); ?></b>
                  </p>                  
                  <p class="box-title">Giới tính: 
                    <b><?php if($row['gioi_tinh'] == 1){ echo "Nam"; } else { echo "Nữ"; } ?></b>
                  </p>                  
                  <p class="box-title">Dân tộc: 
                    <b><?php echo $row['ten_dan_toc']; ?></b>
                  </p>
                  <p class="box-title">Số CCHN: 
                    <b><?php echo $row['so_cchn']; ?></b>
                  </p>
                  <p class="box-title">Ngày cấp CCHN: 
                    <b><?php echo $row['ngay_cap_cchn']; ?></b>
                  </p>
                  <p class="box-title">Nơi cấp CCHN: 
                    <b><?php echo $row['noi_cap_cchn']; ?></b>
                  </p>
                  <p class="box-title">Hôn nhân: 
                    <b><?php echo $row['ten_tinh_trang']; ?></b>
                  </p>
                  <p class="box-title">Phạm vi chuyên môn: 
                    <b><?php echo $row['pham_vi_hoat_dong_cm']; ?></b>
                  </p>
                  <p class="box-title">Chứng chỉ khác: 
                    <b> <?php echo $row['chung_chi_khac']; ?> </b>
                  </p>
                  
                </div>
                <!-- col-5 -->
                <div class="col-sm-2 invoice-col">
                  <p class="box-title">Thời gian làm việc: 
                    <b> <?php echo $row['toantg_bantg']; ?> </b>
                  </p>
                  <p class="box-title">Loại hợp đồng: 
                    <b>
                      <?php
                      if($row['loai_hd']==1)
                       {
                       echo 'Không thời hạn'; 
                      }
                      if($row['loai_hd']==2)
                       {
                       echo 'Có thời hạn'; 
                      }
                      if($row['loai_hd']==3)
                       {
                       echo 'thử việc'; 
                      }
                       ?> 
                       </b>
                  </p>
                  <p class="box-title">Trình độ: 
                    <b> <?php echo $row['ten_trinh_do']; ?> </b>
                  </p>
                  <p class="box-title">Chuyên môn: 
                    <b> <?php echo $row['ten_chuyen_mon']; ?> </b>
                  </p>                  
                  <p class="box-title">Chức vụ: 
                   <b> <?php echo $row['ten_chuc_vu']; ?></b>
                  </p>
                  <p class="box-title">Ngày bắt đầu làm: 
                    <b><?php echo $row['ngay_bat_dau_lam_viec']; ?></b>
                  </p>
                  <p class="box-title">Ngày thử việc: 
                    <b><?php echo $row['ngay_thu_viec']; ?></b>
                  </p>
                  <p class="box-title">Ngày Tham gia BHXH: 
                    <b><?php echo $row['ngay_tham_gia_bhxh']; ?></b>
                  </p>
                  <p class="box-title">Nhiệm vụ: 
                    <b><?php echo $row['nhiem_vu']; ?></b>
                  </p>
                  <p class="box-title">Ghi chú: 
                    <b><?php echo $row['ghi_chu_nv']; ?></b>
                  </p>
                  
                </div>
                <!-- col-5 -->
                <div class="col-sm-2 invoice-col">
                  <p class="box-title">Thời hạn nâng lương: 
                    <b><?php echo $row['thoi_han_nang_luong']; ?></b>
                  </p>
                  
                  <p class="box-title">Đang hưởng chế độ BHXH: 
                    <b><?php echo $row['huong_che_do_bhxh']; ?></b>
                  </p>
                  
                  <p class="box-title">Học tập nâng cao: 
                    <b><?php echo $row['hoc_tap']; ?></b>
                  </p>
                  
                  <p class="box-title">Kỷ luật: 
                    <b><?php echo $row['ky_luat']; ?></b>
                  </p>
                  
                  <p class="box-title">Ngày nghỉ việc: 
                    <b><?php echo $row['thoi_gian_nghi_viec']; ?></b>
                  </p>
                  
                  <p class="box-title">Lý do nghỉ việc: 
                    <b><?php echo $row['ly_do_nghi_viec']; ?></b>
                  </p>
                  
                  <p class="box-title">Phòng ban: 
                    <b><?php echo $row['ten_phong_ban']; ?></b>
                  </p>
                  
                  <p class="box-title">Đơn vị: 
                    <b><?php echo $row['ten_don_vi']; ?></b>
                  </p>
                 
                  <p class="box-title">Bằng cấp: 
                    <b><?php echo $row['ten_bang_cap']; ?></b>
                  </p>
                  
                  
                  
                
                </div>
                <!-- col-5 -->
                <div class="col-sm-4 invoice-col">
                <p class="box-title">Loại nhân viên: 
                    <b><?php echo $row['ten_loai_nv']; ?></b>
                  </p>
                  <p class="box-title">Quốc tịch: 
                    <b><?php echo $row['ten_quoc_tich']; ?></b>
                  </p>
                  <p class="box-title">Tôn giáo: 
                    <b><?php echo $row['ten_ton_giao']; ?></b>
                  </p>
                  <p class="box-title">Số CMND: 
                    <b><?php echo $row['so_cmnd']; ?></b>
                  </p>
                  <p class="box-title">Ngày cấp CMND: 
                   <b><?php $ngayCap = date_create($row['ngay_cap_cmnd']); echo date_format($ngayCap, 'd-m-Y'); ?></b>
                  </p>
                  <p class="box-title">Nơi cấp CMND: 
                    <b><?php echo $row['noi_cap_cmnd']; ?></b>
                  </p>
                  <p class="box-title">Địa chỉ: 
                    <b><?php echo $row['dia_chi']; ?></b>
                  </p>
                  <p class="box-title">Số điện thoại: 
                    <b><?php echo $row['so_dien_thoai']; ?></b>
                  </p>
                    <p class="box-title">Trạng thái: 
                    
                      <?php 
                        if($row['trang_thai_lv'] == 1)
                        {
                          echo '<span class="badge bg-blue"> Đang làm việc </span>';
                        }
                        else
                        {
                          echo '<span class="badge bg-red"> Đã nghỉ việc </span>';
                        }
                      ?>
                    </span>
                  </p>
                  

                </div>
              </div>
              <!-- row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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