<?php 
include("config/db.php");

// Fetch team members
$query = "SELECT * FROM teammembers ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Hero Section -->
<section class="text-white text-center py-5" 
    style="background: linear-gradient(135deg, #0d3b66, #1e6091);">
    <div class="container">
        <h1 class="fw-bold">Meet Our Team</h1>
        <p class="lead">Dedicated professionals behind our success</p>
    </div>
</section>

<!-- Team Section -->
<div class="container my-5">
    <div class="row g-4">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">

                    <!-- Team Image -->
                   <?php if ($row['photo']) { ?>
                        <img src="./assets/images/team/<?php echo $row['photo']; ?>" 
                            class="card-img-top"
                            style="height:300px; object-fit:cover;"
                            alt="<?php echo $row['name']; ?>">
                    <?php } else { ?>
                        <img src="../assets/images/no-image.png" 
                            class="card-img-top"
                            style="height:300px; object-fit:cover;"
                            alt="No Image">
                    <?php } ?>

                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">
                            <?php echo $row['name']; ?>
                        </h5>

                        <p class="text-primary mb-2">
                            <?php echo $row['designation']; ?>
                        </p>

                        <p class="card-text text-muted">
                            <?php echo $row['bio']; ?>
                        </p>
                    </div>

                </div>
            </div>

        <?php } ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
