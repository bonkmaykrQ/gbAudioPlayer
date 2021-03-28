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

if (file_exists($configpath + "_p_saved_loopit")) {
    $configstream = fopen ($configpath, "r");
    $p_saved_loopit = fread($configstream, 9999);
    fclose($configstream);

    if ($p_saved_loopit == "true") {
        $p_saved_loopit = "value=\"true\" checked";
    } else {
        $p_saved_loopit = "value=\"false\"";
    }

} else {
    $p_saved_loopit = "false";
}

if (file_exists($configpath + "_p_saved_IdentityClasses")) {
    $configstream = fopen ($configpath, "r");
    $p_saved_IdentityClasses = fread($configstream, 9999);
    fclose($configstream);

    if ($p_saved_IdentityClasses == "true") {
        $p_saved_IdentityClasses = "value=\"true\" checked";
    } else {
        $p_saved_IdentityClasses = "value=\"false\"";
    }

} else {
    $p_saved_IdentityClasses = "value=\"false\"";
}

if (file_exists($configpath + "_g_saved_IdentityClasses")) {
    $configstream = fopen ($configpath, "r");
    $g_saved_IdentityClasses = fread($configstream, 9999);
    fclose($configstream);

    if ($g_saved_IdentityClasses == "true") {
        $g_saved_IdentityClasses = "value=\"true\" checked";
    } else {
        $g_saved_IdentityClasses = "value=\"false\"";
    }

} else {
    $g_saved_IdentityClasses = "false";
}

if (file_exists($configpath + "_g_autoplaytoggler")) {
    $configstream = fopen ($configpath, "r");
    $g_autoplaytoggler = fread($configstream, 9999);
    fclose($configstream);

    if ($g_autoplaytoggler == "true") {
        $g_autoplaytoggler = "value=\"true\" checked";
    } else {
        $g_autoplaytoggler = "value=\"false\"";
    }

} else {
    $g_autoplaytoggler = "false";
}

if (file_exists($configpath + "_g_mutetoggler")) {
    $configstream = fopen ($configpath, "r");
    $g_mutetoggler = fread($configstream, 9999);
    fclose($configstream);

    if ($g_mutetoggler == "true") {
        $g_mutetoggler = "value=\"true\" checked";
    } else {
        $g_mutetoggler = "value=\"false\"";
    }

} else {
    $g_mutetoggler = "false";
}
?>

<!--
    Please add the new features to the above PHP code as neccessary.
    They will not work without it.

    - bonkmaykr
-->

<head>
    <style>
        @font-face {
            font-family:abel;
            src:url(https://files.gamebanana.com/bitpit/abel-regular.ttf);
        }

        p, h1, h2, h3, h4 {
            min-width: 200px;
            max-width: 800px;
            width: 100%;
            
            font-family:abel;
            color:white;
        }

        input, button {
            min-width: 200px;
            max-width: 800px;
            width: 100%;
            background:rgba(0,0,200,0.2);
            backdrop-filter:blur(1px);
            color:white;
            border-radius:10px;
            border:1px solid rgb(25, 25, 255);
            font-family:abel;
            transition-duration:0.2s;
        }

        input:hover, button:hover {
            min-width: 200px;
            max-width: 800px;
            width: 100%;
            background:rgba(0,0,200,0.8);
            backdrop-filter:blur(3px);
            color:white;
            border-radius:17px;
            border:1px solid rgb(25, 25, 255);
            font-family:abel;
        }

        input:focus, button:active {
            min-width: 200px;
            max-width: 800px;
            width: 100%;
            background:rgba(130,130,200,0.5);
            backdrop-filter:blur(1px);
            color:white;
            border-radius:10px;
            border:3px solid rgb(75, 75, 255);
            font-family:abel;
        }

        input[type="text"] {
            padding:5px 5px 5px 5px;
            height:30px;
        }

        button {
            height:50px;
            font-size:36px;
        }
    </style>
</head>
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/giphy_8_.gif), navy;color:white;background-size:120px;font-family:abel;">
    
<div class="Content bmAudioSettings">
    <h1 style="font-size:32px;text-shadow:0px 1px 0px #009900, 0px 0.5px 0px #009900, 0px 0.25px 0px #009900, 0px 0.75px 0px #009900, 0px 1px 3px black, 0px 1px 3px black;color:#00ff00;">bonkmaykr's Audio Player</h1>
    
    <form method="POST" action="https://gbaudioplayer.000webhostapp.com/gbAudioPlayer/bmAudioSubmit.php">
    <input type="text" name="UserID" value="<?php echo $currentuserid;?>" height="0px" width="0px" style="pointer-events:none;opacity:0;color:transparent;">
        <h1>Profile Settings</h1>
        <h2>These settings apply to your profile, and they affect everyone who visits it.</h2>
            <br>
        <label for="mp3Input">File URL</label>
        <p color="red">Must be in MP3 format in order to work correctly!</p>
        <input type="text" name="mp3Input" placeholder="quad_damage.mp3" width="100%" value="<?php echo $mp3path;?>">
            <br>

        <h2 color="red">The below features are currently unimplemented and probably don't work yet!</h2><br>
        
        <input type="checkbox" id="p_loopit" name="p_loopit" <?php echo $p_saved_loopit;?>><label for="p_loopit">Loop Music</label>
        <p>Your music will repeat seamlessly. Very useful for ambient tracks, or video game music.</p>
            <br>
        <input type="checkbox" id="p_useIdentityClasses" name="p_useIdentityClasses" <?php echo $p_saved_IdentityClasses;?>><label for="p_useIdentityClasses">Treat Player as Identity Module</label>
        <p>Adds Identity Module classes to the player's &lsaquo;div&rsaquo; for styling purposes. Intended for Profile Uberstyles.</p>
            <br>

            <br>
        <h1>Global Settings</h1>
        <h2>These affect all other pages you visit that have Audio Player installed. Only YOU can see these changes!</h2>
            <br>

        <input type="checkbox" id="g_useIdentityClasses" name="g_useIdentityClasses" <?php echo $g_saved_IdentityClasses;?>><label for="g_useIdentityClasses">Treat Player as Identity Module</label>
        <p>Adds Identity Module classes to the player's &lsaquo;div&rsaquo; for styling purposes. Intended for Global Uberstyles.</p>
        <p color="red">This will be ignored when the profile you are visiting has an Uberstyle!</p>
            <br>
        <input type="checkbox" id="g_autoplaytoggler" name="g_autoplaytoggler" <?php echo $g_saved_autoplaytoggler;?>><label for="g_autoplaytoggler">Autoplay Music</label>
        <p>Sets music to automatically play when loaded.</p>
            <br>
        <input type="checkbox" id="g_mutetoggler" name="g_mutetoggler" <?php echo $g_saved_mutetoggler;?>><label for="g_mutetoggler">Automatically Mute Music</label>
        <p>Sets the player to automatically mute when loaded.</p>
            <br>
        <button type="submit" class="button" value="Submit" style="margin-top:20px;">Submit</button>
    </form>
</div>

</body>
