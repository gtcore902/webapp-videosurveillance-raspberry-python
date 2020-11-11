// AJAX function pour récupérer nombre de fichiers
window.addEventListener('load', function() {
  getAjax("data_php/data_nb_fichiers.php", 5000, 'variable_fichier');
})

// AJAX function pour récupérer la taille du dossier
window.addEventListener('load', function() {
  getAjax("data_php/data_taille_dossier.php", 5000, 'tailleGo');
})

// AJAX function pour récupérer le dernier enregistrements
window.addEventListener('load', function() {
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
          document.getElementById('last_record').firstChild.textContent += ' h';
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
window.addEventListener('load', function() {
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
  $('#actualiserVideos').on('click', function() {
    recupererVideos();
  })
})

// Manage suppression items
let fileToRemove;
let myForm;
let submit;

window.addEventListener('load', () => {

  setTimeout(boucle, 500);

  function boucle() {
    let target = document.querySelectorAll('img.remove');

    for (const element of target) {
      element.addEventListener('click', (e) => {
        //console.log(element);
        //console.log(element.previousSibling.previousSibling.innerHTML);
        e.preventDefault();
        // Test if delete btn exists
        let toRemove = document.querySelector('.fileDelete');
        if (toRemove) {
          //console.log('form exists');
          toRemove.remove();
        } else {
          // CREATE FORM
          myForm = document.createElement('form');
          myForm.className = 'fileDelete';
          myForm.method = 'post';
          myForm.enctype = 'application/x-www-form-urlencoded';
          let myInput = document.createElement('input');
          submit = document.createElement('input');
          submit.type = 'submit';
          //submit.style.backgroundColor = "darkred";
          submit.value = "Supprimer ?"
          myInput.type = 'text';
          myInput.name = 'file';
          myInput.id = 'file';
          myInput.value = element.previousSibling.previousSibling.textContent;
          myForm.appendChild(myInput);
          myForm.appendChild(submit);
          fileToRemove = myInput.value;
          myInput.style.display = 'none';
          let parentNode = element.parentNode;
          //console.log(parentNode);
          parentNode.insertBefore(myForm, element); // Voir ici pour insérer le noeud form après l'élement
          submitForm(myForm);
          document.cookie = "myData=" + fileToRemove;
        }
      })
    }
  }
})

// SEND TO SERVER PHP
function submitForm(form) {
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    console.log(fileToRemove);
    $.post('./data_php/remove_file.php', {
      fileToRemove: fileToRemove // revoir ici ?
    }, function(data, textStatus, xhr) {
      console.log(data);
      // Suppression de l'élément dans la page + son span
      let cible = document.querySelectorAll('img.remove');
      for (const element of cible) {
        //console.log(element.previousSibling.previousSibling.previousSibling.textContent);
        if (element.previousSibling.previousSibling.previousSibling.textContent == fileToRemove) {
          submit.style.backgroundColor = 'green';
          submit.value = 'Supprimé !';
          setTimeout(() => {
            element.parentNode.remove();
          }, 1000);
          document.cookie = "myData=''";
        }
      }
    });
  })
}