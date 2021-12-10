--
-- Base de données: 'bddlocacar'
--
DROP DATABASE IF EXISTS bddlocacar;
CREATE DATABASE IF NOT EXISTS bddlocacar DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE bddlocacar;

-- --------------------------------------------------------
-- CREATION DES TABLES

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS departement;
CREATE TABLE departement (
	dep_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	dep_nom VARCHAR (20) NOT NULL,
	dep_code INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS profil;
CREATE TABLE profil (
	pro_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	pro_nom VARCHAR (20) NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS agence;
CREATE TABLE agence (
	age_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	age_nom VARCHAR (20) NOT NULL,
	age_departement INT NOT NULL
)ENGINE=InnoDB;


DROP TABLE IF EXISTS options;
CREATE TABLE options (
	opt_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	opt_nom VARCHAR (20) NOT NULL,
	opt_prix FLOAT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS intervalle;
CREATE TABLE intervalle (
	int_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	int_min INT NOT NULL,
	int_max INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS categorie;
CREATE TABLE categorie (
	cat_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	cat_nom VARCHAR (20) NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS utilisateur;
CREATE TABLE utilisateur (
	uti_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	uti_nom VARCHAR (32) NOT NULL,
	uti_login VARCHAR (20) NOT NULL,
	uti_mail VARCHAR (128) NOT NULL,
	uti_mdp VARCHAR (255) NOT NULL,
	uti_profil INT NOT NULL,
	uti_agence INT
)ENGINE=InnoDB;

DROP TABLE IF EXISTS voiture;
CREATE TABLE voiture (
	voi_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	voi_immatriculation VARCHAR(32) NOT NULL,
	voi_categorie INT NOT NULL,
	voi_localisation INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS locations;
CREATE TABLE locations (
	loc_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	loc_datedemande DATETIME NOT null,
	loc_datedebut DATETIME NOT null,
	loc_datefin DATETIME NOT null,
	loc_client INT NOT NULL,
	loc_agencedepart INT NOT NULL,
	loc_agencearrivee INT NOT NULL,
	loc_voiture INT NOT NULL,
	loc_gestionaire INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS choisir;
CREATE TABLE choisir (
	cho_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	cho_option INT NOT NULL,
	cho_location INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS tarif;
CREATE TABLE tarif (
	tar_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tar_categorie INT NOT NULL,
	tar_intervalle INT NOT NULL,
	tar_prix FLOAT NOT NULL
)ENGINE=InnoDB;

SET FOREIGN_KEY_CHECKS =1;

-- CONTRAINTES
ALTER TABLE agence ADD CONSTRAINT cs1 FOREIGN KEY (age_departement) REFERENCES departement (dep_id);
ALTER TABLE utilisateur ADD CONSTRAINT cs2 FOREIGN KEY (uti_profil) REFERENCES profil (pro_id);
ALTER TABLE voiture ADD CONSTRAINT cs3 FOREIGN KEY (voi_categorie) REFERENCES categorie (cat_id);
ALTER TABLE voiture ADD CONSTRAINT cs4 FOREIGN KEY (voi_localisation) REFERENCES agence (age_id);
ALTER TABLE locations ADD CONSTRAINT cs5 FOREIGN KEY (loc_client) REFERENCES utilisateur (uti_id);
ALTER TABLE locations ADD CONSTRAINT cs6 FOREIGN KEY (loc_agencedepart) REFERENCES agence (age_id);
ALTER TABLE locations ADD CONSTRAINT cs7 FOREIGN KEY (loc_agencearrivee) REFERENCES agence (age_id);
ALTER TABLE locations ADD CONSTRAINT cs8 FOREIGN KEY (loc_voiture) REFERENCES voiture (voi_id);
ALTER TABLE locations ADD CONSTRAINT cs9 FOREIGN KEY (loc_gestionaire) REFERENCES utilisateur (uti_id);
ALTER TABLE choisir ADD CONSTRAINT cs10 FOREIGN KEY (cho_option) REFERENCES options (opt_id);
ALTER TABLE choisir ADD CONSTRAINT cs11 FOREIGN KEY (cho_location) REFERENCES locations (loc_id);
ALTER TABLE tarif ADD CONSTRAINT cs12 FOREIGN KEY (tar_categorie) REFERENCES categorie (cat_id);
ALTER TABLE tarif ADD CONSTRAINT cs13 FOREIGN KEY (tar_intervalle) REFERENCES intervalle (int_id);
ALTER TABLE utilisateur ADD CONSTRAINT cs14 FOREIGN KEY (uti_agence) REFERENCES agence (age_id);
