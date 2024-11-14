<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
	// include file
	include('../layouts/header.php');
	include('../layouts/topbar.php');
	include('../layouts/sidebar.php');
	

	// dem so luong nhan vien
	$nv = "SELECT count(id) as soluong FROM nhanvien";
	$resultNV = mysqli_query($conn, $nv);
	$rowNV = mysqli_fetch_array($resultNV);
	$tongNV = $rowNV['soluong'];	

	
	// dem so nhan vien thử việc
	$thuviec = "SELECT count(id) as soluong FROM cong_tac";
	$resultThuViec = mysqli_query($conn, $thuviec);
	$rowThuViec = mysqli_fetch_array($resultThuViec);
	$tongThuViec = $rowThuViec['soluong'];

	// dem so luong nhan vien chính thức
	$thuviec = "SELECT count(id) as soluong FROM nhanvien WHERE loai_nv_id = 2";
	$resultNghiViec = mysqli_query($conn, $thuviec);
	$rowNghiViec = mysqli_fetch_array($resultNghiViec);
	$tongNghiViec = $rowNghiViec['soluong'];

	// dem so luong nhên viên thôi việc
	$chuyenmon = "SELECT count(id) as soluong FROM nhanvien WHERE trang_thai_lv = 0";
	$resultChuyenmon = mysqli_query($conn, $chuyenmon);
	$rowChuyenmon = mysqli_fetch_array($resultChuyenmon);
	$tongchuyenmon = $rowChuyenmon['soluong'];

	// dem so luong nhân viên bvht
	$bvht = "SELECT count(id) as soluong FROM nhanvien WHERE don_vi_id = 1";
	$resultbvht = mysqli_query($conn, $bvht);
	$rowbvht = mysqli_fetch_array($resultbvht);
	$tongbvht = $rowbvht['soluong'];
 
	// dem so luong nhân viên TTAD
	$ttad = "SELECT count(id) as soluong FROM nhanvien WHERE don_vi_id = 2";
	$resultttad = mysqli_query($conn, $ttad);
	$rowttad = mysqli_fetch_array($resultttad);
	$tongttad = $rowttad['soluong'];

	// dem so luong nhân viên TTYK hoàng tuấn vc
	$htvc = "SELECT count(id) as soluong FROM nhanvien WHERE don_vi_id = 3";
	$resulthtvc = mysqli_query($conn, $htvc);
	$rowhtvc = mysqli_fetch_array($resulthtvc);
	$tonghtvc = $rowhtvc['soluong'];

	// dem so luong nhân viên BVDK hoàng tuấn ngã năm
	$htnn = "SELECT count(id) as soluong FROM nhanvien WHERE don_vi_id = 4";
	$resulthtnn = mysqli_query($conn, $htnn);
	$rowhtnn = mysqli_fetch_array($resulthtnn);
	$tongthnn = $rowhtnn['soluong'];	

	// dem so hợp đồng thử việc
	//$so_hd_thuviec = "SELECT count(id) as soluong FROM cong_tac";
	//$resultslsohdtv = mysqli_query($conn, $so_hd_thuviec);
	//$rowhsohdtv = mysqli_fetch_array($resultslsohdtv);
	//$tonghdthuviec = $rowhsohdtv['soluong'];
	
	
	// danh sach luong nhan vien thang hien tai
	//$thangLuongHienTai = date_format(date_create(date("Y-m-d H:i:s")), "m/Y");
	//$thangHienTai = date_format(date_create(date("Y-m-d H:i:s")), "m");
	//$namHienTai = date_format(date_create(date("Y-m-d H:i:s")), "Y");
	//$luongThang = "SELECT ma_luong, hinh_anh, ten_nv, gioi_tinh, ngay_sinh, luong_thang, ngay_cong, khoan_nop, thuc_lanh, trang_thai from luong l, nhanvien nv WHERE l.nhanvien_id = nv.id AND year(ngay_cham) = '$namHienTai' AND month(ngay_cham) = '$thangHienTai' ORDER BY l.id DESC";
	//$resultLuongThang = mysqli_query($conn, $luongThang);
	//$arrLuongThang = array();
	//while ($rowLuongThang = mysqli_fetch_array($resultLuongThang)) 
	//{
	//	$arrLuongThang[] = $rowLuongThang;
	//}
	// show data danh sách nhân viên
	$dsnhanvienthanghientai = date_format(date_create(date("Y-m-d H:i:s")), "m/Y");
	$showData = "SELECT ct.id as id, ma_cong_tac, ma_nv, hinh_anh, ten_nv, gioi_tinh, ngay_sinh, so_cchn, ngay_bat_dau, ngay_ket_thuc, dia_diem, nv.phong_ban_id,
	pb.ten_phong_ban
	FROM nhanvien nv
	INNER JOIN chuc_vu cv ON nv.chuc_vu_id = cv.id
	INNER JOIN cong_tac ct ON nv.id = ct.nhanvien_id
	INNER JOIN phong_ban pb ON nv.phong_ban_id = pb.id
	ORDER BY ct.ngay_tao ASC";

	$resultDsnhanvien = mysqli_query($conn, $showData);
	$arrDsnhanvien = array();
	while ($rowshowData = mysqli_fetch_array($resultDsnhanvien)) 
	{
	  $arrshowData[] = $rowshowData;
	}

