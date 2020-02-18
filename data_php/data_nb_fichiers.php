<?php

$path = '/var/www/html/videos';
$dossier2 = chdir($path); // CHANGEMENT DE DOSSIER COURANT
$dossier3 = getcwd(); // OBTENIR LE STRING DU DOSSIER COURANT
$fichiers = count($dossier3);

$nb = scandir($dossier3);
$nb = count($nb)-2; //ENLEVE LES DOSSIERS RACINE

echo $nb;

?>
