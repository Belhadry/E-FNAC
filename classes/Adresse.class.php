<?php
	Class Adresse
	{
		private $id_adresse, $designation, $code_postal, $ville, $pays;

		public function __construct()
		{
			$this->id_adresse = 0;
			$this->designation = '';
			$this->code_postal = '';
			$this->ville = '';
			$this->pays = '';
		}

		//Méthodes

		//Permet de renseigné les attributs de la classe adresses à partir de variables passées en paramètre
		public function renseigner($des, $cp, $city, $pays)
		{
			$this->designation = htmlspecialchars($des);
			$this->code_postal = htmlspecialchars($cp);
			$this->ville = htmlspecialchars($city);
			$this->pays = htmlspecialchars($pays);
		}

		//Permet de construire un tableau à partir des attributs de la classe
		public function attributsToSmarty()
		{
			$tableau = array();
			array_push($tableau, $this->designation, $this->code_postal, $this->ville, $this->pays);
			return $tableau;
		}

		//Getters
		public function getId_adresse() { return $this->id_adresse; }
		public function getDesignation() { return $this->designation; }
		public function getCode_postal() { return $this->code_postal; }
		public function getVille() { return $this->ville; }
		public function getPays() { return $this->pays; }

		//Setters
		public function setId_adresse($id_adresse) { return $this->id_adresse = $id_adresse; }
		public function setDesignation($designation) { return $this->designation = $designation; }
		public function setCode_postal($code_postal) { return $this->code_postal = $code_postal; }
		public function setVille($ville) { return $this->ville = $ville; }
		public function setPays($pays) { return $this->pays = $pays; }

	}
?>