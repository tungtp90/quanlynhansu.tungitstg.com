<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  if(isset($_POST['edit']))
  {
    $idCongTac = $_POST['idCongTac'];
    echo "<script>location.href='sua-cong-tac.php?p=collaborate&a=list-collaborate&id=".$idCongTac."'</script>";
  }

  // show data
  $showData = "SELECT ct.id as id, ma_cong_tac, ten_nv, ten_chuc_vu, email, ngay_bat_dau, ngay_ket_thuc, dia_diem, muc_dich, ghi_chu_ct 
  FROM  nhanvien nv, chuc_vu cv, cong_tac ct 
  WHERE nv.chuc_vu_id = cv.id AND nv.id = ct.nhanvien_id ORDER BY ct.ngay_tao DESC";
  $result = mysqli_query($conn, $showData);
  $arrShow = array();
  while ($row = mysqli_fetch_array($result)) {
    $arrShow[] = $row;
  }

  // delete record
  if(isset($_POST['delete']))
  {
    $idCongTac = $_POST['idCongTac'];

    // xoa cong tac
    $xoa = "DELETE FROM cong_tac WHERE id = $idCongTac";
    $result = mysqli_query($conn, $xoa);
    if($result)
    {
      $showMess = true;
      $success['success'] = 'Xóa công tác thành công.';
      echo '<script>setTimeout("window.location=\'danh-sach-thu-viec.php?p=collaborate&a=list-collaborate\'",1000);</script>';
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
          <!-- Ẩn input và tự động điền giá trị id vào khi modal mở -->
          <input type="hidden" name="idCongTac">
          Bạn có thực sự muốn xóa công tác này?
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
                    <h1>Danh sách hợp đồng thử việc</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách hợp đồng thử việc</li>
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
              <h3 class="card-title">Danh sách nhân viên thử việc</h3>
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
              if(empty($arrShow)){
                echo '<p style="color: red; text-align: center">
                    Không có nhân viên nào đang hợp đồng thử việc!
                    </p>';
              }
              else
              {
                echo'';
                
              ?>
              <style>
                #table-dsThuviec thead th {
                    background-color: #0066CC; /* Đặt màu nền cho tiêu đề */
                    color: #ffffff; /* Đặt màu chữ cho tiêu đề */
                    vertical-align: middle;
                    text-align: center;
                    position: sticky;
                    top: 0;
                    z-index: 1; /* Đảm bảo tiêu đề hiển thị trên cùng */                                
                }
                
              </style>
                <table id="table-dsThuviec" class="table table-hover table-striped text-center">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã nhân viên</th>
                    <th>Tên nhân viên</th>
                    <th>Chức vụ</th>
                    <th>Email</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Đơn vị</th>
                    <th>Chi chú</th>
                    <th>Trạng thái</th>
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
                        <td><?php echo $arrS['ma_cong_tac']; ?></td>
                        <td><?php echo $arrS['ten_nv']; ?></td>
                        <td><?php echo $arrS['ten_chuc_vu']; ?></td>
                        <td><?php echo $arrS['email']; ?></td>
                        <td><?php echo date_format(date_create($arrS['ngay_bat_dau']), 'd-m-Y'); ?></td>
                        <td><?php echo date_format(date_create($arrS['ngay_ket_thuc']), 'd-m-Y'); ?></td>
                        <td><?php echo $arrS['dia_diem']; ?></td>
                        <td><?php echo $arrS['ghi_chu_ct']; ?></td>
                        <?php 
                          $ngayHienTai = date("Y-m-d H:i:s");
                          $ngayHetHan = $arrS['ngay_ket_thuc'];

                          if($ngayHienTai < $ngayHetHan)
                          {
                            echo '<td><span class="badge bg-blue"> Đang thử việc </span></td>';
                          }
                          else
                          {
                            echo '<td><span class="badge bg-red"> Đã hết thời gian thử việc </span></td>';
                          }
                        ?>
                        </td>
                        <td>
                          <?php 
                            if($row_acc['quyen'] == 1)
                            {
                              echo "<form method='POST'>";
                              echo "<input type='hidden' value='".$arrS['id']."' name='idCongTac'/>";
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
                              // Thêm class btn-delete vào nút "Xóa" -->
                            echo "<button type='button' class='btn bg-red btn-sm btn-delete' data-toggle='modal' data-target='#exampleModal' data-id='".$arrS['id']."'><i class='fa fa-trash'></i></button>";
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
                    }}
                  ?>
                  </tbody>
                </table>
              </div>
              <script src="../js/jquery-3.7.0.min.js"></script>
              <script>  
                $('table').DataTable();  
                </script>
                <!-- JavaScript tự động lấy giá trị id từ nút "Xóa" -->                
                <script>
                  $(document).ready(function() {
                    $('.btn-delete').on('click', function() {
                      var idCongTac = $(this).data('id');
                      $('#exampleModal').find('.modal-body input[name="idCongTac"]').val(idCongTac);
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