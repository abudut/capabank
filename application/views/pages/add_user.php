		<div class="container-fluid">
			<h3>Crear Usuario</h3>

			<form method="post">
				<label>Usuario</label>
				<input type="text" name="dni" class="form-control">

				<label>Nomrbe</label>
				<input type="text" name="name" class="form-control">

				<label>Apellidos</label>
				<input type="text" name="surname" class="form-control">

				<label>Contraseña</label>
				<input type="password" name="password" class="form-control">

				<label>Email</label>
				<input type="email" name="email" class="form-control">

				<label>Telefono</label>
				<input type="phone" name="phone" class="form-control">
			
				<div class="form-row align-items-center">
					<div class="my-3">
						<input type="submit" value="Añadir usuari" class="btn btn-primary">
					</div>

					<div> <select name='rol' id='rol' class='my-3 custom-select mr-sm'>
					<option value="1">Admin</option>
					<option value="2">Pro</option>
					<option value="3">Client</option>
					</select>
					
					</div>
			</form>

			<?php echo validation_errors(); ?>
		</div>

