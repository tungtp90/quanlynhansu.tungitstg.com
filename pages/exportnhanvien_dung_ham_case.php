<?php

// Include Database connection
include("../config.php");
// Include SimpleXLSXGen library
include("../pages/SimpleXLSXGen.php");

$dsnhanvien = [['STT', 'Mã NV', 'Họ tên', 'Giới tính', 'Ngày sinh', 'Hôn Nhân', 'CMND', 'Loại nhân viên', 'Phòng ban', 'Chức vụ', 'Trạng thái']];

$id = 0;
$sql = "SELECT ma_nv, ten_nv, ngay_sinh, 
(CASE  gioi_tinh 
WHEN  1 THEN 'Nam' 
ELSE 'Nữ' END) AS gioi_tinh, 
(CASE  hon_nhan_id 
WHEN  1 THEN 'Độc thân' 
WHEN  2 THEN 'Đính hôn'
WHEN  3 THEN 'Có gia đình'
WHEN  4 THEN 'ly thân'
ELSE 'Ly hôn' END) AS hon_nhan_id,
so_cmnd,
 (CASE  phong_ban_id 
WHEN  20 THEN 'Phòng tổ chức - hành chính' 
WHEN  21 THEN 'Phòng kinh doanh'
WHEN  22 THEN 'Phòng tài chính - kế toán'
WHEN  23 THEN 'Văn phòng đại diện'
WHEN  24 THEN 'Phòng kinh tế - kỹ thuật'
WHEN  25 THEN 'Phòng kinh tế - kỹ thuật'
ELSE '' END) AS phong_ban_id,
(CASE  loai_nv_id
WHEN  2 THEN 'Nhân viên chính thức'
WHEN  3 THEN 'Nhân viên thực tập'
WHEN  4 THEN 'Nhân viên thời vụ'
ELSE 'Nhân viên thử việc' END) AS loai_nv_id,
 (CASE  chuc_vu_id 
WHEN  16 THEN 'Phó giám đốc' 
WHEN  17 THEN 'Giám đốc'
WHEN  33 THEN 'Nhân viên'
WHEN  37 THEN 'Trưởng phòng'
WHEN  38 THEN 'Phó phòng'
ELSE 'Marketing' END) AS chuc_vu_id , 
 (CASE  trang_thai 
WHEN  1 THEN 'Đang làm việc' 
ELSE 'Đã nghỉ việc' END) AS trang_thai   FROM nhanvien"; // Hiện giới tính khi xuất excell từ database
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
  foreach ($res as $row) {
    $id++;
    $dsnhanvien = array_merge($dsnhanvien, array(array($id, $row['ma_nv'], $row['ten_nv'], $row['gioi_tinh'], $row['ngay_sinh'], $row['hon_nhan_id'], $row['so_cmnd'], $row['loai_nv_id'], $row['phong_ban_id'], $row['chuc_vu_id'], $row['trang_thai'])));
  }
}
 // cau hinh lai cac truong
 

$xlsx = SimpleXLSXGen::fromArray($dsnhanvien);
$xlsx->downloadAs('dsnhanvien.xlsx'); // This will download the file to your local system

// $xlsx->saveAs('employees.xlsx'); // This will save the file to your server

echo "<pre>";
print_r($dsnhanvien);

  	// dinh dang file excel
?>

  	