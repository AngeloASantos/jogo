-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Mar-2022 às 06:44
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `game`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagens`
--

CREATE TABLE `personagens` (
  `id` int(20) UNSIGNED NOT NULL,
  `nome` text CHARACTER SET latin1 DEFAULT NULL,
  `classe` text CHARACTER SET latin1 DEFAULT NULL,
  `imagem` text CHARACTER SET latin1 DEFAULT NULL,
  `ataque` int(11) DEFAULT NULL,
  `defesa` int(11) DEFAULT NULL,
  `vida` int(11) DEFAULT NULL,
  `pocao_vida` int(11) DEFAULT NULL,
  `vantagem` text CHARACTER SET latin1 DEFAULT NULL,
  `vulnerabilidade` text CHARACTER SET latin1 DEFAULT NULL,
  `vida_original` int(11) DEFAULT NULL,
  `numero_pot_original` int(11) DEFAULT NULL,
  `ataque_original` int(11) DEFAULT NULL,
  `defesa_original` int(11) DEFAULT NULL,
  `tipo_poder` int(11) DEFAULT NULL,
  `nome_poder` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `personagens`
--

INSERT INTO `personagens` (`id`, `nome`, `classe`, `imagem`, `ataque`, `defesa`, `vida`, `pocao_vida`, `vantagem`, `vulnerabilidade`, `vida_original`, `numero_pot_original`, `ataque_original`, `defesa_original`, `tipo_poder`, `nome_poder`) VALUES
(1, 'Iran Hussain', 'guerreiro', 'iran.png\r\n', 30, 15, 211, 2, NULL, NULL, 250, 2, 30, 15, 1, 'Esgrima'),
(2, 'Ronberg', 'Guerreiro', 'ronberg.png', 20, 10, 350, 3, NULL, NULL, 350, 3, 20, 10, 2, 'Guarda Real'),
(3, 'Lagherta', 'Maga', 'lagherta.png', 16, 10, 59, 3, NULL, NULL, 150, 5, 16, 10, 3, 'Alquimista Estudiosa'),
(4, 'Werewolf', 'criatura', 'werewolf.png', 40, 15, 140, 1, NULL, NULL, 140, 1, 40, 15, 4, 'Sede De Sangue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_batalhas`
--

CREATE TABLE `registro_batalhas` (
  `id` int(11) NOT NULL,
  `ataques_realizados` int(11) DEFAULT NULL,
  `ataques_recebidos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` text CHARACTER SET latin1 DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `cidade` text CHARACTER SET latin1 DEFAULT NULL,
  `feedback` text CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `personagens`
--
ALTER TABLE `personagens`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `registro_batalhas`
--
ALTER TABLE `registro_batalhas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `personagens`
--
ALTER TABLE `personagens`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `registro_batalhas`
--
ALTER TABLE `registro_batalhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
