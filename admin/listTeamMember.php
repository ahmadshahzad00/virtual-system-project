<?php
include "../config/db.php";

// Simple delete
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete record from table
    $delete_query = "DELETE FROM teammembers WHERE id = $delete_id";
    mysqli_query($conn, $delete_query);

    // Redirect back to refresh list
    header("Location: listTeamMember.php");
    exit;
}

// Fetch team members
$query = "SELECT * FROM teammembers ORDER BY id DESC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Team Members</title>

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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Team Members</h3>
        <a href="add-team.php" class="btn btn-primary">+ Add Team Member</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Bio</th>
                            <th>LinkedIn</th>
                            <th>Twitter</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td>
                                    <?php if ($row['photo']) { ?>
                                        <img src="../assets/images/team/<?php echo $row['photo']; ?>"
                                             width="50" height="50" class="rounded-circle">
                                    <?php } else { ?>
                                        No Image
                                    <?php } ?>
                                </td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['designation']; ?></td>
                                <td><?php echo $row['bio']; ?></td>
                                <td>
                                    <?php if ($row['linkedin_url']) { ?>
                                        <a href="<?php echo $row['linkedin_url']; ?>" target="_blank"
                                           class="btn btn-sm btn-outline-primary">View</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($row['twitter_url']) { ?>
                                        <a href="<?php echo $row['twitter_url']; ?>" target="_blank"
                                           class="btn btn-sm btn-outline-info">View</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="editTeamMember.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="listTeamMember.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="8" class="text-center">No team members found</td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<?php include("footer.php"); ?>
</div>

</body>
</html>
