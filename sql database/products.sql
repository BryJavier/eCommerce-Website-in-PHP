-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 09:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `cpus`
--

CREATE TABLE `cpus` (
  `product_id` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `product_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cpus`
--

INSERT INTO `cpus` (`product_id`, `product_name`, `product_image`, `currency`, `price`, `qty`, `product_description`) VALUES
('INTI7-10700', 'Intel Core i7-10700', 'img/cpus/intel_i7-10700.jpg', 'PHP', 25000, 10, '<h3> CPU Specifications </h3>\r\nNumber of Cores: 8 <br>\r\nNumber of Threads 16: <br>\r\nProcessor Base Frequency: 2.90 GHz <br>\r\nMax Turbo Frequency: 4.80 GHz <br>\r\nCache 16 MB Intel® Smart Cache <br>\r\nBus Speed: 8 GT/s <br>\r\nIntel® Turbo Boost Max Technology 3.0 Frequency: 4.80 GHz<br>\r\nIntel® Turbo Boost Technology 2.0 Frequency: 4.70 GHz<br>\r\nTDP: 65 W<br>'),
('INTI9-11900K', 'Intel Core i9-11900K', 'img/cpus/intel_i9-11900k.jpg', 'PHP', 20000, 10, '<h3> CPU Specifications </h3>\r\nNumber of Cores: 8 <br>\r\nNumber of Threads: 16 <br>\r\nProcessor Base Frequency: 3.50 GHz<br>\r\nMax Turbo Frequency: 5.30 GHz<br>\r\nIntel® Thermal Velocity Boost Frequency: 5.30 GHz<br>\r\nCache: 16 MB Intel® Smart Cache<br>\r\nBus Speed: 8 GT/s<br>\r\nIntel® Turbo Boost Max Technology 3.0 Frequency: 5.20 GHz<br>\r\nIntel® Turbo Boost Technology 2.0 Frequency: 5.10 GHz<br>\r\nTDP: 125 W<br>\r\nConfigurable TDP-down Frequency: 3.00 GHz<br>\r\nConfigurable TDP-down: 95 W<br>'),
('RYZN5-3600', 'AMD Ryzen 5-3600', 'img/cpus/ryzen5-3600.jpg', 'PHP', 10000, 10, '<h3> Specifications </h3>\r\nNumber of CPU Cores: 6 <br>\r\nNumber of Threads: 12 <br>\r\nBase Clock: 3.6GHz<br>\r\nMax Boost Clock Up to 4.2GHz<br>\r\nTotal L1 Cache: 384KB <br>\r\nTotal L2 Cache: 3MB <br>\r\nTotal L3 Cache: 32MB <br>\r\nUnlocked: Yes <br>\r\nCMOS: TSMC 7nm FinFET<br>\r\nPackage: AM4<br>\r\nPCI Express® Version: PCIe 4.0 x16 <br>\r\nThermal Solution (PIB): Wraith Stealth<br>\r\nThermal Solution (MPK): Wraith Stealth<br>\r\nDefault TDP / TDP: 65W<br>\r\nMax Temps: 95°C'),
('RYZN7-5800X', 'AMD Ryzen 7-5800X', 'img/cpus/ryzen7-5800x.jpg', 'PHP', 23000, 10, '<h3>Specifications</h3>\r\nNumber of CPU Cores: 8 <br>\r\nNumber of Threads: 16<br>\r\nBase Clock: 3.8GHz<br>\r\nMax Boost Clock Up to 4.7GHz<br>\r\nTotal L2 Cache: 4MB<br>\r\nTotal L3 Cache: 32MB<br>\r\nUnlocked: Yes<br>\r\nCMOS: TSMC 7nm FinFET<br>\r\nPackage: AM4<br>\r\nPCI Express® Version: PCIe 4.0<br>\r\nThermal Solution (PIB): Not included<br>\r\nDefault TDP / TDP: 105W<br>\r\nMax Temps: 90°C');

-- --------------------------------------------------------

--
-- Table structure for table `gpus`
--

CREATE TABLE `gpus` (
  `product_id` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `product_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gpus`
--

INSERT INTO `gpus` (`product_id`, `product_name`, `product_image`, `currency`, `price`, `qty`, `product_description`) VALUES
('GIGABYTE-RTX3060_OC', 'Gigabyte RTX 3060 OC Edition 6gb VRAM', 'img/gpus/gigabyte_rtx3060oc_edition.jpg', 'PHP', 50000, 10, '<h3> FEATURES </h3>\r\nNVIDIA Ampere Streaming Multiprocessors<br>\r\n2nd Generation RT Cores<br>\r\n3rd Generation Tensor Cores<br>\r\nPowered by GeForce RTX™ 3060<br>\r\nIntegrated with 12GB GDDR6 192-bit memory interface<br>\r\nWINDFORCE 3X Cooling System with alternate spinning fans<br>\r\nRGB Fusion 2.0<br>\r\nProtection metal back plate<br>'),
('MSI-GTX1660TI', 'MSI Ventus Aero ITX GTX 1660ti 6gb VRAM', 'img/gpus/msi_gtx-1660ti.jpg', 'PHP', 40000, 10, 'Core/Memory<br>\r\n\r\n1830 MHz / 12 Gbps<br>\r\n6GB GDDR6<br>\r\nAll Solid Capacitors<br><br>\r\n\r\n10 years long lifetime under full load.<br>\r\nLower temperature and higher efficiency.<br>\r\nAluminum core for higher stability.<br>\r\nAfterburner Overclocking Utility<br><br>\r\n\r\nWireless control through Android/iOS devices.<br>\r\nPredator: In-game video recording.<br>\r\nKombustor: built-in DirectX12 benchmark.<br>\r\nNVIDIA G-SYNC™<br><br>\r\n\r\nSynchronizes the display refresh to your GeForce GTX GPU for the fast, smooth gaming<br>\r\n'),
('ROG-RTX3080TI-OC', 'Asus ROG Strix RTX 3080 OC Edition 8gb VRAM', 'img/gpus/rog_rtx3080ti-oc_edition.jpg', 'PHP', 60000, 10, 'Graphic Engine: NVIDIA® GeForce RTX™ 3080 <br>\r\nBus Standard: PCI Express 4.0 <br>\r\nOpenGL: OpenGL®4.6 <br>\r\nVideo Memory: 10GB GDDR6X <br>\r\nEngine Clock: OC Mode - 1935 MHz (Boost Clock) Gaming Mode (Default) - GPU Boost <br> Clock : 1905 MHz , GPU Base Clock : 1440 MHz <br>	\r\nCUDA Core: 8704 <br>\r\nMemory Speed: 19 Gbps <br>\r\nMemory Interface: 320-bit <br>\r\nResolution: Digital Max Resolution 7680 x 4320 <br>\r\nInterface: Yes x 2 (Native HDMI 2.1) <br>\r\nHDCP Support Yes (2.3): Yes x 2 (Native HDMI 2.1) <br>\r\nMaximum Display Support: 4 <br>\r\nNVlink/ Crossfire Support: No <br>');

-- --------------------------------------------------------

--
-- Table structure for table `prebuilts`
--

CREATE TABLE `prebuilts` (
  `product_id` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `product_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prebuilts`
--

INSERT INTO `prebuilts` (`product_id`, `product_name`, `product_image`, `currency`, `price`, `qty`, `product_description`) VALUES
('CYBERPWR-RYZN7-RTX3070', 'CyberPower Gaming PC Ryzen 7 RTX 3070 16gb x2', 'img/prebuilts/cyberpowerpc-ryzen7-rtx3070.jpg', 'PHP', 80000, 10, '<h3>Specifications</h3>\r\nProcessor Model: AMD Ryzen 7 5000 Series<br>\r\nProcessor Model Number: 5800X<br>\r\nProcessor Speed (Base): 3.8 gigahertz<br>\r\nStorage Type: SSD<br>\r\nTotal Storage Capacity: 1000.0 gigabytes<br>\r\nSolid State Drive Capacity: 1000.0 gigabytes<br>\r\nSystem Memory (RAM): 16.0 gigabytes<br>\r\nGraphics: NVIDIA GeForce RTX 3070<br>\r\nOperating System: Windows 10'),
('IBUYPWR-I7-GTX1660TI', 'iBuyPower Gaming PC Intel Core i7 GTX 1660ti 16gb ram x2', 'img/prebuilts/ibuypowerpc-i7-gtx1660ti.jpg', 'PHP', 80000, 10, '<h3>Specifications</h3>\r\nProcessor Model: Intel 10th Generation Core i7<br>\r\nProcessor Model Number: Intel i7 10700F<br>\r\nProcessor Speed (Base): 2.9 gigahertz<br>\r\nStorage Type: SSD, HDD <br>\r\nTotal Storage Capacity: 1480 gigabytes<br>\r\nSolid State Drive Capacity: 480 gigabytes<br>\r\nHard Drive Capacity: 1000 gigabytes<br>\r\nSystem Memory (RAM): 16 gigabytes<br>\r\nGraphics: NVIDIA GeForce GTX 1660 Ti<br>\r\nOperating System: Windows 10'),
('LEGION730-I9-RTX2060', 'Lenovo Legion T730 Intel Core i9-990K RTX 2060 16gb Ram x2', 'img/prebuilts/legiont730-i9-rtx2060.jpg', 'PHP', 50000, 10, '<h3> Specifications </h3>\r\nModel number: 28ICO 90JF <br>\r\nProcessor: Core i9 9900K / 3.6 GHz<br>\r\nGraphics card: Nvidia RTX 2060 <br>\r\nRAM: 32 GB<br>\r\nSSD: 1 TB<br>\r\nTCG Opal Encryption 2<br>\r\nHDD: 2 TB<br>');

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `product_id` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `product_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`product_id`, `product_name`, `product_image`, `currency`, `price`, `qty`, `product_description`) VALUES
('CRUCIALBALLISTX-RGB-16GB-2X8GB-3200MHZ-DDR4', 'Crucial Ballistix RGB 16gb 2x8gb 3200mhz DDR4', 'img/ram/crucial-ballistix-rgb-16gb-2x8gb-3200mhz-ddr4.jpg', 'PHP', 6000, 10, 'Speed - DDR4-3600 <br>\r\nWarranty - Limited Lifetime <br>\r\nCAS latency - 16 <br>\r\nDRAM family - Ballistix<br>\r\nDensity - 16GB Kit (8GBx2) <br>\r\nBrand - Crucial<br>\r\nModule type - UDIMM <br>\r\nExtended timings - 16-18-18-38 <br>\r\nTechnology - DDR4 <br>\r\nVoltage - 1.35V <br>\r\nPC speed - PC4-28800 <br>\r\nKit Qty - 2 <br>\r\nSpecs - DDR4 PC4-28800 • 16-18-18 • Unbuffered • NON-ECC • DDR4-3600 • 1.35V • 1024Meg x 64 • <br>\r\nDIMM type - Unbuffered <br>'),
('GSKILLROYAL-64GB-4X16GB-3200MHZ-DDR4', 'GSkill TridentZ Royal 64gb 4x16gb 3200mhz DDR4', 'img/ram/gskill-tridentzroyal-64gb-4x16gb-ddr4.jpg', 'PHP', 10000, 10, 'Memory Type: DDR4 <br>\r\nCapacity: 64GB (16GBx4)<br>\r\nMulti-Channel Kit: Quad Channel Kit<br>\r\nTested Speed: 3600MHz<br>\r\nTested Latency: 16-16-16-36<br>\r\nTested Voltage: 1.35V<br>\r\nRegistered/Unbuffered: Unbuffered<br>\r\nError Checking: Non-ECC<br>\r\nSPD Speed: 2133MHz<br>\r\nSPD Voltage: 1.20V<br>\r\nFan Included: No<br>\r\nWarranty: Limited Lifetime<br>\r\nFeatures: Intel XMP 2.0 (Extreme Memory Profile) Ready<br>\r\nAdditional Notes: Rated XMP frequency & stability depends on MB & CPU capability.'),
('VENGLPX-32GB-2X16GB-3600MHZ-DDR4', 'Venegeance LPX 32gb 2x16gb 3600mhz DDR4', 'img/ram/vengeance-lpx-32gb-2x16gb-3600mg-ddr4.jpg', 'PHP', 8000, 10, 'Fan Included: No <br>\r\nMemory Series: VENGEANCE LPX<br>\r\nMemory Type: DDR4<br>\r\nMemory Size: 32GB Kit (2 x 16GB)<br>\r\nTested Latency: 18-22-22-42<br>\r\nTested Voltage: 1.35V<br>\r\nTested Speed: 3600MHz');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `products` longtext NOT NULL,
  `mode_of_payment` varchar(20) NOT NULL,
  `purchase_date` date NOT NULL,
  `order_canceled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpus`
--
ALTER TABLE `cpus`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `gpus`
--
ALTER TABLE `gpus`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `prebuilts`
--
ALTER TABLE `prebuilts`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
