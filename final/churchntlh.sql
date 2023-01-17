-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Jan-2023 às 04:21
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `churchntlh`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `id_cargo` tinyint NOT NULL AUTO_INCREMENT,
  `cargo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `cargo`) VALUES
(1, 'Evangelista'),
(2, 'Pastor'),
(3, 'Presbítero'),
(4, 'Diácono'),
(5, 'Porteiro'),
(6, 'Auxiliar'),
(7, 'Missionário'),
(8, 'Apóstolo'),
(9, 'Tesoureira'),
(10, 'Sonoplasta'),
(11, 'FilmMaker'),
(12, 'Levita'),
(13, 'Faxineira'),
(14, 'Cozinheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_cat` tinyint NOT NULL AUTO_INCREMENT,
  `categorias` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_cat`, `categorias`) VALUES
(1, 'Espiritualidade'),
(2, 'Material'),
(3, 'Financeiro'),
(4, 'Emocional'),
(5, 'Sentimental'),
(6, 'Amadurecimento'),
(7, 'Confiança'),
(8, 'Relacionamentos'),
(9, 'Inimizade'),
(10, 'Desconfiança'),
(11, 'Inveja'),
(12, 'Cobiça'),
(13, 'Prova de Foto'),
(14, 'Processo'),
(15, 'Dificuldades'),
(16, 'Pensamentos Puros'),
(17, 'Casamento'),
(18, 'Divorcio'),
(19, 'Brigas Conjugais'),
(20, 'Brigas Familiares'),
(21, 'Brigas entre Irmãos'),
(22, 'Apostas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `citacoes`
--

DROP TABLE IF EXISTS `citacoes`;
CREATE TABLE IF NOT EXISTS `citacoes` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `citacao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `citacoes`
--

