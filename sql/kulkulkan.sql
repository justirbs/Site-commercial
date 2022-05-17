CREATE DATABASE IF NOT EXISTS kulkulkan;
USE kulkulkan;


DROP TABLE IF EXISTS Produit;
DROP TABLE IF EXISTS Client;
DROP TABLE IF EXISTS Categorie;


CREATE TABLE Categorie (
  idCategorie int(1) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  nom varchar(42) NOT NULL
);

CREATE TABLE Client (
  idClient int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  pseudo varchar(42) NOT NULL,
  mdp varchar(42) NOT NULL
);

CREATE TABLE Produit (
  reference int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  img text NOT NULL,
  descriptionProduit text NOT NULL,
  prix int(100) NOT NULL,
  stock int(100) NOT NULL,
  idCategorie int(1) NOT NULL,
  FOREIGN KEY (idCategorie) REFERENCES Categorie(idCategorie)
);

