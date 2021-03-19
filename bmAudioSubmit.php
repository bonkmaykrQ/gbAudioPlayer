<?php
   function endFunc($str, $lastString) {
      $count = strlen($lastString);
      if ($count == 0) {
         return true;
      }
      return (substr($str, -$count) === $lastString);
   }
   
$currentuserid = $_POST["UserID"];
$configpath = $currentuserid;
$mp3path = $_POST["mp3Input"];

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
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/giphy_8_.gif), navy;color:white;background-size:120px;font-family:abel;text-shadow:0px 1px 0px #009900, 0px 0.5px 0px #009900, 0px 0.25px 0px #009900, 0px 0.75px 0px #009900, 0px 1px 3px black, 0px 1px 3px black;font-size:18px;">
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
} elseif (substr( $mp3path, 0, 4 ) == "http") {
    echo '<head>
    <style>
        @font-face {
            font-family:abel;
            src:url(https://files.gamebanana.com/bitpit/abel-regular.ttf);
        }
    </style>
</head>
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/giphy_8_.gif), navy;color:white;background-size:120px;font-family:abel;text-shadow:0px 1px 0px #990000, 0px 0.5px 0px #990000, 0px 0.25px 0px #990000, 0px 0.75px 0px #990000, 0px 1px 3px black, 0px 1px 3px black;font-size:18px;">
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
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/giphy_8_.gif), navy;color:white;background-size:120px;font-family:abel;text-shadow:0px 1px 0px #990000, 0px 0.5px 0px #990000, 0px 0.25px 0px #990000, 0px 0.75px 0px #990000, 0px 1px 3px black, 0px 1px 3px black;font-size:18px;">
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
