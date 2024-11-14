<?php

// Include Database connection
include("../config.php");
// Include SimpleXLSXGen library
include("../Support-Excel/support-export-excel.php");

$dsnhanvien = [['STT','Mã nhân viên', 'Tên nv', 'Ngày sinh', 'Giới tính', 'Dân tộc','Số CCHN','Ngày cấp CCHN','Nơi cấp CCHN', 
 'Trạng thái lv', 'Phạm vi chuyên môn', 'Chứng chỉ khác', 'Toàn thời gian/ Bán thời gian', 'Loại hợp đồng', 'Trình độ',
 'Chuyên môn', 'Chức vụ' , 'Ngày bắt đầu làm', 'Ngày thử việc', 'Ngày tham gia BHXH','Nhiệm vụ', 'Lương cơ bản'  , 'Thời hạn nâng lương',
 'Hưởng chế độ BHXH', 'Học tập nâng cao ' ,'Kỷ luật' , 'Thời gian nghỉ việc' , 'Lý do nghỉ việc' , 'Phòng ban' , 'Đơn vị'  ,
 'Bằng cấp','Ngày ký hợp đồng',  'Loại nhân viên', 'Quốc tịch', 'Tôn giáo ' ,'CMND' , 'Ngày cấp CMND', 'Nơi cấp CMND','Địa chỉ', 'Điện thoại','Ghi chú']];

$id = 0;
$sql = "SELECT nv.id AS id, ma_nv, ten_nv, ngay_sinh, (CASE gioi_tinh WHEN 1 THEN 'Nam' ELSE 'Nữ' END) AS gioi_tinh, ten_dan_toc, so_cchn, ngay_cap_cchn, noi_cap_cchn,
(CASE  trang_thai_lv WHEN 1 THEN 'Đang làm việc' ELSE 'Đã nghỉ việc' END) AS trang_thai_lv, pham_vi_hoat_dong_cm, chung_chi_khac, toantg_bantg, 
(CASE loai_hop_dong WHEN 1 THEN 'Không thời hạn' WHEN 2 THEN 'Có thời hạn' WHEN 3 THEN 'Thử việc' END) AS loai_hop_dong, ten_trinh_do, ten_chuyen_mon, ten_chuc_vu, ngay_bat_dau_lam_viec,
ngay_thu_viec, ngay_tham_gia_bhxh, nhiem_vu, luong_co_ban, thoi_han_nang_luong, huong_che_do_bhxh, hoc_tap, ky_luat, 
thoi_gian_nghi_viec, ly_do_nghi_viec, ten_phong_ban, ten_don_vi,ten_bang_cap, ngay_ky_hd, ten_loai_nv, 
ten_quoc_tich, ten_ton_giao,so_cmnd, ngay_cap_cmnd, noi_cap_cmnd, dia_chi, so_dien_thoai, ghi_chu_nv
FROM nhanvien nv, quoc_tich qt, dan_toc dt, ton_giao tg, loai_nv lnv, trinh_do td, chuyen_mon cm, bang_cap bc, 
phong_ban pb, chuc_vu cv, tinh_trang_hon_nhan hn, don_vi dv, ky_hop_dong khd WHERE nv.quoc_tich_id = qt.id AND nv.dan_toc_id = dt.id 
AND nv.ton_giao_id = tg.id AND nv.loai_nv_id = lnv.id AND nv.trinh_do_id = td.id AND nv.chuyen_mon_id = cm.id 
AND nv.bang_cap_id = bc.id AND nv.phong_ban_id = pb.id AND nv.chuc_vu_id = cv.id AND nv.hon_nhan_id = hn.id AND nv.don_vi_id = dv.id AND khd.nhan_vien_id = nv.id
ORDER BY nv.id DESC"; // Hiện giới tính khi xuất excell từ database
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
  foreach ($res as $row) {
    $id++;
    $dsnhanvien = array_merge($dsnhanvien, array(array($id, $row['ma_nv'], $row['ten_nv'],$row['ngay_sinh'], $row['gioi_tinh'], 
    $row['ten_dan_toc'],$row['so_cchn'],$row['ngay_cap_cchn'],$row['noi_cap_cchn'],$row['trang_thai_lv'],$row['pham_vi_hoat_dong_cm'],
    $row['chung_chi_khac'],$row['toantg_bantg'],$row['loai_hop_dong'],$row['ten_trinh_do'],$row['ten_chuyen_mon'],$row['ten_chuc_vu'],
    $row['ngay_bat_dau_lam_viec'],$row['ngay_thu_viec'],
     $row['ngay_tham_gia_bhxh'],$row['nhiem_vu'],$row['luong_co_ban'], $row['thoi_han_nang_luong'],$row['huong_che_do_bhxh'],$row['hoc_tap'],
     $row['ky_luat'], $row['thoi_gian_nghi_viec'], $row['ly_do_nghi_viec'], $row['ten_phong_ban'], $row['ten_don_vi'], $row['ten_bang_cap'], 
     $row['ngay_ky_hd'], $row['ten_loai_nv'], $row['ten_quoc_tich'], $row['ten_ton_giao'],$row['so_cmnd'], $row['ngay_cap_cmnd'], 
     $row['noi_cap_cmnd'], $row['dia_chi'],$row['so_dien_thoai'], $row['ghi_chu_nv'])));
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

  	