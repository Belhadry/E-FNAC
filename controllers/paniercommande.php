<?php
	//Instanciation d'un objet de la class Memory (Model)
	$unRQ = new Memory();

	if (isset($_POST['commander'])) {
		if (!isset($_SESSION['id_client']))
			header('Location: index.php?tab=mon_compte');
		elseif (isset($_SESSION['panier']) && !empty($_SESSION['panier']))
		{
			$uneFacture = new Facture();
			//Création d'une nouvelle entrée dans la table facture et assignation de l'attribut facture au dernier id inséré
			$id_facture = $uneFacture->creerFacture();

			$liste = $unPanier->recupPanier($unRQ);

			foreach ($liste as $key => $value)  {
				if ($value['type'] == 'location')  {
					$tableau = array('date_debut' => date("Y-m-d H:i:s"),
						'date_fin' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")." + 28 days")), 'prix' => $value['prix'], 'id_utilisateur' => $_SESSION['id_client'], 'id_objet' => $value['id_objet'], 'id_facture' => $uneFacture->getId_facture());

					$uneLocation = new Louer();
					$uneLocation->serialiser($tableau);
					$uneLocation->effectuerLocation();
				}
				elseif ($value['type'] == 'achat') {
					$tableau = array('date_achat' => date("Y-m-d H:i:s"), 'prix_total' => $value['prix'], 'id_utilisateur' => $_SESSION['id_client'], 'id_objet' => $value['id_objet'], 'id_facture' => $uneFacture->getId_facture());

					$unAchat = new Acheter();
					$unAchat->serialiser($tableau);
					$unAchat->effectuerAchat();
				}
			}
			unset($_SESSION['panier']);
			$middleHTML = 'message_commande.tpl';
		} 
		else
			$middleHTML = 'message_commande.tpl';
	}
	else {
		$smarty->assign('liste', $unPanier->recupPanier($unRQ));
		$smarty->assign('montant', $unPanier->getMontant());

		$middleHTML = 'panier.tpl';
	}
?>