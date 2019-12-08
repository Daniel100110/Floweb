<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="collapse navbar-collapse">
		<nav class="navbar navbar-light bg-light">
			<form class="form-inline">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">
							<b>
								<a href="../cupones.php">
									<i class="far fa-address-card" style="color:black;"></i>
								</a>
							</b>
							</a>
						</span>
					</div>
					<input type="text" class="form-control" placeholder="<?php echo $_SESSION['login_user']; ?>" readonly>
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">
							<a href="../logout.php">
								<b>
									<i class="fas fa-sign-out-alt"></i>
								</b>
							</a>
						</span>
					</div>
				</div>
			</form>
		</nav>
	</div>
</nav>