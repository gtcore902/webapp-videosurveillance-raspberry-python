<?php

$path = '/var/www/html/videos';
$dossier2 = chdir($path); // change work directory
$dossier3 = getcwd(); // string work directory
$fichiers = count($dossier3);

$nb = scandir($dossier3);
$nb = count($nb)-2; // don't count root files

echo $nb;

?>
