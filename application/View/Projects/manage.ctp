<h2>Gerenciamento da Qualidade</h2>
<div class="form-group">
    <label>Projeto</label>
    <input type="text" class="form-control" disabled value="<?php echo $project['name']; ?>">
</div>
<div class="form-group">
    <label>Template</label>
    <?php echo $this->Form->select('Template',
                                   array('1' => 'option1', '2' => 'option2'),
                                   array('class' => 'form-control',
                                         'empty' => '-Selecione-')); ?>
</div>
<div class="form-group">
   <input type="button" class="btn btn-primary" value="Gerenciar"> 
</div>
