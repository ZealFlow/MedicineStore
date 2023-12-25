<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Password Reset</h3>
                </div>
                <div class="card-body">
                    <form id="resetForm" method="POST" action="ResetPassController.php">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    <a href="LoginController.php">Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>