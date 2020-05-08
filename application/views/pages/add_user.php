		<div class="container-fluid">
			<h3>Agreagr Usuario</h3>

			<form method="post">
				<label>Usuario</label>
				<input type="text" name="dni" class="w3-input">

				<label>Nom</label>
				<input type="text" name="name" class="w3-input">

				<label>Cognoms</label>
				<input type="text" name="surname" class="w3-input">

				<label>Contraseña</label>
				<input type="password" name="password" class="w3-input">

				<label>Email</label>
				<input type="email" name="email" class="w3-input">

				<label>Telefono</label>
				<input type="phone" name="phone" class="w3-input">

				<div class="form-row align-items-center">
    <div class="col-auto my-1">
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Elegir Rol...</option>
        <option value="Admin">Administrador</option>
        <option value="Pro">Professional</option>
        <option value="Client">Cliente</option>
      </select>
    </div>
				<input type="submit" value="Afegir usuari" class="w3-button">
			</form>

			<?php echo validation_errors(); ?>
		</div>
