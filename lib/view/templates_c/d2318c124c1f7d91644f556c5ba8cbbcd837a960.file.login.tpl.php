<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-24 13:59:21
         compiled from "lib\view\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2835855115fa9ab9b39-15630992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2318c124c1f7d91644f556c5ba8cbbcd837a960' => 
    array (
      0 => 'lib\\view\\templates\\login.tpl',
      1 => 1427193655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2835855115fa9ab9b39-15630992',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55115fa9ae9690_45888436',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55115fa9ae9690_45888436')) {function content_55115fa9ae9690_45888436($_smarty_tpl) {?><div id='loginPage'> 
	<form class="formBDD" method="post" action="index.php?current=connexion">
      <fieldset>
 		<legend>Se connecter</legend>
   		    <label for="pseudo">Pseudo :</label>
    		   <input type="text" name="pseudo" id="pseudo" />
		       <br />
		       <label for="pass">Mot de passe :</label>
		       <input type="password" name="pass" id="pass" />
			   <br />
      </fieldset>
      <input type="submit" value="Valider" />
	</form>
<a href="index.php?current=signup">S'inscrire</a>
</div>
<?php }} ?>
