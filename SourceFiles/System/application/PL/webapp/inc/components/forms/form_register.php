<section class="vh-100 bg-image" style="background-color: blue;">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <?php
                                if (!empty($_SESSION['error'])) {
                            ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_SESSION['error']; ?>
                                    </div>
                            <?php
                                    // Clear the session variable after displaying the error
                                    unset($_SESSION['error']);
                                }
                            ?>

                            <form action="RegisterController.php" method="post">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Full Name</label>
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="fullName"/>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Email</label>
                                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="Email"/>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="Password"/>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="repeatPassword"/>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Sign Up</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">
                                    Have already an account? <a href="LoginController.php" class="fw-bold text-body"><u>Login here</u></a>
                                </p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
