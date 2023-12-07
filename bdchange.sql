-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2023 às 21:03
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
-- Estrutura da tabela `tbchat`
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
-- Extraindo dados da tabela `tbchat`
--

INSERT INTO `tbchat` (`idChat`, `senderChat`, `receiverChat`, `messageChat`, `imageChat`, `creationChat`) VALUES
(5, 2, 1, 'alow', '', '2023-10-22 20:16:32'),
(6, 2, 1, 'alow', '', '2023-10-23 12:28:02'),
(9, 1, 2, 'dasasdas', '', '2023-11-10 22:34:47'),
(12, 2, 1, 'alow', '', '2023-11-20 14:36:11'),
(13, 2, 1, 'alow', '', '2023-11-20 14:40:17'),
(14, 3, 2, 'bom dia mano', '', '2023-11-20 14:49:08'),
(15, 3, 1, 'alow', '', '2023-11-20 16:16:17'),
(16, 3, 1, 'bom', '', '2023-11-20 16:16:56'),
(17, 3, 1, 'sadasd[', '', '2023-11-20 16:19:34'),
(18, 3, 1, 'mimimi', '', '2023-11-20 16:19:46'),
(19, 3, 2, 'alow', '', '2023-11-20 16:20:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbconversation`
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
-- Extraindo dados da tabela `tbconversation`
--

INSERT INTO `tbconversation` (`idConversation`, `mainUserConversation`, `otherUserConversation`, `unreadConversation`, `modificationConversation`, `creationConversation`) VALUES
(7, 2, 1, 'y', '2023-10-23 15:28:02', '2023-10-22 20:16:32'),
(8, 1, 2, 'y', '2023-10-22 23:16:32', '2023-10-22 20:16:32'),
(9, 1, 0, 'y', '2023-11-11 01:33:47', '2023-11-10 22:33:27'),
(10, 0, 1, 'y', '2023-11-11 01:33:27', '2023-11-10 22:33:27'),
(11, 2, 0, 'n', '2023-11-11 17:27:18', '2023-11-11 14:27:18'),
(12, 0, 2, 'y', '2023-11-11 17:27:18', '2023-11-11 14:27:18'),
(13, 3, 2, 'y', '2023-11-20 19:20:20', '2023-11-20 14:49:08'),
(14, 2, 3, 'y', '2023-11-20 17:49:08', '2023-11-20 14:49:08'),
(15, 3, 1, 'y', '2023-11-20 19:16:56', '2023-11-20 16:16:17'),
(16, 1, 3, 'y', '2023-11-20 19:16:17', '2023-11-20 16:16:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdenuncia`
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
-- Estrutura da tabela `tbgenerolivro`
--

CREATE TABLE `tbgenerolivro` (
  `idGeneroLivro` int(11) NOT NULL,
  `descGeneroLivro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivro`
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

--
-- Extraindo dados da tabela `tblivro`
--

INSERT INTO `tblivro` (`idLivro`, `nomeLivro`, `autorLivro`, `descLivro`, `idTipoLivro`, `edicaoLivro`, `editoraLivro`, `idiomaLivro`, `paginasLivro`, `acabamentoLivro`, `idUser`, `nomeArquivo`, `path`, `statusLivro`, `motivoTroca`, `valorTroca`, `opcTroca`, `dataLivro`, `generoLivro`) VALUES
(1, 'ewrwewer', 'rwerwe', 'rwewerw', 0, 0, 'erwe', 'werwe', 2342342, 'rwer', 2, 'fdcf3822ffc218bf10f760f0e11db3be1f5a96a3_hq.jpg', '../LoginUser/arquivos/654e6ae36c786.jpg', 'disponivel', '', '', '', '2023-11-26 13:06:53', ''),
(2, 'Viagem ao centro da terra', 'Julio verne', 'Viagem ao centro da Terra” é um livro de ficção científica escrito por Júlio Verne, que foi lançado ', 0, 1987, 'Julio Vern', 'Português', 223, 'Livreto', 2, 'viagem ao centro da terra.jpg', '../LoginUser/arquivos/654ea2399d78e.jpg', 'indisponivel', '', '', '', '2023-11-26 13:06:53', 'Ação'),
(3, 'Crie de manhã, administre à tarde', 'MAURICIO', 'Quando pesquisamos a palavra “negócios” associada ao Mauricio de Sousa, não há muito conteúdo dispon', 0, 2013, 'mauricio de souza', 'Português', 233, 'capa dura', 1, '61+RnISycmS._AC_UL160_SR160,160_.jpg', '../LoginUser/arquivos/6550223322465.jpg', 'indisponivel', '', '', '', '2023-11-26 13:06:53', ''),
(4, '2312321', '123', '32242343', 0, 11221, '312', '12312', 312312, '3123', 3, '67488_900x900.jpg', '../LoginUser/arquivos/655e9ac5761f7.jpg', 'disponivel', '', '', '', '2023-11-26 13:06:53', ''),
(5, 'er', 'rwer', 'werwr', 0, 0, 'wer', 'werw', 2342, 'werw', 1, '67488_900x900.jpg', '../LoginUser/arquivos/655e9ec0e2a8c.jpg', 'disponivel', '', '', '', '2023-11-26 13:06:53', ''),
(6, 'Cem Anos de Solidão', 'Gabriel García Márquez', '\"Muitos anos depois, diante do pelotão de fuzilamento, o coronel Aureliano Buendía haveria de record', 0, 1967, 'Dom Quixote', 'portugues', 384, 'capaDura', 2, 'cemAnosSolidao.jpg', '../LoginUser/arquivos/655ffd6b65619.jpg', 'disponivel', 'Ganhei o livro e gostaria de trocar por outro', '0', 'Orgulho e preconceito', '2023-11-26 13:06:53', 'Ação'),
(7, 'Orgulho e preconceito', 'Jane Austen Ian Edginton', 'Elizabeth e suas quatro irmãs estão impossibilitadas de herdar a propriedade de seu velho pai e enfrentam a ameaça do despejo. As irmãs devem garantir sua segurança financeira por meio do casamento, mas nossa heroína tem outros planos.\r\n\r\nEla fez votos de se casar somente por amor. Seu olhar acaba capturado pelo distinto Sr. Darcy, mas quem irá salvar os Bennets? Elizabeth deve se casar por amor ou deve salvar sua família?\r\n\r\nUma adaptação fiel e primorosa do clássico romance de Jane Austen para', 0, 2012, 'Nemo', 'portugues', 144, 'capaDura', 11, 'orgulhoEPreconceito.jpg', '../LoginUser/arquivos/6560091853adb.jpg', 'disponivel', 'n gosto', '0', 'qualquer coisa', '2023-11-26 13:06:53', 'Ação'),
(8, 'Dom Quixote', 'Miguel de Cervantes Saavedra', 'De tanto ler antigos livros de cavalaria, o pacato Alonso \r\nQuijano perde o juízo e resolve levar a vida de um cavaleiro andante\r\n. Depois de equipar-se com a velha armadura herdada dos bisavós e de\r\n fazer-se ordenar por um estalajadeiro, transforma-se no mui afamado\r\n Dom Quixote de La Mancha. Na companhia do cavalo Rocinante e do fiel \r\nescudeiro Sancho Pança, sai mundo afora em busca de aventuras. Pelo caminho, \r\no engenhoso fidalgo encontra uma caravana de beneditinos, uma procissão de peni', 0, 2012, 'Ediciones Cátedra', 'portugues', 60, 'capaDura', 2, 'domquixote.jpg', '../LoginUser/arquivos/65636d9047513.jpg', 'disponivel', 'Terminei De Ler', '', 'Great Gatsby', '2023-11-26 13:08:48', ''),
(9, 'Memórias Póstumas de Brás Cubas', 'Machado de Assis', 'A princípio, mortos não falam. Isto é, quando eles não têm uma história para contar. Brás Cubas tem, por isso, torna-se um defunto autor (não confundir com um autor defunto!).\r\n\r\nO protagonista conta em seu livro a história de sua existência em vida, de suas experiências e de sua grande ideia. Narra seu enterro, sua infância, seus amores e sua alta expectativa para com o Emplasto Brás Cubas, um medicamento anti-hipocondríaco com grande potencial para curar as pessoas..\r\n\r\nAgora em edição de bols', 0, 2012, 'Capa comum', 'portugues', 200, 'brochura', 2, 'brascubas.jpg', '../LoginUser/arquivos/65636ea6e984b.jpg', 'disponivel', 'Quero outro livro', '', 'qualquer coisa', '2023-11-26 13:13:26', ''),
(10, 'Breves respostas para grandes questões', 'Stephen Hawking', 'Esse é o último livro do renomado físico e cosmólogo britânico Stephen Hawking, falecido pouco antes da publicação da obra, em 2018.\r\n\r\nAqui, Hawking aborda questões de difícil compreensão, trazendo respostas simples, elaboradas com base em seus estudos científicos da vida toda.\r\n\r\nAssim, esse é um belo livro para expandir a mente, onde temos acesso a suas reflexões para perguntas como:  Sobreviveremos na Terra?, O que há dentro de um buraco negro?, e outras tantas dúvidas da humanidade.', 0, 2018, 'Stephen Hawking', 'ingles', 200, 'capaMole', 1, 'breves-repostas-para-grandes-questoes-cke.jpg', '../LoginUser/arquivos/65637f1e45709.jpg', 'disponivel', 'Quero outro', '', 'Qualquer outro livro', '2023-11-26 14:23:42', 'Ação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbperfil`
--

CREATE TABLE `tbperfil` (
  `idPerfil` int(11) NOT NULL,
  `apelidoPerfil` varchar(50) NOT NULL,
  `idadePerfil` smallint(6) NOT NULL,
  `sexoPerfil` varchar(10) NOT NULL,
  `fotoPerfil` varchar(150) NOT NULL,
  `biografiaPerfil` varchar(200) NOT NULL,
  `idUser` int(11) NOT NULL,
  `favGeneroPerfil` varchar(120) NOT NULL,
  `cepPerfil` char(8) NOT NULL,
  `cidadePerfil` varchar(50) NOT NULL,
  `bairroPerfil` varchar(50) NOT NULL,
  `cpfPerfil` char(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbperfil`
--

INSERT INTO `tbperfil` (`idPerfil`, `apelidoPerfil`, `idadePerfil`, `sexoPerfil`, `fotoPerfil`, `biografiaPerfil`, `idUser`, `favGeneroPerfil`, `cepPerfil`, `cidadePerfil`, `bairroPerfil`, `cpfPerfil`, `path`) VALUES
(1, 'Felipones', 233, 'masculino', 'fdcf3822ffc218bf10f760f0e11db3be1f5a96a3_hq.jpg', 'dont worry be happy', 1, 'Ação', '8461510', 'São Paulo', 'Guaianases', '23432423234', '../LoginUser/arquivos/userImage/65627c418e0ff.jpg'),
(2, 'aloc', 232, 'masculino', 'creeper_1015260.jpg', 'CREEPER aww man', 2, 'Ação', '8461510', 'São Paulo', 'Guaianases', '25293435548', '../LoginUser/arquivos/userImage/65354dd9d7cfe.jpg'),
(3, 'Kiko', 9, 'masculino', 'Quico.png', 'Quico Quico RÁ RA RÁ', 3, 'Ação', '8461510', 'São Paulo', 'Guaianases', '213.131.231', '../LoginUser/arquivos/userImage/656283c66bc7c.png'),
(4, 'Kiko', 9, 'masculino', 'Quico.png', 'Quico Quico RÁ RA RÁ', 3, 'Ação', '8461510', 'São Paulo', 'Guaianases', '213.131.231', '../LoginUser/arquivos/userImage/656283c66bc7c.png'),
(5, 'miau', 22, 'masculino', 'OIP.jpg', 'n sei2', 11, ',Ação,Poesia,Bi', '01226-90', '', '', '922.900.470', '../LoginUser/arquivos/userImage/6560087d16abb.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpost`
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
-- Estrutura da tabela `tbsalvos`
--

CREATE TABLE `tbsalvos` (
  `idSalvo` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `idLivro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbseguir`
--

CREATE TABLE `tbseguir` (
  `idSeguir` int(11) NOT NULL,
  `idSeguindo` int(11) NOT NULL,
  `idPerfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbseguir`
--

INSERT INTO `tbseguir` (`idSeguir`, `idSeguindo`, `idPerfil`) VALUES
(22, 3, 2),
(24, 11, 2),
(32, 1, 2),
(33, 1, 3),
(34, 11, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbteluser`
--

CREATE TABLE `tbteluser` (
  `idTelUser` int(11) NOT NULL,
  `numTelUser` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbteluser`
--

INSERT INTO `tbteluser` (`idTelUser`, `numTelUser`, `idUser`) VALUES
(1, 2147483647, 1),
(2, 2147483647, 2),
(3, 2147483647, 3),
(4, 2147483647, 3),
(5, 0, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipolivro`
--

CREATE TABLE `tbtipolivro` (
  `idTipoLivro` int(11) NOT NULL,
  `descTipoLivro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtroca`
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
-- Extraindo dados da tabela `tbtroca`
--

INSERT INTO `tbtroca` (`idTroca`, `idSenderTroca`, `idReceiverTroca`, `valorPropostaTroca`, `prospostaTroca`, `idLivroReceptor`, `idLivroMainUser`, `statusTroca`) VALUES
(3, 1, 2, 232, 'teste', 2, 3, 'negada'),
(4, 1, 2, 43, 'teste', 2, 3, 'finalizada'),
(5, 11, 2, 0, 'teste', 6, 7, 'aberta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuser`
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
-- Extraindo dados da tabela `tbuser`
--

INSERT INTO `tbuser` (`idUser`, `emailUser`, `senhaUser`, `nomeUser`, `StatusUser`, `statusCadastro`, `onlineUser`, `tokenUser`, `secureUser`, `creationUser`) VALUES
(1, 'fel@gmail.com', '$2y$10$Nv5sJ4gkFYVDkldnMnSNaeehDcc08DpGy5/hIk3iQXiu/nZN7IrPm', 'Felipones', 'ativo', 'cadastrado', '2023-11-26 14:44:44', '', 0, '0000-00-00 00:00:00'),
(2, 'al@gmail.com', '$2y$10$Fo2rIimsvSGKvMwubuJSFOoe9rJ6BG3c5epetc3ieSuB.f9J7WSty', 'alcapono', 'ativo', 'cadastrado', '2023-11-27 16:49:38', '', 0, '0000-00-00 00:00:00'),
(3, 'kiko@gmail.com', '$2y$10$y1JhXjJfjuqo9hrQPJRAROgxoGM0/I6F8MceQJvJaLkLqv0v5mD..', 'kiko', 'ativo', 'cadastrado', '2023-11-26 14:53:28', '', 0, '0000-00-00 00:00:00'),
(10, 'tccgrupoETEC01@gmail.com', '\r\n        $2y$10$ccXdL0ovrcC1lYHfYHZ47.VP110xDRx/CXUncvtrav9Xd2bfG7ECa', 'renan zeldinho', 'ativo', 'pendente', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00'),
(11, 'gu@gmail.com', '$2y$10$YDWhrbYXhek9Yd4bxqUH7.bwtd4.aY2cpupBd9QqxZuyuZAS.smYu', 'Gusta', 'ativo', 'cadastrado', '2023-11-23 23:16:11', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuseradm`
--

CREATE TABLE `tbuseradm` (
  `idUserAdm` int(11) NOT NULL,
  `emailUserAdm` varchar(100) NOT NULL,
  `senhaUserAdm` varchar(100) NOT NULL,
  `nomeUserAdm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbuseradm`
--

INSERT INTO `tbuseradm` (`idUserAdm`, `emailUserAdm`, `senhaUserAdm`, `nomeUserAdm`) VALUES
(1, 'admin@gmail.com', '123', 'Admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbchat`
--
ALTER TABLE `tbchat`
  ADD PRIMARY KEY (`idChat`);

--
-- Índices para tabela `tbconversation`
--
ALTER TABLE `tbconversation`
  ADD PRIMARY KEY (`idConversation`);

--
-- Índices para tabela `tbdenuncia`
--
ALTER TABLE `tbdenuncia`
  ADD PRIMARY KEY (`idDenuncia`);

--
-- Índices para tabela `tbgenerolivro`
--
ALTER TABLE `tbgenerolivro`
  ADD PRIMARY KEY (`idGeneroLivro`);

--
-- Índices para tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`idLivro`),
  ADD KEY `idTipoLivro` (`idTipoLivro`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `tbpost`
--
ALTER TABLE `tbpost`
  ADD PRIMARY KEY (`idPost`),
  ADD UNIQUE KEY `idLivro` (`idLivro`),
  ADD KEY `idLivro_2` (`idLivro`);

--
-- Índices para tabela `tbsalvos`
--
ALTER TABLE `tbsalvos`
  ADD PRIMARY KEY (`idSalvo`),
  ADD KEY `idPerfil` (`idPerfil`),
  ADD KEY `idLivro` (`idLivro`);

--
-- Índices para tabela `tbseguir`
--
ALTER TABLE `tbseguir`
  ADD PRIMARY KEY (`idSeguir`),
  ADD KEY `idPerfil` (`idPerfil`);

--
-- Índices para tabela `tbteluser`
--
ALTER TABLE `tbteluser`
  ADD PRIMARY KEY (`idTelUser`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

--
-- Índices para tabela `tbtipolivro`
--
ALTER TABLE `tbtipolivro`
  ADD PRIMARY KEY (`idTipoLivro`);

--
-- Índices para tabela `tbtroca`
--
ALTER TABLE `tbtroca`
  ADD PRIMARY KEY (`idTroca`);

--
-- Índices para tabela `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`idUser`);

--
-- Índices para tabela `tbuseradm`
--
ALTER TABLE `tbuseradm`
  ADD PRIMARY KEY (`idUserAdm`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbchat`
--
ALTER TABLE `tbchat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbconversation`
--
ALTER TABLE `tbconversation`
  MODIFY `idConversation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `idSeguir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `tbteluser`
--
ALTER TABLE `tbteluser`
  MODIFY `idTelUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbtipolivro`
--
ALTER TABLE `tbtipolivro`
  MODIFY `idTipoLivro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtroca`
--
ALTER TABLE `tbtroca`
  MODIFY `idTroca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbuseradm`
--
ALTER TABLE `tbuseradm`
  MODIFY `idUserAdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `tbuser` (`idUser`);

--
-- Limitadores para a tabela `tbsalvos`
--
ALTER TABLE `tbsalvos`
  ADD CONSTRAINT `idLivro` FOREIGN KEY (`idLivro`) REFERENCES `tblivro` (`idLivro`),
  ADD CONSTRAINT `idPerfil` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
