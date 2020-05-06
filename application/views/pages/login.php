		<div class="w3-container">

			<form method="post">
				<div class="form-group">
					<label>Usuario</label>
					<input type="text" class="form-control" name="uname" placeholder="Introduce tu usuario">
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					<input type="password" class="form-control" name="password" placeholder="Introduce la contraseña">
				</div>
				<div class="form-group">
					<label class="form-check-label"><input type="checkbox"> Remember me</label>
				</div>
				<button type="submit" class="btn btn-primary">Entrar</button>
			</form>


			<?php
			echo validation_errors();
			if (isset($error)) {
				echo "
						<div class='w3-red'>
							<h5>" . $error . "</h5>
						</div>
					";
			}
			?>
		</div>