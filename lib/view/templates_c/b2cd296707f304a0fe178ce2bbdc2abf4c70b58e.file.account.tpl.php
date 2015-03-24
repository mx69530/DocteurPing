<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-24 16:50:20
         compiled from "lib\view\templates\account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25551551187bc2ae960-89494356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2cd296707f304a0fe178ce2bbdc2abf4c70b58e' => 
    array (
      0 => 'lib\\view\\templates\\account.tpl',
      1 => 1427193655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25551551187bc2ae960-89494356',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nom' => 0,
    'prenom' => 0,
    'mail' => 0,
    'login' => 0,
    'pass' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551187bc30e414_29129949',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551187bc30e414_29129949')) {function content_551187bc30e414_29129949($_smarty_tpl) {?><form class="formBDD" method="post" action="index.php?current=account&action=upDate">
  <fieldset>
	<legend>Informations personnels</legend>
	   <label for="nom">Nom :</label>
	   <input type="text" name="nom" id="nom" value="<?php echo $_smarty_tpl->tpl_vars['nom']->value;?>
" />
	   <br />
	   <label for="prenom">Prénom :</label>
	   <input type="text" name="prenom" id="prenom" value="<?php echo $_smarty_tpl->tpl_vars['prenom']->value;?>
"/>
	   <br />
	   <label for="mail">Adresse mail :</label>
	   <input type="text" name="mail" id="mail" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
"/>
	   <br />
  </fieldset>
  
  <fieldset>
	<legend>Compte</legend>    
	   <label for="pseudo">Pseudo :</label>
	   <input type="text" name="pseudo" id="pseudo"  value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
" disabled="disabled" />
	   <br />
	   <label for="pass">Mot de passe :</label>
	   <input type="password" name="pass" id="pass" value="<?php echo $_smarty_tpl->tpl_vars['pass']->value;?>
"/>
  </fieldset>
  <input type="submit" value="Valider" />
</form>
<?php }} ?>
