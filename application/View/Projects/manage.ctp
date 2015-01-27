<h2><?php echo $project['title']; ?></h2>
<hr>
<input type="hidden" value="<?php echo $project['id']; ?>" id="projectId">
<?php foreach ($auditingTemplate['Stage'] as $stage): ?>
<div>
	<h3><?php echo $stage['name']; ?></h3>
</div>
<table class="table table-hover table-responsive table-bordered">
	<thead>
		<tr>
			<th>Item			
			<th>Status			
		</tr>
	</thead>
	<tbody>		
		<?php foreach ($stage['Checklist'] as $checklist): ?>
			<tr class="active">
				<td colspan="2"><h5><?php echo $checklist['name']; ?></h5></td>
			</tr>
		    <?php foreach ($checklist['Item'] as $item): ?>
		    <tr>
		    	<td width="100%"><?php echo $item['description']; ?></td>
		    	<td class="text-center">
		    		<?php foreach ($item['AuditingItem'] as $auditingItem) :?>		    					    			
		    			<?php if ($auditingItem['Auditing']['project_id'] === $project['id']) : ?>
		    				<?php $status = $auditingItem['status']; break;?>
		    			<?php endif; ?>		    			
		    		<?php endforeach; ?>
		    		<input type="checkbox" class="form-control item" name="data[AuditingsItems][Item][]" 
		    			   value="<?php echo $item['id'] ?>" <?php echo $status ? 'checked' : ''; ?>>
		    		<div class="three-quarters hide"></div>
		    	</td>
		    </tr>
		    <?php endforeach;?>		
		<?php endforeach;?>		
	</tbody>
</table>		
<?php endforeach;?>
<?php echo $this->Html->script('item'); ?>
<script>
var items = document.querySelectorAll(".item");
var projectId = document.querySelector("#projectId").value;
var item = null;

for (var i = 0; i < items.length; i++) {	
	item = new Item({
		id: items[i].value,
		element: items[i],
		projectId: projectId
	});	
}
</script>