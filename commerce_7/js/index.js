function detail(id_produit) {
	location = `detail.php?id_produit=${id_produit}`;
}

function ajouter(id_categorie) {
	location = `editer.php?id_categorie=${id_categorie}`;
}


function modifier(evt, id_produit) {
    evt.stopPropagation();
    location = `editer.php?id_produit=${id_produit}`;
}
function supprimer(evt, id_produit) {
    evt.stopPropagation();
    location = `supprimer.php?id_produit=${id_produit}`;
}