<?php
	Class Acheter
	{
		private $id_acheter, $date_achat, $prix_total, $id_utilisateur, $id_objet, $id_facture;

		public function __construct()
		{
			$this->id_achat = $this->prix_total = $this->id_utilisateur = $this->id_objet = $this->id_facture = 0;
			$this->date_achat = "";
		}

		//Méthodes

		//Permet d'assigner des valeurs aux attributs de l'objet à partir d'un tableau passé en paramètre contenant les informations souhaitées -- Ici cette fonction sert à sérialisé l'objet avant d'effectuer l'achat
		public function serialiser($tab)
		{
			$this->date_achat = $tab['date_achat'];
			$this->prix_total = $tab['prix_total'];
			$this->id_utilisateur = $tab['id_utilisateur'];
			$this->id_objet = $tab['id_objet'];
			$this->id_facture = $tab['id_facture'];
		}

		/** Permet d'ajouter l'achat dans la table acheter et dans la table historique
		  * Cette fonction utilise une procédure stockée
		  * Elle appelle la méthode selectAllLibre de la classe Memory (instance = $BDD)*/
		public function effectuerAchat()
		{
			$req = 'CALL effectuerAchat(\''.$this->date_achat.'\', '.$this->prix_total.', '.$this->id_utilisateur.', '.$this->id_objet.', '.$this->id_facture.')';
			$BDD = new Memory();
			$BDD->selectAllLibre($req);
		}

		// Permet de récupérer les objets achetés d'un utilisateur */
		public function recupObjetsAchetes($id_utilisateur)
		{
			$BDD = new Memory();
			return utf8_array($BDD->selectAllLibre("SELECT a.id_acheter, a.id_objet, a.id_utilisateur, o.designation FROM acheter a INNER JOIN objet o ON a.id_objet = o.id_objet WHERE a.id_utilisateur = ".intval($id_utilisateur).";"));
		}

		//Getters
		public function getId_acheter() { return $this->id_acheter; }
		public function getDate_achat() { return $this->date_achat; }
		public function getPrix_total() { return $this->prix_total; }
		public function getId_utilisateur() { return $this->id_utilisateur; }
		public function getId_objet() { return $this->id_objet; }
		public function getId_facture() { return $this->id_facture; }

		//Setters
		public function setId_acheter($id_acheter) { return $this->id_acheter = $id_acheter; }
		public function setDate_achat($date_achat) { return $this->date_achat = $date_achat; }
		public function setPrix_total($prix_total) { return $this->prix_total = $prix_total; }
		public function setId_utilisateur($id_utilisateur) { return $this->id_utilisateur = $id_utilisateur; }
		public function setId_objet($id_objet) { return $this->id_objet = $id_objet; }
		public function setId_facture($id_facture) { return $this->id_facture = $id_facture; }
	}
?>