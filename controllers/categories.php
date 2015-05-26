<?php
	//Instanciation d'un objet de la class Requetage (Model)
	$BDD = new Memory();
	//On parcours le tableau répertoriant les différentes catégories présentes dans la base de données.
	foreach (Categorie::lister() as $res) {
		//Si le _GET['tab'] vaut la catégorie sur laquelle on est en parcourant le tableau $result
		if ($_GET['tab'] == $equivalence[$res['designation']]) {
			// $resultats est un tableau qui vaut les résultats de la sélection des sous-catégories où l'id_categorie des sous-catégorie vaut l'id_categorie de la catégorie sur laquelle on est (dans la boucle)
			$resultats = utf8_array($BDD->selectAll('sous_categorie', '*', array('id_categorie' => $res['id_categorie'])));
			//On parcours le tableau $resultats (sous catégorie correspondant à la catégorie voulu)
			for ($i=0; $i < count($resultats); $i++) { 
				//Instanciation d'un objet sous_categorie dans le tableau lesSousCategories
				$subcateg = new Sous_categorie();
				$subcateg->serialise($resultats[$i]);
				//Ajout de la sous catégorie courante à la liste lesSousCategories
				$lesSousCategories[] = $subcateg;
				$categ_fm[$i] = formatTab($lesSousCategories[$i]->getDesignation());
				$categ_id[$i] = $lesSousCategories[$i]->getId_sous_categorie();
				//Ajout de la sous catégorie au tableau
				$categ[] = $subcateg->unserialise();
			}
			//Définition de la catégorie affichée par défaut (si l'utilisateur n'a pas déjà sélectionné une sous-catégorie)
			if(!isset($_GET['categ']) || $_GET['categ'] == null)
				$_GET['categ'] = formatTab(utf8_array($BDD->select('sous_categorie', 'designation', array('id_categorie' => $res['id_categorie'], 'par_defaut' => 1)))[0]);
			//Récupère l'id de la sous catégorie sur laquelle on est
			$id_souscateg = $categ_id[array_search($_GET['categ'], $categ_fm)];
			//Récupérations des objets appartenants à la sous-catégorie sur laquelle on est
			$result_objet = utf8_desarray($BDD->selectAll('objet', '*', array('id_sous_categorie' => $id_souscateg)));
			//Initialisations de deux tableau $liste_objets, $objets
			$liste_objets = $objets = [];
			//Récupération des objets de la base de données dans une liste d'objets
			foreach ($result_objet as $key => $value) {
				$unObjet = new Objet(); /* Instanciation d'un objet de la classe objet */
				$unObjet->serialise($value); /* Sérialiser l'objet  */
				//Ajout de l'objet courant à la liste d'objets
				$liste_objets[] = $unObjet;/* Instanciation d'un objet de la classe objet */
				$objets[] = utf8_array($unObjet->unserialise()); /*Ajout de l'objet courant à la liste d'objets sous forme de tableau*/
			}
			$requete_lobjet = null;
			//Si est défini le _GET['id']
			if(isset($_GET['id'])){
				//On met en objet sélectionné l'objet dont l'id est sélectionné
				$requete_lobjet = utf8_array($BDD->select('objet', '*', array('id_objet' => $_GET['id'])));
				$requete_lobjet['categorie'] = $res['designation'];
			}
			//Si il n'y a pas d'article dans la sous catégorie
			elseif($result_objet == null)
				$_GET['id'] = null;
			//Si n'est pas défini le _GET['id']
			elseif(!isset($_GET['id'])){
				$requete_lobjet = utf8_array($BDD->select('objet', '*', array('id_sous_categorie' => $id_souscateg)));	
				$_GET['id'] = $requete_lobjet['id_objet'];
				$requete_lobjet['categorie'] = $equivalence[$res['designation']];
			}
			//appel de la procédure stockée permettant de récupérer les deux derniers produits de la catégorie
			$requete_new = utf8_array($BDD->selectAllLibre('CALL selectNews('.$res['id_categorie'].')'));
			////////////// BARRE RECHERCHE ////////////////
			if (isset($_POST['research'])) {
				$res_rech = $count = 0;
				if (!empty($_POST['research']) && isExistsCharactere($_POST['research'], 'AZERTYUIOPQSDFGHJKLWXCVBNMazertyuiopqsdfghjklmwxcvbn01234567890123456789')) {
					$res_rech = utf8_array($BDD->selectAllLibre("SELECT * FROM objet WHERE designation LIKE '%".$_POST['research']."%' ORDER BY designation"));
					//On compte le nombre de résultats
					$count = count($res_rech);
			    	$pl = ($count <= 1) ? '' : 's';
				}
		    	$smarty->assign('total', $count);
	    		$smarty->assign('pl', $pl);
				$smarty->assign('rech', $res_rech);
			}
			//Assignations de nos variables pour smarty
			$smarty->assign('lobjet', $requete_lobjet);
			$smarty->assign('objets', utf8_array($objets));
			$smarty->assign('categ', $categ);
			$smarty->assign('news', $requete_new);
			//Définition de la vue à inclure
			$middleHTML = 'categories.tpl';
		}
	}
?>