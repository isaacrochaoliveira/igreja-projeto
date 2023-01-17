-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jan-2023 às 21:08
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
-- Banco de dados: `churchntlh`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` tinyint(4) NOT NULL,
  `cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `categorias` (
  `id_cat` tinyint(4) NOT NULL,
  `categorias` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `citacoes` (
  `id` tinyint(4) NOT NULL,
  `author` varchar(50) NOT NULL,
  `citacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `grupos_de_oracao` (
  `id` tinyint(4) NOT NULL,
  `id_criador` tinyint(4) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `descricao` text DEFAULT NULL,
  `pessoas_part` int(11) DEFAULT 0,
  `criado_em` date DEFAULT NULL,
  `hora_criado_em` time DEFAULT NULL,
  `fechado_em` datetime DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos_de_oracao`
--

INSERT INTO `grupos_de_oracao` (`id`, `id_criador`, `logo`, `title`, `descricao`, `pessoas_part`, `criado_em`, `hora_criado_em`, `fechado_em`, `ativo`) VALUES
(1, 8, 'grupo-de-intercessao.png', 'Grupo de Intercessão', 'Buscamos a face de Deus dia após dia, a bíblia nos fala orai sem cesar. Por que nós oramos? Simples! Você não pediria um ajuda para a única pessoa que consegue fazer aquilo que você tanto deseja?', 0, '2023-01-16', '00:53:32', '0000-00-00 00:00:00', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oracao`
--

CREATE TABLE `oracao` (
  `id_pray` tinyint(4) NOT NULL,
  `id_criador` tinyint(4) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text NOT NULL,
  `orando` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `oracao`
--

INSERT INTO `oracao` (`id_pray`, `id_criador`, `titulo`, `descricao`, `orando`) VALUES
(4, 8, 'Varoa', 'A Mulher Prudente vem do Senhor. Me ajudem em oração', 121),
(9, 10, 'Varão', 'Esposa, obedeça ao seu marido, como você obedece ao Senhor. Pois o marido tem autoridade sobre a esposa, assim como Cristo tem autoridade sobre a Igreja', 3),
(21, 4, 'Obrigado!', 'Me ajudem a agradecer meu Deus por tudo. Obrigado', 1),
(22, 9, 'Aqui é a Paula', 'Estou atualmente querendo entrar em um emprego, mas preciso saber se é da vontade do meu Pai. Me ajudem em oração, Obrigado!', 0),
(23, 11, 'Oração', 'Estou em processo de um relacionamento pessoal\r\n', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `oracao_relacionada_com_a_categoria`
--

CREATE TABLE `oracao_relacionada_com_a_categoria` (
  `id` tinyint(4) NOT NULL,
  `id_oracao` tinyint(4) DEFAULT NULL,
  `id_categoria` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(39, 23, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participando_do_grupo`
--

CREATE TABLE `participando_do_grupo` (
  `id` tinyint(4) NOT NULL,
  `id_usuario` tinyint(4) DEFAULT NULL,
  `id_grupo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` tinyint(4) NOT NULL,
  `id_cargo` tinyint(4) DEFAULT NULL,
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
  `horario_fim` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(11, 11, 'Latrel', '2004-07-23', 'M', '21316465464', 'latrel@gmail.com', 'latrel', '63c6adee0eb03.jpg', 'Namorando', 'S', '08:00:00', '18:30:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Índices para tabela `citacoes`
--
ALTER TABLE `citacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grupos_de_oracao`
--
ALTER TABLE `grupos_de_oracao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_criador` (`id_criador`);

--
-- Índices para tabela `oracao`
--
ALTER TABLE `oracao`
  ADD PRIMARY KEY (`id_pray`),
  ADD KEY `id_criador` (`id_criador`);

--
-- Índices para tabela `oracao_relacionada_com_a_categoria`
--
ALTER TABLE `oracao_relacionada_com_a_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_oracao` (`id_oracao`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `participando_do_grupo`
--
ALTER TABLE `participando_do_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `citacoes`
--
ALTER TABLE `citacoes`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `grupos_de_oracao`
--
ALTER TABLE `grupos_de_oracao`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `oracao`
--
ALTER TABLE `oracao`
  MODIFY `id_pray` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `oracao_relacionada_com_a_categoria`
--
ALTER TABLE `oracao_relacionada_com_a_categoria`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `participando_do_grupo`
--
ALTER TABLE `participando_do_grupo`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
