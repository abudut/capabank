<div class="container-fluid">
			<h3>Editar Usuario</h3>

			<form method="post">
				<label>Usuario</label>
				<input type="text" name="dni" class="form-control" value="<?php echo $users->getUsername()?>">

				<label>Nom</label>
				<input type="text" name="name" class="form-control" value="<?php echo $users->getName()?>">

				<label>Cognoms</label>
				<input type="text" name="surname" class="form-control" value="<?php echo $users->getSurname()?>">

				<label>Contraseña</label>
				<input type="password" name="password" class="form-control" value="<?php echo password_hash($users->getPassword(),PASSWORD_DEFAULT) ?>">

				<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo $users->getEmail()?>">

				<label>Telefono</label>
				<input type="phone" name="phone" class="form-control" value="<?php echo $users->getPhone()?>">

				<div class="form-row">

				<input type="submit" value="Guardar Canvios" class="btn btn-primary">
			</form>

			<?php echo validation_errors(); ?>
		</div>
