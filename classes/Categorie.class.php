<?php
	class Categorie {
		//Attributs privés
		private $id_categorie, $designation;

		//Constructeur
		public function __construct() {
			$this->id_categorie = $this->designation = '';
		}

		//Méthodes

		//Méthode pour lister les entrées de la table categorie
		public static function lister() {
			$BDD = new Memory();
			return $BDD->selectAll('categorie', '*', 1);
		}

		//Méthode pour récupérer une entrée de la table categorie
		public function recuperer() {
			$BDD = new Memory();
			return $BDD->select('categorie', '*', array('id' => $this->id));
		}

		//Getters
		public function getId_categorie() { return $this->id_categorie; }
		public function getDesignation() { return $this->designation; }

		//Setters
		public function setId_categorie($id_categorie) { return $this->id_categorie = $id_categorie; }
		public function setDesignation($designation) { return $this->designation = $designation; }

	}
?>