CREATE TABLE `clients` (
  `id_client` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `address` text,
  `created_at` DATETIME NOT NULL DEFAULT NOW(),
  `statut` int(11) NOT NULL DEFAULT '0', -- changer pour bool true admin faulse default 
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `email_unique` (`email`)
)  


-- valeur test par defaut client  
INSERT INTO `clients` (`1`, `email`, `password`, `name`, `address`) 
VALUES ("jaderons@hotmail.fr", "aa", "jade", "24b");


-- valeur test admin 
-- montrer fausses commandes déjà en cours etc 

CREATE TABLE `commandes` (
   `id_commande` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_commande` varchar(255) NOT NULL DEFAULT '',
  `id_client` varchar(255) NOT NULL DEFAULT '',
  `id_produit` int(11) unsigned NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0',
  `created_at` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id_commande`)
)

  -- valeur test par defaut commandes  
INSERT INTO `commandes` (`id_client`, `id_produit`) 
VALUES (1, 3), (5, 1), (7, 2);

CREATE TABLE `produits` (
  `id_produit` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL DEFAULT '',
  `titre` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_produit`)
)

  -- valeur test par defaut commandes  
  INSERT INTO `produits` (`photo`, `titre`, `description`)
  VALUES ("box1.png", "box 1", "La box 1 fourni un rainbow pen ainsi que 4 mines special peinture"), ("box2.png", "box 2", "La box 2 fourni deux rainbow penq ainsi que 5 mines special dessin"), ("box3.png", "box 3", "La box 3 fourni un rainbow pen accompagné de 2 mines special peinture et 2 special dessin");

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_client` varchar(255) NOT NULL DEFAULT '',
  `created_at` DATETIME NOT NULL DEFAULT NOW(),
  `contenu` varchar(255) NOT NULL DEFAULT '',
  `score` int(11) unsigned NOT NULL,
   PRIMARY KEY (`id_commentaire`)
) 

INSERT INTO `commentaires` (`id_client`, `contenu`)
  VALUES (3, "La box 1 est superbe!"), (2, "xoxo j'adore la box 2"), (5, "tro magnifik c mon stilo prèférai");

CREATE TABLE `password_reset` (
  `password_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `password_email` varchar(255) NOT NULL DEFAULT '',
  `password_selector` int(11) NOT NULL,
  `password_validator` varchar(255) NOT NULL DEFAULT '',
  `password_expires` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`password_id`)
 )