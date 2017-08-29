<?php
include 'templates/header.php';
?>
<script type="text/javascript">
	$(document).ready(function () {
		$.ajax({
			url: 'scripts/check_online.php',
			type: 'POST',
			dataType: 'html',
			success: function(res) {
				$('#onlinelist').html(res)
			},
			error: function(e){
				console.log('error');
			}
		});
		setInterval(function () {
			$.ajax({
				url: 'scripts/check_online.php',
				type: 'POST',
				dataType: 'html',
				success: function(res) {
					$('#onlinelist').html(res)
				},
				error: function(e){
					console.log('error');
				}
			});
		}, 120000);

		setInterval(function () {
			$.ajax({
				url: 'scripts/check_messages.php',
				type: 'POST',
				dataType: 'json',
				success: function(res) {
					$.each(res, function(x, y) {
						$.ajax({
							url: 'scripts/update_message.php',
							type: 'POST',
							data: { id: res[x][0] },
							dataType: 'json',
							success: function(res) {
								console.log('update done');
							},
							error: function(e) {

							}
						})
						$("#easyNotify").easyNotify({
							title: 'Message from '+res[x]['username'],
							options: {
								body: res[x]['message'],
								icon: '../../assets/img/'+res[x]['img'],
								lang: 'en-US',
							}
						});
					});
					
				},
				error: function(e){
					console.log('error');
				}
			});
		}, 4000);
	});
</script>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-12 text-center center-block" style="margin-top: 10rem;">
			<div class="row">
				<div class="col-md-4">
					
				</div>
				<div id="logindiv" class="col-md-4 center-block">
					<h1>
						Notipie <i class="wi wi-night-clear"></i><hr>
						<small style="font-size: 20px; color: #000;">Login first to recieve pings from other members.</small>
					</h1> 
					<form id="login" method="GET">
						<input type="text" name="user" id="user" placeholder="What's your #member name?" class="form-control">
					</form>
					<br/>
					<small class="text-danger" style="display:none" id="logerror">Who are you? You don't belong to this team. <br/></small>
					<small class="text-success" style="display:none" id="logsuccess"><img src="../../assets/img/Spinner.svg" style="width: 20px; height: 20px;"> Wait a minute, making you a gate pass.. <br/> </small>
					<small>*if you're already a team member just type in your name.</small>
				</div>
				<div id="success" style="display:none" class="col-md-4 center-block">
					<h4 id="message">Login success.. now you will automatically recieve any pings from other members.</h4>
					<i class="zmdi zmdi-badge-check animated tada" style="font-size: 40px;"></i><br/><br/>
					<small>just keep this tab open. or <a href="#" id="signout">signout</a></small>
					<hr>
					<h6><a href="#" id="history">see your ping history</a> or <a href="#" id="ping">make a ping</a></h6><br/>
					<h5>Online Team Members</h5>
					<div id="onlinelist">

					</div>
				</div>
			</div>
		</div>
		<<!-- div class="col-md-3" style="border: 1px solid red;">
			Messages panel
		</div> -->
	</div>
</div>

<?php
include 'templates/footer.php';
?>