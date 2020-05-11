		<div class="container-fluid">
			<h3>Agreagr Usuario</h3>

			<form method="post">
				<label>Usuario</label>
				<input type="text" name="dni" class="form-control">

				<label>Nomrbe</label>
				<input type="text" name="name"  class="form-control">

				<label>Apellidos</label>
				<input type="text" name="surname"  class="form-control">

				<label>Contraseña</label>
				<input type="password" name="password"  class="form-control">

				<label>Email</label>
				<input type="email" name="email"  class="form-control">

				<label>Telefono</label>
				<input type="phone" name="phone"  class="form-control">

				<div class="form-row align-items-center">
  
		<input type="submit" value="Afegir usuari" class="btn btn-primary">
			</form>

			<?php echo validation_errors(); ?>
		</div>
