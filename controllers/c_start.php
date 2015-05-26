<?php
$BDD = new Memory();

if (!isset($_GET['tab']))
  $_GET['tab'] = 'film';

/* Tableau répertoriant les onglet du menu principal */
$navigation = array('Livre', 'Film', 'Musique');
//On ajoute le dernier onglet en fonction de la connexion ou non de l'utilisateur
$navigation[3] = (isset($_SESSION['id_client'])) ? 'Espace client ('.$_SESSION['objet_client']->getNom().' '.$_SESSION['objet_client']->getPrenom().')' : 'Mon Compte';

  //Tableau qui donne l'équivalence des noms de categories de la base de données aux noms des ongles
$equivalence = array('livre' => 'livre', 'film' => 'film', 'musique' => 'musique');

  $smarty->assign('menu', $navigation);  // On assigne le tableau $navigation à une variable smarty navigation nommée menu (voir header.tpl).

  $perso = (isset($_SESSION['objet_client'])) ? formatTab('Espace client ('.$_SESSION['objet_client']->getNom().' '.$_SESSION['objet_client']->getPrenom().')') : '';
  

  //Tableau permmettant de récuperer les pages à inclure dans l'index associé aux valeur du $_GET['tab']
  $ValidTab = array(
    'mon_compte' => 'controllers/mon_compte.php',
    'livre' => 'controllers/categories.php',
    'musique' => 'controllers/categories.php',
    'film' => 'controllers/categories.php',
    $perso => 'controllers/mon_compte.php',
    'destroy' => 'controllers/destroy.php',
    'panier' => 'controllers/paniercommande.php');

  //Barre de menu de l'espace client
  $navClient = array('Tableau de bord', 'Infos personnelles', 'Mes objets loués', 'Mes objets achetés', 'Historique des commandes');

  $smarty->assign('perso', $perso);
  $smarty->assign('navClient', $navClient);
  $smarty->assign('ValidTab', $ValidTab); // On assigne le tableau $ValidTab à une variable smarty navigation nommée ValidTab.

  //liste des pays
  $liste_pays = array('Afghanistan' , 'Afrique du Sud' , 'Aland' , 'Albanie' , 'Algérie' , 'Allemagne' , 'Andorre' , 'Angola' , 'Anguilla' , 'Antarctique' , 'Antigua-et-Barbuda' , 'Arabie saoudite' , 'Argentine' , 'Arménie' , 'Aruba' , 'Australie' , 'Autriche' , 'Azerbaïdjan' , 'Bahamas' , 'Bahreïn' , 'Bangladesh' , 'Barbade' , 'Biélorussie' , 'Belgique' , 'Belize' , 'Bénin' , 'Bermudes' , 'Bhoutan' , 'Bolivie' , 'Bonaire' , 'Bosnie-Herzégovine' , 'Botswana' , 'Île Bouvet' , 'Brésil' , 'Brunei' , 'Bulgarie' , 'Burkina Faso' , 'Burundi' , 'Îles Caïmans' , 'Cambodge' , 'Cameroun' , 'Canada' , 'Cap-Vert' , 'République centrafricaine' , 'Chili' , 'Chine' , 'Île Christmas' , 'Chypre' , 'Îles Cocos' , 'Colombie' , 'Comores' , 'République du Congo' , 'République démocratique du Congo' , 'Îles Cook' , 'Corée du Sud' , 'Corée du Nord' , 'Costa Rica' , 'Côte d\'Ivoire' , 'Croatie' , 'Cuba' , 'Curaçao' , 'Danemark' , 'Djibouti' , 'République dominicaine' , 'Dominique' , 'Égypte' , 'Salvador' , 'Émirats arabes unis' , 'Équateur' , 'Érythrée' , 'Espagne' , 'Estonie' , 'États-Unis' , 'Éthiopie' , 'Îles Malouines' , 'Îles Féroé' , 'Fidji' , 'Finlande' , 'France' , 'Gabon' , 'Gambie' , 'Géorgie' , 'Géorgie du Sud-et-les Îles Sandwich du Sud' , 'Ghana' , 'Gibraltar' , 'Grèce' , 'Grenade' , 'Groenland' , 'Guadeloupe' , 'Guam' , 'Guatemala' , 'Guernesey' , 'Guinée' , 'Guinée-Bissau' , 'Guinée équatoriale' , 'Guyana' , 'Guyane' , 'Haïti' , 'Îles Heard-et-MacDonald' , 'Honduras' , 'Hong Kong' , 'Hongrie' , 'Île de Man' , 'Îles mineures éloignées des États-Unis' , 'Îles Vierges britanniques' , 'Îles Vierges des États-Unis' , 'Inde' , 'Indonésie' , 'Iran' , 'Irak' , 'Irlande' , 'Islande' , 'Israël' , 'Italie' , 'Jamaïque' , 'Japon' , 'Jersey' , 'Jordanie' , 'Kazakhstan' , 'Kenya' , 'Kirghizistan' , 'Kiribati' , 'Koweït' , 'Laos' , 'Lesotho' , 'Lettonie' , 'Liban' , 'Liberia' , 'Libye' , 'Liechtenstein' , 'Lituanie' , 'Luxembourg' , 'Macao' , 'Macédoine' , 'Madagascar' , 'Malaisie' , 'Malawi' , 'Maldives' , 'Mali' , 'Malte' , 'Îles Mariannes du Nord' , 'Maroc' , 'Marshall' , 'Martinique' , 'Maurice' , 'Mauritanie' , 'Mayotte' , 'Mexique' , 'Micronésie' , 'Moldavie' , 'Monaco' , 'Mongolie' , 'Monténégro' , 'Montserrat' , 'Mozambique' , 'Birmanie' , 'Namibie' , 'Nauru' , 'Népal' , 'Nicaragua' , 'Niger' , 'Nigeria' , 'Niue' , 'Île Norfolk' , 'Norvège' , 'Nouvelle-Calédonie' , 'Nouvelle-Zélande' , 'Territoire britannique de l\'océan Indien' , 'Oman' , 'Ouganda' , 'Ouzbékistan' , 'Pakistan' , 'Palaos' , 'Autorité Palestinienne' , 'Panama' , 'Papouasie-Nouvelle-Guinée' , 'Paraguay' , 'Pays-Bas' , 'Pérou' , 'Philippines' , 'Îles Pitcairn' , 'Pologne' , 'Polynésie française' , 'Porto Rico' , 'Portugal' , 'Qatar' , 'La Réunion' , 'Roumanie' , 'Royaume-Uni' , 'Russie' , 'Rwanda' , 'Sahara occidental' , 'Saint-Barthélemy' , 'Saint-Christophe-et-Niévès' , 'Saint-Marin' , 'Saint-Martin (Antilles françaises)' , 'Saint-Martin' , 'Saint-Pierre-et-Miquelon' , 'Saint-Siège (État de la Cité du Vatican)' , 'Saint-Vincent-et-les-Grenadines' , 'Sainte-Hélène' , 'Sainte-Lucie' , 'Salomon' , 'Samoa' , 'Samoa américaines' , 'Sao Tomé-et-Principe' , 'Sénégal' , 'Serbie' , 'Seychelles' , 'Sierra Leone' , 'Singapour' , 'Slovaquie' , 'Slovénie' , 'Somalie' , 'Soudan' , 'Soudan du Sud' , 'Sri Lanka' , 'Suède' , 'Suisse' , 'Suriname' , 'Svalbard et Île Jan Mayen' , 'Swaziland' , 'Syrie' , 'Tadjikistan' , 'Taïwan / (République de Chine (Taïwan))' , 'Tanzanie' , 'Tchad' , 'République tchèque' , 'Terres australes et antarctiques françaises' , 'Thaïlande' , 'Timor oriental' , 'Togo' , 'Tokelau' , 'Tonga' , 'Trinité-et-Tobago' , 'Tunisie' , 'Turkménistan' , 'Îles Turques-et-Caïques' , 'Turquie' , 'Tuvalu' , 'Ukraine' , 'Uruguay' , 'Vanuatu' , 'Venezuela' , 'Viêt Nam' , 'Wallis-et-Futuna' , 'Yémen' , 'Zambie' , 'Zimbabwe');
  $smarty->assign('liste_pays', $liste_pays); // On assigne le tableau $liste_pays à une variable smarty navigation nommée liste_pays.
?>