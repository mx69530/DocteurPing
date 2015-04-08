<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-08 18:50:57
         compiled from "lib\view\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1259555255c7175edb5-69644218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b4351321d934b0f71d43d4de1888332f3af3f7a' => 
    array (
      0 => 'lib\\view\\templates\\header.tpl',
      1 => 1428511840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1259555255c7175edb5-69644218',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'compte' => 0,
    'connexion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55255c717dbdc8_23530117',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55255c717dbdc8_23530117')) {function content_55255c717dbdc8_23530117($_smarty_tpl) {?><header>
	<span class="titre">DocteurPing</span>
	<nav>
	  <ul>
		<li>
		   <a href="index.php?current=log">Accueil</a>
		</li>
		<li>
			<a href="index.php?current=consultation">Recherche</a>
		</li>
			<?php echo $_smarty_tpl->tpl_vars['compte']->value;?>

		<li>
			<a href="index.php?current=fluxRSS">Flux RSS</a>
		</li>
		<li>
			<?php echo $_smarty_tpl->tpl_vars['connexion']->value;?>

		</li>
		
	  </ul>
	</nav>
</header>
<?php }} ?>
