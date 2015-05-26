<?php /* Smarty version Smarty-3.1.18, created on 2015-05-23 15:58:04
         compiled from "views\commun\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:242545560876cc69f21-08177131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05b092f859a630b0e0e419399b0474bcb7460dcc' => 
    array (
      0 => 'views\\commun\\header.tpl',
      1 => 1429794003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '242545560876cc69f21-08177131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'onglet' => 0,
    'i' => 0,
    'voirpanier' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5560876d3aae51_85288658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5560876d3aae51_85288658')) {function content_5560876d3aae51_85288658($_smarty_tpl) {?><div id="header_content">
	<div id="coolline"></div>
	<header>
		<a href="index.php"><img src="img/logo.png" alt="logo page d'accueil" id="logo" /></a>
		<nav>
		    <ul><!--
		    --><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?><!--
		    <!-- $menu est une variable smarty assignée dans le fichier data.php récupérant la variable php $navigation, upper transforme le texte en majuscule 
		    --><?php  $_smarty_tpl->tpl_vars['onglet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['onglet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['onglet']->key => $_smarty_tpl->tpl_vars['onglet']->value) {
$_smarty_tpl->tpl_vars['onglet']->_loop = true;
?><!--
		    	--><?php if (isset($_GET['tab'])) {?><!--
			    	--><?php if ($_GET['tab']==smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value)) {?><!--
			    	--><a href="index.php?tab=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
"><li class="active"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['onglet']->value, 'UTF-8');?>
</li></a><!--
			    	--><?php } else { ?><!--
			    	--><a href="index.php?tab=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
"><li><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['onglet']->value, 'UTF-8');?>
</li></a><!--
			    	--><?php }?><!--
		    	--><?php } else { ?><!--
		    		--><?php if ($_smarty_tpl->tpl_vars['onglet']->value=='Film') {?><!--
			    	--><a href="index.php?tab=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
"><li class="active"><!----><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['onglet']->value, 'UTF-8');?>
</li></a><!--
			    	--><?php } else { ?><!--
			    	--><a href="index.php?tab=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
"><li><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['onglet']->value, 'UTF-8');?>
</li></a><!--
			    	--><?php }?><!--
		    	--><?php }?><!--
				    	
		    	--><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?><!--
		    --><?php } ?><!--
		    --></ul><!--
		--></nav><!--
		--><div id="deco"><!--
			--><?php if (isset($_SESSION['id_client'])) {?><!--
		    	--><a href="index.php?tab=mon_compte&etape=deconnexion"><li><?php echo mb_strtoupper('Déconnexion', 'UTF-8');?>
</li></a><!--
		    --><?php } else { ?><!--
		    --><?php }?><!--
		--></div><!--
		--><a href="index.php?tab=panier"><?php echo $_smarty_tpl->tpl_vars['voirpanier']->value;?>
</a>
	</header>
</div><?php }} ?>
