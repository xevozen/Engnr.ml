function myFunction() {
  	//location.replace("https://www.w3schools.com")
  	var body = document.getElementById("error");
	var expression =  
	/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi; 
	var regex = new RegExp(expression); 
	var url = document.forms["myForm"]["url_bar"].value;
	if (url.match(regex)) {
	//document.getElementById("error-msg").innerHTML = "Valid URL";
	//document.getElementById("error-msg").style.backgroundColor = '#32a852';
	//body.className = "show";
	//setTimeout(function(){ body.className = body.className.replace("show", ""); }, 3000);
	return true;
	}
	else{
	//var y = document.getElementById("error");
	document.getElementById("error-msg").innerHTML = "Invalid URL";
	body.className = "show";
	setTimeout(function(){ body.className = body.className.replace("show", ""); }, 3000);
	// y.className = "";
	return false;
	}
}
function url_bar_change() {
	if (document.forms["myForm"]["url_bar"].value=="") {
		document.getElementById('reset_input').style.display = "none";
	}
	else {
		document.getElementById('reset_input').style.display = "block";
	}
}
function reset_input() {
	document.forms["myForm"]["url_bar"].value = "";
	document.getElementById('reset_input').style.display = "none";
	document.forms["myForm"]["url_bar"].focus();
}
function review(argument) {
	//alert(argument);
	if (argument == 'like') {
		var x = document.getElementById("like");
		if (x.style.color != 'rgb(70, 179, 95)') {
			update_stat("4/1");
		}
		x.style.color = '#46b35f';
		var x = document.getElementById("dislike");
		x.style.color = '#000';
		
	}
	if (argument == 'dislike') {
		var x = document.getElementById("like");
		x.style.color = '#000';
		var x = document.getElementById("dislike");
		if (x.style.color != 'rgb(222, 55, 40)') {
			update_stat("4/2");
		}
		x.style.color = '#de3728';
	}
	var x = document.getElementById("loader");
	x.style.visibility = 'visible';
	setTimeout(function(){ x.style.visibility = 'hidden' }, 3000);
	// body...
}
function update_stat(num) {
	var xhttp = new XMLHttpRequest();
	var url = "../php/site_stat.php/";
	var res = url.concat(num);
	xhttp.open("POST", res);
	xhttp.send();
// 	console.log("sent");
// 	console.log(res);
}
function animation1() {
	// console.log($(window).height()+",");
	// console.log($(this).scrollTop()+",");
	// console.log($(this).scrollTop()/$(window).height()+",");
	var h = document.documentElement, 
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight';
        sr = (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight);
    console.log((h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100);
    document.getElementById("obj1").style.right = (-75 -(sr*350))+"px";
    document.getElementById("obj2").style.right = (68 +(sr*50))+"%";
    document.getElementById("obj2").style.top = (-10 -(sr*50))+"%";
    document.getElementById("obj3").style.top = (-20 -(sr*50))+"%";
    document.getElementById("obj3").style.right = (3 -(sr*70))+"%";
    document.getElementById("obj4").style.bottom = (230 +(sr*500))+"px";
    document.getElementById("obj4").style.left = (75 -(sr*300))+"px";
    // document.getElementById("obj5").style.bottom = (10 +(sr*200))+"%";
    document.getElementById("obj5").style.right = (35 +(sr*200))+"%";
}
