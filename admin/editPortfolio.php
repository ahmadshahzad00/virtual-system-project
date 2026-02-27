<?php
include "../config/db.php";

$message = "";

// Get portfolio ID
if (!isset($_GET['id'])) {
    header("Location: listPortfolio.php");
    exit;
}

$id = $_GET['id'];

// Fetch existing data
$query = "SELECT * FROM portfolios WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Portfolio project not found");
}

$project = mysqli_fetch_assoc($result);

// Handle form submission
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $project_url = $_POST['project_url'];
    $category = $_POST['category'];

    // Handle image update
    $image_name = $project['image']; // default old image
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . "_" . $_FILES['image']['name'];
        $target = "../assets/images/portfolio/" . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        // Delete old image
        if (!empty($project['image']) && file_exists("../assets/images/portfolio/" . $project['image'])) {
            unlink("../assets/images/portfolio/" . $project['image']);
        }
    }

    // Update query
    $update_query = "UPDATE portfolios SET 
        title = '$title',
        description = '$description',
        project_url = '$project_url',
        category = '$category',
        image = '$image_name'
        WHERE id = $id";

    if (mysqli_query($conn, $update_query)) {
        $message = "Portfolio project updated successfully!";
        $query = "SELECT * FROM portfolios WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $project = mysqli_fetch_assoc($result);
    } else {
        $message = "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Portfolio Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<?php include("sidebar.php"); ?>
<div class="main-content">
<?php include("header.php"); ?>

<div class="container-fluid mt-4">
    <h3 class="mb-3">Edit Portfolio Project</h3>

    <?php if ($message) { ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $project['title']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required><?php echo $project['description']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Project URL</label>
                    <input type="url" name="project_url" class="form-control" value="<?php echo $project['project_url']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" value="<?php echo $project['category']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    <?php if ($project['image']) { ?>
                        <img src="../assets/images/portfolio/<?php echo $project['image']; ?>" width="80" height="80">
                    <?php } else { echo "No Image"; } ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload New Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Update Portfolio</button>

            </form>

        </div>
    </div>
</div>

<?php include("footer.php"); ?>
</div>
</body>
</html>
