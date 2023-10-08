<?php
include("authentication.php");
include("database.php");


if (isset($_GET['action']) && $_GET['action'] == 'addPass') {
    $id = $_GET['id'];

    $sql = "
    SELECT * 
    FROM forget_password
    WHERE forgetPassID = '" . $id . "'
    ";


    $result = $conn->query($sql);
    if (!$result) {
        echo "wrong sql command";
        exit;
    }



    $memberForgetPass = $result->fetch_assoc();
}


if (isset($_POST['saveButton'])) {

    $sql = "
    UPDATE forget_password SET 
    confirmPass = '" . $_POST['confirmPass'] . "'
    WHERE forgetPassID = '" . $_POST['id'] . "'
    ";

    $result = $conn->query($sql);
    if (!$result) {
        echo "wrong sql command";
        exit;
    }
    header("location: memberForgetPass.php");
    exit;

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pages - Admin Dashboard UI Kit - Blank Page</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <link href="assets/plugins/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css"
        media="all" />
    <!--[if lte IE 9]>
    <link href="assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
    <![endif]-->
</head>

<body class="fixed-header ">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
        <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
        <div class="sidebar-overlay-slide from-top" id="appMenu">
            <div class="row">
                <div class="col-xs-6 no-padding">
                    <a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
                    </a>
                </div>
                <div class="col-xs-6 no-padding">
                    <a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 m-t-20 no-padding">
                    <a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
                    </a>
                </div>
                <div class="col-xs-6 m-t-20 no-padding">
                    <a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
                    </a>
                </div>
            </div>
        </div>
        <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
        <!-- BEGIN SIDEBAR MENU HEADER-->
        <div class="sidebar-header" style="background-color:  #a47454;">
            <img src="assets/img/logoK.jpg" alt="logo" class="brand" data-src="assets/img/logoK.jpg" width="78"
                height="22">
            <div class="sidebar-header-controls">

                <button style="color: aliceblue;" type="button" class="btn btn-link visible-lg-inline"
                    data-toggle-pin="sidebar"><i class="fa fs-12"></i>
                </button>
            </div>
        </div>
        <!-- END SIDEBAR MENU HEADER-->
        <?php include("side_menu.php") ?>
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
        <?php include("header.php") ?>
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">
            <!-- START PAGE CONTENT -->
            <div class="content ">
                <!-- START JUMBOTRON -->
                <div class="jumbotron" data-pages="parallax">
                    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                        <div class="inner">
                            <!-- START BREADCRUMB -->
                            <ul class="breadcrumb">
                                <li><a>KoraenUp</a>
                                </li>
                                <li>
                                    <a href="memberForgetPass.php">สมาชิกลืมรหัสผ่าน</a>
                                </li>
                                <li><a href="#" class="active">ส่งรหัสยืนยัน

                                    </a>
                                </li>
                            </ul>
                            <!-- END BREADCRUMB -->
                        </div>
                    </div>
                </div>
                <!-- END JUMBOTRON -->
                <!-- START CONTAINER FLUID -->
                <div class="container-fluid container-fixed-lg">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->

                    <!-- START CONTAINER FLUID -->
                    <div class="container-fluid container-fixed-lg">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-5">
                                <!-- START PANEL -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title"
                                            style="font-family: 'K2D', sans-serif; font-size: 18px">
                                            ส่งรหัสยืนยัน
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" method="post" id="editCourse" enctype="multipart/form-data">
                                            <input type="hidden" name="id" id="id"
                                                value="<?php echo $memberForgetPass['forgetPassID'] ?>">
                                            <div>
                                                <label>รหัสสมาชิก: </label>
                                                <!-- <span class="help">e.g. "Mona Lisa Portrait"</span> -->
                                                <label>
                                                    <?php echo $memberForgetPass['memberID'] ?>
                                                </label>
                                            </div>
                                            <div>
                                                <label>ชื่อผู้ใช้งาน: </label>
                                                <!-- <span class="help">e.g. "Mona Lisa Portrait"</span> -->
                                                <label>
                                                    <?php echo $memberForgetPass['username'] ?>
                                                </label>
                                            </div>
                                            <div>
                                                <label>อีเมล: </label>
                                                <!-- <span class="help">e.g. "some@example.com"</span> -->
                                                <label>
                                                    <?php echo $memberForgetPass['email'] ?>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    style="font-family: 'K2D', sans-serif; font-size: 14px">รหัสยืนยัน</label>
                                                <!-- <span class="help">e.g. "Mona Lisa Portrait"</span> -->
                                                <input type="text" id="confirmPass" name="confirmPass"
                                                    value="<?php echo $memberForgetPass['confirmPass'] ?>">
                                            </div>
                                            <button style="background-color: #FFB09F; text-align: center;"
                                                class="btn btn-primary btn-cons m-t-10 pull-right" type="submit"
                                                name="saveButton">บันทึก</button>
                                            <a style="background-color: #ff4e4e; text-align: center; font-family: 'K2D', sans-serif;"
                                                class="btn btn-primary btn-cons m-t-10 pull-right"
                                                href="memberForgetPass.php">ยกเลิก</a>
                                        </form>
                                    </div>
                                </div>

                                <!-- END PANEL -->
                            </div>

                        </div>
                    </div>
                    <!-- END CONTAINER FLUID -->
                    <!-- END PLACE PAGE CONTENT HERE -->
                </div>
                <!-- END CONTAINER FLUID -->
            </div>
            <!-- END PAGE CONTENT -->
            <?php include("footer.php") ?>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- BEGIN VENDOR JS -->
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="assets/plugins/classie/classie.js"></script>
    <script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->

    <!-- Bootstarp plugin -->
    <script src="assets/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="assets/plugins/bootstrap-fileinput/themes/fa/theme.js"></script>
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script>
        $(function () {
        })

    </script>
</body>

</html>