<?php echo $this->Form->create('Checklist'); ?>
    <fieldset>
        <legend><?php echo __('Edit Checklist'); ?></legend>
    <?php echo $this->Form->input('id'); ?>

    <div class="form-group">
        <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->select('Itens',
                                                          $items,
                                                          array('class' => 'selectpicker',
                                                                   'name' => 'data[Item][Item]',
                                                                   'multiple' => true,
                                                                   'empty' => false,
                                                                   'data-width' => '100%',
                                                                   'data-selected-text-format' => 'count>0',
                                                                   'data-live-search' => 'true',
                                                                   'value' => $selectedItems)); ?>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <?php echo $this->Form->postLink(__('Deletar'),
                                                         array(
                                                            'action' => 'delete',
                                                            $this->Form->value('Checklist.id')),
                                                            array('class' => 'btn btn-danger'),
                                                             __('Are you sure you want to delete # %s?',
                                                              $this->Form->value('Checklist.id')
                                                            )
                                                        ); ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
<br>
<?php echo $this->Html->link('&larr; Voltar para a listagem', array('action' => 'index'), array('escape' => false)); ?>