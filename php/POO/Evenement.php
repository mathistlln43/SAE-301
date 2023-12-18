<?php
    class Evenement{

        public $id_evenement;
        public $nom_evenement;
        public $date_evenement;
        public $lieu;
        public $heure;

        public function __construct($id_evenement, $nom_evenement, $date_evenement, $lieu, $heure)
        {
            $this->id_evenement = $id_evenement;
            $this->nom_evenement = $nom_evenement;
            $this->date_evenement = $date_evenement;
            $this->lieu = $lieu;
            $this->heure = $heure;
        }

    }
?>