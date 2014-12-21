<?php

// get contents of a file into a string
$filename = "../test/curl.example";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);

$muster = Array (

    "Header" => "/(?<=-H\s)'[^']*'/",
    "Data" => "/(?<=--data\s)'.*\&/"
);

foreach($muster as $curmuster){
    $x = preg_match_all($curmuster, $contents, $matches);
}



echo $x;