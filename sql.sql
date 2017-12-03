
CREATE TABLE auteur (
	id_auteur INT NOT NULL AUTO_INCREMENT,
	nom_auteur VARCHAR(50) NOT NULL UNIQUE,
	PRIMARY KEY (id_auteur)
);

CREATE TABLE livre (
	id_livre INT NOT NULL AUTO_INCREMENT,
	titre VARCHAR(25) NOT NULL,
	annee INT(4) NOT NULL,
	resume TEXT,
	auteur_livre INT NOT NULL,
	PRIMARY KEY (id_livre),
	FOREIGN KEY (auteur_livre)
		REFERENCES auteur(id_auteur)
		ON DELETE CASCADE
);

CREATE TABLE statut (
	id_statut INT NOT NULL UNIQUE,
	nom_statut VARCHAR(15) NOT NULL UNIQUE,
	PRIMARY KEY (id_statut)
);

CREATE TABLE user (
	id_user INT NOT NULL AUTO_INCREMENT,
	login VARCHAR(16) NOT NULL UNIQUE,
	pass VARCHAR(32) NOT NULL,
	nom_user VARCHAR(50) NOT NULL,
	statut_user INT NOT NULL,
	PRIMARY KEY (id_user),
	FOREIGN KEY (statut_user)
		REFERENCES statut(id_statut)
		ON UPDATE CASCADE
);

CREATE TABLE commentaire (
	id_comm INT NOT NULL AUTO_INCREMENT,
	date_comm DATE NOT NULL,
	text_comm TEXT NOT NULL,
	auteur_comm INT NOT NULL,
	livre_comm INT NOT NULL,
	PRIMARY KEY (id_comm),
	FOREIGN KEY (auteur_comm)
		REFERENCES user(id_user)
		ON DELETE CASCADE,
	FOREIGN KEY (livre_comm)
		REFERENCES livre(id_livre)
		ON DELETE CASCADE
);