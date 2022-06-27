-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 27-Jun-2022 às 15:32
-- Versão do servidor: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) NOT NULL,
  `sigla` varchar(6) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `regioes_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`, `sigla`, `ts`, `regioes_id`) VALUES
(10, 'BAURU', 'BRU', '2022-05-12 12:07:03', 61),
(11, 'PEDERNEIRAS', 'PDR', '2022-05-12 12:09:01', 61),
(12, 'TI', 'TI', '2022-05-12 12:29:01', 60),
(13, 'INFRA', 'INFRA', '2022-05-12 12:29:20', 68),
(14, 'LENÇÓIS PAULISTA', 'LEP', '2022-05-12 12:34:13', 63),
(15, 'SÃO MANUEL', 'SML', '2022-05-12 12:34:51', 63),
(16, 'MACATUBA', 'MAC', '2022-05-12 12:35:03', 63),
(17, 'BOREBI', 'BOR', '2022-05-12 12:35:12', 63),
(18, 'AREIOPOLIS', 'ARL', '2022-05-12 12:35:24', 63),
(19, 'ALFREDO GUEDES', 'AFG', '2022-05-12 12:35:37', 63),
(20, 'AGUDOS', 'AGU', '2022-05-12 12:36:11', 63),
(21, 'PIRATININGA', 'PIA', '2022-05-12 12:38:17', 61),
(22, 'VANGLORIA', 'VGA', '2022-05-12 12:38:45', 61),
(23, 'SÃO CARLOS', 'SCL', '2022-05-12 12:39:25', 62),
(24, 'ARARAQUARA', 'ARQ', '2022-05-12 12:39:36', 62),
(25, 'MATÃO', 'MOM', '2022-05-12 12:39:48', 62),
(26, 'DOBRADA', 'DBD', '2022-05-12 12:40:27', 62),
(27, 'AVARÉ', 'AVE', '2022-05-12 12:41:34', 64),
(28, 'HOLAMBRA', 'HLA', '2022-05-12 12:41:42', 64),
(29, 'ITAI', 'ITA', '2022-05-12 12:41:55', 64),
(30, 'CERQUEIRA CESAR', 'CCE', '2022-05-12 12:42:06', 64),
(31, 'MANDURI', 'MDU', '2022-05-12 12:42:24', 64),
(32, 'PARANAPANEMA', 'PPM', '2022-05-12 12:42:35', 64),
(33, 'CAMPINA DO MONTE ALEGRE', 'CMAL', '2022-05-12 12:42:52', 64),
(34, 'ARANDU', 'ADX', '2022-05-12 12:42:59', 64),
(35, 'IARAS', 'IRS', '2022-05-12 12:43:18', 64),
(36, 'OLEO', 'OLO', '2022-05-12 12:43:31', 64),
(37, 'PRATANIA', 'PRTN', '2022-05-12 12:43:41', 64),
(38, 'AGUAS DE SANTA BARBARA', 'ABB', '2022-05-12 12:43:54', 64),
(39, 'BOTUCATU', 'BTU', '2022-05-12 12:44:04', 65),
(40, 'RUBIÃO JUNIOR', 'RUB', '2022-05-12 12:44:14', 65),
(41, 'VITORIANA', 'VIT', '2022-05-12 12:44:27', 65),
(42, 'ITATINGA', 'ITG', '2022-05-12 12:44:37', 65),
(43, 'PARDINHO', 'PDW', '2022-05-12 12:44:52', 65),
(44, 'ANHUMAS', 'AHU', '2022-05-12 12:45:00', 65),
(45, 'JAU', 'JAU', '2022-05-12 12:45:09', 67),
(46, 'BARRA BONITA', 'BBN', '2022-05-12 12:45:19', 67),
(47, 'IGARAÇU DO TIETE', 'IGA', '2022-05-12 12:45:30', 67),
(48, 'DOIS CORREGOS', 'DGS', '2022-05-12 12:45:45', 69),
(49, 'MINEIROS DO TIETE', 'MNT', '2022-05-12 12:45:57', 69),
(50, 'ITAPUI', 'ITU', '2022-05-12 12:46:07', 69),
(51, 'POTUNDUVA', 'PTV', '2022-05-12 12:46:20', 69),
(52, 'BOCAINA', 'BCA', '2022-05-12 12:46:37', 69),
(53, 'DOURADO', 'DRO', '2022-05-12 12:47:01', 69),
(54, 'TRABIJU', 'TBJ', '2022-05-12 12:47:16', 69),
(55, 'BOA ESPERANÇA', 'BES', '2022-05-12 12:47:25', 69),
(56, 'RIBEIRÃO BONITO', 'RBB', '2022-05-12 12:47:35', 69),
(57, 'IBITINGA', 'IBA', '2022-05-12 12:47:53', 66),
(58, 'NOVA EUROPA', 'NEU', '2022-05-12 12:48:02', 66),
(59, 'GAVIÃO PEIXOTO', 'GAP', '2022-05-12 12:48:16', 66),
(60, 'BORBOREMA', 'BBO', '2022-05-12 12:48:25', 66),
(61, 'ITAPOLIS', 'IAL', '2022-05-12 12:49:12', 66),
(62, 'CANDIDO RODRIGUES', 'CRG', '2022-05-12 12:51:22', 66),
(63, 'FERNANDO PRESTES', 'FPS', '2022-05-12 12:51:48', 66),
(64, 'ITAJOBI', 'IJO', '2022-05-12 12:52:02', 66),
(65, 'MONTE ALTO', 'MTA', '2022-05-12 12:52:19', 66),
(66, 'PINDORAMA', 'PNM', '2022-05-12 12:52:36', 66),
(67, 'SANTA ADELIA', 'ADL', '2022-05-12 12:52:51', 66),
(68, 'TABATINGA', 'TBT', '2022-05-12 12:53:04', 66),
(69, 'LINS', 'LIS', '2022-05-16 19:40:12', 66),
(71, '12x36 ', '12x36', '2022-06-27 15:02:32', 70);

