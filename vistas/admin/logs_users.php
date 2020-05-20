<?php $title = "solicitudes" ?>
	<?php require_once('vistas/header.php'); ?>
</head>
<body>
	<?php require_once('vistas/menus/menu_admin.php'); ?>
	<div class="container">
		<div class="card">
			<div class="card-header">
				Cambios en el sistema - Usuarios
			</div>
			<div class="card-body">
				<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Tabla</th>
					<th>Fecha</th>
					<th>Tipo de cambio</th>
					<th>Aprobador</th>
					<th>Usuario alterado</th>
					<th>Descripción</th>
				</tr>
			</thead>
			<tbody>
				<?php  
						foreach ($logs_all  as $key => $value) {
							?>
						<tr>
							<td><?= $value->table_sync; ?></td>
							<td><?= $value->created_at; ?></td>
							<td><?= $value->tipo_cambio; ?></td>
							<td><?= $value->aprobador; ?></td>
							<td><?= $value->usuario_alterado; ?></td>
							<td><?= $value->description_change; ?></td>
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