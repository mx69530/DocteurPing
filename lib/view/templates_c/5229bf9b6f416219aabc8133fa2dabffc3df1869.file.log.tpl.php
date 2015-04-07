<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-07 16:04:00
         compiled from "lib\view\templates\log.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1534955116e06f38da2-87284465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5229bf9b6f416219aabc8133fa2dabffc3df1869' => 
    array (
      0 => 'lib\\view\\templates\\log.tpl',
      1 => 1428415428,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1534955116e06f38da2-87284465',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55116e07075c38_20580285',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55116e07075c38_20580285')) {function content_55116e07075c38_20580285($_smarty_tpl) {?><div id='loginPage'> 
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
