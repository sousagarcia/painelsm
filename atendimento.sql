/*
SQLyog Enterprise - MySQL GUI v6.5
MySQL - 5.5.5-10.1.8-MariaDB : Database - atendimento
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

create database if not exists `atendimento`;

USE `atendimento`;

/*Table structure for table `aux_login` */

DROP TABLE IF EXISTS `aux_login`;

CREATE TABLE `aux_login` (
  `login_atual` varchar(20) DEFAULT 'guiche01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aux_login` */

insert  into `aux_login`(`login_atual`) values ('guiche01');

/*Table structure for table `aux_painel` */

DROP TABLE IF EXISTS `aux_painel`;

CREATE TABLE `aux_painel` (
  `aux` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aux_painel` */

insert  into `aux_painel`(`aux`) values (0);

/*Table structure for table `cadastro_usuario` */

DROP TABLE IF EXISTS `cadastro_usuario`;

CREATE TABLE `cadastro_usuario` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(48) DEFAULT NULL,
  `perfil` varchar(48) DEFAULT NULL,
  `mesa` int(1) DEFAULT NULL,
  `tipo_atendimento` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `cadastro_usuario` */

insert  into `cadastro_usuario`(`id`,`nome_usuario`,`login`,`senha`,`perfil`,`mesa`,`tipo_atendimento`) values (2,'Guiche 01','guiche01','123','Administrador',1,'C'),(3,'Guiche 02','guiche02','123','Administrador',2,'C'),(4,'Guiche 03','guiche03','123','Administrador',3,'P'),(5,'Guiche 04','guiche04','123','Administrador',4,'P'),(6,'Guiche 05','guiche05','123','Administrador',5,'P'),(7,'Portaria','portaria','123','Operador',0,'C');

/*Table structure for table `gerarsenha` */

DROP TABLE IF EXISTS `gerarsenha`;

CREATE TABLE `gerarsenha` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tipo_senha` varchar(1) DEFAULT NULL,
  `numero_senha` int(6) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'Nao Atendida',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;

/*Data for the table `gerarsenha` */

/*Table structure for table `gerenciamento_painel` */

DROP TABLE IF EXISTS `gerenciamento_painel`;

CREATE TABLE `gerenciamento_painel` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `senha_atual` int(9) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Não Atendida',
  `usuario` varchar(80) DEFAULT NULL,
  `prioridade` int(1) DEFAULT '0',
  `tipo_senha` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2965 DEFAULT CHARSET=latin1;

/*Data for the table `gerenciamento_painel` */

/*Table structure for table `logs_acesso` */

DROP TABLE IF EXISTS `logs_acesso`;

CREATE TABLE `logs_acesso` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(48) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `dt` date DEFAULT NULL,
  `hora` varchar(5) DEFAULT NULL,
  `info` varchar(50) DEFAULT NULL,
  `id_usuario` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

/*Data for the table `logs_acesso` */

insert  into `logs_acesso`(`id`,`login`,`usuario`,`dt`,`hora`,`info`,`id_usuario`) values (74,'guiche01','Guiche 01','2016-02-04','13:33','Logado','2'),(75,'guiche01','Guiche 01','2016-02-04','14:00','Logado','2'),(76,'guiche01','Guiche 01','2016-02-04','14:00','Logado','2');

/* Procedure structure for procedure `myproc` */

/*!50003 DROP PROCEDURE IF EXISTS  `myproc` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `myproc`()
BEGIN
	DECLARE i int DEFAULT 1;
	WHILE i <= 2694 DO
		INSERT INTO gerenciamento_painel(senha_atual, status2, usuario) VALUES (('+ i +'), 'Atendido', '2');
		SET i = i + 1;
	END WHILE;
END */$$
DELIMITER ;

/* Procedure structure for procedure `pro_insert1` */

/*!50003 DROP PROCEDURE IF EXISTS  `pro_insert1` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insert1`()
BEGIN
	DECLARE i int DEFAULT 1;
	WHILE i <= 2694 DO
		SET i = i + 1;
		INSERT INTO gerenciamento_painel(senha_atual, status2, usuario) VALUES (('+ i +'), 'Atendido', '2');
	END WHILE;
END */$$
DELIMITER ;

/* Procedure structure for procedure `pro_insert12` */

/*!50003 DROP PROCEDURE IF EXISTS  `pro_insert12` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insert12`()
BEGIN
	DECLARE i int;
	SET i = 1;
	WHILE i < 2694 DO
		INSERT INTO gerenciamento_painel(senha_atual, status2, usuario) VALUES (i, 'Atendido', '2');
		SET i = i + 1;
	END WHILE;
END */$$
DELIMITER ;

/* Procedure structure for procedure `pro_insert13` */

/*!50003 DROP PROCEDURE IF EXISTS  `pro_insert13` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insert13`()
BEGIN
	DECLARE i int;
	SET i = 1;
	WHILE i < 2694 DO
		INSERT INTO gerenciamento_painel(senha_atual, status2, usuario) VALUES (i, 'Atendido', '2');
		SET i = i + 1;
	END WHILE;
   END */$$
DELIMITER ;

/* Procedure structure for procedure `pro_insert16` */

/*!50003 DROP PROCEDURE IF EXISTS  `pro_insert16` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insert16`()
BEGIN
	DECLARE i int;
	SET i = 1;
	WHILE i < 2694 DO
		INSERT INTO gerenciamento_painel(senha_atual, status2, usuario) VALUES (i, 'Atendido', '2');
		SET i = i + 1;
	END WHILE;
   END */$$
DELIMITER ;

/* Procedure structure for procedure `pro_insert166` */

/*!50003 DROP PROCEDURE IF EXISTS  `pro_insert166` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insert166`()
BEGIN
	DECLARE i int;
	SET i = 1;
	WHILE (i < 2694) DO
		INSERT INTO gerenciamento_painel(senha_atual, status2, usuario) VALUES (i, 'Atendido', '2');
		SET i = i + 1;
	END WHILE;
   END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
