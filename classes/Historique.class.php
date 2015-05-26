<?php
	Class Historique
	{
		private $id_historique, $date_obtention, $prix_total, $id_utilisateur, $id_objet, $id_facture, $type;

		public function __construct()
		{
			$this->id_historique = $this->prix_total = $this->id_utilisateur = $this->id_objet = $this->id_facture = 0;
			$this->date_obtention = $this->type = "";
		}

		public function serialiser($tab)
		{
			$this->date_obtention = $tab['date_obtention'];
			$this->prix_total = $tab['prix_total'];
			$this->type = $tab['type'];
			$this->id_utilisateur = $tab['id_utilisateur'];
			$this->id_objet = $tab['id_objet'];
			$this->id_facture = $tab['id_facture'];
		}

		public function recupFacturesClient($id_client) {
			$BDD = new Memory();
			return utf8_array($BDD->selectAll('historique', 'distinct id_facture', array('id_utilisateur' => $id_client), 'ORDER BY id_facture DESC'));
		}

		public function recupHistoClient($id_client, $id)
		{
			$BDD = new Memory();
			return utf8_array($BDD->selectAllLibre("SELECT h.id_historique, h.date_obtention, h.prix_total, h.type, h.id_utilisateur, h.id_objet, h.id_facture, o.designation FROM historique h INNER JOIN objet o ON h.id_objet = o.id_objet WHERE h.id_facture = ".$id.";"));
		}
	}
?>