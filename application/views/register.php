<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="card mt-5 col-sm-6 col-md-6 col-xl-6">
			<div class="card-header text-center">
				<h4>Register</h4>
			</div>
			<div class="card-body">
				<?=form_open('home/validateRegister')?>
                <div class="form-group">
					<input type="email" name="u_email" class="form-control input-sm" placeholder="Email" required>
				</div>
                <div class="form-group">
					<input type="text" name="u_fullname" class="form-control input-sm" placeholder="Fullname" required>
				</div>
				<div class="form-group">
					<input type="text" name="u_name" class="form-control input-sm" placeholder="Username" required>
				</div>
				<div class="form-group">
					<input type="password" name="u_password" class="form-control input-sm" placeholder="Password" required>
				</div>
                <div class="form-group">
					<input type="password" name="verify_u_password" class="form-control input-sm" placeholder="Confirm Password" required>
				</div>
				<div class="form-group mt-2 text-center">
					<input type="submit" name="submit" class="btn btn-success btn-sm w-25" value="Register">
					<a href="#" type="submit" class="btn btn-warning btn-sm w-35">Already Have an Account</a>
				</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>