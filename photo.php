<?php
//--- Set the parameters --------------//
$url    = $_GET['url'];
$apikey = "";
$width  = 1280;
//--- Make the call -------------------//
$fetchUrl = "https://api.thumbnail.ws/api/".$apikey ."/thumbnail/get?url=".urlencode($url)."&width=".$width.'&fullpage=true&refresh=true'; // &fullpage=true
$jpeg = file_get_contents($fetchUrl);
//--- Do something with the image -----//
/* file_put_contents("screenshot.jpg", $jpeg); */
header("Content-type: image/jpeg");
echo $jpeg;
exit(0);
?>