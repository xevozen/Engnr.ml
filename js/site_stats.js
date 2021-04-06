var xhttp = new XMLHttpRequest();
xhttp.open("GET", "../php/site_stat.php");
xhttp.onload = function()  {
	var data = JSON.parse(xhttp.responseText);
    document.getElementById("one").innerHTML = data.Visitors+"+";
    document.getElementById("two").innerHTML = data.Redirects+"+";
    document.getElementById("three").innerHTML = data.Links+"+";
    document.getElementById("four").innerHTML = data.Likes+"+";
};
xhttp.send();