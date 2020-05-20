<?php $title = "Login" ?>
	<?php require_once('vistas/header.php'); ?>

	<div class="container">
		<div class="row">
						<div class="col-md-4 offset-md-4">
		<div class="card">
			<div class="card-header text-center">login</div>
				<div class="card-body">
					
							<form action="?controller=login&action=login" method="post">
								<input type="text" name="txt_document" class="form-control" placeholder="usuario" required="">
								<input type="password" name="txt_password" placeholder="contraseña" class="form-control" required="">
								<br>
								<button class="btn btn-info" type="submit">Login</button>
							</form>
							
						</div>
					</div>
				</div>
			
		</div>
	</div>
	

<?php require_once('vistas/footer.php'); ?>