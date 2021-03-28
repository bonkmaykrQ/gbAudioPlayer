<?php
error_reporting(E_ERROR); 

   function endFunc($str, $lastString) {
      $count = strlen($lastString);
      if ($count == 0) {
         return true;
      }
      return (substr($str, -$count) === $lastString);
   }
   
$currentuserid = $_POST["UserID"]; // Causes a security vulnerability.
$configpath = $currentuserid;

//if ($_POST["p_loopit"] == null) {$_POST["p_loopit"] = "off";}

$mp3path = $_POST["mp3Input"];
$p_saved_loopit = $_POST["p_loopit"];
$p_saved_IdentityClasses = $_POST["p_useIdentityClasses"];
$g_saved_IdentityClasses = $_POST["g_useIdentityClasses"];
$g_autoplaytoggler = $_POST["g_autoplaytoggler"];
$g_mutetoggler = $_POST["g_mutetoggler"];

$mp3name = basename($mp3path);

if (endFunc($mp3path, ".mp3") && substr( $mp3path, 0, 4 ) == "http") {
    echo '<head>
    <style>
        @font-face {
            font-family:abel;
            src:url(https://files.gamebanana.com/bitpit/abel-regular.ttf);
        }
    </style>
</head>
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/3iqw2l.gif);color:white;background-size:380px;font-family:abel;text-shadow:0px 1px 0px #009900, 0px 0.5px 0px #009900, 0px 0.25px 0px #009900, 0px 0.75px 0px #009900, 0px 1px 3px black, 0px 1px 3px black;font-size:18px;">
    <div style="display:flex;justify-content:center;align-items:center;height:100%;">
        <div style="background:rgba(0,255,0,0.5);color:#00ff00;border:2px solid #00ff00;backdrop-filter:blur(1px);font-size:24px;text-align:center;border-radius:10px;padding-top:10px;padding-bottom:10px;padding-left:6px;padding-right:6px;">
    <b>Applied file <font color=" yellow" style="text-shadow:0px 0.25px 0px #999900, 0px 0.5px 0px #999900, 0px 0.75px 0px #999900, 0px 1px 0px #999900, 0px 0px 5px yellow, 0px 0px 4px yellow;">';
    echo $mp3name;
    echo'</font> to user number ';
    echo $currentuserid;
    echo'.</b>
    <br><br>
    <font style="font-size:11px;text-shadow:none;color:#00ff00;">You may now return to your profile.</font>
    </div>
    </div>
</body>';

$configstream = fopen ($configpath, "w");
fwrite($configstream, $mp3path);
fclose($configstream);

$configpath = $currentuserid;
$configstream = fopen ($configpath .= "_p_saved_loopit", "w");
fwrite($configstream, $p_saved_loopit);
fclose($configstream);

$configpath = $currentuserid;
$configstream = fopen ($configpath .= "_p_saved_IdentityClasses", "w");
fwrite($configstream, $p_saved_IdentityClasses);
fclose($configstream);

$configpath = $currentuserid;
$configstream = fopen ($configpath .= "_g_saved_IdentityClasses", "w");
fwrite($configstream, $g_saved_IdentityClasses);
fclose($configstream);

$configpath = $currentuserid;
$configstream = fopen ($configpath .= "_g_saved_autoplaytoggler", "w");
fwrite($configstream, $g_autoplaytoggler);
fclose($configstream);

$configpath = $currentuserid;
$configstream = fopen ($configpath .= "_g_saved_mutetoggler", "w");
fwrite($configstream, $g_mutetoggler);
fclose($configstream);

} elseif (substr( $mp3path, 0, 4 ) == "http") {
    echo '<head>
    <style>
        @font-face {
            font-family:abel;
            src:url(https://files.gamebanana.com/bitpit/abel-regular.ttf);
        }
    </style>
</head>
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/3iqw2l.gif);color:white;background-size:380px;font-family:abel;text-shadow:0px 1px 0px #990000, 0px 0.5px 0px #990000, 0px 0.25px 0px #990000, 0px 0.75px 0px #990000, 0px 1px 3px black, 0px 1px 3px black;font-size:18px;">
    <div style="display:flex;justify-content:center;align-items:center;height:100%;">
        <div style="background:rgba(255,0,0,0.5);color:#ff0000;border:2px solid #ff0000;backdrop-filter:blur(1px);font-size:24px;text-align:center;border-radius:10px;padding-top:10px;padding-bottom:10px;padding-left:6px;padding-right:6px;">
    <b>That wasn\'t an MP3 file!</b>
    <br><br>
    <font style="font-size:18px;text-shadow:none;color:#ff0000;">Please ensure that your URL leads directly to the file itself. Google Drive, MEGA, and Dropbox DO NOT WORK.<br><br>Your changes were not saved.</font>
    </div>
    </div>
</body>';
} else {
    echo '<head>
    <style>
        @font-face {
            font-family:abel;
            src:url(https://files.gamebanana.com/bitpit/abel-regular.ttf);
        }
    </style>
</head>
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/3iqw2l.gif);color:white;background-size:380px;font-family:abel;text-shadow:0px 1px 0px #990000, 0px 0.5px 0px #990000, 0px 0.25px 0px #990000, 0px 0.75px 0px #990000, 0px 1px 3px black, 0px 1px 3px black;font-size:18px;">
    <div style="display:flex;justify-content:center;align-items:center;height:100%;">
        <div style="background:rgba(255,0,0,0.5);color:#ff0000;border:2px solid #ff0000;backdrop-filter:blur(1px);font-size:24px;text-align:center;border-radius:10px;padding-top:10px;padding-bottom:10px;padding-left:6px;padding-right:6px;">
    <b>That wasn\'t a web address!</b>
    <br><br>
    <font style="font-size:18px;text-shadow:none;color:#ff0000;">Please ensure that your URL leads directly to the file itself ON A CONTENT DELIVERY NETWORK. Google Drive, MEGA, and Dropbox DO NOT WORK. Storing the file on your hard drive DOES NOT WORK.<br><br>Your changes were not saved.</font>
    </div>
    </div>
</body>';
}

?>

