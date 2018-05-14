window.onload = function(){
	var mainleft = document.getElementById("main").style.marginLeft;
	document.getElementById("mob-sidnav-open").onclick = function() {
		document.getElementById("mob-sidnav-container").style.width = "200px";
	}
	document.getElementById("closebtn").onclick = function() {
		document.getElementById("mob-sidnav-container").style.width = "0";
	}
	
}