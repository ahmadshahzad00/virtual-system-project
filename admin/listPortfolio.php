<?php
include "../config/db.php";

// Simple delete
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete record from portfolios table
    $delete_query = "DELETE FROM portfolios WHERE id = $delete_id";
    mysqli_query($conn, $delete_query);

    // Redirect back to refresh list
    header("Location: listPortfolio.php");
    exit;
}

// Fetch portfolios
$query = "SELECT * FROM portfolios ORDER BY id DESC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Portfolios</title>

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
        <h3>Portfolios</h3>
        <a href="add-portfolio.php" class="btn btn-primary">+ Add Portfolio</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Project URL</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td>
                                    <?php if ($row['image']) { ?>
                                        <img src="../assets/images/portfolio/<?php echo $row['image']; ?>"
                                             width="50" height="50" class="rounded">
                                    <?php } else { ?>
                                        No Image
                                    <?php } ?>
                                </td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <?php if ($row['project_url']) { ?>
                                        <a href="<?php echo $row['project_url']; ?>" target="_blank"
                                           class="btn btn-sm btn-outline-primary">View</a>
                                    <?php } ?>
                                </td>
                                <td><?php echo $row['category']; ?></td>
                                <td>
                                    <a href="editPortfolio.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="listPortfolio.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="7" class="text-center">No portfolios found</td>
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
