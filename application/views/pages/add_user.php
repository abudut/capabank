		<div class="container-fluid pb-3">
			<h3>Crear Usuario</h3>

			<form method="post" class="p-3">
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

				
				<div> <select name='rol' id='rol' class='my-3 w-25 custom-select mr-sm'>
					<option value="1">Administrador</option>
					<option value="2">Professional</option>
					<option value="3">Cliente</option>
					</select>
					
					</div>
			
				<div class="form-row align-items-center pb-5">
					<div class="my-3">
						<input type="submit" value="Añadir usuari" class="btn btn-primary">
					</div>

			</form>

			<?php echo validation_errors(); ?>
		</div>

