<?php $title = "Editar Users" ?>
	<?php require_once('vistas/header.php'); ?>
	<?php require_once('vistas/menus/menu_admin.php'); ?>
	<div class="container">
		<div class="card">
			<div class="card-header">
				Registrar Usuarios
			</div>
			<div class="card-body">
					<form action="?controller=admin&action=edit_user" method="post">
						<input type="hidden" name="id" value="<?= $data_edit['id']; ?>">
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label for="">Nombre</label>	
								<input type="text" name="name" class="form-control" value="<?= $data_edit['name']; ?>" required="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								<label for="">Apellido</label>	
								<input type="text" name="sur_name" class="form-control" value="<?= $data_edit['sur_name']; ?>" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label for="">Documento</label>	
								<input type="text" name="document" class="form-control" value="<?= $data_edit['document']; ?>" required="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								<label for="">Email</label>	
								<input type="email" name="email" class="form-control" value="<?= $data_edit['email']; ?>" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label for="">telefono</label>	
								<input type="number" name="phone" class="form-control" value="<?= $data_edit['phone']; ?>" required="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								<label for="">role</label>	
								<select id="role_id" name="role_id" class="form-control" required="">
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
								<label for="">Apartamento</label>	
								<select id="apartments_id" name="apartments_id" class="form-control" required="">
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
							<button class="btn btn-raised btn-warning " type="submit">Editar Usuario</button>
						</div>
					</form>
			</div>
		</div>
	</div>

	<script>
		document.getElementById('role_id').value = "<?= $data_edit['roles_id']; ?>";
		document.getElementById('apartments_id').value = "<?= $data_edit['apartments_id']; ?>";
	</script>


	<?php require_once('vistas/footer.php'); ?>
