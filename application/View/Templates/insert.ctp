<h2>Novo Template</h2>
<?php echo $this->Form->create('Template'); ?>
<div class="form-group">
    <label>Arquivo</label>
   <?php echo $this->Form->select(
        'Name',
        $templates,
        array('class' => 'form-control',
              'empty' => '-Selecione-')); ?> 
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Inserir">
    <?php echo $this->Form->end(); ?>
</div>
<?php echo $this->Html->link('&larr; Voltar para a listagem', array('action' => 'index'), array('escape' => false)); ?>
