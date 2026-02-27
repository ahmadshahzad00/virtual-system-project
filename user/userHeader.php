<?php
// userHeader.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Tec</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/company_website/assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top"
     style="background: linear-gradient(90deg, #0d3b66, #1e6091);">
  <div class="container">

    <!-- Logo -->
    <a class="navbar-brand fw-bold fs-4 text-white" href="/company_website/index.php">
      WEB TEC
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler border-0" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">

        <li class="nav-item">
          <a class="nav-link text-white px-3" href="/company_website/index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white px-3" href="/company_website/user/aboutUs.php">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white px-3" href="/company_website/user/services.php">Services</a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link text-white px-3" href="/company_website/portfolio.php">Portfolio</a>
        </li> -->

        <!-- Contact Button Style -->
        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
          <a class="btn btn-light px-4 fw-semibold" 
             href="/company_website/user/contactUs.php">
             Contact Us
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

