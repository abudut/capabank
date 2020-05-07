		<div class="class=" lead">
			<h3>Users</h3>

			<table class="table table-striped">
				<tr>
					<th>Usuari</th>
					<th>Nom</th>
					<th>cognoms</th>
					<th>Email</th>
					<th>Grupo</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>
				<?php
				foreach ($users as $user) {
					echo "
							<tr>
								<td> " . $user->getUsername() . " </td>
								<td> " . $user->getName() . " </td>
								<td> " . $user->getSurname() . " </td>
								<td> " . $user->getEmail() . " </td>
								<td>    </td>
								<td> ";
					if ($user->getActive() == 1) {
						echo '<button class="btn btn-success user_status" uid="' . $user->getId() . '"  ustatus="'.$user->getActive().'">Activo</button>';
					} else {
						echo '<button class="btn btn-danger user_status" uid="' . $user->getId() . '"  ustatus="'.$user->getActive().'">Inactivo</button>';
					}
					"</td>
					<td><button class='btn btn-warning'>Editar</button></td>
			
							</tr>";
				}
				?>

			</table>


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

			<?php if($error = $this->session->flashdata('msg')){ ?>

<h3 class="text-success"><?php echo  $error; ?></h3>

<?php } ?>


			<a class="w3-button" href="<?php echo base_url('users/add'); ?>">Afegir un nou usuari</a>


		</div>