<h1><?php echo lang('Auth.index_heading'); ?></h1>
<?php breadcrumb() ?>
<caption>
	<?php echo lang('Auth.index_subheading'); ?>
</caption>
<div class="table-responsive  mt-2 ">
	<table class="table table-hover mb-0">
		<thead class="">
			<tr>
				<th><?php echo lang('Auth.index_fname_th'); ?></th>
				<th><?php echo lang('Auth.index_lname_th'); ?></th>
				<th><?php echo lang('Auth.index_email_th'); ?></th>
				<th><?php echo lang('Auth.index_groups_th'); ?></th>
				<th><?php echo lang('Auth.index_status_th'); ?></th>
				<th><?php echo lang('Auth.index_action_th'); ?></th>
			</tr>
		</thead>
		<tbody class="">
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
					<td><?php echo ($user->active) ? anchor('auth/deactivate/' . $user->id, lang('Auth.index_active_link')) : anchor("auth/activate/" . $user->id, lang('Auth.index_inactive_link')); ?></td>
					<!-- <td><?php echo anchor('auth/edit_user/' . $user->id, lang('Auth.index_edit_link')); ?> <a href=""> <?= icon('pencil-square') ?></a> </td> -->
					<td> <button class="btn btn-sm btn-dark rounded-0" onclick="editUser('<?= base_url('auth/edit_user/' . $user->id); ?>')"> <?= icon('pencil-square') ?></button> </td>
				</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>

<p><?php echo anchor('auth/create_user', lang('Auth.index_create_user_link')) ?> | <?php echo anchor('auth/create_group', lang('Auth.index_create_group_link')) ?></p>