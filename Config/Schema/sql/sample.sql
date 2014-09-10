CREATE TABLE `answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `value` text,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `questionnaires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `questionnaires` WRITE;
INSERT INTO `questionnaires` VALUES (1,'questionnaire1 title','questionnaire1 description',1,'2014-09-03 13:23:09','2014-09-03 13:22:28');
INSERT INTO `questionnaires` VALUES (2,'questionnaire2 title','questionnaire2 description',0,'2014-09-03 13:23:00','2014-09-03 13:23:00');
UNLOCK TABLES;

CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `value` text,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `validation` text,
  `input_type` varchar(255) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `options` text,
  `attributes` text,
  `status` tinyint(1) NOT NULL,
  `questionnaire_id` int(10) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `QUESTIONNAIRE_INDEX` (`questionnaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

LOCK TABLES `questions` WRITE;
INSERT INTO `questions` VALUES (1,'','question1 title','question1 description','{\"notEmpty\":{\"rule\":[\"multiple\"]}}','multiple',2,'{\"a\":\"aaa\", \"b\":\"bbb\", \"c\":\"ccc\"}','',1,1,'2014-09-10 11:27:21','2014-09-03 13:37:56');
INSERT INTO `questions` VALUES (2,'[\"a\"]','question2 title','question2 description','{\"notEmpty\":{\"rule\":[\"multiple\"]}}','multiple',1,'{\"a\":\"aaa\",\"b\":\"bbb\",\"c\":\"ccc\"}','{\"multiple\":\"checkbox\"}',1,1,'2014-09-10 11:27:09','2014-09-03 13:42:59');
INSERT INTO `questions` VALUES (3,'','question3 title','test','{\"notEmpty\":{\"rule\":[\"notEmpty\"]}}','checkbox',NULL,'{\"a\":\"aaa\",\"b\":\"bbb\":\"c\":\"ccc\"}','',1,1,'2014-09-10 11:20:03','2014-09-03 13:44:09');
INSERT INTO `questions` VALUES (4,'','question4 title','question4 description','{\"notEmpty\":{\"rule\":[\"notEmpty\"]}}','radio',3,'{\"a\":\"aaa\",\"b\":\"bbb\",\"c\":\"ccc\"}','',1,1,'2014-09-10 11:20:19','2014-09-03 13:44:25');
INSERT INTO `questions` VALUES (5,'','question5 title','question5 description','{\"notEmpty\":{\"rule\":[\"notEmpty\"]}}','text',20,'','',1,1,'2014-09-10 11:20:48','2014-09-03 13:46:10');
UNLOCK TABLES;
