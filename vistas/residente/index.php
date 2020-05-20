<?php $title = "home" ?>
	<?php require_once('vistas/header.php'); ?>
<?php require_once('vistas/menus/menu_residente.php'); ?>
			<div class="container">
		<div class="card">
			<div class="card-header">
				Solicitudes del sistema
			</div>
			<div class="card-body">
				<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>titulo</th>
					<th>contenido</th>
					<th>tipo</th>
				</tr>
			</thead>
			<tbody>
				<?php  
						foreach ($data_mis_solicitudes  as $key => $value) {
							?>
						<tr>
							<td><?= $value->title; ?></td>
							<td><?= $value->content; ?></td>
							<td><?= $value->tipo; ?></td>
						</tr>
					<?php
							
						}
					?>
			</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php require_once('vistas/footer.php'); ?>