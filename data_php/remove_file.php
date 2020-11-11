<?php

$fileToRemove = $_COOKIE['myData'];
chdir('../videos');

$path = getcwd() . '/' . $fileToRemove;

unlink($path);

echo $path . ' has been removed.';
