<?php

if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
$org_url = "";
$srt_url = "";
function my_error_handler($error_no, $error_msg)
{
	echo "alert(\"session expired\");";
}
set_error_handler("my_error_handler");
try {
	if (isset($_SESSION["org_url"])) {
		$org_url = $_SESSION["org_url"];
	}
	if (isset($_SESSION["srt_url"])) {
		$srt_url = $_SESSION["srt_url"];
	}
  	session_unset();

	session_destroy();

  }

catch(Exception $e) {

	session_unset();

	session_destroy();

}

if ($org_url=="") {

	 header("Location: index.html");

}

if ($srt_url=="") {

	 header("Location: /");

}

?>







<!DOCTYPE html>

<html>

<head>

	<title>Engnr.ml - Free URL Shortener</title>

	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Karla:wght@700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="icon" href="media/icon.png" type="image/icon type">

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="keywords" content="htmlcss bootstrap menu, navbar, mega menu examples" />



	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" type="text/css" href="css/result.css">



	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>



	<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->



	<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>-->



	<script src="js/result.js"></script>





</head>

<body class="body" onload="update_stat(3)" >

    <div class="overlay">

		<div id="obj1">			

		</div>

		<div id="obj2">			

		</div>

		<div id="obj3">			

		</div>

		<div id="obj4">			

		</div>

		<div id="obj5">			

		</div>

	</div>

	<div>

<!-- 		<div style="filter: blur(20px); width: 450px; margin: 0px auto 0px; height: 160px; z-index: -1;position: absolute; right: 0; left: 0; background-color: #dee0df; opacity: 0.6;">

		</div> -->

		<div class="bg-blur">

		</div>

		<div class="title">

			<label>Engnr.ml</label>

		</div>

		<div class="sub-title">

			<label>Free URL Shortener</label>

		</div>

	</div>

	<div class="result_window">

		<h4 style="padding: 20px; padding-bottom: 5px">Your link :</h4>

		<div class="org_url">

			<a href="<?php echo $org_url; ?>" target="_blank"><?php echo $org_url; ?></a>		

		</div>

		<h4 style="padding: 20px; padding-bottom: 5px">Is shortened into :</h4>

		<div class="result">

			<div class="srt_url">

				<a id="srt_url" href="http://engnr.ml/<?php echo $srt_url; ?>" target="_blank">engnr.ml/<?php echo $srt_url; ?></a>

			</div>

			<div class="srt_url_open" title="Open Externally">

				<a style="color: black;" href="http://engnr.ml/<?php echo $srt_url; ?>" target="_blank">

					<i class="fa fa-external-link fa-2x" style="margin: 6px;"></i>

				</a>

			</div>

			<div class="srt_url_copy" onclick="copy_url()" title="Copy URL">

				<i class="fa fa-clipboard fa-2x" style="margin: 6px;"></i>

				<div style="font-size: 16pt; display: inline; vertical-align: text-bottom;">

					Copy

				</div>

			</div>

		</div>

	</div>

	<div id="snackbar">Link Copied</div>

	<div id="feedback">

		<div style="flex: 1;">

			<div style="padding: 20px; margin: 0 auto 0; color: #e63232">

				<i class="fa fa-heart fa-3x"></i>

			</div>

		</div>

		<div id="feedback2" style="flex: 4">

			<div style="margin: 2px; text-overflow: ellipsis;">

				Let us know your review !

			</div>

			<div style="display: flex; margin: 0px">

				<!-- <div style="flex: 1; border: solid;">

					<i class="fa fa-dot-circle-o fa-2x"></i>

				</div> -->

				<div id="like" onclick="review(this.id)" style="flex: 1; padding: 10px;">

					<i class="fa fa-thumbs-up fa-2x"></i>

				</div>

				<div id="dislike" onclick="review(this.id)" style="flex: 1; padding: 10px">

					<i class="fa fa-thumbs-down fa-2x"></i>

				</div>

				<div id="loader" style="flex: 1; padding: 10px; color: #3e8bde; visibility: hidden;">

					<i class="fa fa-refresh fa-spin fa-2x"></i>

				</div>

			</div>

		</div>

	</div>

	





	<!--- Footer starts here -->

	<div class="footer">

		<div class="footer_title">

			<label>Engnr.ml</label>

		</div>

		<div class="footer-1">

			<ul style=" margin: 10px;">

				<li><a href="files/tnc.txt">Terms of Use</a></li>

				<li><a href="files/contactus.txt">Contact Us</a></li>

				<li><a href="https://github.com/xevozen/Engnr.ml">GitHub Repository</a></li>

			</ul>

		</div>

		<div class="footer-2">

		</div>

		<div class="footer-3">

			<div class="footer-3-1">

				Deve<i class="fa fa-heart"></i>ed by Souhardhya Paul &nbsp <i class="fa fa-copyright"></i>2021

			</div>

			<div class="footer-3-2">

                <a href="https://github.com/xevozen" target="_blank"><i class="fa fa-github fa-3x"></i></a>

				<a href="https://www.linkedin.com/in/xevozen/" target="_blank"><i class="fa fa-linkedin fa-3x"></i></a>

				<i class="fa fa-facebook fa-3x"></i>

				<i class="fa fa-twitter fa-3x"></i>

				<i class="fa fa-youtube fa-3x"></i>

				<i class="fa fa-envelope fa-3x"></i>

				<i class="fa fa-instagram fa-3x"></i>

			</div>

			

		</div>



	</div>

</body>

</html>