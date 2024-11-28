-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/11/2023 às 17:01
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
-- Banco de dados: `bdchange`
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

--
-- Despejando dados para a tabela `tbchat`
--

INSERT INTO `tbchat` (`idChat`, `senderChat`, `receiverChat`, `messageChat`, `imageChat`, `creationChat`) VALUES
(5, 2, 1, 'alow', '', '2023-10-22 20:16:32'),
(6, 2, 1, 'alow', '', '2023-10-23 12:28:02'),
(9, 1, 2, 'dasasdas', '', '2023-11-10 22:34:47');

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

--
-- Despejando dados para a tabela `tbconversation`
--

INSERT INTO `tbconversation` (`idConversation`, `mainUserConversation`, `otherUserConversation`, `unreadConversation`, `modificationConversation`, `creationConversation`) VALUES
(7, 2, 1, 'y', '2023-10-23 15:28:02', '2023-10-22 20:16:32'),
(8, 1, 2, 'y', '2023-10-22 23:16:32', '2023-10-22 20:16:32'),
(9, 1, 0, 'y', '2023-11-11 01:33:47', '2023-11-10 22:33:27'),
(10, 0, 1, 'y', '2023-11-11 01:33:27', '2023-11-10 22:33:27'),
(11, 2, 0, 'n', '2023-11-11 17:27:18', '2023-11-11 14:27:18'),
(12, 0, 2, 'y', '2023-11-11 17:27:18', '2023-11-11 14:27:18');

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
  `descLivro` varchar(100) NOT NULL,
  `idTipoLivro` int(11) NOT NULL,
  `idGeneroLivro` int(11) NOT NULL,
  `edicaoLivro` int(11) NOT NULL,
  `editoraLivro` varchar(100) NOT NULL,
  `idiomaLivro` varchar(50) NOT NULL,
  `paginasLivro` int(11) NOT NULL,
  `acabamentoLivro` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL,
  `nomeArquivo` varchar(200) NOT NULL,
  `path` varchar(100) NOT NULL,
  `statusLivro` varchar(15) NOT NULL DEFAULT 'disponivel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblivro`
--

