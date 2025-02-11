<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Mailbox</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
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

            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content mailbox-content">
                                <div class="file-manager">
                                    <a class="btn btn-block btn-primary compose-mail" href="mail_compose.php">Compose Mail</a>
                                    <div class="space-25"></div>
                                    <h5>Folders</h5>
                                    <ul class="folder-list m-b-md" style="padding: 0">
                                        <li><a href="mailbox.php"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning pull-right">16</span> </a></li>
                                        <li><a href="mailbox.php"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                                        <li><a href="mailbox.php"> <i class="fa fa-certificate"></i> Important</a></li>
                                        <li><a href="mailbox.php"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-danger pull-right">2</span></a></li>
                                        <li><a href="mailbox.php"> <i class="fa fa-trash-o"></i> Trash</a></li>
                                    </ul>
                                    <h5>Categories</h5>
                                    <ul class="category-list" style="padding: 0">
                                        <li><a href="#"> <i class="fa fa-circle text-navy"></i> Work </a></li>
                                        <li><a href="#"> <i class="fa fa-circle text-danger"></i> Documents</a></li>
                                        <li><a href="#"> <i class="fa fa-circle text-primary"></i> Social</a></li>
                                        <li><a href="#"> <i class="fa fa-circle text-info"></i> Advertising</a></li>
                                        <li><a href="#"> <i class="fa fa-circle text-warning"></i> Clients</a></li>
                                    </ul>

                                    <h5 class="tag-title">Labels</h5>
                                    <ul class="tag-list" style="padding: 0">
                                        <li><a href=""><i class="fa fa-tag"></i> Family</a></li>
                                        <li><a href=""><i class="fa fa-tag"></i> Work</a></li>
                                        <li><a href=""><i class="fa fa-tag"></i> Home</a></li>
                                        <li><a href=""><i class="fa fa-tag"></i> Children</a></li>
                                        <li><a href=""><i class="fa fa-tag"></i> Holidays</a></li>
                                        <li><a href=""><i class="fa fa-tag"></i> Music</a></li>
                                        <li><a href=""><i class="fa fa-tag"></i> Photography</a></li>
                                        <li><a href=""><i class="fa fa-tag"></i> Film</a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 animated fadeInRight">
                        <div class="mail-box-header">

                            <form method="get" action="index.php" class="pull-right mail-search">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm" name="search" placeholder="Search email">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <h2>
                                Inbox (16)
                            </h2>
                            <div class="mail-tools tooltip-demo m-t-md">
                                <div class="btn-group pull-right">
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

                                </div>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                            </div>
                        </div>
                        <div class="mail-box">

                            <table class="table table-hover table-mail">
                                <tbody>
                                    <tr class="unread">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Anna Smith</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Lorem ipsum dolor noretek imit set.</a></td>
                                        <td class=""><i class="fa fa-paperclip"></i></td>
                                        <td class="text-right mail-date">6.10 AM</td>
                                    </tr>
                                    <tr class="unread">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks" checked>
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Jack Nowak</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Aldus PageMaker including versions of Lorem Ipsum.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">8.22 PM</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Facebook</a> <span class="label label-warning pull-right">Clients</span> </td>
                                        <td class="mail-subject"><a href="mail_detail.php">Many desktop publishing packages and web page editors.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">Jan 16</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Mailchip</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">There are many variations of passages of Lorem Ipsum.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">Mar 22</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Alex T.</a> <span class="label label-danger pull-right">Documents</span></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Lorem ipsum dolor noretek imit set.</a></td>
                                        <td class=""><i class="fa fa-paperclip"></i></td>
                                        <td class="text-right mail-date">December 22</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Monica Ryther</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">The standard chunk of Lorem Ipsum used.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">Jun 12</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Sandra Derick</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Contrary to popular belief.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">May 28</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Patrick Pertners</a> <span class="label label-info pull-right">Adv</span></td>
                                        <td class="mail-subject"><a href="mail_detail.php">If you are going to use a passage of Lorem </a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">May 28</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Michael Fox</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Humour, or non-characteristic words etc.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">Dec 9</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Damien Ritz</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Oor Lorem Ipsum is that it has a more-or-less normal.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">Jun 11</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Anna Smith</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Lorem ipsum dolor noretek imit set.</a></td>
                                        <td class=""><i class="fa fa-paperclip"></i></td>
                                        <td class="text-right mail-date">6.10 AM</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Jack Nowak</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Aldus PageMaker including versions of Lorem Ipsum.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">8.22 PM</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Mailchip</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">There are many variations of passages of Lorem Ipsum.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">Mar 22</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Alex T.</a> <span class="label label-warning pull-right">Clients</span></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Lorem ipsum dolor noretek imit set.</a></td>
                                        <td class=""><i class="fa fa-paperclip"></i></td>
                                        <td class="text-right mail-date">December 22</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Monica Ryther</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">The standard chunk of Lorem Ipsum used.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">Jun 12</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Sandra Derick</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Contrary to popular belief.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">May 28</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Patrick Pertners</a> </td>
                                        <td class="mail-subject"><a href="mail_detail.php">If you are going to use a passage of Lorem </a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">May 28</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Michael Fox</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Humour, or non-characteristic words etc.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">Dec 9</td>
                                    </tr>
                                    <tr class="read">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks">
                                        </td>
                                        <td class="mail-ontact"><a href="mail_detail.php">Damien Ritz</a></td>
                                        <td class="mail-subject"><a href="mail_detail.php">Oor Lorem Ipsum is that it has a more-or-less normal.</a></td>
                                        <td class=""></td>
                                        <td class="text-right mail-date">Jun 11</td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
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

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>