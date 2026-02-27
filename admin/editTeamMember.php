<?php
include "../config/db.php";

$message = "";

// Get team member ID from URL
if (!isset($_GET['id'])) {
    header("Location: listTeamMember.php");
    exit;
}

$id = $_GET['id'];

// Fetch existing data
$query = "SELECT * FROM teammembers WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Team member not found");
}

$member = mysqli_fetch_assoc($result);

// Handle form submission
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $bio = $_POST['bio'];
    $linkedin = $_POST['linkedin_url'];
    $twitter = $_POST['twitter_url'];

    // Handle photo update
    $photo_name = $member['photo']; // keep old photo by default
    if (!empty($_FILES['photo']['name'])) {
        $photo_name = time() . "_" . $_FILES['photo']['name'];
        $target = "../assets/images/team/" . $photo_name;

        // Move new photo
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);

        // Delete old photo if exists
        if (!empty($member['photo']) && file_exists("../assets/images/team/" . $member['photo'])) {
            unlink("../assets/images/team/" . $member['photo']);
        }
    }

    // Update query
    $update_query = "UPDATE teammembers SET 
        name = '$name',
        designation = '$designation',
        bio = '$bio',
        photo = '$photo_name',
        linkedin_url = '$linkedin',
        twitter_url = '$twitter'
        WHERE id = $id";

    if (mysqli_query($conn, $update_query)) {
        $message = "Team member updated successfully!";
        // Refresh member data
        $query = "SELECT * FROM teammembers WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $member = mysqli_fetch_assoc($result);
    } else {
        $message = "Error updating record: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Team Member</title>

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
    <h3 class="mb-3">Edit Team Member</h3>

    <?php if ($message) { ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $member['name']; ?>" required>
                </div>

                <!-- Designation -->
                <div class="mb-3">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control" value="<?php echo $member['designation']; ?>" required>
                </div>

                <!-- Bio -->
                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="4"><?php echo $member['bio']; ?></textarea>
                </div>

                <!-- Current Photo -->
                <div class="mb-3">
                    <label class="form-label">Current Photo</label><br>
                    <?php if ($member['photo']) { ?>
                        <img src="../assets/images/team/<?php echo $member['photo']; ?>" width="80" height="80" class="rounded-circle mb-2">
                    <?php } else { ?>
                        No Photo
                    <?php } ?>
                </div>

                <!-- Upload New Photo -->
                <div class="mb-3">
                    <label class="form-label">Upload New Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <!-- LinkedIn -->
                <div class="mb-3">
                    <label class="form-label">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" class="form-control" value="<?php echo $member['linkedin_url']; ?>">
                </div>

                <!-- Twitter -->
                <div class="mb-3">
                    <label class="form-label">Twitter URL</label>
                    <input type="url" name="twitter_url" class="form-control" value="<?php echo $member['twitter_url']; ?>">
                </div>

                <!-- Submit -->
                <button type="submit" name="submit" class="btn btn-primary">
                    Update Team Member
                </button>

            </form>

        </div>
    </div>

</div>

<?php include("footer.php"); ?>
</div>

</body>
</html>
