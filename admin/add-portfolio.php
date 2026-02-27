<?php
include "../config/db.php";

$message = "";

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $project_url = $_POST['project_url'];
    $category = $_POST['category'];

    // Image upload
    $image_name = "";
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . "_" . $_FILES['image']['name'];
        $target = "../assets/images/portfolio/" . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $query = "INSERT INTO portfolios
              (image, title, description, project_url, category)
              VALUES 
              ('$image_name', '$title', '$description', '$project_url', '$category')";

    if (mysqli_query($conn, $query)) {
        $message = "Portfolio project added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<?php include("sidebar.php"); ?>
<div class="main-content">
<?php include("header.php"); ?>

<div class="container-fluid mt-4">
    <h3 class="mb-3">Add Portfolio Project</h3>

    <?php if ($message) { ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Project URL</label>
                    <input type="url" name="project_url" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    Save Portfolio
                </button>

            </form>

        </div>
    </div>
</div>

<?php include("footer.php"); ?>
</div>
</body>
</html>
