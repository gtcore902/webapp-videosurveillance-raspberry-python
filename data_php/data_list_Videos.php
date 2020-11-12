<?php

	// get videos list
	$path = '/var/www/html/videos';
	//$path = '../videos';
	$dossier2 = chdir($path); // change work directory
	$dossier3 = getcwd(); // string work directory
	$fichiers = count($dossier3);

	//f = '/var/www/html/videos';
	$f = '../videos';
	$io = popen ( '/usr/bin/du -sk ' . $f, 'r' );
	$size = fgets ( $io, 4096);
	$size = substr ( $size, 0, strpos ( $size, "\t" ) );
	$size = $size/1000000;
	$size = round($size, 2);
	pclose ( $io );
	//echo '<div class="nb_videos"><p><span class="variable" id="tailleGo"><b>'.$size. '</b></span> Go.</p></div';

	$doss = scandir($dossier3);
	$doss1 = sort($doss, SORT_NATURAL);
	$doss1 = array_reverse($doss); // check here


	foreach ($doss1 as $elem) {
		echo "<div class=\"liens\">";
		//echo "<video controls preload=\"auto\"><source type=\"video/mp4\" src=\"videos/".$elem."\">".$elem."</video>";
		//echo "<br />";
		echo date("d F Y (H:i:s)", filemtime($elem)). " :<br /> ";
		echo "<a class=\"liensDesVideos\" href=\"videos/".$elem."\">".$elem."</a>";
		$elem1 = filesize($elem)/1000000; // get size file on bytes -> convert to Mo
		echo "<b>".round($elem1, 2). " Mo</b>"; // round to two decimals
		echo "<img class='remove' src='./img/bin.svg'/>";
		echo "</div>";
	}

?>
