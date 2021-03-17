<?php
/*$servername = "ReplaceThis";
$username = "ReplaceThis";
$password = "ReplaceThis";
$dbname = "ReplaceThis";
$database = new mysqli($servername, $username, $password, $dbname);*/

$currentuserid = $_GET["_idProfile"];
$configpath = "bmAudio/" .= $currentuserid .= ".txt";

if (file_exists($configpath)) {
    $configstream = fopen ($configpath, "r");
    $mp3path = fread($configstream, filesize($configpath));
    fclose($configstream);
} else {
    $configstream = fopen ($configpath, "w");
    fwrite($configstream, "");
    $mp3path = "";
    fclose($configstream);
}


/*$database->close();*/

echo '<module class="PageModule bmAudio"><div class="Content"><audio width="100%" controls><source src="$mp3path" type="audio/mpeg"></audio></div></module>'
?>
