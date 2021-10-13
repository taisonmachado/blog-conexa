# Host: 127.0.0.1  (Version 5.7.34-log)
# Date: 2021-10-13 10:09:48
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "categoria"
#

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL DEFAULT '',
  `cadastrado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `atualizado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "categoria"
#

INSERT INTO `categoria` VALUES (1,'Integrações','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Serviços','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Financeiro','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Agenda','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Parceiros','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Outros','0000-00-00 00:00:00','0000-00-00 00:00:00');

#
# Structure for table "usuario"
#

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL DEFAULT '',
  `senha` varchar(100) NOT NULL DEFAULT '',
  `nome` varchar(100) NOT NULL DEFAULT '',
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cadastrado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `atualizado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES (11,'douglas@gmail.com','$2y$13$FjIbntr/vWOqQGRh4g.oo.3rHmJR7LwkpRnKdGXeHuQTGWaOQk..O','Douglas da Silva','(74) 99943-4575','1998-02-09','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'ana@gmail.com','$2y$13$TxHx7J3.Q0nQcKeCj0HhT.rfTwLbOGAgOBDfzLcKLCGmYIDsQ6UJa','Ana Maria','(74) 99999-9999','1966-12-31','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'taison@gmail.com','$2y$13$vLpniN4RlPqMZBnnIGUiXO8H6BIQvsaKj.xmSzfEZCCON8aYw4bxG','Taison Machado',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');

#
# Structure for table "post"
#

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL DEFAULT '',
  `texto` longtext NOT NULL,
  `data` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visualizacoes` int(11) NOT NULL DEFAULT '0',
  `categoria_id` int(11) NOT NULL DEFAULT '0',
  `usuario_id` int(11) NOT NULL DEFAULT '0',
  `cadastrado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `atualizado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`post_id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`),
  CONSTRAINT `post_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "post"
#

INSERT INTO `post` VALUES (13,'O que é integração API? Entenda como usar essa tecnologia','A inovação é uma das principais características da era digital, onde a automação é um caminho trilhado por muitas empresas que querem se destacar no mercado. Nesse quesito, a integração via API permite às empresas otimizarem a adaptação de seus sistemas, o que faz dessa ferramenta uma grande ponte de novidades nas organizações.\r\n\r\nSe a sua empresa não sabe o que é integração via API, ou se não utiliza algum dos tipos de API em seus processos, existe uma boa possibilidade dela estar ficando para trás, e isso ficou comprovado através do relatório do ProgrammableWeb, que mostrou um crescimento de 2.000 novas APIs ao ano.\r\n\r\nAs novas tecnologias nos proporcionam comodidade, conforto e praticidade, tudo isso com uma velocidade sem igual, que anos atrás poderíamos achar impensada, mas que hoje em dia são essenciais, como aplicativos de delivery, aplicativos de rotas e tantos outros.\r\n\r\nPara mostrar os benefícios que a tecnologia por trás da integração via API pode proporcionar, não só as pessoas, mas, principalmente para o crescimento das empresas, vamos explicar tudo o que você precisa saber sobre o uso de APIs. ','2021-10-13 09:29:29',0,1,11,'2021-10-13 09:29:29','2021-10-13 09:30:47'),(14,'Serviços Conexa','Conexa Coworkings\r\nSoftware N° 1 em gestão de coworkings do Brasil!\r\nO Conexa Coworking é o software ideal para a gestão de:\r\n\r\nHubs de inovação\r\nConsultórios compartilhados\r\nEscritórios virtuais\r\nCoworkings\r\n\r\nConexa Associações\r\nPlataforma perfeita para gerir as finanças e o relacionamento com os seus associados.\r\nO Conexa Associações é ideal para:\r\n\r\nSindicatos\r\nAssociações\r\nCDL’s\r\nClubes\r\nE muito mais!\r\n\r\nConexa Recorrência\r\nERP para empresas que trabalham com contratos recorrentes.\r\nO Conexa Recorrência é ideal para:\r\n\r\nContabilidades\r\nEmpresas SaaS\r\nAgências\r\nEmpresas de TI\r\nEmpresas de assinaturas\r\nStartups\r\nEmpresas de serviços recorrentes','2021-10-13 09:35:09',0,2,12,'2021-10-13 09:35:09','2021-10-13 09:35:09'),(15,'Sistema financeiro completo para empresas de serviços recorrentes','Somos especialistas em empresas de serviços que faturam seus clientes de forma recorrente.','2021-10-13 09:35:55',0,3,12,'2021-10-13 09:35:55','2021-10-13 09:35:55');

#
# Structure for table "comentario"
#

CREATE TABLE `comentario` (
  `comentario_id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` tinytext NOT NULL,
  `data` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usuario_id` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  `cadastrado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `atualizado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`comentario_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `comentario_ibfk_2` (`post_id`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

#
# Data for table "comentario"
#

INSERT INTO `comentario` VALUES (41,'Comentem','2021-10-13 09:55:50',11,13,'2021-10-13 09:55:50','2021-10-13 09:55:50'),(43,'Muito bom!','2021-10-13 09:56:16',12,13,'2021-10-13 09:56:16','2021-10-13 09:56:16');
