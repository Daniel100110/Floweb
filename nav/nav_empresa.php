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
						<a class="nav-link" href="#">-<span class="sr-only"></span></a>
					</li>
				</ul>

				<nav class="navbar navbar-light bg-light">
					<form class="form-inline">
						<div class="input-group">
                            <input type="text" class="form-control" placeholder="<?php echo $_SESSION['login_user']; ?>" aria-label="Username" aria-describedby="basic-addon1" readonly>
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><a href="../logout.php"><b><i class="fas fa-sign-out-alt"></i></b> </a></span>
							</div>
						</div>
					</form>
				</nav>
			</div>
		</nav>