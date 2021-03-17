<?php
$currentuserid = $_GET["_idMember"];
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
?>

<div class="Content bmAudioSettings">
    <form method="POST" action="LINK TO bmAudioSubmit.php HERE PLEASE">
    <input type="text" name="UserID" value="<?php echo $currentuserid;?>" hidden="True">
        <h3>MP3 URL</h3>
        <p>Must be in MP3 format in order to work correctly!</p>
        <input type="text" name="mp3Input" placeholder="Front Line Assembly - Deathmatch.mp3" width="100%" value="<?php echo $mp3path;?>"><br>
        <button type="submit" class="button" value="Submit">Submit</button>
    </form>
</div>
