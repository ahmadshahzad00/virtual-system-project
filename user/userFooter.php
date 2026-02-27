<?php
// userFooter.php
?>
<footer class="bg-dark text-light pt-5">
  <div class="container">
    <div class="row">

      <!-- Quick Links -->
      <div class="col-md-6 mb-3">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="/company_website/index.php" class="text-light text-decoration-none">Home</a></li>
          <li><a href="/company_website/user/aboutUs.php" class="text-light text-decoration-none">About</a></li>
          <li><a href="/company_website/user/services.php" class="text-light text-decoration-none">Services</a></li>
          <!-- <li><a href="/company_website/portfolio.php" class="text-light text-decoration-none">Portfolio</a></li> -->
          <li><a href="/company_website/user/contactUs.php" class="text-light text-decoration-none">Contact</a></li>
        </ul>
      </div>

      <!-- Subscribe -->
      <div class="col-md-6 mb-3">
        <h5>Subscribe to Our Newsletter</h5>
        <form method="POST" class="d-flex">
          <input type="email" name="email" class="form-control me-2" placeholder="Enter your email" required>
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
      </div>

    </div>

    <div class="text-center pt-3 pb-3 border-top border-secondary">
      &copy; <?php echo date("Y"); ?> CompanyName. All rights reserved.
    </div>
  </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
