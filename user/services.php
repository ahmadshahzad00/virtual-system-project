<?php 
include("../config/db.php");
include("userHeader.php");

// Fetch services
$query = "SELECT * FROM services ORDER BY display_order ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (for icons column) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .service-card {
            transition: 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .service-icon {
            font-size: 40px;
            color: #1e6091;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="text-white text-center py-5"
         style="background: linear-gradient(135deg, #0d3b66, #1e6091);">
    <div class="container">
        <h1 class="fw-bold">Our Services</h1>
        <p class="lead">Professional solutions tailored to your business needs</p>
    </div>
</section>

<!-- Services Section -->
<div class="container my-5">
    <div class="row g-4">

        <?php if ($result && mysqli_num_rows($result) > 0) { ?>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="col-lg-4 col-md-6">
                    <div class="card service-card h-100 shadow-sm border-0 text-center p-4">

                        <!-- Icon -->
                        <div class="mb-3">
                            <i class="<?php echo $row['icon']; ?> service-icon"></i>
                        </div>

                        <!-- Title -->
                        <h5 class="fw-bold mb-3">
                            <?php echo $row['title']; ?>
                        </h5>

                        <!-- Description -->
                        <p class="text-muted">
                            <?php echo substr($row['description'], 0, 150); ?>...
                        </p>

                    </div>
                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="col-12 text-center">
                <p>No services available at the moment.</p>
            </div>

        <?php } ?>

    </div>
</div>

<?php include("userFooter.php"); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
