-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/04/2024 às 20:51
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_minhaescola`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_escola`
--

CREATE TABLE `tb_escola` (
  `endereco` varchar(50) NOT NULL,
  `inep` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_escola`
--

INSERT INTO `tb_escola` (`endereco`, `inep`, `nome`, `status`, `id`) VALUES
('Caxias -Ma Rua 876', 'Inep-MA', 'CMT IV', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_professores`
--

CREATE TABLE `tb_professores` (
  `nome` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_professores`
--

INSERT INTO `tb_professores` (`nome`, `id`) VALUES
('Geraldo', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_turmas`
--

CREATE TABLE `tb_turmas` (
  `id_escola` int(11) NOT NULL,
  `id_professores` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `turno` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_turmas`
--

INSERT INTO `tb_turmas` (`id_escola`, `id_professores`, `nome`, `status`, `turno`, `id`) VALUES
(1, 0, '3 ano D', 0, 'manhã', 1),
(1, 0, '3 ano A', 0, 'manhã', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma_professor`
--

CREATE TABLE `turma_professor` (
  `turma_id` int(11) DEFAULT NULL,
  `professor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_escola`
--
ALTER TABLE `tb_escola`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_professores`
--
ALTER TABLE `tb_professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_turmas`
--
ALTER TABLE `tb_turmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professores` (`id_professores`);

--
-- Índices de tabela `turma_professor`
--
ALTER TABLE `turma_professor`
  ADD KEY `turma_id` (`turma_id`),
  ADD KEY `professor_id` (`professor_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_escola`
--
ALTER TABLE `tb_escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_professores`
--
ALTER TABLE `tb_professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_turmas`
--
ALTER TABLE `tb_turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `turma_professor`
--
ALTER TABLE `turma_professor`
  ADD CONSTRAINT `turma_professor_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `tb_turmas` (`id`),
  ADD CONSTRAINT `turma_professor_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `tb_professores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
