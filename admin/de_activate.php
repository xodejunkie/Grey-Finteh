<?php
require_once("inc/connect.php");
require_once("inc/functions.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin_login.html");
    exit;
}

$settings = fetch_settings($con);
if (!$settings) {
    echo "Failed to fetch site settings.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["active"])) {
        $email = $_POST["email"];
        $message = updateCodeStatus($con, $email, '1');
        echo '<script>
            alert("' . $message . '");
            window.location.href = "de_activate.php";
        </script>';
    }

    if (isset($_POST["deactive"])) {
        $email = $_POST["email"];
        $message = updateCodeStatus($con, $email, '0');
        echo '<script>
            alert("' . $message . '");
            window.location.href = "de_activate.php";
        </script>';
    }
}

// Pagination setup
$results_per_page = 10;
$sql = "SELECT COUNT(*) AS total FROM users";
$result = $con->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
$total_users = $row['total'];
$total_pages = ceil($total_users / $results_per_page);

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$page = min($page, $total_pages);

$offset = ($page - 1) * $results_per_page;

$query = $con->query("SELECT email, code_active FROM users LIMIT $offset, $results_per_page");
?>

<?php include('inc/header.php'); ?>

        <div class="content-page">
            <div class="content">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <form class="d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                            <i class="mdi mdi-calendar-range font-13"></i>
                                        </span>
                                    </div>
                                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                        <i class="mdi mdi-autorenew"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                        <i class="mdi mdi-filter-variant"></i>
                                    </a>
                                </form>
                            </div>
                            <h4 class="page-title">Admin Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-5 col-lg-6">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card widget-flat">
                                        <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-lg-6">
                                <div class="card widget-flat">
                                    <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> <!-- end row -->

                        <div class="row">
                            <!-- end col-->

                            <!-- end col-->
                        </div> <!-- end row -->

                    </div> <!-- end col -->

                        <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                
                                <h4 class="header-title mb-3">Enable / Disable Code</h4>
                                <form action="de_activate.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 mb-3 position-relative" id="datepicker1">
                                            <label class="form-label">Select Email</label>
                                            <select class="form-select" aria-label="Default select example" name="email">
                                                <option selected>Select Email</option>
                                                <?php
                                                $emailQuery = $con->query("SELECT email FROM users");
                                                while ($link_mail = $emailQuery->fetch(PDO::FETCH_ASSOC)) {
                                                    echo'<option>'.$link_mail["email"].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" name="active" class="btn btn-success" style="width: 100%; font-weight: bolder;">Activate Account</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" name="deactive" class="btn btn-danger" style="width: 100%; font-weight: bolder;">Deactivate Account</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Current Code Status</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Code Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($link = $query->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<tr>
                                                <td>' . $link["email"] . '</td>
                                                <td>' . ($link["code_active"] == '1' ? 'Enabled' : 'Disabled') . '</td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- Pagination Links -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <?php if ($page > 1): ?>
                                            <li class="page-item"><a class="page-link" href="de_activate.php?page=<?php echo $page-1; ?>">Previous</a></li>
                                        <?php endif; ?>
                                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                            <li class="page-item <?php if ($page == $i) echo 'active'; ?>"><a class="page-link" href="de_activate.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php endfor; ?>
                                        <?php if ($page < $total_pages): ?>
                                            <li class="page-item"><a class="page-link" href="de_activate.php?page=<?php echo $page+1; ?>">Next</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->
            </div> <!-- End Content -->
            
<?php include('inc/footer.php'); ?>
