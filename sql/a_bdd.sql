DROP DATABASE IF EXISTS e_fnac;

CREATE DATABASE IF NOT EXISTS e_fnac;

USE e_fnac;

CREATE TABLE IF NOT EXISTS `adresse`(
	`id_adresse` INT(11) NOT NULL AUTO_INCREMENT,
	`designation` VARCHAR(255) DEFAULT NULL,
	`code_postal` VARCHAR(10) DEFAULT NULL,
	`ville` VARCHAR(100) DEFAULT NULL,
	`pays` VARCHAR(50) DEFAULT NULL,
	PRIMARY KEY (id_adresse));

CREATE TABLE IF NOT EXISTS `categorie`(
	`id_categorie` INT(11) NOT NULL AUTO_INCREMENT,
	`designation` VARCHAR(100) DEFAULT NULL,
	PRIMARY KEY (id_categorie));

CREATE TABLE IF NOT EXISTS `sous_categorie`(
	`id_sous_categorie` INT(11) NOT NULL AUTO_INCREMENT,
	`designation` VARCHAR(100) DEFAULT NULL,
	`id_categorie` INT(11) NOT NULL,
	`par_defaut` TINYINT(1) DEFAULT '0',
	PRIMARY KEY (id_sous_categorie),
	FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie));

CREATE TABLE IF NOT EXISTS `utilisateur`(
	`id_utilisateur` INT(11) NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(50) DEFAULT NULL,
	`prenom` VARCHAR(50) DEFAULT NULL,
	`civilite` TINYINT(1) DEFAULT NULL,
	`email` VARCHAR(70) DEFAULT NULL,
	`mot_de_passe` VARCHAR(100) DEFAULT NULL,
	`dateinscription` datetime DEFAULT NULL,
	`telfixe` VARCHAR(20) DEFAULT NULL,
	`telmobile` VARCHAR(20) DEFAULT NULL,
	`nb_verif` INT(11) NOT NULL,
	`etat_verif` TINYINT(1) DEFAULT NULL,
	`id_adresse` INT(11) NOT NULL,
	PRIMARY KEY (id_utilisateur),
	FOREIGN KEY (id_adresse) REFERENCES adresse(id_adresse));

CREATE TABLE IF NOT EXISTS `objet` (
	`id_objet` INT(11) NOT NULL AUTO_INCREMENT,
	`id_sous_categorie` INT(11) NOT NULL,
	`designation` VARCHAR(150) DEFAULT NULL,
	`description` text,
	`prix_achat` FLOAT DEFAULT NULL,
	`prix_location` FLOAT NOT NULL,
	`date_lencement` datetime DEFAULT NULL,
	`activation` TINYINT(1) DEFAULT NULL,
	`photo` VARCHAR(255) DEFAULT NULL,
	`reference` VARCHAR(30) DEFAULT NULL,
	PRIMARY KEY (id_objet),
	FOREIGN KEY (id_sous_categorie) REFERENCES sous_categorie(id_sous_categorie));

CREATE TABLE IF NOT EXISTS `facture` (
	`id_facture` INT(11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (id_facture));

CREATE TABLE IF NOT EXISTS `acheter`(
	`id_acheter` INT(11) NOT NULL AUTO_INCREMENT,
	`date_achat` datetime DEFAULT NULL,
	`prix_total` FLOAT DEFAULT NULL,
	`id_utilisateur` INT(11) NOT NULL,
	`id_objet` INT(11) NOT NULL,
	`id_facture` INT(11) NOT NULL,
	PRIMARY KEY (id_acheter),
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
	FOREIGN KEY (id_facture) REFERENCES facture(id_facture));

CREATE TABLE IF NOT EXISTS `louer` (
	`id_louer` INT(11) NOT NULL AUTO_INCREMENT,
	`date_debut` datetime DEFAULT NULL,
	`date_fin` datetime DEFAULT NULL,
	`prix` FLOAT DEFAULT NULL,
	`id_utilisateur` INT(11) NOT NULL,
	`id_objet` INT(11) NOT NULL,
	`id_facture` INT(11) NOT NULL,
	PRIMARY KEY (id_louer),
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
	FOREIGN KEY (id_facture) REFERENCES facture(id_facture));

CREATE TABLE IF NOT EXISTS `musique` (
	`id_objet` INT(11) NOT NULL,
	`duree` time DEFAULT NULL,
	`format` VARCHAR(10) DEFAULT NULL,
	`dossier` VARCHAR(100) DEFAULT NULL,
	`auteur` VARCHAR(255) DEFAULT NULL,
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet));

CREATE TABLE IF NOT EXISTS `film` (
	`id_objet` INT(11) NOT NULL,
	`format` VARCHAR(10) DEFAULT NULL,
	`resolution` VARCHAR(20) DEFAULT NULL,
	`sigle` VARCHAR(10) DEFAULT NULL,
	`realisateur` VARCHAR(80) DEFAULT NULL,
	`fichier` VARCHAR(150) DEFAULT NULL,
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet));

CREATE TABLE IF NOT EXISTS `livre` (
	`id_objet` INT(11) NOT NULL,
	`format` VARCHAR(10) DEFAULT NULL,
	`auteur` VARCHAR(20) DEFAULT NULL,
	`fichier` VARCHAR(50) DEFAULT NULL,
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet));

CREATE TABLE IF NOT EXISTS `historique` (
	`id_historique` INT(11) NOT NULL AUTO_INCREMENT,
	`date_obtention` datetime DEFAULT NULL,
	`prix_total` FLOAT DEFAULT NULL,
	`type` VARCHAR(20) DEFAULT NULL,
	`id_utilisateur` INT(11) NOT NULL,
	`id_objet` INT(11) NOT NULL,
	`id_facture` INT(11) NOT NULL,
	PRIMARY KEY (id_historique),
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
	FOREIGN KEY (id_facture) REFERENCES facture(id_facture));

