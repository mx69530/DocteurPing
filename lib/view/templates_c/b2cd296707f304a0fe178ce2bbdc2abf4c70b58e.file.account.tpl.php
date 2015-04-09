<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 23:25:39
         compiled from "lib\view\templates\account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:226595526ee53212277-81241288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2cd296707f304a0fe178ce2bbdc2abf4c70b58e' => 
    array (
      0 => 'lib\\view\\templates\\account.tpl',
      1 => 1428421052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226595526ee53212277-81241288',
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
  'unifunc' => 'content_5526ee532a9974_98367977',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5526ee532a9974_98367977')) {function content_5526ee532a9974_98367977($_smarty_tpl) {?><form class="formBDD" method="post" action="index.php?current=account&action=upDate">
  <fieldset>
	<legend>Informations personnels</legend>
	   <label for="nom">Nom :</label>
	   <input type="text" name="nom" id="nom" value="<?php echo $_smarty_tpl->tpl_vars['nom']->value;?>
" />
	   <br/>
	   <label for="prenom">Prenom :</label>
	   <input type="text" name="prenom" id="prenom" value="<?php echo $_smarty_tpl->tpl_vars['prenom']->value;?>
"/>
	   <br/>
	   <label for="mail">Adresse mail :</label>
	   <input type="text" name="mail" id="mail" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
"/>
	   <br/>
  </fieldset>
  
  <fieldset>
	<legend>Compte</legend>    
	   <label for="pseudo">Pseudo :</label>
	   <input type="text" name="pseudo" id="pseudo"  value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
" disabled="disabled" />
	   <br>
	   <label for="pass">Mot de passe :</label>
	   <input type="password" name="pass" id="pass" value="<?php echo $_smarty_tpl->tpl_vars['pass']->value;?>
"/>
  </fieldset>
  <input type="submit" value="Valider" />
</form>
<?php }} ?>
