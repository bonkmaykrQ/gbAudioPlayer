<?php
error_reporting(E_ALL ^ E_WARNING); 
$currentuserid = basename($_GET["_idProfile"]);
$visitoruserid = basename($_GET["_idMember"]);
$configpath = $currentuserid;
$globalconfigpath = $visitoruserid;

$attributesOutput = "";
$classesOutput = "";

if (file_exists($configpath)) {
    $configstream = fopen ($configpath, "r");
    $mp3path = fread($configstream, 9999);
    fclose($configstream);
} else {
    $mp3path = "https://files.gamebanana.com/bitpit/274fdbf7-6096-4c67-9405-4a97fc7311c_82f02.mp3";
}

$configpath = $currentuserid;
if (file_exists($configpath .= "_p_saved_loopit")) {
    $configstream = fopen ($configpath, "r");
    $read_processingthis = fread($configstream, 9999);
    fclose($configstream);

    if ($read_processingthis == "on") {
        $attributesOutput = $attributesOutput .= " loop";
    }
}

$configpath = $currentuserid;
if (file_exists($configpath .= "_p_saved_IdentityClasses")) {
    $configstream = fopen ($configpath, "r");
    $read_processingthis = fread($configstream, 9999);
    fclose($configstream);

    if ($read_processingthis == "on") {
        $classesOutput = $classesOutput .= "IdentityModule bmTreatAsIdentityModule ";
    }
}

$configpath = $visitoruserid;
if (file_exists($configpath .= "_g_saved_IdentityClasses")) {
    $configstream = fopen ($configpath, "r");
    $read_processingthis = fread($configstream, 9999);
    fclose($configstream);

    //$json_a = file_get_contents("https://gamebanana.com/apiv3/Member/" .= $currentuserid);
    //$hasUber = $json_a->;

    $targetProfileHTML = file_get_contents("https://gamebanana.com/members/" + $currentuserid);
    $hasUber = strpos($targetProfileHTML, "<link rel=\"stylesheet\" type=\"text/css\" href=\"https://files.gamebanana.com/Member/uberstyles/");

    if ($read_processingthis == "on") {
        if ($hasUber == false) {
            $classesOutput = $classesOutput .= "IdentityModule bmTreatAsIdentityModule ";
        }
    }
}

$configpath = $visitoruserid;
if (file_exists($configpath .= "_g_saved_autoplaytoggler")) {
    $configstream = fopen ($configpath, "r");
    $read_processingthis = fread($configstream, 9999);
    fclose($configstream);

    if ($read_processingthis == "on") {
        $attributesOutput = $attributesOutput .= " autoplay";
    }
}

$configpath = $visitoruserid;
if (file_exists($configpath .= "_g_saved_mutetoggler")) {
    $configstream = fopen ($configpath, "r");
    $read_processingthis = fread($configstream, 9999);
    fclose($configstream);

    if ($read_processingthis == "on") {
        $attributesOutput = $attributesOutput .= " muted";
    }
}

/*$database->close();*/
?>
<head>
</head>

<module class="PageModule bmAudio">
    <div class="<?php echo $classesOutput;?>Content" style="display:flex;justify-content:center;align-items:center;">
        <!--<h4 class="bmAudioTitle" style="width:0%;">php echo basename($mp3path, "mp3");</h4>-->
        <div class="bmAudioControls green-audio-player">
        <audio width="100%" height="100px" style="background:transparent;" class="" controls<?php echo $attributesOutput;?>>
            <source src="<?php echo $mp3path;?>" type="audio/mpeg"/>
        </audio>
        <!--<script>
        document.addEventListener('DOMContentLoaded', function() {
            new GreenAudioPlayer('.bmAudioControls');
        });
    </script>--></div>
    </div>
</module>
