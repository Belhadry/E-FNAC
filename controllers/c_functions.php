<?php
/**
 * Permet de supprimer les accents d'une chaine
 * @param string $tab Chaine
 * */
function formatTab($tab) {
	$tab = mb_strtolower($tab);
	$initial = array("é", "è", "à", "ê", "ë", " ", "É", "Ê", "È", "Ë", "À","&");
	$remplacer = array("e", "e", "a", "e", "e", "_", "e", "e", "e", "e", "a","e");
	$tab = str_replace($initial, $remplacer, $tab);

	return $tab;
}
/**
 * Permet de supprimer les accents d'une chaine
 * @param string $string Chaine
 * */
function smarty_modifier_formatTab($string) {
	$string = mb_strtolower($string);
	$initial = array("é", "è", "à", "ê", "ë", " ", "É", "Ê", "È", "Ë", "À","&");
	$remplacer = array("e", "e", "a", "e", "e", "_", "e", "e", "e", "e", "a","e");
	$string = str_replace($initial, $remplacer, $string);

	return $string;
}
/**
 * Permet de remplacer une valeur réélle par l'affichage d'un prix en remplacant le point par une virgule et en y ajoutant le symbole € à la fin de la chaine
 * @param string $string Chaine
 * */
function smarty_modifier_formaterPrix($string) {
	$initial = array(".");
	$remplacer = array(",");
	$string = str_replace($initial, $remplacer, $string);

	return $string.' €';
}
/**
 * Permet de remplacer une valeur réélle par l'affichage d'un prix en remplacant le point par une virgule et en y ajoutant le symbole € à la fin de la chaine
 * @param string $string Chaine
 * */
function formaterPrix($string) {
	$initial = array(".");
	$remplacer = array(",");
	$string = str_replace($initial, $remplacer, $string);

	return $string.' €';
}
/**
 * Coupe une chaine en y laissant les 15 premiers caractères en y ajoutant '..'
 * @param string $string Chaine
 * */
function smarty_modifier_couper_partie($string) {
	$string = (strlen($string) > 15) ? substr($string, 0, 15).".." : $string;
	return $string;
}
/**
 * Coupe une chaine en y laissant les 10 premiers caractères en y ajoutant '..'
 * @param string $string Chaine
 * */
function smarty_modifier_couper_part($string) {
	$string = (strlen($string) > 10) ? substr($string, 0, 10).".." : $string;
	return $string;
}
/**
 * Coupe une chaine en y laissant les 230 premiers caractères en y ajoutant ' [...]'
 * @param string $string Chaine
 * */
function smarty_modifier_couper_rech($string) {
	$string = substr($string, 0, 230)." [...]";
	return $string;
}
    function Shortciv($civilite)	//	Abréger la civilité exemple Monsieur => M.
    {
    	return ($civilite == 1) ? 'Mme' : 'M.';
    }
	function Saluer($civilite, $nom)	//	On dit Bonjour, puis civilité abrégée puis nom de famille ex : Bonjour M. Duval
	{
		$formule = ((date("H"))>=18) ? 'Bonsoir' : 'Bonjour';
		return $formule.' '.$civilite.' '.$nom;
	}
/**
 * Permet d'encoder en UTF8 les valeurs d'un tableau passÃ© en paramÃ¨tre
 * @param array $array Tableau a encoder
 * */
function utf8_array($array) {
    foreach($array as $c=>$v) {
        if(is_array($array[$c]))
            foreach($array[$c] as $c2=>$v2)
               	$array[$c][$c2] = (is_array($array[$c][$c2])) ? array_map("utf8_encode", $array[$c][$c2]) : utf8_encode($array[$c][$c2]);
        else
            $array[$c] = utf8_encode($array[$c]);
    }
    return $array;
}
/**
 * Permet de dÃ©sencoder en UTF8 les valeurs d'un tableau passÃ© en paramÃ¨tre
 * @param array $array Tableau a dÃ©sencoder
 * */
function utf8_desarray($array) {
    foreach($array as $c=>$v) {
        if(is_array($array[$c]))
            foreach($array[$c] as $c2=>$v2)
               	$array[$c][$c2] = (is_array($array[$c][$c2])) ? array_map("utf8_decode", $array[$c][$c2]) : utf8_decode($array[$c][$c2]);
        else
            $array[$c] = utf8_decode($array[$c]);
    }
    return $array;
}
/**
 * Retourne l'heure courante
 * */
function returnHeure() { return date('H:i:s'); }
/**
 * Retourne l'heure courante
 * */
function smarty_modifier_returnHeure() { return date('H:i:s'); }
/**
 * Permet de formater une date courante au format 'Lundi 01 Janvier 2015'
 * @param string $mois Mois
 * */
function formaterDate() {
	switch (date("D")) {
		case 'Mon': $jour = 'Lundi'; break;
		case 'Tue': $jour = 'Mardi'; break;
		case 'Wed': $jour = 'Mercredi'; break;
		case 'Thu': $jour = 'Jeudi'; break;
		case 'Fri': $jour = 'Vendredi'; break;
		case 'Sat': $jour = 'Samedi'; break;
		case 'Sun': $jour = 'Dimanche'; break;
		default: /* code...*/ break;
	}
	$tableau = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	$mois = $tableau[intval(date('m'))-1];
	return $jour.' '.date('d').' '.$mois.' '.date('Y');
}
/**
 * Permet d'imprimer une chaine de caractÃ¨re grÃ¢ce Ã  du code html, avec un style personnalisÃ© (utilisÃ© ici pour afficher une requÃªte SQL)
 * @param string $think Requête
 * */
function mysql_write($think) {
	echo '<center><div style="background: #cde1f9;font-weight:bold;border:2px solid #2070c2;color:#125897;display: inline-block;padding: 12px 20px;margin: 10px 0 0;">'.$think.'</div></center>';
}
/**
 * Permet de vérifier si les caractère d'une chaine sont présents dans une autre chaine donnée
 * @param string $string Chaine
 * @param string $characterList Liste de caractères
 * */
function isExistsCharactere($string, $characterList) {
	for ($i=0; $i < strlen($string); $i++)
		for ($j=0; $j < strlen($characterList); $j++)
			if ($string[$i] == $characterList[$j])
				return true;
			return false;
}
//Fonction qui vérifie la concordance des deux mots de passe
function verifMotDePasse($mdp1, $mdp2) {
	return ($mdp1 == $mdp2) ? true : false;
}
/**
 * Permet de formater une date au format DATETIME (2015-05-10 00:00:00) vers un format 10 Juin 2015, 00:00
 * @param string $date Date au '0000-00-00 00:00'
 * */
function FD_JJMMAAHHMMSS($date)
{
	$date = explode(' ', $date);
	$ladate = explode('-', $date[0]);
	$lheure = explode(':', $date[1]);
	$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	return intval($ladate[2]).' '.$mois[intval($ladate[1]-1)].' '.$ladate[0].', '.$lheure[0].':'.$lheure[1];
}
/**
 * Permet de récupérer un message d'erreur, s'il existe
 * */
function getMessage() {
	if (isset($_SESSION['SHOW_MESSAGE'])) {
		$show = new Gestion_message();
		$show->serialise($_SESSION['SHOW_MESSAGE']);
		$show->afficher();
		unset($_SESSION['SHOW_MESSAGE']);
	}
}
?>