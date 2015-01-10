<div class="checklists view">
<h2><?php echo __('Checklist'); ?></h2>
<hr>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($checklist['Checklist']['id']); ?>
            <br>
            <br>
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($checklist['Checklist']['name']); ?>
            <br>
            <br>
        </dd>
        <dt><?php echo __('Itens'); ?></dt>
        <dd>
            <ul>
                <?php foreach ($checklist['Item'] as $item): ?>
                    <li><?php echo $item['description']; ?></li>
                <?php endforeach ?>
            </ul>
        </dd>
    </dl>
</div>
<?php echo $this->Html->link('Editar', array('action' => 'edit', $checklist['Checklist']['id']), array('class' => 'btn btn-primary')); ?>

<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $checklist['Checklist']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $checklist['Checklist']['id'])); ?>

<br>
<br>
<?php echo $this->Html->link('&larr; Voltar para a listagem', array('action' => 'index'), array('escape' => false)); ?>
