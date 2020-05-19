<div class="container-fluid">
	<h3>Editar Usuario</h3>

	<form method="post" action="<?php echo base_url(); ?>users/updateUser/<?php echo $users->getId(); ?>">

		<label>Usuario</label>
		<input type="text" name="edni" class="form-control" value="<?php echo $users->getUsername() ?>">

		<label>Nombre</label>
		<input type="text" name="ename" class="form-control" value="<?php echo $users->getName() ?>">

		<label>Apellidos</label>
		<input type="text" name="esurname" class="form-control" value="<?php echo $users->getSurname() ?>">

		<label>Email</label>
		<input type="email" name="eemail" class="form-control" value="<?php echo $users->getEmail() ?>">

		<label>Telefono</label>
		<input type="phone" name="ephone" class="form-control" value="<?php echo $users->getPhone() ?>">

		<div class="my-3">
			<input type="submit" value="Guardar Canvios" class=" btn btn-primary">
		</div>

	</form>