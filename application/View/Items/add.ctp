<?php echo $this->Form->create('Item'); ?>
    <fieldset>
        <h2><?php echo __('Novo Item'); ?></h2>
        <hr>
        <div class="form-group">
            <label for="ItemDescription">Descrição</label>
            <input type="text" class="form-control" id="ItemDescription" name="data[Item][description]" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </fieldset>
<?php echo $this->Form->end(); ?>
<br>
<?php echo $this->Html->link('&larr; Voltar para a listagem', array('action' => 'index'), array('escape' => false)); ?>
