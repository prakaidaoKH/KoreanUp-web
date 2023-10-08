<?php
session_start();
include("database.php");

if (isset($_POST['loginButton'])) {

    $sql = "
        SELECT adminID, email,profilePic
        FROM admin
        WHERE email = '" . $_POST['email'] . "'
        AND password = '" . $_POST['password'] . "'
    ";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $_SESSION['isLogin'] = true;
        $_SESSION['admin_id'] = $admin['adminID'];
        $_SESSION['email'] = $admin['email'];
        $_SESSION['profilePic'] = $admin['profilePic'];
        header("location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pages - Admin Dashboard UI Kit - Lock Screen</title>
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
    <!--[if lte IE 9]>
        <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
        window.onload = function () {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>
</head>

<body class="fixed-header ">
    <div class="login-wrapper ">
        <!-- START Login Background Pic Wrapper-->
        <div class="bg-pic">
            <!-- START Background Pic-->
            <img src="assets/img/demo/sakura1.jpg" data-src="assets/img/demo/sakura1.jpg"
                data-src-retina="assets/img/demo/sakura1.jpg" alt="" class="lazy">
            <!-- END Background Pic-->
            <!-- START Background Caption-->
            <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">

            </div>
            <!-- END Background Caption-->
        </div>
        <!-- END Login Background Pic Wrapper-->
        <!-- START Login Right Container-->
        <div class="login-container bg-white">
            <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
                <img src="assets/img/logo.jpg" alt="logo" data-src="assets/img/logo.jpg"
                    data-src-retina="assets/img/logo.jpg" width="78" height="22">
                <p class="p-t-35">เข้าสู่ระบบบัญชีแอดมิน</p>
                <!-- START Login Form -->
                <form id="form-login" class="p-t-15" role="form" action="" method="post" name="login-form">
                    <!-- START Form Control-->
                    <div class="form-group form-group-default">
                        <label>อีเมล</label>
                        <div class="controls">
                            <input id="email" type="text" name="email" placeholder="กรุณากรอกอีเมล" class="form-control"
                                required>
                        </div>
                    </div>
                    <!-- END Form Control-->
                    <!-- START Form Control-->
                    <div class="form-group form-group-default">
                        <label>รหัสผ่าน</label>
                        <div class="controls">
                            <input id="password" type="password" class="form-control" name="password"
                                placeholder="กรุณากรอกรหัสผ่าน" required>
                        </div>
                    </div>

                    <button style="background-color: #FFB09F;" class="btn btn-primary btn-cons m-t-10" type="submit"
                        name="loginButton" id="loginButton">เข้าสู่ระบบ</button>
                </form>
                <!--END Login Form-->

            </div>
        </div>
        <!-- END Login Right Container-->
    </div>

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
    <script src="pages/js/pages.min.js"></script>
    <script>
        $(function () {
            $('#form-login').validate({
                rules: {
                    email: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                },
                messages: {
                    email: {
                        required: "กรุณากรอกอีเมล",
                        minlength: "กรุณากรอกอย่างน้อย 4 ตัวอักษร"
                    },
                    password: {
                        required: "กรุณากรอกรหัสผ่าน",
                        minlength: "กรุณากรอกอย่างน้อย 4 ตัวอักษร"
                    },
                }
            })
        })
    </script>
</body>

</html>