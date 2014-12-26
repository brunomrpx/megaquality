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
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">Megaquality</a>
                </div>
              </div>
            </nav>
        </div>
		<div id="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
