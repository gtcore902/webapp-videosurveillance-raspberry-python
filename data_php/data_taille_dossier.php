<?php

// get size dir
$path = '/var/www/html/videos';
$dossier2 = chdir($path); // change work directory
$dossier3 = getcwd(); // string work directory
$fichiers = count($dossier3);

$f = '/var/www/html/videos';
$io = popen ( '/usr/bin/du -sk ' . $f, 'r' );
$size = fgets ( $io, 4096);
$size = substr ( $size, 0, strpos ( $size, "\t" ) );
$size = $size/1000000;
$size = round($size, 2);
pclose ( $io );
echo $size;

?>
