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
    $id = $_POST['idStaff'];
    echo "<script>location.href='sua-nhan-vien.php?id=".$id."'</script>";
  }

  if(isset($_POST['view']))
  {
    $id = $_POST['idStaff'];
    echo "<script>location.href='thong-tin-nhan-vien.php?id=".$id."'</script>";
  }

  // show data
  $showData = "SELECT * FROM nhanvien ORDER BY id DESC";
  $result = mysqli_query($conn, $showData);
  $arrShow = array();
  while ($row = mysqli_fetch_array($result)) {
    $arrShow[] = $row;
  }

  // delete record
  if(isset($_POST['delete']))
  {
    $id = $_POST['idStaff'];
    echo "<script>location.href='edit-danh-sach-nhan-vien.php'</script>";
    echo "<script>alert('ID là.$id')</script>";
    
    $target_dir = "../uploads/staffs/";

    // get image
    $image = "SELECT hinh_anh FROM nhanvien WHERE id = $id";
    $resultImage = mysqli_query($conn, $image);
    $rowImage = mysqli_fetch_array($resultImage);
    $removeImage = $target_dir . $rowImage['hinh_anh'];

    $delete = "DELETE FROM nhanvien WHERE id = $id";
    $resultDel = mysqli_query($conn, $delete);
    if($resultDel)
    {
      $showMess = true;
      if($rowImage['hinh_anh'] != "demo-3x4.jpg")
      {
        unlink($removeImage);
      }

      $success['success'] = 'Xóa nhân viên thành công.';
      echo '<script>setTimeout("window.location=\'edit-danh-sach-nhan-vien.php\'",1000);</script>';  
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
                    <h1>Nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Nhân viên</li>
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
              <h3 class="card-title">Danh sách nhân viên</h3>
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
              <div class="table-responsive">
                <table id="example1" class="table table-hover  table-hover table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>                    
                    <th>Ảnh</th>
                    <th>Họ tên NV</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>                                 
                    <th>Số CCHN</th>
                    <th>Ngày cấp CCHN</th>
                    <th>Nơi cấp CCHN</th>                    
                    <th>Phạm vi HĐCM</th>                                        
                    <th>Thời gian làm việc</th>     
                    <th>Trạng thái</th>
                    <th>Xem</th>
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
                        
                        <td><img src="../uploads/staffs/<?php echo $arrS['hinh_anh']; ?>" width="30"  height="40"></td>
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
                        <td><?php echo $arrS['pham_vi_hoat_dong_cm']; ?></td>                                              
                        <td><?php echo $arrS['toantg_bantg']; ?></td>
                        
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
                              echo "<button type='submit' class='btn btn-primary btn-sm'  name='view'><i class='fa fa-search'></i></button>";
                              echo "</form>";
                            }
                            else
                            {
                              echo "<button type='button' class='btn btn-primary btn-sm' disabled><i class='fa fa-search'></i></button>";
                            }
                          ?>
                        </td>
                        <td>
                          <?php 
                            if($row_acc['quyen'] == 1)
                            {
                              echo "<form method='POST'>";
                              echo "<input type='hidden' value='".$arrS['id']."' name='idStaff'/>";
                              echo "<button type='submit' class='btn bg-warning btn-sm'  name='edit'><i class='fa fa-pen'></i></button>";
                              echo "</form>";
                            }
                            else
                            {
                              echo "<button type='button' class='btn bg-warning btn-sm' disabled><i class='fa fa-pen'></i></button>";
                            }
                          ?>
                          
                        </td>
                        <td>
                          <?php 
                            if($row_acc['quyen'] == 1)
                            {
                              echo "<button type='button' class='btn bg-red btn-sm' data-toggle='modal' data-target='#exampleModal' data-whatever='".$arrS['id']."'><i class='fa fa-trash'></i></button>";
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