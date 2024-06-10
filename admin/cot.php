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

// Pagination setup
$results_per_page = 20;
$total_results = $con->query("SELECT COUNT(*) FROM `users` WHERE tac IS NOT NULL")->fetchColumn();
$total_pages = ceil($total_results / $results_per_page);

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$page = min($page, $total_pages);

$offset = ($page - 1) * $results_per_page;

$stmt = $con->prepare("SELECT * FROM `users` WHERE tac IS NOT NULL ORDER BY `id` DESC LIMIT :offset, :results_per_page");
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);
$stmt->execute();
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
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">COT Code</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width:14.28%;">Email</th>
                                    <th style="width:14.28%;">Code</th>
                                    <th style="width:14.28%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($link = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '
                                    <tr>
                                    <td>'.$link["email"].'</td>
                                    <td>'.$link["tac"].'</td>
                                    <td class="table-action">
                                        <a href="delete_code.php?id='.$link["id"].'&type=cot">Delete</a>
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
                                    <li class="page-item"><a class="page-link" href="cot.php?page=<?php echo $page-1; ?>">Previous</a></li>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?php if ($page == $i) echo 'active'; ?>"><a class="page-link" href="cot.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php endfor; ?>
                                <?php if ($page < $total_pages): ?>
                                    <li class="page-item"><a class="page-link" href="cot.php?page=<?php echo $page+1; ?>">Next</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            <!-- end col-->
        </div> <!-- end row -->
    </div> <!-- End Content -->
<?php include('inc/footer.php'); ?>
