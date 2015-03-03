<?php echo $this->Html->link(
    'Inserir',
    array('action' => 'insert'),
    array('class' => 'btn btn-primary btn-right')
) ?>
<h2>Templates</h2>
<hr>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php foreach($templates as $key => $template): ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="<?php printf('heading%s', $key); ?>">
      <h3 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="<?php printf('#collapse%s', $key); ?>" aria-expanded="true" aria-controls="<?php printf('heading%s', $key); ?>">
            <?php echo $template['AuditingTemplate']['name']; ?>
        </a>
      </h3>      
      <?php echo $this->Html->link('Editar', array('action' => 'edit', $template['AuditingTemplate']['id']), array('class' => 'btn btn-primary')) ?>
      <?php echo $this->Html->link('Excluir', array('action' => 'delete', $template['AuditingTemplate']['id']), array('class' => 'btn btn-danger'), __('Deseja deletar o template # %s?', $template['AuditingTemplate']['id'])) ?>
    </div>
    <div id="<?php printf('collapse%s', $key); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php printf('heading%s', $key); ?>">
      <div class="panel-body">
        <?php foreach ($template['Stage'] as $stage): ?>
            <div>
                <strong><?php echo $stage['name']; ?></strong>
            </div>
            <?php foreach ($stage['Checklist'] as $checklist): ?>
                <div><?php echo $checklist['name']; ?></div>
                <ul>
                <?php foreach ($checklist['Item'] as $item): ?>
                    <li><?php echo $item['description']; ?></li>
                <?php endforeach;?>
                </ul>
            <?php endforeach;?>
        <?php endforeach;?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
