<?php

// get cookie
$fileToRemove = $_COOKIE['myData'];

// change directory
chdir('../videos');

$path = getcwd() . '/' . $fileToRemove;

unlink($path);

echo $path . ' has been removed.';
