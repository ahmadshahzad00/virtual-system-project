<?php
include "../config/db.php";

// Simple delete
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete record from contactmessages table
    $delete_query = "DELETE FROM contactmessages WHERE id = $delete_id";
    mysqli_query($conn, $delete_query);

    // Redirect back to refresh list
    header("Location: listconatcts.php");
    exit;
}

// Fetch contact messages
$query = "SELECT * FROM contactmessages ORDER BY id DESC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Messages</title>

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
        <h3>Contact Messages</h3>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['message']; ?></td>
                                <td>
                                    <a href="listconatcts.php?delete_id=<?php echo $row['id']; ?>" 
                                       class="btn btn-sm btn-danger">
                                       Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="8" class="text-center">No contact messages found</td>
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
