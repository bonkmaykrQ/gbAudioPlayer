<?php
$currentuserid = $_POST["UserID"];
$configpath = "bmAudio/" .= $currentuserid .= ".txt";

$configstream = fopen ($configpath, "r");
$mp3path = $_POST["mp3Input"];
fwrite($configstream, $mp3path);
fclose($configstream);

echo "Applied file $mp3path to user $currentuserid.";
?>
