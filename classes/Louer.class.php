<?php
	Class Louer
	{
		private $id_location, $date_debut, $date_fin, $prix, $id_utilisateur, $id_objet, $id_facture;
		
		public function __construct()
		{
			$this->id_location = $this->prix = $this->id_utilisateur = $this->id_objet = $this->id_facture = 0;
			$this->date_debut = $this->date_fin = "";
		}

		//Permet d'assigner des valeurs aux attributs de l'objet à partir d'un tableau passé en paramètre contenant les informations souhaitées -- Ici cette fonction sert à sérialisé l'objet avant d'effectuer la location
		public function serialiser($tab) {
			$this->date_debut = $tab['date_debut'];
			$this->date_fin = $tab['date_fin'];
			$this->prix = $tab['prix'];
			$this->id_utilisateur = $tab['id_utilisateur'];
			$this->id_objet = $tab['id_objet'];
			$this->id_facture = $tab['id_facture'];
		}

		/** Permet d'ajouter la location dans la table louer et dans la table historique
		  * Cette fonction utilise une procédure stockée
		  * Elle appelle la méthode selectAllLibre de la classe Memory (instance = $BDD)*/
		public function effectuerLocation()
		{
			$BDD = new Memory();
			$req = 'CALL effectuerLocation(\''.$this->date_debut.'\', \''.$this->date_fin.'\', '.$this->prix.', '.$this->id_utilisateur.', '.$this->id_objet.', '.$this->id_facture.')';
			mysql_write($req);
			$BDD->selectAllLibre($req);
		}

		// Permet de récupérer les objets loués d'un utilisateur */
		public function recupObjetsLoues($id_utilisateur) {
			$now = date("Y-m-d H:i:s");
			$BDD = new Memory();
			return utf8_array($BDD->selectAllLibre("SELECT l.id_louer, l.date_fin, l.id_objet, l.id_utilisateur, o.designation FROM louer l INNER JOIN objet o ON l.id_objet = o.id_objet WHERE l.id_utilisateur = ".intval($id_utilisateur)." AND '".$now."' < l.date_fin;"));
		}
	}
?>