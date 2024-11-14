/*
SQLyog Job Agent Copyright(c) Webyog Inc. All Rights Reserved.
MySQL - 10.4.13-MariaDB : Database - qlns
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`qlns` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `qlns`;

/*Table structure for table `bang_cap` */

DROP TABLE IF EXISTS `bang_cap`;

CREATE TABLE `bang_cap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_bang_cap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_bang_cap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `bang_cap` */

insert  into `bang_cap` values 
(0,'MBC1569664716','Không','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(1,'MBC1569651987','Bằng cử nhân','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(2,'MBC1569652012','Bằng thạc sĩ','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(3,'MBC1569652035','Bằng tiến sĩ','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(4,'MBC1569652169','Cử nhân khoa học xã hội','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(5,'MBC1569652180','Cử nhân khoa học tự nhiên','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(8,'MBC1569652431','Cử nhân quản trị kinh doanh','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(9,'MBC1569652436','Cử nhân thương mại và quản trị','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(10,'MBC1569652441','Cử nhân kế toán','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(11,'MBC1569652448','Cử nhân luật','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(12,'MBC1569652456','Cử nhân ngành quản trị và chính sách công','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(13,'MBC1569652463','Thạc sĩ khoa học xã hội','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(14,'MBC1569652469','Thạc sĩ khoa học tự nhiên','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(15,'MBC1569652475','Thạc sĩ quản trị kinh doanh','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(16,'MBC1569652481','Thạc sĩ kế toán','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00');

/*Table structure for table `chi_tiet_nhom` */

DROP TABLE IF EXISTS `chi_tiet_nhom`;

CREATE TABLE `chi_tiet_nhom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_nhom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nhan_vien_id` int(11) NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `chi_tiet_nhom` */

insert  into `chi_tiet_nhom` values 
(25,'GRP1658885573',17,'TrầnTùng','2022-07-27 08:43:59');

/*Table structure for table `chinh_luong` */

DROP TABLE IF EXISTS `chinh_luong`;

CREATE TABLE `chinh_luong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nhanvien_id` int(11) NOT NULL,
  `so_qd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_ky_ket` datetime NOT NULL,
  `ngay_dieu_chinh` datetime NOT NULL,
  `heso_luong_cu` double NOT NULL,
  `heso_luong_moi` double NOT NULL,
  `nguoi_tao_id` int(11) NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua_id` int(11) NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nhanvien_id` (`nhanvien_id`),
  CONSTRAINT `chinh_luong_ibfk_1` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `chinh_luong` */

/*Table structure for table `chuc_vu` */

DROP TABLE IF EXISTS `chuc_vu`;

CREATE TABLE `chuc_vu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_chuc_vu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_chuc_vu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `luong_ngay` double NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `chuc_vu` */

