-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 07:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maizedpapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

CREATE TABLE `analysis` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `cause` text NOT NULL,
  `cure` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analysis`
--

INSERT INTO `analysis` (`id`, `code`, `cause`, `cure`) VALUES
(1, 'Northern_Leaf_Blight', '', '                <h5>Cures : </h5></br>\r\n<ul>\r\n  <li>The use of foliar fungicides for corn have also been shown to control of this disease.</li>\r\n  <li>Chemical control should not be necessary for the management of this disease, and its use is unlikely to bring economic returns. However, if fungicides are needed, use chlorothalonil or mancozeb.</li>\r\n  <li>Choose hybrid varieties with known resistance to maize northern leaf blight</li>\r\n</ul>  '),
(2, 'Common_rust_', '', '                <h5>Cures : </h5></br>\r\n<ul>\r\n  <li>Symptoms of common rust often appear after silking.</li>\r\n  <li>Apply a foliar fungicides early in the season</li>\r\n  <li>Product containing mangozeb,pyraclostrobin,pyraclostrobin + metconazole</li>\r\n</ul>  '),
(3, 'Cercospora_leaf_spot Gray_leaf_spot', '', '                <h5>Cures : </h5></br>\r\n<ul>\r\n  <li>Symptoms of gray leaf spot are usually first noticed in the lower leaves.</li>\r\n  <li>Foliar fungicide treatment is way to manage disease</li>\r\n  <li>Fungicides containing pyraclostrobin and strobirubin is useful pesticides for control this disease</li>\r\n</ul>  '),
(4, 'healthy', '', '                <h5>Precautions you can  \r\n take : </h5></br>\r\n<ul>\r\n  <li>Keep an eye on any fungus growing in field.</li>\r\n  <li>Supply water with minerals regularly.</li>\r\n  <li>Use ample amount of pesticides</li>\r\n  <li>Perform periodic checks.</li>\r\n</ul>  ');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `result_id` int(50) NOT NULL,
  `imageUrl` text NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `result_id`, `imageUrl`, `createdOn`) VALUES
(8, 6, 4, '50de6364c977511afdfcc55b2ca7c130.JPG', '2021-05-30 19:54:32'),
(9, 6, 3, 'c00e9c446ba88c5682ca8349796e2d08.JPG', '2021-05-30 19:54:32'),
(10, 6, 4, '7bf93fd4329655f0af283e54b7abbd51.jpg', '2021-05-30 19:54:32'),
(11, 6, 4, '545efa8011c604a70e84ea3113c95550.jpg', '2021-05-30 19:55:00'),
(12, 6, 4, '4fe380080a659fec210bdc6045cd44e1.jpg', '2021-05-30 19:59:58'),
(13, 6, 3, 'de772adad6a14010bda08043b3e0ee1b.JPG', '2021-05-30 20:00:34'),
(14, 6, 3, '48374a4e85cf11baa4ca992ec7951a7c.jpg', '2021-05-30 20:00:39'),
(15, 6, 3, '63f75b7222f7bbab23b555b399a4be1d.JPG', '2021-05-30 20:00:44'),
(16, 6, 3, '8a3ce2be080940c958db1106a618d5da.jpg', '2021-05-30 20:00:50'),
(17, 6, 1, '9a70bd68a5900f9eff2fce6406fcfc3d.JPG', '2021-05-30 20:00:57'),
(18, 6, 4, '16841461cfae640a3cf72c4c2e1bd64a.jpg', '2021-05-31 12:07:30'),
(19, 6, 1, '6f818f0d77b5ccf367a90899b7335925.JPG', '2021-05-31 12:07:51'),
(20, 6, 1, '267a8a8de4489eca7d884d7158cec38a.JPG', '2021-05-31 12:10:36'),
(21, 6, 1, '9479e8a1431771dcadb2f95398655c64.JPG', '2021-05-31 12:11:08'),
(22, 6, 3, '85e36750ffd45580484e961f3568d87f.JPG', '2021-05-31 12:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(5000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `createdOn`) VALUES
(6, 'Anant', 'Raut', 'demo@demo.com', '$2y$10$mJgDxjGpc3we8TjHBJpnOud.tqqUn4aYd6PUwgAspysT/fGXRXooS', '2021-05-23 10:35:22'),
(7, 'Anant', 'Raut', 'demo2@demo.com', '$2y$10$XzNZNG6JyC6yyAJpVFEID.vrYD/Tq.cVvknQdsLeORidLeEv4Rita', '2021-05-27 16:31:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysis`
--
ALTER TABLE `analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysis`
--
ALTER TABLE `analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
