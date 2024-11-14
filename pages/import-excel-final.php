<?php 

// create session
session_start();
include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');
  include('../config.php');

  // delete record
if(isset($_POST['save']))
{
// create array error
$error = array();
$success = array();
$showMess = false;
  
//--------------------------------
  if(isset($_FILES['excel']['name']))
  {
  //$con=mysqli_connect("localhost","root","","quanly_nhansu");
  include "support-import-excel.php";
  if($conn){
    $excel=SimpleXLSX::parse($_FILES['excel']['tmp_name']);
    echo "<pre>";	
    // print_r($excel->rows(1));
    //print_r($excel->dimension(2));
    //print_r($excel->sheetNames());
        for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) { 
        $rowcol=$excel->dimension($sheet);
        $i=0;
        if($rowcol[0]!=1 &&$rowcol[1]!=1){
    foreach ($excel->rows($sheet) as $key => $row) {
      //print_r($row);
      $q="";
      foreach ($row as $key => $cell) {
        //print_r($cell);echo "<br>";
        if($i==0){
          $q.=$cell. " ,";
        }else{
          $q.="'".$cell. "',";
        }
      }		
      	
      $query="INSERT INTO ".$excel->sheetName($sheet)." values (".rtrim($q,",").");";
      
      //echo $query;
      if(mysqli_query($conn,$query))
      {         
      $i++;
      }  
    }
  }
}
  }
}
if(!$error)
{
  $showMess = true;
  
  if($query)
  {
    echo "<script>alert('Import thành công')</script>";
    $success['success'] = 'Import thành công';
    echo '<script>setTimeout("window.location=\'import-excel-final.php?p=staff&a=employee-type\'",0);</script>';
    
    
    
  } 

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
            <input type="hidden" name="idType">
            Bạn có thực sự muốn xóa loại nhân viên này?
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
      <h1>
        Thêm nhân viên
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
        <li><a href="loai-nhan-vien.php?p=staff&a=employee-type">Thêm nhân viên</a></li>
        <li class="active">Import excel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">&nbsp;&nbsp;Import từ Excel</h3>              
            </div>
              <form action="###" method="POST" enctype="multipart/form-data"> 
                  <div class="box-tools pull-left"> 
                    <!-- dinh dang form import -->                
                    &nbsp;&nbsp;&nbsp;&nbsp;                                                              
                    <input type="file"  name="excel">                                 
                    <small>Chỉ chấp nhận định dạng <span style="color: red;">xls,xlsx</span></small> &nbsp;&nbsp;&nbsp;&nbsp;                               
                    <!-- ket thuc dinh dang form import -->         
                    <button type="submit" class="btn btn-success" name="save"><i class="fa fa-file-excel"></i> Thực hiện import</button>       
                  </div>   
              </form>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
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
              
            </div>
            <div class="col-md-12">
              <div class="card-header">
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Danh sách loại nhân viên</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã nhân viên</th>
                    <th>Ảnh</th>
                    <th>Tên nhân viên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Số CMND</th>                   
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Tình trạng</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  // show data
                     $showData = "SELECT id, ma_nv, hinh_anh, ten_nv, gioi_tinh, ngay_tao, ngay_sinh, dia_chi, so_cmnd, so_dien_thoai, email, trang_thai_lv FROM nhanvien ORDER BY id DESC";
                     $result = mysqli_query($conn, $showData);
                     $arrShow = array();
                     while ($row = mysqli_fetch_array($result)) {
                     $arrShow[] = $row;
                    }  
                    $count = 1;
                    foreach ($arrShow as $arrS) 
                    {
                  ?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $arrS['ma_nv']; ?></td>
                        <td><img src="../uploads/staffs/<?php echo $arrS['hinh_anh']; ?>" width="80"></td>
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
                        <td><?php echo $arrS['dia_chi']; ?></td>
                        <td><?php echo $arrS['so_cmnd']; ?></td>
                        <td><?php echo $arrS['so_dien_thoai']; ?></td>
                        <td><?php echo $arrS['email']; ?></td>
                        <td>
                        <?php 
                          if($arrS['trang_thai_lv'] == 1)
                          {
                            echo '<span class="badge bg-blue"> Đang làm việc </span>';
                          }
                          else
                          {
                            echo '<span class="badge bg-red"> Đã nghỉ việc </span>';
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
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php
  // include
  include('../layouts/footer.php');


            

?>

  	