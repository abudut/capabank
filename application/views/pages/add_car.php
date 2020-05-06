<div class="w3-container">
			<h3>Cars</h3>

			<form method="post">
				<label>Matricula</label>
				<input type="text" name="matricula" class="w3-input">

				<label>Marca</label>
				<input type="text" name="marca" class="w3-input">

				<label>Model</label>
				<input type="text" name="model" class="w3-input">

				<label>Any Fabricacio</label>
				<input type="date" name="any" class="w3-input">
				<label>Client DNI</label>
				<input type="text" name="client_dni" class="w3-input">

				<input type="submit" value="Afegir vehicle" class="w3-button">
			</form>

			<?php echo validation_errors(); ?>
		</div>
