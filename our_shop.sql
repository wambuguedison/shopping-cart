-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 02:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `our_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Tropical Heat'),
(2, 'Nutrameal'),
(3, 'Simba Mbili'),
(4, 'Dawaat'),
(5, 'DREEM'),
(6, 'Jogoo'),
(7, 'Kabras'),
(8, 'Knor'),
(9, 'Krackles'),
(10, 'Want Want'),
(11, 'Amigos'),
(12, 'Pearl'),
(13, 'Pembe'),
(14, 'Butterfly'),
(15, 'Krispii'),
(16, 'Zanzibar'),
(17, 'Royco'),
(18, 'Kensalt'),
(19, 'Zesta'),
(20, 'Generic'),
(21, 'Sunrice'),
(22, 'Manji');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `image`, `parent`) VALUES
(1, 'Food-Cupboard', '', 0),
(2, 'Cooking & Baking', '', 0),
(3, 'Drinks', '', 0),
(4, 'Bakery', '', 0),
(5, 'Cooking Ingredients', '', 1),
(6, 'Crisps, Snacks & Nuts', '', 1),
(7, 'Grains & Rice', '', 1),
(8, 'Sugar & Flour', '', 1),
(9, 'Baking', '', 2),
(10, 'Cooking Oil', '', 2),
(11, 'Sauce & Dressings', '', 2),
(12, 'Carbonated Drinks', '', 3),
(13, 'Coffee, Tea & Cocoa', '', 3),
(14, 'Dairy', '', 3),
(15, 'Juices & Other Non-Carbonated Drinks', '', 3),
(16, 'Syrups & Cordial', '', 3),
(17, 'Water', '', 3),
(18, 'Bakery & Dessert Gifts', '', 4),
(19, 'Bread Crumbs & Stuffing', '', 4),
(20, 'Breakfast Bakery', '', 4),
(21, 'Desserts', '', 4),
(22, 'Fresh Baked Cookies', '', 4),
(23, 'Packaged Breads', '', 4),
(24, 'Pastry Shells & Crusts', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categoriesrevamp`
--

CREATE TABLE `categoriesrevamp` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `featured` tinyint(4) DEFAULT '0',
  `deleted` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoriesrevamp`
--

INSERT INTO `categoriesrevamp` (`id`, `category`, `featured`, `deleted`) VALUES
(1, 'Bread', 0, 0),
(2, 'Cleaners & Polishers', 0, 0),
(3, 'Cooking Oil', 0, 0),
(4, 'Daipers', 0, 0),
(5, 'Flour', 0, 0),
(6, 'Juice', 0, 0),
(7, 'Milk & Youghurt', 0, 0),
(8, 'Noodles & Spaghetti', 0, 0),
(9, 'Sanitaries', 0, 0),
(10, 'Snacks', 0, 0),
(11, 'Soaps', 0, 0),
(12, 'Soda', 0, 0),
(13, 'Spices', 0, 0),
(14, 'Spreads', 0, 0),
(15, 'Sugar', 0, 0),
(16, 'Tea & Coffee', 0, 0),
(17, 'Toilet Paper', 0, 0),
(18, 'Toothpaste', 0, 0),
(19, 'Water', 0, 0),
(20, 'Uncategorized', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(800) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `estate` varchar(300) NOT NULL,
  `street` varchar(300) NOT NULL,
  `shippingFee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `items` varchar(300) NOT NULL,
  `orderedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `confirmed` tinyint(2) NOT NULL DEFAULT '0',
  `cancelled` tinyint(2) NOT NULL DEFAULT '0',
  `shipped` tinyint(2) NOT NULL DEFAULT '0',
  `delivered` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posters`
--

CREATE TABLE `posters` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `validThru` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posters`
--

INSERT INTO `posters` (`id`, `title`, `image`, `featured`, `validThru`) VALUES
(1, 'Unga Reloaded', '/projects/shop/src/img/test_rect.png', 1, '2019-08-01'),
(2, 'Caffeinate', '/projects/shop/src/img/test_rect.png', 1, '2019-08-01'),
(3, 'Bake It', '/projects/shop/src/img/test_rect.png', 1, '2019-08-01'),
(4, '\'Grignoter\'', '/projects/shop/src/img/test_rect.png', 1, '2019-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` int(11) NOT NULL,
  `category` int(11) DEFAULT '0',
  `price` int(11) NOT NULL,
  `old_price` int(11) DEFAULT '0',
  `image` varchar(300) NOT NULL,
  `description` text,
  `featured` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `category`, `price`, `old_price`, `image`, `description`, `featured`, `deleted`) VALUES
