<h2><?php echo __('Checklists'); ?></h2>
<hr>
<?php echo $this->Html->link(__('Novo Checklist'), array('action' => 'add'), array('class' => 'btn btn-primary btn-right')); ?>
<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($checklists as $checklist): ?>
            <tr>
                <td><?php echo h($checklist['Checklist']['id']); ?>&nbsp;</td>
                <td><?php echo h($checklist['Checklist']['name']); ?>&nbsp;</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Opções <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li>
                                <?php echo $this->Html->link(__('Visualizar'),
                                                                              array('action' => 'view', $checklist['Checklist']['id']),
                                                                              array('class' => '', 'tag' => 'li')); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit',
                                $checklist['Checklist']['id'])); ?>
                            </li>
                            <li>
                                <?php echo $this->Form->postLink(__('Deletar'),
                                                                                     array('action' => 'delete', $checklist['Checklist']['id']),
                                                                                     array(),
                                                                                     __('Deseja deletar o Checklist # %s?', $checklist['Checklist']['id'])); ?>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="text-center">
    <ul class="pagination">
        <?php
            echo $this->Paginator->prev('&laquo;',
                                        array('tag' => 'li',
                                              'title' => __('Previous page'),
                                              'disabledTag' => 'span',
                                              'escape' => false),
                                        null,
                                        array('tag' => 'li',
                                              'disabledTag' => 'span',
                                              'escape' => false,
                                              'class' => 'disabled'));

            echo $this->Paginator->numbers(array('separator' => false,
                                                 'tag' => 'li',
                                                 'currentTag' => 'span',
                                                 'currentClass' => 'active'));

            echo $this->Paginator->next('&raquo;',
                                        array('tag' => 'li',
                                              'disabledTag' => 'span',
                                              'title' => __('Next page'),
                                              'escape' => false),
                                         null,
                                         array('tag' => 'li',
                                               'disabledTag' => 'span',
                                               'escape' => false,
                                               'class' => 'disabled'));
        ?>
    </ul>
</div>
