<?php
include "../config/db.php";

// Direct delete (no confirmation)
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $delete_query = "DELETE FROM services WHERE id = $delete_id";
    mysqli_query($conn, $delete_query);

    header("Location: listService.php");
    exit;
}

// Fetch services
$query = "SELECT * FROM services ORDER BY display_order ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Services</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (for icon preview) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<?php include("sidebar.php"); ?>

<div class="main-content">
<?php include("header.php"); ?>

<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Services</h3>
        <a href="add-service.php" class="btn btn-primary">+ Add Service</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Icon</th>
                            <th>Display Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <?php if ($row['icon']) { ?>
                                        <i class="<?php echo $row['icon']; ?>"></i>
                                        <br>
                                        <small><?php echo $row['icon']; ?></small>
                                    <?php } else { ?>
                                        No Icon
                                    <?php } ?>
                                </td>
                                <td><?php echo $row['display_order']; ?></td>
                                <td>
                                    <a href="editService.php?id=<?php echo $row['id']; ?>" 
                                       class="btn btn-sm btn-warning">
                                       Edit
                                    </a>

                                    <a href="listService.php?delete_id=<?php echo $row['id']; ?>" 
                                       class="btn btn-sm btn-danger">
                                       Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6" class="text-center">No services found</td>
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
