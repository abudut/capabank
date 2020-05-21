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
	
		
		<div> <select name='rol' id='rol' class='my-3 w-25  custom-select mr-sm'>
		
			
		<?php $group = $users->getRol()->getGroupId(); 
		echo "<option value='1'";
		if ($group == 1) {
			echo "selected";
		}
		echo ">Administrador</option>";
		echo "<option value='2'";
		if ($group == 2) {
			echo "selected";
		}
		echo ">Professional</option>";
		echo "<option value='3'";
		if ($group == 3) {
			echo "selected";
		}
		echo ">Cliente</option>";

		?>
			</select>

		</div>

		<div class="my-3">
			<input type="submit" value="Guardar Canvios" class=" btn btn-primary">
		</div>


	</form>