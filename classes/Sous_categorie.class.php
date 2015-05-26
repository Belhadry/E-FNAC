<?php
	Class Sous_categorie
	{
		private $id_sous_categorie, $designation, $id_categorie;

		public function __construct()
		{
			$this->id_sous_categorie = $this->id_categorie = 0;
			$this->designation = "";
		}
		//Méthode pour sérialiser
		public function serialise($tab) {
			$tableau = array('id_sous_categorie', 'designation', 'id_categorie', 'par_defaut');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('id_sous_categorie', 'designation', 'id_categorie', 'par_defaut');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}
		//Getters
		public function getId_sous_categorie() { return $this->id_sous_categorie; }
		public function getDesignation() { return $this->designation; }
		public function getId_categorie() { return $this->id_categorie; }
		public function getPar_defaut() { return $this->par_defaut; }

		//Setters
		public function setId_sous_categorie($id_sous_categorie) { return $this->id_sous_categorie = $id_sous_categorie; }
		public function setDesignation($designation) { return $this->designation = $designation; }
		public function setId_categorie($id_categorie) { return $this->id_categorie = $id_categorie; }
		public function setPar_defaut($par_defaut) { return $this->par_defaut = $par_defaut; }
	}
?>