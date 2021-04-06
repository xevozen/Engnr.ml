<?php
session_start();
include("db_info.php");
include("random_string_gen.php"); 
//$org_url=$_POST['url_bar'];
if (isset($_POST['url_bar'])) {
	$org_url=$_POST['url_bar'];
	$gen=1;
	while ($gen) {
		$srt_url = random_strings(5);
		$select =" SELECT unq_key FROM link_table WHERE unq_key='$srt_url'";
		$details=$path->query($select);
		if (mysqli_num_rows($details)>0){
			$gen = 1;
		}
		else {
			$gen = 0;
		}
	}
	$insert="INSERT INTO link_table SET unq_key='$srt_url', red_link='$org_url'";
	$result=$path->query($insert);
	if ($result) {
		// echo "URL: ".$org_url." is shortened into http://engnr.ml/".$srt_url;
		// echo "<br>";
		// echo "<a href=\"http://engnr.ml/".$srt_url."\" target=\"_blank\">http://engnr.ml/".$srt_url."</a>";	
		$_SESSION["org_url"]=$org_url;
		$_SESSION["srt_url"]=$srt_url;
		echo "<br>Processing";
		echo "<meta http-equiv=\"refresh\" content=\"2.5;url=../url_result.php\">";
	}
	else{
		echo "<br>Error happened";
		echo "<meta http-equiv=\"refresh\" content=\"5;url=/\">";
	}
	# code...
}
else{
	echo "<br>Error happened";
	echo "<meta http-equiv=\"refresh\" content=\"5;url=/\">";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Processing</title>
	<link rel="icon" href="../media/icon.png" type="image/icon type">
	<link rel="stylesheet" type="text/css" href="../css/shortener.css">
</head>
<body>
	<div class="bar"></div>
	<div class="loader"></div>

</body>
</html>