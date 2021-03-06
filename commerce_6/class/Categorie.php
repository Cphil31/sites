<?php

class Categorie {

	public $id_categorie;
	public $nom;

	public function __construct($id_categorie = null, $nom = null) {
		$this->id_categorie = $id_categorie;
		$this->nom = $nom;
	}

	public function getTabProduit() {
		global $pdo;
		$req = "SELECT * FROM produit WHERE id_categorie={$this->id_categorie} ORDER BY nom";
		$jeu = $pdo->query($req);
		$jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Produit::class);
		return $jeu->fetchAll();
	}

	public static function tous() {
		global $pdo;
		$req = "SELECT * FROM categorie ORDER BY nom";
		$jeu = $pdo->query($req);
		$jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, self::class);
		return $jeu->fetchAll();
	}

}
