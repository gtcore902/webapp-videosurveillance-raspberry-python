<?php
// RECUPERER LA TAILLE DU DOSSIER
$path = '/var/www/html/videos';
$dossier2 = chdir($path); // CHANGEMENT DE DOSSIER COURANT
$dossier3 = getcwd(); // OBTENIR LE STRING DU DOSSIER COURANT
$fichiers = count($dossier3);

$doss = scandir($dossier3);
$doss1 = sort($doss, SORT_NATURAL);
$doss1 = array_reverse($doss); // A CONTROLER

// AJOUT POUR RECUPERER TPS DERNIER FICHIER ENREGISTRE
$tps_ref = time();
$tps_fic = filemtime($doss1[0]);
$resultat = ($tps_fic-$tps_ref)/60;
$resultat = round($resultat, 2);

if ($resultat <= -60) {
  $resultat = $resultat/60;
  $resultat = round($resultat, 2);
  $resultat = $resultat-$resultat-$resultat; //POUR BASCULER LES RESULTATS EN POSITIFS
  echo $resultat; // Heure
}

elseif ($resultat > -60) {
  $resultat = $resultat-$resultat-$resultat; //POUR BASCULER LES RESULTATS EN POSITIFS
  echo $resultat; // Minutes
}

?>
