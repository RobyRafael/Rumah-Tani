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
                    <h2>Your Products</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <?php include "./controller/connection.php";

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
                                    <img alt="image" class="img-responsive" src="<?= "./controller/dokumen/" . $product['file'] ?>">
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
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2017
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
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 80, 81, 56, 55, 40]
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