-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Jan-2023 às 03:34
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
  `cargo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estrutura da tabela `citacoes`
--

DROP TABLE IF EXISTS `citacoes`;
CREATE TABLE IF NOT EXISTS `citacoes` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `author` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `citacao` text COLLATE utf8mb4_general_ci,
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, 10, 'Negão', '2004-07-23', 'M', '70602791128', 'negao_rocha@gmail.com', 'negao', '63bb214604be3.jpg', 'Solteiro', 'S', '08:00:00', '18:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
