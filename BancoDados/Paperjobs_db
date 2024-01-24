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
  PRIMARY KEY (`servico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela paperjobs.servicos: ~7 rows (aproximadamente)
INSERT INTO `servicos` (`servico_id`, `servico_autor_id`, `servico_titulo`, `servico_descricao`, `servico_valor`, `servico_status`, `servico_data`, `servico_orcamento_max`, `servico_tecnologias_usadas`, `servico_prazo_max`) VALUES
	(1, '1', 'Desesnvolvimento de Site', 'Olá, tenho uma empresa de paisagismo e quero um site que mostre nossos projetos de forma visualmente atraente. Pode criar uma plataforma que realce a beleza do nosso trabalho?', 50, '0', '2023-12-30 22:19:49', 333, 'php', '1 semana'),
	(2, '2', 'Desesnvolvimento de lojinha online', 'ssssssssssssssssssssssssssssss fsf f jnsmc jnsjv j fjsm jsn jv  jsn f jsfn j fslskl', 234, '2', '2023-12-30 22:19:49', 400, 'php', '41 semana'),
	(3, '1', 'Desesnvolvimento de sla', 'ssssssssssssssssssssssssssssss fsf f jnsmc jnsjv j fjsm jsn jv  jsn f jsfn j fslskl', 234, '0', '2023-12-30 22:19:49', 999, 'php', '13 semana'),
	(4, '2', 'Desesnvolvimento de online', 'ssssssssssssssssssssssssssssss fsf f jnsmc jnsjv j fjsm jsn jv  jsn f jsfn j fslskl', 988, '1', '2023-12-30 22:19:49', 7770, 'php', '1 mes'),
	(5, '1', 'Desesnvolvimento de algo', 'ssssssssssssssssssssssssssssss fsf f jnsmc jnsjv j fjsm jsn jv  jsn f jsfn j fslskl', 234, '0', '2023-12-30 22:19:49', 300, 'php', '3 semana'),
	(6, '2', 'Desesnvolvimento de dinheiro', 'ssssssssssssssssssssssssssssss fsf f jnsmc jnsjv j fjsm jsn jv  jsn f jsfn j fslskl', 566, '3', '2023-12-30 22:19:49', 400, 'php', '5 semana'),
	(7, '1', 'Desesnvolvimento de lojinha online', 'ssssssssssssssssssssssssssssss fsf f jnsmc jnsjv j fjsm jsn jv  jsn f jsfn j fslskl', 234, '0', '2023-12-30 22:19:49', 4880, 'php', '2 semana');

-- Copiando estrutura para tabela paperjobs.servicos_status
CREATE TABLE IF NOT EXISTS `servicos_status` (
  `servico_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `servico_status_nome` varchar(50) NOT NULL DEFAULT '',
  `servico_status_quantidade_desbloqueado` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`servico_status_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela paperjobs.servicos_status: ~5 rows (aproximadamente)
INSERT INTO `servicos_status` (`servico_status_id`, `servico_status_nome`, `servico_status_quantidade_desbloqueado`) VALUES
	(0, 'Ninguem Atendeu esse serviço', 0),
	(1, 'Venha Negociar esse serviço', 1),
	(2, '2 Pessoas já se Interessaram', 2),
	(3, 'Aproveite essa ultima chance ', 3),
	(4, 'Serviço fechado!', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela paperjobs.usuarios: ~4 rows (aproximadamente)
INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_email`, `usuario_senha`, `usuario_numero`, `usuario_nivel`, `usuario_status`, `usuario_ultimo_login`, `usuario_criado`, `usuario_pontos`) VALUES
	(1, 'Caio Gomes Teodoro', 'c@gmail.com', '$2y$10$VuMHffgDZCAOppNUJtk.u.e3KAp4ktEnX0otczb.TmlPq.hv.7qQC', '', '', 0, '2024-01-03 00:23:36', '2023-12-02 01:57:55', 205),
	(2, 'teste tes ', 'admin@gmail.com', '$2y$10$zjXPRwC2QX0JjVvKftDCBeyGHmyY7Js3ixLIasc/.T0h5vfb.4M6K', '1234', 'user', 0, '2023-12-31 22:52:45', '2023-12-31 14:16:22', 0),
	(92, 'Brunin', 'b@gmail.com', '$2y$10$gHDBl2d3/yL72/xowPQu1.FE2eFzxHnC9brbNdsVqGPe1k8VIXNei', '1111111', '', 0, '2024-01-03 02:54:26', '2024-01-02 02:02:52', 13),
	(93, '', '', '', '', '', 0, '2024-01-02 02:22:00', '2024-01-02 02:22:00', 111);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
