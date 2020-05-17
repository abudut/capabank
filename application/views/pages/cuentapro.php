<div class="lead container-fluid">
	<h3>Cuentas de clientes</h3>
	<form action="<?php echo base_url(); ?>cuentas/deleteCuenta/<?php foreach ($cuentas as $us) {
																	$id = $us->getIban();
																}
																echo $id ?>" method="post">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Borrar Cuenta</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Seguro que quieres eliminar la cuenta?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
						<button type="submit" class="btn btn-primary">SI</button>
					</div>
				</div>
			</div>
		</div>
	</form>

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
								<td> " . '<button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >Elimnar</button></td>' . "
							</tr>
						";
		}
		?>
	</table>
	<a class="btn btn-primary" href="<?php echo base_url('cuentas/add'); ?>">Crear Cuenta</a>
</div>