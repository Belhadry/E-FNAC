<?php /* Smarty version Smarty-3.1.18, created on 2015-05-23 15:58:45
         compiled from "views\panier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70635560879597b555-30184997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce2770abe3182f7fb87d625e859211dbd947439b' => 
    array (
      0 => 'views\\panier.tpl',
      1 => 1429712610,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70635560879597b555-30184997',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'liste' => 0,
    'valeur' => 0,
    'montant' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55608795d08260_03604848',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55608795d08260_03604848')) {function content_55608795d08260_03604848($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\\wamp\\www\\E-FNAC\\smarty\\plugins\\modifier.capitalize.php';
?><div id="conteneur_panier">
	<form method="POST" action="index.php?tab=panier">
		<table cellspacing="0" cellpadding="0" border="1">
			<?php if ($_smarty_tpl->tpl_vars['liste']->value==null) {?>
				<tr>
					<td colspan="4" style="height:200px">Votre panier est vide</td>
				</tr>
			<?php } else { ?>
			<thead>
				<tr>
					<td>Article</td>
					<td width="150">Catégorie</td>
					<td width="150">Type</td>
					<!--<td width="150">Montant</td>-->
					<td width="150">Prix</td>
				</tr>
			</thead>
			<tbody>
			
				<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['liste']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['valeur']->key;
?>
				<tr>
					<td style="text-align:left;">
						<div class="cadreout">
							<div class="cadre2">
								<a id="modifier" href="article.php?id_mod=3">
									<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
">
								</a>
							</div>
						</div>
						<p><?php echo $_smarty_tpl->tpl_vars['valeur']->value['designation'];?>
</p>
					</td>
					<td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['valeur']->value['categorie']);?>
</td>
					<td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['valeur']->value['type']);?>
</td>
					<!--<td><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['montant']);?>
</td>-->
					<td><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix']);?>
</td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2"></td>
					<td>TOTAL:</td>
					<td><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['montant']->value);?>
</td>
				</tr>
			</tfoot>
			<?php }?>
		</table>
		<?php if ($_smarty_tpl->tpl_vars['liste']->value!=null) {?>
		<input type="submit" value="Passer la commande" name="commander" style="margin: 10px 0;"/>
		<?php } else { ?>
		<span style="margin:5px;"></span>
		<?php }?>
	</form>
</div><?php }} ?>
