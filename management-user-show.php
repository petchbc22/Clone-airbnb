<?php
include 'appsystem/inc_config.php';
include 'appsystem/check_login.php';
include 'appsystem/check_permission.php';
// get from management user
$member_id = $_GET["member_id"];
// session login
$ss_member_id = $_SESSION["ss_member_id"];

if ($ss_member_permission != 0){
  $message = 'หน้านี้เป็นสิทธิ์สงวนสำหรับผู้ดูแลระบบ !!';
  echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('$message');
      window.location.replace(\"index.php\");
  </SCRIPT>";
}
// display to show in header
$strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
$member_name_session = $objResult["member_name"];
$member_lastname_session = $objResult["member_lastname"];
// select data to show 
// $sql_member = " SELECT * FROM member WHERE member_id = '$member_id' AND member_status = 'N' ";
// $member_result = $conn->query($sql_member);
// $member_count = $member_result->num_rows;


// if($member_count = 1) {
//   if ($member_result){
//       $result_rs = mysqli_fetch_assoc($member_result);
//       $member_email = $result_rs["member_email"];
//       $member_name = $result_rs["member_name"];
//       $member_lastname = $result_rs["member_lastname"];
//       $member_birthday = $result_rs["member_birthday"];
//       $member_images = $result_rs["member_images"];
//       $member_permission = $result_rs["member_permission"];
//       $approve = $result_rs["approve"];
//   }
//   // mysqli_close($conn);

// }
$sql_member = "SELECT * FROM member WHERE member_id = '$member_id' ";
$objQuery_member = mysqli_query($conn,$sql_member);
$objResult_member = mysqli_fetch_array($objQuery_member,MYSQLI_ASSOC);
$member_email = $objResult_member["member_email"];
$member_name = $objResult_member["member_name"];
$member_lastname = $objResult_member["member_lastname"];
$member_birthday = $objResult_member["member_birthday"];
$member_images = $objResult_member["member_images"];
$member_permission = $objResult_member["member_permission"];
$approve = $objResult_member["approve"];
    // select sql home approve 
    $sql_vwhome = "SELECT * FROM home WHERE member_id = '$member_id' AND approve = 1 AND home_status = 'N' limit 6 ";
    $home_result_vwhome = $conn->query($sql_vwhome);
    $home_count_vwhome = $home_result_vwhome->num_rows;

    //count room
    $sql_vwhome_count = "SELECT * FROM home WHERE member_id = '$member_id' AND approve = 1 AND home_status = 'N'";
    $home_result_vwhome_count = $conn->query($sql_vwhome_count);
    $home_count_vwhome_count = $home_result_vwhome_count->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        การจัดการผู้ใช้งาน | Real Estate
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="admin-screen/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
</head>
<body class="boon-fonts-regular">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="img/logo.png">
                    </div>
                </a>
                <a href="#" class="simple-text logo-normal">
          Real Estate
          <!-- <div class="logo-image-big">
            <img src="admin-screen/img/logo-big.png">
          </div> -->
        </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active ">
                        <a href="management-user.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>การจัดการผู้ใช้งาน</p>
                        </a>
                    </li>
                    <li>
                        <a href="management-estate.php">
                            <i class="nc-icon nc-bank"></i>
                            <p>การจัดการสถานที่</p>
                        </a>
                    </li>
                    <li>
                        <a href="management-report-user.php">
                            <i class="nc-icon nc-send"></i>
                            <p>การจัดการรายงาน</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <ul class="uk-breadcrumb mb-0">
                            <li><a href="management-user.php" class="f-20 font-weight-bold">การจัดการผู้ใช้งาน</a></li>
                            <li><span class="f-20 font-weight-bold">ข้อมูลผู้ใช้งาน </span></li>
                        </ul>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <p class="text-dark">ยินดีต้อนรับ คุณ <?php echo $member_name_session.' '.$member_lastname_session?></p>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link btn-rotate" href="logout.php" uk-toggle="target: #modal-comfirm-logout">
                                  <i class="fas fa-sign-out-alt"></i>
                                  <p>
                                      <span class="d-lg-none d-md-block">Account</span>
                                  </p>
                              </a>
                          </li>
                        </ul>
                    </div>
                </div>
                <?php include 'component/modal.php';?> 
            </nav>
            <div class="content">
                <div class="uk-container uk-container-center bgw-bdr ">
                    <div class="row pt-5 maxw-800 m-auto">
                        <div class="col-md-4 text-center">
                            <?php if(empty($member_images)){?>
                                <div class="py-3">
                                    <img src="img/user-temp.png" alt="" class="oj-fit" width="200" height="200">
                                </div>
                            <?php } else{ ?>
                                <div class="py-3">
                                    <img src="img/<?php echo $member_images ?>" alt="" class="oj-fit" width="200" height="200">
                                </div>
                            <?php } ?>
                            <div>
                            <h2 class="f-18 pt-2 font-weight-bold">ช่องทางการติดต่อ</h2>
                            </div>
                            <div class="pt-2 text-left">
                                <img src="img/phone-call.png" width="20" height="20" class="mr-2"><?php if(empty($member_tel)){ echo 'ยังไม่ได้ระบุเบอร์โทรศัพท์'; } else { echo $member_tel; } ?>
                            </div>
                            <div class="pt-2 text-left">
                                <img src="img/mail-black-envelope-symbol.png" width="20" height="20" class="mr-2"><?php if(empty($member_email)){ echo 'ยังไม่ได้ระบุอีเมล'; } else { echo $member_email; } ?>
                            </div>
                            <div class="pt-2 text-left">
                                <span uk-icon="icon: facebook; ratio: 1" class="pr-2 color-blue"></span><?php if(empty($member_facebook)){ echo 'ยังไม่ได้ระบุ facebook'; } else { echo $member_facebook; } ?>
                            </div>
                            <div class="pt-2 text-left">
                                <img src="img/instagram-new-2016-logo-4773FE3F99-seeklogo.com.png" width="20" height="20" class="mr-2"><?php if(empty($member_ig)){ echo 'ยังไม่ได้ระบุ instragram'; } else { echo $member_ig; } ?>
                            </div>
                            <div class="pt-2 text-left">
                                <img src="img/line.png" width="20" height="20" class="mr-2"><?php if(empty($member_line)){ echo 'ยังไม่ได้ระบุ line'; } else { echo $member_line; } ?>
                            </div>
                            <div>
                                <h2 class="f-18 pt-2 font-weight-bold">ข้อมูลอสังหาริมทรัพย์</h2>
                            </div>
                            <div class="pt-2 text-left">
                                <span uk-icon="icon: check; ratio: 1" class="pr-2"></span>อสังหาริมทรัพย์ที่ขายไป : <?php echo '10'?>
                            </div>
                            <div class="pt-2 text-left">
                                <span uk-icon="icon: future; ratio: 1" class="pr-2"></span>อสังหาริมทรัพย์ที่ติดจอง : <?php echo '10'?>
                            </div>
                            <div class="bd-bt pt-3 show-mobile">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <div class="pt-2 pb-2 pr-2">
                                    <h1 class="f-20 text-left font-weight-bold m-0 p-0"><?php echo $member_name.' '.$member_lastname ?></h1>
                                </div>
                                <div class="p-2">
                                    <span class="f-12"><img src="img/location.svg" alt="" width="20">Austin, Bangkok</span>
                                </div>
                            </div>
                            <p class="f-14 color-blue font-weight-bold"><?php if($objResult_member["member_permission"] == '0'){ echo 'ผู้ดูแลระบบ';}else if($objResult_member["member_permission"] == '1'){ echo 'ผู้ใช้งานทั่วไป';}else if($objResult_member["member_permission"] == '2'){ echo 'Agency';} ?></p>
                            <p class="f-14 mb-0">ระดับคะแนน</p>
                            <div class="d-flex">
                                <h1 class="text-left f-24 pr-3 pb-0 pt-2 my-0">8.6</h1>
                                <img src="img/star.svg" alt="" width="20" height="50">
                                <img src="img/star.svg" alt="" width="20" height="50">
                                <img src="img/star.svg" alt="" width="20" height="50"> 
                                <img src="img/star.svg" alt="" width="20" height="50">
                                <img src="img/star.svg" alt="" width="20" height="50">           
                            </div>
                            <div class="d-flex">
                                <?php if ( $_SESSION["ss_member_id"] =="") { ?>
                                <div class="pr-2"><button class="uk-button uk-button-default" uk-toggle="target: #modal-login">ติดต่อผู้ขาย</button></div>
                                <?php } else { ?>
                                <div class="pr-2"><button class="uk-button uk-button-default" uk-toggle="target: #modal-Contact">ติดต่อผู้ขาย</button></div>
                                <?php } ?>
                                <!-- รายงาน -->
                                <?php if ($_SESSION["ss_member_id"] =="") { ?>
                                    <div class="pr-2"><button class="uk-button uk-button-default"  type="button" uk-toggle="target: #modal-login">รายงานผู้ขาย</button></div>
                                <?php } elseif ($ss_member_id == $member_id) { ?>
                                    <div class="pr-2"><button class="uk-button uk-button-default"  type="button" disabled>รายงานผู้ขาย</button></div>
                                <?php } else { ?>
                                    <div class="pr-2"><button class="uk-button uk-button-default"  type="button" uk-toggle="target: #modal-report">รายงานผู้ขาย</button></div>
                                <?php } ?>
                            </div>
                            <?php include 'component/modal.php';?> 
                            <div class="uk-container uk-container-center pt-5">
                                <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" style="border-bottom: 1px solid gainsboro;padding-bottom: 10px;">
                                    <li class=""><span><a href="" class="f-18 font-weight-bold"><img src="img/three-buildings.svg" alt="" width="30" class="pr-2">อสังหาริมทรัพย์ ( <?php echo $home_count_vwhome_count;?> )</a></span></li>
                                    <li class=""><span><a href="" class="f-18 font-weight-bold"><img src="img/contact.svg" alt="" width="30" class="pr-2">เกี่ยวกับผู้ขาย</a></span></li>
                                </ul>
                                <!-- <ul class="uk-tab" data-uk-tab="{connect:'#my-id'}" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                                    <li class="pb-2"><span><a href=""><img src="img/three-buildings.svg" alt="" width="30" class="pr-2">อสังหาริมทรัพย์</a></span></li>
                                    <li class="pb-2"><span><a href=""><img src="img/contact.svg" alt="" width="30" class="pr-2">ข้อมูลติดต่อ</a></span></li>
                                </ul> -->
                                <ul id="my-id" class="uk-switcher uk-margin">
                                    <li><a href="#" id="autoplayer" data-uk-switcher-item="next"></a>
                                        <div class="row">
                                        <?php if($home_count_vwhome_count == 0) { ?>
                                            <p class="f-16 text-danger">ไม่พบอสังหาริมทรัพย์</p>
                                        <?php } else { ?>
                                            <?php 
                                                while($home_result_query_vwhome = mysqli_fetch_array($home_result_vwhome,MYSQLI_ASSOC)){
                                                    $home_mb_id = $home_result_query_vwhome["home_id"];
                                                    $query_img = "SELECT * FROM picture_home WHERE home_id = '$home_mb_id' and pic_status = 'N' limit 1 ";
                                                    $sql_img_query = mysqli_query($conn,$query_img);
                                                    $sql_img_result = mysqli_fetch_array($sql_img_query,MYSQLI_ASSOC);
                                                    $query_img_result = $sql_img_result["pic_name"];
                                            ?>
                                            <div class="col-md-12 p-2 bd-bt">
                                                
                                                <a href="see-room-detail.php?home_id=<?php echo $home_result_query_vwhome["home_id"]; ?>" class="row">
                                                    <div class="col-md-4">
                                                        <img src="img/home/<?php echo $query_img_result;?>" alt="" class="oj-fit" width="100%" height="200">
                                                    </div>
                                                    <div class="col-md-8 m-auto">
                                                        <p class="f-20 font-weight-bold pt-1 mb-0"><?php echo $home_result_query_vwhome["home_name"]; ?></p>
                                                        <p class="f-18 mb-1"> · <?php echo $home_result_query_vwhome["home_price"]; ?> ฿</p>
                                                        <div>
                                                            <i class="fas fa-star color-blue f-12"></i>
                                                            <i class="fas fa-star color-blue f-12"></i>
                                                            <i class="fas fa-star color-blue f-12"></i>
                                                            <i class="fas fa-star color-blue f-12"></i>
                                                            <i class="fas fa-star color-blue f-12"></i>
                                                            <span class="text-black">186</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <?php } ?>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="f-16">
                                
                                        <?php if(empty($member_about_me)){ echo 'ยังไม่ได้ระบุข้อมูล'; } else { echo $member_about_me ;}?>                          
                                        </p>
                                    </li>
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Storyboard
              </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#all-user-table').DataTable();
        $('#user-table').DataTable();
        $('#agency-user-table').DataTable();
    } );
    </script>
</body>
</html>