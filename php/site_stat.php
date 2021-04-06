<?php
include("db_info.php");
$select="SELECT * FROM site_stat";
$details=$path->query($select);
$row=mysqli_fetch_assoc($details);
$visitors=$row['visitor'];
$redirects=$row['redirect'];
$links=$row['link'];
$likes=$row['likes'];
$stat = array("Visitors"=>$visitors, "Redirects"=>$redirects, "Links"=>$links, "Likes"=>$likes);
echo json_encode($stat);

if ($_SERVER['REQUEST_URI']!="/php/site_stat.php"){
    $string = str_replace("/php/site_stat.php/", "",$_SERVER['REQUEST_URI']);
    if ($string=="") {
    	
    	# code...
    }
    else if ($string=="1") {
    	$sql = "UPDATE site_stat SET visitor=visitor+1";
    	$details=$path->query($sql);
    	# code...
    }
    else if ($string=="2") {
    	$sql = "UPDATE site_stat SET redirect=redirect+1";
    	$details=$path->query($sql);
    	# code...
    }
    else if ($string=="3") {
    	$sql = "UPDATE site_stat SET link=link+1";
    	$details=$path->query($sql);
    	# code...
    }
    else if ($string=="4/1") {
    	$sql = "UPDATE site_stat SET likes=likes+1";
    	$details=$path->query($sql);
    	# code...
    }
    else if ($string=="4/2") {
    	$sql = "UPDATE site_stat SET likes=likes-1";
    	$details=$path->query($sql);
    	# code...
    }
       
}
// echo $_SERVER['REQUEST_URI'];
// echo "<br>";
// echo str_replace("/site_stats.php/", "",$_SERVER['REQUEST_URI']);
// $string = str_replace("/site_stats.php/", "",$_SERVER['REQUEST_URI']);

// $select="SELECT * FROM site_stat";
// $details=$path->query($select);
// $row=mysqli_fetch_assoc($details);
// $visitors=$row['visitor'];
// $redirects=$row['redirect'];
// $links=$row['link'];
// $likes=$row['likes'];
// $stat = array("Visitors"=>$visitors, "Redirects"=>$redirects, "Links"=>$links, "Likes"=>$likes);
// if ($string=="") {
// 	break;
// 	# code...
// }
// else if ($string=="1") {
// 	$sql = "UPDATE site_stat SET visitor=visitor+1";
// 	$details=$path->query($sql);
// 	# code...
// }
// else if ($string=="2") {
// 	$sql = "UPDATE tablename SET redirect=redirect+1";
// 	$details=$path->query($sql);
// 	# code...
// }
// else if ($string=="3") {
// 	$sql = "UPDATE tablename SET link=link+1";
// 	$details=$path->query($sql);
// 	# code...
// }
// else if ($string=="4/1") {
// 	$sql = "UPDATE tablename SET likes=likes+1";
// 	$details=$path->query($sql);
// 	# code...
// }
// else if ($string=="4/2") {
// 	$sql = "UPDATE tablename SET likes=likes-1";
// 	$details=$path->query($sql);
// 	# code...
// }
// echo json_encode($stat);

?>