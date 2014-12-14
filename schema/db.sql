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
(1,0,NOW(),NOW(),0,0,0,'philipp','philipp','','','','phil@ephemeroid.net','','','',0,'',1,1,1,0),
(2,0,NOW(),NOW(),0,0,0,'credo','credo','','','','phil@ephemeroid.net','','','',0,'',1,1,1,0);

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
  PRIMARY KEY (uid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
