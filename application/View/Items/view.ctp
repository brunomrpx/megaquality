<div class="items view">
    <h2><?php echo __('Item'); ?></h2>
    <hr>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($item['Item']['id']); ?>
            <br>
            <br>
        </dd>
        <dt><?php echo __('Description'); ?></dt>
        <dd>
            <?php echo h($item['Item']['description']); ?>
            <br>
        </dd>
    </dl>
</div>
<?php echo $this->Html->link('Editar', array('action' => 'edit', $item['Item']['id']), array('class' => 'btn btn-primary')); ?>

<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $item['Item']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>

<br>
<br>
<?php echo $this->Html->link('&larr; Voltar para a listagem', array('action' => 'index'), array('escape' => false)); ?>