<div class="stages view">
<h2><?php echo __('Stage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stage'), array('action' => 'edit', $stage['Stage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stage'), array('action' => 'delete', $stage['Stage']['id']), array(), __('Are you sure you want to delete # %s?', $stage['Stage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditings'), array('controller' => 'auditings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auditing'), array('controller' => 'auditings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Checklists'), array('controller' => 'checklists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Checklist'), array('controller' => 'checklists', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Auditings'); ?></h3>
	<?php if (!empty($stage['Auditing'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stage['Auditing'] as $auditing): ?>
		<tr>
			<td><?php echo $auditing['id']; ?></td>
			<td><?php echo $auditing['name']; ?></td>
			<td><?php echo $auditing['project_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'auditings', 'action' => 'view', $auditing['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'auditings', 'action' => 'edit', $auditing['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'auditings', 'action' => 'delete', $auditing['id']), array(), __('Are you sure you want to delete # %s?', $auditing['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Auditing'), array('controller' => 'auditings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Checklists'); ?></h3>
	<?php if (!empty($stage['Checklist'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stage['Checklist'] as $checklist): ?>
		<tr>
			<td><?php echo $checklist['id']; ?></td>
			<td><?php echo $checklist['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'checklists', 'action' => 'view', $checklist['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'checklists', 'action' => 'edit', $checklist['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'checklists', 'action' => 'delete', $checklist['id']), array(), __('Are you sure you want to delete # %s?', $checklist['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Checklist'), array('controller' => 'checklists', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
