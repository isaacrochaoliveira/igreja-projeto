-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Mar-2023 às 13:49
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `anotacoes_pastor`
--

DROP TABLE IF EXISTS `anotacoes_pastor`;
CREATE TABLE IF NOT EXISTS `anotacoes_pastor` (
  `id_anotacao_pastor` tinyint NOT NULL AUTO_INCREMENT,
  `id_criador_anotacao` tinyint DEFAULT NULL,
  `id_pastor` tinyint DEFAULT NULL,
  `texto_anotacao` text COLLATE utf8mb4_general_ci,
  `data_anotacao` date DEFAULT NULL,
  `hora_anotacao` time DEFAULT NULL,
  PRIMARY KEY (`id_anotacao_pastor`),
  KEY `id_criador_anotacao` (`id_criador_anotacao`),
  KEY `id_pastor` (`id_pastor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `anotacoes_pastor`
--

INSERT INTO `anotacoes_pastor` (`id_anotacao_pastor`, `id_criador_anotacao`, `id_pastor`, `texto_anotacao`, `data_anotacao`, `hora_anotacao`) VALUES
(2, NULL, 3, 'djkfnldkjsfnajkdfnkdsn', '2023-02-09', '23:04:05'),
(3, NULL, 3, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-02-09', '23:11:15'),
(4, NULL, 6, 'Olá. Eu sou o Pastor Teste!', '2023-02-09', '23:15:56'),
(5, NULL, 1, 'T1', '2023-02-09', '00:12:51'),
(6, NULL, 1, 'T2', '2023-02-11', '09:38:19'),
(7, NULL, 1, 'LOREM Y', '2023-02-11', '18:17:29'),
(8, NULL, 10, 'Bem-aventurado o homem que não anda segundo o conselho dos ímpios, nem se detém no caminho dos pecadores, nem se assenta na roda dos escarnecedores.\r\nAntes tem o seu prazer na lei do Senhor, e na sua lei medita de dia e de noite.\r\nPois será como a árvore plantada junto a ribeiros de águas, a qual dá o seu fruto no seu tempo; as suas folhas não cairão, e tudo quanto fizer prosperará.\r\nNão são assim os ímpios; mas são como a moinha que o vento espalha.\r\nPor isso os ímpios não subsistirão no juízo, nem os pecadores na congregação dos justos.\r\nPorque o Senhor conhece o caminho dos justos; porém o caminho dos ímpios perecerá.', '2023-02-12', '21:55:43'),
(9, NULL, 3, 'Meu Amigo Espírito Santo! Entrego em Tuas mãos a minha causa sobre', '2023-02-13', '19:56:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anotacoes_pastora`
--

DROP TABLE IF EXISTS `anotacoes_pastora`;
CREATE TABLE IF NOT EXISTS `anotacoes_pastora` (
  `id_anotacao_pastora` tinyint NOT NULL AUTO_INCREMENT,
  `id_pastora` tinyint DEFAULT NULL,
  `texto_anotacao_pastora` text COLLATE utf8mb4_general_ci,
  `data_anotacao_pastora` date DEFAULT NULL,
  `hora_anotacao_pastora` time DEFAULT NULL,
  PRIMARY KEY (`id_anotacao_pastora`),
  KEY `id_pastora` (`id_pastora`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `anotacoes_pastora`
--

INSERT INTO `anotacoes_pastora` (`id_anotacao_pastora`, `id_pastora`, `texto_anotacao_pastora`, `data_anotacao_pastora`, `hora_anotacao_pastora`) VALUES
(1, 1, 'Olá, Meu nome é Ana', '2023-02-12', '12:41:44'),
(2, 1, 'Olá, Minha 2º Anotação', '2023-02-12', '12:44:12'),
(3, 1, 'Minha 3 anotação', '2023-02-12', '12:50:27'),
(4, 1, 'Mais uma anotação  4 ', '2023-02-12', '12:51:30'),
(5, 1, '5 Anotações', '2023-02-12', '12:53:37'),
(6, 1, '6 Anotação - 12:55', '2023-02-12', '12:55:37'),
(7, 1, 'Tava mexendo no Ajax errado', '2023-02-12', '12:57:36'),
(9, 2, 'Eis que vos envio como ovelhas ao meio de lobos; portanto, sede prudentes como as serpentes e inofensivos como as pombas.', '2023-02-12', '22:05:54'),
(10, 1, 'Eu sou a Pastora Ana! Oiiiii!', '2023-03-02', '22:02:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `id_cargo` tinyint NOT NULL AUTO_INCREMENT,
  `cargo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `citacoes`
--

INSERT INTO `citacoes` (`id`, `author`, `citacao`) VALUES
(1, 'Paul Washer', 'A beleza da mulher não está no seu aspecto físico, mas no temor e na obediência a Deus'),
(2, 'Billy Graham', 'Deus nos deu duas mãos: uma para receber e outra para dar. Não somos cisternas feitas para acumular, somos canais feitos para compartilhar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborando_jejum`
--

DROP TABLE IF EXISTS `colaborando_jejum`;
CREATE TABLE IF NOT EXISTS `colaborando_jejum` (
  `id_colab` tinyint NOT NULL AUTO_INCREMENT,
  `id_colaborando` tinyint DEFAULT NULL,
  `id_colaborando_jejum` tinyint DEFAULT NULL,
  `data_colaboracao` date DEFAULT NULL,
  `hora_colaboracao` time DEFAULT NULL,
  PRIMARY KEY (`id_colab`),
  KEY `id_colaborando` (`id_colaborando`),
  KEY `id_colaborando_jejum` (`id_colaborando_jejum`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `colaborando_jejum`
--

INSERT INTO `colaborando_jejum` (`id_colab`, `id_colaborando`, `id_colaborando_jejum`, `data_colaboracao`, `hora_colaboracao`) VALUES
(2, 10, 1, '2023-03-08', '21:03:21');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `comentarios_grupos`
--

INSERT INTO `comentarios_grupos` (`id_comment`, `id_comentador`, `id_grupo`, `comentario`, `pessoas_curtiram`, `data_comment`, `hora_comment`) VALUES
(1, 10, 36, 'Olá, Mundo!', 0, '2023-01-30', '13:46:30'),
(2, 10, 36, 'Meu 2º Comentário!', 0, '2023-01-30', '14:21:03'),
(3, 8, 36, 'Deixei meu comentário aqui', 0, '2023-01-30', '13:29:37'),
(4, 8, 2, 'Eu não sou mulher, mas sorte terá aquela que me encontrar!', 0, '2023-01-30', '13:30:52'),
(5, 2, 36, 'Nossa que forte esse grupo! Acordarei todo dia!', 0, '2023-01-30', '13:31:50'),
(6, 8, 1, 'Meu 1° Comentário', 0, '2023-02-02', '06:28:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint DEFAULT NULL,
  `phonecode` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(40, 10, 22),
(41, 2, 9),
(42, 2, 4),
(43, 8, 4),
(44, 8, 21),
(45, 10, 9),
(47, 1, 4),
(48, 1, 9),
(49, 10, 21);

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `grupos_de_oracao`
--

INSERT INTO `grupos_de_oracao` (`id_group`, `id_criador`, `id_licenca`, `logo`, `title`, `descricao`, `pessoas_part`, `criado_em`, `hora_criado_em`, `ativo`, `fechadoEm`, `hora_fechadoEm`) VALUES
(1, 8, NULL, '63d1cb40584b4.jpg', 'Grupo de Intercessão', 'Buscamos a face de Deus dia após dia, a bíblia nos fala orai sem cesar. Por que nós oramos? Simples! Você não pediria um ajuda para a única pessoa que consegue fazer aquilo que você tanto deseja?', 19, '2023-01-16', '00:53:32', 'S', NULL, NULL),
(2, 10, 1, '63ac6ec8ee488.png', 'Oração para as Solteiras', 'Eu vim para orar pelo meu futuro marido, porque eu vim com sapatinho de fogo (nós viemos)', 15, '2023-01-18', '23:52:15', 'S', NULL, NULL),
(36, 10, 2, '63d54329a96ec.jpg', 'Sabedoria e Prudência', 'Pv - Eu amo os que me amam, e os que de madrugada me buscam me acharão', 0, '2023-01-28', '13:37:01', 'S', NULL, NULL),
(37, 3, 1, 'sem-foto.jpg', 'Grupos de Pastores', 'Grupo de Pastores para estudarmos a palavra de Deus, e assim, ajudarmos nossos membros1', 0, '2023-02-09', '01:37:02', 'S', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jejuns`
--

DROP TABLE IF EXISTS `jejuns`;
CREATE TABLE IF NOT EXISTS `jejuns` (
  `id_jejum` tinyint NOT NULL AUTO_INCREMENT,
  `id_criador_jejum` tinyint DEFAULT NULL,
  `pastor_comando` tinyint DEFAULT NULL,
  `pastora_comando` tinyint DEFAULT NULL,
  `imagem` varchar(70) COLLATE utf8mb4_general_ci DEFAULT 'sem-foto.jpg',
  `jejum` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_jejum` text COLLATE utf8mb4_general_ci,
  `versiculo_baseado` text COLLATE utf8mb4_general_ci,
  `colaboracao` int DEFAULT NULL,
  `quantidade_pessoas` int DEFAULT '0',
  `data_jejum` date DEFAULT NULL,
  `hora_jejum` time DEFAULT NULL,
  PRIMARY KEY (`id_jejum`),
  KEY `pastor_comando` (`pastor_comando`),
  KEY `pastora_comando` (`pastora_comando`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `jejuns`
--

INSERT INTO `jejuns` (`id_jejum`, `id_criador_jejum`, `pastor_comando`, `pastora_comando`, `imagem`, `jejum`, `descricao_jejum`, `versiculo_baseado`, `colaboracao`, `quantidade_pessoas`, `data_jejum`, `hora_jejum`) VALUES
(1, 10, 10, NULL, '1102016074_univ_cnt_2_xl.jpg', 'Jejum de Daniel', 'O Jejum de Daniel é para gente se aproximar de Deus e nos abundarmos na Tua presença', 'Daniel 3:3', 1, 0, '2023-02-13', '20:34:35'),
(2, 8, NULL, 1, 'sem-foto.jpg', 'Jejum de Ester', 'O Jejum ', 'Ester 1:1', 0, 0, '2023-01-15', '22:15:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `oracao`
--

INSERT INTO `oracao` (`id_pray`, `id_criador`, `titulo`, `descricao`, `orando`) VALUES
(4, 8, 'Varoa', 'A Mulher Prudente vem do Senhor. Me ajudem em oração', 127),
(9, 10, 'Varão', 'Esposa, obedeça ao seu marido, como você obedece ao Senhor. Pois o marido tem autoridade sobre a esposa, assim como Cristo tem autoridade sobre a Igreja', 1),
(21, 4, 'Obrigado!', 'Me ajudem a agradecer meu Deus por tudo. Obrigado', 3),
(22, 9, 'Aqui é a Paula', 'Estou atualmente querendo entrar em um emprego, mas preciso saber se é da vontade do meu Pai. Me ajudem em oração, Obrigado!', 6),
(23, 11, 'Oração', 'Estou em processo de um relacionamento pessoal\r\n', 4),
(24, 11, 'Salmos 125:1', 'Me ajude a orar a ficar mais parecido com o Monte Sião. Além disso, quando vocês orarem ao meu favor, automaticamente Deus vai pelejar ao seu favor', 0),
(25, 10, 'Prosperidade', 'Prosperidade é ter tudo aquilo para fazer o nosso propósito na terra', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(43, 24, 15),
(44, 25, 1),
(45, 25, 4),
(46, 25, 14),
(47, 25, 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `participando_do_grupo`
--

INSERT INTO `participando_do_grupo` (`id`, `id_usuario`, `id_grupo`) VALUES
(25, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participando_do_jejum`
--

DROP TABLE IF EXISTS `participando_do_jejum`;
CREATE TABLE IF NOT EXISTS `participando_do_jejum` (
  `id_part_jejum` tinyint NOT NULL AUTO_INCREMENT,
  `id_participante` tinyint DEFAULT NULL,
  `id_jejum_part` tinyint DEFAULT NULL,
  `data_participa` date DEFAULT NULL,
  `hora_participa` time DEFAULT NULL,
  PRIMARY KEY (`id_part_jejum`),
  KEY `id_participante` (`id_participante`),
  KEY `id_jejum_part` (`id_jejum_part`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pastoras`
--

DROP TABLE IF EXISTS `pastoras`;
CREATE TABLE IF NOT EXISTS `pastoras` (
  `id_pas_ras` tinyint NOT NULL AUTO_INCREMENT,
  `id_insersor_pas` tinyint DEFAULT NULL,
  `perfil_pas_ras` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nome_pas_ras` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bio_pas_ras` text COLLATE utf8mb4_general_ci,
  `nascionalidade_pas_ras` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Brasil',
  `tempo_pas_ras` int NOT NULL,
  `telefone_pas_ras` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_pas_ras` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profissao_pas_ras` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ministerio_pas_ras` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `casado_pas_ras` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qunt_casado_pas_ras` int DEFAULT NULL,
  `qunt_menbros_pas_ras` int DEFAULT NULL,
  `data_cadastro_pas_ras` date DEFAULT NULL,
  `hora_cadastro_pas_ras` time DEFAULT NULL,
  PRIMARY KEY (`id_pas_ras`),
  KEY `id_insersor_pas` (`id_insersor_pas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pastoras`
--

INSERT INTO `pastoras` (`id_pas_ras`, `id_insersor_pas`, `perfil_pas_ras`, `nome_pas_ras`, `bio_pas_ras`, `nascionalidade_pas_ras`, `tempo_pas_ras`, `telefone_pas_ras`, `email_pas_ras`, `profissao_pas_ras`, `ministerio_pas_ras`, `casado_pas_ras`, `qunt_casado_pas_ras`, `qunt_menbros_pas_ras`, `data_cadastro_pas_ras`, `hora_cadastro_pas_ras`) VALUES
(1, 8, '63e97cbee6829.jpg', 'Ana', 'Bem aventurado aquele que tem controle emocional', 'Brazil', 23, '62986964578', 'ana@gmail.com', 'Contadora', 'Lagoinha', 'Casada', 3, 120, '2023-02-12', '21:13:40'),
(2, 8, '63e98d084fa3b.webp', 'Maria Alice', 'Maria Alice', 'France', 10, '62996567587', 'alicemaria@gmail.com', 'Kiroprasta', 'Lagoinha', 'Casada', 3, 158, '2023-02-12', '22:09:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pastores`
--

DROP TABLE IF EXISTS `pastores`;
CREATE TABLE IF NOT EXISTS `pastores` (
  `id_pas` tinyint NOT NULL AUTO_INCREMENT,
  `id_insersor` tinyint DEFAULT NULL,
  `perfil_pas` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nome_pas` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bio_pas` text COLLATE utf8mb4_general_ci,
  `nasionalidade_pas` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Brasil',
  `tempo_pas` int DEFAULT '0',
  `telefone_pas` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_pas` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profissao_pas` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ministerio_pas` varchar(70) COLLATE utf8mb4_general_ci DEFAULT 'Ministério de Anápolis',
  `casado_pas` enum('Casado','Noivo','Solteiro','Namorando','Divorciado','Viúvo','Separado') COLLATE utf8mb4_general_ci DEFAULT 'Casado',
  `qunt_casado_pas` tinyint DEFAULT '10',
  `qunt_menbros_pas` int DEFAULT NULL,
  `data_cadastro_pas` date DEFAULT NULL,
  `hora_cadastro_pas` time DEFAULT NULL,
  PRIMARY KEY (`id_pas`),
  KEY `id_insersor` (`id_insersor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pastores`
--

INSERT INTO `pastores` (`id_pas`, `id_insersor`, `perfil_pas`, `nome_pas`, `bio_pas`, `nasionalidade_pas`, `tempo_pas`, `telefone_pas`, `email_pas`, `profissao_pas`, `ministerio_pas`, `casado_pas`, `qunt_casado_pas`, `qunt_menbros_pas`, `data_cadastro_pas`, `hora_cadastro_pas`) VALUES
(1, 3, '63e5aec150235.jpg', 'Edvaldo', 'Olá, Meu nome é Edvaldo! Estou nesse cargo há mais de 5 anos', 'Brazil', 5, '111111111', 'edvaldo@gmail.com', 'Advogado', 'Anápolis', 'Casado', 32, 120, '2023-02-11', '09:38:00'),
(2, 5, 'sem-foto.jpg', 'Maria', NULL, 'Brazil', 10, '999999999', 'maria@gmail.com', 'Costureiro', 'Madureira', '', 2, 74, '0000-00-00', '06:06:04'),
(3, 10, '63de23d4547ca.jpg', 'João Carlos', 'Olá, Mundo!', 'United States', 25, '981652770', 'joca@gmail.com', 'Sei lá', 'Anápolis', 'Casado', 2, 10, '0000-00-00', '06:05:12'),
(4, 10, '63de1e77c6862.jpg', 'a', NULL, 'British Indian Ocean Territory', 12, '123456789', '', 'Advogado', 'Anápolis', 'Casado', 12, 32, '0000-00-00', '06:43:18'),
(5, 10, NULL, 'Teste', NULL, 'Argentina', 24, '242424242', 'teste@gmail.com', 'Marceneiro', 'Madureira', 'Casado', 8, 80, '0000-00-00', '05:51:43'),
(6, 10, '63de22a02f86b.png', 'Teste 02', 'Lorem vnkjfnvsndvknddlkvjnsldkfvlkdfnvçvnfvjlknçdjf[owdjjndvnaçdslkva', 'Spain', 12, '1212121221', 'teste@gmail.com', 'Advogado', 'Anápolis', 'Casado', 2, 80, '0000-00-00', '05:53:39'),
(7, 10, '63de1e66552ed.jpg', 'Teste03', 'kçfçladslkjvknsldjfkvnskldfnvlksndfvjksdfnvjksvsndlkjsdfnlkvndsfjlvnslkdfvnsljkdnvlksjdnvlkjsdfnvlkjsndlvkjnfkfjvnsdkfjvnlksjdnvlkjsdnvlkjsdfnlvjksndlfkvjnslkdvnlskdfnvksfdfnjvsk', 'Angola', 100, '100001100', 'teste@gmail.com', 'Advogado', 'Anápolis', 'Casado', 23, 21, '2023-02-04', '05:56:03'),
(8, NULL, 'sem-foto.jpg', 'Edvaldo', '', 'Brazil', 8, '111111111', 'edvaldo@gmail.com', 'Advogado', 'Anápolis', 'Casado', 32, 120, '2023-02-09', '23:59:46'),
(9, 8, 'sem-foto.jpg', 'Marcos do Val', '', 'Argentina', 1, '62981652770', '', 'Ferragista', 'Anápolis', 'Casado', 4, 241, '2023-02-11', '10:55:55'),
(10, 8, '63e98b4395d8a.webp', 'Juliano', 'Pastor temente a Deus! Quer um conselheiro, estou DISPONÍVEL. ', 'Brazil', 36, '62981652770', 'julianopastor_conselheiro@gmail.com', 'Designer UX', 'Anápolis', 'Casado', 25, 648, '2023-02-12', '21:59:28');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_cargo`, `nome`, `nasc`, `sexo`, `cpf`, `email`, `senha`, `perfil`, `estado_civil`, `trabalho`, `horario_inicio`, `horario_fim`) VALUES
(1, 12, 'Paulão22', '2010-02-18', 'M', '12345678910', 'paulo@gmail.com', '123XyZ22419hJlM', 'sem-foto', 'Namorando', 'N', '00:00:00', '00:00:00'),
(2, 9, 'Ana', '1994-07-23', 'F', '7063192441', 'ana@gmail.com', 'e7f810', 'sem-foto', 'Solteiro', 'S', '13:00:00', '18:00:00'),
(3, 1, 'JOSE', '2023-01-03', 'M', '91028427324', 'josedo.egito@gmail.com', 'josezinho', 'sem-foto', 'Casado', 'N', '00:00:00', '00:00:00'),
(4, 12, 'Isaac Rocha', '2004-07-23', 'M', '70631871128', 'isaak.rocha137@gmail.com', 'XyZ22419hJlM', 'sem-foto', 'Solteiro', 'S', '08:00:00', '18:00:00'),
(5, 9, 'Maria', '1993-07-07', 'F', '12139839334', 'maria@123gmail.com', 'XyZ22419hJlM', 'sem-foto', 'Noivo', 'S', '07:30:00', '15:00:00'),
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
-- Limitadores para a tabela `anotacoes_pastor`
--
ALTER TABLE `anotacoes_pastor`
  ADD CONSTRAINT `anotacoes_pastor_ibfk_1` FOREIGN KEY (`id_criador_anotacao`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `anotacoes_pastor_ibfk_2` FOREIGN KEY (`id_pastor`) REFERENCES `pastores` (`id_pas`);

--
-- Limitadores para a tabela `anotacoes_pastora`
--
ALTER TABLE `anotacoes_pastora`
  ADD CONSTRAINT `anotacoes_pastora_ibfk_1` FOREIGN KEY (`id_pastora`) REFERENCES `pastoras` (`id_pas_ras`);

--
-- Limitadores para a tabela `colaborando_jejum`
--
ALTER TABLE `colaborando_jejum`
  ADD CONSTRAINT `colaborando_jejum_ibfk_1` FOREIGN KEY (`id_colaborando`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `colaborando_jejum_ibfk_2` FOREIGN KEY (`id_colaborando_jejum`) REFERENCES `jejuns` (`id_jejum`);

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
-- Limitadores para a tabela `jejuns`
--
ALTER TABLE `jejuns`
  ADD CONSTRAINT `jejuns_ibfk_1` FOREIGN KEY (`pastor_comando`) REFERENCES `pastores` (`id_pas`),
  ADD CONSTRAINT `jejuns_ibfk_2` FOREIGN KEY (`pastora_comando`) REFERENCES `pastoras` (`id_pas_ras`);

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
-- Limitadores para a tabela `participando_do_jejum`
--
ALTER TABLE `participando_do_jejum`
  ADD CONSTRAINT `participando_do_jejum_ibfk_1` FOREIGN KEY (`id_participante`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `participando_do_jejum_ibfk_2` FOREIGN KEY (`id_jejum_part`) REFERENCES `jejuns` (`id_jejum`);

--
-- Limitadores para a tabela `pastoras`
--
ALTER TABLE `pastoras`
  ADD CONSTRAINT `pastoras_ibfk_1` FOREIGN KEY (`id_insersor_pas`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `pastores`
--
ALTER TABLE `pastores`
  ADD CONSTRAINT `pastores_ibfk_1` FOREIGN KEY (`id_insersor`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `regras_do_grupo`
--
ALTER TABLE `regras_do_grupo`
  ADD CONSTRAINT `regras_do_grupo_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos_de_oracao` (`id_group`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
