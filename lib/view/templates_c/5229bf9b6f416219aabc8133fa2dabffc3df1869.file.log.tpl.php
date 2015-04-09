<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 23:09:45
         compiled from "lib\view\templates\log.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25045526ea9958a530-82577311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5229bf9b6f416219aabc8133fa2dabffc3df1869' => 
    array (
      0 => 'lib\\view\\templates\\log.tpl',
      1 => 1428612988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25045526ea9958a530-82577311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorsLog' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5526ea99599c51_62714721',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5526ea99599c51_62714721')) {function content_5526ea99599c51_62714721($_smarty_tpl) {?><div class="errorCenter">
	<?php echo $_smarty_tpl->tpl_vars['errorsLog']->value;?>

</div>
<div id='loginPage'> 
	<form name="loginForm" class="formBDD" method="post" onsubmit="return validateForm()" action="index.php?current=log&process=login">
      <fieldset>
 		<legend>Se connecter</legend>
   		    <label for="pseudo">Pseudo :</label>
    		   <input id="pseudo" onclick="checkPseudo();" onchange="checkPseudo();" type="text" name="pseudo" required />
		       <br />
		       <label for="pass">Mot de passe :</label>
		       <input id="pass" onclick="checkPass();" onchange="checkPass();" type="password" name="pass" required/>
			   <br />
      </fieldset>
      <input type="submit" value="Valider" />
	</form>
</div>
<?php }} ?>
