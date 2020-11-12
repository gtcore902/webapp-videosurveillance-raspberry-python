<?php
// get last recording
$path = '/var/www/html/videos';
$dossier2 = chdir($path); // change work directory
$dossier3 = getcwd(); // string work directory
$fichiers = count($dossier3);

$doss = scandir($dossier3);
$doss1 = sort($doss, SORT_NATURAL);
$doss1 = array_reverse($doss); // check

// get last recording time
$tps_ref = time();
$tps_fic = filemtime($doss1[0]);
$resultat = ($tps_fic-$tps_ref)/60;
$resultat = round($resultat, 2);

if ($resultat <= -60) {
  $resultat = $resultat/60;
  $resultat = round($resultat, 2);
  $resultat = $resultat-$resultat-$resultat; // to get positive number
  echo $resultat; // Heure
}

elseif ($resultat > -60) {
  $resultat = $resultat-$resultat-$resultat;
  echo $resultat; // Minutes
}

?>
