<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-24 13:50:18
         compiled from "lib\view\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121455113fc74eb245-23597447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f4786c9bba425f945c5323c8a37b78cf4b51c7b' => 
    array (
      0 => 'lib\\view\\templates\\header.tpl',
      1 => 1427201414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121455113fc74eb245-23597447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55113fc75811f5_29660726',
  'variables' => 
  array (
    'compte' => 0,
    'connexion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55113fc75811f5_29660726')) {function content_55113fc75811f5_29660726($_smarty_tpl) {?><header>
	<span class="titre">DocteurPing</span>
	<nav>
	  <ul>
		<li>
		   <a href="index.php?current=patho">Patologies</a>
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
