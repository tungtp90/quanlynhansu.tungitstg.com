
<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  if(isset($_POST['view']))
  {
    $id = $_POST['idStaff'];
    echo "<script>location.href='../report/view-hd.php?id=".$id."'</script>";
  }

  // show data
  $showData = "SELECT khd.id AS id,nv.hinh_anh, nv.ma_nv, nv.ten_nv, nv.ngay_sinh, (CASE nv.gioi_tinh
  WHEN 1 THEN 'Nam' ELSE 'Nữ'
END) AS gioi_tinh, dt.ten_dan_toc, nv.so_cchn, nv.ngay_cap_cchn,
nv.noi_cap_cchn, trang_thai_lv, nv.pham_vi_hoat_dong_cm, nv.chung_chi_khac,
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
AND nv.hon_nhan_id = hn.id AND nv.don_vi_id = dv.id AND khd.xoa = 0 ";
  $result = mysqli_query($conn, $showData);
  $arrShow = array();
  while ($row = mysqli_fetch_array($result)) {
    $arrShow[] = $row;
  }
?>
  <!-- Modal -->
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
                    <h1>Danh sách nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách nhân viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
 <!-- Bootstrap CSS -->
 <section class="content">
       <div class="col-xs-12">
          <div class="card card-info">          
            <div class="card-header">             
              <h3 class="card-title">Danh sách nhân viên đã ký HĐ</h3>
            </div>

            <!--in danh sách 
            <div class="card-tools pull-left" >
              <a href="docfile.php" class="btn btn-success">Xuất báo cáo PDF</a> -->             
             <!--<a href="../report/view-hd.php" class="btn btn-danger"><i class="fa fa-download"></i> In danh sách ra</a>
            </div> end in danh sách      
            </div> -->
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
                    echo "<h4><i class='icon fa fa-check'></i> Thành công!</h4>";
                    foreach ($success as $suc) 
                    {
                      echo $suc . "<br/>";
                    }
                    echo "</div>";
                  }
                }
              ?> 
          <style>
						#table-dsdakyHopdong thead th {
							background-color: #0066CC; /* Đặt màu nền cho tiêu đề */
							color: #ffffff; /* Đặt màu chữ cho tiêu đề */
							vertical-align: middle;
							text-align: center;
							position: sticky;
							top: 0;
							z-index: 1; /* Đảm bảo tiêu đề hiển thị trên cùng */    
							height: 15px; /* Thêm chiều cao mong muốn */                            
						}						
					</style> 
              <div class="table-responsive">
                <table id="table-dsdakyHopdong" class="table table-hover  table-striped text-center">                 
                  <thead>
                  <tr>
                    <th>STT</th>                    
                    <th>Ảnh</th>
                    <th>Mã HD</th>
                    <th >Họ tên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Loại HĐLĐ</th>
                    <th>Chuyên môn</th>                                                           
                    <th>Ghi chú</th> 
                    <th>Trạng thái</th>
                    <th>In hợp đồng</th>    
                                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $count = 1;
                    foreach ($arrShow as $arrS) 
                    {
                  ?>
                      <tr>
                        <td><?php echo $count; ?></td>                      
                        <td><img src="../uploads/staffs/<?php echo $arrS['hinh_anh']; ?>" width="40"  height="60"></td>
                        <td><?php echo $arrS['ma_hd'];?></td>
                        <td><?php echo $arrS['ten_nv']; ?></td>
                        <td>
                        <?php
                          if($arrS['gioi_tinh'] == 1)
                          {
                            echo "Nam";
                          } 
                          else
                          {
                            echo "Nữ";
                          }
                        ?>
                        </td>
                        <td>
                        <?php 
                          $date = date_create($arrS['ngay_sinh']);
                          echo date_format($date, 'd-m-Y');
                        ?>
                        </td>
                        <td><?php echo $arrS['so_cchn']; ?></td>
                        <td><?php echo $arrS['ngay_cap_cchn']; ?></td>
                        <td><?php echo $arrS['noi_cap_cchn']; ?></td>
                        <td><?php 
                          if($arrS['loai_hop_dong'] == 1)
                          {
                            echo '<span class="badge bg-green"> Không thời hạn </span>';
                          }
                          if($arrS['loai_hop_dong'] == 2)
                          {
                            echo '<span class="badge bg-green"> Có thời hạn </span>';
                          }
                          if($arrS['loai_hop_dong'] == 3)                         
                          {
                            echo '<span class="badge bg-green"> Thử việc </span>';
                          }
                        ?>
                        </td>
                        <td><?php echo $arrS['pham_vi_hoat_dong_cm']; ?></td>                        
                        <td><?php echo $arrS['ghi_chu_nv']; ?></td>
                        <td>
                        <?php 
                          if($arrS['trang_thai_lv'] == 1)
                          {
                            echo '<span class="badge bg-info"> Đang làm việc </span>';
                          }
                          else
                          {
                            echo '<span class="badge bg-red"> Đã nghỉ việc </span>';
                          }
                        ?>
                        </td>
                        <td>
                          <?php 
                            if($row_acc['quyen'] == 1)
                            {
                              echo "<form method='POST'>";
                              echo "<input type='hidden' value='".$arrS['id']."' name='idStaff'/>";
                              echo "<button type='submit' class='btn btn-primary btn-sm'  name='view'><i class='fa fa-print'></i></button>";
                              echo "</form>";
                            }
                            else
                            {
                              echo "<button type='button' class='btn btn-primary btn-sm' disabled><i class='fa fa-print'></i></button>";
                            }
                          ?>
                        </td>
                        
                        
                      </tr>
                      
                  <?php
                      $count++;
                    }
                  ?>
                  </tbody>
                </table>                
              </div>
              <script>  
                $('table').DataTable();  
                </script>  
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