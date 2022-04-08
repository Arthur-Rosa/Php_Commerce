-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jan-2022 às 03:35
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetogael`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `numero_da_ordem` int(15) NOT NULL,
  `tipo_de_trabalho` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtdChapas` int(10) NOT NULL,
  `qtdCores` int(10) NOT NULL,
  `formato_arquivos` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtdPaginas` int(10) NOT NULL,
  `formato_chapas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatoFV` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatoTR` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinca_de_chapa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abertura` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `converteCMYK` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatoPapel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `arquivo` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(200) NOT NULL,
  `responsavel` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `numero_da_ordem`, `tipo_de_trabalho`, `qtdChapas`, `qtdCores`, `formato_arquivos`, `qtdPaginas`, `formato_chapas`, `formatoFV`, `formatoTR`, `pinca_de_chapa`, `abertura`, `converteCMYK`, `formatoPapel`, `arquivo`, `status_pedido`, `id_usuario`, `nome_usuario`, `responsavel`) VALUES
(1, 54, '54', 54, 5454, '54', 54, '54', '5', '54', '54', '54', '54', '54', 'Modal Aulas.txt', 4, 5, 'arthur', 'bruno'),
(2345678, 54, '54', 54, 5454, '54', 54, '54', '5454', '4', '54', '54', '54', '54', 'a.txt', 4, 5, 'arthur', 'arthur'),
(2345679, 84, '8', 84, 84, '84', 87, '8', '8484', '8484', '8', '8448', '84', '84', 'LEIA AQUI.txt', 4, 5, 'arthur', 'arthur'),
(2345680, 54, '45', 54, 45, '54', 784554, '54', '55', '45', '54', '5454', '454', '45', 'LEIA AQUI.txt', 4, 5, 'arthur', 'arthur'),
(2345681, 21, '21', 21, 212, '12', 12, '21', '21', '21', '12', '21', '21', '12', 'insta.txt', 4, 5, 'arthur', 'dsadsadsa'),
(2345682, 8484, 'bracal', 84, 84, '84', 6254, 'grande', '84', '84', 'sim', 'sim', '84', '984', 'LEIA AQUI.txt', 4, 5, 'arthur', 'arthur'),
(2345683, 5, '5', 5, 55, '55', 55, '55', '55', '5', '55', '555', '5', '55', 'LEIA AQUI.txt', 4, 5, 'arthur', 'arthur'),
(2345684, 54, '5', 54, 54, '54', 24, '54', '54', '54', '44', '45', '54', '54', 'insta.txt', 4, 5, 'arthur', 'dsadsadsadsa'),
(2345685, 45, '54', 54, 5454, '5454', 55445, '5', '54', '54', '54', '5454', '54', '54', 'LEIA AQUI.txt', 4, 5, 'arthur', 'bruno'),
(2345686, 2112, '21', 12, 12, '21', 21, '21', '12', '12', '21', '12', '1', '21', 'LEIA AQUI.txt', 4, 5, 'arthur', 'arthur');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(200) NOT NULL,
  `senha_usuario` varchar(200) NOT NULL,
  `nivel_usuario` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_usuario`, `senha_usuario`, `nivel_usuario`) VALUES
(2147483647, 'admin', '123', 'admin'),
(5, 'arthur', '123', 'cliente'),
(11, 'dassad', 'dsadsa', 'cliente'),
(10, 'bruno', '123', 'funcionario'),
(12, 'dsadsa', 'dsadsa', 'cliente'),
(23, 'dsadsadsads', 'dssssssssss', 'funcionario'),
(22, 'dddddddddddd', 'ddd', 'funcionario'),
(21, '515511515', 'dsadsa', 'cliente'),
(20, '11212', '41515', 'funcionario'),
(24, 'daaaaaaaaaaaaaaa', 'ssssssssssssss', 'funcionario'),
(25, 'ereeeeeeeeeeeeee', 'wwwwwwwwwwww', 'funcionario'),
(26, '555555555555', '5555555555', 'funcionario'),
(27, '88888888888888888', '88888888888888888', 'funcionario'),
(28, '777777777777777777777', '777777777777777777', 'funcionario'),
(29, '100000000000000220222', '55545454', 'cliente'),
(30, '51155151511551', '515115155', 'cliente'),
(31, 'aaaaaaaaaaaaaaaaaaa', 'dasdsadsa', 'funcionario'),
(32, 'klllk', 'lk', 'cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2345687;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
