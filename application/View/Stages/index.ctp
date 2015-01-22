<h2><?php echo __('Stages'); ?></h2>
<table class="table table-striped table-hover table-responsive">
    <thead>
    <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($stages as $stage): ?>
            <tr>
                <td><?php echo h($stage['Stage']['id']); ?>&nbsp;</td>
                <td><?php echo h($stage['Stage']['name']); ?>&nbsp;</td>
               <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Opções <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          <li>
                              <?php echo $this->Html->link(__('Visualizar'),
                                                           array('action' => 'view', $stage['Stage']['id']),
                                                           array('class' => '', 'tag' => 'li')); ?>
                          </li>
                          <li>
                              <?php echo $this->Html->link(__('Editar'), array('action' => 'edit',
                                                           $stage['Stage']['id'])); ?>

                          </li>
                          <li>
                              <?php echo $this->Form->postLink(__('Deletar'),
                                                               array('action' => 'delete', $stage['Stage']['id']),
                                                               array(),
                                                               __('Deseja deletar o item # %s?', $stage['Stage']['id'])); ?>

                          </li>
                      </ul>
                    </div>
                </td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->element('pagination'); ?>
