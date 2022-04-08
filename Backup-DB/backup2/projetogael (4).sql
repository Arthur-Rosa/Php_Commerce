-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Nov-2021 às 16:51
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetogael`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `numero_da_ordem`, `tipo_de_trabalho`, `qtdChapas`, `qtdCores`, `formato_arquivos`, `qtdPaginas`, `formato_chapas`, `formatoFV`, `formatoTR`, `pinca_de_chapa`, `abertura`, `converteCMYK`, `formatoPapel`, `status_pedido`, `id_usuario`, `nome_usuario`) VALUES
(1, 32, '3232', 232, 32, '32', 23, '23', '23', '23', '3', '32', '23', '33', 2, 2, 'arthur'),
(2, 23, '322', 32, 32, '3', 23, '32', '23', '23', '23', '2', '23', '23', 4, 2, 'arthur'),
(3, 34, '43', 34, 34, '34', 433, '34', '334', '34', '34', '344', '4', '34', 2, 2, 'arthur'),
(4, 3, '32', 23, 2, '23', 2, '33', '23', '33', '32', '223', '23', '23', 1, 1, 'admin'),
(5, 3232, '23', 32, 32, '32', 23, '32', '2', '32', '23', '23', '32', '32', 4, 5, 'bruno'),
(6, 5, '34', 43, 53, '3', 321312, '35', '4534', '44', '321312', '3', '345', '4', 1, 1, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(200) NOT NULL,
  `senha_usuario` varchar(200) NOT NULL,
  `nivel_usuario` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_usuario`, `senha_usuario`, `nivel_usuario`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'arthur', '123', 'cliente'),
(3, 'bruno', '123', 'cliente'),
(4, 'banana', '123', 'funcionario');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
