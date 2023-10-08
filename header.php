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
$sql = "
SELECT * 
FROM course
ORDER BY courseID 
";
$result = $conn->query($sql);

if (!$result) {
  echo "wrong sql command";
  exit;
}

$courses = $result->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['openChat'])) {

  $sqlUse = "
  SELECT * 
  FROM member
  WHERE MemberID = '" . $_POST['memberID'] . "'
  ";
  $resultUse = $conn->query($sqlUse);

  if (!$resultUse) {
    echo "wrong sql command";
    exit;
  }
  $user = $resultUse->fetch_assoc();

  $sqlChat = "
  SELECT
  member.Username,
  member.profilePicture,
  cm.status,
  cm.message,
  SUBSTRING(cm.create_date,12,5) AS create_date
FROM comment_course AS cm
JOIN `member`
  ON cm.memberID = member.MemberID
WHERE cm.courseID = '" . $_POST['courseID'] . "' AND cm.memberID = '" . $_POST['memberID'] . "'
  ";

  $resultChat = $conn->query($sqlChat);
  if (!$resultChat) {
    echo "wrong sql command";
    exit;
  }
  $chats = $resultChat->fetch_all(MYSQLI_ASSOC);

}

?>

<!-- START HEADER -->
<div class="header ">
  <!-- START MOBILE CONTROLS -->
  <div class="container-fluid relative">
    <!-- LEFT SIDE -->
    <div class="pull-left full-height visible-sm visible-xs">
      <!-- START ACTION BAR -->
      <div class="header-inner">
        <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5"
          data-toggle="sidebar">
          <span class="icon-set menu-hambuger"></span>
        </a>
      </div>
      <!-- END ACTION BAR -->
    </div>
    <div class="pull-center hidden-md hidden-lg">
      <div class="header-inner">
        <div class="brand inline">
          <img src="assets/img/logo.jpg" alt="logo" data-src="assets/img/logo.jpg" width="78" height="22">
        </div>
      </div>
    </div>
    <!-- RIGHT SIDE -->
    <div class="pull-right full-height visible-sm visible-xs">
      <!-- START ACTION BAR -->
      <div class="header-inner">
        <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block" data-toggle="quickview"
          data-toggle-element="#quickview">
          <span class="icon-set menu-hambuger-plus"></span>
        </a>
      </div>
      <!-- END ACTION BAR -->
    </div>
  </div>
  <!-- END MOBILE CONTROLS -->
  <div class=" pull-left sm-table hidden-xs hidden-sm">
    <div class="header-inner">
      <div class="brand inline">
        <img src="assets/img/logo.jpg" alt="logo" data-src="assets/img/logo.jpg" width="78" height="22">
      </div>

    </div>
  </div>
  <div class=" pull-right">
    <div class="header-inner">
      <a href="#" class="btn-link icon-set menu-hambuger-plus m-l-20 sm-no-margin hidden-sm hidden-xs"
        data-toggle="quickview" data-toggle-element="#quickview"></a>

    </div>
  </div>
  <div class=" pull-right">
    <!-- START User Info-->
    <div class="visible-lg visible-md m-t-10">
      <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
        <?php echo $_SESSION['email'] ?>
      </div>
      <div class="dropdown pull-right">
        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <span class="thumbnail-wrapper d32 circular inline m-t-5">
            <img src="<?php echo $_SESSION['profilePic'] ?>" width="32" height="32">
          </span>
        </button>
        <ul class="dropdown-menu profile-dropdown" role="menu">
          <li><a href="editPassword.php?action=edit&id=<?php echo $_SESSION['admin_id'] ?>"><i
                class="pg-settings_small"></i> เปลี่ยนรหัสผ่าน</a>
          </li>

          <li class="bg-master-lighter">
            <a href="logout.php" class="clearfix">
              <span class="pull-left">Logout</span>
              <span class="pull-right"><i class="pg-power"></i></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- END User Info-->
  </div>
</div>
<!-- END HEADER -->

