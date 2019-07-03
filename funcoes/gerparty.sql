-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2019 às 18:23
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerparty`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_bloco_nota`
--

CREATE TABLE `tbl_bloco_nota` (
  `id` int(11) NOT NULL,
  `assunto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `texto` varchar(5000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `observacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id` int(10) NOT NULL,
  `nome_completo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero_identificador` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `observacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_forma_pagamento`
--

CREATE TABLE `tbl_forma_pagamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_forma_pagamento`
--

INSERT INTO `tbl_forma_pagamento` (`id`, `nome`) VALUES
(1, 'Dinheiro'),
(2, 'Cartão de Débito'),
(3, 'Cartão de Crédito'),
(4, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produto`
--

CREATE TABLE `tbl_produto` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `observacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha_login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `permissao_cliente` int(11) NOT NULL,
  `permissao_categoria` int(11) NOT NULL,
  `permissao_produto` int(11) NOT NULL,
  `permissao_venda` int(11) NOT NULL,
  `permissao_caixa` int(11) NOT NULL,
  `permissao_relatorio` int(11) NOT NULL,
  `permissao_usuario` int(11) NOT NULL,
  `permissao_email` int(11) NOT NULL,
  `permissao_blobo_notas` int(11) NOT NULL,
  `observacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome_completo`, `data_nascimento`, `telefone_1`, `telefone_2`, `email_login`, `senha_login`, `permissao_cliente`, `permissao_categoria`, `permissao_produto`, `permissao_venda`, `permissao_caixa`, `permissao_relatorio`, `permissao_usuario`, `permissao_email`, `permissao_blobo_notas`, `observacao`) VALUES
(1, 'Usuário Administrador do Sistema', '04/12/1992', '(16) 9 8136-0408', '', 'administrador@gerparty.com.br', '1234', 1, 1, 1, 1, 1, 1, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_venda`
--

CREATE TABLE `tbl_venda` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_venda` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_pagamento` int(11) NOT NULL,
  `data_pagamento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_forma_pagamento` int(11) NOT NULL,
  `status_pagamento` int(11) NOT NULL,
  `observacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bloco_nota`
--
ALTER TABLE `tbl_bloco_nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_forma_pagamento`
--
ALTER TABLE `tbl_forma_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produto`
--
ALTER TABLE `tbl_produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_venda`
--
ALTER TABLE `tbl_venda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bloco_nota`
--
ALTER TABLE `tbl_bloco_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_forma_pagamento`
--
ALTER TABLE `tbl_forma_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_produto`
--
ALTER TABLE `tbl_produto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_venda`
--
ALTER TABLE `tbl_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
