<?php
	//Instanciation d'un objet de la class Memory (Model)
	$unRQ = new Memory();
	if(!isset($_SESSION['id_client']) && !isset($_GET['etape'])) // Si la session client n'est pas déclarée et si il n'y a pas non plus de variable 'etape' passée dans l'url:
	{
		if (isset($_SESSION['objet_client']))
			unset($_SESSION['objet_client']);
		$middleHTML = 'client.tpl';	//afficher le template de la page de connexion / inscription
	}
	elseif (isset($_GET['etape']) && $_GET['etape'] == 'inscription')	// Si la variable 'etape'[GET] est saisie et qu'elle vaut 'inscription' :
	{
		//Création d'un objet de la classe client
		$unClient = (isset($_POST['email'])) ? new Client() : $_SESSION['objet_client'];
		//Appelle de la méthode de vérification de l'email
		$unClient->verifEmail($unRQ);
		//Création du session qui vaut notre objet (Classe client)
		$_SESSION['objet_client'] = $unClient;
		// On assigne la valeur que return getEmail de l'objet dans une variable smarty  nommée email.
		$smarty->assign('email', $unClient->getEmail());
		//afficher le template du formulaire d'inscription
		$middleHTML = 'inscription.tpl';
	}
	elseif (isset($_GET['etape']) && $_GET['etape'] == 'enregistrement')// Si la variable 'etape'[GET] est saisie et qu'elle vaut 'enregistrement' :
	{
		//Vérification de la concordance des deux mots de passe
		if (!verifMotDePasse($_POST['mot_de_passe'], $_POST['mot_de_passe2'])) {
			$_SESSION['SHOW_MESSAGE'] = array('message' => 'Les mots de passes ne sont pas identiques.', 'type' => 'alert');
			header('Location: index.php?tab=mon_compte&etape=inscription');
		} else {
			//Création de d'un objet de la classe client
			$unClient = new Client();
			$tbl = $_POST;
			$tbl['dateinscription'] = 'NOW()';
			$tbl['nb_verif'] = rand(100000, 999999);
			$tbl['etat_verif'] = 1;
			$tbl['email'] = $_SESSION['objet_client']->getEmail();

			$unClient->serialise($tbl);

			//Création d'un objet de la classe Adresse
			$uneAdresse = new Adresse();
			//Appel de la méthode renseigner() de l'objet uneAdresse, elle récupère les champs envoyé du formulaire précédent
			$uneAdresse->renseigner($_POST['adresse'], $_POST['code_postal'], $_POST['ville'],$_POST['pays']);
			//Appel de la méthode inscrireClient() de l'objet unClient, on lui passe en paramètre un objet [Classe=Connectpdo] et un objet [Classe=Adresse], elle se charge de récupérer différents champs et de les insérer dans la table adresse et utilisateur
			if (!isset($_SESSION['inscrit']))
				$unClient->inscrireClient($uneAdresse);
			//si unClient->civilite vaut 1 $civ = Madame sinon = Monsieur
			$civ = ($unClient->getCivilite() == 1) ? 'Madame' : 'Monsieur';
			//assignation des getters
			$smarty->assign('civilite', $civ);
			$smarty->assign('leclient', $unClient->unserialise());
			$smarty->assign('designation', $uneAdresse->getDesignation());
			$smarty->assign('code_postal', $uneAdresse->getCode_postal());
			$smarty->assign('ville', $uneAdresse->getVille());
			$smarty->assign('pays', $uneAdresse->getPays());
			//afficher le template du tableau qui redonne les informations entrées à l'utilisa$middleHTML = 'fin_inscription.tpl';teur
			$middleHTML = 'fin_inscription.tpl';
		}	
	}
	elseif (isset($_GET['etape']) && $_GET['etape'] == 'connexion') // Si la variable 'etape'[_GET] est saisie et qu'elle vaut 'connexion' :
	{
		//On vérifie que l'adresse e-mail est au bon format
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false) {
			//Création de d'un objet de la classe client
			$unClient = new Client();
			//Création d'un objet de la classe Adresse
			$uneAdresse = new Adresse();
			//Appel de la méthode seConnecter() qui récupère les champs dans la table utilisateur et adresse
			$unClient->seConnecter($unRQ, $uneAdresse);
		} else {
			$_SESSION['SHOW_MESSAGE'] = array('message' => 'L\'adresse e-mail utilisée n\'est pas au bont format', 'type' => 'alert');
			header('Location: index.php?tab=mon_compte');
		}	
	}
	//Déconnexion de l'utilisateur
	elseif (isset($_GET['etape']) && $_GET['etape'] == 'deconnexion') {
		$_SESSION = array();
		session_destroy();
		session_start();
		$_SESSION['SHOW_MESSAGE'] = array('message' => 'Vous avez été correctement déconnecté', 'type' => 'confirmation');
		//Redirection vers la premiere page du site
		header('Location: index.php');
	}
	elseif (isset($_GET['etape']) && $_GET['etape'] == 'auth') {
		$middleHTML = 'client.tpl';
	}
	else {
		if (isset($_GET['onglet'])) {
			switch ($_GET['onglet']) {
				case 'infos_personnelles':
					if (isset($_POST['nom'])) {
						$_SESSION['objet_client']->serialise($_POST);
						$unRQ->update('utilisateur', $_SESSION['objet_client']->unserialise(), array('id_utilisateur' => $_SESSION['objet_client']->getId_utilisateur()));
					}
					break;

				case 'historique_des_commandes':
					$unHistorique = new Historique();
					$mesfactures = $unHistorique->recupFacturesClient($_SESSION['id_client']);
					$table_factures = array();
					foreach ($mesfactures as $key => $value)
						$table_factures[] = $unHistorique->recupHistoClient($_SESSION['id_client'], $value['id_facture']);
					$smarty->assign('mesfactures', $mesfactures);
					$smarty->assign('table_factures', $table_factures);
					break;

				case 'mes_objets_achetes':
					$unAchat = new Acheter();
					$liste_obj = $unAchat->recupObjetsAchetes($_SESSION['id_client']);
					$smarty->assign('obj_achetes', $liste_obj);
					break;

				case 'mes_objets_loues':
					$uneLocation = new Louer();
					$liste_obj = $uneLocation->recupObjetsLoues($_SESSION['id_client']);
					echo "<META HTTP-EQUIV='Refresh' CONTENT='60; URL=index.php?tab=mon_compte&onglet=mes_objets_loues' />";
					$smarty->assign('obj_loues', $liste_obj);
					break;

				case 'objet':
					//Instanciation d'un objet de la classe Objet
					$unObjet = new Objet();
					$unObjet->setId_objet($_GET['id']);
					$categorie = $unObjet->trouverCategorieObjet();

					switch ($categorie['id_categorie']) {
						//Si la catégorie de l'objet est "musique"
						case 3:
							//Instanciation d'un objet de la classe Musique
							$uneMusique = new Musique();
							$musique = utf8_array($uneMusique->recupMusique($_GET['id']));
							$smarty->assign('fichier_musique', $musique);
							break;

						//Si la catégorie de l'objet est "film"
						case 2:
							//Instanciation d'un objet de la classe Film
							$unFilm = new Film();
							$film = utf8_array($unFilm->recupFilm($_GET['id']));
							$smarty->assign('fichier_film', $film);
							break;

						//Si la catégorie de l'objet est "livre"
						case 1:
							//Instanciation d'un objet de la classe Livre
							$unLivre = new Livre();
							$livre = utf8_array($unLivre->recupLivre($_GET['id']));
							$smarty->assign('fichier_livre', $livre);
							break;
					}
					break;

				default :
					header('Location: index.php?tab=mon_compte&onglet=infos_personnelles');
					break;
			}
		}
		else
			header('Location: index.php?tab=mon_compte&onglet=infos_personnelles');
		$smarty->assign('salutation', Saluer(Shortciv($_SESSION['objet_client']->getCivilite()), $_SESSION['objet_client']->getNom()));
		$smarty->assign('tableauclient', $_SESSION['objet_client']->attributsToSmarty());
		$smarty->assign('tableauadresse', $_SESSION['adresse_client']->attributsToSmarty());
		$middleHTML = 'mon_compte.tpl';
	}
?>