<!--START QUICKVIEW -->
<div id="quickview" class="quickview-wrapper" data-pages="quickview">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" style="background-color: blanchedalmond;">
    <li>
      <a style="color: #000000;">แชท</a>
    </li>
  </ul>
  <a class="btn-link quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview"><i
      class="pg-close"></i></a>
  <!-- Tab panes -->
  <div class="tab-content">

    <div class="tab-pane fade in active no-padding" id="quickview-chat">
      <div class="view-port clearfix" id="chat">
        <div class="view bg-white">

          <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
            <div class="list-view-group-container">
              <?php
              foreach ($courses as $index => $course) {
                ?>
                <div style="margin-left: 15px;">
                  บทเรียน
                  <?php echo $course['courseName'] ?>
                </div>
                <?php
                foreach ($members as $index => $member) {
                  ?>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="">
                        <span class=" col-xs-height col-middle">
                          <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="<?php echo $member['profilePicture'] ?>"
                              data-src="<?php echo $member['profilePicture'] ?>"
                              src="<?php echo $member['profilePicture'] ?>" class="col-top">
                          </span>
                        </span>
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">
                            <?php echo $member['Username'] ?>
                          </span>
                          <span class="block text-master hint-text fs-12">Hello there</span>
                        </p>
                      </a>

                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                  </form>
                  <?php
                }
                ?>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
        <!-- BEGIN Conversation View  !-->
        <div class="view chat-view bg-white clearfix">
          <!-- BEGIN Header  !-->
          <div class="navbar navbar-default">
            <div class="navbar-inner">
              <a href="javascript:;" class="link text-master inline action p-l-10 p-r-10" data-navigate="view"
                data-view-port="#chat" data-view-animation="push-parrallax">
                <i class="pg-arrow_left"></i>
              </a>
              <div class="view-heading">
                Hello
              </div>
              <a href="#" class="link text-master inline action p-r-10 pull-right ">
                <i class="pg-more"></i>
              </a>
            </div>
          </div>
          <!-- END Header  !-->

          <!-- BEGIN Conversation  !-->
          <div class="chat-inner" id="my-conversation">
            <!-- BEGIN From Me Message  !-->
            <div class="message clearfix">
              <div class="chat-bubble from-me">
                <?php echo $chat['message'] ?>
              </div>
            </div>
            <!-- END From Me Message  !-->
            <!-- BEGIN From Them Message  !-->
            <div class="message clearfix">
              <div class="profile-img-wrapper m-t-5 inline">
                <img class="col-top" width="30" height="30" src="assets/img/profiles/avatar_small.jpg" alt=""
                  data-src="assets/img/profiles/avatar_small.jpg"
                  data-src-retina="assets/img/profiles/avatar_small2x.jpg">
              </div>
              <div class="chat-bubble from-them">
                Hey
              </div>
            </div>
            <!-- END From Them Message  !-->
            <!-- BEGIN From Me Message  !-->
            <div class="message clearfix">
              <div class="chat-bubble from-me">
                Did you check out Pages framework ?
              </div>
            </div>
            <!-- END From Me Message  !-->
            <!-- BEGIN From Me Message  !-->
            <div class="message clearfix">
              <div class="chat-bubble from-me">
                Its an awesome chat
              </div>
            </div>
            <!-- END From Me Message  !-->
            <!-- BEGIN From Them Message  !-->
            <div class="message clearfix">
              <div class="profile-img-wrapper m-t-5 inline">
                <img class="col-top" width="30" height="30" src="assets/img/profiles/avatar_small.jpg" alt=""
                  data-src="assets/img/profiles/avatar_small.jpg"
                  data-src-retina="assets/img/profiles/avatar_small2x.jpg">
              </div>
              <div class="chat-bubble from-them">
                Yea
              </div>
            </div>
            <!-- END From Them Message  !-->
          </div>
          <!-- BEGIN Conversation  !-->
          <!-- BEGIN Chat Input  !-->
          <div class="b-t b-grey bg-white clearfix p-l-10 p-r-10">
            <div class="row">
              <div class="col-xs-8 no-padding">
                <input type="text" class="form-control chat-input" data-chat-input=""
                  data-chat-conversation="#my-conversation" placeholder="พิมพ์ข้อความ">
              </div>
              <div class="col-xs-2 link text-master m-l-10 m-t-15 p-l-10 b-l b-grey col-top">
                <a href="#" class="link text-master">ส่ง</a>
              </div>
            </div>
          </div>

          <!-- END Chat Input  !-->
        </div>
        <!-- END Conversation View  !-->
      </div>
    </div>
  </div>
</div>
<!-- END QUICKVIEW-->