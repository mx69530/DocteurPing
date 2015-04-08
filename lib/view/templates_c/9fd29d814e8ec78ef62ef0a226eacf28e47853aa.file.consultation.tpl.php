<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-08 18:51:04
         compiled from "lib\view\templates\consultation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2583855255c781e9e60-42088357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fd29d814e8ec78ef62ef0a226eacf28e47853aa' => 
    array (
      0 => 'lib\\view\\templates\\consultation.tpl',
      1 => 1428511840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2583855255c781e9e60-42088357',
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
  'unifunc' => 'content_55255c7821caf8_29187584',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55255c7821caf8_29187584')) {function content_55255c7821caf8_29187584($_smarty_tpl) {?><h1>.</h1>
<h2>Rechercher une pathologie</h2>
<form action="index.php?current=consultation&amp;process=search" method="POST">
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
<form action="index.php?current=consultation&amp;process=clear" method="POST">
	<input type="submit" value="RAZ">
</form>
	
	
	<!-- GESTION DES RESULTATS -->
	<?php echo $_smarty_tpl->tpl_vars['results']->value;?>

	<!---->

<?php }} ?>
