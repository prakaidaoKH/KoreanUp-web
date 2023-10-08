<?php
include("authentication.php");
include("database.php");

$sql = "
SELECT * 
FROM member
ORDER BY MemberID DESC
";

$result = $conn->query($sql);

if (!$result) {
  echo "wrong sql command";
  exit;
}

$members = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>Korean Up Admin</title>
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

  <!-- start data tables -->
  <link href="assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet"
    type="text/css" />
  <link href="assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css"
    rel="stylesheet" type="text/css" />
  <link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css"
    media="screen" />
  <!-- end data tables -->

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
      <img src="assets/img/logoK.jpg" alt="logo" class="brand" data-src="assets/img/logoK.jpg" width="78" height="22">
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
                <li><a>ข้อมูลสมาชิก</a>
                </li>
                <li><a class="active">สมาชิก</a>
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
          <!-- START PANEL -->
          <div class="panel panel-transparent">
            <div class="panel-heading">
              <div class="pull-left">
                <div class="panel-title" style="
                  font-size: 24px;
                  font-family: 'K2D', sans-serif;">สมาชิก
                </div>
              </div>
              <div class="pull-right">
                <div class="col-xs-10">
                  <input type="text" id="search-table" class="form-control pull-right" placeholder="ค้นหาข้อมูลสมาชิก"
                    style="font-family: 'K2D', sans-serif;">
                </div>
              </div>

              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <table class="table table-hover demo-table-search table-responsive-block" id="memberTable">
                <thead>
                  <tr>
                    <th style="width: 80px; font-family: 'K2D', sans-serif;">รหัสสมาชิก</th>
                    <th style="font-family: 'K2D', sans-serif;">ชื่อผู้ใช้งาน</th>
                    <th style="font-family: 'K2D', sans-serif;">อีเมล</th>
                    <th style="font-family: 'K2D', sans-serif;">วันที่สมัคร</th>
                    <th style="font-family: 'K2D', sans-serif;">รูปโปรไฟล์</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($members as $index => $member) {
                    ?>
                    <tr>
                      <td class="v-align-middle semi-bold">
                        <?php echo $member['MemberID'] ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $member['Username'] ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $member['Email'] ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $member['Start_date'] ?>
                      </td>
                      <td class="v-align-middle">
                        <img src="<?php echo $member['profilePicture'] ?>" style="height: 50px; width: 50px;">
                      </td>

                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- END PANEL -->
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
  <!-- start datatables js -->
  <script src="assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js"
    type="text/javascript"></script>
  <script src="assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
  <script src="assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js"
    type="text/javascript"></script>
  <script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
  <!-- end datatables js -->
  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- END VENDOR JS -->
  <!-- BEGIN CORE TEMPLATE JS -->
  <script src="pages/js/pages.min.js"></script>
  <!-- END CORE TEMPLATE JS -->
  <!-- BEGIN PAGE LEVEL JS -->
  <script src="assets/js/scripts.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS -->

  <script type="text/javascript">
    /* ============================================================
 * DataTables
 * Generate advanced tables with sorting, export options using
 * jQuery DataTables plugin
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
    (function ($) {

      'use strict';

      var responsiveHelper = undefined;
      var breakpointDefinition = {
        tablet: 1024,
        phone: 480
      };

      // Initialize datatable showing a search box at the top right corner
      var initMemberTable = function () {
        var table = $('#memberTable');

        var settings = {
          "sDom": "<t><'row'<p i>>",
          "destroy": true,
          "scrollCollapse": true,
          "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "แสดง <b>_START_ ถึง _END_</b> จากทั้งหมด _TOTAL_ รายการ"
          },
          "iDisplayLength": 5
        };

        table.dataTable(settings);

        // search box for table
        $('#search-table').keyup(function () {
          table.fnFilter($(this).val());
        });
      }

      initMemberTable();



    })(window.jQuery);
  </script>
</body>

</html>