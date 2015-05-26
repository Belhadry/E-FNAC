<?php /* Smarty version Smarty-3.1.18, created on 2015-05-23 15:58:14
         compiled from "views\categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10442556087764eebf7-78233534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8e04e67f4652dfd38e3715be1eca7565fb7aca1' => 
    array (
      0 => 'views\\categories.tpl',
      1 => 1432202464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10442556087764eebf7-78233534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categ' => 0,
    'valeur' => 0,
    'pl' => 0,
    'total' => 0,
    'rech' => 0,
    'element' => 0,
    'objets' => 0,
    'lobjet' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556087774c2642_20127398',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556087774c2642_20127398')) {function content_556087774c2642_20127398($_smarty_tpl) {?><div id="produit_conteneur">
	<div id="left">
		<p id="title_genre">Genre</p>		
		<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categ']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['valeur']->key;
?>
		<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['valeur']->value['designation']);?>
"><p class="descateg<?php if (smarty_modifier_formatTab($_smarty_tpl->tpl_vars['valeur']->value['designation'])==$_GET['categ']) {?> active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['valeur']->value['designation'];?>
 <span style="font-size:13px"></span></p></a>
		<?php } ?>
	</div><!--
	--><div id="center">
		<form method="POST" action="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
">
			<input type="text" name="research" id="research_barre" placeholder="Rechercher" /><!--
			--><input type="submit" value="" id="research_bouton" />
		</form>
		<?php if (isset($_POST['research'])) {?>
		<h2 class="recherche_h2">Résultat<?php echo $_smarty_tpl->tpl_vars['pl']->value;?>
 de la recherche pour « <?php echo $_POST['research'];?>
 » : <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 résultat<?php echo $_smarty_tpl->tpl_vars['pl']->value;?>
.</h2>
		<div id="recherche">
			<?php if ($_smarty_tpl->tpl_vars['total']->value==0) {?>
			<p style="font-size:19px;font-style:italic;">Désolé, il n'y a aucun résultat associé à votre recherche.</p>
			<?php } else { ?>
				<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rech']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['element']->key;
?>
				<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['element']->value['id_objet'];?>
" title="Voir l'annonce."><h3><?php echo $_smarty_tpl->tpl_vars['element']->value['designation'];?>
</h3>
					<p><?php echo smarty_modifier_couper_rech($_smarty_tpl->tpl_vars['element']->value['description']);?>
</p>
				</a>
				<?php } ?>
			<?php }?>
		</div>
		<?php } else { ?>
		<div id="product_contain"><!--
		<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['objets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['valeur']->key;
?>
		--><div class="obj<?php if ($_smarty_tpl->tpl_vars['valeur']->value['id_objet']==$_GET['id']) {?> select<?php }?>">
			<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['valeur']->value['id_objet'];?>
">
			<?php if ($_GET['tab']=='musique') {?>
				<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="150px" height="150px;" />
			<?php } else { ?>
				<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="150px" height="210px;" />
			<?php }?>
			</a>
			<p class="title"><?php echo smarty_modifier_couper_partie($_smarty_tpl->tpl_vars['valeur']->value['designation']);?>
</p>
			<p class="price"><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_achat']);?>
 / <?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_location']);?>
</p>
		</div><!--
		<?php } ?>
		--><?php if (empty($_smarty_tpl->tpl_vars['objets']->value)) {?><p class="abs">Désolé, il n'y a pas encore d'article dans cette catégorie</p>
		<?php }?>
	</div>
	<?php }?>
	</div><!--
	--><div id="right">
		<div id="top">
		<?php if (empty($_smarty_tpl->tpl_vars['objets']->value)&&!isset($_smarty_tpl->tpl_vars['lobjet']->value)) {?>
			<img src="img/pro.png" class="proch">
		<?php } else { ?>
			<?php if ($_GET['tab']=='film') {?>
			<img src="img/<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['photo'];?>
" width="70" height="100" />
			<?php } elseif ($_GET['tab']=='musique') {?>
			<img src="img/<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['photo'];?>
" width="70" height="70" />
			<?php } elseif ($_GET['tab']=='livre') {?>
			<img src="img/<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['photo'];?>
" width="70" height="100" />
			<?php }?>
			<h4><?php echo $_smarty_tpl->tpl_vars['lobjet']->value['designation'];?>
</h4>
			<p><?php echo $_smarty_tpl->tpl_vars['lobjet']->value['description'];?>
</p>
			<form method="POST" action="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['id_objet'];?>
">
				<input type="hidden" name="achat" value="<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['prix_achat'];?>
" />
				<input type="hidden" name="id_produit" value="id=<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['id_objet'];?>
" />
				<input type="hidden" name="type" value="achat" />
				<input type="hidden" name="categorie" value="<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['categorie'];?>
" />
				<input type="submit" value="Acheter <?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['lobjet']->value['prix_achat']);?>
" id="button_achat" />
			</form>
			<form method="POST" action="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['id_objet'];?>
">
				<input type="hidden" name="location" value="<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['prix_location'];?>
" />
				<input type="hidden" name="id_produit" value="id=<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['id_objet'];?>
" />
				<input type="hidden" name="type" value="location" />
				<input type="hidden" name="categorie" value="<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['categorie'];?>
" />
				<input type="submit" value="Location <?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['lobjet']->value['prix_location']);?>
" id="button_location" />
			</form>
		<?php }?>
		
		</div>
		<div id="bottom">
			<h3>Nouveautés</h3>
		<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
?>
			<div class="obj select">
				<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['valeur']->value['id_objet'];?>
">
				<?php if ($_GET['tab']=='musique') {?>
					<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="130px" height="130px" />
				<?php } else { ?>
					<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="130px" height="190px" />
				<?php }?>
				</a>
				<p class="title"><?php echo smarty_modifier_couper_part($_smarty_tpl->tpl_vars['valeur']->value['designation']);?>
</p>
				<p class="price"><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_achat']);?>
 / <?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_location']);?>
</p>
			</div>
		<?php } ?>
		</div>
	</div>
</div><?php }} ?>
