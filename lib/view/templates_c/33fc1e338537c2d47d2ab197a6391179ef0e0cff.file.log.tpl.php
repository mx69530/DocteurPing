<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-08 18:50:57
         compiled from "lib\view\templates\log.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1150455255c717eb7d5-70482942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33fc1e338537c2d47d2ab197a6391179ef0e0cff' => 
    array (
      0 => 'lib\\view\\templates\\log.tpl',
      1 => 1428511840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1150455255c717eb7d5-70482942',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55255c717ef656_80246370',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55255c717ef656_80246370')) {function content_55255c717ef656_80246370($_smarty_tpl) {?><div id='loginPage'> 
	<form name="loginForm" class="formBDD" method="post" onsubmit="return validateForm()" action="index.php?current=logamp;process=login">
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