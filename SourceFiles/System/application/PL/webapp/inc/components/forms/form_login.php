<?php 
	$googleLoginUrl = $client->createAuthUrl();
?>
<section>
	<div class="px-4 py-5 px-md-5 text-center text-lg-start"
	style="background-color: hsl(0, 0%, 96%)">
	<div class="container">
		
			<?php if (!empty($loginError)) : ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $loginError; ?>
				</div>
			<?php endif; ?>

			<div class="row gx-lg-5 align-items-center">
				<div class="col-lg-6 mb-5 mb-lg-0">
					<h1 class="my-5 display-3 fw-bold ls-tight">
						Login
					</h1>
					<p style="color: hsl(217, 10%, 50.8%)">Medicine</p>
				</div>

				<div class="col-lg-6 mb-5 mb-lg-0">
					<div class="card">
						<div class="card-body py-5 px-md-5">
							<form action="LoginController.php" method="POST">
								<!-- Email input -->
								<div class="form-outline mb-4">
									<label class="form-label" for="form3Example3">Email address or Phone Number</label>
									<input type="email" id="form3Example3" class="form-control" name="txtAccount"/>
								</div>

								<!-- Password input -->
								<div class="form-outline mb-4">
									<label class="form-label" for="form3Example4">Password</label>
									<input type="password" id="form3Example4" class="form-control" name="txtPass"/>
								</div>

								<!-- Submit button -->
								<button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

								<!-- Register buttons -->
								<div class="text-center">
									<p>or sign up with:</p>
									<button type="button" class="btn btn-link btn-floating mx-1">
										<a type='button' class='login-with-google-btn' href='<?php echo $googleLoginUrl ?>'>
											<i class="fab fa-google"></i>
										</a>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>