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
function supprimer (evt,id_produit){
    evt.stopPropagation();
    location = `indispo.php?id_produit=${id_produit}`;
    
    fetch(` supprimer.php`)
              .then(response => response.json())
              .then((json) => {
                  console.log('json');
          });
    
}