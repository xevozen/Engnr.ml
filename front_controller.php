<?php
include("php/db_info.php");
function getTitle($url) {
    set_error_handler("my_error_handler");
    try {
    	$page = file_get_contents($url);
        $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : "Invalid Page";
      }
    catch(Exception $e) {
        
    }
    return $title;
}
function my_error_handler($error_no, $error_msg)
{
    echo "<script>";
    echo "console.log(\"".$error_no."\");";
    echo "console.log(\"".$error_msg."\");";
    echo "</script>";
    // echo "console.log(\"Url not found\");";
}


// get web page title
// echo 'Title: ' . getTitle('http://www.w3schools.com/php/');
// echo $_SERVER['REQUEST_URI'];
// echo "<br>";
// echo "You entered a wrong directory";

// if (!isset($_SESSION['unq_key'])) {
// 	# code...
// 	echo "Invalid query received";
// }
// else{
// 	echo "Valid query received";
// }

$title = "Engnr.ml - Free URL Shortener";
// echo "<br>";
// echo str_replace("/link%20shortener/front_controller.php/", "",$_SERVER['REQUEST_URI']);
$string = str_replace("/", "",$_SERVER['REQUEST_URI']);

// echo "<br>";
// echo "<br>";
$select = "SELECT * FROM link_table WHERE unq_key = '$string' ";
$details = $path->query($select);
if (mysqli_num_rows($details)>0) {
	$row = mysqli_fetch_assoc($details);
// 	echo $row['unq_key'];
// 	echo "<br>";
// 	echo $row['red_link'];
// 	echo "<br>";
    $title = getTitle($row['red_link']);
//    $title = getTitle($row['red_link'])." >>Engnr.ml";
    //echo "<title>".getTitle($row['red_link'])."</title>";
    echo "You're being redirected to ".$row['red_link']." in 5 seconds<br>";
    echo "Thanks for using Engnr.ml";
 	echo "<meta http-equiv=\"refresh\" content=\"5;url=".$row['red_link']."\">";
	echo "<BODY onLoad=\"update_stat(2)\"></BODY>";
	# code...
}
else{
    // echo "<title>Engnr.ml</title>";
	echo "<meta http-equiv=\"refresh\" content=\"5;url='/'\">";
	echo "<center>
        <h3 style=\"font-family:Helvetica;\">Oops! php Looks like this link is broken</h3>
    </center>";
}



?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta name="description" content="The best free and opensource URL link shortener. This project is open for contribution.">
	<link rel="canonical" href="http://engnr.ml/"/>
	<meta name="robots" content="index, follow">
	<meta property="og:type" content="website" />
	<meta property="og:title" content='<?php echo $title ?>' />
	<meta property="og:description" content="The best free and opensource URL link shortener which is open for contribution. Engnr.ml is a reliable website to shorten URL which are difficult ot remember." />
	<meta property="og:image" content="http://engnr.ml/media/icon1200x630.png" />
	<meta property="og:url" content="http://engnr.ml/" />
	<meta property="og:site_name" content="Engnr.ml" />
	<meta property="og:locale" content="en-US">
	
	<meta name="twitter:title" content='<?php echo $title ?>' />
	<meta name="twitter:description" content="The best free and opensource URL link shortener which is open for contribution. Engnr.ml is a reliable website to shorten URL which are difficult ot remember.">
	<meta name="twitter:image" content="http://engnr.ml/media/icon1200x630.png">
	<meta name="twitter:site" content="@souhardhya">
	<meta name="twitter:creator" content="@souhardhya">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
	<meta name="keywords" content="The best free and opensource URL link shortener. This project is open for contribution." />
	<meta charset="utf-8">
	<link rel = "icon" href ="media/icon.png" type = "image/x-icon"> 
	
	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Karla:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="icon" href="media/icon.png" type="image/icon type">
	<script type="text/javascript">
		function update_stat(num) {
		var url = "php/site_stat.php/";
		var res = url.concat(num);
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", res);
		//xhttp.open("POST", "http://www.engnr.ml/site_stats.php/4/"+num);
		xhttp.send();
// 		console.log("sent");
// 		console.log(res);
	}
	</script>
</head>
<body>
</body>
</html>