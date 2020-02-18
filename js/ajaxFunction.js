function getAjax(url, temps, divSortie) {
    let requeteFichiers = new XMLHttpRequest(); // Initialisation AJAX
    let retour;

    function calculNbFichiers() {
       requeteFichiers.onreadystatechange = function functionName() {
           retour = requeteFichiers.responseText;
           //console.log("Statut de la requête : " + requeteFichiers.status + ", Code statut : " + requeteFichiers.readyState);
           if (requeteFichiers.readyState == 4) { // Données reçues
               //console.log(retour);
               document.getElementById(divSortie).textContent = requeteFichiers.responseText.toString();
           }
       }
         requeteFichiers.open("GET", url, true);
         requeteFichiers.send();
      }

      calculNbFichiers();
      let timer = setInterval(calculNbFichiers, temps); // Timer

}
