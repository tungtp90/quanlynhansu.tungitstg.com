<?php  
 function fetch_data()  
 {    
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "qlns");  
      $sql = "SELECT id, ma_nv, hinh_anh, ten_nv, gioi_tinh, ngay_tao, ngay_sinh, tam_tru, so_cmnd, so_dien_thoai, email, trang_thai FROM nhanvien ORDER BY id DESC";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                             
                          <td>'.$row["ten_nv"].'</td>                           
                          <td>'.$row["gioi_tinh"].'</td>
                          <td>'.$row["ngay_sinh"].'</td>
                          <td>'.$row["gioi_tinh"].'</td>                             
                          <td>'.$row["tam_tru"].'</td>
                          <td>'.$row["so_dien_thoai"].'</td> 
                          <td>'.$row["email"].'</td> 
                          <td>'.$row["trang_thai"].'</td> 
                          
                     </tr>  
                          ';  
      }  
      return $output;  
 } 
  //mysqli_set_charset($conn, 'utf8'); 
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('../PDF/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">Danh sách nhân viên</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                    
           <th>Tên nhân viên</th>
           <th>Giới tính</th>
           <th>Ngày sinh</th>
           <th>Địa chỉ</th>
           <th>Số CMND</th>                   
           <th>Số điện thoại</th>
           <th>Email</th>
           <th>Tình trạng</th>
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Danh sách nhân viên</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:1200px;">  
                <h3 align="center">Danh sách nhân viên</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                      
                        <tr>                           
                                             
                          <th>Tên nhân viên</th>
                          <th>Giới tính</th>
                          <th>Ngày sinh</th>
                          <th>Địa chỉ</th>
                          <th>Số CMND</th>                   
                          <th>Số điện thoại</th>
                          <th>Email</th>
                          <th>Tình trạng</th>
                               
                        </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  