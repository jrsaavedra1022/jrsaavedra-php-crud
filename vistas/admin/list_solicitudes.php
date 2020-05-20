<?php $title = "solicitudes" ?>
	<?php require_once('vistas/header.php'); ?>
</head>
<body>
	<?php require_once('vistas/menus/menu_admin.php'); ?>
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
					<th>cédula del usuario</th>
					<th>nombre del usuario</th>
					<th>torre</th>
					<th>apartamento</th>
				</tr>
			</thead>
			<tbody>
				<?php  
						foreach ($data_solicitudes  as $key => $value) {
							?>
						<tr>
							<td><?= $value->title; ?></td>
							<td><?= $value->content; ?></td>
							<td><?= $value->tipo; ?></td>
							<td><?= $value->document; ?></td>
							<td><?= $value->nombre_user; ?></td>
							<td><?= $value->tower; ?></td>
							<td><?= $value->apartment; ?></td>
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