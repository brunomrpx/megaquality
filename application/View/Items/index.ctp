<h2><?php echo __('Items'); ?></h2>
<hr>
<?php echo $this->Html->link(__('Novo Item'), array('action' => 'add'), array('class' => 'btn btn-primary btn-right')); ?>
<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo h($item['Item']['id']); ?>&nbsp;</td>
                <td><?php echo h($item['Item']['description']); ?>&nbsp;</td>
                <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Opções <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          <li>
                              <?php echo $this->Html->link(__('Visualizar'),
                                                           array('action' => 'view', $item['Item']['id']),
                                                           array('class' => '', 'tag' => 'li')); ?>
                          </li>
                          <li>
                              <?php echo $this->Html->link(__('Editar'), array('action' => 'edit',
                                                           $item['Item']['id'])); ?>

                          </li>
                          <li>
                              <?php echo $this->Form->postLink(__('Deletar'),
                                                               array('action' => 'delete', $item['Item']['id']),
                                                               array(),
                                                               __('Deseja deletar o item # %s?', $item['Item']['id'])); ?>

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
