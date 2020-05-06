		<div class="class="lead">
			<h3>Users</h3>

			<table class="w3-table">
				<tr>
					<th>Usuari</th>
					<th>Nom</th>
					<th>cognoms</th>
					<th>Email</th>
					<th>Grupo</th>
					<th>Estado</th>
				</tr>
				<?php
					foreach($users as $user) {
						echo "
							<tr>
								<td> " . $user->getDNI() . " </td>
								<td> " . $user->getName() . " </td>
								<td> " . $user->getSurname() . " </td>
								<td> " . $user->getEmail() . " </td>
								<td>    </td>
								<td> "; if ($user->getActive() ==1) {
									echo 'Activo';
								}else {
									echo'Inactivo';
								}  " </td>
			
							</tr>
						";
					}
				?>
			</table>
			<a class="w3-button" href="<?php echo base_url('users/add'); ?>">Afegir un nou usuari</a>
		</div>
