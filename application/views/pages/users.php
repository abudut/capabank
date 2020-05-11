<div class="lead container-fluid">
	<h3>Lista de usuarios</h3>


	<div class="modal modal-danger fade" id="modal_popup">

		<div class="modal-dialog modal-sm">


			<form action="<?php echo base_url(); ?>users/updateStatus" method="post">
				<div class="modal-content">

					<div class="modal-header" style="height: 150px;">
						<h4 style="margin-top: 50px;text-align: center;">Seguro que quieres canviar el estado del usuario?</h4>


						<input type="hidden" name="id" id="user_id" value="">
						<input type="hidden" name="status" id="user_status" value="">

					</div>

					<div class="modal-footer">

						<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">NO</button>

						<button type="submit" name="submit" class="btn btn-success">SI</button>

					</div>

				</div>

			</form>

		</div>

	</div>


<form action="<?php echo base_url(); ?>users/deleteUser/<?php foreach ($users as $us) {
	$id=$us->getId();} 
	echo $id?>" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Seguro que quieres eliminar el usuario?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" class="btn btn-primary">SI</button>
      </div>
    </div>
  </div>
</div>
</form>



	<?php if ($error = $this->session->flashdata('msg')) { ?>

		<h3 class="text-success"><?php echo  $error; ?></h3>

	<?php } ?>

	<table id="userlist" class="table table-hover table-responsive-lg">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Usuario</th>
				<th scope="col">Nombre</th>
				<th scope="col">Apellidos</th>
				<th scope="col">Email</th>
				<th scope="col">Telefono</th>
				<th scope="col">Rol</th>
				<th scope="col">Estado</th>
				<th scope="col">Accion</th>

			</tr>
		</thead>
		<?php
			foreach ($rols as $rol) {
				var_dump($rol->getUserId());
			}
		foreach ($users as $user) {
			echo "
					<tbody>
							<tr>
								<th scope='row'> " . $user->getId() . " </th>
								<td> " . $user->getUsername() . " </td>
								<td> " . $user->getName() . " </td>
								<td> " . $user->getSurname() . " </td>
								<td> " . $user->getEmail() . " </td>
								<td> " . $user->getPhone() . " </td>
								<td>  <select  name='rol' class='custom-select mr-sm' >
								"; echo"<option selected>Elegir Rol...</option>
								<option value='1'>Administrador</option>
								<option value='2'>Professional</option>
								<option value='3'>Cliente</option>
							  </select> </td>
								<td>";
			if ($user->getActive() == 1) {
				echo '<button class="btn btn-success user_status" uid="' . $user->getId() . '"  ustatus="' . $user->getActive() . '">Activo</button>';
			} else {
				echo '<button class="btn btn-danger user_status" uid="' . $user->getId() . '"  ustatus="' . $user->getActive() . '">Inactivo</button>
						';
			}

			echo '</td><td><a href="' . base_url() . 'users/editUser/' . $user->getId() . '"><button class="btn btn-warning">Editar</button></a> ';
			echo '<button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >Elimnar</button></td>
							</tr>
							</tbody>';
		}
		?>

	</table>

	

	<a class="btn btn-primary" href="<?php echo base_url('users/add'); ?>">Agragar usuario</a>

</div>