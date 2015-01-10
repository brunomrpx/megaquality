<?php echo $this->Form->create('Checklist'); ?>
    <fieldset>
        <h2><?php echo __('Novo Checklist'); ?></h2>
        <hr>
        <div class="form-group">
            <label for="ChecklistName">Nome</label>
            <input type="text" class="form-control" id="ChecklistName" name="data[Checklist][name]" required>
        </div>
        <!-- <input name="data[Item][Item]" value="" id="ItemItem_" type="hidden"> -->
        <div class="form-group">
            <label for="ChecklistItems">Itens</label>
            <br>
            <?php echo $this->Form->select('Itens',
                                                             $items,
                                                             array('class' => 'selectpicker',
                                                                      'name' => 'data[Item][Item]',
                                                                      'multiple' => true,
                                                                      'empty' => false,
                                                                      'data-width' => '100%',
                                                                      'data-selected-text-format' => 'count>0',
                                                                      'data-live-search' => 'true')); ?>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </fieldset>
<?php echo $this->Form->end(); ?>
<br>
<?php echo $this->Html->link('&larr; Voltar para a listagem', array('action' => 'index'), array('escape' => false)); ?>
