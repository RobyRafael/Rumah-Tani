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


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RumahTani | Home</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">



</head>

<body class="">

    <div id="wrapper">
        <div id="" class="gray-bg">
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
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="text-muted text-xs block">Welcome <?php echo $_SESSION['name']; ?> !<b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="seller_dashboard.php">Toko Saya</a></li>
                                <li><a href="user_alamat.php">Alamat Saya</a></li>
                                <li><a href="seller_profile.php">Akun Saya</a></li>
                            </ul>
                        </li>
                        <li>
                            <!-- <a class="dropdown-toggle count-info" data-toggle="dropdown" href="buyer-cart.php">
                            <i class="fa fa-shopping-cart"></i> <span class="label label-warning">16</span> -->
                            <a class="count-info" href="buyer-cart.php">
                                <i class="fa fa-shopping-cart"></i> <span class="label label-warning">16</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-truck"></i> <span class="label label-warning">0</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.php" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="pull-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.php" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.php" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.php">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.php">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.php">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="grid_options.php">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.php">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
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
                <div class="col-lg-12">
                    <h2>Kamu Cari Apa ?</h2>
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
                                    <img src="<?= "dokumen/" . $product['file'] ?>" alt="">
                                </div> <!-- Ganti 'info' dengan nama kolom yang sesuai -->
                                <div class='product-desc'>
                                    <span class='product-price'>Rp<?= $product['price'] ?>/kg</span>
                                    <small class='text-muted'><?= $product['id_category'] ?></small> <!-- Ganti 'category' dengan nama kolom yang sesuai -->
                                    <a href='#' class='product-name'> <?= $product['name'] ?></a>
                                    <div class='small m-t-xs'>
                                        <?= $product['desc'] ?> <!-- Ganti 'description' dengan nama kolom yang sesuai -->
                                    </div>
                                    <form method="POST" enctype="multipart/form-data" action="controller_add_cart.php">
                                        <a href='seller_product_edit.php?id=<?= $product['id_product'] ?>' class='btn btn-xs btn-outline btn-primary'><i class='fa fa-shopping-cart'></i></a>
                                        <input type="hidden" >
                                    </form>
                                </div>
                            </div>
                        </div> <!-- Tutup div col-md-3 -->
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

</body>

</html>