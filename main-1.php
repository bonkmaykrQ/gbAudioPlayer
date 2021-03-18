<?php
/*$servername = "ReplaceThis";
$username = "ReplaceThis";
$password = "ReplaceThis";
$dbname = "ReplaceThis";
$database = new mysqli($servername, $username, $password, $dbname);*/

$currentuserid = basename($_GET["_idProfile"]);
$configpath = $currentuserid;

if (file_exists($configpath)) {
    $configstream = fopen ($configpath, "r");
    $mp3path = fread($configstream, 9999);
    fclose($configstream);
} else {
    /*$configstream = fopen ($configpath, "w");
    fwrite($configstream, "https://files.gamebanana.com/bitpit/274fdbf7-6096-4c67-9405-4a97fc7311c_82f02.mp3");*/
    $mp3path = "https://files.gamebanana.com/bitpit/274fdbf7-6096-4c67-9405-4a97fc7311c_82f02.mp3";
    /*fclose($configstream);*/
}


/*$database->close();*/
?>

<module class="PageModule bmAudio">
    <div class="Content" style="display:flex;justify-content:center;align-items:center;">
        <audio width="100%" height="100px" style="background:transparent;" controls>
            <source src="<?php echo $mp3path;?>" type="audio/mpeg"/>
        </audio></audio>
    </div>
</module>