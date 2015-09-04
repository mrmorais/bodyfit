-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2015 at 01:29 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bodyfit`
--

-- --------------------------------------------------------

--
-- Table structure for table `academia`
--

CREATE TABLE IF NOT EXISTS `academia` (
  `id` bigint(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `create_ts` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academia`
--

INSERT INTO `academia` (`id`, `nome`, `cidade`, `estado`, `endereco`, `telefone`, `create_ts`) VALUES
(2, 'Buiu Noronha', 'Apodi', 'RN', 'Reis ', '', '2015-08-05 16:31:57'),
(3, 'Rdi', 'dd', 'RN', '', '', '2015-08-05 16:33:06'),
(4, 'NewFitness', 'Apodi', 'AC', '', '', '2015-08-05 16:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id` bigint(11) NOT NULL,
  `academia_id` bigint(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`id`, `academia_id`, `nome`, `sobrenome`, `email`, `senha`, `nascimento`, `sexo`, `telefone`, `endereco`, `create_time`) VALUES
(5, 2, 'Maradona', 'Morais', 'maradona.morais@hotmail.com', 'mrmr', '0000-00-00', 'M', '86 9636272', 'Reis Magos', '2015-08-05 16:48:28'),
(7, 2, 'Maradona', 'Morais', 'mdi@hotam.com', '123', '1997-06-22', 'M', '', '', '2015-08-17 16:28:28'),
(8, 2, 'Snoop', 'Dog', 'snoop.dog@gmail.com', 'snoop', '2015-08-05', 'M', '(84) 96953997', '', '2015-08-17 16:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao_fis`
--

CREATE TABLE IF NOT EXISTS `avaliacao_fis` (
  `id` bigint(11) NOT NULL,
  `aluno_id` bigint(11) NOT NULL,
  `personal_id` bigint(11) NOT NULL,
  `peso` float DEFAULT NULL,
  `altura` float DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `codigo_acesso`
--

CREATE TABLE IF NOT EXISTS `codigo_acesso` (
  `id` int(11) NOT NULL,
  `academia_id` bigint(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `codigo_acesso`
--

INSERT INTO `codigo_acesso` (`id`, `academia_id`, `codigo`, `ativo`, `tipo`) VALUES
(1, 2, 'p0hb6X', 0, 'aluno');

-- --------------------------------------------------------

--
-- Table structure for table `dia`
--

CREATE TABLE IF NOT EXISTS `dia` (
  `id` bigint(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `execucao_id` bigint(11) NOT NULL,
  `execucao_treino_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `execucao`
--

CREATE TABLE IF NOT EXISTS `execucao` (
  `id` bigint(11) NOT NULL,
  `treino_id` int(11) NOT NULL,
  `exercicio_id` bigint(11) NOT NULL,
  `treino_personal_id` bigint(11) NOT NULL,
  `treino_aluno_id` bigint(11) NOT NULL,
  `series` int(11) DEFAULT NULL,
  `repeticoes` int(11) DEFAULT NULL,
  `cadencia` varchar(45) DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exercicio`
--

CREATE TABLE IF NOT EXISTS `exercicio` (
  `id` bigint(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `image` varchar(244) DEFAULT NULL,
  `descricao` text,
  `categoria` varchar(45) NOT NULL,
  `musculo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gerente`
--

CREATE TABLE IF NOT EXISTS `gerente` (
  `id` bigint(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gerente`
--

INSERT INTO `gerente` (`id`, `nome`, `sobrenome`, `email`, `senha`, `tipo`, `create_time`) VALUES
(4, 'Maradona', 'Gerente', 'maradona.morais@hotmail.com', 'mrmr', 1, '2015-08-05 16:31:57'),
(7, 'Maradona', 'Morais2', 'maradona.morais2@hotmail.com', 're', 1, '2015-08-05 16:33:06'),
(9, 'Mulher', 'da outra academia', 'Mulher@hotma.com', 'mrmr', 1, '2015-08-05 16:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `gerente_has_academia`
--

CREATE TABLE IF NOT EXISTS `gerente_has_academia` (
  `gerente_id` bigint(11) NOT NULL,
  `academia_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gerente_has_academia`
--

INSERT INTO `gerente_has_academia` (`gerente_id`, `academia_id`) VALUES
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id` bigint(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `create_ts` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id`, `nome`, `sobrenome`, `email`, `senha`, `create_ts`) VALUES
(1, 'Maradona', 'Morais', 'maradona.morais@hotmail.com', 'mr', '2015-08-05 09:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_has_academia`
--

CREATE TABLE IF NOT EXISTS `personal_has_academia` (
  `personal_id` bigint(11) NOT NULL,
  `academia_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `treino`
--

CREATE TABLE IF NOT EXISTS `treino` (
  `id` int(11) NOT NULL,
  `inico` date NOT NULL,
  `fim` date DEFAULT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  `aluno_id` bigint(11) NOT NULL,
  `personal_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academia`
--
ALTER TABLE `academia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_aluno_academia1_idx` (`academia_id`);

--
-- Indexes for table `avaliacao_fis`
--
ALTER TABLE `avaliacao_fis`
  ADD PRIMARY KEY (`id`,`aluno_id`,`personal_id`), ADD KEY `fk_avaliacao_fis_aluno1_idx` (`aluno_id`), ADD KEY `fk_avaliacao_fis_personal1_idx` (`personal_id`);

--
-- Indexes for table `codigo_acesso`
--
ALTER TABLE `codigo_acesso`
  ADD PRIMARY KEY (`id`,`academia_id`), ADD KEY `fk_codigo_acesso_academia1_idx` (`academia_id`);

--
-- Indexes for table `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_dia_execucao1_idx` (`execucao_id`,`execucao_treino_id`);

--
-- Indexes for table `execucao`
--
ALTER TABLE `execucao`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_execucao_exercicio1_idx` (`exercicio_id`), ADD KEY `fk_execucao_treino1_idx` (`treino_id`,`treino_personal_id`,`treino_aluno_id`);

--
-- Indexes for table `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gerente_has_academia`
--
ALTER TABLE `gerente_has_academia`
  ADD PRIMARY KEY (`gerente_id`,`academia_id`), ADD KEY `fk_gerente_has_academia_academia1_idx` (`academia_id`), ADD KEY `fk_gerente_has_academia_gerente_idx` (`gerente_id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_has_academia`
--
ALTER TABLE `personal_has_academia`
  ADD PRIMARY KEY (`personal_id`,`academia_id`), ADD KEY `fk_personal_has_academia_academia1_idx` (`academia_id`), ADD KEY `fk_personal_has_academia_personal1_idx` (`personal_id`);

--
-- Indexes for table `treino`
--
ALTER TABLE `treino`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_treino_aluno1_idx` (`aluno_id`), ADD KEY `fk_treino_personal1_idx` (`personal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academia`
--
ALTER TABLE `academia`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `codigo_acesso`
--
ALTER TABLE `codigo_acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dia`
--
ALTER TABLE `dia`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `execucao`
--
ALTER TABLE `execucao`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `treino`
--
ALTER TABLE `treino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aluno`
--
ALTER TABLE `aluno`
ADD CONSTRAINT `fk_aluno_academia1` FOREIGN KEY (`academia_id`) REFERENCES `academia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `avaliacao_fis`
--
ALTER TABLE `avaliacao_fis`
ADD CONSTRAINT `fk_avaliacao_fis_aluno1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_avaliacao_fis_personal1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `codigo_acesso`
--
ALTER TABLE `codigo_acesso`
ADD CONSTRAINT `fk_codigo_acesso_academia1` FOREIGN KEY (`academia_id`) REFERENCES `academia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dia`
--
ALTER TABLE `dia`
ADD CONSTRAINT `fk_dia_execucao1` FOREIGN KEY (`execucao_id`) REFERENCES `execucao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `execucao`
--
ALTER TABLE `execucao`
ADD CONSTRAINT `fk_execucao_exercicio1` FOREIGN KEY (`exercicio_id`) REFERENCES `exercicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_execucao_treino1` FOREIGN KEY (`treino_id`) REFERENCES `treino` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gerente_has_academia`
--
ALTER TABLE `gerente_has_academia`
ADD CONSTRAINT `fk_gerente_has_academia_academia1` FOREIGN KEY (`academia_id`) REFERENCES `academia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_gerente_has_academia_gerente` FOREIGN KEY (`gerente_id`) REFERENCES `gerente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `personal_has_academia`
--
ALTER TABLE `personal_has_academia`
ADD CONSTRAINT `fk_personal_has_academia_academia1` FOREIGN KEY (`academia_id`) REFERENCES `academia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_personal_has_academia_personal1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `treino`
--
ALTER TABLE `treino`
ADD CONSTRAINT `fk_treino_aluno1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_treino_personal1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
