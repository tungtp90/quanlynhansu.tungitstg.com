<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');
 
  
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trình soạn thảo Email</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Gửi Mail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="col-md-12">
            <div class="card card-primary card-outline">
              <form method="POST" action="send-email.php" enctype="multipart/form-data">
                <div class="card-header">
                  <h3 class="card-title">Compose New Message</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">                
                      <input type="email" class="form-control"  placeholder="Địa chỉ Email nhận:" name="email" required="required"/>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Tiêu đề:" name="subject" required="required"/>
                  </div>
                  <div class="form-group">
                      <textarea type="text" id="compose-textarea" class="form-control" style="height: 500px" name="message" required="required"></textarea>
                  </div>
                  <div class="form-group">
                      <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"></i> Đính kèm tệp
                        <input type="file" name="attachment" class="up">
                      </div>
                      <p class="help-block">Max.25MB</p>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="float-right">                  
                    <button name="send" type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Gửi thư</button>
                  </div>
                  <br />
                <?php
                  if(ISSET($_SESSION['status'])){
                    if($_SESSION['status'] == "ok"){
                ?>
                      <div class="alert alert-info"><?php echo $_SESSION['result']?></div>
                <?php
                    }else{
                ?>
                      <div class="alert alert-danger"><?php echo $_SESSION['result']?></div>
                <?php
                    }
                    
                    unset($_SESSION['result']);
                    unset($_SESSION['status']);
                  }
                ?>                  
                  </div>
                  <!-- /.card-footer -->                
              </form>
              
            </div>
            <!-- /.card -->
          </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
</div>
<!-- ./wrapper -->
<!-- <script src="../plugins/summernote/summernote-bs4.min.js"></script>  -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>

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