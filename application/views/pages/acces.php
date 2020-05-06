<div class="w3-container">
			<h3>Accesos al taller</h3>

			<table class="w3-table">
				<tr>
					<th>Id</th>
					<th>Entrada</th>
					<th>Sortida</th>
                    <th>Motiu</th>
                    <th>Matricula</th>
				</tr>
				<?php
					foreach($acces as $acces) {
						echo "
							<tr>
                                <td> " . $acces->getId() . " </td>
								<td> " . $acces->getEntrada() . " </td>
								<td> " . $acces->getSortida() . " </td>
                                <td> " . $acces->getMotiu() . " </td>
                                <td> " . $acces->getMatricula() . " </td>
							</tr>
						";
					}
				?>
			</table>
			<a class="w3-button" href="<?php echo base_url('acces/add'); ?>">Afegir Acces</a>
		</div>
