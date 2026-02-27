<?php
session_start();
include "../config/db.php";

$message = "";

// Login logic
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Get user by email only
    $query = "SELECT * FROM adminUser WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        // Verify hashed password
        if ($user && password_verify($password, $user['password'])) {

            // Store session
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_email'] = $user['email'];
            $_SESSION['admin_name'] = $user['first_name'];

            header("Location: index.php");
            exit;

        } else {
            $message = "Invalid email or password!";
        }

    } else {
        $message = "Invalid email or password!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">

    <div class="card shadow-lg" style="width: 400px;">
        <div class="card-body p-4">

            <h3 class="text-center mb-4">Admin Login</h3>

            <?php if ($message) { ?>
                <div class="alert alert-danger"><?php echo $message; ?></div>
            <?php } ?>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" name="login" class="btn btn-primary w-100">
                    Login
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>
