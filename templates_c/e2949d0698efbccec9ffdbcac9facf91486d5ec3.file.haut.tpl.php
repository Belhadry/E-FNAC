<?php /* Smarty version Smarty-3.1.18, created on 2015-05-23 15:58:04
         compiled from "views\haut.tpl" */ ?>
<?php /*%%SmartyHeaderCode:323205560876c7db289-76990604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2949d0698efbccec9ffdbcac9facf91486d5ec3' => 
    array (
      0 => 'views\\haut.tpl',
      1 => 1428487202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '323205560876c7db289-76990604',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5560876cb01354_15320131',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5560876cb01354_15320131')) {function content_5560876cb01354_15320131($_smarty_tpl) {?><!DOCTYPE html><!-- La balise !DOCTYPE est le premier élément censé apparaître dans le code d'une page html. c'est un indicateur qui permet au navigateur de savoir quelles règles appliquer pour la mise en page du document-->
<html> <!-- La balise <html> permet d'indiquer au navigateur web que le document auquel il accède est un document HTML. -->
    <?php echo $_smarty_tpl->getSubTemplate ("views/commun/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <body> <!-- La balise <body> fait partie des balises structurant un document HTML. Ce tag encadre le corps du document, c'est à dire les informations qui seront visibles dans le navigateur qui affichera la page -->
    	<div id="content"><!-- Conteneur du site -->
	    	<?php echo $_smarty_tpl->getSubTemplate ("views/commun/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
