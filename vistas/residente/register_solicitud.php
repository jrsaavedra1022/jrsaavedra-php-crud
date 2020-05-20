<?php $title = "home" ?>
	<?php require_once('vistas/header.php'); ?>
<?php require_once('vistas/menus/menu_residente.php'); ?>
			<div class="container">
		<div class="card">
			<div class="card-header">
				Solicitudes del sistema
			</div>
			<div class="card-body">
				<form action="?controller=residente&action=register_solicitudes" method="post">
					<input type="hidden" name="users_id" value="<?= $_SESSION['usuario']->id; ?>">
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label for="">titulo</label>	
								<input type="text" name="title" class="form-control" required="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								<label for="">descripción</label>	
								<input type="text" name="content" class="form-control" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label for="">Tipo de solicitud</label>	
								<select name="request_types_id" class="form-control" required="">
									<option value="">-- seleccione --</option>
									<?php 
									foreach ($tipo_solicitud as $key => $value) {
									?>
									<option value="<?= $value->id; ?>"><?= $value->name; ?></option>
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