<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 23:17:28
         compiled from "lib\view\templates\consultation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126305526ec68990eb6-77518058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8544b9b5dac66fdad03bcde540faae1fe94deaff' => 
    array (
      0 => 'lib\\view\\templates\\consultation.tpl',
      1 => 1428581082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126305526ec68990eb6-77518058',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'keywords' => 0,
    'meridians' => 0,
    'pathologies' => 0,
    'features' => 0,
    'results' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5526ec68a22e38_49571103',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5526ec68a22e38_49571103')) {function content_5526ec68a22e38_49571103($_smarty_tpl) {?><h1>.</h1>
<h2>Rechercher une pathologie</h2>
<form action="index.php?current=consultation&process=search" method="POST">
	<!-- ZONE MOTS CLEF -->
	<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>

	<!---->
	<!-- ZONE MERIDIEN -->
	<h3>Méridiens :</h3>
	<div class="groupBox">
	<?php echo $_smarty_tpl->tpl_vars['meridians']->value;?>

	<!---->
	</div>
	
	<!-- ZONE PATHOLOGIE -->
	<h3>Type de pathologie :</h3>
	<div class="groupBox">
	<?php echo $_smarty_tpl->tpl_vars['pathologies']->value;?>
			
	<!---->
	</div>
	
	<!-- ZONE Caractéristiques -->
	<h3>Caractéristiques :</h3>
	<div class="groupBox">
	<?php echo $_smarty_tpl->tpl_vars['features']->value;?>

	<!---->
	</div>

	<input type="submit" value="Rechercher">
</form>
<form action="index.php?current=consultation&process=clear" method="POST">
	<input type="submit" value="RAZ">
</form>
	
	
	<!-- GESTION DES RESULTATS -->
	<?php echo $_smarty_tpl->tpl_vars['results']->value;?>

	<!---->

<?php }} ?>
