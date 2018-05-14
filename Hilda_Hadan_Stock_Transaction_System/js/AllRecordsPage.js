window.onload = function(){
	var mainleft = document.getElementById("main").style.marginLeft;
	document.getElementById("mob-sidnav-open").onclick = function() {
		document.getElementById("mob-sidnav-container").style.width = "200px";
	}
	document.getElementById("closebtn").onclick = function() {
		document.getElementById("mob-sidnav-container").style.width = "0";
	}

	document.getElementById("change").onclick = function () {
		if ( document.getElementById("columns0").checked == true && document.getElementById("columns1").checked == true && document.getElementById("columns2").checked == true && document.getElementById("columns3").checked == true ) {
			document.getElementById("data-window").src = "historypages/DataTableFull.html";
		}
		
		if ( document.getElementById("columns0").checked == true && document.getElementById("columns1").checked == false && document.getElementById("columns2").checked == false && document.getElementById("columns3").checked == false ) {
			document.getElementById("data-window").src = "historypages/DataTable0.html";
		}
		
		if ( document.getElementById("columns0").checked == false && document.getElementById("columns1").checked == true && document.getElementById("columns2").checked == false && document.getElementById("columns3").checked == false ) {
			document.getElementById("data-window").src = "historypages/DataTable1.html";
		}
		
		if ( document.getElementById("columns0").checked == false && document.getElementById("columns1").checked == false && document.getElementById("columns2").checked == true && document.getElementById("columns3").checked == false ) {
			document.getElementById("data-window").src = "historypages/DataTable2.html";
		}
		
		if ( document.getElementById("columns0").checked == false && document.getElementById("columns1").checked == false && document.getElementById("columns2").checked == false && document.getElementById("columns3").checked == true ) {
			document.getElementById("data-window").src = "historypages/DataTable3.html";
		}
		
		if ( document.getElementById("columns0").checked == true && document.getElementById("columns1").checked == true && document.getElementById("columns2").checked == false && document.getElementById("columns3").checked == false ) {
			document.getElementById("data-window").src = "historypages/DataTable0+1.html";
		}
		
		if ( document.getElementById("columns0").checked == true && document.getElementById("columns1").checked == false && document.getElementById("columns2").checked == true && document.getElementById("columns3").checked == false ) {
			document.getElementById("data-window").src = "historypages/DataTable0+2.html";
		}
		
		if ( document.getElementById("columns0").checked == true && document.getElementById("columns1").checked == false && document.getElementById("columns2").checked == false && document.getElementById("columns3").checked == true ) {
			document.getElementById("data-window").src = "historypages/DataTable0+3.html";
		}
		
		if ( document.getElementById("columns0").checked == false && document.getElementById("columns1").checked == true && document.getElementById("columns2").checked == true && document.getElementById("columns3").checked == false ) {
			document.getElementById("data-window").src = "historypages/DataTable1+2.html";
		}
		
		if ( document.getElementById("columns0").checked == false && document.getElementById("columns1").checked == true && document.getElementById("columns2").checked == false && document.getElementById("columns3").checked == true ) {
			document.getElementById("data-window").src = "historypages/DataTable1+3.html";
		}
		
		if ( document.getElementById("columns0").checked == false && document.getElementById("columns1").checked == false && document.getElementById("columns2").checked == true && document.getElementById("columns3").checked == true ) {
			document.getElementById("data-window").src = "historypages/DataTable2+3.html";
		}
		
		if ( document.getElementById("columns0").checked == true && document.getElementById("columns1").checked == true && document.getElementById("columns2").checked == true && document.getElementById("columns3").checked == false ) {
			document.getElementById("data-window").src = "historypages/DataTable0+1+2.html";
		}
		
		if ( document.getElementById("columns0").checked == true && document.getElementById("columns1").checked == true && document.getElementById("columns2").checked == false && document.getElementById("columns3").checked == true ) {
			document.getElementById("data-window").src = "historypages/DataTable0+1+3.html";
		}
		
		if ( document.getElementById("columns0").checked == true && document.getElementById("columns1").checked == false && document.getElementById("columns2").checked == true && document.getElementById("columns3").checked == true ) {
			document.getElementById("data-window").src = "historypages/DataTable0+2+3.html";
		}
		
		if ( document.getElementById("columns0").checked == false && document.getElementById("columns1").checked == true && document.getElementById("columns2").checked == true && document.getElementById("columns3").checked == true ) {
			document.getElementById("data-window").src = "historypages/DataTable1+2+3.html";
		}
	}
}
	