insert  into `chuc_vu` values 
(16,'MCV1569203762','Phó giám đốc',560000,'','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(17,'MCV1569203773','Giám đốc',600000,'','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(33,'MCV1569204007','Nhân viên',230000,'','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(37,'MCV1569985216','Trưởng phòng',310000,'','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(38,'MCV1569985261','Phó phòng',280000,'','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(39,'MCV1571105797','Marketing',285000,'<p>Quảng b&aacute;, k&ecirc;u gọi kh&aacute;ch h&agrave;ng tham gia.</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00');

/*Table structure for table `chuyen_mon` */

DROP TABLE IF EXISTS `chuyen_mon`;

CREATE TABLE `chuyen_mon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_chuyen_mon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_chuyen_mon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `chuyen_mon` */

insert  into `chuyen_mon` values 
(0,'MCM1569664640','Không','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(2,'MCM1569208526','Kế toán','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(3,'MCM1569208539','Công nghệ thông tin','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(4,'MCM1569208553','Quản trị nhà hàng - khách sạn','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(5,'MCM1569208562','Tiếp tân','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(6,'MCM1569208577','Sale','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(7,'MCM1569208618','Hành chính văn phòng','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(8,'MCM1569208631','Quản lý chất lượng','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(9,'MCM1569208648','Thương mại điện tử','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(10,'MCM1569208673','Tài chính','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(11,'MCM1569208680','Quản lý','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(12,'MCM1569208698','Maketing','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(13,'MCM1569208705','Khởi nghiệp','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(14,'MCM1569208731','Quản lý nguồn nhân lực','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(15,'MCM1569208740','Kinh doanh','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(16,'MCM1569208758','Vận tải và hậu cần','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(17,'MCM1569208771','Kinh doanh','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(18,'MCM1569208782','Bán lẻ','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00');

/*Table structure for table `cong_tac` */

DROP TABLE IF EXISTS `cong_tac`;

CREATE TABLE `cong_tac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_cong_tac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_id` int(11) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `dia_diem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `muc_dich` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu_ct` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nhanvien_id` (`nhanvien_id`),
  CONSTRAINT `cong_tac_ibfk_1` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cong_tac` */

insert  into `cong_tac` values 
(14,'MCT1662016908',119,'2022-09-01','2022-09-02','Bệnh viện đa khoa Hoàng Tuấn','hỗ trợ                                            ',' ghi chú - hỗ trợ                                            ','Trần Tùng','2022-09-01 14:21:48','Trần Tùng','2022-09-01 16:45:25');

/*Table structure for table `dan_toc` */

DROP TABLE IF EXISTS `dan_toc`;

CREATE TABLE `dan_toc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_dan_toc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `dan_toc` */

insert  into `dan_toc` values 
(1,'Kinh'),
(2,'Khơ-me'),
(3,'Mường'),
(4,'Thổ'),
(5,'H\'Mông'),
(6,'Ê-đê'),
(7,'Bố Y'),
(8,'Lào'),
(9,'Tày'),
(10,'Thái'),
(11,'Nùng'),
(12,'Khơ-mú'),
(13,'M\'Nông'),
(14,'Xơ Đăng'),
(15,'Chăm'),
(16,'Gia Rai'),
(17,'Hoa'),
(18,'Lô Lô'),
(19,'Phù Lá');

/*Table structure for table `don_vi` */

DROP TABLE IF EXISTS `don_vi`;

CREATE TABLE `don_vi` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `ten_don_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `don_vi` */

insert  into `don_vi` values 
(1,'Bệnh viện đa khoa Hoàng Tuấn'),
(2,'Trung tâm An Dưỡng Hoàng Tuấn'),
(3,'TTYK Hoàng Tuấn Vĩnh Châu'),
(4,'BVĐK Hoàng Tuấn Ngã Năm');

/*Table structure for table `khen_thuong_ky_luat` */

DROP TABLE IF EXISTS `khen_thuong_ky_luat`;

CREATE TABLE `khen_thuong_ky_luat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_kt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_qd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_qd` date NOT NULL,
  `nhanvien_id` int(11) NOT NULL,
  `ten_khen_thuong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loai_kt_id` int(11) NOT NULL,
  `hinh_thuc` tinyint(1) NOT NULL,
  `so_tien` double NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `ghi_chu` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `loai_kt_id` (`loai_kt_id`),
  KEY `nhanvien_id` (`nhanvien_id`),
  CONSTRAINT `khen_thuong_ky_luat_ibfk_1` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `khen_thuong_ky_luat_ibfk_2` FOREIGN KEY (`loai_kt_id`) REFERENCES `loai_khen_thuong_ky_luat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `khen_thuong_ky_luat` */

/*Table structure for table `ky_hop_dong` */

DROP TABLE IF EXISTS `ky_hop_dong`;

CREATE TABLE `ky_hop_dong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_hd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nhan_vien_id` int(11) NOT NULL,
  `loai_hop_dong` int(11) NOT NULL,
  `ngay_soan_hd` datetime NOT NULL,
  `ngay_ky_hd` datetime NOT NULL,
  `ngay_hieu_luc_hd` datetime NOT NULL,
  `dia_diem_ky_hd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_hd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghi_chu_hd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia_diem_lv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phuong_tien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tg_ngay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tg_tuan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tg_nghi_ngoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `luong_can_ban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pc_cong_viec` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pc_doc_hai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pc_an_trua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pc_dien_thoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pc_xang_xe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chi_phi_di_lai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `le_tet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh_thuc_tra_luong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoi_gian_tra_luong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `che_do_nang_luong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bhyt_bhxh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoi_tao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_tao` datetime DEFAULT NULL,
  `nguoi_sua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_sua` datetime DEFAULT NULL,
  `xoa` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nhan_vien_id` (`nhan_vien_id`),
  KEY `loai_hop_dong_id` (`loai_hop_dong`),
  CONSTRAINT `ky_hop_dong_ibfk_1` FOREIGN KEY (`nhan_vien_id`) REFERENCES `nhanvien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ky_hop_dong` */

insert  into `ky_hop_dong` values 
(15,'1.2022/HĐLĐ-HT',119,1,'2022-08-22 00:00:00','2022-08-22 00:00:00','2022-08-22 00:00:00','bvht','nội dung công việc','ghi chú','địa điểm','phuognw tiện','thời gian ngày','thời gian tuần','thời gian nghỉ','lương căn bản','phụ cấp cv','độc hại','ăn trưa','điện thoại','xăng','chi phí','lễ tết','trả lương','thời gian trả','chế độ nâng','bhxh','Trần Tùng','2022-08-22 13:23:38',NULL,NULL,0),
(16,'16.2022/HĐLĐ-HT',120,1,'2022-08-26 00:00:00','2022-08-26 00:00:00','2022-08-26 00:00:00','bvht','                      123','321','Các cơ sở y tế trực thuộc Công ty TNHH Hoàng Tuấn','Cá nhân tự túc','08 h/ngày - Sáng từ 07h đến 11h, Chiều từ 13h đến 17h.','06 ngày/tuần.','Nghỉ hằng năm, nghỉ lễ, tết, nghỉ việc riêng: Theo quy định của Luật lao động.','5.096.000 đồng/tháng (Bậc lương x mức lương tối thiểu vùng hiện tại: 1.4 x 3.640.000 đồng)','Không có','182.000  đồng/tháng ( Lương tối thiểu vùng x 5%)','1.300.000 đồng/tháng','200.000 đồng/tháng','200.000 đồng/tháng','1.000.000 đồng/tháng','Theo Quy chế Lương thưởng của Công ty','Một lần bằng tiền mặt.','Từ ngày 02 đến ngày 05 của tháng tiếp theo.','Thực hiện theo quy chế lương thưởng của Công ty và căn cứ vào kết quả thực hiện công việc của người lao động.','Được tham gia bảo hiểm theo quy định của Luật bảo hiểm về mức tham gia và tỷ lệ đóng.','Trần Tùng','2022-08-26 15:27:07',NULL,NULL,0),
(17,'17.2022/HĐLĐ-HT',141,2,'2022-08-29 00:00:00','2022-08-29 00:00:00','2022-08-29 00:00:00','bvht','                      ','','Các cơ sở y tế trực thuộc Công ty TNHH Hoàng Tuấn','Cá nhân tự túc','08 h/ngày - Sáng từ 07h đến 11h, Chiều từ 13h đến 17h.','06 ngày/tuần.','Nghỉ hằng năm, nghỉ lễ, tết, nghỉ việc riêng: Theo quy định của Luật lao động.','5.096.000 đồng/tháng (Bậc lương x mức lương tối thiểu vùng hiện tại: 1.4 x 3.640.000 đồng)','Không có','182.000  đồng/tháng ( Lương tối thiểu vùng x 5%)','1.300.000 đồng/tháng','200.000 đồng/tháng','200.000 đồng/tháng','1.000.000 đồng/tháng','Theo Quy chế Lương thưởng của Công ty','Một lần bằng tiền mặt.','Từ ngày 02 đến ngày 05 của tháng tiếp theo.','Thực hiện theo quy chế lương thưởng của Công ty và căn cứ vào kết quả thực hiện công việc của người lao động.','Được tham gia bảo hiểm theo quy định của Luật bảo hiểm về mức tham gia và tỷ lệ đóng.','Trần Tùng','2022-08-29 16:47:19',NULL,NULL,0);

/*Table structure for table `loai_khen_thuong_ky_luat` */

DROP TABLE IF EXISTS `loai_khen_thuong_ky_luat`;

CREATE TABLE `loai_khen_thuong_ky_luat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_loai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_loai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `loai_khen_thuong_ky_luat` */

insert  into `loai_khen_thuong_ky_luat` values 
(5,'LKT1571280354','Nhân viên đồng','',1,'Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(6,'LKT1571280364','Nhân viên bạc','',1,'Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(7,'LKT1571280370','Nhân viên vàng','',1,'Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(8,'LKT1571280376','Nhân viên kim cương','',1,'Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(14,'LKL1571366769','Nhân viên đi trễ','<p>Nh&acirc;n vi&ecirc;n thường xuy&ecirc;n đi trễ</p>\r\n',0,'Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(15,'LKL1571366807','Nhân viên nghỉ quá ngày cho phép','<p>Nh&acirc;n vi&ecirc;n nghỉ tr&ecirc;n 20 ng&agrave;y/th&aacute;ng.</p>\r\n',0,'Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(19,'LKL1571367774','Test','',0,'Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(20,'LKT1599471135','Doanh so cao','<p>ok</p>\r\n',1,'Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00');

/*Table structure for table `loai_nv` */

DROP TABLE IF EXISTS `loai_nv`;

CREATE TABLE `loai_nv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_loai_nv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_loai_nv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `loai_nv` */

insert  into `loai_nv` values 
(2,'LNV1569654834','Nhân viên chính thức','','Trần Phước Tùng','2022-07-28 14:13:54','Trần Phước Tùng','2022-07-28 14:13:54'),
(3,'LNV1569654844','Nhân viên thử việc','','Trần Phước Tùng','2022-07-28 14:13:54','Trần Phước Tùng','2022-07-28 14:13:54');

/*Table structure for table `luong` */

DROP TABLE IF EXISTS `luong`;

CREATE TABLE `luong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_luong` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_id` int(11) NOT NULL,
  `luong_thang` double NOT NULL,
  `ngay_cong` int(11) NOT NULL,
  `phu_cap` double NOT NULL,
  `khoan_nop` double NOT NULL,
  `tam_ung` double NOT NULL,
  `thuc_lanh` double NOT NULL,
  `ngay_cham` date NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao_id` int(11) NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua_id` int(11) NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nhanvien_id` (`nhanvien_id`),
  CONSTRAINT `luong_ibfk_1` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `luong` */

/*Table structure for table `nhanvien` */

DROP TABLE IF EXISTS `nhanvien`;

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_nv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten_nv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `dan_toc_id` int(11) NOT NULL,
  `so_cchn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_cap_cchn` date DEFAULT NULL,
  `noi_cap_cchn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trang_thai_lv` tinyint(1) DEFAULT NULL,
  `pham_vi_hoat_dong_cm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chung_chi_khac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `toantg_bantg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trinh_do_id` int(11) DEFAULT NULL,
  `chuyen_mon_id` int(11) DEFAULT NULL,
  `chuc_vu_id` int(11) DEFAULT NULL,
  `ngay_bat_dau_lam_viec` date DEFAULT NULL,
  `ngay_thu_viec` date DEFAULT NULL,
  `nhiem_vu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_tham_gia_bhxh` date DEFAULT NULL,
  `luong_co_ban` float DEFAULT NULL,
  `thoi_han_nang_luong` date DEFAULT '1900-01-01',
  `huong_che_do_bhxh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hoc_tap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ky_luat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoi_gian_nghi_viec` date DEFAULT NULL,
  `ly_do_nghi_viec` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phong_ban_id` int(11) DEFAULT NULL,
  `don_vi_id` tinyint(11) DEFAULT NULL,
  `bang_cap_id` int(11) DEFAULT NULL,
  `so_cmnd` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_cap_cmnd` date DEFAULT NULL,
  `noi_cap_cmnd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ho_khau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai_nv_id` int(11) DEFAULT NULL,
  `quoc_tich_id` int(11) DEFAULT NULL,
  `hon_nhan_id` int(11) DEFAULT NULL,
  `ton_giao_id` int(11) DEFAULT NULL,
  `nguoi_tao_id` int(11) DEFAULT NULL,
  `ngay_tao` date DEFAULT NULL,
  `nguoi_sua_id` int(11) DEFAULT NULL,
  `ngay_sua` date DEFAULT NULL,
  `ghi_chu_nv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai_hd` int(5) DEFAULT NULL,
  `xoa` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quoc_tich_id` (`quoc_tich_id`),
  KEY `ton_giao_id` (`ton_giao_id`),
  KEY `dan_toc_id` (`dan_toc_id`),
  KEY `loai_nv_id` (`loai_nv_id`),
  KEY `chuyen_mon_id` (`chuyen_mon_id`),
  KEY `trinh_do_id` (`trinh_do_id`),
  KEY `bang_cap_id` (`bang_cap_id`),
  KEY `phong_ban_id` (`phong_ban_id`),
  KEY `chuc_vu_id` (`chuc_vu_id`),
  KEY `nguoi_tao_id` (`nguoi_tao_id`),
  KEY `nguoi_sua_id` (`nguoi_sua_id`),
  KEY `don_vi_id` (`don_vi_id`),
  KEY `hon_nhan_id` (`hon_nhan_id`),
  CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`quoc_tich_id`) REFERENCES `quoc_tich` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `nhanvien_ibfk_10` FOREIGN KEY (`don_vi_id`) REFERENCES `don_vi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nhanvien_ibfk_12` FOREIGN KEY (`hon_nhan_id`) REFERENCES `tinh_trang_hon_nhan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`ton_giao_id`) REFERENCES `ton_giao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nhanvien_ibfk_3` FOREIGN KEY (`dan_toc_id`) REFERENCES `dan_toc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nhanvien_ibfk_4` FOREIGN KEY (`loai_nv_id`) REFERENCES `loai_nv` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nhanvien_ibfk_5` FOREIGN KEY (`trinh_do_id`) REFERENCES `trinh_do` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nhanvien_ibfk_6` FOREIGN KEY (`chuyen_mon_id`) REFERENCES `chuyen_mon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nhanvien_ibfk_7` FOREIGN KEY (`bang_cap_id`) REFERENCES `bang_cap` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nhanvien_ibfk_8` FOREIGN KEY (`phong_ban_id`) REFERENCES `phong_ban` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nhanvien_ibfk_9` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chuc_vu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nhanvien` */

insert  into `nhanvien` values 
(119,'MNV1660362929','1662348784.png','Trần Phước Tùng','1990-06-03',1,1,'12345/ST-CCHN','2022-08-13','Sóc Trăng',1,'Nội khoa','Siêu âm tổng quát','Toàn thời gian',1,3,16,'2022-08-01','2022-07-01','CNTT123','2022-08-13',3950000,'2022-12-31','Không hưởng','Không học','Không bị kỷ luật','1900-01-01','Không có lý do',20,1,0,'365713046','2022-08-13','CA Sóc Trăng','Sóc Trăng','485 Đường 9A, Phường 4, Tp Sóc Trăng, tỉnh Sóc Trăng','0909123456','tranphuoctung.st@gmail.com',2,1,1,0,13,'2022-09-05',13,'2022-09-05','ghi chú gì đây?',1,NULL),
(120,'MNV1660362929','demo-3x4.jpg','Huỳnh Thị Kim Ngân','1991-11-18',2,1,'999/ST-CCHN','2022-08-13','Sóc Trăng',1,'Nội khoa','Siêu âm tổng quát','Toàn thời gian',1,3,16,'2022-08-01','2022-07-01','CNTT            ','2022-08-13',3950000,'2022-12-31','Không hưởng','Không học','Không bị kỷ luật','1900-01-01','Không có lý do',20,1,0,'365713046','2022-08-13','CA Sóc Trăng','Sóc Trăng','485 Đường 9A, Phường 4, Tp Sóc Trăng, tỉnh Sóc Trăng','0909123456','phuonguyen@gmail.com',2,1,1,0,13,'2022-08-15',13,'2022-08-15','ghi chú gì đây?',1,NULL),
(141,'MNV1660900367','1660900367.jpg','Trầm Thanh Toàn','2022-08-19',1,3,'','2022-08-19','',1,'','','',16,0,16,'2022-08-19','2022-08-19','  ','2022-08-19',0,'2022-08-19','','','','2022-08-19','',30,1,0,'','2022-08-19','','tg','Ấp Tân Bình, Xã Long Bình, huyện Ngã Năm, tỉnh Sóc Trăng','01234567890','tranphuoctung.st@gmail.com',2,4,1,0,13,'2022-08-19',13,'2022-08-19','ghi chú gì đây?',1,NULL),
(142,'MNV1662341868','1662341868.png','Trần Huỳnh Phương Uyên','2018-09-05',2,1,'','2022-09-05','',1,'','','',12,0,33,'2022-09-05','2022-09-05','  ','2022-09-05',0,'2022-09-05','','','','2022-09-05','',21,2,0,'','2022-09-05','','Sóc trăng','Sóc Trăng','01234567890','phuoctung90@gmail.com',2,24,1,0,13,'2022-09-05',13,'2022-09-05','Cháu ngoan bác hồ',1,NULL);

/*Table structure for table `nhom` */

DROP TABLE IF EXISTS `nhom`;

CREATE TABLE `nhom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_nhom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nhom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nhom` */

insert  into `nhom` values 
(9,'GRP1658885573','Bệnh viện Hoàng Tuấn ST','','TrầnTùng','2022-07-27 08:33:08','TrầnTùng','2022-07-27 08:43:33'),
(10,'GRP1658885589','TTYK Hoàng Tuấn VC','','TrầnTùng','2022-07-27 08:33:21','','0000-00-00 00:00:00'),
(11,'GRP1658885602','Hoàng Tuấn Ngã Năm','','TrầnTùng','2022-07-27 08:33:41','','0000-00-00 00:00:00'),
(12,'GRP1658885622','An dưỡng','','TrầnTùng','2022-07-27 08:33:52','','0000-00-00 00:00:00');

/*Table structure for table `phong_ban` */

DROP TABLE IF EXISTS `phong_ban`;

CREATE TABLE `phong_ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_phong_ban` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten_phong_ban` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_sua` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `phong_ban` */

insert  into `phong_ban` values 
(20,'MBP1569204111','Phòng tổ chức - hành chính','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(21,'MBP1569204120','Phòng kinh doanh','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(22,'MBP1569204129','Phòng tài chính - kế toán','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(23,'MBP1569204142','Văn phòng đại diện','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(24,'MBP1569204214','Phòng kinh tế - kỹ thuật','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(25,'MBP1569204303','Phòng kế hoạch - kinh doanh','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(29,'MBP1659940802','Phòng họp','                      ','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(30,'MBP1659942104','Phòng ăn','ăn uống','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(31,'MBP1659951232','Phòng tào lao','                      ','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00');

/*Table structure for table `quoc_tich` */

DROP TABLE IF EXISTS `quoc_tich`;

CREATE TABLE `quoc_tich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_quoc_tich` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `quoc_tich` */

insert  into `quoc_tich` values 
(1,'Danish'),
(2,'Đan Mạch'),
(3,'British / English'),
(4,'Anh'),
(5,'Estonian'),
(6,'Estonia'),
(7,'Finnish'),
(8,'Phần Lan'),
(9,'Icelandic'),
(10,'Irish'),
(11,'Ireland'),
(12,'Latvian'),
(13,'Latvia'),
(14,'Lithuanian'),
(15,'Norwegian'),
(16,'Na Uy'),
(17,'Canada'),
(18,'Scotland'),
(19,'Thụy Điển'),
(20,'Tây Ban Nha'),
(21,'Séc'),
(22,'Ba Lan'),
(23,'Mỹ'),
(24,'Việt Nam'),
(25,'Ấn Độ'),
(26,'Trung Quốc'),
(27,'Mông Cổ'),
(28,'Triều Tiên'),
(29,'Đài Loan'),
(30,'Campuchia'),
(31,'Indonesia'),
(32,'Lào'),
(33,'Philipin'),
(34,'Thái Lan');

/*Table structure for table `tai_khoan` */

DROP TABLE IF EXISTS `tai_khoan`;

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_dt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` tinyint(1) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `truy_cap` int(11) NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tai_khoan` */

insert  into `tai_khoan` values 
(1,'Account','Admin','admin.png','admin@gmail.com','25d55ad283aa400af464c76d713c07ad','099999999999',1,1,46,'2019-09-12 00:00:00','2019-09-17 06:32:36'),
(13,'Trần','Tùng','1658735251.jpg','tranphuoctung.st@gmail.com','202cb962ac59075b964b07152d234b70','0946488000',1,1,72,'2022-07-25 14:16:39','2022-07-25 14:47:31'),
(14,'Nguyễn Anh','Ửng','1658735054.jpg','anhung@gmail.com','202cb962ac59075b964b07152d234b70','0918660999',1,1,4,'2022-07-25 14:44:14','2022-07-25 14:44:14'),
(15,'Tets','Test','admin.png','test@gmail.com','202cb962ac59075b964b07152d234b70','0123456789',0,1,6,'2022-07-26 10:55:19','2022-07-26 10:55:19');

/*Table structure for table `tinh_trang_hon_nhan` */

DROP TABLE IF EXISTS `tinh_trang_hon_nhan`;

CREATE TABLE `tinh_trang_hon_nhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tinh_trang_hon_nhan` */

insert  into `tinh_trang_hon_nhan` values 
(1,'Độc thân'),
(2,'Đã kết hôn'),
(3,'Ly hôn'),
(4,'Không rõ');

/*Table structure for table `ton_giao` */

DROP TABLE IF EXISTS `ton_giao`;

CREATE TABLE `ton_giao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_ton_giao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ton_giao` */

insert  into `ton_giao` values 
(0,'Không'),
(1,'Phật giáo'),
(2,'Thiên chúa giáo'),
(3,'Đạo tin lành'),
(4,'Hồi giáo'),
(5,'Do Thái giáo');

/*Table structure for table `trinh_do` */

DROP TABLE IF EXISTS `trinh_do`;

CREATE TABLE `trinh_do` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_trinh_do` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_trinh_do` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `trinh_do` */

insert  into `trinh_do` values 
(1,'MTD1569206480','1/12','<p>Tr&igrave;nh độ lớp 1/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(2,'MTD1569206546','2/12','<p>Tr&igrave;nh độ lớp 2/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(3,'MTD1569206555','3/12','<p>Tr&igrave;nh độ lớp 3/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(4,'MTD1569206570','4/12','<p>Tr&igrave;nh độ lớp 4/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(5,'MTD1569206579','5/12','<p>Tr&igrave;nh độ lớp 5/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(6,'MTD1569206590','6/12','<p>Tr&igrave;nh độ lớp 6/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(7,'MTD1569206604','7/12','<p>Tr&igrave;nh độ lớp 7/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(8,'MTD1569206616','8/12','<p>Tr&igrave;nh độ lớp 8/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(9,'MTD1569206628','9/12','<p>Tr&igrave;nh độ lớp 9/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(10,'MTD1569206638','10/12','<p>Tr&igrave;nh độ lớp 10/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(11,'MTD1569206649','11/12','<p>Tr&igrave;nh độ lớp 11/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(12,'MTD1569206662','12/12','<p>Tr&igrave;nh độ lớp 12/12</p>\r\n','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(15,'MTD1569651298','Trung cấp','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(16,'MTD1569651304','Cao đẳng','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(17,'MTD1569651310','Đại học','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00'),
(18,'MTD1569651317','Cao học','','Trần Phước Tùng','2022-07-01 00:00:00','Trần Phước Tùng','2022-07-01 00:00:00');

/* Procedure structure for procedure `pro_hop_dong` */

/*!50003 DROP PROCEDURE IF EXISTS  `pro_hop_dong` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_hop_dong`()
BEGIN
	
	END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
