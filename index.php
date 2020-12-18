
<html>
<head>
<title>Kaskus Auto Sundul 1.0</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#E8EDEE">



<div class="maindiv">
	<div class="header">
		Kaskus Auto Sundul 1.0
		<br>
		<span class="subketerangan">Auto Sundul For Kaskus FJB</span>
	</div>

	<div class="mainform">
		<div class="mainleft">
			<div class="headermain"><img class="imgpreview" src="style/img/account.png">&nbsp Account Details</div>
			<div class="intimain">
				Username : <input class="textnya" id="usernamenya" type="text" placeholder="Username" required><br>
				Password :&nbsp <input class="textnya" id="passwordnya" type="password" placeholder="Password" required>
			</div>
		</div>
		<div class="mainright">
			<div class="headermain"><img class="imgpreview" src="style/img/fjb.png">&nbsp Link FJB Kaskus</div>
			<div class="intimain">
				<br>
				<input type="text" class="textnya2" id="linknya" placeholder="Link FJB Kaskus" required>
			
			</div>		
		</div>
		<div class="mainsubmit">
			<img onclick="sundul()" src="style/img/play.png" class="imgplay" alt="Start" title="Start">
			<br>
			Status Sundul:<br>
			<i><div id="sundulstatus">Belum Mulai</div></i>
		
		</div>
	</div>
	
	<div class="status">@2016 AutoSundul</div>

</div>





</body>
</html>





<script type="text/javascript">

var idok=0;
var idno=0;
function sundul()
{
	var usernamenya = document.getElementById("usernamenya").value;
	var passwordnya = document.getElementById("passwordnya").value;
	var linknya = document.getElementById("linknya").value;
	if(usernamenya=="" | passwordnya=="" | linknya=="")
	{
		document.getElementById("sundulstatus").innerHTML = "Gagal";
	}else{
		
		sundulhelper();
	}
	
}

function sundulhelper()
{
	document.getElementById("sundulstatus").innerHTML = "Loading .. ";
	
	
		var usernamenya = document.getElementById("usernamenya").value;
		var passwordnya = document.getElementById("passwordnya").value;
		var linknya = document.getElementById("linknya").value;
		
		
		repeatloop(linknya,usernamenya,passwordnya);
		
		
	
}

	function createajax()
	{
		if(window.XMLHttpRequest)
			return new XMLHttpRequest();
		if(window.ActiveXObject)
			return new ActiveXObject("MicrosoftXMLHTTP");
	}
	
	function repeatloop(linknya,usernamenya,passwordnya)
	{
		sendRequest('sundul.php?link='+linknya+'&&user='+usernamenya+'&&pass='+passwordnya);
		
	}
	
	
	
	var http = createajax();
	function sendRequest(page) 
	{
		// Open PHP script for requests
		http.open('get', page);
		http.onreadystatechange = handleResponse;
		http.send(null);
	
	}
	
	function handleResponse() 
	{
		if(http.readyState == 4 && http.status == 200)
		{
			// Text returned FROM the PHP script
			var response = http.responseText;
			var result = response.indexOf("false");
			if(result > -1)
			{
				
				document.getElementById("sundulstatus").innerHTML = "Gagal";
			
				
			}else{
				document.getElementById("sundulstatus").innerHTML = "Berhasil";
			}
			
			
		}
	}

</script>