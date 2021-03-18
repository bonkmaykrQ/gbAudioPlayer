<?php
$currentuserid = basename($_GET["_idMember"]);
$configpath = $currentuserid;

if (file_exists($configpath)) {
    $configstream = fopen ($configpath, "r");
    $mp3path = fread($configstream, 9999);
    fclose($configstream);
} else {
    /*$configstream = fopen ($configpath, "w");
    fwrite($configstream, "https://files.gamebanana.com/bitpit/274fdbf7-6096-4c67-9405-4a97fc7311c_82f02.mp3");*/
    $mp3path = "";
    /*fclose($configstream);*/
}
?>

<head>
    <style>
        @font-face {
            font-family:abel;
            src:url(https://files.gamebanana.com/bitpit/abel-regular.ttf);
        }
    </style>
</head>
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/giphy_8_.gif), navy;color:white;background-size:120px;font-family:abel;">
    
<div class="Content bmAudioSettings">
    <h1 style="font-size:32px;text-shadow:0px 1px 0px #009900, 0px 0.5px 0px #009900, 0px 0.25px 0px #009900, 0px 0.75px 0px #009900, 0px 1px 3px black, 0px 1px 3px black;color:#00ff00;">bonkmaykr's Audio Player</h1>
    
    <form method="POST" action="https://gbaudioplayer.000webhostapp.com/bmAudioSubmit.php">
    <input type="text" name="UserID" value="<?php echo $currentuserid;?>" height="0px" width="0px" style="pointer-events:none;opacity:0;">
        <h3>MP3 URL</h3>
        <p>Must be in MP3 format in order to work correctly!</p>
        <input type="text" name="mp3Input" placeholder="Front Line Assembly - Deathmatch.mp3" width="100%" value="<?php echo $mp3path;?>"><br>
        <button type="submit" class="button" value="Submit" style="width:150px;height:50px;font-size:36px;font-family:abel;background:rgba(0,0,200,0.2);backdrop-filter:blur(1px);border-radius:10px;border:1px solid rgb(25, 25, 255);color:white;margin-top:10px;">Submit</button>
    </form>
</div>

</body>
