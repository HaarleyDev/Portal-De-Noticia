-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Fev-2023 às 17:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jornal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginf`
--

CREATE TABLE `loginf` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `loginf`
--

INSERT INTO `loginf` (`id`, `login`, `senha`) VALUES
(15, 'jalyson', '2356'),
(16, 'nildete', '123'),
(17, 'ramon', '123'),
(18, 'brendo', '123'),
(19, 'ludmila', '123'),
(20, 'paula', '123'),
(21, 'jorge', ''),
(22, 'jorge', '1234'),
(23, 'lud', '2356'),
(25, 'l', '12'),
(26, 'agatha', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(222) NOT NULL,
  `noticia` varchar(222) NOT NULL,
  `data` varchar(222) NOT NULL,
  `id_func` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `noticia`, `data`, `id_func`) VALUES
(21, 'Jalyson melhor professor', 'Me coloca em uma empresa boa pfv', '10/02/2023 20:21', 20),
(22, 'Vou arrumar estagio para dona paula', 'awdawdwadawdawdawdawdawdawdaw', '10/02/2023 20:22', 15),
(23, 'eu sou vascaíno', 'hj foi um dia lindo vasco pereu de 2x0', '13/02/2023 19:14', 22);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `loginf`
--
ALTER TABLE `loginf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_func` (`id_func`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `loginf`
--
ALTER TABLE `loginf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `loginf` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
