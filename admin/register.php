<?php
session_start();
include "../config/db.php"; // adjust path if needed

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name  = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $password   = $_POST['password'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $checkQuery = "SELECT * FROM adminUser WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $message = "Email already registered!";
    } else {

        $query = "INSERT INTO adminUser (first_name, last_name, email, password) 
                  VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

        if (mysqli_query($conn, $query)) {
            header("Location: login.php?success=1");
            exit;
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center">
                    <h4>Admin Register</h4>
                </div>

                <div class="card-body">

                    <?php if($message): ?>
                        <div class="alert alert-danger"><?php echo $message; ?></div>
                    <?php endif; ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Register</button>

                    </form>

                    <div class="text-center mt-3">
                        <a href="login.php">Already have account? Login</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
