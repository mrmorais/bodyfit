-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2015 at 01:20 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academia`
--

INSERT INTO `academia` (`id`, `nome`, `cidade`, `estado`, `endereco`, `telefone`, `create_ts`) VALUES
(1, 'Academia do Gerente', 'Apodi', 'RN', 'Rua da Laranjeira', '4002-8922', '2015-09-23 18:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `academia_has_pratica`
--

CREATE TABLE IF NOT EXISTS `academia_has_pratica` (
  `pratica_id` bigint(11) NOT NULL,
  `academia_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academia_has_pratica`
--

INSERT INTO `academia_has_pratica` (`pratica_id`, `academia_id`) VALUES
(3, 1),
(8, 1),
(10, 1),
(11, 1),
(13, 1),
(17, 1),
(20, 1),
(23, 1),
(25, 1),
(47, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`id`, `academia_id`, `nome`, `sobrenome`, `email`, `senha`, `nascimento`, `sexo`, `telefone`, `endereco`, `create_time`) VALUES
(1, 1, 'Rodrigo', 'Tertulino', 'rodrigo@hotmail.com', 'aluno', '2015-09-23', 'M', '8002-8922', 'Rua das Laranjeiras', '2015-09-23 18:05:19'),
(2, 1, 'Maradona', 'Aluno', 'maradona.morais@hotmail.com', 'face', '2015-09-26', 'M', '292', 'Nu', '2015-09-25 11:50:42'),
(3, 1, 'Carlos', 'Fran', 'cf@hotmail.com', 'face', '2015-09-24', 'M', '', '', '2015-09-25 11:53:18');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avaliacao_fis`
--

