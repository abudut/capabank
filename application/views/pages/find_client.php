<div class="w3-container">
            <h3>Clients</h3>
            <h4>Resultats de la busqueda</h4>
			<table class="w3-table">
				<tr>
					<th>DNI</th>
					<th>Nom</th>
					<th>Primer cognom</th>
					<th>Segon cognom</th>
				</tr>
				<?php
					foreach($clients as $client) {
						echo "
							<tr>
								<td> " . $client->getDNI() . " </td>
								<td> " . $client->getName() . " </td>
								<td> " . $client->getSurname1() . " </td>
								<td> " . $client->getSurname2() . " </td>
							</tr>
						";
					}
				?>
			</table>
		</div>
