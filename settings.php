<?php
error_reporting(E_ALL ^ E_WARNING); 

$currentuserid = basename($_GET["_idMember"]);
$configpath = $currentuserid;

if (file_exists($configpath)) {
    $configstream = fopen ($configpath, "r");
    $mp3path = fread($configstream, 9999);
    fclose($configstream);
} else {
    $mp3path = "";
}

if (file_exists($configpath .= "_p_saved_loopit")) {
    $configstream = fopen ($configpath, "r");
    $p_saved_loopit = fread($configstream, 9999);
    fclose($configstream);

    if ($p_saved_loopit == "on") {
        $p_saved_loopit = "checked";
    } else {
        $p_saved_loopit = "";
    }

} else {
    $p_saved_loopit = "";
}

$configpath = $currentuserid;
if (file_exists($configpath .= "_p_saved_IdentityClasses")) {
    $configstream = fopen ($configpath, "r");
    $p_saved_IdentityClasses = fread($configstream, 9999);
    fclose($configstream);

    if ($p_saved_IdentityClasses == "on") {
        $p_saved_IdentityClasses = "checked";
    } else {
        $p_saved_IdentityClasses = "";
    }

} else {
    $p_saved_IdentityClasses = "";
}

$configpath = $currentuserid;
if (file_exists($configpath .= "_g_saved_IdentityClasses")) {
    $configstream = fopen ($configpath, "r");
    $g_saved_IdentityClasses = fread($configstream, 9999);
    fclose($configstream);

    if ($g_saved_IdentityClasses == "on") {
        $g_saved_IdentityClasses = "checked";
    } else {
        $g_saved_IdentityClasses = "";
    }

} else {
    $g_saved_IdentityClasses = "";
}

$configpath = $currentuserid;
if (file_exists($configpath .= "_g_saved_autoplaytoggler")) {
    $configstream = fopen ($configpath, "r");
    $g_saved_autoplaytoggler = fread($configstream, 9999);
    fclose($configstream);

    if ($g_saved_autoplaytoggler == "on") {
        $g_saved_autoplaytoggler = "checked";
    } else {
        $g_saved_autoplaytoggler = "";
    }

} else {
    $g_saved_autoplaytoggler = "";
}

$configpath = $currentuserid;
if (file_exists($configpath .= "_g_saved_mutetoggler")) {
    $configstream = fopen ($configpath, "r");
    $g_saved_mutetoggler = fread($configstream, 9999);
    fclose($configstream);

    if ($g_saved_mutetoggler == "on") {
        $g_saved_mutetoggler = "checked";
    } else {
        $g_saved_mutetoggler = "";
    }

} else {
    $g_saved_mutetoggler = "";
}
?>

<!--
    Please add the new features to the above PHP code as neccessary.
    They will not work without it.

    - bonkmaykr
-->

<head>
    <script>
        //function bruh(thing) {
        //    if (thing.hasAttribute("checked")) {
        //        thing.setAttribute("value", "true");
        //    } else {
        //        thing.setAttribute("value", "false");
        //    }
        //}
    </script>
    
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

        input[type="text"], button {
            min-width: 200px;
            max-width: 800px;
            width: 100%;
            background: rgba(0,0,70,0.2);
            backdrop-filter: blur(1px);
            color: white;
            border-radius: 10px;
            border: 1px solid rgb(95, 95, 190);
            font-family: abel;
            transition-duration: 0.2s;
        }

        input:hover, button:hover {
            background: rgba(95, 95, 190,0.8);
            backdrop-filter: blur(3px);
            color: white;
            border-radius: 17px;
            border: 1px solid rgb(125, 125, 250);
        }

        input:focus, button:active {
            background:rgba(130,130,200,0.5);
            backdrop-filter:blur(1px);
            color:white;
            border-radius:10px;
            border:3px solid rgb(75, 75, 255);
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
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/3iqw2l.gif);color:white;background-size:380px;font-family:abel;"> <!--#000046-->
    
<div class="Content bmAudioSettings">
    <h1 style="font-size:32px;text-shadow:0px 1px 0px #009900, 0px 0.5px 0px #009900, 0px 0.25px 0px #009900, 0px 0.75px 0px #009900, 0px 1px 3px black, 0px 1px 3px black;color:#00ff00;">bonkmaykr's Audio Player</h1>
    
    <form method="POST" action="https://gbaudioplayer.000webhostapp.com/gbAudioPlayer/bmAudioSubmit.php">
    <input type="text" name="UserID" value="<?php echo $currentuserid;?>" height="0px" width="0px" style="pointer-events:none;opacity:0;color:transparent;">
        <h1>Profile Settings</h1>
        <h2>These settings apply to your profile, and they affect everyone who visits it.</h2>
            
        <label for="mp3Input"><h3>File URL</h3></label>
        <p style="color:red;">Must be in MP3 format in order to work correctly!</p>
        <input type="text" name="mp3Input" placeholder="quad_damage.mp3" width="100%" value="<?php echo $mp3path;?>"><br><br>
        
        <input type="checkbox" id="p_loopit" name="p_loopit" <?php echo $p_saved_loopit;?>><label for="p_loopit">Loop Music</label>
        <p>Your music will repeat seamlessly. Very useful for ambient tracks, or video game music.</p><br>
            
        <input type="checkbox" id="p_useIdentityClasses" name="p_useIdentityClasses" <?php echo $p_saved_IdentityClasses;?>><label for="p_useIdentityClasses">Treat Player as Identity Module</label>
        <p>Adds Identity Module classes to the player's &lsaquo;div&rsaquo; for styling purposes. Intended for Profile Uberstyles.</p><br>
            

            <br>
        <h1>Global Settings</h1>
        <h2>These affect all other pages you visit that have Audio Player installed. Only YOU can see these changes!</h2>
            <br>

        <input type="hidden" id="g_useIdentityClasses" name="g_useIdentityClasses" <?php echo $g_saved_IdentityClasses;?>><!--<label for="g_useIdentityClasses">Treat Player as Identity Module</label>
        <p>Adds Identity Module classes to the player's &lsaquo;div&rsaquo; for styling purposes. Intended for Global Uberstyles.</p>
        <p style="color:red;">This will be ignored when the profile you are visiting has an Uberstyle!</p><br>-->
            
        <input type="checkbox" id="g_autoplaytoggler" name="g_autoplaytoggler" <?php echo $g_saved_autoplaytoggler;?>><label for="g_autoplaytoggler">Autoplay Music</label>
        <p>Sets music to automatically play when loaded.</p><br>
            
        <input type="checkbox" id="g_mutetoggler" name="g_mutetoggler" <?php echo $g_saved_mutetoggler;?>><label for="g_mutetoggler">Automatically Mute Music</label>
        <p>Sets the player to automatically mute when loaded.</p><br>
            
        <button type="submit" class="button" value="Submit" style="margin-top:20px;">Submit</button>
    </form>
</div>

</body>