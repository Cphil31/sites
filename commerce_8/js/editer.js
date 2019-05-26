function annuler(){

    location = `index.php`;

}



function afficherPhoto(files){

    if(!files || !files.length)

        return;

        let file = files[0];

    if(!file.size)

        return alert("Fichier vide.");

    if(files.size > MAX_FILE_SIZE )

        return alert("Fichier trop lourd.");

    if(TAB_MIME.length && !TAB_MIME.includes(file.type))

         return alert("Type MIME fichier incorrect.");

    

    let vignette = document.querySelector('#vignette');

   let reader = new FileReader();

   reader.onload = () => vignette.style.backgroundImage = `url(${reader.result})`;   

   reader.readAsDataURL(files[0]);

}

