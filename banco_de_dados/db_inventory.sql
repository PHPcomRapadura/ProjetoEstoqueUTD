-- phpMyAdmin SQL Dump
-- version 4.5.0-rc1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 06/01/2016 às 17:40
-- Versão do servidor: 5.5.46-0+deb8u1
-- Versão do PHP: 5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_inventory`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `category_name`, `category_desc`) VALUES
(1, 'Frios2', 'Tudo que for frio...'),
(2, 'Carnes', 'Carnes, Suínos, Caprinos, Linguiças, Aves, etc.'),
(3, 'Frutas', 'Todo tipo de fruta.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_created_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_expiration_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `category_id`, `product_name`, `product_details`, `product_quantity`, `product_price`, `product_created_in`, `product_expiration_date`) VALUES
(1, 1, 'Queijo 2', 'Prato', 10, 14.99, '2016-01-06 12:14:22', 0),
(2, 3, 'Banana Maçã', ' ', 40, 0.5, '2015-12-26 22:18:24', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id_profile` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `profile_page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_profile`
--

INSERT INTO `tb_profile` (`id_profile`, `profile_name`, `profile_page`) VALUES
(1, 'Administrador', 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_created_in` int(11) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_last_access` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `profile_id`, `user_name`, `user_email`, `user_password`, `user_created_in`, `user_status`, `user_last_access`) VALUES
(1, 1, 'Administrador Padrão', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1451167344, 1, '2016-01-06 12:54:26'),
(3, 1, 'Alessandro Feitoza', 'eu@alessandrofeitoza.eu', 'c9904cff579a83a6b2f1ea4dd5dca8b3338dda97', 0, 0, '2015-12-26 22:17:21');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Índices de tabela `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Índices de tabela `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Índices de tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
