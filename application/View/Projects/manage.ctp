<?php echo $this->Form->create(); ?>
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
		    	<td>
		    		<input type="checkbox" class="form-control" name="data[AuditingsItems][Item][]" value="<?php echo $item['id'] ?>">
		    	</td>
		    </tr>
		    <?php endforeach;?>		
		<?php endforeach;?>		
	</tbody>
</table>		
<?php endforeach;?>
<input type="submit" class="btn btn-primary" value="Salvar">
<?php echo $this->Form->end(); ?>