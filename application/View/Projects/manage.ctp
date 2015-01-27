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
		    		<input type="checkbox" class="form-control item" name="data[AuditingsItems][Item][]" value="<?php echo $item['id'] ?>" <?php echo $item['status'] == '1' ? 'checked' : ''; ?>>
		    	</td>
		    </tr>
		    <?php endforeach;?>		
		<?php endforeach;?>		
	</tbody>
</table>		
<?php endforeach;?>
<?php echo $this->Form->end(); ?>


<script>

function Item(element) {
	var id = element.value,
		status = null; 
	
	element.addEventListener('CheckboxStateChange', save);	
	
	function save() {

		console.log(element);
		status = element.checked.toString();		
		
		var url = '../../items/update_status/' + id;
		
		$.post(url,  { status: status })
		 .done(function(inserted) {
			if (inserted == "true") {
				console.log("Item atualizado com sucesso.");
			} else {
				console.log("Falha...");
			}
		 });
	}	
}

var items = document.querySelectorAll(".item");
// var item = new Item(items[0]);

for (var i = 0; i < items.length; i++) {
	new Item(items[i]);
}

</script>