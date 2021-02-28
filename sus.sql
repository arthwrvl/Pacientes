-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Fev-2021 às 18:13
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `cod` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dtnasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`cod`, `nome`, `login`, `senha`, `funcao`, `endereco`, `cpf`, `dtnasc`) VALUES
(6, 'Administrador', 'admin', 'admin123', 'Analista', 'Rua Samaritana, 106 - Primavera; Arapiraca - SE', '052.854.514-32', '2000-05-05'),
(10, 'aaaaa', 'bbb', '1234', 'asdasdasd', 'asdasdasdasd, 21312312321 - asdasda asdasd; asdasdasd - asdasas', '123.213.213-2', '1232-03-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cod` int(11) NOT NULL,
  `data_nasc` date NOT NULL,
  `data_sintomas` date NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `genero` varchar(200) NOT NULL,
  `gravidade` varchar(200) NOT NULL,
  `acompanhante` varchar(200) NOT NULL,
  `sintomas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`cpf`, `nome`, `cod`, `data_nasc`, `data_sintomas`, `endereco`, `genero`, `gravidade`, `acompanhante`, `sintomas`) VALUES
('123.123.213', 'asdsadsda asdsadasd', 5, '0000-00-00', '1232-03-12', 'asdasdsad, 123123 - asasdsad; asdasdsad - asdasdsad', 'asdsadsad', 'asdasdsad', 'adasdasdas', 'aa;b222');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