-- --------------------------------------------------------

--
-- Estrutura da tabela `plantoes`
--

CREATE TABLE `plantoes` (
  `id` int(11) NOT NULL,
  `plantonistas_id` int(11) UNSIGNED NOT NULL,
  `regioes_id` int(11) UNSIGNED NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `plantoes`
--

INSERT INTO `plantoes` (`id`, `plantonistas_id`, `regioes_id`, `ts`) VALUES
(7, 30, 60, '2022-05-12 12:07:51'),
(16, 31, 68, '2022-05-12 12:32:09'),
(17, 38, 63, '2022-05-12 12:32:29'),
(18, 39, 65, '2022-05-12 12:32:52'),
(19, 46, 61, '2022-05-12 12:33:10'),
(20, 47, 64, '2022-05-12 12:33:25'),
(21, 50, 67, '2022-05-12 12:53:27'),
(22, 33, 66, '2022-05-12 12:53:33'),
(23, 48, 62, '2022-05-12 12:54:31'),
(24, 45, 69, '2022-05-12 12:59:14'),
(25, 55, 70, '2022-06-27 12:55:16'),
(26, 56, 72, '2022-06-27 15:27:44'),
(27, 57, 73, '2022-06-27 15:27:53'),
(28, 58, 74, '2022-06-27 15:28:21'),
(29, 59, 75, '2022-06-27 15:28:28'),
(30, 60, 76, '2022-06-27 15:28:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plantonistas`
--

CREATE TABLE `plantonistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `telefone_pessoal` varchar(15) DEFAULT NULL,
  `telefone_empresa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `plantonistas`
--

INSERT INTO `plantonistas` (`id`, `nome`, `ts`, `telefone_pessoal`, `telefone_empresa`) VALUES
(30, 'BRUNO MACIEL', '2022-05-12 12:07:40', '(14) 9971-17439', '(14) 9917-17238'),
(31, 'JOSÉ EVERALDO', '2022-05-12 12:09:41', '(00) 00000-0000', '(14) 99637-5268'),
(32, 'JUAN', '2022-05-12 12:15:27', '(14) 98838-5023', '(00) 00000-0000'),
(33, 'VINICIUS BRUNINI', '2022-05-12 12:16:44', '(16) 99132-9869', '(14) 99881-6519'),
(34, 'DIEGO FERNANDES', '2022-05-12 12:17:05', '(14) 98150-8159', '(14) 99859-8054'),
(35, 'EDUARDO', '2022-05-12 12:17:23', '(14) 99856-6226', '(14) 99710-7714'),
(36, 'CESAR AUGUSTO', '2022-05-12 12:17:44', '(14) 9967-93620', '(14) 0000-00000'),
(37, 'IGOR FELIX', '2022-05-12 12:17:58', '(14) 9977-97159', '(14) 9910-90331'),
(38, 'ISRAEL', '2022-05-12 12:21:00', '(14) 9961-92895', '(14) 99877-7196'),
(39, 'JOSE AUGUSTO', '2022-05-12 12:27:38', '(14) 99154-1323', '(14) 99172-2388'),
(41, 'EMERSON', '2022-05-13 10:28:36', '(14) 9813-87500', '(14) 99166-5277'),
(42, 'FERNANDO', '2022-05-13 10:29:36', '(14) 98138-7787', '(14) 99867-5029'),
(43, 'JAIR CARVALHO', '2022-05-16 10:56:23', '(14) 9966-01331', '(14) 9988-36377'),
(44, 'RICARDO MORETTO', '2022-05-16 11:08:33', '(14) 99603-8091', '(14) 99603-8091'),
(45, 'PAULO SERGIO', '2022-05-16 14:55:53', '(14) 99105-8717', '(14) 99171-9269'),
(46, 'ESTEVAN CARVALHO', '2022-05-16 14:58:47', '(14) 99878-2589', '(14) 99878-2589'),
(47, 'LUIZ FERNANDO SOUZA', '2022-05-16 15:00:49', '(14) 99730-2282', '(14) 99172-0105'),
(48, 'LUIS PINARDI', '2022-05-16 15:04:13', '(16) 99616-2669', '(14) 99172-1085'),
(49, 'SÉRGIO CANELLA NETO', '2022-05-16 16:36:21', '(14) 99785-8459', '(14) 99643-9071'),
(50, 'JHONATAN ', '2022-05-23 11:20:44', '(14) 98832-5912', '(14) 99830-1891'),
(51, 'RONALDO ADRIANO', '2022-05-23 11:22:03', '(14) 99745-4946', '(14) 99172-2925'),
(52, 'ARON BUENO DE LUCCA', '2022-05-30 11:47:36', '(14) 9967-25981', '(14) 9917-22913'),
(53, 'THIAGO WILLIAN', '2022-06-06 11:04:38', '(14) 99776-3972', '(14) 99877-6487'),
(55, 'LEONARDO - DIA 1 - 8 às 20', '2022-06-27 12:39:42', '(14) 9963-38103', '(14) 9988-04968'),
(56, 'MATEUS - DIA 1 - 12 às 00', '2022-06-27 12:40:49', '(14) 9962-69484', '(14) 9964-68826'),
(57, 'RUAN - DIA 1 - 18 às 6', '2022-06-27 12:41:31', '(14) 9914-00903', '(14) 9916-13113'),
(58, 'GUILHERME - DIA 2 - 8 às 20', '2022-06-27 12:45:08', '(14) 9975-46879', '(00) 0000-00010'),
(59, 'EDUARDO - DIA 2 - 12 às 00', '2022-06-27 12:47:14', '(00) 0000-00001', '(14) 9988-07825'),
(60, 'JOÃO - DIA 2 - 18 às 6', '2022-06-27 12:50:05', '(14) 9990-77630', '(00) 0000-00100');

-- --------------------------------------------------------

--
-- Estrutura da tabela `regioes`
--

CREATE TABLE `regioes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `regioes`
--

INSERT INTO `regioes` (`id`, `nome`, `ts`) VALUES
(60, 'TI', '2022-05-12 12:05:52'),
(61, 'BAURU', '2022-05-12 12:06:53'),
(62, 'SÃO CARLOS', '2022-05-12 12:08:15'),
(63, 'LENÇÓIS PAULISTA', '2022-05-12 12:08:26'),
(64, 'AVARÉ', '2022-05-12 12:08:31'),
(65, 'BOTUCATU', '2022-05-12 12:08:37'),
(66, 'IBITINGA', '2022-05-12 12:08:41'),
(67, 'JAU - EQUIPE 1', '2022-05-12 12:08:50'),
(68, 'INFRA', '2022-05-12 12:10:00'),
(69, 'JAU-EQUIPE 2', '2022-05-12 12:19:47'),
(70, '12x36 | DIA 1 - 8 às 20', '2022-06-27 12:54:47'),
(72, '12x36 | DIA 1 - 12 às 00', '2022-06-27 15:20:33'),
(73, '12x36 | DIA 1 - 18 às 6', '2022-06-27 15:25:42'),
(74, '12x36 | DIA 2 - 8 às 20', '2022-06-27 15:26:00'),
(75, '12x36 | DIA 2 - 12 às 00', '2022-06-27 15:26:13'),
(76, '12x36 | DIA 2 - 18 às 6', '2022-06-27 15:26:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `senha` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `ts`) VALUES
(1, 'admin', '185101rf', '2022-03-14 19:06:03'),
(2, 'noc', '185101noc', '2022-05-12 13:19:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regioes_id` (`regioes_id`);

--
-- Indexes for table `plantoes`
--
ALTER TABLE `plantoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plantoes_ibfk_2` (`plantonistas_id`),
  ADD KEY `plantoes_ibfk_3` (`regioes_id`);

--
-- Indexes for table `plantonistas`
--
ALTER TABLE `plantonistas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regioes`
--
ALTER TABLE `regioes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `plantoes`
--
ALTER TABLE `plantoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `plantonistas`
--
ALTER TABLE `plantonistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `regioes`
--
ALTER TABLE `regioes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidades_ibfk_1` FOREIGN KEY (`regioes_id`) REFERENCES `regioes` (`id`);

--
-- Limitadores para a tabela `plantoes`
--
ALTER TABLE `plantoes`
  ADD CONSTRAINT `plantoes_ibfk_2` FOREIGN KEY (`plantonistas_id`) REFERENCES `plantonistas` (`id`),
  ADD CONSTRAINT `plantoes_ibfk_3` FOREIGN KEY (`regioes_id`) REFERENCES `regioes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
