<?php
include "../config/db.php";

$message = "";

// Form submit check
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $bio = $_POST['bio'];
    $linkedin = $_POST['linkedin_url'];
    $twitter = $_POST['twitter_url'];

    // Image upload
    $photo_name = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo_name = time() . "_" . $_FILES['photo']['name'];
        $target = "../assets/images/team/" . $photo_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    }

    // Insert query
    $query = "INSERT INTO teammembers 
              (name, designation, bio, photo, linkedin_url, twitter_url)
              VALUES 
              ('$name', '$designation', '$bio', '$photo_name', '$linkedin', '$twitter')";

    if (mysqli_query($conn, $query)) {
        $message = "Team member added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Team Member</title>

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
    <h3 class="mb-3">Add Team Member</h3>

    <?php if ($message) { ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Twitter URL</label>
                    <input type="url" name="twitter_url" class="form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    Save Team Member
                </button>

            </form>

        </div>
    </div>
</div>

<?php include("footer.php"); ?>
</div>

</body>
</html>
