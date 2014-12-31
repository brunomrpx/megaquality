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
	?>
</head>
<body>
    <div id="container">
		<div id="header" class="text-center">
            <nav class="navbar navbar-default" role="navigation">
              <div class="container-fluid text-center">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Megaquality</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                      <li><a href="#">Itens</a></li>
                      <li><a href="#">Checklists</a></li>
                      <li><a href="#">Fases</a></li>
                      <li><a href="#">Templates</a></li>
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
