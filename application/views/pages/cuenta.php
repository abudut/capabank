<div class="lead container-fluid">
			<h3>Cuentas</h3>

			<table class="table table-striped">
            <thead>
				<tr>
					<th>IBAN</th>
					<th>Fecha</th>
					<th>Concepte</th>
					<th>Importe</th>
					<th>Saldo</th>
				</tr>
                </thead>
				<?php
					foreach($cuentas as $cuenta) {
						echo "
							<tr>
								<td> " . $cuenta->getIban() . " </td>
								<td> " . $cuenta->getData() . " </td>
								<td> " . $cuenta->getConcepte() . " </td>
                                <td> " . $cuenta->getImport() . "€ </td>
                                <td> " . $cuenta->getSou() . "€ </td>
							
							</tr>
						";
					}
				?>
			</table>
		</div>
