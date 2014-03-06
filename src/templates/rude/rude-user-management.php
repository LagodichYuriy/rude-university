<? namespace rude; ?>

<div class="box">
	<h2>Управление пользователями</h2>
</div>

<div class="user_management">
	<?
		$user_list = users::get();
	?>

	<div class="tool">
		<a href="<?= url::ajax(RUDE_TASK_AJAX_ADD_USER_FORM) ?>" class="fancybox"><img src="src/icons/add.png"></a>
		<a href="<?= url::ajax(RUDE_TASK_AJAX_ADD_USER_FORM) ?>" class="fancybox"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_USER ?></div></a>
	</div>

	<table>
		<tr>
			<th>id</th>
			<th>username</th>
			<th>hash</th>
			<th>salt</th>
			<th>role</th>
			<th>edit</th>
			<th>delete</th>
		</tr>

		<?
			foreach ($user_list as $user)
			{
			?>
				<tr>
					<td><?= $user->id ?></td>
					<td><?= $user->username ?></td>
					<td><?= $user->hash ?></td>
					<td><?= $user->salt ?></td>
					<td><?= $user->role ?></td>
					<td>
						<a href="<?= url::ajax(RUDE_TASK_AJAX_ADD_USER_FORM) ?>" class="fancybox">
							<img src="src/icons/edit.png">
						</a>
					</td>
					<td>

					</td>
				</tr>
			<?
			}
		?>
	</table>

</div>


<script>
	$(document).ready(function ()
	{
		$(".fancybox").fancybox({
			type: 'iframe',

			width: 432 + 20,
			height: 335 + 20 + 40,
			fitToView : false,
			autoSize : false
		});
	});
</script>