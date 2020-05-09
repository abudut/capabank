<div class="container-fluid">
	<h3>Lista de usuarios</h3>

	<script type="text/javascript">
		$(document).on('click', '.user_status', function() {

			var id = $(this).attr('uid');
			var status = $(this).attr('ustatus');

			$('#user_id').val(id);
			$('#user_status').val(status);

			$('#modal_popup').modal({
				backdrop: 'static',
				keyboard: true,
				show: true
			});
		});
	</script>

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

	<?php if ($error = $this->session->flashdata('msg')) { ?>

		<h3 class="text-success"><?php echo  $error; ?></h3>

	<?php } ?>

	<table class="table table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Usuari</th>
				<th scope="col">Nom</th>
				<th scope="col">cognoms</th>
				<th scope="col">Email</th>
				<th scope="col">Grupo</th>
				<th scope="col" h>Estado</th>
				<th scope="col">Accion</th>

			</tr>
		</thead>
		<?php
		foreach ($users as $user) {
			echo "
					<tbody>
							<tr>
								<td scope='row'> " . $user->getId() . " </td>
								<td> " . $user->getUsername() . " </td>
								<td> " . $user->getName() . " </td>
								<td> " . $user->getSurname() . " </td>
								<td> " . $user->getEmail() . " </td>
								<td>  </td>
							
							
								<td>";
			if ($user->getActive() == 1) {
				echo '<button class="btn btn-success user_status" uid="' . $user->getId() . '"  ustatus="' . $user->getActive() . '">Activo</button>';
			} else {
				echo '<button class="btn btn-danger user_status" uid="' . $user->getId() . '"  ustatus="' . $user->getActive() . '">Inactivo</button>
						';
			}

			echo '</td><td><a href="' . base_url() . 'users/editUser/' . $user->getId() . '"><button class="btn btn-warning">Editar</button></a> ';
			echo '<a href="' . base_url() . 'users/deleteUser/' . $user->getId() . '"><button class="btn btn-danger">Elimnar</button></a></td>
							</tr>
							</tbody>';
		}
		?>

	</table>

	<a class="btn btn-primary" href="<?php echo base_url('users/add'); ?>">Agragar usuario</a>

</div>