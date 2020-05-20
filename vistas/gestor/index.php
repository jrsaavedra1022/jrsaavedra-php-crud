<?php $title = "home" ?>
	<?php require_once('vistas/header.php'); ?>

	<?php require_once('vistas/menus/menu_gestor.php'); ?>
	<div class="container">
		<div class="card">
			<div class="card-header">
				Usuarios del sistema
			</div>
			<div class="card-body">
				<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Documento</th>
					<th>Email</th>
					<th>telefono</th>
					<th>role</th>
					<th>Apartamento</th>
					<th>Torre</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
					<?php  
						foreach ($data_user_all  as $key => $value) {
							?>
							<tr>
								<td><?=  $value->name; ?></td>
								<td><?=  $value->sur_name; ?></td>
								<td><?=  $value->document; ?></td>
								<td><?=  $value->email; ?></td>
								<td><?=  $value->phone; ?></td>
								<td><?=  $value->roles_id; ?></td>
								<td><?=  $value->apartment; ?></td>
								<td><?=  $value->tower; ?></td>
								<td>
							<div class="button-contents">
										<form action="" method="post">
											<input type="hidden" name="uid" value="<?=  $value->id; ?>">
	<input type="hidden" name="txt_all_data" value='<?= json_encode($value); ?>'>
	<button formaction="?controller=admin&action=view_edit" class="btn btn-info">Editar</button>
										<button formaction="?controller=admin&action=delete_user" class="btn btn-danger">Eliminar</button>
										</form>
									</div>
									
								</td>
							</tr>
							<?php
							
						}
					?>
			</div>
		</div>
	</div>
		
	<?php require_once('vistas/footer.php'); ?>