-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jul 17, 2011 as 02:53 
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `study_pianolab_memorytest`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carta`
--

CREATE TABLE IF NOT EXISTS `carta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema_id` int(11) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `image` (`imagem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `carta`
--

INSERT INTO `carta` (`id`, `tema_id`, `imagem`, `descricao`) VALUES
(1, 1, 'Apple.png', 'Apple'),
(2, 1, 'Chrome.png', 'Chrome'),
(3, 1, 'FireFox.png', 'FireFox'),
(4, 1, 'FirefoxS.png', 'FirefoxS'),
(5, 1, 'Mac.png', 'Mac'),
(6, 1, 'SonyEricsson.png', 'SonyEricsson'),
(7, 1, 'adobe.png', 'adobe'),
(8, 1, 'canon.png', 'canon'),
(9, 1, 'cisco.png', 'cisco'),
(10, 1, 'dell.png', 'dell'),
(11, 1, 'digg.png', 'digg'),
(12, 1, 'ea.png', 'ea'),
(13, 1, 'ebay.png', 'ebay'),
(14, 1, 'facebook-2.png', 'facebook-2'),
(15, 1, 'facebook.png', 'facebook'),
(16, 1, 'gmail.png', 'gmail'),
(17, 1, 'google.png', 'google'),
(18, 1, 'hp.png', 'hp'),
(19, 1, 'microsoft.png', 'microsoft'),
(20, 1, 'mozilla-thunderbird.png', 'mozilla-thunderbird'),
(21, 1, 'mozilla.png', 'mozilla'),
(22, 1, 'msn.png', 'msn'),
(23, 1, 'mysql.png', 'mysql'),
(24, 1, 'netscape-1.png', 'netscape-1'),
(25, 1, 'netscape-2.png', 'netscape-2'),
(26, 1, 'netscape.png', 'netscape'),
(27, 1, 'opera-icon.png', 'opera-icon'),
(28, 1, 'sony.png', 'sony'),
(29, 1, 'thunderbird-icon.png', 'thunderbird-icon'),
(30, 1, 'twitter.png', 'twitter'),
(31, 1, 'vimeo.png', 'vimeo'),
(32, 1, 'yahoo.png', 'yahoo'),
(33, 2, 'Baseball_Ball.png', 'Baseball_Ball'),
(34, 2, 'Basketball_Ball.png', 'Basketball_Ball'),
(35, 2, 'Football_Ball.png', 'Football_Ball'),
(36, 2, 'Golf_Ball.png', 'Golf_Ball'),
(37, 2, 'Gymnastics.png', 'Gymnastics'),
(38, 2, 'Hockey_IceSkate.png', 'Hockey_IceSkate'),
(39, 2, 'Soccer_Ball.png', 'Soccer_Ball'),
(40, 2, 'Sports_Black.png', 'Sports_Black'),
(41, 2, 'Tennis_Ball.png', 'Tennis_Ball'),
(42, 2, 'Volleyball_Ball.png', 'Volleyball_Ball'),
(43, 2, 'aerow_winter.png', 'aerow_winter'),
(44, 2, 'american_football.png', 'american_football'),
(45, 2, 'basket_ball.png', 'basket_ball'),
(46, 2, 'basketball.png', 'basketball'),
(47, 2, 'boxing_gloves.png', 'boxing_gloves'),
(48, 2, 'camaro_128.png', 'camaro_128'),
(49, 2, 'clicknrun.png', 'clicknrun'),
(50, 2, 'favorites.png', 'favorites'),
(51, 2, 'formula_1_helmet.png', 'formula_1_helmet'),
(52, 2, 'mobile.png', 'mobile'),
(53, 2, 'my-computer.png', 'my-computer'),
(54, 2, 'my-documents.png', 'my-documents'),
(55, 2, 'physical_education.png', 'physical_education'),
(56, 2, 'red_128.png', 'red_128'),
(57, 2, 'school_events.png', 'school_events'),
(58, 2, 'single_seater.png', 'single_seater'),
(59, 2, 'soccer_5.png', 'soccer_5'),
(60, 2, 'sports.png', 'sports'),
(61, 2, 'sprint_runner.png', 'sprint_runner'),
(62, 2, 'swimming.png', 'swimming'),
(63, 2, 'tennis-1.png', 'tennis-1'),
(64, 2, 'tennis.png', 'tennis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogosalvo`
--

CREATE TABLE IF NOT EXISTS `jogosalvo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Estrutura da tabela `modo`
--

CREATE TABLE IF NOT EXISTS `modo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `modo`
--

INSERT INTO `modo` (`id`, `nome`, `link`) VALUES
(1, 'Livre', '/free'),
(2, 'Campanha', '/campaign'),
(3, 'Configuravel', '/home/configurable');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recorde`
--

CREATE TABLE IF NOT EXISTS `recorde` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `modo_id` int(11) NOT NULL,
  `erros` int(11) NOT NULL,
  `acertos` int(11) NOT NULL,
  `tempos` varchar(7) NOT NULL,
  `pontos` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `recorde`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `tema`
--

INSERT INTO `tema` (`id`, `tema`) VALUES
(1, 'Companies'),
(2, 'Sports');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema_id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 DEFAULT 'Não definido',
  `ultimo_acesso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_rede` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
