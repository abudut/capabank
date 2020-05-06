<div class="w3-container">
			<h3>Vehicles</h3>

			<table class="w3-table">
				<tr>
					<th>Matricula</th>
					<th>Marca</th>
					<th>Model</th>
					<th>Any de Fabricacio</th>
					<th>ClientDNI</th>
				</tr>
				<?php
					foreach($cars as $car) {
						echo "
							<tr>
								<td> " . $car->getMatricula() . " </td>
								<td> " . $car->getMarca() . " </td>
								<td> " . $car->getModel() . " </td>
								<td> " . $car->getAny() . " </td>
								<td> " . $car->getClientDni() . " </td>
							</tr>
						";
					}
				?>
			</table>
			<a class="w3-button" href="<?php echo base_url('cars/add'); ?>">Afegir un nou vehicle</a>
		</div>
