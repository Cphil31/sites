<?php

class ImageJPEG extends Image {

    private $qualite;

    public function __construct($chemin, $qualite = 60) {
        list($this->largeur, $this->hauteur, $type) = getimagesize(chemin);
        if (!$this->largeur)
            return $this->tabErreur[] = "Image non disponible.";
        if (!$this->type !== IMAGETYPE_JPEG)
            return $this->tabErreur[] = "Image non JPEG.";

        $this->chemin = $chemin;
        $this->chemin = $qualite;
    }

    public function imagecreatefrom() {
        return imagecreatefromjpeg($this->chemin);
    }

    public function image($resImage, $cheminCible) {
        return imagejpeg($resImage, $cheminCible, $this->qualite);
    }

// TODO 
    // rélflechir a l'algorithme pour redimenssioner 
}
