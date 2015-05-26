<div id="client_conteneur">
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
</div>