INSERT INTO `tblivro` (`idLivro`, `nomeLivro`, `autorLivro`, `descLivro`, `idTipoLivro`, `idGeneroLivro`, `edicaoLivro`, `editoraLivro`, `idiomaLivro`, `paginasLivro`, `acabamentoLivro`, `idUser`, `nomeArquivo`, `path`, `statusLivro`) VALUES
(1, 'ewrwewer', 'rwerwe', 'rwewerw', 0, 0, 0, 'erwe', 'werwe', 2342342, 'rwer', 2, 'fdcf3822ffc218bf10f760f0e11db3be1f5a96a3_hq.jpg', '../LoginUser/arquivos/654e6ae36c786.jpg', 'disponivel'),
(2, 'Viagem ao centro da terra', 'Julio verne', 'Viagem ao centro da Terra” é um livro de ficção científica escrito por Júlio Verne, que foi lançado ', 0, 0, 1987, 'Julio Vern', 'Português', 223, 'Livreto', 2, 'viagem ao centro da terra.jpg', '../LoginUser/arquivos/654ea2399d78e.jpg', 'indisponivel'),
(3, 'Crie de manhã, administre à tarde', 'MAURICIO', 'Quando pesquisamos a palavra “negócios” associada ao Mauricio de Sousa, não há muito conteúdo dispon', 0, 0, 2013, 'mauricio de souza', 'Português', 233, 'capa dura', 1, '61+RnISycmS._AC_UL160_SR160,160_.jpg', '../LoginUser/arquivos/6550223322465.jpg', 'indisponivel');

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
  `favGeneroPerfil` varchar(15) NOT NULL,
  `cepPerfil` char(8) NOT NULL,
  `cidadePerfil` varchar(50) NOT NULL,
  `bairroPerfil` varchar(50) NOT NULL,
  `cpfPerfil` char(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbperfil`
--

INSERT INTO `tbperfil` (`idPerfil`, `apelidoPerfil`, `idadePerfil`, `sexoPerfil`, `fotoPerfil`, `biografiaPerfil`, `idUser`, `favGeneroPerfil`, `cepPerfil`, `cidadePerfil`, `bairroPerfil`, `cpfPerfil`, `path`) VALUES
(1, 'Felipones', 233, 'masculino', 'fdcf3822ffc218bf10f760f0e11db3be1f5a96a3_hq.jpg', 'dont worry be happy', 1, 'Ação', '8461510', 'São Paulo', 'Guaianases', '23432423234', '../LoginUser/arquivos/userImage/6534344db9dcd.jpg'),
(2, 'aloc', 232, 'masculino', 'creeper_1015260.jpg', 'CREEPER aww man', 2, 'Ação', '8461510', 'São Paulo', 'Guaianases', '25293435548', '../LoginUser/arquivos/userImage/65354dd9d7cfe.jpg');

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
-- Estrutura para tabela `tbteluser`
--

CREATE TABLE `tbteluser` (
  `idTelUser` int(11) NOT NULL,
  `numTelUser` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbteluser`
--

INSERT INTO `tbteluser` (`idTelUser`, `numTelUser`, `idUser`) VALUES
(1, 2147483647, 1),
(2, 2147483647, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtipolivro`
--

CREATE TABLE `tbtipolivro` (
  `idTipoLivro` int(11) NOT NULL,
  `descTipoLivro` varchar(100) NOT NULL
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

--
-- Despejando dados para a tabela `tbtroca`
--

INSERT INTO `tbtroca` (`idTroca`, `idSenderTroca`, `idReceiverTroca`, `valorPropostaTroca`, `prospostaTroca`, `idLivroReceptor`, `idLivroMainUser`, `statusTroca`) VALUES
(3, 1, 2, 232, 'teste', 2, 3, 'negada'),
(4, 1, 2, 43, 'teste', 2, 3, 'finalizada');

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

--
-- Despejando dados para a tabela `tbuser`
--

INSERT INTO `tbuser` (`idUser`, `emailUser`, `senhaUser`, `nomeUser`, `StatusUser`, `statusCadastro`, `onlineUser`, `tokenUser`, `secureUser`, `creationUser`) VALUES
(1, 'fel@gmail.com', '$2y$10$Nv5sJ4gkFYVDkldnMnSNaeehDcc08DpGy5/hIk3iQXiu/nZN7IrPm', 'Felipones', 'ativo', 'cadastrado', '2023-11-12 09:24:33', '', 0, '0000-00-00 00:00:00'),
(2, 'al@gmail.com', '$2y$10$Fo2rIimsvSGKvMwubuJSFOoe9rJ6BG3c5epetc3ieSuB.f9J7WSty', 'alcapono', 'ativo', 'cadastrado', '2023-11-12 09:25:13', '', 0, '0000-00-00 00:00:00');

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
-- Índices de tabela `tbgenerolivro`
--
ALTER TABLE `tbgenerolivro`
  ADD PRIMARY KEY (`idGeneroLivro`);

--
-- Índices de tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`idLivro`),
  ADD KEY `idTipoLivro` (`idTipoLivro`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idGeneroLivro` (`idGeneroLivro`);

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
  ADD PRIMARY KEY (`idPost`),
  ADD UNIQUE KEY `idLivro` (`idLivro`),
  ADD KEY `idLivro_2` (`idLivro`);

--
-- Índices de tabela `tbsalvos`
--
ALTER TABLE `tbsalvos`
  ADD PRIMARY KEY (`idSalvo`),
  ADD KEY `idPerfil` (`idPerfil`),
  ADD KEY `idLivro` (`idLivro`);

--
-- Índices de tabela `tbteluser`
--
ALTER TABLE `tbteluser`
  ADD PRIMARY KEY (`idTelUser`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

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
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbconversation`
--
ALTER TABLE `tbconversation`
  MODIFY `idConversation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbgenerolivro`
--
ALTER TABLE `tbgenerolivro`
  MODIFY `idGeneroLivro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de tabela `tbteluser`
--
ALTER TABLE `tbteluser`
  MODIFY `idTelUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbtipolivro`
--
ALTER TABLE `tbtipolivro`
  MODIFY `idTipoLivro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtroca`
--
ALTER TABLE `tbtroca`
  MODIFY `idTroca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbuseradm`
--
ALTER TABLE `tbuseradm`
  MODIFY `idUserAdm` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tblivro`
--
ALTER TABLE `tblivro`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `tbuser` (`idUser`);

--
-- Restrições para tabelas `tbsalvos`
--
ALTER TABLE `tbsalvos`
  ADD CONSTRAINT `idLivro` FOREIGN KEY (`idLivro`) REFERENCES `tblivro` (`idLivro`),
  ADD CONSTRAINT `idPerfil` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
