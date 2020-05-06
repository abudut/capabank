<div class="w3-container">
			<h3>Operacions</h3>

			<table class="w3-table">
				<tr>
					<th>Id</th>
					<th>Accio</th>
                    <th>Descripcio</th>
                    <th>Motiu</th>
                    <th>Dia</th>
                    <th>Hora</th>
                    <th>Matricula</th>
				</tr>
				<?php
					foreach($operacions as $operacio) {
						echo "
							<tr>
								<td> " . $operacio->getId() . " </td>
								<td> " . $operacio->getAccio() . " </td>
								<td> " . $operacio->getDescripcio() . " </td>
								<td> " . $operacio->getMotiu() . " </td>
                                <td> " . $operacio->getDia() . " </td>
                                <td> " . $operacio->getHora() . " </td>
                                <td> " . $operacio->getMatricula() . " </td>
							</tr>
						";
					}
				?>
			</table>
			<a class="w3-button" href="<?php echo base_url('operacions/add'); ?>">Afegir Operacio</a>
		</div>
