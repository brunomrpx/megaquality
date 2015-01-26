<div class="container">
    <h2>Projetos</h2>    
    <hr>
    <table class="table table-striped table-hover table-responsive">
        <thead>
           <tr>
                <th>Nome</th>                
                <th>Gerenciado</th>
           </tr> 
        </thead>
        <tbody>
                
        <?php foreach($projects as $project): ?>
           <tr>
                <td>
                    <?php echo $this->Html->link($project['title'],
                                                 $project['url']); ?>
                </td>                
                <td>Não</td>
           </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

