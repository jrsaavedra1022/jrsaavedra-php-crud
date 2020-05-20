<?php $title = "register users" ?>
	<?php require_once('vistas/header.php'); ?>
	<?php require_once('vistas/menus/menu_gestor.php'); ?>
	<div class="container">
		<div class="card">
			<div class="card-header">
				Registrar Usuarios
			</div>
			<div class="card-body">
					<form action="?controller=admin&action=register_user" method="post">
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label for="">Nombre</label>	
								<input type="text" name="name" class="form-control" required="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								<label for="">Apellido</label>	
								<input type="text" name="sur_name" class="form-control" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label for="">Documento</label>	
								<input type="text" name="document" class="form-control" required="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								<label for="">Email</label>	
								<input type="email" name="email" class="form-control" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label for="">telefono</label>	
								<input type="number" name="phone" class="form-control" required="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								<label for="">role</label>	
								<select name="role_id" class="form-control" required="">
									<option value="">-- seleccione --</option>
									<?php 
									foreach ($data_roles as $key => $value) {
									?>
									<option value="<?= $value->id; ?>"><?= $value->name; ?></option>
									<?php
									}
									?>
								</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label for="">contraseña</label>	
								<input type="password" name="password" class="form-control" required="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								<label for="">Apartamento</label>	
								<select name="apartments_id" class="form-control" required="">
									<option value="">-- seleccione --</option>
									<?php 
									foreach ($data_aparments as $key => $value) {
									?>
									<option value="<?= $value->id; ?>"><?= $value->apartment; ?></option>
									<?php
									}
									?>
								</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-raised btn-success " type="submit">register</button>
						</div>
					</form>
			</div>
		</div>
	</div>


	<?php require_once('vistas/footer.php'); ?>
