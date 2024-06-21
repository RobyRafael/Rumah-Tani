<?php
session_start(); // Mulai sesi

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['name'])) {
    // Jika tidak, arahkan pengguna kembali ke halaman login atau lakukan penanganan lainnya
    header("Location: login.html");
    exit; // Pastikan untuk keluar setelah melakukan pengalihan
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | E-commerce</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>

<body>

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
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Fairuz Ardhan Haunan</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
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
                <div class="col-lg-10">
                    <h2>E-commerce shoping cart</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="mainpage.php">Home</a>
                        </li>
                        <li>
                            <a>E-commerce</a>
                        </li>
                        <li class="active">
                            <strong>Shoping cart</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">



                <div class="row">
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table shoping-cart-table">
                                <tbody>
                                    <?php
                                    include "./controller/connection.php";
                                    $user_id = $_SESSION['id_user']; // asumsikan Anda memiliki session untuk ID pengguna
                                    $query = "SELECT * FROM cart_item WHERE id_user = $user_id"; // Query untuk mengambil data keranjang belanja pengguna
                                    $result = $koneksi->query($query);
                                    while ($row = $result->fetch_assoc()) {
                                        // Ambil data produk berdasarkan id_product dari cart_item
                                        $product_query = "SELECT * FROM product WHERE id_product = " . $row['id_product'];
                                        $product_result = $koneksi->query($product_query);
                                        $product_row = $product_result->fetch_assoc();
                                        echo "<tr>";
                                        echo "<td width='90'><div class='cart-product-imitation'></div></td>";
                                        echo "<td class='desc'>";
                                        echo "<h3><a href='#' class='text-navy'>" . $product_row['name'] . "</a></h3>"; // Nama produk
                                        echo "<div class='m-t-sm'><a href='#' class='text-muted'><i class='fa fa-trash'></i> Remove item</a></div>";
                                        echo "</td>";
                                        echo "<td width='65'><input type='text' class='form-control' value='" . $row['quantity'] . "'></td>"; // Kuantitas
                                        echo "<td><h4>$" . $product_row['price'] . "</h4></td>"; // Harga
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Cart Summary</h5>
                            </div>
                            <div class="ibox-content">
                                <span>
                                    Total
                                </span>
                                <h2 class="font-bold">
                                    $390,00
                                </h2>

                                <hr />
                                <span class="text-muted small">
                                    *For United States, France and Germany applicable sales tax will be applied
                                </span>
                                <div class="m-t-sm">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
                                        <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Support</h5>
                            </div>
                            <div class="ibox-content text-center">



                                <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                                <span class="small">
                                    Please contact with us if you have any questions. We are avalible 24h.
                                </span>


                            </div>
                        </div>

                        <div class="ibox">
                            <div class="ibox-content">
                                <p>Other Products You May Be Interested In</p>
                                <br>
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
                                            <div class="d-flex justify-content-between">
                                                <a href='seller_product_edit.php?id=<?= $product['id_product'] ?>' class='btn btn-xs btn-outline btn-primary'><i class='fa fa-shopping-cart'></i></a>
                                            </div>
                                        </div>
                                    </div> <!-- Tutup div col-md-3 -->
                                <?php endwhile; ?>
                            </div>
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