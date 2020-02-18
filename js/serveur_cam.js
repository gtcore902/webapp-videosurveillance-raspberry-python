// AJAX function pour récupérer nombre de fichiers
window.addEventListener('load', function () {
          getAjax("data_php/data_nb_fichiers.php", 5000, 'variable_fichier' );
})

// AJAX function pour récupérer la taille du dossier
window.addEventListener('load', function () {
          getAjax("data_php/data_taille_dossier.php", 5000, 'tailleGo' );
})

// AJAX function pour récupérer le dernier enregistrements
window.addEventListener('load', function () {
          let requeteFichiers = new XMLHttpRequest(); // Initialisation AJAX
          let retour;

          let timer = setInterval(calculLastRecord, 3000); // Timer
          function calculLastRecord() {
             requeteFichiers.onreadystatechange = function functionName() {
                 retour = requeteFichiers.responseText;
                 //console.log("Statut de la requête : " + requeteFichiers.status + ", Code statut : " + requeteFichiers.readyState);
                 if (requeteFichiers.readyState == 4) { // Données reçues
                     document.getElementById('last_record').textContent = requeteFichiers.responseText.toString();
                     if (requeteFichiers.responseText <= -60) {
                          document.getElementById('last_record').firstChild.textContent +=  ' h';
                     } else {
                       document.getElementById('last_record').firstChild.textContent += ' m';
                     }
                 }
             }
               requeteFichiers.open("GET", "data_php/data_last_recording.php", true);
               requeteFichiers.send();
            }
})

// AJAX function pour la liste des vidéos
window.addEventListener('load', function () {
          let requeteFichiers = new XMLHttpRequest(); // Initialisation AJAX
          let retour;

          //let timer = setInterval(recupererVideos, 5000); // Timer
          function recupererVideos() {
             requeteFichiers.onreadystatechange = function functionName() {
                 retour = requeteFichiers.responseText;
                 //console.log("Statut de la requête : " + requeteFichiers.status + ", Code statut : " + requeteFichiers.readyState);
                 if (requeteFichiers.readyState == 4) { // Données reçues
                     document.getElementById('liensSupp').innerHTML = requeteFichiers.responseText.toString();
                 }
             }
               requeteFichiers.open("GET", "data_php/data_list_Videos.php", true);
               requeteFichiers.send();
            }
            recupererVideos();
            $('#actualiserVideos').on('click', function () {
                recupererVideos();
            })
})
