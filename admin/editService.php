<?php
include "../config/db.php";

$message = "";

// Get service ID from URL
if (!isset($_GET['id'])) {
    header("Location: listServices.php");
    exit;
}

$id = $_GET['id'];

// Fetch existing data
$query = "SELECT * FROM services WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Service not found");
}

$service = mysqli_fetch_assoc($result);

// Handle form submission
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    $display_order = $_POST['display_order'];

    // Update query
    $update_query = "UPDATE services SET 
        title = '$title',
        description = '$description',
        icon = '$icon',
        display_order = '$display_order'
        WHERE id = $id";

    if (mysqli_query($conn, $update_query)) {
        $message = "Service updated successfully!";

        // Refresh data
        $query = "SELECT * FROM services WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $service = mysqli_fetch_assoc($result);

    } else {
        $message = "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Service</title>

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
    <h3 class="mb-3">Edit Service</h3>

    <?php if ($message) { ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST">

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label">Service Title</label>
                    <input type="text" name="title" class="form-control"
                        value="<?php echo $service['title']; ?>" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required><?php echo $service['description']; ?></textarea>
                </div>

                <!-- Icon -->
                <div class="mb-3">
                    <label class="form-label">Icon Class</label>
                    <input type="text" name="icon" class="form-control"
                        value="<?php echo $service['icon']; ?>">
                    <?php if ($service['icon']) { ?>
                        <div class="mt-2">
                            Preview: <i class="<?php echo $service['icon']; ?>"></i>
                        </div>
                    <?php } ?>
                </div>

                <!-- Display Order -->
                <div class="mb-3">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control"
                        value="<?php echo $service['display_order']; ?>">
                </div>

                <!-- Submit -->
                <button type="submit" name="submit" class="btn btn-primary">
                    Update Service
                </button>

            </form>

        </div>
    </div>

</div>

<?php include("footer.php"); ?>
</div>

</body>
</html>
