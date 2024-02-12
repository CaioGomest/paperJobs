-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para paperjobs
CREATE DATABASE IF NOT EXISTS `paperjobs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `paperjobs`;

-- Copiando estrutura para tabela paperjobs.servicos
CREATE TABLE IF NOT EXISTS `servicos` (
  `servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `servico_autor_id` varchar(50) NOT NULL DEFAULT '0',
  `servico_titulo` varchar(50) NOT NULL DEFAULT '0',
  `servico_descricao` varchar(250) NOT NULL DEFAULT '0',
  `servico_valor` int(11) NOT NULL DEFAULT 50,
  `servico_status` varchar(50) NOT NULL DEFAULT '0',
  `servico_data` timestamp NOT NULL DEFAULT current_timestamp(),
  `servico_orcamento_max` int(11) NOT NULL DEFAULT 0,
  `servico_tecnologias_usadas` varchar(50) DEFAULT NULL,
  `servico_prazo_max` varchar(50) DEFAULT NULL,
  `servico_ativo` int(11) DEFAULT 0,
  PRIMARY KEY (`servico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela paperjobs.servicos: ~25 rows (aproximadamente)
INSERT INTO `servicos` (`servico_id`, `servico_autor_id`, `servico_titulo`, `servico_descricao`, `servico_valor`, `servico_status`, `servico_data`, `servico_orcamento_max`, `servico_tecnologias_usadas`, `servico_prazo_max`, `servico_ativo`) VALUES
	(1, '1', 'Desesnvolvimento de Site', 'Olá, tenho uma empresa de paisagismo e quero um site que mostre nossos projetos de forma visualmente atraente. Pode criar uma plataforma que realce a beleza do nosso trabalho?', 50, '0', '2023-12-30 22:19:49', 333, 'php', '1 semana', 0),
	(8, '1', 'Manutenção de Software', 'Preciso de assistência na manutenção de um software existente. São principalmente correções de bugs e atualizações de segurança.', 80, '0', '2023-12-31 01:19:49', 500, 'Java', '2 semanas', 0),
	(9, '1', 'Design Gráfico para Logotipo', 'Estou procurando um designer gráfico para criar um logotipo moderno e elegante para minha empresa.', 120, '0', '2023-12-31 01:19:49', 200, 'Adobe Illustrator', '1 semana', 0),
	(10, '1', 'Tradução de Documento', 'Preciso de alguém para traduzir um documento técnico de inglês para português. O documento possui cerca de 20 páginas.', 50, '0', '2023-12-31 01:19:49', 150, 'N/A', '2 dias', 0),
	(11, '1', 'Consultoria em Marketing Digital', 'Busco um especialista em marketing digital para me orientar na criação de uma estratégia eficaz para minha empresa online.', 200, '0', '2023-12-31 01:19:49', 1000, 'SEO, Redes Sociais', '1 mês', 0),
	(12, '1', 'Desenvolvimento de Aplicativo Mobile', 'Preciso de um aplicativo móvel para a minha loja online. O aplicativo deve ser compatível com iOS e Android.', 500, '0', '2023-12-31 01:19:49', 2000, 'React Native', '2 meses', 0),
	(13, '2', 'Suporte Técnico Remoto', 'Estou enfrentando problemas com meu computador e preciso de ajuda para solucionar remotamente. Pode oferecer suporte técnico?', 30, '0', '2023-12-31 01:19:49', 100, 'TeamViewer, AnyDesk', '1 dia', 0),
	(14, '3', 'Aulas de Programação Online', 'Ofereço aulas particulares de programação para iniciantes. Cobriremos conceitos básicos até tópicos mais avançados.', 40, '0', '2023-12-31 01:19:49', 300, 'Python, JavaScript', '4 semanas', 0),
	(15, '1', 'Revisão de Texto', 'Necessito de alguém para revisar meu artigo acadêmico. A revisão deve incluir gramática, ortografia e coesão textual.', 25, '0', '2023-12-31 01:19:49', 50, 'N/A', '1 semana', 0),
	(16, '1', 'Consultoria em Desenvolvimento Web', 'Ofereço consultoria especializada em desenvolvimento web. Podemos discutir estratégias, melhores práticas e soluções para otimizar seu projeto.', 80, '0', '2023-12-31 01:19:49', 300, 'N/A', '2 semanas', 0),
	(17, '1', 'Design de Interface para Aplicativo', 'Crio designs de interface atraentes e intuitivos para aplicativos móveis. Garanto uma experiência do usuário excepcional.', 120, '0', '2023-12-31 01:19:49', 500, 'Figma, Adobe XD', '3 semanas', 0),
	(18, '1', 'Configuração de Servidor Cloud', 'Ajudo na configuração e otimização de servidores na nuvem para garantir desempenho e segurança.', 150, '0', '2023-12-31 01:19:49', 800, 'AWS, Azure', '1 mês', 0),
	(19, '1', 'Aulas de Fotografia', 'Ministro aulas práticas e teóricas de fotografia para iniciantes e entusiastas. Explore as técnicas e a arte por trás de uma boa fotografia.', 40, '0', '2023-12-31 01:19:49', 200, 'N/A', '4 semanas', 0),
	(20, '1', 'Desenvolvimento de Plugin WordPress', 'Desenvolvo plugins personalizados para WordPress, atendendo às necessidades específicas do seu site.', 60, '0', '2023-12-31 01:19:49', 400, 'PHP, WordPress', '2 semanas', 0),
	(21, '1', 'Análise de Segurança de Rede', 'Realizo análises abrangentes de segurança de rede para identificar vulnerabilidades e propor soluções.', 200, '0', '2023-12-31 01:19:49', 1000, 'Wireshark, Nmap', '1 mês', 0),
	(22, '1', 'Assessoria Financeira Pessoal', 'Ofereço orientação financeira pessoal, ajudando a criar orçamentos, economizar e investir de forma inteligente.', 50, '0', '2023-12-31 01:19:49', 300, 'N/A', '3 semanas', 0),
	(23, '1', 'Edição de Vídeo Profissional', 'Realizo edições profissionais de vídeo para diversos fins, incluindo vídeos promocionais, tutoriais e conteúdo online.', 80, '0', '2023-12-31 01:19:49', 500, 'Adobe Premiere, Final Cut', '2 semanas', 0),
	(24, '1', 'Desenvolvimento de Jogo Mobile', 'Desenvolvo jogos envolventes para dispositivos móveis. Desde a concepção até a implementação, garanto uma experiência de jogo única.', 150, '0', '2023-12-31 01:19:49', 1000, 'Unity, C#', '1 mês', 0),
	(25, '2', 'Treinamento em SEO', 'Ofereço treinamento prático em Search Engine Optimization (SEO) para melhorar a visibilidade online do seu site.', 60, '0', '2023-12-31 01:19:49', 400, 'Google Analytics, SEMrush', '4 semanas', 0),
	(26, '92', 'Desenvolvimento de Site', 'rtedgd', 33, '0', '2024-01-28 03:27:31', 33, '4rvdf', '2024-01-17', 0),
	(27, '92', 'Desenvolvimento de Site', 'rtedgd', 33, '0', '2024-01-28 03:27:35', 33, '4rvdf', '2024-01-17', 0),
	(28, '92', 'Desenvolvimento de Site', 'aaaaaaaaaaaahhahahahahhaa', 1, '0', '2024-01-28 03:28:02', 2147483647, 'aaaaaaaaaaaaaa', '', 0),
	(29, '92', 'Desenvolvimento de Site', '', 0, '0', '2024-01-28 04:12:50', 0, '', '', 0),
	(30, '92', 'Desenvolvimento de Site', '', 0, '0', '2024-01-28 04:17:32', 0, '', '', 0),
	(31, '94', 'Desenvolvimento de Site', '', 0, '0', '2024-01-31 23:47:27', 0, '', '', 0);

-- Copiando estrutura para tabela paperjobs.servicos_desbloqueados
CREATE TABLE IF NOT EXISTS `servicos_desbloqueados` (
  `servico_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela paperjobs.servicos_desbloqueados: ~9 rows (aproximadamente)
INSERT INTO `servicos_desbloqueados` (`servico_id`, `usuario_id`) VALUES
	(1, 92),
	(5, 92),
	(6, 92),
	(28, 92),
	(30, 92),
	(27, 92),
	(9, 92),
	(30, 94),
	(29, 94);

-- Copiando estrutura para tabela paperjobs.servicos_status
CREATE TABLE IF NOT EXISTS `servicos_status` (
  `servico_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `servico_status_nome` varchar(50) NOT NULL DEFAULT '',
  `servico_status_quantidade_desbloqueado` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`servico_status_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela paperjobs.servicos_status: ~7 rows (aproximadamente)
INSERT INTO `servicos_status` (`servico_status_id`, `servico_status_nome`, `servico_status_quantidade_desbloqueado`) VALUES
	(0, 'Ninguem Atendeu esse serviço', 0),
	(1, 'Venha Negociar esse serviço', 1),
	(2, '2 Pessoas já se Interessaram', 2),
	(3, 'Venha Negociar!!', 3),
	(4, 'Aproveite essa ultima chance ', 4),
	(5, 'Serviço fechado!', 5);

-- Copiando estrutura para tabela paperjobs.servico_tipo
CREATE TABLE IF NOT EXISTS `servico_tipo` (
  `servico_tipo_id` int(11) NOT NULL,
  `servico_tipo_nome` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`servico_tipo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela paperjobs.servico_tipo: ~8 rows (aproximadamente)
INSERT INTO `servico_tipo` (`servico_tipo_id`, `servico_tipo_nome`) VALUES
	(0, 'Desenvolvimento de Site'),
	(1, 'Desenvolvimento de Sistema'),
	(2, 'Desenvolvimento de Design'),
	(3, 'Desenvolvimento de Identidade Visual'),
	(4, 'Manutenção de Software'),
	(5, 'Assessoria'),
	(6, 'Consultoria'),
	(7, 'Prestação de serviço');

-- Copiando estrutura para tabela paperjobs.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nome` varchar(255) NOT NULL,
  `usuario_email` varchar(255) NOT NULL,
  `usuario_senha` varchar(255) NOT NULL,
  `usuario_numero` varchar(20) NOT NULL,
  `usuario_nivel` varchar(6) NOT NULL,
  `usuario_status` int(11) NOT NULL,
  `usuario_ultimo_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_pontos` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela paperjobs.usuarios: ~6 rows (aproximadamente)
INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_email`, `usuario_senha`, `usuario_numero`, `usuario_nivel`, `usuario_status`, `usuario_ultimo_login`, `usuario_criado`, `usuario_pontos`) VALUES
	(1, 'Caio Gomes Teodoro', 'c@gmail.com', '$2y$10$VuMHffgDZCAOppNUJtk.u.e3KAp4ktEnX0otczb.TmlPq.hv.7qQC', '', '', 0, '2024-01-05 02:27:32', '2023-12-02 01:57:55', 1754),
	(2, 'teste tes ', 'admin@gmail.com', '$2y$10$zjXPRwC2QX0JjVvKftDCBeyGHmyY7Js3ixLIasc/.T0h5vfb.4M6K', '1234', 'user', 0, '2024-01-05 02:26:12', '2023-12-31 14:16:22', 643),
	(92, 'Brunin', 'b@gmail.com', '$2y$10$gHDBl2d3/yL72/xowPQu1.FE2eFzxHnC9brbNdsVqGPe1k8VIXNei', '1111111', '', 0, '2024-01-29 01:07:51', '2024-01-02 02:02:52', 11105461),
	(93, '', '', '', '', '', 0, '2024-01-05 01:58:30', '2024-01-02 02:22:00', 11112),
	(94, 'caio', 'caiogomesteodoro21@gmail.com', '$2y$10$sf4VwpgRiMBB3oJVDEj9i.GtB9ur5hCrGAJR01cSnnubWauexKbVq', '(11) 94589-4011', '', 0, '2024-02-04 13:08:42', '2024-01-30 23:48:15', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
