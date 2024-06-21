<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Seller Center</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">



</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                            </span>
                            <?php
                            session_start(); // Mulai sesi

                            // Periksa apakah pengguna sudah login
                            if (!isset($_SESSION['name'])) {
                                // Jika tidak, arahkan pengguna kembali ke halaman login atau lakukan penanganan lainnya
                                header("Location: login.html");
                                exit; // Pastikan untuk keluar setelah melakukan pengalihan
                            }

                            // Di sini, Anda dapat menggunakan $_SESSION['name'] untuk menampilkan nama pengguna
                            ?>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['name']; ?></strong>
                                    </span> <span class="text-muted text-xs block">Seller <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="buyer_mainpage.php">Change to Buyer</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            RT
                        </div>
                    </li>
                    <li>
                        <a href="seller_dashboard.php"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-product-hunt"></i> <span class="nav-label">Products</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="seller_products.php">Your Products</a></li>
                            <li><a href="seller_add_product.php">Add a Product</a></li>
                            <li><a href="seller_productstatus.php">Product Status</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="seller_add_discount.php"><i class="fa fa-dollar"></i> <span class="nav-label">Opsi Discount</span></a>
                    </li>
                    <li>
                        <a href="seller_profile.php"><i class="fa fa-inbox"></i> <span class="nav-label">Profile</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.php">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to RumahTani <?php echo $_SESSION['name']; ?> !</span>
                        </li>
                        <li>
                            <a href="login.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <h1 class="m-b-xs">Rp
                                        <?php
                                        include "./controller/connection.php";

                                        // Query untuk mengambil total income dari tabel order_items
                                        $query = "SELECT SUM(amount) as total_income FROM order_items";
                                        $result = $koneksi->query($query);
                                        $row = $result->fetch_assoc();

                                        // Menampilkan total income
                                        echo $row['total_income'];
                                        ?>
                                    </h1>
                                    <h3 class="font-bold no-margins">
                                        Grafik Penjualan
                                    </h3>
                                </div>
                                <div>
                                    <canvas id="lineChart" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Monthly</span>
                                <h5>Visits</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 id="monthly-orders" class="no-margins">
                                    <?php
                                    include "./controller/connection.php";

                                    // Query untuk mengambil jumlah visit bulan ini dari tabel page_visits
                                    $query = "SELECT COUNT(*) as total_visits FROM page_visits WHERE MONTH(visit_time) = MONTH(CURRENT_DATE()) AND YEAR(visit_time) = YEAR(CURRENT_DATE())";
                                    $result = $koneksi->query($query);
                                    $row = $result->fetch_assoc();

                                    // Menampilkan jumlah visit
                                    echo $row['total_visits'];
                                    ?>
                                </h1>
                                <div class="stat-percent font-bold text-info">40% <i class="fa fa-level-up"></i></div>
                                <small>New orders</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Monthly</span>
                                <h5>Orders</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 id="total-orders" class="no-margins">
                                    <?php
                                    include "./controller/connection.php";

                                    // Query untuk mengambil total order dari tabel order_items
                                    $query = "SELECT COUNT(*) as total_orders FROM order_items";
                                    $result = $koneksi->query($query);
                                    $row = $result->fetch_assoc();

                                    // Menampilkan total order
                                    echo $row['total_orders'];
                                    ?>
                                </h1>
                                <div class="stat-percent font-bold text-info">40% <i class="fa fa-level-up"></i></div>
                                <small>New orders</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-warning pull-right">Annual</span>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 id="total-income" class="no-margins">Rp
                                    <?php
                                    include "./controller/connection.php";

                                    // Query untuk mengambil total income dari tabel order_items
                                    $query = "SELECT SUM(amount) as total_income FROM order_items";
                                    $result = $koneksi->query($query);
                                    $row = $result->fetch_assoc();

                                    // Menampilkan total income
                                    echo $row['total_income'];
                                    ?>
                                </h1>
                                <div class="stat-percent font-bold text-warning">16% <i class="fa fa-level-up"></i></div>
                                <small>New orders</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Produk Anda</h2>
                    </div>
                    <div class="col-lg-2">
                        <!-- Tambahkan tombol Download Laporan disini -->
                        <a href="./controller/controller_download.php" class="btn btn-primary pull-right">Download Laporan</a>
                    </div>
                </div>
                <div class="row">
                    <?php
                    include "./controller/connection.php";

                    // Query untuk mengambil semua data produk
                    $query = "SELECT * FROM product";
                    $result = $koneksi->query($query);
                    ?>
                    <?php while ($product = $result->fetch_assoc()) :
                    ?>
                        <form id="form" role="form" action="/controller/controller_editproduct.php" method="POST" class="wizard-big">
                            <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
                        </form>
                        <div class='col-md-3'>
                            <div class='ibox-content product-box'>
                                <div class='product-imitation'>
                                    <img src="<?= "dokumen/" . $product['file'] ?>" alt="">
                                </div> <!-- Ganti 'info' dengan nama kolom yang sesuai -->
                                <div class='product-desc'>
                                    <span class='product-price'>Rp<?= $product['price'] ?></span>
                                    <small class='text-muted'><?= $product['id_category'] ?></small> <!-- Ganti 'category' dengan nama kolom yang sesuai -->
                                    <a href='#' class='product-name'> <?= $product['name'] ?></a>
                                    <div class='small m-t-xs'>
                                        <?= $product['desc'] ?> <!-- Ganti 'description' dengan nama kolom yang sesuai -->
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href='seller_product_delete.php?id=<?= $product['id_product'] ?>' class='btn btn-xs btn-outline btn-danger'>Delete</i></a>
                                        <a href='seller_product_edit.php?id=<?= $product['id_product'] ?>' class='btn btn-xs btn-outline btn-primary'>Edit <i class='fa fa-long-arrow-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Tutup div col-md-3 -->
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="footer">
                <div>
                    <strong>Copyright</strong> RumahTani &copy; 2023 - 2024
                </div>
            </div>
        </div>
    </div>
    </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <script>
        $(document).ready(function() {

            var lineData = {
                labels: [
                    <?php
                    // Membuat array labels dengan tanggal dari 1 sampai 30
                    for ($i = 1; $i <= 30; $i++) {
                        echo "'$i',";
                    }
                    ?>
                ],
                datasets: [{
                        label: "Visits",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [
                            <?php
                            include "./controller/connection.php";
                            for ($i = 1; $i <= 30; $i++) {
                                $query = "SELECT COUNT(*) as total_visits FROM page_visits WHERE DAY(visit_time) = $i AND MONTH(visit_time) = MONTH(CURRENT_DATE()) AND YEAR(visit_time) = YEAR(CURRENT_DATE())";
                                $result = $koneksi->query($query);
                                $row = $result->fetch_assoc();
                                echo ($row['total_visits'] * 10000) . ','; // Mengalikan total_visits dengan 100
                            }
                            ?>
                        ]
                    },
                    {
                        label: "Income",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [
                            <?php
                            for ($i = 1; $i <= 30; $i++) {
                                $query = "SELECT SUM(amount) as total_income FROM order_items";
                                $result = $koneksi->query($query);
                                $row = $result->fetch_assoc();
                                echo $row['total_income'] . ',';
                            }
                            ?>
                        ]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {
                type: 'line',
                data: lineData,
                options: lineOptions
            });

        });
    </script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

</body>

</html>