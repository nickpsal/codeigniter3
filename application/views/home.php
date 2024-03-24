<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="card mt-5 col-sm-6 col-md-6 col-xl-6">
			<div class="card-header text-center">
				<h4>Login</h4>
			</div>
			<div class="card-body">
				<?=form_open('home/validateLogin')?>
				<div class="form-group">
					<input type="text" name="u_name" class="form-control input-sm" placeholder="Username" required>
				</div>
				<div class="form-group">
					<input type="password" name="u_password" class="form-control input-sm" placeholder="Password" required>
				</div>
				<div class="form-group mt-2 text-center">
					<input type="submit" name="submit" class="btn btn-success btn-sm w-25" value="Login">
					<a href="#" type="submit" class="btn btn-warning btn-sm w-25">Register</a>
				</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>