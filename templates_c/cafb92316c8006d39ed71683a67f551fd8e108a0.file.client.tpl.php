<?php /* Smarty version Smarty-3.1.18, created on 2015-05-23 15:58:05
         compiled from "views\client.tpl" */ ?>
<?php /*%%SmartyHeaderCode:274235560876d3f2f70-90070293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cafb92316c8006d39ed71683a67f551fd8e108a0' => 
    array (
      0 => 'views\\client.tpl',
      1 => 1428257236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '274235560876d3f2f70-90070293',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5560876d43f357_99578349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5560876d43f357_99578349')) {function content_5560876d43f357_99578349($_smarty_tpl) {?><div id="client_conteneur">
	<h2>VOTRE COMPTE</h2>
	<div id="client">
		<div id="ancien_utilisateur">
			<h3>DÉJÀ CLIENT ?</h3>
			<p>Identifiez-vous pour vous connecter.</p>
			<form METHOD="POST" ACTION="index.php?tab=mon_compte&etape=connexion">
				<table>
					<tbody>
						<tr>
							<td>Votre adresse E-mail</td>
							<td><input type="email" name="email"/></td>
						</tr>
						<tr>
							<td>Votre mot de passe</td>
							<td><input type="password" name="mot_de_passe"/></td>
						</tr>
					</tbody>
					<tfoot>
						<th colspan="2"><input type="submit" value="S'identifier"/></th>
					</tfoot>
				</table>
			</form>
		</div>
		<div id="nouvel_utilisateur">
			<h3>NOUVEAU CLIENT ?</h3>
			<p>Créer votre compte.</p>
			<form METHOD="POST" ACTION="index.php?tab=mon_compte&etape=inscription">
				<table>
					<tbody>
						<tr>
							<td>Votre adresse E-mail</td>
							<td><input type="email" name="email" required /></td>
						</tr>
					</tbody>
					<tfoot>
						<th colspan="2"><input type="submit" value="Créer son compte" /></th>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
</div><?php }} ?>
