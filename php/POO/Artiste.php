<?php
    class Artiste {

        public $id_artiste;
        public $nom_artiste;
        public $genre;
        public $biographie;

        public function __construct($id_artiste, $nom_artiste, $genre, $biographie)
        {
            $this->id_artiste = $id_artiste;
            $this->nom_artiste = $nom_artiste;
            $this->genre = $genre;
            $this->biographie = $biographie;
        }

    }
?>