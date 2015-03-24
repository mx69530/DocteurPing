<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-24 15:34:07
         compiled from "lib\view\templates\signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2394655116fd8764e48-41528225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41a797e0b1b9a087facc23fffbf3a2531e7ec7dc' => 
    array (
      0 => 'lib\\view\\templates\\signup.tpl',
      1 => 1427207642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2394655116fd8764e48-41528225',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55116fd87915f5_29354396',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55116fd87915f5_29354396')) {function content_55116fd87915f5_29354396($_smarty_tpl) {?><!DOCTYPE html>
<html lang="fr"> 
<head>
  <title>Login - Docteur Ping</title>
  <meta name="description" content="DocteurPing">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
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

</body>
</html>
<?php }} ?>
