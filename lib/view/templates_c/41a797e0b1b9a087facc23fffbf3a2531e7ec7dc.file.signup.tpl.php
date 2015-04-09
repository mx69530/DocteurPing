<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 23:29:16
         compiled from "lib\view\templates\signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:270145526ef2c9503d4-20810653%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41a797e0b1b9a087facc23fffbf3a2531e7ec7dc' => 
    array (
      0 => 'lib\\view\\templates\\signup.tpl',
      1 => 1428612543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270145526ef2c9503d4-20810653',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5526ef2c999397_46766647',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5526ef2c999397_46766647')) {function content_5526ef2c999397_46766647($_smarty_tpl) {?><div class="error">
	<?php echo $_smarty_tpl->tpl_vars['errors']->value;?>

</div>
<form class="formBDD" action="index.php?current=signup&process=enregistrer" method="POST">
  <fieldset>
	<legend>Informations personnels</legend>
	   <label for="nom">Nom :</label>
	   <input type="text" name="nom" id="nom" />
	   <br />
	   <label for="prenom">Prénom :</label>
	   <input type="text" name="prenom" id="prenom" />
	   <br />
	   <label for="mail">Adresse mail :</label>
	   <input type="email" name="mail" id="mail" required />
	   <br />
  </fieldset>
	  <!-- <label for="dob">Date de naissance :</label>
	   <input type="date" name="dob" id="dob">
	   <br />
	  -->
  <fieldset>
	<legend>Compte</legend>    
	   <label for="pseudo">Pseudo :</label>
	   <input type="text" name="pseudo" id="pseudo"  />
	   <br />
	   <label for="pass">Mot de passe :</label>
	   <input type="password" name="pass" id="pass"  />
  </fieldset>
  <input type="submit" value="Valider" />
</form>

<?php }} ?>
