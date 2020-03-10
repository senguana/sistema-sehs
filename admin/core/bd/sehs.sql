CREATE TABLE `tb_person` (
	`id_person` int(45) NOT NULL AUTO_INCREMENT,
	`dni` int(12) NOT NULL UNIQUE,
	`first_name` varchar(50) NOT NULL,
	`second_name` varchar(50) NOT NULL,
	`surname` varchar(50) NOT NULL,
	`second_surname` varchar(50) NOT NULL,
	`sex` varchar(30) NOT NULL,
	`address` varchar(80) NOT NULL,
	`phone` int(12) NOT NULL,
	`cell` int(12) NOT NULL,
	`email` varchar(50) NOT NULL,
	`date_birth` DATE NOT NULL,
	`date_add` DATE NOT NULL,
	`status` bit(1) NOT NULL,
	PRIMARY KEY (`id_person`)
);

CREATE TABLE `tb_province` (
	`id_province` int(12) NOT NULL AUTO_INCREMENT,
	`name_province` varchar(80) NOT NULL,
	PRIMARY KEY (`id_province`)
);

CREATE TABLE `tb_rol` (
	`id_rol` int(12) NOT NULL AUTO_INCREMENT,
	`name_rol` varchar(60) NOT NULL,
	PRIMARY KEY (`id_rol`)
);

CREATE TABLE `tb_mission` (
	`id_mission` int(12) NOT NULL AUTO_INCREMENT,
	`name_mission` varchar(50) NOT NULL,
	PRIMARY KEY (`id_mission`)
);

CREATE TABLE `tb_user` (
	`id_user` int(12) NOT NULL AUTO_INCREMENT,
	`person_id` int(12) NOT NULL,
	`username` varchar(50) NOT NULL,
	`password` varchar(50) NOT NULL,
	`rol_id` int(12) NOT NULL,
	PRIMARY KEY (`id_user`)
);

CREATE TABLE `country` (
	`id_country` int(12) NOT NULL AUTO_INCREMENT,
	`name_country` varchar(70) NOT NULL,
	PRIMARY KEY (`id_country`)
);

ALTER TABLE `tb_user` ADD CONSTRAINT `tb_user_fk0` FOREIGN KEY (`person_id`) REFERENCES `tb_person`(`id_person`);

ALTER TABLE `tb_user` ADD CONSTRAINT `tb_user_fk1` FOREIGN KEY (`rol_id`) REFERENCES `tb_rol`(`id_rol`);

