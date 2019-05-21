function annuler() {

        fetch(` supprimer.php`)
            .then(response => response.json())
            .then((json) => {
            (json);
            });
        location = 'index.php';
    
}
