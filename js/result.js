function copy_url() {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val(document.getElementById("srt_url").getAttribute("href")).select();
	document.execCommand("copy");
	//alert("Copied : "+document.getElementById("srt_url").getAttribute("href"));
	$temp.remove();
	var x = document.getElementById("snackbar");
	x.className = "show";
	setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2800);
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
	var url = "../php/site_stat.php/";
	var res = url.concat(num);
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", res);
	//xhttp.open("POST", "http://www.engnr.ml/site_stats.php/4/"+num);
	xhttp.send();
	console.log("sent");
	console.log(res);
}
// function update_stat(i) {
// 	var xhttp = new XMLHttpRequest();
// 	var url = "http://www.engnr.ml/site_stats.php/";
// 	var res = url.concat(i);
// 	xhttp.open("POST", res);
// 	xhttp.send();
// 	console.log("sent");
// 	console.log(res);
// }