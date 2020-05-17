		<div class="container-fluid">
			<h3>Crear Cuenta</h3>

			<form method="post">
				<label>Iban</label>
				<input type="text" name="iban" class="form-control">

				<label>Sueldo</label>
				<input type="text" value="0" name="sueldo" class="form-control">

				<label>Email Cliente</label>
				<input type="email" name="email" class="form-control">

				<div class="form-row align-items-center">
					<div class="my-3">
						<input type="submit" value="Añadir cuenta" class="btn btn-primary">
					</div>
			</form>

			<?php echo validation_errors(); ?>
		</div>