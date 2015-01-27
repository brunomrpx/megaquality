<h2><?php echo $auditingTemplate['AuditingTemplate']['name']; ?></h2>
<hr>
<div class="edit-content">	
	<?php foreach ($auditingTemplate['Stage'] as $stage): ?>
	    <div>
	        <strong><?php echo $stage['name']; ?></strong>	        
	    </div>
	    <?php foreach ($stage['Checklist'] as $checklist): ?>
	        <p><?php echo $checklist['name']; ?></p>
	        <ul>
	        <?php foreach ($checklist['Item'] as $item): ?>
	            <li><?php echo $item['description']; ?></li>
	        <?php endforeach;?>
	        </ul>
	    <?php endforeach;?>
	<?php endforeach;?>
</div>