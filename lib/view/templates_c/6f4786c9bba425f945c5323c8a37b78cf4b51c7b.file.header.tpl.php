<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 23:09:45
         compiled from "lib\view\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67635526ea993f26a6-35290783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f4786c9bba425f945c5323c8a37b78cf4b51c7b' => 
    array (
      0 => 'lib\\view\\templates\\header.tpl',
      1 => 1427387770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67635526ea993f26a6-35290783',
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
  'unifunc' => 'content_5526ea994f8ee1_61891509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5526ea994f8ee1_61891509')) {function content_5526ea994f8ee1_61891509($_smarty_tpl) {?><header>
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
