<div class="w3-container">
			<h3>Acces al Taller</h3>

			<form method="post">
				<label>Id</label>
				<input type="text" name="id" class="w3-input">

				<label>Entrada</label>
				<input type="date" name="entrada" class="w3-input">

				<label>Sortida</label>
				<input type="date" name="sortida" class="w3-input">

				<label>Motiu</label>
                <input type="text" name="motiu" class="w3-input">
                <label>Matricula Vehicle</label>
				<input type="text" name="matricula" class="w3-input">

				<input type="submit" value="Registrar Acces" class="w3-button">
			</form>

			<?php echo validation_errors(); ?>
		</div>