INSERT INTO `citacoes` (`id`, `author`, `citacao`) VALUES
(1, 'Paul Washer', 'A beleza da mulher não está no seu aspecto físico, mas no temor e na obediência a Deus'),
(2, 'Billy Graham', 'Deus nos deu duas mãos: uma para receber e outra para dar. Não somos cisternas feitas para acumular, somos canais feitos para compartilhar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_de_oracao`
--

DROP TABLE IF EXISTS `grupos_de_oracao`;
CREATE TABLE IF NOT EXISTS `grupos_de_oracao` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `id_criador` tinyint DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci,
  `pessoas_part` int DEFAULT '0',
  `criado_em` date DEFAULT NULL,
  `hora_criado_em` time DEFAULT NULL,
  `fechado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_criador` (`id_criador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `grupos_de_oracao`
--

INSERT INTO `grupos_de_oracao` (`id`, `id_criador`, `logo`, `title`, `descricao`, `pessoas_part`, `criado_em`, `hora_criado_em`, `fechado_em`) VALUES
(1, 8, 'grupo-de-intercessao.png', 'Grupo de Intercessão', 'Buscamos a face de Deus dia após dia, a bíblia nos fala orai sem cesar. Por que nós oramos? Simples! Você não pediria um ajuda para a única pessoa que consegue fazer aquilo que você tanto deseja?', 0, '2023-01-16', '00:53:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oracao`
--

DROP TABLE IF EXISTS `oracao`;
CREATE TABLE IF NOT EXISTS `oracao` (
  `id_pray` tinyint NOT NULL AUTO_INCREMENT,
  `id_criador` tinyint DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text NOT NULL,
  `orando` int DEFAULT '0',
  PRIMARY KEY (`id_pray`),
  KEY `id_criador` (`id_criador`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `oracao`
--

INSERT INTO `oracao` (`id_pray`, `id_criador`, `titulo`, `descricao`, `orando`) VALUES
(4, 8, 'Varoa', 'A Mulher Prudente vem do Senhor. Me ajudem em oração', 121),
(9, 10, 'Varão', 'Esposa, obedeça ao seu marido, como você obedece ao Senhor. Pois o marido tem autoridade sobre a esposa, assim como Cristo tem autoridade sobre a Igreja', 2),
(21, 4, 'Obrigado!', 'Me ajudem a agradecer meu Deus por tudo. Obrigado', 1),
(22, 9, 'Aqui é a Paula', 'Estou atualmente querendo entrar em um emprego, mas preciso saber se é da vontade do meu Pai. Me ajudem em oração, Obrigado!', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `oracao_relacionada_com_a_categoria`
--

DROP TABLE IF EXISTS `oracao_relacionada_com_a_categoria`;
CREATE TABLE IF NOT EXISTS `oracao_relacionada_com_a_categoria` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `id_oracao` tinyint DEFAULT NULL,
  `id_categoria` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_oracao` (`id_oracao`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `oracao_relacionada_com_a_categoria`
--

INSERT INTO `oracao_relacionada_com_a_categoria` (`id`, `id_oracao`, `id_categoria`) VALUES
(1, 4, 4),
(2, 4, 20),
(3, 4, 14),
(10, 9, 4),
(11, 9, 1),
(12, 9, 8),
(13, 9, 19),
(28, 21, 3),
(29, 21, 4),
(30, 21, 6),
(31, 21, 8),
(32, 22, 1),
(33, 22, 3),
(34, 22, 2),
(35, 22, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participando_do_grupo`
--

DROP TABLE IF EXISTS `participando_do_grupo`;
CREATE TABLE IF NOT EXISTS `participando_do_grupo` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `id_usuario` tinyint DEFAULT NULL,
  `id_grupo` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `id_cargo` tinyint DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  `nasc` date DEFAULT NULL,
  `sexo` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `perfil` varchar(40) DEFAULT 'sem-foto',
  `estado_civil` varchar(15) DEFAULT 'Solteiro',
  `trabalho` enum('S','N') DEFAULT 'N',
  `horario_inicio` time DEFAULT NULL,
  `horario_fim` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`),
  KEY `id_cargo` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_cargo`, `nome`, `nasc`, `sexo`, `cpf`, `email`, `senha`, `perfil`, `estado_civil`, `trabalho`, `horario_inicio`, `horario_fim`) VALUES
(1, 12, 'Paulão22', '2010-02-18', 'M', '12345678910', 'paulo@gmail.com', '123XyZ22419hJlM', 'sem-foto', 'Namorando', 'N', '00:00:00', '00:00:00'),
(2, 9, 'Ana', '1994-07-23', 'F', '7063192441', 'ana@gmail.com', 'e7f810', 'sem-foto', 'Solteiro', 'S', '13:00:00', '18:00:00'),
(3, 1, 'JOSE', '2023-01-03', 'M', '91028427324', 'josedo.egito@gmail.com', 'josezinho', 'sem-foto', 'Casado', 'N', '00:00:00', '00:00:00'),
(4, 12, 'Isaac Rocha', '2004-07-23', 'M', '70631871128', 'isaak.rocha137@gmail.com', 'XyZ22419hJlM', 'sem-foto', 'Solteiro', 'S', '08:00:00', '18:00:00'),
(5, 9, 'Maria', '1993-07-07', 'F', '12139839334', 'maria@123gmail.com', 'XyZ22419hJlM', 'http://localhost/sistemas/final/assets/i', 'Noivo', 'S', '07:30:00', '15:00:00'),
(6, 11, 'Marcos', '1986-01-23', 'M', '321456987', 'marcos_marcos@gmail.com', 'XyZ22419hJlM', '63bb1fe1e6e05.jpg', 'Casado', 'N', '00:00:00', '00:00:00'),
(7, 1, 'Val dos ossos secos', '2000-01-01', 'M', '122134435665', 'pai.amado@gmail.com', 'XyZ22419hJlM', '63bb209eee5a7.jpg', 'Casado', 'S', '00:00:00', '00:00:00'),
(8, 2, 'Marcos', '2004-07-23', 'M', '142154541010', 'negao_rocha@gmail.com', 'negao', '63bb214604be3.jpg', 'Casado', 'S', '08:00:00', '18:00:00'),
(9, 7, 'Paula', '2003-04-12', 'F', '77777777777', 'paulinha@gmail.com', 'ppp123', 'sem-foto.jpg', 'Namorando', 'N', '00:00:00', '00:00:00'),
(10, 12, 'CristHelly', '2013-06-12', 'F', '12213242352', 'crist@gmail.com', '1218', '63c375842db86.jpg', 'Namorando', 'N', '00:00:00', '00:00:00');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `grupos_de_oracao`
--
ALTER TABLE `grupos_de_oracao`
  ADD CONSTRAINT `grupos_de_oracao_ibfk_1` FOREIGN KEY (`id_criador`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `oracao`
--
ALTER TABLE `oracao`
  ADD CONSTRAINT `oracao_ibfk_1` FOREIGN KEY (`id_criador`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `oracao_relacionada_com_a_categoria`
--
ALTER TABLE `oracao_relacionada_com_a_categoria`
  ADD CONSTRAINT `oracao_relacionada_com_a_categoria_ibfk_1` FOREIGN KEY (`id_oracao`) REFERENCES `oracao` (`id_pray`),
  ADD CONSTRAINT `oracao_relacionada_com_a_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
