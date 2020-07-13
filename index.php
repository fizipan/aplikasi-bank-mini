<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bank SMKN 17</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Bank SMKN 17</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="logout.php" class="btn btn-danger square-btn-adjust" id="logout">Logout</a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a href="?halaman=dashboard"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="?halaman=masuk"><i class="glyphicon glyphicon-floppy-save"></i> Kas Masuk</a>
                    </li>
                    <li>
                        <a href="?halaman=keluar"><i class="glyphicon glyphicon-floppy-open"></i> Kas Keluar</a>
                    </li>
                    <li>
                        <a href="?halaman=rekap"><i class="glyphicon glyphicon-th-list"></i> Rekapitulasi Kas</a>
                    </li>
                    <li>
                        <a href="?halaman=user"><i class="glyphicon glyphicon-user"></i>Management User</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="glyphicon glyphicon-log-in"></i>Logout</a>
                    </li>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php if (isset($_GET["halaman"])) {
                    if ($_GET["halaman"] == "dashboard") {
                        include "dashboard.php";
                    } elseif ($_GET["halaman"] == "masuk") {
                        include "masuk.php";
                    } elseif ($_GET["halaman"] == "keluar") {
                        include "keluar.php";
                    } elseif ($_GET["halaman"] == "rekap") {
                        include "rekap.php";
                    } elseif ($_GET["halaman"] == "user") {
                        include "user.php";
                    } elseif ($_GET["halaman"] == "hapus") {
                        include "hapus.php";
                    } elseif ($_GET["halaman"] == "edit") {
                        include "edit.php";
                    } elseif ($_GET["halaman"] == "hapus_keluar") {
                        include "hapus_keluar.php";
                    } elseif ($_GET["halaman"] == "edit_keluar") {
                        include "edit_keluar.php";
                    }
                } else {
                    include "dashboard.php";
                } ?>
            </div>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />

    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/script.js"></script>


</body>

</html>