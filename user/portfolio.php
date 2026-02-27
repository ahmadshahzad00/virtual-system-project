<?php 
include("config/db.php");

// Fetch portfolios
$query = "SELECT * FROM portfolios ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .portfolio-card img {
            height: 250px;
            object-fit: cover;
        }
        .portfolio-card {
            transition: 0.3s ease;
        }
        .portfolio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="text-white text-center py-5"
         style="background: linear-gradient(135deg, #0d3b66, #1e6091);">
    <div class="container">
        <h1 class="fw-bold">Our Portfolio</h1>
        <p class="lead">Explore our latest projects and successful works</p>
    </div>
</section>

<!-- Portfolio Section -->
<div class="container my-5">
    <div class="row g-4">

        <?php if ($result && mysqli_num_rows($result) > 0) { ?>
            
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="col-lg-4 col-md-6">
                    <div class="card portfolio-card h-100 shadow-sm border-0">

                        <!-- Image -->
                        <?php if ($row['image']) { ?>
                            <img src="assets/images/portfolio/<?php echo $row['image']; ?>" 
                                 class="card-img-top"
                                 alt="<?php echo $row['title']; ?>">
                        <?php } else { ?>
                            <img src="assets/images/no-image.png" 
                                 class="card-img-top"
                                 alt="No Image">
                        <?php } ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">
                                <?php echo $row['title']; ?>
                            </h5>

                            <p class="card-text text-muted">
                                <?php echo substr($row['description'], 0, 120); ?>...
                            </p>

                            <div class="mt-auto">
                                <?php if ($row['project_url']) { ?>
                                    <a href="<?php echo $row['project_url']; ?>" 
                                       target="_blank"
                                       class="btn btn-primary w-100">
                                       View Project
                                    </a>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="col-12 text-center">
                <p>No portfolio items available.</p>
            </div>

        <?php } ?>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
