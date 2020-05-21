-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 09:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mpesatransactions`
--

CREATE TABLE `tbl_mpesatransactions` (
  `mpesatransaction_id` bigint(20) UNSIGNED NOT NULL,
  `MerchantRequestID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CheckoutRequestID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_mpesatransactions`
--

INSERT INTO `tbl_mpesatransactions` (`mpesatransaction_id`, `MerchantRequestID`, `CheckoutRequestID`, `status`, `created_at`, `updated_at`) VALUES
(110, '16862-11457710-1', 'ws_CO_210520201719259961', 'success', NULL, NULL),
(111, '12541-11464614-1', 'ws_CO_210520201725495225', NULL, NULL, NULL),
(112, '16853-11489698-1', 'ws_CO_210520201737043295', 'success', NULL, NULL),
(113, '7065-6983680-1', 'ws_CO_210520201751162129', 'success', NULL, NULL),
(114, '19100-7048508-1', 'ws_CO_210520201756239072', 'success', NULL, NULL),
(115, '26464-3830657-1', 'ws_CO_210520201832574751', NULL, NULL, NULL),
(116, '16859-11595889-1', 'ws_CO_210520201835514504', 'success', NULL, NULL),
(117, '12544-11610688-1', 'ws_CO_210520201845473343', 'fail', NULL, NULL),
(118, '26471-3873837-1', 'ws_CO_210520201854394018', NULL, NULL, NULL),
(119, '26476-3966421-1', 'ws_CO_210520201937066596', NULL, NULL, NULL),
(120, '19096-7343461-1', 'ws_CO_210520202020100006', NULL, NULL, NULL),
(121, '22154-13657572-1', 'ws_CO_210520202023311481', 'fail', NULL, NULL),
(122, '12543-11825626-1', 'ws_CO_210520202026377023', NULL, NULL, NULL),
(123, '22167-13664530-1', 'ws_CO_210520202027172905', NULL, NULL, NULL),
(124, '19092-7357668-1', 'ws_CO_210520202027531658', 'success', NULL, NULL),
(125, '4401-116931-1', 'ws_CO_210520202036098112', NULL, NULL, NULL),
(126, '', '', NULL, NULL, NULL),
(127, '16864-11849141-1', 'ws_CO_210520202037072658', NULL, NULL, NULL),
(128, '19103-7379408-1', 'ws_CO_210520202038510699', NULL, NULL, NULL),
(129, '19096-7393322-1', 'ws_CO_210520202045592783', 'success', NULL, NULL),
(130, '12545-11939221-1', 'ws_CO_210520202128038066', 'fail', NULL, NULL),
(131, '16851-11948054-1', 'ws_CO_210520202128540056', NULL, NULL, NULL),
(132, '12541-11941875-1', 'ws_CO_210520202129519540', 'success', NULL, NULL),
(133, '7064-7422119-1', 'ws_CO_210520202130378437', 'fail', NULL, NULL),
(134, '19104-7486477-1', 'ws_CO_210520202134490863', NULL, NULL, NULL),
(135, '22163-13794619-1', 'ws_CO_210520202136356202', 'success', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mpesatransactions`
--
ALTER TABLE `tbl_mpesatransactions`
  ADD PRIMARY KEY (`mpesatransaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mpesatransactions`
--
ALTER TABLE `tbl_mpesatransactions`
  MODIFY `mpesatransaction_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
