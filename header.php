<!DOCTYPE html>
<?php 
	require_once 'lib/common.php';
?>
<html>
	<head>
		<title>an-chan.gg</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,100italic,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="animate.css">
		<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header class="container" id="title">
			<div id="titlediv">
				<h1>AN-CHAN.gg</h1>
			</div>
		</header>
		<audio id="ignoreTHIS" src="lib\wow\suchneugierig\STOP\veryinteresting\wow.mp3"></audio>
		<script>
		    var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65";
		    $(document).keydown(function(e) {
		        kkeys.push( e.keyCode );
		        console.log("wow");
		        if ( kkeys.toString().indexOf( konami ) >= 0 ) {
		            kkeys = [];
		            document.getElementById("ignoreTHIS").play();
		            $("body").toggleClass("animated infinite bounce");
		            $("header").toggleClass("animated infinite bounce");
		            $(".picitem").toggleClass("animated infinite bounce");
		            $(".postuserpic").toggleClass("animated infinite bounce");
		        }
		    })
		</script>
		<script>
		    var kkeys2 = [], ghostStories = "65,76,87,65,89,83,73,78,77,89,72,69,65,68";
		    $(document).keydown(function(e) {
		        kkeys2.push( e.keyCode );
		        if ( kkeys2.toString().indexOf( ghostStories ) >= 0 ) {
		            kkeys2 = [];
		            window.location.href = "lib/wow/suchneugierig/STOP/veryinteresting/AllIWant/gs.php";
		        }
		    })
		</script>