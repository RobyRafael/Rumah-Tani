<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Seller Center</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

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
                    <h2>Product Details</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <?php
            include "./controller/connection.php";
            // Mengambil ID produk dari URL
            $id_product = $_GET['id'];
            // Query untuk mengambil data produk
            $query = "SELECT * FROM product WHERE id_product = ?";
            $stmt = $koneksi->prepare($query);
            $stmt->bind_param("i", $id_product); // 'i' berarti tipe data integer
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();
            ?>
            <div class="wrapper wrapper-content animated fadeInRight ecommerce">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Delete Your Product Details</h5>
                            </div>
                            <div class="ibox-content">
                                <h2>
                                    Please Enter Your Data Correctly.
                                </h2>

                                <form id="form" role="form" action="/controller/controller_deleteproduct.php" method="POST" class="wizard-big">
                                    <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
                                    <h1>Product Info</h1>
                                    <fieldset>
                                        <h2>Product Details</h2>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label>Name:</label>
                                                    <input id="userName" name="name" type="text" class="form-control required" placeholder="Product Name" value="<?= $product['name'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Price (/Kg):</label>
                                                    <input id="userName" name="price" type="text" class="form-control required" placeholder="Price" value="<?= $product['price'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description:</label>
                                                    <input id="userName" name="description" type="text" class="form-control required" placeholder="Description" value="<?= $product['desc'] ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                    <h1>Data</h1>
                                    <fieldset>
                                        <h2>Product Information</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <select name="category" id="category" class="form-control" value="<?= $product['id_category'] ?>">
                                                        <option value="1">Padi, Gandum, Jagung</option>
                                                        <option value="2">Sayur-Sayuran</option>
                                                        <option value="3">Alat Pertanian</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="discount">Discount</label>
                                                    <select name="discount" id="discount" class="form-control" value="<?= $product['id_discount'] ?>">
                                                        <option value="1">0%</option>
                                                        <option value="2">10%</option>
                                                        <option value="3">30%</option>
                                                        <option value="4">70%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="minQuantity">Minimum quantity: (Kilogram)</label>
                                                    <input type="text" id="minQuantity" class="form-control" name="minQuantity" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status:</label>
                                                    <select id="status" class="form-control" name="status">
                                                        <option>Ready</option>
                                                        <option>Pre-Order</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Image</label>
                                                    <input type="file" name="gambar" class="form-control" id="fileInput">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="footer">
                <div>
                    <strong>Copyright</strong> RumahTani &copy; 2023-2024
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

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>

    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <script>
        $(document).ready(function() {

            $('.summernote').summernote();

            $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });

        $(document).ready(function() {
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function(event, currentIndex, newIndex) {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18) {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function(event, currentIndex, priorIndex) {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3) {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function(event, currentIndex) {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function(error, element) {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
        });
    </script>

</body>

</html>