<?php echo $this->Form->create('Item'); ?>
    <fieldset>
        <h2>Edição</h2>
        <hr>
        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
        <div class="form-group">
            <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Item.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Item.id'))); ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
<br>
<?php echo $this->Html->link('&larr; Voltar para a listagem', array('action' => 'index'), array('escape' => false)); ?>