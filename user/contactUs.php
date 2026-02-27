<?php 
include("../config/db.php");   // Adjust path if needed
include("userHeader.php"); 
include("herosection.php"); 

$message = "";

// Handle form submission
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO contactmessages (name, email, phone, subject, message)
              VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Message Sent Successfully');</script>";
    } else {
        echo "<script>alert('Error Occurred');</script>";
    }
}

?>

<!-- Contact Section -->
<div class="container my-5">
    <div class="row align-items-stretch">

        <!-- Image Side -->
       <div class="col-md-6 mb-4 mb-md-0">
            <img src="/company_website/assets/images/contact-us.jpg" 
                alt="About Us" 
                class="img-fluid rounded shadow-lg" 
                style="width: 100%; height: 434px; margin-top: 135px; object-fit: cover;">
        </div>


        <!-- Form Side -->
        <div class="col-md-6 py-5">
            <div class="px-4 px-md-5">
                <h1 class="mb-3">Get in Touch</h1>
                <p class="mb-4">
                    Have any questions or inquiries? Fill out the form below and we’ll respond as soon as possible.
                </p>

                <!-- Show Message -->
                <?php if ($message) { echo $message; } ?>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control" rows="5" required></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary w-100">
                                Send Message
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("userFooter.php"); ?>
