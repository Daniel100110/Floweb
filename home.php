<?php
session_start();
if (isset($_SESSION['login_user'])) {
	?>

	<!doctype html>
	<html lang="en">

	<head>
		<?php
		include './head/head.php';
		?>
	</head>

	<body>
		<header> <br> <br>
			<center>
				<h1>系统徽标(Sys802)</h1>
			</center>
			<br> <br>
		</header>


		<?php
		include './navs/nav_index.php';
		?>

		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3">

					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6">
								<br>
								<br>
								<center>
									<p>
									<img class="img-thumbnail" src="./IMAGENES/china.jpg" width="250px" height="275px">
									</p>
									<input type="file" value="Foto"><br><br>
								</center>
							</div>
							<div class="col-sm-6">
								<br>
								<br>
								<input type="text" placeholder="Nombre del proyecto">
								<input type="checkbox"><br><br>
								<textarea cols="30" rows="10" placeholder="Descripción"></textarea><br><br>
								<input type="text" placeholder="Autores">
								<input type="submit">
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<p>
							Instrucciones de uso:

							1.-Marcar el recuadro si el proyecto esta terminado.
						</p>
					</div>
				</div>
			</div>
		</section>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

	</html>

<?php } ?>

<?php
// session_start();
if (!$_SESSION['login_user']) {
	header("location:index.php");
}
?>