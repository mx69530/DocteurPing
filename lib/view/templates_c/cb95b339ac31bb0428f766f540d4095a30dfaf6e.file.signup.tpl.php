<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-08 20:18:37
         compiled from "lib\view\templates\signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19493552570fd406c54-48919633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb95b339ac31bb0428f766f540d4095a30dfaf6e' => 
    array (
      0 => 'lib\\view\\templates\\signup.tpl',
      1 => 1428511840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19493552570fd406c54-48919633',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552570fd42dd50_23608410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552570fd42dd50_23608410')) {function content_552570fd42dd50_23608410($_smarty_tpl) {?><div class="error">
	<?php echo $_smarty_tpl->tpl_vars['errors']->value;?>

</div>
<form class="formBDD" action="index.php?current=signup&amp;process=enregistrer" method="POST">
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
