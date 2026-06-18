-- Minimal schema for the School Management app
CREATE DATABASE IF NOT EXISTS school_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE school_db;

CREATE TABLE IF NOT EXISTS eleves (
  id INT AUTO_INCREMENT PRIMARY KEY,
  matricule VARCHAR(50),
  nom VARCHAR(100),
  prenom VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS enseignants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100),
  prenom VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS classes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS matieres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS inscriptions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  eleve_id INT,
  matiere_id INT
);

CREATE TABLE IF NOT EXISTS affectations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  enseignant_id INT,
  classe_id INT,
  matiere_id INT
);

-- sample data
INSERT INTO eleves (matricule, nom, prenom) VALUES
('E001','Ahmed','Boukhalfa'),
('E002','Sara','El Malki');

INSERT INTO enseignants (nom, prenom) VALUES
('Ali','Ben'),
('Nadia','Othman');

INSERT INTO classes (name) VALUES ('6A'),('6B');

INSERT INTO matieres (nom) VALUES ('Math'),('Français');
