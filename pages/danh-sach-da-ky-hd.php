<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  if(isset($_POST['inHopDong']))
  {
    $id = $_POST['inHopDong'];
    echo "<script>location.href='../report/view-hd.php?id=".$id."'</script>";
  }

  if(isset($_POST['edit']))
  {
    $id = $_POST['idHopDong'];
    //echo "<script>alert('ID là.$id')</script>";
    echo "<script>location.href='sua-hop-dong.php?id=".$id."'</script>";
  }

  // show data
  $showData = "SELECT khd.id as id, ma_hd, ten_nv, ten_chuc_vu, so_cchn,loai_hop_dong, ngay_ky_hd, dia_diem_ky_hd, noi_dung_hd, ghi_chu_hd, mau_hd
  FROM  nhanvien nv, chuc_vu cv, ky_hop_dong khd WHERE nv.chuc_vu_id = cv.id AND nv.id = khd.nhan_vien_id AND khd.xoa = 0
  ORDER BY khd.id DESC";
  $result = mysqli_query($conn, $showData);
  $arrShow = array();
  while ($row = mysqli_fetch_array($result)) {
    $arrShow[] = $row;
  }
  
  // delete record
  if(isset($_POST['delete']))
  {
    $id = $_POST['idhopDong'];
    //echo "<script>alert('ID là.$id')</script>";
    //echo "<script>location.href='edit-danh-sach-da-ky-hd.php?id=".$id."'</script>";
    
    // xoa cong tac
    $xoa = "UPDATE ky_hop_dong SET xoa=1 WHERE id = $id";
    $result = mysqli_query($conn, $xoa);
    if($result)
    {
      $showMess = true;
      $success['success'] = 'Xóa hợp đồng thành công.';
      echo '<script>setTimeout("window.location=\'danh-sach-da-ky-hd.php\'",1000);</script>';
    }
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
            <input type="hidden" name="idhopDong">
            Bạn có thực sự muốn xóa hợp đồng này?
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
                    <h1>Danh sách đã ký hợp đồng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách đã ký hợp đồng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
        <div class="col-xs-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Danh sách hợp đồng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
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
              <?php				
              //kiểm tra mảng rỗng
              /* if(empty($arrShow)){
                echo '<p style="color: red; text-align: center">
                    Không có nhân viên nào đang hợp đồng thử việc!
                    </p>'; 
              }
              else
              {
                echo'';*/
                
              ?>
            <style>
              #table-dsHopdong thead th {
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
                <table id="table-dsHopdong" class="table table-hover table-striped text-center ">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Số hợp đồng</th>
                    <th>Tên nhân viên</th>
                    <th>Chức vụ</th>
                    <th>Loại hợp đồng</th>
                    <th>Ngày ký</th>
                    <th>Địa điểm ký</th>
                    <th>Mẫu hợp đồng</th>
                    <th>Ghi chú</th>
                    <th>In</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
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
                        <td><?php echo $arrS['id']; ?></td>
                        <td><?php echo $arrS['ma_hd']; ?></td>
                        <td><?php echo $arrS['ten_nv']; ?></td>
                        <td><?php echo $arrS['ten_chuc_vu']; ?></td>
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
                        <td><?php echo date_format(date_create($arrS['ngay_ky_hd']), 'd-m-Y'); ?></td>                        
                        <td><?php echo $arrS['dia_diem_ky_hd']; ?></td>
                        <td><?php echo $arrS['mau_hd']; ?></td>
                        <td><?php echo $arrS['ghi_chu_hd']; ?></td>   
                        <td>
                          <?php 
                            if($row_acc['quyen'] == 1)
                            {
                              echo "<form method='POST'>";
                              echo "<input type='hidden' value='".$arrS['id']."' name='inHopDong'/>";
                              echo "<button type='submit' class='btn bg-warning btn-sm'  name='view'><i class='fa fa-print'></i></button>";
                              echo "</form>";
                            }
                            else
                            {
                              echo "<button type='button' class='btn bg-warning btn-sm' disabled><i class='fa fa-print'></i></button>";
                            }
                          ?>                          
                        </td>                     
                        <td>
                          <?php 
                            if($row_acc['quyen'] == 1)
                            {
                              echo "<form method='POST'>";
                              echo "<input type='hidden' value='".$arrS['id']."' name='idHopDong'/>";
                              echo "<button type='submit' class='btn bg-primary btn-sm'  name='edit'><i class='fa fa-pen'></i></button>";
                              echo "</form>";
                            }
                            else
                            {
                              echo "<button type='button' class='btn bg-primary btn-sm' disabled><i class='fa fa-pen'></i></button>";
                            }
                          ?>                          
                        </td>
                        <td>
                          <?php 
                            if($row_acc['quyen'] == 1)
                            {                             
                              echo "<button type='button' class='btn bg-red btn-sm btn-delete ' data-toggle='modal' data-target='#exampleModal' data-id='".$arrS['id']."'><i class='fa fa-trash'></i></button>";
                              
                            }                            
                            else
                            {
                              echo "<button type='button' class='btn bg-red btn-sm' disabled><i class='fa fa-trash'></i></button>";
                            }
                          ?>
                        </td>
                      </tr>
                  <?php
                      $count++;
                    } /*} */
                  ?>
                  </tbody>
                </table>
              </div>
              <script src="../js/jquery-3.7.0.min.js"></script>
              <script>  
                $('table').DataTable();  
                </script>
                <script>
                  $(document).ready(function() {
                    $('.btn-delete').on('click', function() {
                      var idhopDong = $(this).data('id');
                      $('#exampleModal').find('.modal-body input[name="idhopDong"]').val(idhopDong);
                    });
                  });
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