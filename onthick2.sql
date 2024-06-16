-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 08:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onthick2`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` varchar(40) NOT NULL,
  `tenhd` varchar(40) NOT NULL,
  `makh` varchar(40) NOT NULL,
  `tongtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `tenhd`, `makh`, `tongtien`) VALUES
('01', 'Bill', '01', 123000),
('02', 'HoaDon', '12', 111111),
('03', 'Invoice', '01', 11111100);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` varchar(40) NOT NULL,
  `tenkh` varchar(40) NOT NULL,
  `sdt` varchar(40) NOT NULL,
  `cccn` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `sdt`, `cccn`) VALUES
('01', 'Trần Hoàng Khánh', '09100000001', '1234'),
('02', 'Nguyễn Phan Khánh Linh', '09100000002', '2345'),
('03', 'Võ Thanh Lâm', '09100000003', '3456'),
('04', 'Lê Hồ Thanh Linh', '09100000004', '4567'),
('05', 'Nguyễn Hiền My', '09100000005', '5678'),
('06', 'Đào Duy Khang', '09100000006', '6789'),
('07', 'Trần Tuấn Kiệt', '09100000007', '7890'),
('08', 'Nguyễn Kỳ Lâm', '09100000008', '8901'),
('09', 'Nguyễn Công Hậu', '09100000009', '9012'),
('10', 'Nguyễn Vân Khánh', '09100000010', '0123'),
('11', 'Trần Hoàng Hùng', '0910000011', '1222'),
('12', 'Hoàng Thị Hà', '0910000012', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `maphong` varchar(40) NOT NULL,
  `tenphong` varchar(40) NOT NULL,
  `tinhtrang` varchar(40) NOT NULL,
  `loaiphong` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`maphong`, `tenphong`, `tinhtrang`, `loaiphong`) VALUES
('01', 'Phòng 1', 'Đang thuê', 'Phòng đơn'),
('02', 'Phòng 2', 'Chưa thuê', 'Phòng đơn'),
('03', 'Phòng 3', 'Chưa thuê', 'Phòng đơn'),
('04', 'Phòng 4', 'Chưa thuê', 'Phòng đơn'),
('05', 'Phòng 5', 'Chưa thuê', 'Phòng đơn'),
('06', 'Phòng 6', 'Chưa thuê', 'Phòng đơn'),
('07', 'Phòng 7', 'Chưa thuê', 'Phòng đơn'),
('08', 'Phòng 8', 'Chưa thuê', 'Phòng đơn'),
('09', 'Phòng 9', 'Đang thuê', 'Phòng đơn'),
('10', 'Phòng 10', 'Chưa thuê', 'Phòng đơn'),
('11', 'Phòng 11', 'Đang thuê', 'Phòng đôi'),
('12', 'Phòng 12', 'Chưa thuê', 'Phòng đôi'),
('13', 'Phòng 13', 'Chưa thuê', 'Phòng đôi'),
('14', 'Phòng 14', 'Chưa thuê', 'Phòng đôi'),
('15', 'Phòng 15', 'Chưa thuê', 'Phòng đôi');

-- --------------------------------------------------------

--
-- Table structure for table `thue`
--

CREATE TABLE `thue` (
  `mahd` varchar(40) NOT NULL,
  `maphong` varchar(40) NOT NULL,
  `ngaythue` date NOT NULL,
  `ngaytra` date NOT NULL,
  `giathue` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thue`
--

INSERT INTO `thue` (`mahd`, `maphong`, `ngaythue`, `ngaytra`, `giathue`) VALUES
('03', '01', '0000-00-00', '0000-00-00', 1800000),
('03', '09', '0000-00-00', '0000-00-00', 1800000),
('03', '11', '0000-00-00', '0000-00-00', 1800000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `makh` (`makh`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`maphong`);

--
-- Indexes for table `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`mahd`,`maphong`),
  ADD UNIQUE KEY `maphong` (`maphong`),
  ADD KEY `mahd` (`mahd`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`);

--
-- Constraints for table `thue`
--
ALTER TABLE `thue`
  ADD CONSTRAINT `thue_ibfk_1` FOREIGN KEY (`maphong`) REFERENCES `phong` (`maphong`),
  ADD CONSTRAINT `thue_ibfk_2` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
