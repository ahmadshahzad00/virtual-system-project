<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompanyName</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Section Custom Styles */
        .hero-section {
            position: relative;
            background: url('/company_website/assets/images/hero-bg.jpg') center center/cover no-repeat;
            height: 50vh;
            display: flex;
            align-items: center;
            color: #fff;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container text-center hero-content">
        <h1 class="display-4 fw-bold mb-3">WEB TEC Company</h1>
        <p class="lead mb-4">We provide professional Web Developer for Your Idea</p>
        <a href="/company_website/user/aboutUs.php" class="btn btn-primary btn-lg">Learn More</a>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
