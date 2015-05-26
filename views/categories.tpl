<div id="produit_conteneur">
	<div id="left">
		<p id="title_genre">Genre</p>		
		{foreach from=$categ key=cle item=valeur}
		<a href="index.php?tab={$smarty.get.tab}&categ={$valeur.designation|formatTab}"><p class="descateg{if $valeur.designation|formatTab eq $smarty.get.categ} active{/if}">{$valeur.designation} <span style="font-size:13px"></span></p></a>
		{/foreach}
	</div><!--
	--><div id="center">
		<form method="POST" action="index.php?tab={$smarty.get.tab}&categ={$smarty.get.categ}">
			<input type="text" name="research" id="research_barre" placeholder="Rechercher" /><!--
			--><input type="submit" value="" id="research_bouton" />
		</form>
		{if isset($smarty.post.research)}
		<h2 class="recherche_h2">Résultat{$pl} de la recherche pour « {$smarty.post.research} » : {$total} résultat{$pl}.</h2>
		<div id="recherche">
			{if $total eq 0}
			<p style="font-size:19px;font-style:italic;">Désolé, il n'y a aucun résultat associé à votre recherche.</p>
			{else}
				{foreach from=$rech key=cle item=element}
				<a href="index.php?tab={$smarty.get.tab}&categ={$smarty.get.categ}&id={$element.id_objet}" title="Voir l'annonce."><h3>{$element.designation}</h3>
					<p>{$element.description|couper_rech}</p>
				</a>
				{/foreach}
			{/if}
		</div>
		{else}
		<div id="product_contain"><!--
		{foreach from=$objets key=cle item=valeur}
		--><div class="obj{if $valeur.id_objet eq $smarty.get.id} select{/if}">
			<a href="index.php?tab={$smarty.get.tab}&categ={$smarty.get.categ}&id={$valeur.id_objet}">
			{if $smarty.get.tab eq 'musique'}
				<img src="img/{$valeur.photo}" width="150px" height="150px;" />
			{else}
				<img src="img/{$valeur.photo}" width="150px" height="210px;" />
			{/if}
			</a>
			<p class="title">{$valeur.designation|couper_partie}</p>
			<p class="price">{$valeur.prix_achat|formaterPrix} / {$valeur.prix_location|formaterPrix}</p>
		</div><!--
		{/foreach}
		-->{if empty($objets)}<p class="abs">Désolé, il n'y a pas encore d'article dans cette catégorie</p>
		{/if}
	</div>
	{/if}
	</div><!--
	--><div id="right">
		<div id="top">
		{if empty($objets) && !isset($lobjet)}
			<img src="img/pro.png" class="proch">
		{else}
			{if $smarty.get.tab eq 'film'}
			<img src="img/{$lobjet.photo}" width="70" height="100" />
			{elseif $smarty.get.tab eq 'musique'}
			<img src="img/{$lobjet.photo}" width="70" height="70" />
			{elseif $smarty.get.tab eq 'livre'}
			<img src="img/{$lobjet.photo}" width="70" height="100" />
			{/if}
			<h4>{$lobjet.designation}</h4>
			<p>{$lobjet.description}</p>
			<form method="POST" action="index.php?tab={$smarty.get.tab}&categ={$smarty.get.categ}&id={$lobjet.id_objet}">
				<input type="hidden" name="achat" value="{$lobjet.prix_achat}" />
				<input type="hidden" name="id_produit" value="id={$lobjet.id_objet}" />
				<input type="hidden" name="type" value="achat" />
				<input type="hidden" name="categorie" value="{$lobjet.categorie}" />
				<input type="submit" value="Acheter {$lobjet.prix_achat|formaterPrix}" id="button_achat" />
			</form>
			<form method="POST" action="index.php?tab={$smarty.get.tab}&categ={$smarty.get.categ}&id={$lobjet.id_objet}">
				<input type="hidden" name="location" value="{$lobjet.prix_location}" />
				<input type="hidden" name="id_produit" value="id={$lobjet.id_objet}" />
				<input type="hidden" name="type" value="location" />
				<input type="hidden" name="categorie" value="{$lobjet.categorie}" />
				<input type="submit" value="Location {$lobjet.prix_location|formaterPrix}" id="button_location" />
			</form>
		{/if}
		
		</div>
		<div id="bottom">
			<h3>Nouveautés</h3>
		{foreach from=$news item=valeur}
			<div class="obj select">
				<a href="index.php?tab={$smarty.get.tab}&categ={$smarty.get.categ}&id={$valeur.id_objet}">
				{if $smarty.get.tab eq 'musique'}
					<img src="img/{$valeur.photo}" width="130px" height="130px" />
				{else $smarty.get.tab eq 'livre'}
					<img src="img/{$valeur.photo}" width="130px" height="190px" />
				{/if}
				</a>
				<p class="title">{$valeur.designation|couper_part}</p>
				<p class="price">{$valeur.prix_achat|formaterPrix} / {$valeur.prix_location|formaterPrix}</p>
			</div>
		{/foreach}
		</div>
	</div>
</div>