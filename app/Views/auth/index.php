<h1><?php echo lang('Auth.index_heading'); ?></h1>
<?php breadcrumb() ?>
<caption>
	<?php echo lang('Auth.index_subheading'); ?>
</caption>
<div class="table-responsive  mt-2 ">
	<table id="tabel-user" class="table table-hover mb-0">
		<thead class="tbl-header">
			<tr>
				<th><?php echo lang('Auth.index_fname_th'); ?></th>
				<th><?php echo lang('Auth.index_lname_th'); ?></th>
				<th><?php echo lang('Auth.index_email_th'); ?></th>
				<th><?php echo lang('Auth.index_groups_th'); ?></th>
				<th><?php echo lang('Auth.index_status_th'); ?></th>
				<th><?php echo lang('Auth.index_action_th'); ?></th>
			</tr>
		</thead>
		<tbody class="tbl-content">
			<?php foreach ($users as $user) : ?>
				<tr>
					<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
					<td>
						<?php foreach ($user->groups as $group) : ?>
							<?php echo anchor('auth/edit_group/' . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?> |
						<?php endforeach ?>
					</td>

					<td id="active<?= $user->id; ?>"><?= ($user->active) ? '<button class="btn btn-sm btn-success rounded-0" onclick=modal("' . base_url('auth/deactivate/' . $user->id) . '")>' . icon('unlock-fill') . '</button>' : '<button class="btn btn-sm btn-danger rounded-0" onclick=activateUser(' . $user->id . ')>' . icon('lock-fill') . '</button>'; ?></td>
					<!-- <td><?php echo ($user->active) ? anchor('auth/deactivate/' . $user->id, lang('Auth.index_active_link')) : anchor("auth/activate/" . $user->id, lang('Auth.index_inactive_link')); ?></td> -->
					<!-- <td><?php echo anchor('auth/edit_user/' . $user->id, lang('Auth.index_edit_link')); ?> <a href=""> <?= icon('pencil-square') ?></a> </td> -->
					<td>
						<div class="btn-group">
							<button class="btn btn-sm btn-outline-success rounded-0" onclick="modal('<?= base_url('auth/edit_user/' . $user->id); ?>')"> <?= icon('pencil-square') ?></button>
							<button class="btn btn-sm btn-outline-danger rounded-0" onclick="modal('<?= base_url('auth/edit_user/' . $user->id); ?>')"> <?= icon('trash3-fill') ?></button>

						</div>
					</td>
				</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>

<p><?php echo anchor('auth/create_user', lang('Auth.index_create_user_link')) ?> | <?php echo anchor('auth/create_group', lang('Auth.index_create_group_link')) ?></p>
<script>
	$(document).ready(function() {
		$("#tabel-user").DataTable();
	});

	function deactiveUser(id, url) {
		// alert(url);
		$.ajax({
			url: url,
			data: {
				confirm: 'yes',
				id: id
			},
			type: 'POST',
			beforeSend: function(data) {
				$('#loader').show();
			},
			success: function(data) {
				location.reload(true);
			}
		})
	}

	function activateUser(id) {

		deactiveBtn = `<?= '<button class="btn btn-sm btn-success rounded-0" onclick=modal("' . base_url('auth/deactivate/' . $user->id) . '")>' . icon('unlock-fill') . '</button>' ?>`;
		$.ajax({
			url: "<?= base_url('auth/activate'); ?>/" + id,
			type: 'GET',
			beforeSend: function(data) {
				$('#loader').show();
			},
			success: function(data) {
				data = JSON.parse(data);
				// alert(data.status);
				if (data.status == 200) {
					$("#active" + id).html(deactiveBtn);
					iziToast.show({
						title: data.message,
						// message: 'What would you like to add?',
						balloon: false,
						position: 'topCenter',
						theme: "light",
						color: 'blue'
					});
				} else {
					iziToast.show({
						title: data.message,
						// message: 'What would you like to add?',
						balloon: false,
						position: 'topCenter',
						theme: "light",
						color: 'red'
					});
				}
				$('#loader').fadeOut('slow');
			}
		})
	}
</script>