<div class="lead container-fluid">
	<h3>Cuentas de clientes</h3>


	<table class="table table-striped">
		<thead>
			<tr>
				<th>IBAN</th>
				<th>Fecha</th>
				<th>Saldo</th>
				<th>Cliente</th>
				<th>Accion</th>
			</tr>
		</thead>
		<?php
		foreach ($cuentas as $cuenta) {
			echo "
							<tr>
								<td> " . $cuenta->getIban() . " </td>
								<td> " . $cuenta->getData() . " </td>
								<td> " . $cuenta->getSou() . "€ </td>
								<td> " . $cuenta->getEmail() . "</td>
								<td> " . '<a href=" ' . base_url() . 'cuentas/deleteCuenta/' . $cuenta->getIban() . '"><button class="btn btn-danger">Elimnar</button></a></td>' . "
							</tr>
						";
		}
		?>
	</table>
	<a class="btn btn-primary" href="<?php echo base_url('cuentas/add'); ?>">Crear Cuenta</a>
</div>