INSERT INTO `avaliacao_fis` (`id`, `aluno_id`, `personal_id`, `peso`, `altura`, `data`) VALUES
(1, 1, 1, 49, 1.5, '2015-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao_marcada`
--

CREATE TABLE IF NOT EXISTS `avaliacao_marcada` (
  `id` int(11) NOT NULL,
  `personal_id` bigint(11) NOT NULL,
  `aluno_id` bigint(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avaliacao_marcada`
--

INSERT INTO `avaliacao_marcada` (`id`, `personal_id`, `aluno_id`, `data`) VALUES
(1, 1, 1, '2015-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Musculação');

-- --------------------------------------------------------

--
-- Table structure for table `codigo_acesso`
--

CREATE TABLE IF NOT EXISTS `codigo_acesso` (
  `id` int(11) NOT NULL,
  `academia_id` bigint(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `codigo_acesso`
--

INSERT INTO `codigo_acesso` (`id`, `academia_id`, `codigo`, `ativo`) VALUES
(1, 1, 'abc', 0),
(2, 1, 'ImlF5b', 1),
(3, 1, '0aclK0', 0),
(4, 1, 'apM8jI', 0),
(5, 1, '0BZpYT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dia`
--

CREATE TABLE IF NOT EXISTS `dia` (
  `id` bigint(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `execucao_id` bigint(11) NOT NULL,
  `execucao_treino_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dia`
--

INSERT INTO `dia` (`id`, `dia`, `execucao_id`, `execucao_treino_id`) VALUES
(17, 3, 17, 20),
(18, 2, 18, 20),
(19, 4, 19, 20),
(20, 2, 20, 21),
(21, 5, 21, 22),
(22, 3, 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `execucao`
--

CREATE TABLE IF NOT EXISTS `execucao` (
  `id` bigint(11) NOT NULL,
  `treino_id` int(11) NOT NULL,
  `treino_personal_id` bigint(11) NOT NULL,
  `treino_aluno_id` bigint(11) NOT NULL,
  `series` int(11) DEFAULT NULL,
  `repeticoes` int(11) DEFAULT NULL,
  `tempo` int(11) NOT NULL,
  `academia_has_pratica_pratica_id` bigint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `execucao`
--

INSERT INTO `execucao` (`id`, `treino_id`, `treino_personal_id`, `treino_aluno_id`, `series`, `repeticoes`, `tempo`, `academia_has_pratica_pratica_id`) VALUES
(17, 20, 1, 2, 3, 12, 0, 3),
(18, 20, 1, 2, 3, 12, 0, 8),
(19, 20, 1, 2, 3, 12, 0, 3),
(20, 21, 1, 2, 3, 12, 0, 3),
(21, 22, 1, 2, 3, 12, 0, 8),
(22, 22, 1, 2, 4, 12, 0, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gerente`
--

INSERT INTO `gerente` (`id`, `nome`, `sobrenome`, `email`, `senha`, `tipo`, `create_time`) VALUES
(1, 'Gerente', 'Academia', 'gerente.academia@hotmail.com', 'gerente', 1, '2015-09-23 18:02:37');

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
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mensagem`
--

CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int(11) NOT NULL,
  `aluno_id` bigint(11) NOT NULL,
  `personal_id` bigint(11) NOT NULL,
  `msg` text NOT NULL,
  `autor` varchar(45) NOT NULL DEFAULT 'aluno',
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mensagem`
--

INSERT INTO `mensagem` (`id`, `aluno_id`, `personal_id`, `msg`, `autor`, `create_ts`) VALUES
(4, 1, 1, 'Primeira msg', 'aluno', '2015-09-23 20:21:49'),
(6, 1, 1, 'Oi', 'personal', '2015-09-24 19:29:49'),
(7, 3, 1, 'Olá!', 'personal', '2015-09-25 12:03:03'),
(8, 1, 2, 'Olá! Estou com dificuldades no Encolhimento Com Halter', 'aluno', '2015-09-26 14:21:53'),
(10, 1, 2, 'Pode me ajudar na terça?', 'aluno', '2015-09-26 14:22:37'),
(11, 1, 2, 'Claro que sim! Até lá :*', 'personal', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id`, `nome`, `sobrenome`, `email`, `senha`, `create_ts`) VALUES
(1, 'Personal', 'Academia', 'personal.academia@hotmail.com', 'personal', '2015-09-23 18:43:41'),
(2, 'Martha', 'Reis', 'personal2.academia@hotmail.com', 'personal', '2015-09-23 20:21:09'),
(3, 'Maradona', 'Personal', 'maradona.morais@hotmail.com', 'face', '2015-09-25 11:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `personal_has_academia`
--

CREATE TABLE IF NOT EXISTS `personal_has_academia` (
  `personal_id` bigint(11) NOT NULL,
  `academia_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_has_academia`
--

INSERT INTO `personal_has_academia` (`personal_id`, `academia_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pratica`
--

CREATE TABLE IF NOT EXISTS `pratica` (
  `id` bigint(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` text,
  `musculo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pratica`
--

INSERT INTO `pratica` (`id`, `categoria_id`, `nome`, `descricao`, `musculo`) VALUES
(3, 1, 'Puxador Frontal Aberto', 'Para executar o Puxador Frontal Aberto:\r\nFaça uma pegada na barra com o dorso das mãos voltado para cima; as mãos devem ficar a uma distância 15cm maior que a largura dos ombros.\r\nTracione a barra para baixo, até a parte superior do peito, contraindo os latíssimos.\r\nRetorne a barra à posição inicial, acima da cabeça.\r\n', 'Dorsal'),
(4, 1, 'Remada Serrador', 'Para executar a remada serrador: Segure um halter fixo com a palma voltada para dentro. Repouse a outra mão e o joelho sobre um banco, mantendo a coluna vertebral reta e praticamente paralela ao chão. Movimente o halter verticalmente para cima ao longo do torso, levantando o cotovelo até o nível mais alto possível. Abaixe o halter até a posição inicial.', 'Dorsal'),
(5, 1, 'Remada Curvada', 'Para executar a Remada Curvada: Fazendo uma pegada na barra com espaçamento igual à largura dos ombros e com o dorso das mãos voltado para cima, incline o torso para a frente em um ângulo de 45 graus com o chão. Tracione a barra verticalmente para cima, até que ela toque a parte inferior do peito, mantendo a coluna vertebral reta e os joelhos ligeiramente dobrados. Abaixe a barra até a posição de braços estendidos. ', 'Dorsal'),
(6, 1, 'Remada Articulada', 'Para executar a Remada Articulada: Segure os pegadores com os braços estendidos à frente, apoiando o torso contra a almofada peitoral. Tracione os pegadores na direção da parte superior do abdome, mantendo a coluna vertebral reta. Retorne o peso à posição inicial. ', 'Dorsal'),
(7, 1, 'Puxador Frontal Fechado', 'Para executar o Puxador Frontal Fechado:\r\nFaça uma pegada na barra com o dorso das mãos voltado para frente (invertido) com as mãos espaçadas em 15 a 30cm.\r\nTracione a barra para baixo até a parte superior do peito, tensionando os latíssimos.\r\nRetorne a barra à posição inicial, com os braços estendidos acima da cabeça\r\n', 'Dorsal'),
(8, 1, 'Remada Baixa Sentado', 'Para executar a remada baixa sentado: Segure os pegadores presos aos cabos com os braços estendidos à frente. Tracione os pegadores superiormente, na direção do peito, mantendo a coluna vertebral reta. Retorne os pegadores à posição inicial. ', 'Dorsal'),
(9, 1, 'Encolhimento Com Barra', 'Para executar o Encolhimento com Barra: Segure uma barra com os braços estendidos à frente das coxas, utilizando pegada com distância igual à largura dos ombros e com o dorso das mãos voltado para cima. Mantendo os braços contraídos, encolha os ombros até o ponto mais alto possível, tracionando a barra com um movimento vertical para cima. Abaixe lentamente a barra até a posição inicial, alongando o trapézio. ', 'Trapézio'),
(10, 1, 'Encolhimento Com Halter', 'Para executar o encolhimento com halter: Em pé, em uma posição ereta com um halter em cada mão, mãos pendentes aos lados do corpo. Mantendo os braços estendidos, encolha os ombros para cima – até o ponho mais alto possível. Abaixe os halteres de volta para a posição inicial. ', 'Trapézio'),
(11, 1, 'Remada Alta Com Barra', 'Para executar a remada alta com barra:\r\nSegure a barra com afastamento igual à distância entre os ombros; use uma pegada com o dorso das mãos voltado para cima.\r\nTracione a barra verticalmente para cima até chegar ao queixo; eleve o máximo possível os cotovelos.\r\nAbaixe a barra lentamente, até que os braços fiquem na posição estendida.\r\n', 'Trapézio'),
(12, 1, 'Barra', 'Para executar a Barra: Suba no banco;\r\nSegure na barra com as mãos voltadas pra trás;\r\nFaça a descida lentamente, em 2 ou 3 segundos.', 'Dorsal'),
(13, 1, 'Levantamento Terra', 'Para executar o levantamento terra: Faça uma pegada com afastamento igual à largura dos ombros e com o dorso das mãos voltado para cima; braços estendidos e na posição agachada, dobrando joelhos e quadris. Mantendo a coluna vertebral reta e os cotovelos bloqueados, fique de pé, ereto, levantando a barra até o nível dos quadris. Lentamente, abaixe a barra até o chão.', 'Lombar'),
(14, 1, 'Levantamento Bom Dia', 'Para executar o Levantamento Bom Dia: Fique em pé em uma posição ereta com uma barra sob os ombros. Mantendo a coluna vertebral reta e os joelhos rígidos (estendidos ou ligeiramente dobrados), incline-se para a frente (use a cintura) até que o torso esteja um pouco acima da posição paralela com relação ao chão. Levante o torso de volta à posição ereta.', 'Lombar'),
(15, 1, 'Extensão Lombar', 'Para executar a extensão lombar: Fique deitado com o rosto voltado para o chão, com os quadris apoiados no banco e tornozelos fixados sob as almofadas. Comece com o torso pendendo para baixo, com flexão de 90 graus na cintura. Eleve o corpo até que o torso esteja um pouco acima da posição de paralelismo com o chão.', 'Lombar'),
(16, 1, 'Leg Press', 'Sente-se no aparelho de leg press e coloque os pés com afastamento na plataforma igual à largura dos ombros.\r\nLentamente, abaixe o peso até que os joelhos estejam com 90 graus de flexão.\r\nEmpurre o peso de volta à posição inicial; para isso, estenda as pernas.\r\n', 'Quadríceps'),
(17, 1, 'Extensão De Pernas', 'Para executar o Extensão de pernas: Sente-se no aparelho e coloque os pés por baixo dos rolos. Levante as pernas para cima, até que os joelhos estejam estendidos. Abaixe as pernas de volta à posição inicial, com os joelhos dobrados em 90 graus.', 'Quadríceps'),
(18, 1, 'Agachamento Hack', 'Posicione as costas contra o encosto e os ombros por baixo dos rolos almofadados e fique em pé com os pés afastados na largura dos ombros sobre a plataforma, com os dedos apontando para frente.\r\nAbaixe lentamente o peso, flexionando os joelhos até 90 graus.\r\nEmpurre o peso de volta à posição inicial, estendendo as pernas.\r\n', 'Quadríceps'),
(19, 1, 'Agachamento Livre', 'No Agachamento livre: Em pé com a barra apoiada nos ombros e os pés afastados em distância igual à largura dos ombros. Flexione lentamente os joelhos até que as coxas fiquem paralelas ao chão. Estenda as pernas para retornar à posição inicial (em pé). ', 'Quadríceps'),
(20, 1, 'Avanço', 'Em pé com os pés afastados na largura dos ombros; segure dois halteres fixos com os braços estendidos ao lado do corpo.\r\nDê um passo para frente e flexione o joelho até que a coxa da perna que avançou esteja paralela com o chão.\r\nRetorne à posição inicial e repita, usando a outra perna.', 'Quadríceps'),
(21, 1, 'Levantamento Stiff', 'No Levantamento Stiff:\r\nFique em pé e mantenha o corpo ereto, com os pés diretamente abaixo dos quadris, segurando uma barra com os braços estendidos.\r\nIncline-se para a frente (use a cintura) abaixando o peso, mas mantendo as pernas estendidas.\r\nPare antes que o peso toque o chão e volte a levantá-lo.\r\n', 'Posterior Da Coxa'),
(22, 1, 'Flexão De Pernas Em Pé', 'Para executar o Flexão de pernas em pé:\r\nColoque um calcanhar por baixo do rolo almofadado e apoie o peso com a outra perna.\r\nLevante o peso dobrando o joelho e elevando o calcanhar na direção da nádega.\r\nAbaixe o peso de volta a posição inicial.\r\n', 'Posterior Da Coxa'),
(23, 1, 'Flexão De Pernas Deitado', 'Para executar o Flexão de pernas deitado: Deite-se de bruços sobre o aparelho e enganche os calcanhares por baixo dos rolos almofadados. Levante o peso dobrando os joelhos e eleve os calcanhares na direção das nádegas. Abaixe o peso de volta à posição inicial. ', 'Posterior Da Coxa'),
(24, 1, 'Supino Inclinado Com Halter', 'Na posição sentada em um banco inclinado, comece com os halteres fixos no nível do tórax, com as palmas das mãos voltadas para a frente.\r\nImpulsione os halteres verticalmente, até que ocorra bloqueio dos cotovelos.\r\nAbaixe os halteres retornando à parte superior do tórax.', 'Peitoral'),
(25, 1, 'Supino Inclinado', 'Para executar o Supino inclinado: Na posição sentada em um banco inclinado, faça uma pegada na barra com as palmas das mãos voltadas para cima e com afastamento na mesma distância dos ombros. Abaixe lentamente o peso, até que a barra toque a parte superior do tórax. Empurre a barra diretamente para cima, até que os cotovelos fiquem estendidos. ', 'Peitoral'),
(26, 1, 'Crucifixo Inclinado', 'Para executar o Crucifixo Inclinado: Sentado em um banco inclinado, comece com os halteres diretamente acima do tórax, com as palmas das mãos voltadas para dentro. Abaixe os halteres para fora, dobrando ligeiramente os cotovelos enquanto os pesos descem até o nível do tórax. Levante os halteres de volta, unindo-os na parte superior do exercício.', 'Peitoral'),
(27, 1, 'Crucifixo Com Cabo', 'Em cada mão, segure o pegador preso a polias baixas, fique em pé, em posição ereta.\r\nLevante as mãos em um arco para frente até que os pegadores se encontrem na altura da cabeça.\r\nMantendo os cotovelos bloqueados, abaixe os pegadores de volta para a posição inicial.\r\n', 'Peitoral'),
(28, 1, 'Supino Reto Com Halter', 'Deitado em um banco horizontal, comece com os halteres no nível do tórax, palmas das mãos voltadas para a frente.\r\nImpulsione verticalmente os halteres, até que ocorra a extensão total dos cotovelos.\r\nAbaixe os halteres, retornando-os até a parte média do tórax.\r\n', 'Peitoral'),
(29, 1, 'Supino Reto Com Barra', 'Na posição deitada em um banco plano, faça uma pegada na barra com o dorso das mãos voltado para cima e o afastamento entre elas igual à distância entre os ombros. Abaixe lentamente o peso até tocar a parte média do tórax. Empurre a barra diretamente para cima, até que ocorra bloqueio dos cotovelos.', 'Peitoral'),
(30, 1, 'Crucifixo Reto', 'Para executar o crucifixo reto: Deitado em um banco horizontal, comece com os halteres diretamente acima do tórax médio, com as palmas das mãos voltadas para dentro. Abaixe os halteres com um amplo movimento de abertura (para fora), dobrando ligeiramente os cotovelos durante a descida dos pesos até o nível do tórax. Levante os halteres em um movimento simultâneo, fazendo arco ascendente, em retorno à posição vertical.', 'Peitoral'),
(31, 1, 'Voador', 'Segure os pegadores verticais, com os cotovelos ligeiramente dobrados.\r\nTracione simultaneamente os pegadores até que se toquem à frente de seu tórax.\r\nDeixe suas mãos retornarem à posição inicial, mantendo os cotovelos elevados.', 'Peitoral'),
(32, 1, 'Supino Declinado', 'Para executar o Supino Declinado: Deite-se em um banco declinado e faça uma pegada na barra com o dorso das mãos voltado para cima e com afastamento igual à distância entre os ombros. Abaixe lentamente o peso até tocar a parte inferior do tórax. Empure a barra diretamente para cima, até que ocorra extensão total dos cotovelos.', 'Peitoral'),
(33, 1, 'Paralela', 'Para executar a Paralela: Agarre as barras paralelas, sustentando o corpo com os cotovelos estendidos e bloqueados. Dobre os cotovelos, baixando o torso até que os braços fiquem paralelos ao chão. Empurre o corpo de volta a posição inicial, isto é, até que seus cotovelos fiquem novamente estendidos. ', 'Peitoral'),
(34, 1, 'Crossover', 'Para executar o crossover: Na posição em pé, segure os pegadores presos às polias altas de um aparelho de cabos. Tracione simultaneamente para baixo os pegadores, até que as mãos se toquem a frente da cintura; mantenha os cotovelos ligeiramente dobrados. Lentamente, retorne à posição inicial com as mãos no nível dos ombros. ', 'Peitoral'),
(35, 1, 'Crucifixo Declinado', 'Para executar o crucifixo declinado: Deitado em um banco declinado, comece com os halteres diretamente acima de seu tórax, com as palmas das mãos voltadas para dentro. Abaixe os halteres com um movimento de abertura (para fora), dobrando ligeiramente os cotovelos durante a descida dos pesos até o nível do tórax. Leva simultaneamente os halteres de volta à posição inicial, até se tocarem.', 'Peitoral'),
(36, 1, 'Tríceps Testa', 'Para executar o Tríceps testa: Deitado em um banco horizontal, segure uma barra com os braços estendidos acima de seu peito; use pegada fechada, com o dorso das mãos voltado para cima, e com as mãos afastadas em aproximadamente 15 cm. Flexione os cotovelos e abaixe a barra até tocar a testa. Impulsione a barra para cima, até que ocorra extensão total dos cotovelos. ', 'Tríceps'),
(37, 1, 'Tríceps Supinado', 'Para executar o Tríceps Supinado:\r\nUse pegada fechada (cerca de 15 cm) na barra, com o dorso das mãos voltado para cima.\r\nAbaixe o peso lentamente, até tocar na parte media do peito.\r\nEmpurre a barra diretamente para cima, até ocorrer bloqueio dos cotovelos.\r\n', 'Tríceps'),
(38, 1, 'Tríceps Puxador', 'Para executar o Tríceps puxador: Faça a pegada com o dorso das mãos voltado para cima e na largura dos ombros em uma barra curta presa a uma polia alta. Comece com a barra no nível do peito, cotovelos dobrados um pouco mais do que 90 graus. Mantendo os braços estendidos, tracione a barra para baixo até que os cotovelos fiquem bloqueados. ', 'Tríceps'),
(39, 1, 'Tríceps Francês', 'Para executar o Tríceps Francês: Sente-se com o torso ereto, segurando uma barra nas duas mãos com os braços estendidos acima da cabeça; use uma pegada fechada com o dorso das mãos voltado para cima. Flexione os cotovelos e abaixe a barra por trás da cabeça. Impulsione a barra para cima até que ocorra extensão total dos cotovelos. ', 'Tríceps'),
(40, 1, 'Tríceps Coice', ' Para executar o Tríceps coice: Pegue o halter com uma mão, encurve-se para frente (use a cintura), e sustente o torso pousando a mão livre em um banco, ou no joelho. Comece com o braço paralelo ao chão e com o cotovelo dobrado em 90 graus. Movimente para cima o halter, estendendo o braço até que ocorra total extensão do cotovelo. ', 'Tríceps'),
(41, 1, 'Rosca Scott', 'Para executar o Rosca Scott: Sente-se com os braços repousando no banco de Scott e faça a pegada na barra com o dorso das mãos voltado para baixo e na mesma distancia dos ombros; braços retos, voltados para fora. Flexionando os cotovelos, movimente a barra na direção dos ombros. Abaixe o peso de volta à posição com os braços estendidos.', 'Bíceps'),
(42, 1, 'Rosca no Aparelho', 'Para executar o Rosca no aparelho:\r\nSegure a barra usando uma pegada com o dorso das mãos voltado para baixo e na largura dos ombros, com os cotovelos repousando na almofada e braços retos, voltados para fora.\r\nTracione a barra na direção dos ombros, flexionando os cotovelos\r\nRetorne a barra à posição de braços estendidos\r\n', 'Bíceps'),
(43, 1, 'Rosca Direta Com Halter', 'Segure um par de halteres à distancia do braços estendido, um de cada lado do corpo, com os polegares apontando para frente.\r\nMovimentando um braço de cada vez, movimente o halter para cima, na direção do ombro, girando a mão de modo que a palma fique voltada para cima.\r\nAbaixe o halter e repita com o outro braço.\r\n', 'Bíceps'),
(44, 1, 'Rosca Direta Com Barra', 'Para executar a Rosca direta com barra:\r\nSegure a barra com os braços estendidos; pegada com afastamento igual à distancia entre os ombros e com o dorso das mãos voltado para baixo.\r\nLeve a barra até o nível dos ombros; para tanto, flexione os cotovelos.\r\nAbaixe a barra de volta à posição inicial, com os braços na posição estendida.\r\n', 'Bíceps'),
(45, 1, 'Rosca Concentrada', 'Para executar a Rosca Concentrada:\r\nPosição sentada na extremidade do banco. Segure o halter fixo com o braço estendido; apoie o braço contra a parte interna da coxa.\r\nFaça o exercício de rosca com halter na direção do ombro, flexionando o cotovelo.\r\nAbaixe o halter de volta a posição inicial.\r\n', 'Bíceps'),
(46, 1, 'Rosca Com Cabo', 'Para executar o Rosca com cabo: Segure a barra curta presa a uma polia baixa, utilizando uma pegada com o dorso das mãos voltado para baixo e com os braços estendidos. Levante a barra na direção dos ombros, flexionando os cotovelos. Abaixe o peso de volta à posição inicial, braços na posição estendida. ', 'Bíceps'),
(47, 1, 'Rosca Martelo', 'Para executar o Rosca martelo: Segure um halter fixo em cada mão com as palmas voltadas para dentro (polegares apontando para frente). Levante um halter de cada vez até o ombro, mantendo as palmas das mãos voltadas para dentro. Abaixe o halter de volta à posição de braço estendido e repita com o outro braço. ', 'Antebraço'),
(48, 1, 'Rosca Invertida', 'Para executar o Rosca invertida: Segure a barra do halter com os braços estendidos; use uma pegada com o dorso das mãos voltados para cima e com afastamento igual à distância entre os ombros. Eleve a barra até o nível dos ombros, rosqueando os punhos para cima e para trás enquanto flexiona os cotovelos. Abaixe a barra até a posição de braços estendidos, deixando que os punhos “caiam”. ', 'Antebraço'),
(49, 1, 'Rosca Punho', 'Para executar o Rosca punho: Sentado na extremidade do banco, faça a pegada na barra com o dorso das mãos voltado para baixo, mãos afastadas na distância entre os ombros e repouse a parte dorsal dos antebraços nas coxas. Abaixe a barra dobrando os punhos para baixo, na direção do chão. Faça a rosca (peso para cima) utilizando o movimento dos punhos. ', 'Antebraço'),
(50, 1, 'Rosca Punho Invertida', 'Para executar a Rosca punho invertida: Pegue a barra usando pegada com o dorso das mãos voltado para cima e repouse os antebraços no alto das coxas ou na borda do banco. Abaixe a barra dobrando os punhos na direção do chão. Levante o peso utilizando o movimento dos punhos.', 'Antebraço'),
(51, 1, 'Abdominal', 'Coloque os pés embaixo da almofada e sente no banco declinado com o torso ereto.\r\nAbaixe o torso para trás até que fique praticamente paralelo ao chão.\r\nRetorna a posição vertical, dobrando na cintura.\r\n', 'Abdome'),
(52, 1, 'Abdominal Grupado', ' Deite-se de costas no chão, com os quadris dobrados a 90 graus e as mãos atrás da cabeça. Eleve os ombros do chão, comprimindo o peito para frente e mantendo a região lombar em contato com o chão. Abaixe os ombros de volta à posição inicial. ', 'Abdome'),
(53, 1, 'Abdominal Grupado Com Corda', 'Para executar o Abdominal grupado com corda: Ajoelhe no chão embaixo de uma polia alta e segure a corda com as duas mãos, atrás da cabeça. Puxe o peso para baixo, encurvando o torso e inclinando a cintura. Retorne a posição inicial. ', 'Abdome'),
(54, 1, 'Abdominal Grupado Com Aparelho', 'Para realizar o Abdominal grupado com aparelho:\r\nSente-se no assento, segure os pegadores e coloque os pés sob os rolos de tornozelo.\r\nFaça o abdominal inclinando o torso na direção dos joelhos.\r\nRetorne a posição vertical.\r\n', 'Abdome'),
(55, 1, 'Elevação De Pernas Corpo Inclinado', 'Para executar o Elevação de pernas corpo inclinado:\r\nDeite-se de costas em um banco abdominal inclinado, com as pernas para baixo.\r\nLevante as pernas (nos quadris) e impulsione as coxas na direção do peito, mantendo os joelhos ligeiramente dobrados.\r\nAbaixe lentamente as pernas de volta à posição inicial.\r\n', 'Abdome'),
(56, 1, 'Elevação De Pernas Na Barra', 'Para executar o Elevação de pernas na barra: Pendure-se com as mãos em uma barra, ou coloque os cotovelos em um par de AB Slings (protetores que se prendem à barra para sustentar o peso do corpo); as pernas ficam livremente pendentes. Levante simultaneamente os joelhos, ligeiramente dobrados, na direção do peito. Abaixe lentamente as pernas de volta à posição inicial, sem balançar. ', 'Abdome'),
(57, 1, 'Elevação De Joelhos', 'Para executar a elevação de joelhos: Sente-se na extremidade de um banco horizontal, com as pernas pendendo e os joelhos ligeiramente dobrados, e agarre o banco atrás de você. Levante os joelhos na direção do peito, mantendo as pernas juntas. Abaixe as pernas, até que os calcanhares praticamente toquem o chão. ', 'Abdome'),
(58, 1, 'Abdominal Grupado Invertido', 'Para executar o Abdominal grupado invertido, deite-se em um banco horizontal, posicione os pés de modo a fazer 90 graus com os joelhos e quadris e agarre o banco atrás da cabeça para apoio. Levante a pelve (afastando-a do banco) até que os pés apontem para o teto. Abaixe as pernas de volta para posição inicial.', 'Abdome'),
(59, 1, 'Pullover', 'Deite-se com a parte superior das costas repousando transversalmente em um banco horizontal; segure um halter fixo diretamente acima de seu tórax.\r\nMovimente o halter para baixo e para trás, até atingir o nível do banco, inspirando profundamente e alongando o gradil costal.\r\nRetorne o peso até a posição vertical, expirando ao fazê-lo.\r\nOBS:Este não é um exercício específico para os músculos do peitoral. Está incluído nessa seção porque o peitoral é bem trabalhado, mas poderia ser encaixado na seção de abdome ou de costas. ', 'Peitoral'),
(60, 1, 'Inclinação Lateral Com Halter', 'Para executar a Inclinação lateral com halter:  Fique em pé, segurando um halter na mão esquerda; coloque a mão direita atrás da cabeça. Dobre o torso para o lado esquerdo, abaixando o halter na direção do joelho. Faça com que o torso fique novamente ereto, contraindo os músculos oblíquos direitos. ', 'Abdome'),
(61, 1, 'Abdominal Grupado Oblíquo', 'Para executar o Abdominal grupado oblíquo: Deite-se sobre o lado esquerdo, joelhos dobrados e juntos, mão direita atrás da cabeça. Levante lentamente o torso, contraindo os oblíquos do lado direito. Abaixe o torso até a posição inicial.', 'Abdome'),
(62, 1, 'Abdominal Grupado Oblíquo Com Cabo', 'Para executar o Abdominal grupado oblíquo com cabo:  Segure um pegador preso à polia alta de um aparelho de cabo. Faça o abdominal para baixo, direcionando o cotovelo para o joelho oposto. Retorne lentamente à posição inicial. ', 'Abdome'),
(63, 1, 'Abdominal Com Giro', 'Para fazer o abdominal com giro, sente-se no banco inclinado, enganche os pés por baixo da almofada, incline-se para trás e posicione as mãos atrás da cabeça. Ao fazer o abdominal, torça seu torso, direcionando o cotovelo direito ao joelho esquerdo. Abaixe de volta para a posição inicial Durante a próxima repetição, direcione o cotovelo esquerdo para o joelho direito. ', 'Abdome'),
(64, 1, 'Levantamento Frontal com Cabo', 'Para executar o Levantamento Frontal com Cabo: Com uma das mãos, segure o pegador preso a uma polia baixa, utilizando uma pegada pronada (palma das mãos para baixo). Virado de costas para a pilha de pesos, levante o cabo em um arco ascendente até o nível do ombro, mantendo o cotovelo rígido. Abaixe o cabo de volta até o nível da cintura. ', 'Ombro'),
(65, 1, 'Levantamento Frontal Com Barra', 'Para executar o levantamento frontal com barra: Utilizando uma pegada com o dorso das mãos voltado para cima e na largura dos ombros, segure um halter de barra á frente das coxas com os braços estendidos. Levante o halter para a frente e para cima até o nível dos olhos, mantendo os cotovelos rígidos. Abaixe o halter de volta às coxas. ', 'Ombro'),
(66, 1, 'Elevação Frontal Alternada', 'Para executar a elevação frontal alternada: Sentado com as costas eretas na extremidade de um banco de exercício, segure um par de halteres fixos aos lados do corpo com os braços estendidos; os polegares devem estar apontando para a frente. Levante um haltere para a frente até o nível do ombro, mantendo o cotovelo rígido. Abaixe o peso de volta para a posição inicial e repita com o outro halter.', 'Ombro'),
(67, 1, 'Desenvolvimento Com Barra', 'Para executar o Desenvolvimento com barra: Sentado num banco, faça a pegada na barra com afastamento das mãos igual à largura dos ombros; palmas das mãos voltadas para frente. Abaixe lentamente o peso (à frente), até que toque a parte superior do tórax. Impulsione verticalmente para cima até que ocorra bloqueio dos cotovelos. ', 'Ombro'),
(68, 1, 'Desenvolvimento Com Halter', 'Sentado em um banco, comece com os halteres fixos no nível do ombro, palmas das mãos voltadas para frente.\r\nImpulsione verticalmente para cima os halteres, até que ocorra bloqueio dos cotovelos.\r\nAbaixe os halteres de volta, até tocarem os ombros.', 'Ombro'),
(69, 1, 'Elevação Lateral Com Halter Inclinado', 'Segurando dois halteres com os braços estendidos, incline o corpo para a frente usando a cintura, mantendo as costas retas e a cabeça levantada.\r\nCom as palmas das mãos voltadas para dentro, levante os halteres para cima até o nível das orelhas, mantendo os cotovelos ligeiramente dobrados.\r\nAbaixe os halteres de volta à posição inicial.\r\n', 'Ombro'),
(70, 1, 'Elevação Lateral Com Cabo Inclinado', 'Com o pegador esquerdo na mão direita, e o direito na mão esquerda, fique em pé no meio, e em seguida, incline o corpo para a frente usando a cintura, com as costas retas e paralelas ao chão.\r\nLevante as mãos para cima em um arco até o nível dos ombros, de tal modeo que os cabos se cruzem.\r\nAbaixe os pegadores até a posição inicial, com a mão direita diretamente à frente do tornozelo esquerdo e a mão esquerda diretamente à frente do tornozelo esquerdo.\r\n', 'Ombro'),
(71, 1, 'Crossover Invertido', 'Para executar o Crossover Invertido: Utilizando uma pegada com os polegares apontando para cima, segure os pegadores presos a duas polias altas (pegador esquerdo na mão direita, pegador direito na mão esquerda), fique de pé em posição central, com as polias à sua frente. (Atenção: durante o cruzamento dos cabos para o tórax, as polias ficam atrás de seu corpo.) Impulsione as mãos para trás (e ligeiramente para baixo) em um arco, com os braços praticamente paralelos ao chão até que as mãos estejam alinhadas com os ombros (formando um T). Retorne os pegadores de volta à posição inicial, de modo que a mão direita fique diretamente à frente do ombro esquerdo, e a mão esquerda diretamente à frente do ombro direito. ', 'Ombro'),
(72, 1, 'Crucifixo Invertido No Aparelho', 'Para executar o Crucifixo invertido no aparelho: Sente-se de frente para o aparelho com o peito contra o encosto do banco e pegue os pegadores com o braço estendido ao nível do ombro.\r\nPuxe os pegadores para trás no arco mais distante possível, mantendo os cotovelos elevados e braços paralelos ao chão.\r\nRetorne os pegadores à posição inicial, diretamente à frente.\r\n', 'Ombro'),
(73, 1, 'Remada Alta Com Barra', 'Segure o halter comi os braços estendidos; use uma pegada com o dorso das mãos voltado para cima, braços afastados na largura dos ombros.\r\nTracione a barra do haltere verticalmente para cima, levantando os cotovelos até a altura do ombro.\r\nAbaixe lentamente a barra até a posição de braços estendidos.\r\n', 'Ombro'),
(74, 1, 'Elevação Lateral Com Halter', 'Para executar a Elevação Lateral Com Halter: Na posição em pé ereta, segure os halters com os braços estendidos. Levante os braços para fora e para os lados do corpo, até que os halteres atinjam o nível dos ombros. Abaixe os halteres de volta para os quadris.', 'Ombro'),
(75, 1, 'Elevação Lateral Cabo', 'Para executar a Elevação Lateral Cabo: Com uma das mãos, agarre o pegador preso a uma polia baixa. Levante a mão para fora, fazendo um arco amplo, até o nível do ombro, mantendo o cotovelo rígido. Abaixe o cabo de volta no nível da cintura.', 'Ombro'),
(76, 1, 'Elevação Lateral Aparelho', 'Para executar a elevação lateral aparelho:\r\nSente-se no aparelho com os cotovelos contra as almofadas protetoras e agarre os pegadores.\r\nLevante os cotovelos até o nível do ombro, braços paralelos ao chão.\r\nAbaixe os cotovelos de volta aos lados do corpo.\r\n', 'Ombro'),
(77, 1, 'Rotação Interna', 'Fique de pé, posicionado de lado com relação a uma polia de cabo ajustada à altura da cintura; agarre o pegador com a mão “de dentro” e com o polegar apontando para cima. Com o cotovelo mantido firmemente contra a cintura, puxe o pegador para dentro, passando à frente do seu corpo e mantendo o antebraço paralelo ao chão. Retorne lentamente o pegador de volta a posição inicial. ', 'Ombro'),
(78, 1, 'Rotação Externa', 'Fique de pé, posicionado de lado com relação a uma polia de cabo ajustada à altura da cintura; agarre o pegador com a mão “de fora” e com o polegar apontando para cima. Com o cotovelo mantido firmemente contra a cintura, movimente o pegador em um arco para fora, afastando-o do corpo e mantendo o antebraço paralelo ao chão. Retorne lentamente o pegador à posição inicial, em frente ao umbigo ', 'Ombro'),
(79, 1, 'Elevação Lateral Apoiado', 'Para executar a Elevação lateral apoiado:\r\nDeite-se de lado sobre um banco com o torso inclinado em 45 graus, apoiado pelo braço que está abaixo do corpo.\r\nUsando uma pegada com o dorso da mão voltado para cima, levante o halter até a altura da cabeça, mantendo o cotovelo bloqueado.\r\nAbaixe o peso, retornando=o até o nível da cintura.\r\n', 'Ombro');

-- --------------------------------------------------------

--
-- Table structure for table `pratica_sv`
--

CREATE TABLE IF NOT EXISTS `pratica_sv` (
  `id` bigint(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL,
  `musculo` varchar(45) COLLATE utf8_bin NOT NULL,
  `categoria` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pratica_sv`
--

INSERT INTO `pratica_sv` (`id`, `nome`, `descricao`, `musculo`, `categoria`) VALUES
(29, 'Puxador Frontal Aberto', 'Para executar o Puxador Frontal Aberto:\r\nFaça uma pegada na barra com o dorso das mãos voltado para cima; as mãos devem ficar a uma distância 15cm maior que a largura dos ombros.\r\nTracione a barra para baixo, até a parte superior do peito, contraindo os latíssimos.\r\nRetorne a barra à posição inicial, acima da cabeça.\r\n', 'Dorsal', 'musculacao'),
(25, 'Remada Serrador', 'Para executar a remada serrador: Segure um halter fixo com a palma voltada para dentro. Repouse a outra mão e o joelho sobre um banco, mantendo a coluna vertebral reta e praticamente paralela ao chão. Movimente o halter verticalmente para cima ao longo do torso, levantando o cotovelo até o nível mais alto possível. Abaixe o halter até a posição inicial.', 'Dorsal', 'musculacao'),
(26, 'Remada Curvada', 'Para executar a Remada Curvada: Fazendo uma pegada na barra com espaçamento igual à largura dos ombros e com o dorso das mãos voltado para cima, incline o torso para a frente em um ângulo de 45 graus com o chão. Tracione a barra verticalmente para cima, até que ela toque a parte inferior do peito, mantendo a coluna vertebral reta e os joelhos ligeiramente dobrados. Abaixe a barra até a posição de braços estendidos. ', 'Dorsal', 'musculacao'),
(27, 'Remada Articulada', 'Para executar a Remada Articulada: Segure os pegadores com os braços estendidos à frente, apoiando o torso contra a almofada peitoral. Tracione os pegadores na direção da parte superior do abdome, mantendo a coluna vertebral reta. Retorne o peso à posição inicial. ', 'Dorsal', 'musculacao'),
(28, 'Puxador Frontal Fechado', 'Para executar o Puxador Frontal Fechado:\r\nFaça uma pegada na barra com o dorso das mãos voltado para frente (invertido) com as mãos espaçadas em 15 a 30cm.\r\nTracione a barra para baixo até a parte superior do peito, tensionando os latíssimos.\r\nRetorne a barra à posição inicial, com os braços estendidos acima da cabeça\r\n', 'Dorsal', 'musculacao'),
(24, 'Remada Baixa Sentado', 'Para executar a remada baixa sentado: Segure os pegadores presos aos cabos com os braços estendidos à frente. Tracione os pegadores superiormente, na direção do peito, mantendo a coluna vertebral reta. Retorne os pegadores à posição inicial. ', 'Dorsal', 'musculacao'),
(23, 'Encolhimento Com Barra', 'Para executar o Encolhimento com Barra: Segure uma barra com os braços estendidos à frente das coxas, utilizando pegada com distância igual à largura dos ombros e com o dorso das mãos voltado para cima. Mantendo os braços contraídos, encolha os ombros até o ponto mais alto possível, tracionando a barra com um movimento vertical para cima. Abaixe lentamente a barra até a posição inicial, alongando o trapézio. ', 'Trapézio', 'musculacao'),
(22, 'Encolhimento Com Halter', 'Para executar o encolhimento com halter: Em pé, em uma posição ereta com um halter em cada mão, mãos pendentes aos lados do corpo. Mantendo os braços estendidos, encolha os ombros para cima – até o ponho mais alto possível. Abaixe os halteres de volta para a posição inicial. ', 'Trapézio', 'musculacao'),
(21, 'Remada Alta Com Barra', 'Para executar a remada alta com barra:\r\nSegure a barra com afastamento igual à distância entre os ombros; use uma pegada com o dorso das mãos voltado para cima.\r\nTracione a barra verticalmente para cima até chegar ao queixo; eleve o máximo possível os cotovelos.\r\nAbaixe a barra lentamente, até que os braços fiquem na posição estendida.\r\n', 'Trapézio', 'musculacao'),
(30, 'Barra', 'Para executar a Barra: Suba no banco;\r\nSegure na barra com as mãos voltadas pra trás;\r\nFaça a descida lentamente, em 2 ou 3 segundos.', 'Dorsal', 'musculacao'),
(31, 'Levantamento Terra', 'Para executar o levantamento terra: Faça uma pegada com afastamento igual à largura dos ombros e com o dorso das mãos voltado para cima; braços estendidos e na posição agachada, dobrando joelhos e quadris. Mantendo a coluna vertebral reta e os cotovelos bloqueados, fique de pé, ereto, levantando a barra até o nível dos quadris. Lentamente, abaixe a barra até o chão.', 'Lombar', 'musculacao'),
(32, 'Levantamento Bom Dia', 'Para executar o Levantamento Bom Dia: Fique em pé em uma posição ereta com uma barra sob os ombros. Mantendo a coluna vertebral reta e os joelhos rígidos (estendidos ou ligeiramente dobrados), incline-se para a frente (use a cintura) até que o torso esteja um pouco acima da posição paralela com relação ao chão. Levante o torso de volta à posição ereta.', 'Lombar', 'musculacao'),
(33, 'Extensão Lombar', 'Para executar a extensão lombar: Fique deitado com o rosto voltado para o chão, com os quadris apoiados no banco e tornozelos fixados sob as almofadas. Comece com o torso pendendo para baixo, com flexão de 90 graus na cintura. Eleve o corpo até que o torso esteja um pouco acima da posição de paralelismo com o chão.', 'Lombar', 'musculacao'),
(34, 'Leg Press', 'Sente-se no aparelho de leg press e coloque os pés com afastamento na plataforma igual à largura dos ombros.\r\nLentamente, abaixe o peso até que os joelhos estejam com 90 graus de flexão.\r\nEmpurre o peso de volta à posição inicial; para isso, estenda as pernas.\r\n', 'Quadríceps', 'musculacao'),
(35, 'Extensão De Pernas', 'Para executar o Extensão de pernas: Sente-se no aparelho e coloque os pés por baixo dos rolos. Levante as pernas para cima, até que os joelhos estejam estendidos. Abaixe as pernas de volta à posição inicial, com os joelhos dobrados em 90 graus.', 'Quadríceps', 'musculacao'),
(36, 'Agachamento Hack', 'Posicione as costas contra o encosto e os ombros por baixo dos rolos almofadados e fique em pé com os pés afastados na largura dos ombros sobre a plataforma, com os dedos apontando para frente.\r\nAbaixe lentamente o peso, flexionando os joelhos até 90 graus.\r\nEmpurre o peso de volta à posição inicial, estendendo as pernas.\r\n', 'Quadríceps', 'musculacao'),
(37, 'Agachamento Livre', 'No Agachamento livre: Em pé com a barra apoiada nos ombros e os pés afastados em distância igual à largura dos ombros. Flexione lentamente os joelhos até que as coxas fiquem paralelas ao chão. Estenda as pernas para retornar à posição inicial (em pé). ', 'Quadríceps', 'musculacao'),
(38, 'Avanço', 'Em pé com os pés afastados na largura dos ombros; segure dois halteres fixos com os braços estendidos ao lado do corpo.\r\nDê um passo para frente e flexione o joelho até que a coxa da perna que avançou esteja paralela com o chão.\r\nRetorne à posição inicial e repita, usando a outra perna.', 'Quadríceps', 'musculacao'),
(39, 'Levantamento Stiff', 'No Levantamento Stiff:\r\nFique em pé e mantenha o corpo ereto, com os pés diretamente abaixo dos quadris, segurando uma barra com os braços estendidos.\r\nIncline-se para a frente (use a cintura) abaixando o peso, mas mantendo as pernas estendidas.\r\nPare antes que o peso toque o chão e volte a levantá-lo.\r\n', 'Posterior Da Coxa', 'musculacao'),
(40, 'Flexão De Pernas Em Pé', 'Para executar o Flexão de pernas em pé:\r\nColoque um calcanhar por baixo do rolo almofadado e apoie o peso com a outra perna.\r\nLevante o peso dobrando o joelho e elevando o calcanhar na direção da nádega.\r\nAbaixe o peso de volta a posição inicial.\r\n', 'Posterior Da Coxa', 'musculacao'),
(41, 'Flexão De Pernas Deitado', 'Para executar o Flexão de pernas deitado: Deite-se de bruços sobre o aparelho e enganche os calcanhares por baixo dos rolos almofadados. Levante o peso dobrando os joelhos e eleve os calcanhares na direção das nádegas. Abaixe o peso de volta à posição inicial. ', 'Posterior Da Coxa', 'musculacao'),
(42, 'Supino Inclinado Com Halter', 'Na posição sentada em um banco inclinado, comece com os halteres fixos no nível do tórax, com as palmas das mãos voltadas para a frente.\r\nImpulsione os halteres verticalmente, até que ocorra bloqueio dos cotovelos.\r\nAbaixe os halteres retornando à parte superior do tórax.', 'Peitoral', 'musculacao'),
(43, 'Supino Inclinado', 'Para executar o Supino inclinado: Na posição sentada em um banco inclinado, faça uma pegada na barra com as palmas das mãos voltadas para cima e com afastamento na mesma distância dos ombros. Abaixe lentamente o peso, até que a barra toque a parte superior do tórax. Empurre a barra diretamente para cima, até que os cotovelos fiquem estendidos. ', 'Peitoral', 'musculacao'),
(44, 'Crucifixo Inclinado', 'Para executar o Crucifixo Inclinado: Sentado em um banco inclinado, comece com os halteres diretamente acima do tórax, com as palmas das mãos voltadas para dentro. Abaixe os halteres para fora, dobrando ligeiramente os cotovelos enquanto os pesos descem até o nível do tórax. Levante os halteres de volta, unindo-os na parte superior do exercício.', 'Peitoral', 'musculacao'),
(45, 'Crucifixo Com Cabo', 'Em cada mão, segure o pegador preso a polias baixas, fique em pé, em posição ereta.\r\nLevante as mãos em um arco para frente até que os pegadores se encontrem na altura da cabeça.\r\nMantendo os cotovelos bloqueados, abaixe os pegadores de volta para a posição inicial.\r\n', 'Peitoral', 'musculacao'),
(46, 'Supino Reto Com Halter', 'Deitado em um banco horizontal, comece com os halteres no nível do tórax, palmas das mãos voltadas para a frente.\r\nImpulsione verticalmente os halteres, até que ocorra a extensão total dos cotovelos.\r\nAbaixe os halteres, retornando-os até a parte média do tórax.\r\n', 'Peitoral', 'musculacao'),
(47, 'Supino Reto Com Barra', 'Na posição deitada em um banco plano, faça uma pegada na barra com o dorso das mãos voltado para cima e o afastamento entre elas igual à distância entre os ombros. Abaixe lentamente o peso até tocar a parte média do tórax. Empurre a barra diretamente para cima, até que ocorra bloqueio dos cotovelos.', 'Peitoral', 'musculacao'),
(48, 'Crucifixo Reto', 'Para executar o crucifixo reto: Deitado em um banco horizontal, comece com os halteres diretamente acima do tórax médio, com as palmas das mãos voltadas para dentro. Abaixe os halteres com um amplo movimento de abertura (para fora), dobrando ligeiramente os cotovelos durante a descida dos pesos até o nível do tórax. Levante os halteres em um movimento simultâneo, fazendo arco ascendente, em retorno à posição vertical.', 'Peitoral', 'musculacao'),
(49, 'Voador', 'Segure os pegadores verticais, com os cotovelos ligeiramente dobrados.\r\nTracione simultaneamente os pegadores até que se toquem à frente de seu tórax.\r\nDeixe suas mãos retornarem à posição inicial, mantendo os cotovelos elevados.', 'Peitoral', 'musculacao'),
(50, 'Supino Declinado', 'Para executar o Supino Declinado: Deite-se em um banco declinado e faça uma pegada na barra com o dorso das mãos voltado para cima e com afastamento igual à distância entre os ombros. Abaixe lentamente o peso até tocar a parte inferior do tórax. Empure a barra diretamente para cima, até que ocorra extensão total dos cotovelos.', 'Peitoral', 'musculacao'),
(51, 'Paralela', 'Para executar a Paralela: Agarre as barras paralelas, sustentando o corpo com os cotovelos estendidos e bloqueados. Dobre os cotovelos, baixando o torso até que os braços fiquem paralelos ao chão. Empurre o corpo de volta a posição inicial, isto é, até que seus cotovelos fiquem novamente estendidos. ', 'Peitoral', 'musculacao'),
(52, 'Crossover', 'Para executar o crossover: Na posição em pé, segure os pegadores presos às polias altas de um aparelho de cabos. Tracione simultaneamente para baixo os pegadores, até que as mãos se toquem a frente da cintura; mantenha os cotovelos ligeiramente dobrados. Lentamente, retorne à posição inicial com as mãos no nível dos ombros. ', 'Peitoral', 'musculacao'),
(53, 'Crucifixo Declinado', 'Para executar o crucifixo declinado: Deitado em um banco declinado, comece com os halteres diretamente acima de seu tórax, com as palmas das mãos voltadas para dentro. Abaixe os halteres com um movimento de abertura (para fora), dobrando ligeiramente os cotovelos durante a descida dos pesos até o nível do tórax. Leva simultaneamente os halteres de volta à posição inicial, até se tocarem.', 'Peitoral', 'musculacao'),
(54, 'Tríceps Testa', 'Para executar o Tríceps testa: Deitado em um banco horizontal, segure uma barra com os braços estendidos acima de seu peito; use pegada fechada, com o dorso das mãos voltado para cima, e com as mãos afastadas em aproximadamente 15 cm. Flexione os cotovelos e abaixe a barra até tocar a testa. Impulsione a barra para cima, até que ocorra extensão total dos cotovelos. ', 'Tríceps', 'musculacao'),
(55, 'Tríceps Supinado', 'Para executar o Tríceps Supinado:\r\nUse pegada fechada (cerca de 15 cm) na barra, com o dorso das mãos voltado para cima.\r\nAbaixe o peso lentamente, até tocar na parte media do peito.\r\nEmpurre a barra diretamente para cima, até ocorrer bloqueio dos cotovelos.\r\n', 'Tríceps', 'musculacao'),
(56, 'Tríceps Puxador', 'Para executar o Tríceps puxador: Faça a pegada com o dorso das mãos voltado para cima e na largura dos ombros em uma barra curta presa a uma polia alta. Comece com a barra no nível do peito, cotovelos dobrados um pouco mais do que 90 graus. Mantendo os braços estendidos, tracione a barra para baixo até que os cotovelos fiquem bloqueados. ', 'Tríceps', 'musculacao'),
(57, 'Tríceps Francês', 'Para executar o Tríceps Francês: Sente-se com o torso ereto, segurando uma barra nas duas mãos com os braços estendidos acima da cabeça; use uma pegada fechada com o dorso das mãos voltado para cima. Flexione os cotovelos e abaixe a barra por trás da cabeça. Impulsione a barra para cima até que ocorra extensão total dos cotovelos. ', 'Tríceps', 'musculacao'),
(58, 'Tríceps Coice', ' Para executar o Tríceps coice: Pegue o halter com uma mão, encurve-se para frente (use a cintura), e sustente o torso pousando a mão livre em um banco, ou no joelho. Comece com o braço paralelo ao chão e com o cotovelo dobrado em 90 graus. Movimente para cima o halter, estendendo o braço até que ocorra total extensão do cotovelo. ', 'Tríceps', 'musculacao'),
(59, 'Rosca Scott', 'Para executar o Rosca Scott: Sente-se com os braços repousando no banco de Scott e faça a pegada na barra com o dorso das mãos voltado para baixo e na mesma distancia dos ombros; braços retos, voltados para fora. Flexionando os cotovelos, movimente a barra na direção dos ombros. Abaixe o peso de volta à posição com os braços estendidos.', 'Bíceps', 'musculacao'),
(60, 'Rosca no Aparelho', 'Para executar o Rosca no aparelho:\r\nSegure a barra usando uma pegada com o dorso das mãos voltado para baixo e na largura dos ombros, com os cotovelos repousando na almofada e braços retos, voltados para fora.\r\nTracione a barra na direção dos ombros, flexionando os cotovelos\r\nRetorne a barra à posição de braços estendidos\r\n', 'Bíceps', 'musculacao'),
(61, 'Rosca Direta Com Halter', 'Segure um par de halteres à distancia do braços estendido, um de cada lado do corpo, com os polegares apontando para frente.\r\nMovimentando um braço de cada vez, movimente o halter para cima, na direção do ombro, girando a mão de modo que a palma fique voltada para cima.\r\nAbaixe o halter e repita com o outro braço.\r\n', 'Bíceps', 'musculacao'),
(62, 'Rosca Direta Com Barra', 'Para executar a Rosca direta com barra:\r\nSegure a barra com os braços estendidos; pegada com afastamento igual à distancia entre os ombros e com o dorso das mãos voltado para baixo.\r\nLeve a barra até o nível dos ombros; para tanto, flexione os cotovelos.\r\nAbaixe a barra de volta à posição inicial, com os braços na posição estendida.\r\n', 'Bíceps', 'musculacao'),
(63, 'Rosca Concentrada', 'Para executar a Rosca Concentrada:\r\nPosição sentada na extremidade do banco. Segure o halter fixo com o braço estendido; apoie o braço contra a parte interna da coxa.\r\nFaça o exercício de rosca com halter na direção do ombro, flexionando o cotovelo.\r\nAbaixe o halter de volta a posição inicial.\r\n', 'Bíceps', 'musculacao'),
(64, 'Rosca Com Cabo', 'Para executar o Rosca com cabo: Segure a barra curta presa a uma polia baixa, utilizando uma pegada com o dorso das mãos voltado para baixo e com os braços estendidos. Levante a barra na direção dos ombros, flexionando os cotovelos. Abaixe o peso de volta à posição inicial, braços na posição estendida. ', 'Bíceps', 'musculacao'),
(65, 'Rosca Martelo', 'Para executar o Rosca martelo: Segure um halter fixo em cada mão com as palmas voltadas para dentro (polegares apontando para frente). Levante um halter de cada vez até o ombro, mantendo as palmas das mãos voltadas para dentro. Abaixe o halter de volta à posição de braço estendido e repita com o outro braço. ', 'Antebraço', 'musculacao'),
(66, 'Rosca Invertida', 'Para executar o Rosca invertida: Segure a barra do halter com os braços estendidos; use uma pegada com o dorso das mãos voltados para cima e com afastamento igual à distância entre os ombros. Eleve a barra até o nível dos ombros, rosqueando os punhos para cima e para trás enquanto flexiona os cotovelos. Abaixe a barra até a posição de braços estendidos, deixando que os punhos “caiam”. ', 'Antebraço', 'musculacao'),
(67, 'Rosca Punho', 'Para executar o Rosca punho: Sentado na extremidade do banco, faça a pegada na barra com o dorso das mãos voltado para baixo, mãos afastadas na distância entre os ombros e repouse a parte dorsal dos antebraços nas coxas. Abaixe a barra dobrando os punhos para baixo, na direção do chão. Faça a rosca (peso para cima) utilizando o movimento dos punhos. ', 'Antebraço', 'musculacao'),
(68, 'Rosca Punho Invertida', 'Para executar a Rosca punho invertida: Pegue a barra usando pegada com o dorso das mãos voltado para cima e repouse os antebraços no alto das coxas ou na borda do banco. Abaixe a barra dobrando os punhos na direção do chão. Levante o peso utilizando o movimento dos punhos.', 'Antebraço', 'musculacao'),
(69, 'Abdominal', 'Coloque os pés embaixo da almofada e sente no banco declinado com o torso ereto.\r\nAbaixe o torso para trás até que fique praticamente paralelo ao chão.\r\nRetorna a posição vertical, dobrando na cintura.\r\n', 'Abdome', 'musculacao'),
(70, 'Abdominal Grupado', ' Deite-se de costas no chão, com os quadris dobrados a 90 graus e as mãos atrás da cabeça. Eleve os ombros do chão, comprimindo o peito para frente e mantendo a região lombar em contato com o chão. Abaixe os ombros de volta à posição inicial. ', 'Abdome', 'musculacao'),
(71, 'Abdominal Grupado Com Corda', 'Para executar o Abdominal grupado com corda: Ajoelhe no chão embaixo de uma polia alta e segure a corda com as duas mãos, atrás da cabeça. Puxe o peso para baixo, encurvando o torso e inclinando a cintura. Retorne a posição inicial. ', 'Abdome', 'musculacao'),
(72, 'Abdominal Grupado Com Aparelho', 'Para realizar o Abdominal grupado com aparelho:\r\nSente-se no assento, segure os pegadores e coloque os pés sob os rolos de tornozelo.\r\nFaça o abdominal inclinando o torso na direção dos joelhos.\r\nRetorne a posição vertical.\r\n', 'Abdome', 'musculacao'),
(73, 'Elevação De Pernas Corpo Inclinado', 'Para executar o Elevação de pernas corpo inclinado:\r\nDeite-se de costas em um banco abdominal inclinado, com as pernas para baixo.\r\nLevante as pernas (nos quadris) e impulsione as coxas na direção do peito, mantendo os joelhos ligeiramente dobrados.\r\nAbaixe lentamente as pernas de volta à posição inicial.\r\n', 'Abdome', 'musculacao'),
(74, 'Elevação De Pernas Na Barra', 'Para executar o Elevação de pernas na barra: Pendure-se com as mãos em uma barra, ou coloque os cotovelos em um par de AB Slings (protetores que se prendem à barra para sustentar o peso do corpo); as pernas ficam livremente pendentes. Levante simultaneamente os joelhos, ligeiramente dobrados, na direção do peito. Abaixe lentamente as pernas de volta à posição inicial, sem balançar. ', 'Abdome', 'musculacao'),
(75, 'Elevação De Joelhos', 'Para executar a elevação de joelhos: Sente-se na extremidade de um banco horizontal, com as pernas pendendo e os joelhos ligeiramente dobrados, e agarre o banco atrás de você. Levante os joelhos na direção do peito, mantendo as pernas juntas. Abaixe as pernas, até que os calcanhares praticamente toquem o chão. ', 'Abdome', 'musculacao'),
(76, 'Abdominal Grupado Invertido', 'Para executar o Abdominal grupado invertido, deite-se em um banco horizontal, posicione os pés de modo a fazer 90 graus com os joelhos e quadris e agarre o banco atrás da cabeça para apoio. Levante a pelve (afastando-a do banco) até que os pés apontem para o teto. Abaixe as pernas de volta para posição inicial.', 'Abdome', 'musculacao'),
(77, 'Pullover', 'Deite-se com a parte superior das costas repousando transversalmente em um banco horizontal; segure um halter fixo diretamente acima de seu tórax.\r\nMovimente o halter para baixo e para trás, até atingir o nível do banco, inspirando profundamente e alongando o gradil costal.\r\nRetorne o peso até a posição vertical, expirando ao fazê-lo.\r\nOBS:Este não é um exercício específico para os músculos do peitoral. Está incluído nessa seção porque o peitoral é bem trabalhado, mas poderia ser encaixado na seção de abdome ou de costas. ', 'Peitoral', 'musculacao'),
(78, 'Inclinação Lateral Com Halter', 'Para executar a Inclinação lateral com halter:  Fique em pé, segurando um halter na mão esquerda; coloque a mão direita atrás da cabeça. Dobre o torso para o lado esquerdo, abaixando o halter na direção do joelho. Faça com que o torso fique novamente ereto, contraindo os músculos oblíquos direitos. ', 'Abdome', 'musculacao'),
(79, 'Abdominal Grupado Oblíquo', 'Para executar o Abdominal grupado oblíquo: Deite-se sobre o lado esquerdo, joelhos dobrados e juntos, mão direita atrás da cabeça. Levante lentamente o torso, contraindo os oblíquos do lado direito. Abaixe o torso até a posição inicial.', 'Abdome', 'musculacao'),
(80, 'Abdominal Grupado Oblíquo Com Cabo', 'Para executar o Abdominal grupado oblíquo com cabo:  Segure um pegador preso à polia alta de um aparelho de cabo. Faça o abdominal para baixo, direcionando o cotovelo para o joelho oposto. Retorne lentamente à posição inicial. ', 'Abdome', 'musculacao'),
(81, 'Abdominal Com Giro', 'Para fazer o abdominal com giro, sente-se no banco inclinado, enganche os pés por baixo da almofada, incline-se para trás e posicione as mãos atrás da cabeça. Ao fazer o abdominal, torça seu torso, direcionando o cotovelo direito ao joelho esquerdo. Abaixe de volta para a posição inicial Durante a próxima repetição, direcione o cotovelo esquerdo para o joelho direito. ', 'Abdome', 'musculacao'),
(82, 'Levantamento Frontal com Cabo', 'Para executar o Levantamento Frontal com Cabo: Com uma das mãos, segure o pegador preso a uma polia baixa, utilizando uma pegada pronada (palma das mãos para baixo). Virado de costas para a pilha de pesos, levante o cabo em um arco ascendente até o nível do ombro, mantendo o cotovelo rígido. Abaixe o cabo de volta até o nível da cintura. ', 'Ombro', 'musculacao'),
(83, 'Levantamento Frontal Com Barra', 'Para executar o levantamento frontal com barra: Utilizando uma pegada com o dorso das mãos voltado para cima e na largura dos ombros, segure um halter de barra á frente das coxas com os braços estendidos. Levante o halter para a frente e para cima até o nível dos olhos, mantendo os cotovelos rígidos. Abaixe o halter de volta às coxas. ', 'Ombro', 'musculacao'),
(84, 'Elevação Frontal Alternada', 'Para executar a elevação frontal alternada: Sentado com as costas eretas na extremidade de um banco de exercício, segure um par de halteres fixos aos lados do corpo com os braços estendidos; os polegares devem estar apontando para a frente. Levante um haltere para a frente até o nível do ombro, mantendo o cotovelo rígido. Abaixe o peso de volta para a posição inicial e repita com o outro halter.', 'Ombro', 'musculacao'),
(85, 'Desenvolvimento Com Barra', 'Para executar o Desenvolvimento com barra: Sentado num banco, faça a pegada na barra com afastamento das mãos igual à largura dos ombros; palmas das mãos voltadas para frente. Abaixe lentamente o peso (à frente), até que toque a parte superior do tórax. Impulsione verticalmente para cima até que ocorra bloqueio dos cotovelos. ', 'Ombro', 'musculacao'),
(86, 'Desenvolvimento Com Halter', 'Sentado em um banco, comece com os halteres fixos no nível do ombro, palmas das mãos voltadas para frente.\r\nImpulsione verticalmente para cima os halteres, até que ocorra bloqueio dos cotovelos.\r\nAbaixe os halteres de volta, até tocarem os ombros.', 'Ombro', 'musculacao'),
(87, 'Elevação Lateral Com Halter Inclinado', 'Segurando dois halteres com os braços estendidos, incline o corpo para a frente usando a cintura, mantendo as costas retas e a cabeça levantada.\r\nCom as palmas das mãos voltadas para dentro, levante os halteres para cima até o nível das orelhas, mantendo os cotovelos ligeiramente dobrados.\r\nAbaixe os halteres de volta à posição inicial.\r\n', 'Ombro', 'musculacao'),
(88, 'Elevação Lateral Com Cabo Inclinado', 'Com o pegador esquerdo na mão direita, e o direito na mão esquerda, fique em pé no meio, e em seguida, incline o corpo para a frente usando a cintura, com as costas retas e paralelas ao chão.\r\nLevante as mãos para cima em um arco até o nível dos ombros, de tal modeo que os cabos se cruzem.\r\nAbaixe os pegadores até a posição inicial, com a mão direita diretamente à frente do tornozelo esquerdo e a mão esquerda diretamente à frente do tornozelo esquerdo.\r\n', 'Ombro', 'musculacao'),
(89, 'Crossover Invertido', 'Para executar o Crossover Invertido: Utilizando uma pegada com os polegares apontando para cima, segure os pegadores presos a duas polias altas (pegador esquerdo na mão direita, pegador direito na mão esquerda), fique de pé em posição central, com as polias à sua frente. (Atenção: durante o cruzamento dos cabos para o tórax, as polias ficam atrás de seu corpo.) Impulsione as mãos para trás (e ligeiramente para baixo) em um arco, com os braços praticamente paralelos ao chão até que as mãos estejam alinhadas com os ombros (formando um T). Retorne os pegadores de volta à posição inicial, de modo que a mão direita fique diretamente à frente do ombro esquerdo, e a mão esquerda diretamente à frente do ombro direito. ', 'Ombro', 'musculacao'),
(90, 'Crucifixo Invertido No Aparelho', 'Para executar o Crucifixo invertido no aparelho: Sente-se de frente para o aparelho com o peito contra o encosto do banco e pegue os pegadores com o braço estendido ao nível do ombro.\r\nPuxe os pegadores para trás no arco mais distante possível, mantendo os cotovelos elevados e braços paralelos ao chão.\r\nRetorne os pegadores à posição inicial, diretamente à frente.\r\n', 'Ombro', 'musculacao'),
(91, 'Remada Alta Com Barra', 'Segure o halter comi os braços estendidos; use uma pegada com o dorso das mãos voltado para cima, braços afastados na largura dos ombros.\r\nTracione a barra do haltere verticalmente para cima, levantando os cotovelos até a altura do ombro.\r\nAbaixe lentamente a barra até a posição de braços estendidos.\r\n', 'Ombro', 'musculacao'),
(92, 'Elevação Lateral Com Halter', 'Para executar a Elevação Lateral Com Halter: Na posição em pé ereta, segure os halters com os braços estendidos. Levante os braços para fora e para os lados do corpo, até que os halteres atinjam o nível dos ombros. Abaixe os halteres de volta para os quadris.', 'Ombro', 'musculacao'),
(93, 'Elevação Lateral Cabo', 'Para executar a Elevação Lateral Cabo: Com uma das mãos, agarre o pegador preso a uma polia baixa. Levante a mão para fora, fazendo um arco amplo, até o nível do ombro, mantendo o cotovelo rígido. Abaixe o cabo de volta no nível da cintura.', 'Ombro', 'musculacao'),
(94, 'Elevação Lateral Aparelho', 'Para executar a elevação lateral aparelho:\r\nSente-se no aparelho com os cotovelos contra as almofadas protetoras e agarre os pegadores.\r\nLevante os cotovelos até o nível do ombro, braços paralelos ao chão.\r\nAbaixe os cotovelos de volta aos lados do corpo.\r\n', 'Ombro', 'musculacao'),
(95, 'Rotação Interna', 'Fique de pé, posicionado de lado com relação a uma polia de cabo ajustada à altura da cintura; agarre o pegador com a mão “de dentro” e com o polegar apontando para cima. Com o cotovelo mantido firmemente contra a cintura, puxe o pegador para dentro, passando à frente do seu corpo e mantendo o antebraço paralelo ao chão. Retorne lentamente o pegador de volta a posição inicial. ', 'Ombro', 'musculacao'),
(96, 'Rotação Externa', 'Fique de pé, posicionado de lado com relação a uma polia de cabo ajustada à altura da cintura; agarre o pegador com a mão “de fora” e com o polegar apontando para cima. Com o cotovelo mantido firmemente contra a cintura, movimente o pegador em um arco para fora, afastando-o do corpo e mantendo o antebraço paralelo ao chão. Retorne lentamente o pegador à posição inicial, em frente ao umbigo ', 'Ombro', 'musculacao'),
(97, 'Elevação Lateral Apoiado', 'Para executar a Elevação lateral apoiado:\r\nDeite-se de lado sobre um banco com o torso inclinado em 45 graus, apoiado pelo braço que está abaixo do corpo.\r\nUsando uma pegada com o dorso da mão voltado para cima, levante o halter até a altura da cabeça, mantendo o cotovelo bloqueado.\r\nAbaixe o peso, retornando=o até o nível da cintura.\r\n', 'Ombro', 'musculacao');

-- --------------------------------------------------------

--
-- Table structure for table `treino`
--

CREATE TABLE IF NOT EXISTS `treino` (
  `id` int(11) NOT NULL,
  `inicio` date NOT NULL,
  `fim` date DEFAULT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  `aluno_id` bigint(11) NOT NULL,
  `personal_id` bigint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `treino`
--

INSERT INTO `treino` (`id`, `inicio`, `fim`, `ativo`, `aluno_id`, `personal_id`) VALUES
(20, '2015-11-09', NULL, 0, 2, 1),
(21, '2015-11-10', NULL, 0, 2, 1),
(22, '2015-11-10', NULL, 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academia`
--
ALTER TABLE `academia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academia_has_pratica`
--
ALTER TABLE `academia_has_pratica`
  ADD PRIMARY KEY (`pratica_id`), ADD KEY `fk_academia_has_pratica_pratica1_idx` (`pratica_id`), ADD KEY `fk_academia_has_pratica_academia1_idx` (`academia_id`);

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
-- Indexes for table `avaliacao_marcada`
--
ALTER TABLE `avaliacao_marcada`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_avaliacao_marcada_personal1_idx` (`personal_id`), ADD KEY `fk_avaliacao_marcada_aluno1_idx` (`aluno_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`), ADD KEY `fk_execucao_treino1_idx` (`treino_id`,`treino_personal_id`,`treino_aluno_id`), ADD KEY `fk_execucao_academia_has_pratica1_idx` (`academia_has_pratica_pratica_id`);

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
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_mensagem_personal1_idx` (`personal_id`), ADD KEY `fk_mensagem_aluno1_idx` (`aluno_id`);

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
-- Indexes for table `pratica`
--
ALTER TABLE `pratica`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_pratica_categoria1_idx` (`categoria_id`);

--
-- Indexes for table `pratica_sv`
--
ALTER TABLE `pratica_sv`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `avaliacao_fis`
--
ALTER TABLE `avaliacao_fis`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `avaliacao_marcada`
--
ALTER TABLE `avaliacao_marcada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `codigo_acesso`
--
ALTER TABLE `codigo_acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dia`
--
ALTER TABLE `dia`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `execucao`
--
ALTER TABLE `execucao`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pratica`
--
ALTER TABLE `pratica`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `pratica_sv`
--
ALTER TABLE `pratica_sv`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `treino`
--
ALTER TABLE `treino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `academia_has_pratica`
--
ALTER TABLE `academia_has_pratica`
ADD CONSTRAINT `fk_academia_has_pratica_academia1` FOREIGN KEY (`academia_id`) REFERENCES `academia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_academia_has_pratica_pratica1` FOREIGN KEY (`pratica_id`) REFERENCES `pratica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `avaliacao_marcada`
--
ALTER TABLE `avaliacao_marcada`
ADD CONSTRAINT `fk_avaliacao_marcada_aluno1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_avaliacao_marcada_personal1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
ADD CONSTRAINT `fk_execucao_academia_has_pratica1` FOREIGN KEY (`academia_has_pratica_pratica_id`) REFERENCES `academia_has_pratica` (`pratica_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_execucao_treino1` FOREIGN KEY (`treino_id`) REFERENCES `treino` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gerente_has_academia`
--
ALTER TABLE `gerente_has_academia`
ADD CONSTRAINT `fk_gerente_has_academia_academia1` FOREIGN KEY (`academia_id`) REFERENCES `academia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_gerente_has_academia_gerente` FOREIGN KEY (`gerente_id`) REFERENCES `gerente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensagem`
--
ALTER TABLE `mensagem`
ADD CONSTRAINT `fk_mensagem_aluno1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_mensagem_personal1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
