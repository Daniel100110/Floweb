<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">Inicio</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse"
			 data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			 aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">投资组合<span class="sr-only"></span></a> <!-- Portafolio -->
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">接触</a> <!-- Contacto -->
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" tabindex="-1">自传</a> <!-- Bibliografia -->
					</li>
				</ul>

				<nav class="navbar navbar-light bg-light">
					<form class="form-inline">
						<div class="input-group">
                            <input type="text" class="form-control" placeholder="<?php echo $_SESSION['login_user']; ?>" aria-label="Username" aria-describedby="basic-addon1" readonly>
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><a href="../logout.php"><b>出去</b> </a></span>
							</div>
						</div>
					</form>
				</nav>
			</div>
		</nav>