<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
          echo $this->Html->meta('icon');
          echo $this->Html->css('bootstrap.min.css');
          echo $this->Html->css('bootstrap-theme.min.css');
          echo $this->Html->css('application.css');
          echo $this->fetch('meta');
          echo $this->fetch('css');
          echo $this->fetch('script');
          echo $this->Html->script('jquery-2.1.3.min.js');
          echo $this->Html->script('bootstrap.min.js');
          echo $this->Html->css('http://css-spinners.com/css/spinner/three-quarters.css');
          // Bootstrap Select
          echo $this->Html->css('http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css');
          echo $this->Html->script('http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js');
      ?>
</head>
<body>
  <div id="container">
    <div id="header" class="text-center">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid text-center">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <span class='navbar-brand'>Megaquality</span>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <!-- 
              <li><?php  echo $this->Html->link('Items', array('controller' => 'items'));?></li>
              <li><?php  echo $this->Html->link('Checklists', array('controller' => 'checklists'));?></li>
              <li><?php  echo $this->Html->link('Fases', array('controller' => 'stages'));?></li>
              -->
              <li><?php  echo $this->Html->link('Projetos', array('controller' => 'projects', 'action' => 'index')); ?></li>
              <li><?php  echo $this->Html->link('Templates', array('controller' => 'templates', 'action' => 'index')); ?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><?php echo $this->Html->link('Sair', array('controller' => 'users', 'action' => 'logout'));  ?></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div id="content" class="container">
     <?php echo $this->Session->flash(); ?>
     <?php echo $this->fetch('content'); ?>
   </div>
   <div id="footer">
   </div>
 </div>
</body>
</html>
