-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jan-2020 às 00:43
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `chocofestas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(5) NOT NULL,
  `data_pedido` varchar(10) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `idade` int(3) NOT NULL,
  `data_evento` varchar(10) NOT NULL,
  `tema` text NOT NULL,
  `endereco` text NOT NULL,
  `dados` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `data_pedido`, `cliente`, `telefone`, `nome`, `idade`, `data_evento`, `tema`, `endereco`, `dados`, `status`) VALUES
(1, '18/12/2019', 'Alex Djonata', '(45) 98421-4574', 'Pedro Henrique', 5, '25/12/2019', 'Bananas de Pijama', '6078 Av. Brasil, Cascavel, Paraná', 'Cartão de presentes,\nPapel de parede,\nFrutas: Banana', 1),
(2, '19/12/2019', 'Irene Ciusz', '(45) 99997-0036', 'Anthony', 2, '25/12/2019', 'Super Onze', 'Rua Vinte e Seis de Outubro, 327', 'Festa de aniversário', 1),
(3, '20/12/2019', 'Danieli Vitória', '(45) 98415-7079', 'Luna Yasmin', 7, '17/05/2019', 'Garfield', 'Rua Vinte e Seis de Outubro, Rio de Janeiro', 'Cartão de presentes,\nPapel de parede,\nAnimais: Peixe e Gato', 1),
(4, '21/12/2019', 'Alex Djonata', '(45) 99999-9999', 'William Proecio', 15, '25/10/2019', 'Metallica e Megadeth', 'Rua kamayuras, Santa Cruz', 'Presente de aniversário', 1),
(5, '23/12/2019', 'Irene Ciusz', '(45) 98421-7070', 'Alex Djonata', 18, '25/12/2019', 'Seia de Natal', 'Rua jericoacoara, 166', 'Festa em comemoração ao Natal', 1),
(6, '23/12/2019', 'Irene Ciusz', '(45) 99997-0036', 'Alex Djonata', 17, '30/10/2019', 'Black Sabbath', 'Av. Brasil, 1300', 'Comemoração do seu aniversário de 18 anos.', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
