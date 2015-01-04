--
-- Host: 127.0.0.1    Database: baywa-nltool
-- ------------------------------------------------------
-- Server version	5.1.50

DROP TABLE IF EXISTS feusers;
CREATE TABLE feusers (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	username varchar(255) COLLATE utf8_general_ci NOT NULL,
	password varchar(255) COLLATE utf8_general_ci NOT NULL,
	first_name varchar(255) COLLATE utf8_general_ci NOT NULL,
	last_name varchar(255) COLLATE utf8_general_ci NOT NULL,
	title varchar(255) COLLATE utf8_general_ci NOT NULL,
	email varchar(255) COLLATE utf8_general_ci NOT NULL,
	phone varchar(255) COLLATE utf8_general_ci NOT NULL,
        address varchar(255) COLLATE utf8_general_ci NOT NULL,
        city  varchar(255) COLLATE utf8_general_ci NOT NULL,
	zip int(11) DEFAULT '0' NOT NULL,
	company  varchar(255) COLLATE utf8_general_ci NOT NULL,
	profileid int(11) DEFAULT '0' NOT NULL,
	usergroup int(11) DEFAULT '0' NOT NULL,
	superuser tinyint(4) DEFAULT '0' NOT NULL,
	userlanguage int(11) DEFAULT '0' NOT NULL,
  PRIMARY KEY (uid)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


LOCK TABLES feusers WRITE;
INSERT INTO feusers VALUES 
(1,0,NOW(),NOW(),0,0,0,'philipp','$2a$10$3d34c49b983bab20eeba8ujVly.hSvzZ2O00oX2EUHgLNT/B73t8K','','','','phil@ephemeroid.net','','','',0,'public/img/icon-p.png',1,1,1,0),
(2,0,NOW(),NOW(),0,0,0,'credo','$2a$10$3d34c49b983bab20eeba8uqWEdBD.U0IdUiRDWwayv7FUZcdOEPtm','','','','phil@ephemeroid.net','','','',0,'public/img/icon-c.png',1,1,1,0);

UNLOCK TABLES;


DROP TABLE IF EXISTS fileobject;
CREATE TABLE fileobject (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	title varchar(255) COLLATE utf8_general_ci NOT NULL,	
	usergroup int(11) DEFAULT '0' NOT NULL,	
	description mediumtext,	
        filepath varchar(255) COLLATE utf8_general_ci NOT NULL,        
  PRIMARY KEY (uid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES fileobject WRITE;
INSERT INTO fileobject VALUES 
(1,0,NOW(),1394840507,1,0,0,'sitzung_1_15-03-2014',0,'Sitzung I - Teil 1/1','sitzung_1_15-03-2014.mp3'),
(2,0,NOW(),1402699307,1,0,0,'sitzung_2_14-06-2014',0,'Sitzung II - Teil 1/1','sitzung_2_14-06-2014.mp3'),
(3,0,NOW(),1406587307,1,0,0,'sitzung_3_1_29-07-2014',0,'Sitzung III - Teil 1/2','sitzung_3_1_29-07-2014.mp3'),
(4,0,NOW(),1406587307,1,0,0,'sitzung_3_1_29-07-2014',0,'Sitzung III - Teil 2/2','sitzung_3_2_29-07-2014.mp3'),
(5,0,NOW(),1410475307,1,0,0,'sitzung_4_1_12-09-2014',0,'Sitzung IV - Teil 1/3','sitzung_4_1_12-09-2014.mp3'),
(6,0,NOW(),1410475307,1,0,0,'sitzung_4_2_12-09-2014',0,'Sitzung IV - Teil 2/3','sitzung_4_2_12-09-2014.mp3'),
(7,0,NOW(),1410475307,1,0,0,'sitzung_4_3_12-09-2014',0,'Sitzung IV - Teil 3/3','sitzung_4_3_12-09-2014.mp3'),
(8,0,NOW(),1412376107,1,0,0,'sitzung_5_1_04-10-2014',0,'Sitzung V - Teil 1/2','sitzung_5_1_04-10-2014.mp3'),
(9,0,NOW(),1412376107,1,0,0,'sitzung_5_2_04-10-2014',0,'Sitzung V - Teil 2/2','sitzung_5_2_04-10-2014.mp3');

UNLOCK TABLES;


DROP TABLE IF EXISTS filecomments;
CREATE TABLE filecomments (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	title varchar(255) COLLATE utf8_general_ci NOT NULL,	
        timeindex int(11) DEFAULT '0' NOT NULL,	
	usergroup int(11) DEFAULT '0' NOT NULL,	
	comment mediumtext,	
  PRIMARY KEY (uid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS hashtags;
CREATE TABLE hashtags (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	title varchar(255) COLLATE utf8_general_ci NOT NULL,	
        timeindex int(11) DEFAULT '0' NOT NULL,	
	usergroup int(11) DEFAULT '0' NOT NULL,
  PRIMARY KEY (uid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS filecomments_hashtags_lookup;
CREATE TABLE filecomments_hashtags_lookup (
	uid int(11) NOT NULL auto_increment,
	uid_local int(11) DEFAULT '0' NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  PRIMARY KEY (uid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;