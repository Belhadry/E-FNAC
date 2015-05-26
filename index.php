<?php
	// On enregistre nos autoloads. Cela permet d'inclures directement toutes les classes présentes dans le dossier Classes, ainsi que des classes appartenant au plugin smarty   (dossier 'smarty/sysplugins/')
	function defaultAutoloader($className) {
		$file = 'classes/'.$className.'.class.php';
		if (file_exists($file)) {
			require $file;
			return true;
		}
		return false;
	}
	function smartyAutoloader($className) {
		$file = 'smarty/sysplugins/'.$className.'.php';
		if (file_exists($file)) {
			require $file;
			return true;
		}
		return false;
	}
	spl_autoload_register('defaultAutoloader');//enregistre une fonction dans la pile __autoload() fournie. Si la pile n'est pas encore active, elle est activée.
	spl_autoload_register('smartyAutoloader');
	session_start();    //  Démarre une nouvelle session ou reprend une session existante
    include("controllers/c_main.php");
?>