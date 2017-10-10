/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.21-MariaDB : Database - order_coffee
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`order_coffee` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `order_coffee`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

insert  into `categoria`(`id_categoria`,`descricao`) values (2,'Bebidas Quentes'),(5,'Bebidas Frias'),(6,'Bolos'),(7,'Tortas');

/*Table structure for table `cozinha` */

DROP TABLE IF EXISTS `cozinha`;

CREATE TABLE `cozinha` (
  `id_cozinha` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) DEFAULT NULL,
  `quant` int(11) DEFAULT NULL,
  `stats` enum('S','N') DEFAULT NULL,
  PRIMARY KEY (`id_cozinha`),
  KEY `id_prod` (`id_prod`),
  CONSTRAINT `cozinha_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `cozinha` */

insert  into `cozinha`(`id_cozinha`,`id_prod`,`quant`,`stats`) values (1,5,2,'S'),(2,5,3,'S');

/*Table structure for table `itens_nfv` */

DROP TABLE IF EXISTS `itens_nfv`;

CREATE TABLE `itens_nfv` (
  `id_itens_nfv` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(4,2) DEFAULT NULL,
  `valor_total` decimal(4,2) DEFAULT NULL,
  `id_nfv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_itens_nfv`),
  KEY `id_prod` (`id_prod`),
  KEY `id_nfv` (`id_nfv`),
  CONSTRAINT `itens_nfv_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`),
  CONSTRAINT `itens_nfv_ibfk_2` FOREIGN KEY (`id_nfv`) REFERENCES `nfv` (`id_nfv`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `itens_nfv` */

insert  into `itens_nfv`(`id_itens_nfv`,`id_prod`,`quantidade`,`preco`,`valor_total`,`id_nfv`) values (2,1,2,'2.00','4.00',1),(5,1,10,'2.00','20.00',1),(7,5,3,'3.00','9.00',1),(13,5,2,'3.00','6.00',18),(14,5,2,'3.00','6.00',18),(15,8,1,'2.50','2.50',18),(16,5,1,'3.00','3.00',18),(17,5,2,'3.00','6.00',20),(18,5,3,'3.00','9.00',20);

/*Table structure for table `mesas` */

DROP TABLE IF EXISTS `mesas`;

CREATE TABLE `mesas` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(10) DEFAULT NULL,
  `stats` enum('A','F') DEFAULT NULL,
  `id_nfv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mesa`),
  KEY `id_nfv` (`id_nfv`),
  CONSTRAINT `mesas_ibfk_1` FOREIGN KEY (`id_nfv`) REFERENCES `nfv` (`id_nfv`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `mesas` */

insert  into `mesas`(`id_mesa`,`descricao`,`stats`,`id_nfv`) values (1,'Mesa 01','F',NULL),(2,'Mesa 02','F',NULL),(3,'Mesa 03','F',NULL),(4,'Mesa 04','F',NULL),(5,'Mesa 05','F',NULL),(6,'Mesa 06','F',NULL),(7,'Mesa 07','F',NULL),(8,'Mesa 08','F',NULL),(9,'Mesa 09','F',NULL),(10,'Mesa 010','F',NULL),(11,'Mesa 011','F',NULL),(12,'Mesa 012','F',NULL),(13,'Mesa 013','F',NULL);

/*Table structure for table `nfv` */

DROP TABLE IF EXISTS `nfv`;

CREATE TABLE `nfv` (
  `id_nfv` int(11) NOT NULL AUTO_INCREMENT,
  `datav` date DEFAULT NULL,
  `horav` time DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_mesa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nfv`),
  KEY `FK_nfv` (`id_mesa`),
  CONSTRAINT `FK_nfv` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `nfv` */

insert  into `nfv`(`id_nfv`,`datav`,`horav`,`id_usuario`,`id_mesa`) values (1,'2017-07-04','00:59:54',NULL,2),(2,'2017-07-04','01:00:02',NULL,3),(3,'2017-07-04','01:01:22',NULL,4),(4,'2017-07-04','01:01:26',NULL,5),(5,'2017-07-04','01:01:29',NULL,6),(6,'2017-07-04','01:04:12',2,7),(7,'2017-07-04','02:14:08',2,1),(8,'2017-07-04','02:20:03',2,2),(9,'2017-07-04','02:21:04',2,3),(10,'2017-07-04','02:21:18',2,4),(11,'2017-07-04','02:26:17',2,5),(12,'2017-07-04','02:28:05',1,6),(13,'2017-07-04','02:30:40',1,7),(14,'2017-07-04','04:04:59',1,1),(15,'2017-07-04','05:17:10',1,2),(16,'2017-07-04','05:18:05',1,3),(17,'2017-07-04','06:19:45',1,4),(18,'2017-07-04','23:29:40',1,1),(19,'2017-07-05','00:24:57',1,5),(20,'2017-07-05','19:49:22',1,1);