?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
		<div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tổng quan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Tổng quan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
	    </section>

	    <!-- Main content -->
	    <section class="content">
	      <!-- Small boxes (Stat box) -->
	      <div class="row">
	        <div class="col-lg-3 col-xs-6">
	          <div class="small-box bg-cyan">
	            <div class="inner">
	              <h3><?php echo $tongNV; ?></h3>
	              <p>TỔNG NHÂN VIÊN</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-fw fa-users"></i>
	            </div>
	            <a href="#" class="small-box-footer">Tổng danh sách nhân viên <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        
	        <div class="col-lg-3 col-xs-6">					
			<div class="small-box bg-green">
	            <div class="inner">
	              <h3><?php echo $tongThuViec; ?></h3>
	              <p>NHÂN VIÊN THỬ VIỆC</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-fw fa-user-circle"></i>
	            </div>
	            <a href="#" class="small-box-footer" onclick="return false;">Danh sách nhân viên thử việc <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-3 col-xs-6">			
	          <div class="small-box bg-yellow">
	            <div class="inner">
	              <h3><?php echo $tongNghiViec; ?></h3>
	              <p>NHÂN VIÊN CHÍNH THỨC</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-user"></i>
	            </div>
	            <a href="#" class="small-box-footer" onclick="return false;">Danh sách nhân viên chính thức <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
			<div class="col-lg-3 col-xs-6">			
	          <div class="small-box bg-danger">
	            <div class="inner">
	              <h3><?php echo $tongchuyenmon; ?></h3>
	              <p>NHÂN VIÊN THÔI VIỆC</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-fw fa-user-times"></i>
	            </div>
	            <a href="#" class="small-box-footer" onclick="return false;">Danh sách nhân viên thôi việc <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">			
	          <div class="small-box bg-primary">
	            <div class="inner">
	              <h3><?php echo $tongbvht; ?></h3>
	              <p>BỆNH VIỆN ĐA KHOA HOÀNG TUẤN SÓC TRĂNG</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-fw fa-building"></i>
	            </div>
	            <a href="#" class="small-box-footer" onclick="return false;">Danh sách nhân viên <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
			<div class="col-lg-3 col-xs-6">			
	          <div class="small-box bg-primary">
	            <div class="inner">
	              <h3><?php echo $tongttad  ?></h3>
	              <p>TRUNG TÂM AN DƯỠNG HOÀNG TUẤN</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-fw fa-building"></i>
	            </div>
	            <a href="#" class="small-box-footer" onclick="return false;">Danh sách nhân viên <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
			<!-- ./col -->
	        <div class="col-lg-3 col-xs-6">	  
	          <div class="small-box bg-primary">
	            <div class="inner">
	              <h3><?php echo $tonghtvc; ?></h3>
	              <p>TRUNG TÂM Y KHOA HOÀNG TUẤN VC</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-building"></i>
	            </div>
	            <a href="#" class="small-box-footer">Danh sách nhân viên <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-3 col-xs-6">			
	          <div class="small-box bg-primary">
	            <div class="inner">
	              <h3><?php echo $tongthnn; ?></h3>
	              <p>BỆNH VIỆN ĐA KHOA HOÀNG TUẤN NGÃ NĂM</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-fw fa-building"></i>
	            </div>
	            <a href="#" class="small-box-footer">Danh sách nhân viên <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->				     

			<!-- Bắt đầu danh sách chức vụ-->
	      	<div class="col-lg-6">	      		
		        <!-- /.thêm phần tử Box vào trên danh sách nhân viên tổng quan hết hạn thử việc --> 
	      	</div>
	      	<!-- col-lg-6 -->
			<!-- End danh sách chức vụ-->

	      	<div class="col-lg-12">
	      		<div class="card card-danger">
		            <div class="card-header">
		              <h3 class="card-title" ><b>Danh sách nhân viên thử việc tháng: <?php echo $dsnhanvienthanghientai; ?></b></h3>
		            </div>
					<?php				
						//kiểm tra mảng rỗng
						if(empty($arrshowData)){
							echo '<p style="color: red; text-align: center">
      						Không có nhân viên nào đang hợp đồng thử việc!
      						</p>';
						}
						else
						{
							echo'';
              
            		?>
					<style>
						#table-index-Thuviec thead th {
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
		            <!-- /.box-header -->
		            <div class="card-body">
		              <div class="table-responsive">
		                <table id="table-index-Thuviec" class="table table-hover table-striped text-center">
		                  <thead>
		                  <tr>
		                    <th>STT</th>
		                    <th>Tên nhân viên</th>
		                    <th>Giới tính</th>
		                    <th>Ngày sinh</th>		                    
		                    <th>CCHN</th>
							<th>Ngày bắt đầu</th>
							<th>Ngày kết thúc</th>
							<th>Đơn vị</th>
							<th>Khoa phòng</th>		                    
							<th>Trạng thái</th>
		                  </tr>
		                  </thead>
		                  <tbody>
		                  <?php 
		                    $count = 1;
		                    foreach ($arrshowData as $lt) 
		                    {
		                  ?>
		                      <tr>
		                        <td><?php echo $count; ?></td>
		                    
		                        <td><?php echo $lt['ten_nv']; ?></td>
		                        <td>
		                        <?php
		                          if($lt['gioi_tinh'] == 1)
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
                          			//echo $lt['ngay_sinh'];
									  $date = date_create($lt['ngay_sinh']);	//in ngày sinh từ trong mảng 
									  echo date_format($date, 'd-m-Y');			// định dạng ngày sinh theo dạng ngày tháng năm
                          			
                        		?>
                        		</td>
		                        <td><?php echo $lt['so_cchn']; ?></td>
								<td><?php echo date_format(date_create($lt['ngay_bat_dau']), 'd-m-Y'); ?></td>
                        		<td><?php echo date_format(date_create($lt['ngay_ket_thuc']), 'd-m-Y'); ?></td>
                        		<td><?php echo $lt['dia_diem']; ?></td>
                        		<td><?php echo $lt['ten_phong_ban']; ?></td>

		                        <!--thẻ trạng thái hết thời gian thử việc -->
		                        <?php 
		                          $ngayHienTai = date("Y-m-d H:i:s");
								  $ngayHetHan = $lt['ngay_ket_thuc'];		
								  if($ngayHienTai < $ngayHetHan)
								  {
									echo '<td><span class="badge bg-blue"> Đang thử việc </span></td>';
								  }
								  else
								  {
									echo '<td><span class="badge bg-red"> Hết thời gian thử việc </span></td>';
								  }
		                        ?>
		                        
		                      </tr>
		                  <?php
		                      $count++;
		                    }
						}
		                  ?>
						  
		                  </tbody>
		                </table>
		              </div>
					<script>  
						$('table').DataTable();  
					</script>
		            </div>
		            <!-- /.box-body -->
		         </div>
		        <!-- /.box -->
	      	</div>
	      	<!-- col-lg-12 -->
	      </div>
	      <!-- /.row (main row) -->
	    </section>
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