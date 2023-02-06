-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Jan-2023 às 16:35
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
-- Estrutura da tabela `anotacoes`
--

DROP TABLE IF EXISTS `anotacoes`;
CREATE TABLE IF NOT EXISTS `anotacoes` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `id_group` tinyint DEFAULT NULL,
  `anotacao` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `id_group` (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `anotacoes`
--

INSERT INTO `anotacoes` (`id`, `id_group`, `anotacao`) VALUES
(10, 36, 'Mais uma');

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
-- Estrutura da tabela `comentarios_grupos`
--

DROP TABLE IF EXISTS `comentarios_grupos`;
CREATE TABLE IF NOT EXISTS `comentarios_grupos` (
  `id_comment` tinyint NOT NULL AUTO_INCREMENT,
  `id_comentador` tinyint DEFAULT NULL,
  `id_grupo` tinyint DEFAULT NULL,
  `comentario` text COLLATE utf8mb4_general_ci,
  `pessoas_curtiram` int DEFAULT NULL,
  `data_comment` date DEFAULT NULL,
  `hora_comment` time DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_comentador` (`id_comentador`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `comentarios_grupos`
--

INSERT INTO `comentarios_grupos` (`id_comment`, `id_comentador`, `id_grupo`, `comentario`, `pessoas_curtiram`, `data_comment`, `hora_comment`) VALUES
(1, 10, 36, 'Olá, Mundo!', 0, '2023-01-30', '13:46:30'),
(2, 10, 36, 'Meu 2º Comentário!', 0, '2023-01-30', '14:21:03'),
(3, 8, 36, 'Deixei meu comentário aqui', 0, '2023-01-30', '13:29:37'),
(4, 8, 2, 'Eu não sou mulher, mas sorte terá aquela que me encontrar!', 0, '2023-01-30', '13:30:52'),
(5, 2, 36, 'Nossa que forte esse grupo! Acordarei todo dia!', 0, '2023-01-30', '13:31:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emproposito_na_oracao`
--

DROP TABLE IF EXISTS `emproposito_na_oracao`;
CREATE TABLE IF NOT EXISTS `emproposito_na_oracao` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `id_usuario` tinyint DEFAULT NULL,
  `id_oracao` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_oracao` (`id_oracao`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `emproposito_na_oracao`
--

INSERT INTO `emproposito_na_oracao` (`id`, `id_usuario`, `id_oracao`) VALUES
(22, 11, 9),
(23, 11, 4),
(24, 4, 23),
(25, NULL, 23),
(32, 11, 24),
(33, 11, 23),
(34, 4, 9),
(35, 12, 4),
(36, 8, 9),
(37, 10, 4),
(39, 10, 9),
(40, 10, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_de_oracao`
--

DROP TABLE IF EXISTS `grupos_de_oracao`;
CREATE TABLE IF NOT EXISTS `grupos_de_oracao` (
  `id_group` tinyint NOT NULL AUTO_INCREMENT,
  `id_criador` tinyint DEFAULT NULL,
  `id_licenca` tinyint DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `descricao` text,
  `pessoas_part` int DEFAULT '0',
  `criado_em` date DEFAULT NULL,
  `hora_criado_em` time DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT 'S',
  `fechadoEm` date DEFAULT NULL,
  `hora_fechadoEm` time DEFAULT NULL,
  PRIMARY KEY (`id_group`),
  KEY `id_criador` (`id_criador`),
  KEY `id_licenca` (`id_licenca`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `grupos_de_oracao`
--

INSERT INTO `grupos_de_oracao` (`id_group`, `id_criador`, `id_licenca`, `logo`, `title`, `descricao`, `pessoas_part`, `criado_em`, `hora_criado_em`, `ativo`, `fechadoEm`, `hora_fechadoEm`) VALUES
(1, 8, NULL, '63d1cb40584b4.jpg', 'Grupo de Intercessão', 'Buscamos a face de Deus dia após dia, a bíblia nos fala orai sem cesar. Por que nós oramos? Simples! Você não pediria um ajuda para a única pessoa que consegue fazer aquilo que você tanto deseja?', 18, '2023-01-16', '00:53:32', 'S', NULL, NULL),
(2, 10, 1, '63ac6ec8ee488.png', 'Oração para as Solteiras', 'Eu vim para orar pelo meu futuro marido, porque eu vim com sapatinho de fogo (nós viemos)', 15, '2023-01-18', '23:52:15', 'S', NULL, NULL),
(36, 10, 2, '63d54329a96ec.jpg', 'Sabedoria e Prudência', 'Pv - Eu amo os que me amam, e os que de madrugada me buscam me acharão', 0, '2023-01-28', '13:37:01', 'S', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `licenca`
--

DROP TABLE IF EXISTS `licenca`;
CREATE TABLE IF NOT EXISTS `licenca` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `nome_da_licenca` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_da_licenca` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `licenca`
--

INSERT INTO `licenca` (`id`, `nome_da_licenca`, `descricao_da_licenca`) VALUES
(1, 'EVAN', 'A Licença EVAN é baseada na estutura de devocional completo. Onde nós, evangélicos não acreditamos que existe um horario expecifíco para orar'),
(2, 'NONE', 'Livre de Qualquer Preocupação');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `oracao`
--

INSERT INTO `oracao` (`id_pray`, `id_criador`, `titulo`, `descricao`, `orando`) VALUES
(4, 8, 'Varoa', 'A Mulher Prudente vem do Senhor. Me ajudem em oração', 124),
(9, 10, 'Varão', 'Esposa, obedeça ao seu marido, como você obedece ao Senhor. Pois o marido tem autoridade sobre a esposa, assim como Cristo tem autoridade sobre a Igreja', 0),
(21, 4, 'Obrigado!', 'Me ajudem a agradecer meu Deus por tudo. Obrigado', 1),
(22, 9, 'Aqui é a Paula', 'Estou atualmente querendo entrar em um emprego, mas preciso saber se é da vontade do meu Pai. Me ajudem em oração, Obrigado!', 6),
(23, 11, 'Oração', 'Estou em processo de um relacionamento pessoal\r\n', 4),
(24, 11, 'Salmos 125:1', 'Me ajude a orar a ficar mais parecido com o Monte Sião. Além disso, quando vocês orarem ao meu favor, automaticamente Deus vai pelejar ao seu favor', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(35, 22, 14),
(36, 23, 14),
(37, 23, 4),
(38, 23, 6),
(39, 23, 1),
(40, 24, 6),
(41, 24, 4),
(42, 24, 3),
(43, 24, 15);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regras_do_grupo`
--

DROP TABLE IF EXISTS `regras_do_grupo`;
CREATE TABLE IF NOT EXISTS `regras_do_grupo` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `id_grupo` tinyint DEFAULT NULL,
  `_regras1` text COLLATE utf8mb4_general_ci,
  `_regras2` text COLLATE utf8mb4_general_ci,
  `_regras3` text COLLATE utf8mb4_general_ci,
  `_regras4` text COLLATE utf8mb4_general_ci,
  `_regras5` text COLLATE utf8mb4_general_ci,
  `_regras6` text COLLATE utf8mb4_general_ci,
  `_regras7` text COLLATE utf8mb4_general_ci,
  `_regras8` text COLLATE utf8mb4_general_ci,
  `_regras9` text COLLATE utf8mb4_general_ci,
  `_regras10` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `regras_do_grupo`
--

INSERT INTO `regras_do_grupo` (`id`, `id_grupo`, `_regras1`, `_regras2`, `_regras3`, `_regras4`, `_regras5`, `_regras6`, `_regras7`, `_regras8`, `_regras9`, `_regras10`) VALUES
(1, 2, 'Ler Mais', 'Olá Mundo!', 'Anotar as qualidades que você quer no seu ungido!', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá'),
(18, 2, 'Ler Mais', 'Olá Mundo!', 'Anotar as qualidades que você quer no seu ungido!', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá'),
(19, 2, 'Ler Mais', 'Olá Mundo!', 'Anotar as qualidades que você quer no seu ungido!', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá'),
(20, 2, 'Ler Mais', 'Olá Mundo!', 'Anotar as qualidades que você quer no seu ungido!', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá', 'Olá'),
(21, 36, 'Orar de Madrugada', 'Ler de Madrugada', 'Às 3:00', 'Um dia sim e um não (todo dia, se você der conta))', 'Jejum 1 por Semana', NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_cargo`, `nome`, `nasc`, `sexo`, `cpf`, `email`, `senha`, `perfil`, `estado_civil`, `trabalho`, `horario_inicio`, `horario_fim`) VALUES
(1, 12, 'Paulão22', '2010-02-18', 'M', '12345678910', 'paulo@gmail.com', '123XyZ22419hJlM', 'sem-foto', 'Namorando', 'N', '00:00:00', '00:00:00'),
(2, 9, 'Ana', '1994-07-23', 'F', '7063192441', 'ana@gmail.com', 'e7f810', 'sem-foto', 'Solteiro', 'S', '13:00:00', '18:00:00'),
(3, 1, 'JOSE', '2023-01-03', 'M', '91028427324', 'josedo.egito@gmail.com', 'josezinho', 'sem-foto', 'Casado', 'N', '00:00:00', '00:00:00'),
(4, 12, 'Isaac Rocha', '2004-07-23', 'M', '70631871128', 'isaak.rocha137@gmail.com', 'XyZ22419hJlM', 'sem-foto.jpg', 'Solteiro', 'S', '08:00:00', '18:00:00'),
(5, 9, 'Maria', '1993-07-07', 'F', '12139839334', 'maria@123gmail.com', 'XyZ22419hJlM', 'http://localhost/sistemas/final/assets/i', 'Noivo', 'S', '07:30:00', '15:00:00'),
(6, 11, 'Marcos', '1986-01-23', 'M', '321456987', 'marcos_marcos@gmail.com', 'XyZ22419hJlM', '63bb1fe1e6e05.jpg', 'Casado', 'N', '00:00:00', '00:00:00'),
(7, 1, 'Val dos ossos secos', '2000-01-01', 'M', '122134435665', 'pai.amado@gmail.com', 'XyZ22419hJlM', '63bb209eee5a7.jpg', 'Casado', 'S', '00:00:00', '00:00:00'),
(8, 2, 'Marcos', '2004-07-23', 'M', '142154541010', 'negao_rocha@gmail.com', 'negao', '63bb214604be3.jpg', 'Casado', 'S', '08:00:00', '18:00:00'),
(9, 7, 'Paula', '2003-04-12', 'F', '77777777777', 'paulinha@gmail.com', 'ppp123', 'sem-foto.jpg', 'Namorando', 'N', '00:00:00', '00:00:00'),
(10, 12, 'CristHelly', '2013-06-12', 'F', '12213242352', 'crist@gmail.com', '1218', '63c375842db86.jpg', 'Namorando', 'N', '00:00:00', '00:00:00'),
(11, 11, 'Latrel', '2004-07-23', 'M', '21316465464', 'latrel@gmail.com', 'latrel', '63c6adee0eb03.jpg', 'Namorando', 'S', '08:00:00', '18:30:00'),
(12, 6, 'Mickaelle', '1993-10-05', 'F', '291804933019', 'mick@gmail.com', 'protegida', '63cc4531b77ca.png', 'Solteiro', 'S', '09:00:00', '18:30:00');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anotacoes`
--
ALTER TABLE `anotacoes`
  ADD CONSTRAINT `anotacoes_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `grupos_de_oracao` (`id_group`);

--
-- Limitadores para a tabela `comentarios_grupos`
--
ALTER TABLE `comentarios_grupos`
  ADD CONSTRAINT `comentarios_grupos_ibfk_1` FOREIGN KEY (`id_comentador`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarios_grupos_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupos_de_oracao` (`id_group`);

--
-- Limitadores para a tabela `emproposito_na_oracao`
--
ALTER TABLE `emproposito_na_oracao`
  ADD CONSTRAINT `emproposito_na_oracao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `emproposito_na_oracao_ibfk_2` FOREIGN KEY (`id_oracao`) REFERENCES `oracao` (`id_pray`);

--
-- Limitadores para a tabela `grupos_de_oracao`
--
ALTER TABLE `grupos_de_oracao`
  ADD CONSTRAINT `grupos_de_oracao_ibfk_1` FOREIGN KEY (`id_criador`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `grupos_de_oracao_ibfk_2` FOREIGN KEY (`id_licenca`) REFERENCES `licenca` (`id`);

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

--
-- Limitadores para a tabela `regras_do_grupo`
--
ALTER TABLE `regras_do_grupo`
  ADD CONSTRAINT `regras_do_grupo_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos_de_oracao` (`id_group`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
