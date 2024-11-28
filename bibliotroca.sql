-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/12/2023 às 20:30
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bibliotroca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbchat`
--

CREATE TABLE `tbchat` (
  `idChat` int(11) NOT NULL,
  `senderChat` int(11) NOT NULL,
  `receiverChat` int(11) NOT NULL,
  `messageChat` varchar(500) NOT NULL,
  `imageChat` varchar(1000) NOT NULL,
  `creationChat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbconversation`
--

CREATE TABLE `tbconversation` (
  `idConversation` int(11) NOT NULL,
  `mainUserConversation` int(11) NOT NULL,
  `otherUserConversation` int(11) NOT NULL,
  `unreadConversation` varchar(1) NOT NULL,
  `modificationConversation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `creationConversation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdenuncia`
--

CREATE TABLE `tbdenuncia` (
  `idDenuncia` int(11) NOT NULL,
  `tipoDenuncia` varchar(100) NOT NULL,
  `descDenuncia` varchar(500) NOT NULL,
  `idUser` int(11) NOT NULL,
  `nomeDenuncia` varchar(100) NOT NULL,
  `idDenunciado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbgenerolivro`
--

CREATE TABLE `tbgenerolivro` (
  `idGeneroLivro` int(11) NOT NULL,
  `descGeneroLivro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `idLivro` int(11) NOT NULL,
  `nomeLivro` varchar(100) NOT NULL,
  `autorLivro` varchar(100) NOT NULL,
  `descLivro` varchar(500) NOT NULL,
  `idTipoLivro` int(11) NOT NULL,
  `edicaoLivro` int(11) NOT NULL,
  `editoraLivro` varchar(100) NOT NULL,
  `idiomaLivro` varchar(50) NOT NULL,
  `paginasLivro` int(11) NOT NULL,
  `acabamentoLivro` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL,
  `nomeArquivo` varchar(200) NOT NULL,
  `path` varchar(100) NOT NULL,
  `statusLivro` varchar(15) NOT NULL DEFAULT 'disponivel',
  `motivoTroca` varchar(150) NOT NULL,
  `valorTroca` varchar(5) NOT NULL,
  `opcTroca` varchar(50) NOT NULL,
  `dataLivro` datetime NOT NULL DEFAULT current_timestamp(),
  `generoLivro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbperfil`
--

CREATE TABLE `tbperfil` (
  `idPerfil` int(11) NOT NULL,
  `apelidoPerfil` varchar(50) NOT NULL,
  `idadePerfil` smallint(6) NOT NULL,
  `sexoPerfil` varchar(10) NOT NULL,
  `fotoPerfil` varchar(150) NOT NULL,
  `biografiaPerfil` varchar(200) NOT NULL,
  `idUser` int(11) NOT NULL,
  `favGeneroPerfil` varchar(50) NOT NULL,
  `cepPerfil` char(8) NOT NULL,
  `cidadePerfil` varchar(50) NOT NULL,
  `bairroPerfil` varchar(50) NOT NULL,
  `cpfPerfil` char(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpost`
--

CREATE TABLE `tbpost` (
  `idPost` int(11) NOT NULL,
  `idLivro` int(11) NOT NULL,
  `likesPost` int(11) NOT NULL DEFAULT 0,
  `commentPost` varchar(200) NOT NULL,
  `sharesPost` int(11) NOT NULL DEFAULT 0,
  `timePost` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbsalvos`
--

CREATE TABLE `tbsalvos` (
  `idSalvo` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `idLivro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbseguir`
--

CREATE TABLE `tbseguir` (
  `idSeguir` int(11) NOT NULL,
  `idSeguindo` int(11) NOT NULL,
  `idPerfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbteluser`
--

CREATE TABLE `tbteluser` (
  `idTelUser` int(11) NOT NULL,
  `numTelUser` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtipolivro`
--

CREATE TABLE `tbtipolivro` (
  `idTipoLivro` int(11) NOT NULL,
  `descTipoLivro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtroca`
--

CREATE TABLE `tbtroca` (
  `idTroca` int(11) NOT NULL,
  `idSenderTroca` int(11) NOT NULL,
  `idReceiverTroca` int(11) NOT NULL,
  `valorPropostaTroca` float NOT NULL,
  `prospostaTroca` varchar(150) NOT NULL,
  `idLivroReceptor` int(11) NOT NULL,
  `idLivroMainUser` int(11) NOT NULL,
  `statusTroca` varchar(10) NOT NULL DEFAULT 'aberta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbuser`
--

CREATE TABLE `tbuser` (
  `idUser` int(11) NOT NULL,
  `emailUser` varchar(100) NOT NULL,
  `senhaUser` varchar(100) NOT NULL,
  `nomeUser` varchar(100) NOT NULL,
  `StatusUser` varchar(100) NOT NULL,
  `statusCadastro` varchar(15) NOT NULL,
  `onlineUser` datetime NOT NULL,
  `tokenUser` varchar(100) NOT NULL,
  `secureUser` bigint(20) NOT NULL,
  `creationUser` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbuseradm`
--

CREATE TABLE `tbuseradm` (
  `idUserAdm` int(11) NOT NULL,
  `emailUserAdm` varchar(100) NOT NULL,
  `senhaUserAdm` varchar(100) NOT NULL,
  `nomeUserAdm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbchat`
--
ALTER TABLE `tbchat`
  ADD PRIMARY KEY (`idChat`);

--
-- Índices de tabela `tbconversation`
--
ALTER TABLE `tbconversation`
  ADD PRIMARY KEY (`idConversation`);

--
-- Índices de tabela `tbdenuncia`
--
ALTER TABLE `tbdenuncia`
  ADD PRIMARY KEY (`idDenuncia`);

--
-- Índices de tabela `tbgenerolivro`
--
ALTER TABLE `tbgenerolivro`
  ADD PRIMARY KEY (`idGeneroLivro`);

--
-- Índices de tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`idLivro`);

--
-- Índices de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices de tabela `tbpost`
--
ALTER TABLE `tbpost`
  ADD PRIMARY KEY (`idPost`);

--
-- Índices de tabela `tbsalvos`
--
ALTER TABLE `tbsalvos`
  ADD PRIMARY KEY (`idSalvo`);

--
-- Índices de tabela `tbseguir`
--
ALTER TABLE `tbseguir`
  ADD PRIMARY KEY (`idSeguir`);

--
-- Índices de tabela `tbteluser`
--
ALTER TABLE `tbteluser`
  ADD PRIMARY KEY (`idTelUser`);

--
-- Índices de tabela `tbtipolivro`
--
ALTER TABLE `tbtipolivro`
  ADD PRIMARY KEY (`idTipoLivro`);

--
-- Índices de tabela `tbtroca`
--
ALTER TABLE `tbtroca`
  ADD PRIMARY KEY (`idTroca`);

--
-- Índices de tabela `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`idUser`);

--
-- Índices de tabela `tbuseradm`
--
ALTER TABLE `tbuseradm`
  ADD PRIMARY KEY (`idUserAdm`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbchat`
--
ALTER TABLE `tbchat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbconversation`
--
ALTER TABLE `tbconversation`
  MODIFY `idConversation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbdenuncia`
--
ALTER TABLE `tbdenuncia`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbgenerolivro`
--
ALTER TABLE `tbgenerolivro`
  MODIFY `idGeneroLivro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpost`
--
ALTER TABLE `tbpost`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbsalvos`
--
ALTER TABLE `tbsalvos`
  MODIFY `idSalvo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbseguir`
--
ALTER TABLE `tbseguir`
  MODIFY `idSeguir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbteluser`
--
ALTER TABLE `tbteluser`
  MODIFY `idTelUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtipolivro`
--
ALTER TABLE `tbtipolivro`
  MODIFY `idTipoLivro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtroca`
--
ALTER TABLE `tbtroca`
  MODIFY `idTroca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbuseradm`
--
ALTER TABLE `tbuseradm`
  MODIFY `idUserAdm` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
