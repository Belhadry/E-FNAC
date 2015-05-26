<?php
	class Gestion_message {
		//Attributs privés
		private $message, $type;

		//Constructeur
		public function __construct() {
			$this->message = '';
			$this->type = '';
		}

		//Méthodes

		public function afficher() {
			switch ($this->type) {
				case 'information':
					echo '<div id="warning_msg" style="background-color: yellow;">'.$this->message.'</div>';
					break;
				case 'alert':
					echo '<div id="warning_msg" style="background-color: red;">'.$this->message.'</div>';
					break;
				case 'confirmation':
					echo '<div id="warning_msg" style="background-color: #00ff00;">'.$this->message.'</div>';
					break;
				default:
					echo '<div id="warning_msg" style="background-color: blue;">'.$this->message.'</div>';
					break;
			}
		}

		//Méthode pour sérialiser
		public function serialise($tab) {
			$tableau = array('message', 'type');
			foreach ($tableau as $key => $value)
				if (isset($tab[$value]))
					$this->$value = $tab[$value];
		}

		//Méthode pour désérialiser
		public function unserialise() {
			$tableau = array('message', 'type');
			foreach ($tableau as $key => $value)
				$table[$value] = $this->$value;
			return $table;
		}
	}
?>