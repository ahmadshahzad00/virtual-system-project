<?php
include "../config/db.php";

$message = "";

// Form submit check
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    $display_order = $_POST['display_order'];

    // Insert query
    $query = "INSERT INTO services 
              (title, description, icon, display_order)
              VALUES 
              ('$title', '$description', '$icon', '$display_order')";

    if (mysqli_query($conn, $query)) {
        $message = "Service added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Service</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<?php include("sidebar.php"); ?>

<div class="main-content">
<?php include("header.php"); ?>

<div class="container-fluid mt-4">
    <h3 class="mb-3">Add Service</h3>

    <?php if ($message) { ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Service Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Icon Class</label>
                    <input type="text" name="icon" class="form-control" placeholder="Example: bi bi-gear">
                </div>

                <div class="mb-3">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control" value="1">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    Save Service
                </button>

            </form>

        </div>
    </div>
</div>

<?php include("footer.php"); ?>
</div>

</body>
</html>
