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
    $id = $_POST['idRoom'];
    echo "<script>location.href='sua-phong-ban.php?id=".$id."'</script>";
  }

  // show data
  $showData = "SELECT id, ma_phong_ban, ten_phong_ban, ghi_chu, nguoi_tao, ngay_tao, nguoi_sua, ngay_sua FROM phong_ban ORDER BY ngay_tao DESC";
  $result = mysqli_query($conn, $showData);
  $arrShow = array();
  while ($row = mysqli_fetch_array($result)) {
    $arrShow[] = $row;
  }

  // create code room
  $roomCode = "MBP" . time();

  // delete record
  if(isset($_POST['save']))
  {
    // create array error
    $error = array();
    $success = array();
    $showMess = false;

    // get id in form
    $roomName = $_POST['roomName'];
    $description = $_POST['description'];
    $personCreate = $row_acc['ho'] . $row_acc['ten'];
    $dateCreate = date("Y-m-d H:i:s");
    $personEdit = $row_acc['ho'] . $row_acc['ten'];
    $dateEdit = date("Y-m-d H:i:s");

    // validate
    if(empty($roomName))
      $error['roomName'] = 'Vui lòng nhập <b> tên phòng ban </b>';

    if(!$error)
    {
      $showMess = true;
      $insert = "INSERT INTO phong_ban(ma_phong_ban, ten_phong_ban, ghi_chu, nguoi_tao, ngay_tao, nguoi_sua, ngay_sua) VALUES('$roomCode','$roomName', '$description', '$personCreate', '$dateCreate', '$personEdit', '$dateEdit')";
      mysqli_query($conn, $insert);
      $success['success'] = 'Tạo phòng ban thành công.';
      echo '<script>setTimeout("window.location=\'phong-ban.php?p=staff&a=room\'",1000);</script>';
    }

  }

  // delete record
  if(isset($_POST['delete']))
  {
    $showMess = true;

    $id = $_POST['idRoom'];
    //echo "<script>alert('ID là.$id')</script>"; 
    $delete = "DELETE FROM phong_ban WHERE id = $id";
    mysqli_query($conn, $delete);
    $success['success'] = 'Xóa phòng ban thành công.';
    echo '<script>setTimeout("window.location=\'phong-ban.php\'",1000);</script>';
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
            <input type="hidden" name="idRoom">
            Bạn có thực sự muốn xóa phòng ban này?
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
                    <h1>Phòng ban</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Phòng ban</li>
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
              <h3 class="card-title">Tạo phòng ban</h3>
              
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
              <form action="" method="POST">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mã phòng ban: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="roomCode" value="<?php echo $roomCode; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên phòng ban: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phòng ban" name="roomName">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mô tả: </label>
                      <textarea id="editor1" rows="10" cols="220" name="description">
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Người tạo: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row_acc['ho']; echo " "; echo $row_acc['ten']; ?>" name="personCreate" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ngày tạo: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo date('d-m-Y H:i:s'); ?>" name="dateCreate" readonly>
                    </div>
                    <!-- /.form-group -->
                    <?php 
                      if($_SESSION['level'] == 1)
                        echo "<button type='submit' class='btn btn-primary' name='save'><i class='fa fa-plus'></i> Tạo phòng ban</button>";
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách phòng ban</h3>
            </div>
            <!-- /.card-header -->
            <style>
						#table-phongBan thead th {
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
            <div class="card-body">
              <div class="table-responsive">
                <table id="table-phongBan" class="table table-hover table-striped text-center">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã Phòng</th>
                    <th>Tên phòng</th>
                    <th>Mô tả</th>
                    <th>Người tạo</th>
                    <th>Ngày tạo</th>
                    <th>Người sửa</th>
                    <th>Ngày sửa</th>
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
                        <td><?php echo $arrS['ten_phong_ban']; ?></td>
                        <td><?php echo $arrS['ghi_chu']; ?></td>
                        <td><?php echo $arrS['nguoi_tao']; ?></td>
                        <td><?php echo $arrS['ngay_tao']; ?></td>
                        <td><?php echo $arrS['nguoi_sua']; ?></td>
                        <td><?php echo $arrS['ngay_sua']; ?></td>
                        <th>
                          <?php 
                            if($row_acc['quyen'] == 1)
                            {
                              echo "<form method='POST'>";
                              echo "<input type='hidden' value='".$arrS['id']."' name='idRoom'/>";
                              echo "<button type='submit' class='btn bg-primary btn-sm'  name='edit'><i class='fa fa-pen'></i></button>";
                              echo "</form>";
                            }
                            else
                            {
                              echo "<button type='button' class='btn bg-green btn-sm' disabled><i class='fa fa-edit'></i></button>";
                            }
                          ?>
                          
                        </th>
                        <th>
                          <?php 
                            if($row_acc['quyen'] == 1)
                            {
                              
                              echo "<button type='button' class='btn bg-red btn-sm' data-toggle='modal' data-target='#exampleModal' data-whatever ='".$arrS['id']."'><i class='fa fa-trash'></i></button>";
                              
                            }                            
                            else
                            {
                              echo "<button type='button' class='btn bg-red btn-sm' disabled><i class='fa fa-trash'></i></button>";
                            }
                          ?>
                        </th>
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