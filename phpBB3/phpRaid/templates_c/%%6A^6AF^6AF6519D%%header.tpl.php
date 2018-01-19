<?php /* Smarty version 2.6.26, created on 2017-10-18 11:04:24
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'menu', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/header.tpl', 30, false),)), $this); ?>
<!-- header.tpl -->
<!DOCTYPE html>
<html lang="fr">
	<head>
		
		<meta charset="iso-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>phpRaider</title>
				
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/framework/jquery-ui/jquery-ui.min.css"> -->
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/framework/material-icon/material-icon.css">
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/framework/boostrap/css/bootstrap.min.css"> -->
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/framework/pickadate/lib/compressed/themes/default.css"> -->
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/framework/pickadate/lib/compressed/themes/default.date.css"> -->

		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/framework/materialize/css/materialize.min.css">	
	
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/style/custom-phpraider.min.css"> -->
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/style/custom-wow.min.css"> -->

		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/style/custom-materialize.css">
					
		<?php echo $this->_tpl_vars['javascript']; ?>


	</head>
	<body class="theme--wow glass-header">	
	
	<?php echo smarty_function_menu(array('data' => $this->_tpl_vars['menu']), $this);?>