/*Table structure for table `produtos` */

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `custo` decimal(4,2) NOT NULL,
  `valor` decimal(4,2) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prod`),
  KEY `FK_produtos` (`id_categoria`),
  CONSTRAINT `FK_produtos` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `produtos` */

insert  into `produtos`(`id_prod`,`descritivo`,`custo`,`valor`,`id_categoria`) values (1,'bolacha','1.00','2.00',6),(5,'Café Gelado','2.50','3.00',5),(6,'Cappuccino','1.60','1.00',2),(7,'Café Preto','2.00','1.00',2),(8,'Torta de Chocolate','6.00','2.50',7);

/*Table structure for table `tipo_usuario` */

DROP TABLE IF EXISTS `tipo_usuario`;

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_usuario` */

insert  into `tipo_usuario`(`id_tipo_usuario`,`tipo`) values (1,'Administrador'),(2,'Atendente'),(3,'Cozinha');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) CHARACTER SET utf8 NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(20) CHARACTER SET utf8 NOT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_usuarios` (`id_tipo_usuario`),
  CONSTRAINT `FK_usuarios` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nome`,`login`,`senha`,`id_tipo_usuario`) values (1,'Jonathan','jonathan','admin',1),(2,'Maria','maria2','atendente',2),(5,'Cozinha','cozinha','cozinha',3);

/* Trigger structure for table `itens_nfv` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `item_cozinha` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `item_cozinha` AFTER INSERT ON `itens_nfv` FOR EACH ROW BEGIN
	insert into cozinha(id_prod, quant, stats) values (new.id_prod, new.quantidade, "N");
END */$$


DELIMITER ;

/* Trigger structure for table `nfv` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `novo_pedido` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `novo_pedido` AFTER INSERT ON `nfv` FOR EACH ROW BEGIN
	UPDATE mesas SET stats = "A", id_nfv = new.id_nfv where id_mesa = new.id_mesa;
END */$$


DELIMITER ;

/* Procedure structure for procedure `addMesa` */

/*!50003 DROP PROCEDURE IF EXISTS  `addMesa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `addMesa`(in Mstatus char(1))
BEGIN
	declare num int;
	set num = (SELECT max(id_mesa) from mesas);
	set num = num + 1;
	insert into mesas(descricao, stats, id_nfv) values (concat("Mesa 0",num), Mstatus, null);
END */$$
DELIMITER ;

/* Procedure structure for procedure `alterarProduto` */

/*!50003 DROP PROCEDURE IF EXISTS  `alterarProduto` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `alterarProduto`(IN id INT, IN descri varchar(30), in val decimal(4,2), in cus DECIMAL(4,2), in cat int)
BEGIN
	UPDATE produtos set descritivo=descri, custo=cus, valor=val, id_categoria=cat WHERE id_prod=id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `alterarUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `alterarUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `alterarUsuario`(in id int, IN nomeu VARCHAR(30), IN loginu VARCHAR(20), IN senhau VARCHAR(20), IN perfilu INT)
BEGIN
	update usuarios set nome=nomeu, login=loginu, senha=senhau, id_tipo_usuario=perfilu where id_usuario=id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `excluirProduto` */

/*!50003 DROP PROCEDURE IF EXISTS  `excluirProduto` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirProduto`(IN id int)
BEGIN
	DELETE from produtos where id_prod=id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `fecharPedido` */

/*!50003 DROP PROCEDURE IF EXISTS  `fecharPedido` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `fecharPedido`(IN idM INT)
BEGIN
	UPDATE mesas SET stats = "F", id_nfv = null WHERE id_mesa = idM;
END */$$
DELIMITER ;

/* Procedure structure for procedure `inserirCategoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirCategoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirCategoria`(IN categoria VARCHAR(30))
BEGIN
	INSERT INTO categoria (descricao) VALUES (categoria);
END */$$
DELIMITER ;

/* Procedure structure for procedure `inserirProduto` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirProduto` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirProduto`(IN descr VARCHAR(30), in Pvalor decimal(4,2), in Pcusto DECIMAL(4,2), in categoria int)
BEGIN
	INSERT INTO produtos (descritivo, custo, valor, id_categoria) VALUES (descr, Pcusto, Pvalor, categoria);
END */$$
DELIMITER ;

