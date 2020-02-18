<?php

			// RECUPERER LA TAILLE DU DOSSIER
			$path = '/var/www/html/videos';
			$dossier2 = chdir($path); // CHANGEMENT DE DOSSIER COURANT
			$dossier3 = getcwd(); // OBTENIR LE STRING DU DOSSIER COURANT
			$fichiers = count($dossier3);

//

	$f = '/var/www/html/videos';
	$io = popen ( '/usr/bin/du -sk ' . $f, 'r' );
	$size = fgets ( $io, 4096);
	$size = substr ( $size, 0, strpos ( $size, "\t" ) );
	$size = $size/1000000;
	$size = round($size, 2);
	pclose ( $io );
	//echo '<div class="nb_videos"><p><span class="variable" id="tailleGo"><b>'.$size. '</b></span> Go.</p></div';

	$doss = scandir($dossier3);
	$doss1 = sort($doss, SORT_NATURAL);
	$doss1 = array_reverse($doss); // A CONTROLER


	foreach ($doss1 as $elem) {
		echo "<div class=\"liens\">";
		//echo "<video controls preload=\"auto\"><source type=\"video/mp4\" src=\"videos/".$elem."\">".$elem."</video>";
		//echo "<br />";
		echo date("d F Y (H:i:s)", filemtime($elem)). " :<br /> ";
		echo "<a class=\"liensDesVideos\" href=\"videos/".$elem."\">".$elem."</a>";
		$elem1 = filesize($elem)/1000000; // ON RECUPERE LE TAILLE DU FICHIER EN BYTES ET ON DIVISE PAR 1000000 POUR MO
		echo "<b>".round($elem1, 2). " Mo</b>"; // ON ARRONDIT A DEUX DECIMALES
		echo "</div>";
	}

?>
