<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow">

                <div class="card-header text-center bg-warning text-dark">
                    <h4>Forgot Password</h4>
                </div>

                <div class="card-body">

                    <form method="POST" action="">
                        
                        <div class="mb-3">
                            <label class="form-label">Enter Your Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your registered email" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">
                                Reset Password
                            </button>
                        </div>

                    </form>

                </div>

                <div class="card-footer text-center">
                    <small>
                        Remember your password? 
                        <a href="userLogin.php">Login here</a>
                    </small>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>