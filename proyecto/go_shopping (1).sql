-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2025 at 02:50 AM
-- Server version: 12.1.2-MariaDB
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Abarrotes'),
(4, 'Bebidas'),
(3, 'Carnes frías'),
(10, 'Congelados'),
(7, 'Enlatados'),
(6, 'Higiene personal'),
(2, 'Lácteos'),
(5, 'Limpieza'),
(9, 'Panadería'),
(8, 'Snacks');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` double NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `barcode`, `id_category`, `brand`, `image_url`) VALUES
(32, 'Cloro Regular 1L', 22.5, '7501000100012', 1, 'Cloralex', './img/products/cloro-regular-1l.webp'),
(33, 'Fabuloso Lavanda 1L', 29.9, '7501000100013', 1, 'Fabuloso', './img/products/fabuloso-lavanda-1l.webp'),
(34, 'Jabón Roma 1kg', 35, '7501000100014', 1, 'Roma', './img/products/jabon-roma-1kg.webp'),
(35, 'Papel Higiénico 12pzs', 78, '7501000100015', 2, 'Regio', './img/products/papel-higienico-12pzs.webp'),
(37, 'Café Soluble 200g', 98, '7501000100017', 3, 'Nescafé', './img/products/cafe-soluble-200g.webp'),
(38, 'Azúcar 1kg', 28, '7501000100018', 3, 'Zulka', './img/products/azucar-1kg.png'),
(39, 'Sal yodada 1kg', 14, '7501000100019', 3, 'La Fina', './img/products/sal-yodada-1kg.webp'),
(40, 'Arroz 1kg', 26, '7501000100020', 3, 'Verde Valle', './img/products/arroz-1kg.webp'),
(42, 'Pasta Spaghetti 200g', 11, '7501000100022', 3, 'La Moderna', './img/products/spagetti-200g.webp'),
(43, 'Aceite Vegetal 1L', 42, '7501000100023', 3, 'Nutrioli', './img/products/aceite-vegetal-1l.jpeg'),
(44, 'Atún en Agua 140g', 17, '7501000100024', 4, 'Tuny', './img/products/atun-agua-140g.webp'),
(45, 'Sardina en Tomate', 21, '7501000100025', 4, 'La Sirena', './img/products/sardina-tomate.webp'),
(46, 'Leche Entera 1L', 25, '7501000100026', 5, 'Lala', './img/products/leche-entera-1l.webp'),
(47, 'Yogurt Fresa 1kg', 39, '7501000100027', 5, 'Lala', './img/products/yogurt-fresa-1kg.webp'),
(48, 'Mantequilla 90g', 24, '7501000100028', 5, 'Gloria', './img/products/mantequilla-90g.webp'),
(49, 'Huevo 12 piezas', 46, '7501000100029', 5, 'San Juan', './img/products/huevo-12pzs.webp'),
(50, 'Salchicha Viena 1kg', 67, '7501000100030', 6, 'FUD', './img/products/salchicha-viena-1kg.webp');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_list`
--

CREATE TABLE `shopping_list` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Joel', 'alejandro@hotmail.co', '$2y$12$gkl4vVgbVPO9oWjqB8qx4OiB1wT9zgq8vA20fI6DeY55OdkBMgGAO'),
(2, 'Joel', 'alejandro@hotmail.com', '$2y$12$/NMm1SlCdR7p9vwadfivlOLLCm9AOEFfB1SpwQU2SM.BSIsRmKwvy'),
(3, 'alejandro', 'joel@hotmail.com', '$2y$12$YxWA4YJI2oeO4LOeRrjlg.hkr0sv2JzsVxbT0JfSgjp5U56Yihb4G'),
(4, 'joel', 'joel@gmail.com', '$2y$12$W4afap5RZhUIcv/7NmC/FeF4MUB83ab8SY/QatWXC17EDPrlYz.ji');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `shopping_list`
--
ALTER TABLE `shopping_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD CONSTRAINT `shopping_lists_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