(1, 'Basmati Rice 5kgs', 21, 20, 1042, 0, '/projects/shop/src/img/products/basmati_rice.jpg', NULL, 1, 0),
(2, 'Black Njahi - 1kg', 2, 20, 115, 127, '/projects/shop/src/img/products/black_beans.jpg', NULL, 1, 0),
(3, 'Chicken Masala - 100g', 1, 13, 94, 0, '/projects/shop/src/img/products/chicken_masala.jpg', NULL, 1, 0),
(4, 'Cinnamon Ground - 50g', 1, 13, 89, 0, '/projects/shop/src/img/products/cinnamon.jpg', NULL, 1, 0),
(5, 'Curry Powder Sachet - 10g', 3, 13, 5, 0, '/projects/shop/src/img/products/curry_powder.jpg', NULL, 1, 0),
(6, 'Long Grain Rice - 5kg', 4, 20, 577, 0, '/projects/shop/src/img/products/dawaat_longgrain.jpg', NULL, 1, 0),
(7, 'Premix Chocolate Brownie - 400g', 5, 5, 319, 550, '/projects/shop/src/img/products/dreem_brownies.jpg', NULL, 1, 0),
(8, 'Garlic Powder - 50g', 1, 13, 74, 0, '/projects/shop/src/img/products/garlic_powder.jpg', NULL, 1, 0),
(9, 'Maize Meal - 2kg', 6, 5, 115, 116, '/projects/shop/src/img/products/jogoo_2kgs.jpg', NULL, 1, 0),
(10, 'Sugar - 2kg', 7, 15, 193, 198, '/projects/shop/src/img/products/kabras_sugar.jpg', NULL, 1, 0),
(11, 'Beef Soft Cube Seasoning - 6s', 8, 13, 63, 75, '/projects/shop/src/img/products/knor_beef_cubes.jpg', NULL, 1, 0),
(12, 'Bar-B-Que Potato Crisps', 9, 10, 36, 0, '/projects/shop/src/img/products/krackles_Bar-B-Que.jpg', NULL, 1, 0),
(13, 'Baked Not Fried Krac Kurls Tangy Cheese Corn Puffs - 25g', 9, 10, 33, 0, '/projects/shop/src/img/products/krac_curls.jpg', NULL, 1, 0),
(14, 'Perfectly Salted Potato Crisps - 30g', 9, 10, 36, 0, '/projects/shop/src/img/products/krackles_salted.jpg', NULL, 1, 0),
(15, 'Seaweed Crispy Rice Biscuit Chinese Snack', 10, 10, 299, 0, '/projects/shop/src/img/products/rice biscuits.jpg', NULL, 1, 0),
(16, 'Strawberry Wafer 15g', 22, 10, 5, 0, '/projects/shop/src/img/products/manji_wafer.jpg', NULL, 1, 0),
(17, 'Masala Peanuts', 11, 10, 24, 0, '/projects/shop/src/img/products/masala_peanuts.jpg', NULL, 1, 0),
(18, 'Green Grams Polished - 500g', 2, 20, 85, 0, '/projects/shop/src/img/products/nutrameal_greengrams.jpg', NULL, 1, 0),
(19, 'Pishori - 5kg', 12, 20, 1231, 0, '/projects/shop/src/img/products/pearl_pishori.jpg', NULL, 1, 0),
(20, 'Wheat Flour - 2kgs', 13, 5, 124, 0, '/projects/shop/src/img/products/pembe_baking.jpg', NULL, 1, 0),
(21, 'Popcorn Kernels - 500g', 14, 20, 97, 0, '/projects/shop/src/img/products/popcorn_kenerls.jpg', NULL, 1, 0),
(22, 'Nice & Salted Potato Crisps - 15g', 15, 10, 10, 0, '/projects/shop/src/img/products/potato_krisps.jpg', NULL, 1, 0),
(23, 'Rosemary Leaves Spices - 20g', 16, 13, 63, 0, '/projects/shop/src/img/products/rosemary.jpg', NULL, 1, 0),
(24, 'Mchuzi Mix Beef Flavor Seasoning - 200g', 17, 13, 105, 110, '/projects/shop/src/img/products/royco.jpg', NULL, 1, 0),
(25, 'Beef Cubes Seasoning - 40 x 4g', 17, 13, 100, 0, '/projects/shop/src/img/products/royco_cubes.jpg', NULL, 1, 0),
(26, 'Salt - 2kg', 18, 0, 53, 0, '/projects/shop/src/img/products/salt_2kg.jpg', NULL, 1, 0),
(27, 'Sea Salt (Coarse) - 500g', 20, 0, 125, 0, '/projects/shop/src/img/products/sea_salt.jpg', NULL, 1, 0),
(28, 'Tingly Cheese & Onion Potato Crisps - 30g', 9, 10, 36, 0, '/projects/shop/src/img/products/tangly_cheese&onions.jpg', NULL, 1, 0),
(29, 'Tumeric Ground - 50g', 1, 13, 63, 0, '/projects/shop/src/img/products/tumeric.jpg', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `saved_items` varchar(600) NOT NULL,
  `orders` varchar(900) NOT NULL,
  `joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `saved_items`, `orders`, `joined`) VALUES
(1, 'Edison', 'Waweru', 'wambuguedison@gmail.com', '', 780727208, '10,1,12', '', '2019-05-04'),
(2, 'Esther', 'Wambugu', 'estherwambugu@gmail.com', '', 723808296, '3,7', '', '2019-05-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoriesrevamp`
--
ALTER TABLE `categoriesrevamp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categoriesrevamp`
--
ALTER TABLE `categoriesrevamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
