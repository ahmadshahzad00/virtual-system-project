<?php
session_start();
include "../config/db.php";

// Protect page (optional)
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Count queries
$teamCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM teammembers"));
$serviceCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM services"));
$portfolioCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM portfolios"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">

    <style>
        .clock-box {
            background: #0d6efd;
            color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .calendar-box {
            background: #198754;
            color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

<?php include("sidebar.php"); ?>

<div class="main-content">
<?php include("header.php"); ?>

<div class="container-fluid mt-4">

    <h3 class="mb-4">Dashboard Overview</h3>

    <div class="row mb-4">

        <!-- Team Count -->
        <div class="col-md-4">
            <div class="card dashboard-card bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Total Team Members</h5>
                    <h2><?php echo $teamCount; ?></h2>
                </div>
            </div>
        </div>

        <!-- Services Count -->
        <div class="col-md-4">
            <div class="card dashboard-card bg-success text-white shadow">
                <div class="card-body">
                    <h5>Total Services</h5>
                    <h2><?php echo $serviceCount; ?></h2>
                </div>
            </div>
        </div>

        <!-- Portfolio Count -->
        <div class="col-md-4">
            <div class="card dashboard-card bg-warning text-white shadow">
                <div class="card-body">
                    <h5>Portfolio Items</h5>
                    <h2><?php echo $portfolioCount; ?></h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Clock + Calendar -->
    <div class="row">

        <div class="col-md-6">
            <div class="clock-box shadow">
                <h4>Time</h4>
                <h2 id="clock"></h2>
            </div>
        </div>

        <div class="col-md-6">
            <div class="calendar-box shadow">
                <h4>Today’s Date</h4>
                <h2 id="calendar"></h2>
            </div>
        </div>

    </div>

</div>

<?php include("footer.php"); ?>
</div>

<!-- JavaScript Clock -->
<script>
function updateClock() {
    const now = new Date();

    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();

    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    document.getElementById("clock").innerText = `${hours}:${minutes}:${seconds}`;
}

setInterval(updateClock, 1000);
updateClock();

// Calendar
const today = new Date();
const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
document.getElementById("calendar").innerText = today.toLocaleDateString(undefined, options);
</script>

</body>
</html>
