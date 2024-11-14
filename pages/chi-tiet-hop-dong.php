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
    $showData = "SELECT khd.id AS id,hinh_anh, nv.ma_nv, nv.ten_nv, nv.ngay_sinh, (CASE nv.gioi_tinh
    WHEN 1 THEN 'Nam' ELSE 'Nữ'
  END) AS gioi_tinh, dt.ten_dan_toc, nv.so_cchn, nv.ngay_cap_cchn,
  nv.noi_cap_cchn, (CASE nv.trang_thai_lv WHEN 1 THEN 'Đang làm việc'
    ELSE 'Đã nghỉ việc'
  END) AS trang_thai_lv, nv.pham_vi_hoat_dong_cm, nv.chung_chi_khac,
  nv.toantg_bantg, td.ten_trinh_do, cm.ten_chuyen_mon, cv.ten_chuc_vu,
  nv.ngay_bat_dau_lam_viec, nv.ngay_thu_viec, nv.ngay_tham_gia_bhxh,
  nv.nhiem_vu, nv.luong_co_ban, nv.thoi_han_nang_luong, nv.huong_che_do_bhxh,
  nv.hoc_tap, nv.ky_luat, (CASE khd.loai_hop_dong
    WHEN 1 THEN 'Hợp đồng không xác định thời hạn'
    WHEN 2 THEN 'Hợp đồng có xác định thời hạn' WHEN 3 THEN 'Hợp đồng thử việc'
  END) AS loai_hop_dong, nv.thoi_gian_nghi_viec, nv.ly_do_nghi_viec,
  pb.ten_phong_ban, dv.ten_don_vi, bc.ten_bang_cap, lnv.ten_loai_nv,
  qt.ten_quoc_tich, tg.ten_ton_giao, nv.so_cmnd, nv.ngay_cap_cmnd,
  nv.noi_cap_cmnd, nv.dia_chi, nv.so_dien_thoai, nv.ghi_chu_nv, khd.ma_hd,
  khd.nhan_vien_id, khd.loai_hop_dong, khd.ngay_soan_hd, khd.ngay_ky_hd,
  khd.ngay_hieu_luc_hd, khd.dia_diem_ky_hd, khd.noi_dung_hd, khd.ghi_chu_hd,
  khd.dia_diem_lv, khd.phuong_tien, khd.tg_ngay, khd.tg_tuan, khd.tg_nghi_ngoi,
  khd.luong_can_ban, khd.pc_cong_viec, khd.pc_doc_hai, khd.pc_an_trua,
  khd.pc_dien_thoai, khd.pc_xang_xe, khd.chi_phi_di_lai, khd.le_tet,
  khd.hinh_thuc_tra_luong, khd.thoi_gian_tra_luong, khd.che_do_nang_luong,
  khd.bhyt_bhxh, khd.nguoi_tao, khd.ngay_tao, khd.nguoi_sua, khd.ngay_sua
FROM nhanvien nv, quoc_tich qt, dan_toc dt, ton_giao tg, loai_nv lnv,
    trinh_do td, chuyen_mon cm, bang_cap bc, phong_ban pb, chuc_vu cv,
    tinh_trang_hon_nhan hn, don_vi dv, ky_hop_dong khd
WHERE nv.id = khd.nhan_vien_id AND nv.quoc_tich_id = qt.id AND
  nv.dan_toc_id = dt.id AND nv.ton_giao_id = tg.id AND nv.loai_nv_id = lnv.id
  AND nv.trinh_do_id = td.id AND nv.chuyen_mon_id = cm.id AND
  nv.bang_cap_id = bc.id AND nv.phong_ban_id = pb.id AND nv.chuc_vu_id = cv.id
  AND nv.hon_nhan_id = hn.id AND nv.don_vi_id = dv.id AND khd.id = $id ";
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
        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
        <li><a href="danh-sach-nhan-vien.php?p=staff&a=list-staff">Danh sách nhân viên</a></li>
        <li class="active">Thông tin nhân viên</li>
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
                  echo "có mã";
                  echo"$id";
                }
                //kiểm tra mảng rỗng
                if(empty($row)){
                  
                  echo "mảng rỗng";
                }else{
                  echo "mảng không rỗng";
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
                <div class="col-sm-6 invoice-col">
                  <p class="box-title">Chúng tôi, một bên là: Công ty TNHH Hoàng Tuấn
Địa chỉ: 80A, Lê Hồng Phong, Khóm 7, Phường 3, Tp. Sóc Trăng, tỉnh Sóc Trăng
Người đại diện: Nguyễn Hoàng Tuấn                   
Sinh ngày: 01 tháng 01 năm 1966       
Số CMTND: 094066001138     Cấp ngày 24/04/2021  Nơi cấp: Cục CSQL&TTXH
Địa chỉ nơi cư trú: 86 An Dương Vương, Phường 10, Tp Sóc Trăng, tỉnh Sóc Trăng.
Chức vụ: Giám đốc công ty

Và một bên là Bà: Bùi Ngọc Hạnh
Sinh ngày: 16 tháng 06 năm 1980      Giới tính: Nữ
Số CMND: 094180018523    Ngày cấp: 28/09/2021   Nơi cấp: Cục CSQLHC về TTXH
Nơi đăng ký HKTT: Số 75 Khóm Wáth Pích, P. Vĩnh Phước, Tx Vĩnh Châu, Sóc Trăng
Chỗ ở hiện nay: Số 75 Khóm Wáth Pích, P. Vĩnh Phước, Tx Vĩnh Châu, Sóc Trăng
Thỏa thuận ký kết hợp đồng lao động và làm đúng những điều khoản sau đây:
 
                    <b><?php echo $row['ten_nv']; ?></b>
                  </p>
                  
                  
                </div>
                <!-- col-5 -->
                
                <!-- col-5 -->
                
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