/* Procedure structure for procedure `inserirUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirUsuario`(IN nomeu VARCHAR(30), in loginu varchar(20), in senhau varchar(20), in perfilu int)
BEGIN
	INSERT INTO usuarios (nome, login, senha, id_tipo_usuario) VALUES (nomeu, loginu, senhau, perfilu);
END */$$
DELIMITER ;

/* Procedure structure for procedure `listar_itens_venda` */

/*!50003 DROP PROCEDURE IF EXISTS  `listar_itens_venda` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_itens_venda`(IN idNfv INT)
BEGIN
	SELECT p.descritivo "prod", sum(i.quantidade) "quant", i.preco "preco", sum(i.valor_total) "valorT"
	from produtos p
	inner join itens_nfv i
	on(p.id_prod = i.id_prod)
	where i.id_nfv = idNfv
	group by i.id_prod;
END */$$
DELIMITER ;

/* Procedure structure for procedure `listar_prod_cat` */

/*!50003 DROP PROCEDURE IF EXISTS  `listar_prod_cat` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_prod_cat`(IN idCat INT)
BEGIN
	SELECT * from produtos where id_categoria = idCat;
END */$$
DELIMITER ;

/* Procedure structure for procedure `novoItenPedido` */

/*!50003 DROP PROCEDURE IF EXISTS  `novoItenPedido` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `novoItenPedido`(IN quant INT, IN idP INT, IN idNfv INT)
BEGIN
	DECLARE valorP DECIMAL(4,2);
	DECLARE valorT DECIMAL(4,2);
	set valorP = (SELECT valor from produtos where id_prod = idP);
	set valorT = valorP * quant;
	INSERT INTO itens_nfv(id_prod, quantidade, preco, valor_total, id_nfv) VALUES (idP, quant, valorP, valorT, idNfv);
END */$$
DELIMITER ;

/* Procedure structure for procedure `novoPedido` */

/*!50003 DROP PROCEDURE IF EXISTS  `novoPedido` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `novoPedido`(IN idU INT, in idM int)
BEGIN
	insert into nfv(datav, horav, id_usuario, id_mesa) values (current_date, CURRENT_TIME, idU, idM);
END */$$
DELIMITER ;

/* Procedure structure for procedure `servirPedido` */

/*!50003 DROP PROCEDURE IF EXISTS  `servirPedido` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `servirPedido`(IN id int)
BEGIN
	update cozinha set stats="S" where id_cozinha=id;
END */$$
DELIMITER ;

/*Table structure for table `listar_cozinha` */

DROP TABLE IF EXISTS `listar_cozinha`;

/*!50001 DROP VIEW IF EXISTS `listar_cozinha` */;
/*!50001 DROP TABLE IF EXISTS `listar_cozinha` */;

/*!50001 CREATE TABLE `listar_cozinha` (
  `id_c` int(11) NOT NULL,
  `id_p` int(11) DEFAULT NULL,
  `produto` varchar(30) NOT NULL,
  `quant` int(11) DEFAULT NULL,
  `status` enum('S','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*Table structure for table `listar_usuarios` */

DROP TABLE IF EXISTS `listar_usuarios`;

/*!50001 DROP VIEW IF EXISTS `listar_usuarios` */;
/*!50001 DROP TABLE IF EXISTS `listar_usuarios` */;

/*!50001 CREATE TABLE `listar_usuarios` (
  `id_u` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `id_t` int(11) NOT NULL,
  `perfil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*View structure for view listar_cozinha */

/*!50001 DROP TABLE IF EXISTS `listar_cozinha` */;
/*!50001 DROP VIEW IF EXISTS `listar_cozinha` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listar_cozinha` AS select `c`.`id_cozinha` AS `id_c`,`c`.`id_prod` AS `id_p`,`p`.`descritivo` AS `produto`,`c`.`quant` AS `quant`,`c`.`stats` AS `status` from (`cozinha` `c` join `produtos` `p` on((`c`.`id_prod` = `p`.`id_prod`))) */;

/*View structure for view listar_usuarios */

/*!50001 DROP TABLE IF EXISTS `listar_usuarios` */;
/*!50001 DROP VIEW IF EXISTS `listar_usuarios` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listar_usuarios` AS select `u`.`id_usuario` AS `id_u`,`u`.`nome` AS `usuario`,`u`.`login` AS `login`,`u`.`senha` AS `senha`,`t`.`id_tipo_usuario` AS `id_t`,`t`.`tipo` AS `perfil` from (`usuarios` `u` join `tipo_usuario` `t` on((`u`.`id_tipo_usuario` = `t`.`id_tipo_usuario`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
