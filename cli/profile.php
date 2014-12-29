<?php

// get contents of a file into a string
$filename = "../test/curl.example";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);

$muster = Array (

    "Url" => "/(?<=curl\s)'[^']*'/",
    "Header" => "/(?<=-H\s)'[^']*'/",
    "Data" => "/(?<=--data\s')[^=]*=[^\&]*/"
);

$prepJson = Array();

foreach($muster as $key => $curmuster){

    $x = preg_match_all($curmuster, $contents, $matches);

    foreach ($matches[0] as $match) {
        $prepJson[$key][] = ($match);
        echo "$key: " . $match . PHP_EOL;
    }
}

$json = json_encode($prepJson);

$handle = fopen("../profiles/test.json", "w");
$success = fwrite  ($handle, $json);
fclose($handle);
echo $x;