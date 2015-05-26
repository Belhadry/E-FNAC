<div id="conteneur_panier">
	<form method="POST" action="index.php?tab=panier">
		<table cellspacing="0" cellpadding="0" border="1">
			{if $liste eq null}
				<tr>
					<td colspan="4" style="height:200px">Votre panier est vide</td>
				</tr>
			{else}
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
			
				{foreach from=$liste key=cle item=valeur}
				<tr>
					<td style="text-align:left;">
						<div class="cadreout">
							<div class="cadre2">
								<a id="modifier" href="article.php?id_mod=3">
									<img src="img/{$valeur.photo}">
								</a>
							</div>
						</div>
						<p>{$valeur.designation}</p>
					</td>
					<td>{$valeur.categorie|capitalize}</td>
					<td>{$valeur.type|capitalize}</td>
					<!--<td>{$valeur.montant|formaterPrix}</td>-->
					<td>{$valeur.prix|formaterPrix}</td>
				</tr>
				{/foreach}
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2"></td>
					<td>TOTAL:</td>
					<td>{$montant|formaterPrix}</td>
				</tr>
			</tfoot>
			{/if}
		</table>
		{if $liste neq null}
		<input type="submit" value="Passer la commande" name="commander" style="margin: 10px 0;"/>
		{else}
		<span style="margin:5px;"></span>
		{/if}
	</form>
</div>