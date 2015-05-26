<?php
	class Livre extends Objet {
		//Attributs privés
		private $id_livre, $id_objet, $format, $auteur, $fichier;

		//Constructeur
		public function __construct() {
			$this->id_livre = $this->id_objet = $this->format = $this->auteur = $this->fichier = '';
		}

		//Méthodes

		public function recupLivre($id_objet) {
			$requete = 'SELECT l.fichier, o.designation, l.format FROM livre l INNER JOIN objet o ON l.id_objet = o.id_objet WHERE o.id_objet = '.$id_objet;
			$BDD = new Memory();
			return $BDD->selectLibre($requete);
		}

	}
?>