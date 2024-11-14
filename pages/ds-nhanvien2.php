
<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  //include('../layouts/topbar.php');
  

  // show data
  $showData = "SELECT * FROM nhanvien ORDER BY id DESC";
  $result = mysqli_query($conn, $showData);
  $arrShow = array();
  while ($row = mysqli_fetch_array($result)) {
    $arrShow[] = $row;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
        #father{
            border:5px solid red;
            width:400px;
            overflow:auto;
        }
        table, th, td{
            border:1px solid #ccc;
        }
        table{
            border-collapse:collapse;
            width:600px;
        }
        th, td{
            text-align:left;
            padding:10px;
        }
    </style>
</head>
<body>
  <div class="table-responsive ">
                <table id="father" class="table table-hover table-fixed">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã nhân viên</th>
                    <th>Ảnh</th>
                    <th>Tên nhân viên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>                    
                    <th>Số CMND</th>                   
                    <th>Số điện thoại</th>                   
                    <th>Số CCHN</th>
                    <th>Ngày cấp</th>
                    <th>Nơi cấp</th>
                    <th>Trạng thái</th>
                    <th>Phạm vi HĐCM</th>
                    <th>Chứng chỉ khác</th>
                    <th>Thời gian làm việc</th>
                    <th>Loại HĐLĐ</th>
                    <th>Trình độ</th>
                    <th>Chuyên môn</th>
                    <th>Vị trí làm việc</th>
                    <th>Ngày bắt đầu làm việc</th>
                    <th>Ngày thử việc</th>
                    <th>Tham gia BHXH</th>
                    <th>Lương cơ bản</th>
                    <th>Nâng bậc lương</th>
                    <th>Hưởng chế độ BHXH</th>
                    <th>Học tập - nâng cao</th>
                    <th>Kỷ luật lao động</th>
                    <th>Ngày chấm dứt HĐLĐ</th>
                    <th>Lý do thôi việc</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>                    
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
                        <td><?php echo $arrS['ma_nv']; ?></td>
                        <td><img src="../uploads/staffs/<?php echo $arrS['hinh_anh']; ?>" width="80"></td>
                        <td with="100%"><?php echo $arrS['ten_nv']; ?></td>
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
                        
                        <td><?php echo $arrS['so_cmnd']; ?></td>
                        <td><?php echo $arrS['so_dien_thoai']; ?></td>
                        
                        <td><?php echo $arrS['so_cchn']; ?></td>
                        <td><?php echo $arrS['ngay_cap_cchn']; ?></td>
                        <td><?php echo $arrS['noi_cap_cchn']; ?></td>
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
                        <td><?php echo $arrS['pham_vi_hoat_dong_cm']; ?></td>
                        <td><?php echo $arrS['chung_chi_khac']; ?></td>
                        <td><?php echo $arrS['toantg_bantg']; ?></td>
                        <td><?php echo $arrS['loai_hop_dong_id']; ?></td>
                        <td><?php echo $arrS['trinh_do_id']; ?></td>
                        <td><?php echo $arrS['chuyen_mon_id']; ?></td>
                        <td><?php echo $arrS['chuc_vu_id']; ?></td>
                        <td><?php echo $arrS['ngay_bat_dau_lam_viec']; ?></td>
                        <td><?php echo $arrS['ngay_thu_viec']; ?></td>                       
                        <td><?php echo $arrS['ngay_tham_gia_bhxh']; ?></td>
                        <td><?php echo $arrS['luong_co_ban']; ?></td>
                        <td><?php echo $arrS['thoi_han_nang_luong']; ?></td>
                        <td><?php echo $arrS['huong_che_do_bhxh']; ?></td>
                        <td><?php echo $arrS['hoc_tap']; ?></td>
                        <td><?php echo $arrS['ky_luat']; ?></td>
                        <td><?php echo $arrS['thoi_gian_nghi_viec']; ?></td>
                        <td><?php echo $arrS['ly_do_nghi_viec']; ?></td>
                        <td><?php echo $arrS['email']; ?></td>
                        <td><?php echo $arrS['dia_chi']; ?></td>
                        <td><?php echo $arrS['ghi_chu']; ?></td>
                        
                      </tr>
                  <?php
                      $count++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>

            
    </html>