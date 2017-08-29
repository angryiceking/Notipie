<?php
@session_start();
include "../../../system/core/Db.php";

$db = new Db();
$conn = $db->connect();

$sql = "SELECT * FROM users WHERE status = 'online'";
$result = mysqli_query($conn,$sql);
$b = array();
while($row = mysqli_fetch_array($result))
{
	// $b['username'] = $row['username'];
	$b[] = $row;
}
?>
<script type="text/javascript">
	$('.media-list').on("click", "#user_ico", function(e) {
		var id = $(this).attr('data-attr-id');
		console.log(id);
		$('#message_div_'+id).toggle(200);
	});
</script>
<?php foreach ($b as $value): ?>
	<script type="text/javascript">
		$('#message_<?php echo $value['id']?>').keyup(function (e){
			if (e.keyCode == 13) {
				console.log($(this).val());
				$.ajax({
					url: 'scripts/send_message.php',
					type: 'POST',
					data: { id: <?php echo $value['id']?>, message: $(this).val() },
					dataType: 'json',
					success: function(res) {
						console.log(res);
					},
					error: function(e){
						console.log('error');
					}
				});

				document.getElementById('message_<?php echo $value['id']?>').value = '';
			}
		});
	</script>
<?php endforeach ?>
<div class="media-list">
	<?php foreach ($b as $key): ?>
		<a href="#" id="user_ico" data-attr-id="<?php echo $key['id']?>" class="text-left">
			<div class="media" id="stlink" style="padding-left: 5px; height: 50px;">
				<div class="media-body">
					<h6 class="media-heading"><strong style="font-size: 13px;">
						<span class="badge badge-small-online"> </span>
						<img class="img img-circle" src="../../assets/img/<?php echo $key['img'] ?>" style="margin-left: 10px; width:30px; height: 30px; border-radius: 30px;">  <?php echo $key['username']; ?></strong>
					</h6>
				</div>
			</div>
		</a>
		<div class="col-md-12" style="display: none;" id="message_div_<?php echo $key['id']?>">
			<input type="text" name="message" id="message_<?php echo $key['id']?>" class="form-control pull-right" placeholder="send a ping">
		</div>
	<?php endforeach ?>
</div>