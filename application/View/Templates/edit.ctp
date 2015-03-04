<div class="input-group">
    <h2 class="editable-item" data-type="templates" data-id="<?php echo $auditingTemplate['AuditingTemplate']['id']; ?>"><?php echo $auditingTemplate['AuditingTemplate']['name']; ?></h2>
</div>
<hr>
<div class="edit-content">	
<?php foreach ($auditingTemplate['Stage'] as $stage): ?>
    <div class="input-group">
        <strong class="editable-item" data-type="stages" data-id="<?php echo $stage['id']; ?>"><?php echo $stage['name']; ?></strong>
    </div>
    <?php foreach ($stage['Checklist'] as $checklist): ?>
        <div class="input-group">
            <p class="editable-item" data-type="checklists" data-id="<?php echo $checklist['id']; ?>"><?php echo $checklist['name']; ?></p>
        </div>
	<ul>
	<?php foreach ($checklist['Item'] as $item): ?>
        <div class="input-group">
            <li class="editable-item" data-type="items" data-id="<?php echo $item['id']; ?>"><?php echo $item['description']; ?></li>
        </div>
	<?php endforeach;?>
	</ul>
    <?php endforeach;?>
<?php endforeach;?>
</div>
<?php echo $this->Html->link('&larr; Voltar para a listagem', array('action' => 'index'), array('escape' => false)); ?>
<?php echo $this->Html->script('editable-item'); ?>

<script>
var editableItems = document.querySelectorAll(".editable-item");
for (var i = 0; i < editableItems.length; i++) {
    new EditableItem({
        element: editableItems[i]
    });
}
</script>

