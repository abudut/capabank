<div class="w3-container">
			<h3>Acces al Taller</h3>

			<form method="post">
				<label>Id</label>
				<input type="text" name="id" class="w3-input">

				<label>Accio</label>
				<input type="text" name="accio" class="w3-input">

				<label>Descripcio</label>
				<input type="text" name="descripcio" class="w3-input">

				<label>Motiu</label>
				<input type="text" name="motiu" class="w3-input">
				<label>Dia</label>
				<input type="date" name="dia" class="w3-input">
				<label>Hora</label>
                <input type="time" name="hora" class="w3-input">
                <label>Matricula</label>
				<input type="text" name="matricula" class="w3-input">

				<input type="submit" value="Registrar Operacio" class="w3-button">
			</form>

			<?php echo validation_errors(); ?>
		</div>