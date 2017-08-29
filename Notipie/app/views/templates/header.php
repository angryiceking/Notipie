<?php @session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Shabiru</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootflat.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/flash-theme.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/weather-icons.min.css">
	<link rel="stylesheet" type="text/css" href="css3/index-theme.css">
	<script type="text/javascript" src="../../assets/js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="../../assets/js/easyNotify.js"></script>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-36251023-1']);
		_gaq.push(['_setDomainName', 'jqueryscript.net']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<?php if (isset($_SESSION['login'])): ?>
		<?php if ($_SESSION['login'] != null): ?>
			<script type="text/javascript">
				$(document).ready(function (){
					$('#logindiv').hide();
					$('#success').fadeIn(100);

					$('#signout').click(function() {
						$.ajax({
							url: 'scripts/logout.php',
							type: 'POST',
							dataType: 'text',
							success: function(res) {
								console.log(res);
								if (res == "true") {
									$('#success').fadeOut(1500)
									$('#logsuccess').fadeOut(100);
									setTimeout(function (){
										$('#logindiv').fadeIn(100);
									}, 2000);
								}
								else {
									$('#logerror').fadeIn(100);
								}
							},
							error: function(e){
								console.log('error at sign out');
							}
						})
					});
				})
			</script>
		<?php else: ?>
			<script type="text/javascript">
				
			</script>
		<?php endif ?>
	<?php else: ?>
		<script type="text/javascript">
			$(document).ready(function (){
				$('#login').submit(function (e) {
					$('#logerror').fadeOut(100);
					e.preventDefault();
					$.ajax({
						url: 'scripts/check_mem.php',
						type: 'GET',
						data: { user : $('#user').val() },
						dataType: 'json',
						success: function(res) {
							console.log(res);
							if (res == true) {
								$('#logsuccess').fadeIn(100);
								$('#logindiv').fadeOut(1500);
								setTimeout(function (){
									$('#success').fadeIn(100);
								}, 2000);
							}
							else {
								$('#logerror').fadeIn(100);
							}
						},
						error: function(e){
							console.log('error at signout');
						}
					})
				})
				$('#signout').click(function() {
					$.ajax({
						url: 'scripts/logout.php',
						type: 'POST',
						dataType: 'text',
						success: function(res) {
							console.log(res);
							if (res == "true") {
								$('#success').fadeOut(1500)
								$('#logsuccess').fadeOut(100);
								setTimeout(function (){
									$('#logindiv').fadeIn(100);
								}, 2000);
							}
							else {
								$('#logerror').fadeIn(100);
							}
						},
						error: function(e){
							console.log('error');
						}
					})
				});
			})
		</script>
	<?php endif ?>
</head>
<style type="text/css">
	body {
		font-family: 'Open Sans Condensed', sans-serif;
	}
	.badge {
		background-color: #2ecc71;
		padding-top: 10px;
		height: 20px;
		width: 20px;
		padding: 4px 0;
		margin-left: 45px;
		margin-top: 5px;
		border-radius: 30px;
	}

	.badge-small-online {
		background-color: #2ecc71;
		padding-top: 10px;
		height: 10px !important;
		width: 10px !important;
		padding: 4px 0;
		margin-left: 0px !important;
		margin-bottom: 2px;
		border-radius: 30px;
	}

	.badge-small-offline {
		background-color: #7f8c8d;
		padding-top: 10px;
		height: 10px !important;
		width: 10px !important;
		padding: 4px 0;
		margin-left: 0px !important;
		margin-bottom: 2px;
		border-radius: 30px;
	}

	#stlink:hover {
		background: #bdc3c7;
		transition: 0.1s linear;
		z-index: -1;
	}
	.disabled {
		pointer-events: none;
		cursor: default;
		opacity: 0.3;
	}
</style>
<body>