INSERT INTO `adresse` (`id_adresse`, `designation`, `code_postal`, `ville`, `pays`) VALUES
(1, '91, rue des Soeurs', '13600', 'LA CIOTAT', 'France'),
(2, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(3, '19, rue des Chaligny', '58000', 'NEVERS', 'France'),
(4, '11, rue du Superflu', '67000', 'LYON', 'France'),
(5, '22, rue de Paris', '75001', 'PARIS', 'France'),
(6, '16, rue Saint-Georges', '15000', 'Ruynes en Margeride', 'France'),
(7, '9, rue des Postillons', '93200', 'Saint-Denis', 'France'),
(8, '61, rue Bonneterie', '59370', 'MONS-EN-BAROEUL', 'France'),
(9, '32, Rue Frédéric Chopin', '03200', 'VICHY', 'France'),
(10, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(11, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(12, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(13, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(14, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(15, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(16, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(17, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(18, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(19, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(20, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(21, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(22, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(23, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(24, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(25, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(26, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(27, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(28, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(29, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(30, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(31, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(32, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(33, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(34, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(35, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(36, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(37, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(38, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(39, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(40, '25, Chemin des Ponts Batis', '94000', 'Melun', 'France');


INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `civilite`, `email`, `mot_de_passe`, `dateinscription`, `telfixe`, `telmobile`, `nb_verif`, `etat_verif`, `id_adresse`)
VALUES (1, 'Jodoin', 'Martin', 0, 'MartinJodoin@orange.com', SHA1('Saijei2Ooph'), '2014-01-02 14:34:35', '0534230681', '0681053423', 917832, 1, 1),
(2, 'Charrette', 'Rémy', 0, 'RmyCharrette@teleworm.us', SHA1('Ka9poe9Eep6'), '2014-01-03 12:03:12', '0597144482', '0714448205', 230681, 1, 2),
(3, 'Grignon', 'Yvette', 1, 'YvetteGrignon@gmail.com', SHA1('zieBeik8ta2'), '2014-01-03 14:56:02', '0377967860', '0603779678', 597144, 1, 3),
(4, 'Park', 'Al', 0, 'al.park@gmail.com', SHA1('88fdsjkl77!R'), '2014-01-04 14:57:22', '0147456824', '0614537745', 7458555, 1, 4),
(5, 'Nom', 'Prénom', 0, 'p.nom@gmail.com', SHA1('azerty789*'), '2014-01-05 14:46:12', '0147322547', '0633249825', 254774, 1, 5),
(6, 'Falcon', 'Jean', 0, 'jean.falcon@live.fr', SHA1('1a2b3c'), '2014-06-04 21:17:12', '0146896547', '0632346785', 46686, 1, 6),
(7, 'Khodja', 'Belhadry', 0, 'belhadry.khodja@outlook.com', SHA1('1a2b3c'), '2014-06-04 21:17:12', '0148224719', '0695081724', 46686, 1, 7),
(8, 'Chesnay', 'Octave', 0, 'octavechesnay@teleworm.us', SHA1('iav8ohBoo'), '2014-11-04 14:55:32', '0358885185', '0185035888', 445971, 1, 8),
(9, 'TÃ©trault', 'Daniel', 0, 'DanielTtrault@jourrapide.com', SHA1('Gu7eeth2ah'), '2015-01-02 23:45:43', '0444060742', '0607420444', 839172, 1, 9),
(10, 'Gauthier', 'Antoine', 0, 'antoine.gauthier@orange.com', SHA1('Z1Aze2a0E3'), '2015-05-11 13:54:02', '0952182006', '0669721679', 960696, 1, 10),
(11, 'Renaud', 'Angèle', 1, 'angele.renaud@hotmail.com', SHA1('z2eE1aZ30A'), '2014-07-01 17:25:59', '0133920288', '0615668945', 993215, 1, 11),
(12, 'Durand', 'Mathis', 0, 'mathis.durand@orange.com', SHA1('ZEae2A310z'), '2015-07-02 17:18:49', '0103158569', '0685366210', 913235, 1, 12),
(13, 'Benoit', 'Léo', 0, 'leo.benoit@outlook.fr', SHA1('103Zaez2EA'), '2014-05-13 14:33:32', '0859896850', '0698813476', 720755, 1, 13),
(14, 'Michel', 'Kévin', 0, 'kevin.michel@outlook.fr', SHA1('Ezea102ZA3'), '2015-02-07 09:11:06', '0604135131', '0656010742', 415774, 1, 14),
(15, 'Renaud', 'Lucas', 0, 'lucas.renaud@outlook.com', SHA1('Zze10EaA32'), '2015-10-12 00:12:34', '0235873413', '0646958007', 898294, 1, 15),
(16, 'Marie', 'Léo', 0, 'leo.marie@outlook.fr', SHA1('21Aa30ZzEe'), '2015-04-27 12:35:54', '0655111694', '0671655273', 368313, 1, 16),
(17, 'Besson', 'Jeanine', 1, 'jeanine.besson@gmail.fr', SHA1('1AzE0eZa23'), '2015-09-24 22:20:06', '0961849975', '0640102539', 625833, 1, 17),
(18, 'Marie', 'Christian', 0, 'christian.marie@yahoo.com', SHA1('E0a12AZez3'), '2014-12-04 04:28:11', '0256088256', '0642299804', 770852, 1, 18),
(19, 'Deschamps', 'Agnès', 1, 'agnes.deschamps@orange.com', SHA1('021zaE3eAZ'), '2014-01-23 07:59:09', '0337826538', '0678247070', 803372, 1, 19),
(20, 'Robert', 'Thomas', 0, 'thomas.robert@yahoo.com', SHA1('zE032Z1aAe'), '2015-01-24 08:52:59', '0307064819', '0657944335', 723391, 1, 20),
(21, 'Collet', 'Martin', 0, 'martin.collet@hotmail.fr', SHA1('1E302eaAzZ'), '2014-12-06 05:07:41', '0163803100', '0671391601', 530911, 1, 21),
(22, 'Robert', 'Jules', 0, 'jules.robert@hotmail.fr', SHA1('2ZEzAe013a'), '2014-09-00 23:45:16', '0808041381', '0628588867', 225930, 1, 22),
(23, 'Deschamps', 'Emmanuel', 0, 'emmanuel.deschamps@hotmail.com', SHA1('EeAZ1a2z03'), '2015-04-05 14:46:44', '0439779663', '0619536132', 708450, 1, 23),
(24, 'Guillou', 'Anaïs', 1, 'anaïs.guillou@hotmail.fr', SHA1('0ZaAE132ze'), '2015-11-20 03:09:04', '0859017944', '0644233398', 178469, 1, 24),
(25, 'Collet', 'Rachelle', 1, 'rachelle.collet@outlook.com', SHA1('0Z2A1aezE3'), '2015-03-17 12:55:16', '0265756225', '0612680664', 435989, 1, 25),
(26, 'Guillou', 'Louis', 0, 'louis.guillou@gmail.fr', SHA1('01AzZe3E2a'), '2014-06-26 18:03:21', '0459994506', '0614877929', 581008, 1, 26),
(27, 'Hamon', 'Louise', 1, 'louise.hamon@yahoo.com', SHA1('eA02Eza13Z'), '2014-08-16 22:33:19', '0541732788', '0650825195', 613528, 1, 27),
(28, 'Richard', 'Lily', 1, 'lily.richard@gmail.fr', SHA1('Ze210zaE3A'), '2015-08-17 22:26:09', '0510971069', '0630522460', 533547, 1, 28),
(29, 'Moulin', 'Joseph', 0, 'joseph.moulin@orange.com', SHA1('zA1Zae302E'), '2014-06-28 19:42:51', '0367709350', '0643969726', 341067, 1, 29),
(30, 'Richard', 'Nathan', 0, 'nathan.richard@outlook.com', SHA1('1zA3E2Ze0a'), '2014-03-22 14:20:26', '0111947631', '0691166992', 936087, 1, 30),
(31, 'Rey', 'Cédric', 0, 'cedric.rey@orange.com', SHA1('zE2eZ103Aa'), '2015-11-27 05:20:54', '0643685913', '0682114257', 518606, 1, 31),
(32, 'Guillaume', 'Laura', 1, 'laura.guillaume@orange.com', SHA1('Z0zE3a1e2A'), '2014-05-13 17:43:14', '0162924194', '0616811523', 888626, 1, 32),
(33, 'Moulin', 'Ines', 1, 'ines.moulin@hotmail.com', SHA1('13AEZ0e2za'), '2015-10-10 02:29:26', '0469662475', '0675258789', 246145, 1, 33),
(34, 'Herve', 'Jocerand', 0, 'jocerand.herve@yahoo.fr', SHA1('e3ZAa012Ez'), '2014-12-19 09:37:31', '0663900756', '0677456054', 391165, 1, 34),
(35, 'Rey', 'Louis', 0, 'louis.rey@gmail.com', SHA1('z3Za12eA0E'), '2014-02-09 12:07:29', '0745639038', '0623403320', 423684, 1, 35),
(36, 'Simon', 'Angèle', 1, 'angele.simon@outlook.fr', SHA1('aE3Z1ze20A'), '2014-02-10 12:00:19', '0714877319', '0693100585', 343704, 1, 36),
(37, 'Renault', 'Christiane', 1, 'christiane.renault@yahoo.com', SHA1('AZz02a13eE'), '2014-12-21 10:16:01', '0571615600', '0616547851', 151223, 1, 37),
(38, 'Simon', 'Agathe', 1, 'agathe.simon@hotmail.com', SHA1('a2Z10e3EAz'), '2014-10-15 04:54:36', '0315853881', '0663745117', 746243, 1, 38),
(39, 'Royer', 'Jeanine', 1, 'jeanine.royer@hotmail.fr', SHA1('01AeE2aZ3z'), '2015-05-20 19:54:04', '0847592163', '0654692382', 328762, 1, 39),
(40, 'De Bussy', 'Henry', 0, 'a', SHA1('a'), '2014-05-20 19:57:34', '0147592163', '0694692752', 328652, 1, 40);

INSERT INTO `categorie` (`id_categorie`, `designation`) VALUES
(1, 'livre'),
(2, 'film'),
(3, 'musique');

INSERT INTO `sous_categorie` (`id_sous_categorie`, `designation`, `id_categorie`, `par_defaut`) VALUES
(1, 'Action et aventure', 2, NULL),
(2, 'Animation', 2, NULL),
(3, 'Classique', 2, NULL),
(4, 'Comédie', 2, NULL),
(5, 'Documentaire', 2, NULL),
(6, 'Drame', 2, NULL),
(7, 'Horreur', 2, NULL),
(8, 'Policier', 2, NULL),
(9, 'Science-fiction et fantastique', 2, 1),
(10, 'Bandes originales', 3, NULL),
(11, 'Blues', 3, NULL),
(12, 'Jazz', 3, NULL),
(13, 'Metal', 3, NULL),
(14, 'Musique Classique', 3, NULL),
(15, 'Musique du monde', 3, NULL),
(16, 'Musiques électroniques', 3, 1),
(17, 'Pop', 3, NULL),
(18, 'R&B/Soul', 3, NULL),
(19, 'Reggae', 3, NULL),
(20, 'Rock', 3, NULL),
(21, 'Variété française', 3, NULL),
(22, 'Actualité et Politique', 1, NULL),
(23, 'Arts', 1, NULL),
(24, 'Bandes dessinnées', 1, NULL),
(25, 'Cuisine', 1, NULL),
(26, 'Fantasy et Science-fiction', 1, NULL),
(27, 'Histoire', 1, NULL),
(28, 'Informatique et Internet', 1, NULL),
(29, 'Jeunesse', 1, NULL),
(30, 'Littérature', 1, 1),
(31, 'Philosophie', 1, NULL),
(32, 'Romans Policier et Suspence', 1, NULL),
(33, 'Tourisme et Voyages', 1, NULL);

INSERT INTO `objet` (`id_objet`, `id_sous_categorie`, `designation`, `description`, `prix_achat`, `prix_location`, `date_lencement`, `activation`, `photo`, `reference`) VALUES
(1, 2, 'Albator, Corsaire de l''Espace', '2977. Albator, capitaine du vaisseau Arcadia, est un corsaire de l''espace. Il est condamné à mort, mais reste insaisissable.  Le jeune Yama, envoyé pour l''assassiner, s''infiltre dans l''Arcadia, alors qu''Albator décide d''entrer en guerre contre la Coalition Gaia afin de défendre sa planète d''origine, la Terre.', 13.99, 3.99, '2013-12-25 18:22:29', 1, 'albator.png', '#ANONETFF50'),
(2, 5, 'Minuscule', 'Dans une paisible forêt, les reliefs d''un pique-nique déclenchent une guerre sans merci entre deux bandes rivales de fourmis convoitant le même butin: une boîte de sucres! C''est dans cette tourmente qu''une jeune coccinelle va se lier d''amitié avec une fourmi noire et l''aider à sauver son peuple des terribles fourmis rouges...', 9.99, 2.99, '2014-01-29 08:36:30', 1, 'minuscule.jpg', '#ANONGGXE33'),
(3, 1, 'Insaisissables', '« Les Quatre Cavaliers », un groupe de brillants magiciens et illusionnistes, viennent de donner deux spectacles de magie époustouflants : le premier en braquant une banque sur un autre continent, le deuxième en transférant la fortune d''un banquier véreux sur les comptes en banque du public. Deux agents spéciaux du FBI et d''Interpol sont déterminés à les arrêter avant qu''ils ne mettent à exécution leur promesse de réaliser des braquages encore plus audacieux. Ils font appel à Thaddeus, spécialiste reconnu pour expliquer les tours de magie les plus sophistiqués. Alors que la pression s''intensifie, et que le monde entier attend le spectaculaire tour final des Cavaliers, la course contre la montre commence.', 11.99, 4.99, '2013-07-31 08:47:28', 1, 'insaisissables.jpg', '#INESLKHR56'),
(4, 8, 'Drive', 'Un jeune homme solitaire, The Driver, conduit le jour à Hollywood pour le cinéma en tant que cascadeur et la nuit pour des truands. Ultra professionnel et peu bavard, il a son propre code de conduite. Jamais il n''a pris part aux crimes de ses employeurs autrement qu''en conduisant - et au volant, il est le meilleur !\r\nShannon, le manager qui lui décroche tous ses contrats, propose à Bernie Rose, un malfrat notoire, d''investir dans un véhicule pour que son poulain puisse affronter les circuits de stock-car professionnels. Celui-ci accepte mais impose son associé, Nino, dans le projet. \r\nC''est alors que la route du pilote croise celle d''Irene et de son jeune fils. Pour la première fois de sa vie, il n''est plus seul.\r\nLorsque le mari d''Irene sort de prison et se retrouve enrôlé de force dans un braquage pour s''acquitter d''une dette, il décide pourtant de lui venir en aide. L''expédition tourne mal…\r\nDoublé par ses commanditaires, et obsédé par les risques qui pèsent sur Irene, il n''a dès lors pas d''autre alternative que de les traquer un à un…', 7.99, 2.99, '2011-10-05 05:18:23', 1, 'drive.jpg', '#ACREAGXD40'),
(5, 9, 'Harry Potter et les reliques de la mort 1ère partie', 'Le pouvoir de Voldemort s''étend. Celui-ci contrôle maintenant le Ministère de la Magie et Poudlard. Harry, Ron et Hermione décident de terminer le travail commencé par Dumbledore, et de retrouver les derniers Horcruxes pour vaincre le Seigneur des Ténèbres. Mais il reste bien peu d''espoir aux trois sorciers, qui doivent réussir à tout prix.', 11.99, 4.99, '2010-11-24 08:36:30', 1, 'hprp1.jpg', '#SCUEETGA52'),
(6, 9, 'Harry Potter et les reliques de la mort 2ème partie', 'Dans la 2e Partie de cet épisode final, le combat entre les puissances du bien et du mal de l''univers des sorciers se transforme en guerre sans merci. Les enjeux n''ont jamais été si considérables et personne n''est en sécurité. Mais c''est Harry Potter qui peut être appelé pour l''ultime sacrifice alors que se rapproche l''ultime épreuve de force avec Voldemort.', 11.99, 4.99, '2011-07-13 08:36:30', 1, 'hprp2.jpg', '#SCUEFEXG33'),
(7, 2, 'FrankenWeenie', 'Après la mort soudaine de Sparky, son chien adoré, le jeune Victor fait appel au pouvoir de la science afin de ramener à la vie celui qui était aussi son meilleur ami. Il lui apporte au passage quelques modifications de son cru… Victor va tenter de cacher la créature qu''il a fabriquée mais lorsque Sparky s''échappe, ses copains de classe, ses professeurs et la ville tout entière vont apprendre que vouloir mettre la vie en laisse peut avoir quelques monstrueuses conséquences…', 9.99, 3.99, '2012-10-31 08:36:30', 1, 'frankenweenie.jpg', '#ANONEDBE50'),
(8, 2, 'Moi moche et méchant', 'Dans un charmant quartier résidentiel délimité par des clôtures de bois blanc et orné de rosiers fleurissants se dresse une bâtisse noire entourée d''une pelouse en friche. Cette façade sinistre cache un secret : Gru, un méchant vilain, entouré d''une myriade de sous-fifres et armé jusqu''aux dents, qui, à l''insu du voisinage, complote le plus gros casse de tous les temps : voler la lune (Oui, la lune !)...\r\nGru affectionne toutes sortes de sales joujoux. Il possède une multitude de véhicules de combat aérien et terrestre et un arsenal de rayons immobilisants et rétrécissants avec lesquels il anéantit tous ceux qui osent lui barrer la route... jusqu''au jour où il tombe nez à nez avec trois petites orphelines qui voient en lui quelqu''un de tout à fait différent : un papa.\r\nLe plus grand vilain de tous les temps se retrouve confronté à sa plus dure épreuve : trois fillettes prénommées Margo, Edith et Agnes.', 13.99, 4.99, '2010-10-06 08:36:30', 1, 'moi_moche.jpg', '#ANONTLTT26'),
(9, 17, 'Listen', 'Listen est le sixième album studio du DJ et producteur musical français David Guetta, sortie le 24 novembre 2014 en France. Publié en deux éditions distinctes, l''opus standard comprend un unique disque incluant des collaborations avec des artistes issus de milieux influencés par la musique pop et le hip-hop tels que Sam Martin, Emeli Sandé, Elliphant (en), Ms. Dynamite, The Script, Nico & Vinz, John Legend, Sia, Bebe Rexha (en), Nicki Minaj, MAGIC!, Sonny Wilson, Ryan Tedder, Jaymes Young (en), Birdy, Vassy et Skylar Grey. Des producteurs comme Showtek, Avicii et Afrojack seront aussi présents.', 9.49, 3.49, '2014-12-06 08:36:30', 1, 'david_guetta_listen.jpg', '#POOPBEEF60'),
(10, 16, 'Allies Irae', 'Allen Parker est la moitié de The Edge. Producteur talentueux et méticuleux, ses productions sont léchées et hyper dynamiques.
Ayant déjà signé chez Level 75, Formule Records, Boxon Records, le pochain ep de son projet solo sera signé sur le nouveau label en vogue Oxymore Records.', 1.29, 0.99, '2014-02-08 12:45:23', 1, 'allies_irae.jpg', '#POOPBALF72'),
(11, 1, 'Indiana Jones et le Royaume du Crâne de Cristal', 'La nouvelle aventure d''Indiana Jones débute dans un désert du sud-ouest des Etats-Unis. Nous sommes en 1957, en pleine Guerre Froide. Indy et son copain Mac viennent tout juste d''échapper à une bande d''agents soviétiques à la recherche d''une mystérieuse relique surgie du fond des temps. De retour au Marshall College, le Professeur Jones apprend une très mauvaise nouvelle : ses récentes activités l''ont rendu suspect aux yeux du gouvernement américain. Le doyen Stanforth, qui est aussi un proche ami, se voit contraint de le licencier. A la sortie de la ville, Indiana fait la connaissance d''un jeune motard rebelle, Mutt, qui lui fait une proposition inattendue. En échange de son aide, il le mettra sur la piste du Crâne de Cristal d''Akator, relique mystérieuse qui suscite depuis des siècles autant de fascination que de craintes. Ce serait à coup sûr la plus belle trouvaille de l''histoire de l''archéologie. Indy et Mutt font route vers le Pérou, terre de mystères et de superstitions, où tant d''explorateurs ont trouvé la mort ou sombré dans la folie, à la recherche d''hypothétiques et insaisissables trésors. Mais ils réalisent très vite qu''ils ne sont pas seuls dans leur quête : les agents soviétiques sont eux aussi à la recherche du Crâne de Cristal, car il est dit que celui qui possède le Crâne et en déchiffre les énigmes s''assure du même coup le contrôle absolu de l''univers. Le chef de cette bande est la cruelle et somptueuse Irina Spalko. Indy n''aura jamais d''ennemie plus implacable... Indy et Mutt réuissiront-ils à semer leurs poursuivants, à déjouer les pièges de leurs faux amis et surtout à éviter que le Crâne de Cristal ne tombe entre les mains avides d''Irina et ses sinistres sbires ?', 10.99, 3.99, '2008-05-21 09:24:55', 1, 'ij_le_crane_de_cristal.jpg', '#IDALLKFR58'),
(12, 1, 'Indiana Jones et la Derniere Croisade', 'L''archéologue aventurier Indiana Jones se retrouve aux prises avec un maléfique milliardaire. Aux côtés de la cupide Elsa et de son père, il part à la recherche du Graal.', 10.99, 3.99, '1989-10-18 09:24:55', 1, 'ij_et_la_derniere_croisade.jpg', '#IDDEHFGN87'),
(13, 1, 'Indiana Jones et le Temple Maudit', 'L''archéologue aventurier Indiana Jones est de retour. Il poursuit une terrible secte qui a dérobé un joyau sacré doté de pouvoirs fabuleux. Une chanteuse de cabaret et un époustouflant gamin l''aideront a affronter les dangers les plus insensés.', 9.99, 2.99, '1984-09-12 09:37:38', 1, 'ij_et_le_temple_maudit.jpg', '#IDITQZMB21'),
(14, 1, 'Indiana Jones, Les Aventuriers de l''Arche Perdue', '1936. Parti à la recherche d''une idole sacrée en pleine jungle péruvienne, l''aventurier Indiana Jones échappe de justesse à une embuscade tendue par son plus coriace adversaire : le Français René Belloq.
Revenu à la vie civile à son poste de professeur universitaire d''archéologie, il est mandaté par les services secrets et par son ami Marcus Brody, conservateur du National Museum de Washington, pour mettre la main sur le Médaillon de Râ, en possession de son ancienne amante Marion Ravenwood, désormais tenancière d''un bar au Tibet.
Cet artefact égyptien serait en effet un premier pas sur le chemin de l''Arche d''Alliance, celle-là même où Moïse conserva les Dix Commandements. Une pièce historique aux pouvoirs inimaginables dont Hitler cherche à s''emparer...', 9.99, 2.99, '1981-09-16 08:36:30', 1, 'ij_les_aventuriers_de_l_arche_perdue.jpg', '#IDUEHDYU48'),
(15, 17, 'Asteroids Galaxy Tour - Navigator', 'The Asteroids Galaxy Tour est un groupe de Pop danois créé en 2006 par Lars Iversen et Mette Lindberg. Le groupe, composé de 6 musiciens, fit parler de lui grâce aux titres Around the Bend, qui fut utilisé dans un spot publicitaire pour l''Apple iPod Touch de septembre 2008 et The Golden Age qui fut utilisé dans un spot publicitaire pour Nesfluid. Désormais, ce titre fait la une du générique de Comment ça va bien !, émission quotidienne de la chaîne France 2 présentée par Stéphane Bern. Le groupe a fait la première partie de Katy Perry à l''Olympia (Paris) le 16 juin 2009 et le 17 juin au Transbordeur (Lyon) ainsi qu''une prestation remarquée au festival Rock en Seine en août 2009.', 1.29, 0.79, '2014-09-16 08:36:30', 1, 'asteroids_galaxy_tour_navigator.jpg', '#ASORBSSJ26'),
(16, 10, 'Boys Noize - XTC Chemical Brothers Remix', 'Boys Noize, de son vrai nom Alexander Ridha1, est un producteur et DJ allemand de musique électronique. Depuis 2004, Boys Noize a fait paraître des EP sur les labels Kitsuné Music, Turbo et sur le label DJ Hell''s International DeeJay Gigolo Records. Il est également à la tête de son propre label Boysnoize Records fondé en 2005, regroupant des DJ comme D.I.M., Les Petits Pilous, Lady B ou encore Puzique (qui s''avère être un pseudonyme de Boys Noize lui-même et de son confrère D.I.M.).', 1.29, 0.79, '2012-06-19 08:36:30', 1, 'boys_noize_cover.jpg', '#BOTCLMZF61'),
(17, 11, 'Capital Cities - In a Tidal Wave of Mystery', 'Capital Cities est un duo indie pop américain de Los Angeles.', 1.29, 0.79, '2014-03-08 08:15:55', 1, 'capital_cities_in_a_tidal_wave_of_mystery.jpg', '#CARYKVLE97'),
(18, 12, 'Disclosure - You and Me (Flume Rmx).jpg', 'Disclosure est un groupe britannique de musique électronique, originaire de Reigate dans le comté de Surrey situé au sud de Londres. Actif depuis 2010, il est composé des frères Guy et Howard Lawrence.

En 2013, leur single White Noise se classe 2nd des charts britanniques. Settle, le premier album du duo, atteint la première place des ventes au Royaume-Uni lors de sa sortie. Il est nommé au Mercury Music Prize.

Ils collaboreront notamment avec le légendaire Nile Rodgers sur le morceau Together, fin 2013, aux côtés de Sam Smith et Jimmy Napes.

En 2014, le tube ''You & me'' feat Elisa Doolittle remixé par Flume fait un carton.', 1.29, 0.79, '2013-04-08 09:55:25', 1, 'disclosure_you_and_me_flume_rmx.jpg', '#DIMEKJGZ15'),
(19, 13, 'If The Kids - On The Run', 'If the kids are united then we''ll never be divided, voilà la ligne de base de Brice Montessuit, fondateur et compositeur du groupe. Lorsque, adolescent, Brice entend ce morceau de Sham 69, il décode une formule magicale. A partir de là, il connaîtra le succès avec un groupe de rock. Il aiguisera ensuite sa vision en tant que DJ et voit alors ses prods électro s''imposer dans le milieu (Yuksek remixera un de ses maxis). Sa dernière invention, c''est IF THE KIDS.', 1.29, 0.79, '2014-08-11 09:42:19', 1, 'if_the_kids_on_the_run.jpg', '#IFUNKSOS55'),
(20, 15, 'Jazzanova - Bohemian Sunset', 'Jazzanova est un collectif allemand de DJs basé à Berlin, composé d''Alexander Barck, Claas Brieler, Jürgen von Knoblauch, Roskow Kretschmann, Stefan Leisering, et Axel Reinemer. Le groupe évolue dans des styles nu-jazz, chill-out et jazz house, et est associé à des labels tels que Compost Records et Sonar Kollektiv. Ils se sont aussi essayés au latin jazz, que l''on peut écouter sur leur morceau Très bien.', 1.29, 0.79, '2005-02-23 09:53:12', 1, 'jazzanova_bohemian_sunset.jpg', '#JAETKSGE52'),
(21, 14, 'SebastiAn - Arabest', 'SebastiAn, de son vrai nom Sébastian Akchoté est un musicien français de musique électronique, évoluant sur le label Ed Banger Records.', 1.29, 0.79, '2009-01-15 10:10:48', 1, 'sebastian_arabest.jpg', '#SESTLSEZ26'),
(22, 16, 'SebastiAn - Motor', 'SebastiAn, de son vrai nom Sébastian Akchoté est un musicien français de musique électronique, évoluant sur le label Ed Banger Records.', 1.29, 0.79, '2009-01-15 10:11:48', 1, 'sebastian_motor.jpg', '#SEORSSNT79'),
(23, 16, 'SebastiAn - Ross Ross Ross', 'SebastiAn, de son vrai nom Sébastian Akchoté est un musicien français de musique électronique, évoluant sur le label Ed Banger Records.', 1.29, 0.79, '2009-01-15 10:12:48', 1, 'sebastian_ross_ross_ross.jpg', '#SESSZKST24'),
(24, 6, 'La Vie rêvée de Walter Mitty', 'Walter Mitty est un homme ordinaire, enfermé dans son quotidien, qui n''ose s''évader qu''à travers des rêves à la fois drôles et extravagants. Mais confronté à une difficulté dans sa vie professionnelle, Walter doit trouver le courage de passer à l''action dans le monde réel. Il embarque alors dans un périple incroyable, pour vivre une aventure bien plus riche que tout ce qu''il aurait pu imaginer jusqu''ici. Et qui devrait changer sa vie à jamais.', 10.99, 2.99, '2013-01-01 21:00:00', 1, 'mitty.jpg', '#SCUEGBFE73'),
(25, 4, 'La doublure', 'Surpris par un paparazzi avec Eléna, sa maîtresse, un top model superbe, le milliardaire Pierre Levasseur tente d''éviter un divorce sanglant en inventant un mensonge invraisemblable. Il profite de la présence sur la photo, d''un passant, François Pignon, pour affirmer à sa femme qu''Eléna n''est pas avec lui, mais avec Pignon.
Pignon est voiturier. C''est un petit homme modeste. Levasseur, pour accréditer son mensonge, est obligé d''envoyer la trop belle Eléna vivre avec Pignon. Elena chez Pignon, c''est un oiseau de paradis dans un H.L.M. Et aussi une mine de situations.', 10.99, 3.99, '2006-03-29 15:20', 1, 'la_doublure.jpg', '#SCUEFFXG35'),
(26, 3, 'A la recherche du Bonheur', 'Représentant de commerce, Chris Gardner a du mal à gagner sa vie. Il jongle pour s''en sortir, mais sa compagne supporte de moins en moins leur précarité. Elle finit par quitter Chris et leur petit garçon de cinq ans, Christopher.
Désormais seul responsable de son fils, Chris se démène pour décrocher un job, sans succès. Lorsqu''il obtient finalement un stage dans une prestigieuse firme de courtage, il se donne à fond, même si pour le moment il n''est pas payé. Incapable de régler son loyer, il se retrouve à la rue avec Christopher. Le père et le fils dorment dans des foyers ou des gares, cherchant des refuges de fortune au jour le jour.
Perdu dans la pire épreuve de sa vie, Chris continue à veiller sur Christopher, puisant dans l''affection et la confiance de son fils la force de surmonter les obstacles...', 10.96, 3.97, '2007-01-31 20:30', 1, 'a_la_recherche_du_bonheur.jpg', '#SCUEFNFX17'),
(27, 9, 'Star Wars : Episode VI', 'L''Empire galactique est plus puissant que jamais : la construction de la nouvelle arme, l''Etoile de la Mort, menace l''univers tout entier... Arrêté après la trahison de Lando Calrissian, Han Solo est remis à l''ignoble contrebandier Jabba Le Hutt par le chasseur de primes Boba Fett. Après l''échec d''une première tentative d''évasion menée par la princesse Leia, également arrêtée par Jabba, Luke Skywalker et Lando parviennent à libérer leurs amis.
Han, Leia, Chewbacca, C-3PO et Luke, devenu un Jedi, s''envolent dès lors pour une mission d''extrême importance sur la lune forestière d''Endor, afin de détruire le générateur du bouclier de l''Etoile de la Mort et permettre une attaque des pilotes de l''Alliance rebelle. Conscient d''être un danger pour ses compagnons, Luke préfère se rendre aux mains de Dark Vador, son père et ancien Jedi passé du côté obscur de la Force.', 10.99, 4.37, '1997-04-23 20:30', 1, 'starwarsvi.jpg', '##SCUENTXG26'),
(28, 24, 'A QUOI REVENT LES ROBOTS', 'Bande dessinée scientifique éducative sur le thème de la cybernétique.', 8.99, 2.99, '2013-01-11 12:30', 1, 'ansel.gif', '#BAESNGFF75'),
(29, 30, '20 000 Lieues Sous les Mers', 'En cette année 1866, une forte angoisse règne sur les océans. Un monstre marin effrayant a été signalé dans diverses mers par plusieurs navires. Une expédition s''organise à bord de la frégate américaine Abraham Lincoln. Elle a notamment à son bord le capitaine Faragutt, le canadien Ned Land,  le fameux naturaliste français Aronnax du Muséum de Paris  et son fidèle domestique Conseil. Le but de cette expédition est de débarrasser les mers de cette abominable menace.', 8.99, 2.99, '1999-01-11 12:30', 1, '20000_lieues_sous_les_mers.jpg', '#VIMILSLM95'),
(30, 30, 'L''île Mysterieuse', 'L''ingénieur Cyrus Smith, son domestique Nab, Gédéon Spilett (journaliste), Pencroff (marin), le jeune Harbert (élevé par Pencroff à la mort de son père, le capitaine de Pencroff) et Top, le chien de Smith, fuient en ballon dirigeable Richmond, quartier général de l''armée sudiste où en tant que nordistes, ils étaient retenus prisonniers. Le ballon finit par s''écraser sur une île au large de la Nouvelle-Zélande où les rescapés vont s''organiser en une micro-société de Robinson Crusoé, aidés par la découverte d''une boîte remplie de munitions et d''outils. A bord d''un petit bateau construit par leurs soins, ils explorent l''île toute proche, où ils trouvent Ayrton (personnage des Enfants du capitaine Grant), naufragé vivant dans des conditions déplorables, qu''ils emmènent sur leur île. Une tempête les surprend, et ils ne doivent leur salut qu''à un feu allumé par on ne sait qui, grâce auquel ils sont en mesure de se repérer. Les anciens camarades d''Ayrton, des pirates, surviennent peu après et manquent de tuer les naufragés. Leur bateau pirate est détruit sans aucune explication logique, et plus étrange encore, les corps des pirates morts ne présentent aucune blessure...', 8.99, 2.99, '1998-01-12 12:30', 1, 'ile_mysterieuse.jpg', '#LIMYSTER87'),
(31, 30, 'Voyage au centre de la terre', 'Dans la petite maison du vieux quartier de Hambourg où Axel, jeune homme assez timoré, travaille avec son oncle, l’irascible professeur Lidenbrock, géologue et minéralogiste, dont il aime la pupille, la charmante Graüben, l’ordre des choses est soudain bouleversé.
Dans un vieux manuscrit, Lidenbrock trouve un cryptogramme. Arne Saknussemm, célèbre savant islandais du xvie siècle, y révèle que par la cheminée du cratère du Sneffels, volcan éteint d’Islande, il a pénétré jusqu’au centre de la Terre !
Lidenbrock s’enflamme aussitôt et part avec Axel pour l’Islande où, accompagnés du guide Hans, aussi flegmatique que son maître est bouillant, ils s’engouffrent dans les mystérieuses profondeurs du volcan…
En décrivant les prodigieuses aventures qui s’ensuivront, Jules Verne a peut-être atteint le sommet de son talent. La vigueur du récit, la parfaite maîtrise d’un art accordé à la puissance de l’imagination placent cet ouvrage au tout premier plan dans l’œuvre exceptionnelle du romancier.', 8.99, 2.99, '1999-02-13 12:30', 1, 'voyage_au_centre_de_la_terre.jpg', '#VOYACTER25'),
(32, 28, 'Informatique / Internet : 82 astuces', '82 astuces qui vont transformer votre approche de l''informatique et d''internet', 6.99, 1.99, '2003-01-11 14:30', 1, '82_astuces.PNG', '#ASINFINT03'),
(33, 27, 'Histoire du capitalisme', 'L''histoire du capitalisme soulève de nombreuses polémiques, sujets de confrontation entre les grands courants politiques et économiques : impérialisme, colonialisme, inégalités, crises économiques, exploitation, mais aussi démocratie, liberté, développement, richesse et abondance sont autant de termes et concepts maniés par les auteurs qui ont étudié le sujet.', 8.99, 2.99, '2007-08-14 12:30', 1, 'histoire_du_capitalisme.jpg', '#HISDUCAP07'),
(34, 22, 'Les principaux courants de pensée économique', 'Parmi les penseurs, souvent philosophes, qui se sont intéressés à l''économie, Platon et son élève Aristote sont probablement les plus connus. Les philosophes grecs subordonnent l''économie et la politique : c''est l''art d''administrer ses biens ou sa cité. La science économique n''existe pas, au contraire de la science politique, qui se rapporte à la cité et est considérée par
bien des Grecs comme la première des sciences.', 5.99, 0.99, '2011-08-18 12:30', 1, 'courant_pensee_economique.gif', '#COUPEECO11'),
(35, 23, 'Le rayon vert', 'Helena Campbell, jeune fille fantasque issue d’un des meilleurs clans écossais, déclare à ses oncles qu’elle n’envisagera le mariage qu’après avoir contemplé le rayon vert. Selon une vieille tradition, celui qui l’a vu ne peut plus se tromper dans les choses des sentiments. Au cours de cette quête, elle pourra juger les qualités et les sentiments du jeune pédant Aristobulus Ursiclos ainsi que l’âme d’un jeune peintre qu’elle sauvera d’un naufrage.', 5.99, 0.99, '2001-08-30 12:30', 1, 'le_rayon_vert.jpg', '#LERAYVER01'),
(36, 26, 'Alice au Pays des Merveilles', 'Pour échapper à des fiançailles qui lui déplaisent, Alice Kingsleigh s’enfuit à la poursuite d’un mystérieux lapin blanc vêtu d’un gilet. Après une chute dans son terrier, elle atterrit dans un pays fantastique mais étrangement familier…', 5.99, 0.99, '2010-07-01 12:30', 1, 'alice_au_pays_des_merveilles.jpg', '#ALIAUPAYM10'),
(37, 29, 'Contes de Noel', 'Cet ouvrage est un recueil de contes de noël écrit par Coppée, Lemonnier, Dickens, Daudet, Le Braz, Stevenson et bien d''autres...', 4.99, 0.79, '2006-12-01 10:00', 1, 'contes_de_noel.jpg', '#CONDENOL45'),
(38, 31, 'Vie et mort chez Heidegger', 'La vie est apparue sur Terre il y a environ 3,5 milliards d''années, et depuis elle n''a cessé, sous les formes les plus variées, de s''étendre partout sur la planète jusque dans les milieux les
plus hostiles. La vie a même, au cours du temps géologique, survécu à cinq extinctions massives d''espèces, la plus dévastatrice ayant été celle de la période du Permien qui s''est produite il y a environ 250 millions d''années et qui fit disparaître près de 95% des espèces marines et 70% des espèces terrestres. De plus, la vie a, après chaque extinction, rebondi en faisant preuve de nouvelles inventivités. Tout semble donc indiquer que, quoi qu''il advienne, la vie sur Terre n''est pas près de disparaître.', 9.99, 2.79, '2012-10-01 14:00', 1, 'vie_et_mort.jpg', '#VIUHREZU47'),
(39, 32, 'Echec et Meurtres', 'Étudiante en droit, Jade Iblancour voit arriver avec dépit des vacances qu’elle prévoit ennuyeuses. Coincée en Normandie avec un beau-père trop riche, elle pense avoir contre elle la Terre entière. Pourtant, sa rencontre avec Antony Doriat prend un tour imprévu. Après tout, ils ont tous les deux besoin d’argent, et le beau-père de Jade en a suffisamment pour tous les deux. Mais comment le convaincre de partager ? ... En tuant, bien sûr. Néanmoins, il reste un problème : comment échapper à la justice ?', 7.99, 1.99, '2013-06-01 15:00', 1, 'echec_meurtres.png', '#ERTDCVJR78');

INSERT INTO `film` (`id_objet`, `format`, `resolution`, `sigle`, `realisateur`, `fichier`) VALUES (1, 'avi', '1280*720', 'FullHD', 'Shinji Aramaki', 'albator.mp4'),
(2, 'mp4', '1280*720', 'FullHD', 'Thomas Szabo, Hélène Giraud', 'minuscule.mp4'),
(3, 'mkv', '1280*720', 'FullHD', 'Louis Leterrier', 'insaisissables.mp4'),
(4, 'mkv', '1280*720', 'FullHD', 'Nicolas Winding Refn', 'drive.mp4'),
(5, 'mkv', '1280*720', 'FullHD', 'David Yates', 'harrypotterseptpt1.mp4'),
(6, 'mkv', '1280*720', 'FullHD', 'David Yates', 'harrypotterseptpt2.mp4'),
(7, 'mkv', '1280*720', 'FullHD', 'Tim Burton', 'frankenweenie.mp4'),
(8, 'mkv', '1280*720', 'FullHD', 'Chris Renaud, Pierre Coffin', 'moimocheetmechant.mp4'),
(11, 'mkv', '1280*720', 'FullHD', 'Steven Spielberg', 'indianaetlecranedecristal.mp4'),
(12, 'mkv', '1280*720', 'FullHD', 'Steven Spielberg', 'indianaetladernierecroisade.mp4'),
(13, 'mkv', '1280*720', 'FullHD', 'Steven Spielberg', 'indianaetletemplemaudit.mp4'),
(14, 'mkv', '1280*720', 'FullHD', 'Steven Spielberg', 'indianajoneslarcheperdue.mp4'),
(24, 'mkv', '1280*720', 'FullHD', 'Ben Stiller', 'laviereveedewaltermitty.mp4'),
(25, 'mkv', '1280*720', 'FullHD', 'Francis Veber', 'ladoublure.mp4'),
(26, 'mkv', '1280*720', 'FullHD', 'Gabriele Muccino', 'alarecherchedubonheur.mp4'),
(27, 'mp4', '1280*720', 'FullHD', 'Gabriele Muccino', 'leretourdujedi.mp4');

INSERT INTO `musique` (`id_objet`, `duree`, `format`, `dossier`, `auteur`) VALUES (9, 'none', 'mp3', 'listen/david.mp3', 'David Guetta'),
(10, 'none', 'mp3', 'electro/allen_parker_allies_irae.wav', 'Allen Parker'),
(15, 'none', 'mp3', 'pop/the_asteroids_galaxy_tour_navigator.mp3', 'Asteroids Galaxy Tour'),
(16, 'none', 'mp3', 'electro/boys_noize_xtc_chemical_brothers_remix.mp3', 'Boys Noize - Chemical Brothers Remix'),
(17, 'none', 'mp3', 'pop/capital_cities_in_a_tidal_wave_of_mystery.mp3', 'Capital Cities'),
(18, 'none', 'mp3', 'electro/disclosure_you_and_me_ft_eliza_doolittle_flume_remix.mp3', 'Disclosure'),
(19, 'none', 'mp3', 'pop/if_the_kids_on_the_run.mp3', 'If The Kids'),
(20, 'none', 'mp3', 'monde/jazzanova_bohemian_sunset.mp3', 'Jazzanova'),
(21, 'none', 'mp3', 'electro/sebatian_arabest.mp3', 'SebastiAn'),
(22, 'none', 'mp3', 'electro/sebatian_motor.mp3', 'SebastiAn'),
(23, 'none', 'mp3', 'electro/sebatian_ross_ross_ross.mp3', 'SebastiAn');

INSERT INTO `livre` (`id_objet`, `format`, `auteur`, `fichier`)
VALUES (28, 'pdf', 'Jean-Pierre Petit', 'bd_robot.pdf'),
(29, 'pdf', 'Jules Vernes', 'jules_verne_20000_lieues_sous_les_mers.pdf'),
(30, 'pdf', 'Jules Vernes', 'jules_verne_ile_mysterieuse.pdf'),
(31, 'pdf', 'Jules Vernes', 'jules_verne_voyage_centre_terre_illustre.pdf'),
(32, 'pdf', 'Didier Fourt', 'informatique_internet_82_astuces.pdf'),
(33, 'pdf', 'Michel Beaud', 'histoire_capitalisme.pdf'),
(34, 'pdf', 'Alain Samuelson', 'courants_pensee_economique.pdf'),
(35, 'pdf', 'Jules Vernes', 'jules_verne_le_rayon_vert.pdf'),
(36, 'pdf', 'Lewis Carroll', 'Alice_au_Pays_des_Merveilles.pdf'),
(37, 'pdf', 'Lemonnier, Dickens, Daudet...', 'Contes_de_Noel.pdf'),
(38, 'pdf', 'Jonathan Bergeron', 'vie_et_mort_chez_Heidegger.pdf'),
(39, 'pdf', 'Clémence Blanc', 'echec_et_meurtres.pdf');

/*
INSERT INTO `facture` (`id_facture`) VALUES 
INSERT INTO `acheter` (`id_acheter`, `date_achat`, `prix_total`, `id_utilisateur`, `id_objet`, `id_facture`) VALUES
INSERT INTO `louer` (`id_louer`, `date_debut`, `date_fin`, `prix`, `id_utilisateur`, `id_objet`, `id_facture`) VALUES
INSERT INTO `historique` (`id_historique`, `date_obtention`, `prix_total`, `type`, `id_utilisateur`, `id_objet`, `id_facture`) VALUES

CREATE VIEW vueSav AS(SELECT id_message, titre, message, date_message, statut, nom, prenom, email FROM utilisateur u, message_sav m where u.id_utilisateur = m.id_utilisateur);*/


CREATE VIEW maxDepCli AS (SELECT u.id_utilisateur, nom, prenom, SUM(prix_total) AS TTC FROM utilisateur u, historique h
WHERE u.id_utilisateur = h.id_utilisateur GROUP BY h.id_utilisateur ORDER BY TTC DESC);

CREATE VIEW maxObj AS(SELECT u.id_utilisateur, u.nom, u.prenom, COUNT(h.id_utilisateur) AS NbTT FROM utilisateur u, historique h
WHERE u.id_utilisateur = h.id_utilisateur GROUP BY h.id_utilisateur ORDER BY NbTT DESC);

CREATE VIEW maxA AS(SELECT o.designation, COUNT(h.id_objet) AS NbTA FROM objet o, historique h
WHERE o.id_objet = h.id_objet AND h.type="achat" GROUP BY h.id_objet ORDER BY NbTA DESC);

CREATE VIEW maxL AS(SELECT o.designation, COUNT(h.id_objet) AS NbTL FROM objet o, historique h
WHERE o.id_objet = h.id_objet AND h.type="location" GROUP BY h.id_objet ORDER BY NbTL DESC);

CREATE VIEW mesobjetsloues AS(SELECT l.id_louer, l.date_fin, l.id_objet, l.id_utilisateur, o.designation, c.designation AS categ, s.designation AS subcateg, o.description FROM louer l INNER JOIN objet o ON l.id_objet = o.id_objet JOIN sous_categorie s ON o.id_sous_categorie = s.id_sous_categorie JOIN categorie c ON s.id_categorie = c.id_categorie);

CREATE VIEW mesobjetsachetes AS(SELECT a.id_acheter, a.id_objet, a.id_utilisateur, o.designation, c.designation AS categ, s.designation AS subcateg, o.description FROM acheter a INNER JOIN objet o ON a.id_objet = o.id_objet JOIN sous_categorie s ON o.id_sous_categorie = s.id_sous_categorie JOIN categorie c ON s.id_categorie = c.id_categorie);

DELIMITER £
CREATE PROCEDURE selectNews(IN id_categorieIN INT(2))
BEGIN
	SELECT e.id_objet, e.designation, e.photo, e.prix_location, e.prix_achat 
	FROM objet e INNER JOIN sous_categorie s ON s.id_sous_categorie = e.id_sous_categorie 
	WHERE s.id_categorie = id_categorieIN
	ORDER BY date_lencement DESC LIMIT 0, 2;
END £
DELIMITER ;

DELIMITER £
CREATE PROCEDURE effectuerAchat(IN date_achatIN DATETIME, IN prix_totalIN FLOAT, IN id_utilisateurIN INT(3), IN id_objetIN INT(3), IN id_factureIN INT(3))
BEGIN
	INSERT INTO `acheter` (`date_achat`, `prix_total`, `id_utilisateur`, `id_objet`, `id_facture`)
	VALUES (date_achatIN, prix_totalIN, id_utilisateurIN, id_objetIN, id_factureIN);
	INSERT INTO `historique` (`date_obtention`, `prix_total`, `type`, `id_utilisateur`, `id_objet`, `id_facture`) 
	VALUES (date_achatIN, prix_totalIN, 'achat', id_utilisateurIN, id_objetIN, id_factureIN);
END £
DELIMITER ;

DELIMITER £
CREATE PROCEDURE effectuerLocation(IN date_debutIN DATETIME, IN date_finIN DATETIME, IN prixIN FLOAT, IN id_utilisateurIN INT(3), IN id_objetIN INT(3), IN id_factureIN INT(3))
BEGIN
	INSERT INTO `louer` (`date_debut`, `date_fin`, `prix`, `id_utilisateur`, `id_objet`, `id_facture`)
	VALUES (date_debutIN, date_finIN, prixIN, id_utilisateurIN, id_objetIN, id_factureIN);
	INSERT INTO `historique` (`date_obtention`, `prix_total`, `type`, `id_utilisateur`, `id_objet`, `id_facture`) 
	VALUES (date_debutIN, prixIN, 'location', id_utilisateurIN, id_objetIN, id_factureIN);
END £
DELIMITER ;

DELIMITER £
CREATE PROCEDURE recupererUser(IN id_utilisateurIN INT(3))
BEGIN
	SELECT * FROM utilisateur WHERE id_utilisateur = id_utilisateurIN;
END £
DELIMITER ;

DELIMITER £
CREATE PROCEDURE recupObjetLouer(IN id_utilisateurIN INT(3))
BEGIN
	SELECT l.id_louer, l.date_fin, l.id_objet, l.id_utilisateur, o.designation 
	FROM louer l INNER JOIN objet o ON l.id_objet = o.id_objet 
	WHERE l.id_utilisateur = id_utilisateurIN AND NOW() < l.date_fin;
END £
DELIMITER ;

DELIMITER £
CREATE PROCEDURE recupObjetAcheter(IN id_utilisateurIN INT(3))
BEGIN
	SELECT a.id_acheter, a.id_objet, a.id_utilisateur, o.designation 
	FROM acheter a INNER JOIN objet o ON a.id_objet = o.id_objet 
	WHERE a.id_utilisateur = id_utilisateurIN;
END £
DELIMITER ;

DELIMITER £
CREATE PROCEDURE ListeArticleNbFoisAcheter()
BEGIN
	SELECT designation, COUNT(h.id_historique) AS Nbr_Achat 
	FROM historique h, objet o
	WHERE h.type = 'achat' AND h.id_objet = o.id_objet 
	GROUP BY h.id_objet 
	ORDER BY Nbr_Achat DESC ;
END £
DELIMITER ;

DELIMITER £
CREATE PROCEDURE ListeArticleNbFoisLouer()
BEGIN
	SELECT designation, COUNT(h.id_historique) AS Nbr_Loca 
	FROM historique h, objet o
	WHERE h.type = 'location' AND h.id_objet = o.id_objet 
	GROUP BY h.id_objet 
	ORDER BY Nbr_Loca DESC ;
END £
DELIMITER ;

DELIMITER £
CREATE PROCEDURE SelectBestAchat()
BEGIN
	SELECT u.id_utilisateur, nom, prenom, COUNT(h.id_utilisateur) AS Nb_Achat
	FROM historique h, utilisateur u
	WHERE h.id_utilisateur = u.id_utilisateur AND h.type='achat' 
	GROUP BY h.id_utilisateur 
	ORDER BY Nb_Achat DESC ;
END £
DELIMITER ;

DELIMITER £
CREATE PROCEDURE SelectBestLocation()
BEGIN
	SELECT u.id_utilisateur, nom, prenom, COUNT(h.id_utilisateur) AS Nb_Loca
	FROM historique h, utilisateur u
	WHERE h.id_utilisateur = u.id_utilisateur AND h.type='location' 
	GROUP BY h.id_utilisateur 
	ORDER BY Nb_Loca DESC ;
END £
DELIMITER ;