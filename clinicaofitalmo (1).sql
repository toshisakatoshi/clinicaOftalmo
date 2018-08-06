-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Ago-2018 às 01:59
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicaofitalmo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(3, 'Higiene'),
(4, 'ColÃ­rio'),
(6, 'Pomada'),
(8, 'Remedios'),
(9, 'UtensÃ­lio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `email`, `login`, `senha`, `admin`) VALUES
(11, 'Toshi', '02055544888', '519995588825', 'xeroxdojapones@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', 1),
(13, 'Maicon', '020020202020', '51999906692', 'motta@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', 0),
(14, 'Japau', '11111111111', '51666666666', 'japau@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(11) NOT NULL,
  `codPedido` int(11) DEFAULT NULL,
  `codProduto` int(11) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `quantidade` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id`, `codPedido`, `codProduto`, `preco`, `quantidade`) VALUES
(7, 1, 5, 2.2, 2),
(8, 2, 5, 2.2, 3),
(9, 2, 3, 2.6, 2),
(10, 3, 3, 2.6, 1),
(11, 4, 8, 1.65, 32),
(13, 5, 7, 6.23, 2),
(14, 6, 7, 6.23, 1),
(15, 7, 7, 6.23, 2),
(16, 8, 7, 6.23, 1),
(17, 9, 5, 2.2, 1),
(18, 10, 8, 1.65, 1),
(19, 11, 7, 6.23, 1),
(20, 12, 5, 2.2, 1),
(21, 13, 7, 6.23, 4),
(22, 13, 5, 2.2, 2),
(23, 13, 8, 1.65, 1),
(24, 14, 7, 6.23, 1),
(25, 15, 5, 36, 1),
(26, 16, 5, 36, 5),
(27, 16, 11, 6.25, 1),
(28, 16, 12, 89, 2),
(29, 17, 11, 6.25, 1),
(30, 18, 5, 36, 1),
(31, 19, 5, 36, 4),
(32, 20, 5, 36, 17),
(33, 21, 5, 36, 19),
(34, 23, 15, 15.3, 3),
(37, 24, 16, 13, 2),
(38, 24, 3, 2.6, 1),
(39, 25, 16, 13, 1),
(40, 26, 15, 15.3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `codUsuario` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `codUsuario`, `data`, `valor`) VALUES
(1, 7, '2018-05-23', NULL),
(2, 7, '2018-05-23', NULL),
(3, 7, '2018-05-23', NULL),
(4, 7, '2018-05-24', NULL),
(5, 11, '2018-07-05', NULL),
(6, 11, '2018-07-05', NULL),
(7, 11, '2018-07-05', NULL),
(8, 11, '2018-07-06', NULL),
(9, 11, '2018-07-06', NULL),
(10, 11, '2018-07-06', NULL),
(11, 11, '2018-07-06', NULL),
(12, 11, '2018-07-06', NULL),
(13, 11, '2018-07-06', NULL),
(14, 11, '2018-07-06', NULL),
(15, 11, '2018-07-06', NULL),
(16, 11, '2018-07-06', NULL),
(17, 11, '2018-07-06', NULL),
(18, 11, '2018-07-06', NULL),
(19, 11, '2018-07-06', NULL),
(20, 11, '2018-07-06', NULL),
(21, 11, '2018-07-06', NULL),
(22, 11, '2018-07-06', NULL),
(23, 11, '2018-07-28', NULL),
(24, 11, '2018-08-01', NULL),
(25, 11, '2018-08-01', NULL),
(26, 11, '2018-08-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `codigoBarras` varchar(50) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `quantidade` double DEFAULT NULL,
  `codCategoria` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `codigoBarras`, `preco`, `quantidade`, `codCategoria`) VALUES
(3, 'Seringa', '', 2.6, 90, 9),
(5, 'Doril', '', 36, 0, 1),
(7, 'ColÃ­ro Moura Brasil', '', 9.23, 64, 0),
(8, 'Gase', '', 2.36, 166, 0),
(9, 'LenÃ§o', '', 15, 23, 0),
(11, 'Melhoral', '', 6.25, 30, 1),
(12, 'Zovirax', '', 89, 21, 1),
(13, 'Melhoral', '', 2.56, 100, 8),
(14, 'Seringa 2ml', '', 2.54, 56, 9),
(15, 'ColÃ­rio Moura Brasil', '', 15.3, 1, 4),
(16, 'Gazes', '', 13, 25, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codPedido` (`codPedido`),
  ADD KEY `codProduto` (`codProduto`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `itens_ibfk_1` FOREIGN KEY (`codPedido`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `itens_ibfk_2` FOREIGN KEY (`codProduto`) REFERENCES `produto` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
