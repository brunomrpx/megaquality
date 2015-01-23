<h2>Gerenciamento da Qualidade</h2>
<?php echo $this->Form->create(); ?>
<div class="form-group">
    <label>Projeto</label>
    <input type="text" class="form-control" disabled value="<?php echo $project['name']; ?>">
</div>
<div class="form-group">
    <label>Template</label>
    <?php echo $this->Form->select('Template',
                                   $templates,
                                   array('class' => 'form-control',
                                         'empty' => '-Selecione-')); ?>
</div>
<div class="form-group">
   <input type="submit" class="btn btn-primary" value="Gerenciar"> 
</div>
<?php echo $this->Form->end(); ?>
