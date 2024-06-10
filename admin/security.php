<?php
require("inc/connect.php");
require("inc/functions.php");
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

// Pagination setup
$results_per_page = 20;
$sql = "SELECT COUNT(id) AS total FROM users";
$result = $con->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
$total_security_entries = $row['total'];
$total_pages = ceil($total_security_entries / $results_per_page);

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$page = min($page, $total_pages);

$offset = ($page - 1) * $results_per_page;

$query = $con->query("SELECT * FROM users ORDER BY id DESC LIMIT $offset, $results_per_page");
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
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Security Details</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width:14.28%;">Email</th>
                                    <!-- <th style="width:14.28%;">Security Question</th>
                                    <th style="width:14.28%;">Answer</th> -->
                                    <th style="width:14.28%;">Username</th>
                                    <th style="width:14.28%;">Password</th>
                                    <th style="width:14.28%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($link = $query->fetch(PDO::FETCH_ASSOC)) {
                                    echo '
                                    <tr>
                                        <td>'.$link["email"].'</td>
                                        <td>'.$link["username"].'</td>
                                        <td>'.$link["password"].'</td>
                                        <td class="table-action">
                                            <a href="delete_security.php?email='.$link["email"].'">Delete</a>
                                            <a href="edit_security.php?email='.$link["email"].'">Edit</a>
                                        </td>
                                    </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <?php if ($page > 1): ?>
                                    <li class="page-item"><a class="page-link" href="security.php?page=<?php echo $page-1; ?>">Previous</a></li>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?php if ($page == $i) echo 'active'; ?>"><a class="page-link" href="security.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php endfor; ?>
                                <?php if ($page < $total_pages): ?>
                                    <li class="page-item"><a class="page-link" href="security.php?page=<?php echo $page+1; ?>">Next</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>  
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div> <!-- End Content -->

</div>
<?php include('inc/footer.php'); ?>