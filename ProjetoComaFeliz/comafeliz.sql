-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para comafeliz
CREATE DATABASE IF NOT EXISTS `comafeliz` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `comafeliz`;

-- Copiando estrutura para tabela comafeliz.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela comafeliz.administrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`id_administrador`, `login`, `senha`) VALUES
	(1, 'ifbaiano2022', '123@Mudar');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Copiando estrutura para tabela comafeliz.agendamento
CREATE TABLE IF NOT EXISTS `agendamento` (
  `id_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `data_desejada` date NOT NULL DEFAULT curdate(),
  `justificativa` varchar(500) NOT NULL,
  `status_agendamento` varchar(20) DEFAULT 'Em espera',
  `motivo_recusa` varchar(500) DEFAULT NULL,
  `data_agendamento` timestamp NULL DEFAULT current_timestamp(),
  `matricula` varchar(30) NOT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agendamento`),
  KEY `fk_agendamento_aluno` (`matricula`),
  KEY `fk_agendamento_administrador` (`id_administrador`),
  CONSTRAINT `fk_agendamento_administrador` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`),
  CONSTRAINT `fk_agendamento_aluno` FOREIGN KEY (`matricula`) REFERENCES `aluno` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela comafeliz.agendamento: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `agendamento` DISABLE KEYS */;
INSERT INTO `agendamento` (`id_agendamento`, `data_desejada`, `justificativa`, `status_agendamento`, `motivo_recusa`, `data_agendamento`, `matricula`, `id_administrador`) VALUES
	(3, '2022-06-14', 'quero comer', NULL, NULL, '2022-06-13 11:34:31', '20193014802', 1),
	(4, '2022-06-14', 'quero comer', NULL, NULL, '2022-06-13 14:19:41', '20193014802', 1),
	(5, '2022-07-14', 'quero comer', NULL, NULL, '2022-06-13 14:20:53', '20193014802', 1),
	(6, '0000-00-00', 'quero almoçar aqui', NULL, NULL, '2022-06-13 14:24:48', '20193014802', 1),
	(7, '2022-06-08', 'adsfkjasdlfkajsdf', NULL, NULL, '2022-06-13 14:27:07', '20193014802', 1),
	(8, '2022-06-22', 'fasfdsads', NULL, NULL, '2022-06-13 14:27:32', '20193014802', 1),
	(9, '2022-06-19', 'gsdfgsdfgsdfgsdgfs', NULL, NULL, '2022-06-13 14:37:04', '20193014802', 1),
	(10, '2022-06-17', 'sdasfasfdas', 'Em espera', NULL, '2022-06-13 14:44:26', '20193014802', 1),
	(11, '2022-06-15', 'sasfasfs', 'Em espera', NULL, '2022-06-13 14:45:01', '20193014802', 1),
	(12, '2022-07-01', 'asdfsfdsfd', 'Em espera', NULL, '2022-06-13 14:45:21', '20193014802', 1),
	(13, '2022-06-17', 'safsfdasdfasfd', 'Em espera', NULL, '2022-06-13 14:45:29', '20193014802', 1),
	(14, '2022-06-21', 'safdasdf', 'Em espera', NULL, '2022-06-13 14:45:36', '20193014802', 1),
	(15, '2022-06-18', 'asfdasdfasdf', 'Em espera', NULL, '2022-06-13 14:45:49', '20193014802', 1),
	(16, '2022-06-11', 'asdfasf', 'Em espera', NULL, '2022-06-13 14:45:58', '20193014802', 1),
	(17, '2022-06-15', 'safsdfs', 'Em espera', NULL, '2022-06-13 14:46:05', '20193014802', 1),
	(18, '2022-06-09', 'sdfas', 'Em espera', NULL, '2022-06-13 15:23:16', '20193014802', 1),
	(19, '2022-06-09', 'sdfas', 'Em espera', NULL, '2022-06-13 15:23:29', '20193014802', 1),
	(20, '2022-06-17', 'asdfaf', 'Em espera', NULL, '2022-06-13 15:24:02', '20193014802', 1),
	(21, '2022-06-17', 'asdfaf', 'Em espera', NULL, '2022-06-13 15:24:21', '20193014802', 1),
	(22, '2022-06-17', 'asdfaf', 'Em espera', NULL, '2022-06-13 15:25:48', '20193014802', 1),
	(23, '2022-06-17', 'asdfaf', 'Em espera', NULL, '2022-06-13 15:27:06', '20193014802', 1),
	(24, '2022-06-24', 'fdsgfdgs', 'Em espera', NULL, '2022-06-13 15:29:38', '20193014802', 1),
	(25, '2022-06-24', 'fdsgfdgs', 'Em espera', NULL, '2022-06-13 15:30:38', '20193014802', 1),
	(26, '2022-06-24', 'fdsgfdgs', 'Em espera', NULL, '2022-06-13 15:30:50', '20193014802', 1),
	(27, '2022-06-24', 'fdsgfdgs', 'Em espera', NULL, '2022-06-13 15:31:50', '20193014802', 1),
	(28, '2022-06-24', 'fdsgfdgs', 'Em espera', NULL, '2022-06-13 15:31:52', '20193014802', 1),
	(29, '2022-06-24', 'fdsgfdgs', 'Em espera', NULL, '2022-06-13 15:33:28', '20193014802', 1),
	(30, '2022-06-24', 'fdsgfdgs', 'Em espera', NULL, '2022-06-13 15:33:31', '20193014802', 1),
	(31, '2022-06-24', 'fdsgfdgs', 'Em espera', NULL, '2022-06-13 15:34:47', '20193014802', 1),
	(32, '2022-06-14', 'asdsdf', 'Em espera', NULL, '2022-06-13 17:05:18', '20193014802', 1);
/*!40000 ALTER TABLE `agendamento` ENABLE KEYS */;

-- Copiando estrutura para tabela comafeliz.aluno
CREATE TABLE IF NOT EXISTS `aluno` (
  `matricula` varchar(30) NOT NULL,
  `senha` varchar(16) DEFAULT NULL,
  `nome_aluno` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_aluno_curso` (`id_curso`),
  CONSTRAINT `fk_aluno_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela comafeliz.aluno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` (`matricula`, `senha`, `nome_aluno`, `email`, `id_curso`) VALUES
	('20193014802', 'jhoy2019', 'Jhoy Kallebe Carvalho Fernandes', 'kallebejhoy@gmai.com', 1);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;

-- Copiando estrutura para tabela comafeliz.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela comafeliz.curso: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`id_curso`, `nome_curso`) VALUES
	(1, 'Informática'),
	(2, 'Agricultura'),
	(3, 'Agroecologia');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
