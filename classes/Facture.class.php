<?php
	Class Facture
	{
		private $id_facture;

		public function __construct()
		{
			$this->id_facture = 0;
		}

		public function creerFacture()
		{
			$BDD = new Memory();
			$BDD->insert('facture', array());

			$this->id_facture = $BDD->dernierID();
		}

		//Méthodes

		//Getters
		public function getId_facture() { return $this->id_facture; }

		//Setters
		public function setId_facture($id_facture) { return $this->id_facture = $id_facture; }

	}
?>