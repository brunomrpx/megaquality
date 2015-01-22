<div class="stages form">
<?php echo $this->Form->create('Stage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Stage'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('Auditing');
		echo $this->Form->input('Checklist');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Stage.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Stage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Stages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Auditings'), array('controller' => 'auditings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auditing'), array('controller' => 'auditings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Checklists'), array('controller' => 'checklists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Checklist'), array('controller' => 'checklists', 'action' => 'add')); ?> </li>
	</ul>
</div>
