<?php
	class Client
	{	
		// Initialisation des attributs de la classe Client
		private $id_utilisateur, $nom, $prenom, $civilite, $email, $mot_de_passe, $dateinscription, $telfixe, $telmobile, $nb_verif, $etat_verif, $id_adresse;
		//Création du constructeur de la classe
		public function __construct()
		{
			$this->id_utilisateur = $this->nb_verif = $this->etat_verif = $this->id_adresse = $this->civilite = '';
			$this->nom = $this->prenom = $this->email = $this->mot_de_passe = $this->dateinscription = $this->telfixe = $this->telmobile = "";
		}

		// Méthode qui vérifie le format valide d'une adresse email
		public function verifEmailValide($email)
		{
			return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
		}

		//Méthode servant à vérifier si l'addresse e-mail existe déjà dans la base de données à l'inscription.
		public function verifEmail($BDD)
		{
			//La variable adr_email 
			$adr_email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : $this->email;

			// Si l'email est valide
			if ($this->verifEmailValide($adr_email)) {
				$emailINbdd = $BDD->select('utilisateur', 'email', array('email' => $adr_email));

				//Si l'adresse email a déjà été utilisée
				if($emailINbdd != null) {
					$_SESSION['SHOW_MESSAGE'] = array('message' => 'Cette adresse e-mail à déjà été utilisée.', 'type' => 'alert');
					//Redirection vers index.php?tab=mon_compte
					header('Location: index.php?tab=mon_compte&etape=auth');
				}
				//Si l'adresse email n'a pas déjà été utilisée
				else {
					//L'attribut email de l'objet vaut la variable adr_mail
					$this->email = $adr_email;
					$_SESSION['objet_client'] = $this;
				}
			}
			// Si l'email n'est pas valide
			else {
				//Redirection vers index.php?tab=mon_compte
				header('Location: index.php?tab=mon_compte');
				$_SESSION['SHOW_MESSAGE'] = array('message' => 'Le format de l\'adresse e-mail n\'est pas valide.', 'type' => 'alert');
			}
		}

		// Méthode qui vérifie si le mot de passe contient bien les caractères nécessaires au mot de passe
		public function mdpCorrecte($mdp)
		{
			$cpt = $cpt2 = 0;
			$chiffres = '0123456789';
			$lettres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			//long_verif vaut un si le mdp est compris entre 6 et 20 caractères
			$long_verif = (strlen($mdp) >= 6 && strlen($mdp) <= 20) ? 1 : 0;

			for ($i=0; $i < strlen($mdp); $i++)
				for ($j=0; $j < strlen($chiffres); $j++) 
					if($mdp[$i] == $chiffres[$j])
						$cpt++;

			for ($i=0; $i < strlen($mdp); $i++)
				for ($j=0; $j < strlen($lettres); $j++)
					if($mdp[$i] == $lettres[$j])
						$cpt2++;

			return ($long_verif!=0 && $cpt!=0 && $cpt2!=0) ? true : false;
		}

		/*********************************/
		/****       INSCRIPTION       ****/
		/*********************************/
		public function inscrireClient($objet_adr)
		{
			$BDD = new Memory();
			//si $civilite vaut Mme this->civilite = 1 sinon = 0
			$this->civilite = ($this->civilite == 'Mme') ? 1 : 0;

			// Si les mots de passe sont identiques
			if ($this->mdpCorrecte($this->mot_de_passe)) {
				$this->mot_de_passe = sha1($this->mot_de_passe);

				//Insertion des champs de la table adresse
				$BDD->insert('adresse', array('designation' => $objet_adr->getDesignation(), 'code_postal' => $objet_adr->getCode_postal(), 'ville' => $objet_adr->getVille(), 'pays' => $objet_adr->getPays()));

				//Récupere la valeur du dernier ID
				$this->id_adresse = $BDD->dernierID();

				//Insertion des champs de la table utilisateurs
				$BDD->insert('utilisateur', utf8_desarray($this->unserialise()));

				$_SESSION['inscrit'] = true;

				return $this->unserialise();
			}
			else // Si le mot de passe n'est pas correcte
			{
				$_SESSION['SHOW_MESSAGE'] = array('message' => 'Votre mot de passe n\'est pas au format valide, il doit contenir des chiffres et des lettres, et comporter entre 6 et 20 caractères.', 'type' => 'alert');
				//On redirige vers le formulaire d'inscription
				header('Location: index.php?tab=mon_compte&etape=inscription');
			}
		}

		/*********************************/
		/****        CONNEXION        ****/
		/*********************************/
		public function seConnecter($BDD, $objet_adr)
		{
			$email = htmlspecialchars($_POST['email']);
			$mdp = htmlspecialchars($_POST['mot_de_passe']);
			$result = $BDD->select('utilisateur', '*', array('email' => $email, 'mot_de_passe' => sha1($mdp)));
			$result = utf8_array($result);
			if (!$result) {
				$_SESSION['SHOW_MESSAGE'] = array('message' => 'L\'adresse e-mail et le mot de passe ne correspondent pas.', 'type' => 'alert');
				//Redirection vers index.php?tab=mon_compte
				header('Location: index.php?tab=mon_compte');
			}
			else {
				$this->serialise($result);

				$_SESSION['objet_client'] = $this;
				$_SESSION['id_client'] = $this->id_utilisateur;

				$result_adr = utf8_array($BDD->select('adresse', '*', array('id_adresse' => $this->id_adresse)));

				if (!$result_adr) {
					//Redirection vers index.php?tab=mon_compte
					header('Location: index.php?tab=mon_compte');
				}
				else
				{
					$objet_adr->setId_adresse($result_adr['id_adresse']);
					$objet_adr->setDesignation($result_adr['designation']);
					$objet_adr->setCode_postal($result_adr['code_postal']);
					$objet_adr->setVille($result_adr['ville']);
					$objet_adr->setPays($result_adr['pays']);

					$_SESSION['adresse_client'] = $objet_adr;
					header('Location: index.php');
				}
			}
		}

		//Permet de construire un tableau à partir des attributs de la classe
		public function attributsToSmarty()
		{
			$tableau = array();
			array_push($tableau, $this->nom, $this->prenom, $this->civilite, $this->mot_de_passe, $this->telfixe, $this->telmobile, $this->email);

			return $tableau;
		}

		//Méthodes

		//Méthode pour sérialiser
		public function serialise($tab) {
			$tableau = array('id_utilisateur', 'nom', 'prenom', 'civilite', 'email', 'mot_de_passe', 'dateinscription', 'telfixe', 'telmobile', 'nb_verif', 'etat_verif', 'id_adresse');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('id_utilisateur', 'nom', 'prenom', 'civilite', 'email', 'mot_de_passe', 'dateinscription', 'telfixe', 'telmobile', 'nb_verif', 'etat_verif', 'id_adresse');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}
		//Getters
		public function getId_utilisateur() { return $this->id_utilisateur; }
		public function getNom() { return $this->nom; }
		public function getPrenom() { return $this->prenom; }
		public function getCivilite() { return $this->civilite; }
		public function getEmail() { return $this->email; }
		public function getMot_de_passe() { return $this->mot_de_passe; }
		public function getDateinscription() { return $this->dateinscription; }
		public function getTelfixe() { return $this->telfixe; }
		public function getTelmobile() { return $this->telmobile; }
		public function getNb_verif() { return $this->nb_verif; }
		public function getEtat_verif() { return $this->etat_verif; }
		public function getId_adresse() { return $this->id_adresse; }

		//Setters
		public function setId_utilisateur($id_utilisateur) { return $this->id_utilisateur = $id_utilisateur; }
		public function setNom($nom) { return $this->nom = $nom; }
		public function setPrenom($prenom) { return $this->prenom = $prenom; }
		public function setCivilite($civilite) { return $this->civilite = $civilite; }
		public function setEmail($email) { return $this->email = $email; }
		public function setMot_de_passe($mot_de_passe) { return $this->mot_de_passe = $mot_de_passe; }
		public function setDateinscription($dateinscription) { return $this->dateinscription = $dateinscription; }
		public function setTelfixe($telfixe) { return $this->telfixe = $telfixe; }
		public function setTelmobile($telmobile) { return $this->telmobile = $telmobile; }
		public function setNb_verif($nb_verif) { return $this->nb_verif = $nb_verif; }
		public function setEtat_verif($etat_verif) { return $this->etat_verif = $etat_verif; }
		public function setId_adresse($id_adresse) { return $this->id_adresse = $id_adresse; }
	}
?>