-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/08/2024 às 16:52
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

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
-- Estrutura para tabela `tb_alunos`
--

CREATE TABLE `tb_alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL,
  `escola_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_alunos`
--

INSERT INTO `tb_alunos` (`id`, `nome`, `turma_id`, `escola_id`) VALUES
(1, 'Geraldo', NULL, 6),
(3, 'Raimundo', NULL, 6),
(4, 'Carlos', NULL, 7);

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
('Caxias -Ma Rua 876', 'fake001', 'CMT IV ', 0, 6),
('Caxias -Ma Rua 900', 'fake002', 'Instituto Sol Nascente', 0, 7),
('Caxias -Ma Rua 900', 'fake002', 'Instituto cabeção', 0, 8),
('Caxias -Ma Rua 900', 'fake003', 'escola Vila Nova', 0, 9),
('Caxias -Ma Rua 900', 'fake004', 'JOAO LOBO ', 0, 10),
('Caxias -Ma Rua 900', 'fake006', 'Raimundo ', 0, 11),
('Caxias -Ma Rua 900', 'fake006', 'Escola Vila Velha', 0, 12),
('Caxias -Ma Rua 900', 'fake006', 'Raimundo novo', 0, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_professores`
--

CREATE TABLE `tb_professores` (
  `nome` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `usuarioF` varchar(40) DEFAULT NULL,
  `senhaF` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_professores`
--

INSERT INTO `tb_professores` (`nome`, `id`, `usuarioF`, `senhaF`) VALUES
('Geraldo', 2, 'FGE01', 'FGE01'),
('Shamyra', 3, 'FSH02', 'FSH02'),
('Cecilly', 4, 'FCE03', 'FCE03'),
('Neto', 5, 'FNE04', 'FNE04');

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
-- Índices de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`),
  ADD KEY `escola_id` (`escola_id`);

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
-- AUTO_INCREMENT de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_escola`
--
ALTER TABLE `tb_escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_professores`
--
ALTER TABLE `tb_professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_turmas`
--
ALTER TABLE `tb_turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD CONSTRAINT `tb_alunos_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `tb_turmas` (`id`),
  ADD CONSTRAINT `tb_alunos_ibfk_2` FOREIGN KEY (`escola_id`) REFERENCES `tb_escola` (`id`);

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
