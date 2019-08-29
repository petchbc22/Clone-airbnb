<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>Real Estate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <style>
    body {
        width: 610;
    }

    #frmFile {
        border-top: #F0F0F0 2px solid;
        background: #FAF8F8;
        padding: 10px;
    }

    .demoInputBox {
        padding: 10px;
        border: #F0F0F0 1px solid;
        border-radius: 4px;
        background-color: #FFF;
    }

    #file_error {
        color: #FF0000;
    }

    #btnSubmit {
        background-color: #2FC332;
        border: 0;
        padding: 10px 40px;
        margin: 15px 0px;
        color: #FFF;
        border: #F0F0F0 1px solid;
        border-radius: 4px;
    }
    </style>
    <!-- <link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css"/> -->
</head>

<body class="boon-fonts-regular" id="fristpage">
    <?php
error_reporting (E_ALL ^ E_NOTICE);
  include 'appsystem/inc_config.php';

  if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }
  if ($appaction == "register"){
    // if (empty($_REQUEST['member_id'])) { $member_id = ""; } else { $member_id = $_REQUEST["member_id"]; }
    if (empty($_REQUEST['member_email'])) { $member_email = ""; } else { $member_email = $_REQUEST["member_email"]; }
    if (empty($_REQUEST['member_firstname'])) { $member_firstname = ""; } else { $member_firstname = $_REQUEST["member_firstname"]; }
    if (empty($_REQUEST['member_lastname'])) { $member_lastname = ""; } else { $member_lastname = $_REQUEST["member_lastname"]; }
    if (empty($_REQUEST['member_password'])) { $member_password = ""; } else { $member_password = $_REQUEST["member_password"]; }
    if (empty($_REQUEST['member_birthday'])) { $member_birthday = ""; } else { $member_birthday = $_REQUEST["member_birthday"]; }
    if (empty($_REQUEST['member_permission'])) { $member_permission = ""; } else { $member_permission = $_REQUEST["member_permission"]; }
    if (empty($_REQUEST['member_images'])) { $member_images = ""; } else { $member_images = $_REQUEST["member_images"]; }
    
	// ฟังค์ชั่นเวลา 
	date_default_timezone_set('Asia/Bangkok');
	// ตั้งเป็นเวลา ปี เดือน วัน ชั่วโมง นาที วินาที
	$date = date("Ymdhis");	
	// สุ่มเลข
	$numrand = (mt_rand());
	// ตั้งตัวแปร ที่รับ ไฟล์จาก input มา
	$type = strrchr($_FILES['filUpload']['name'],".");
	// โฟล์เดอร์เก็บภาพ
	$path="img/"; 
	// ตั้งชื่อใหม่
	$newname = $date.$numrand.$type;
	$path_copy=$path.$newname;
	$path_link="/".$newname;
	// ถ้า ขนาดภาพเกิน 3mb
	
	
    if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],$path_copy)){
    $sql_command = " INSERT INTO member ( member_email, member_name, member_lastname, member_password,member_birthday,member_images,member_permission, member_status, approve) VALUES ('$member_email', '$member_firstname', '$member_lastname', '$member_password','$member_birthday','$newname', '$member_permission' , 'N' , 0) ";
    if (mysqli_query($conn, $sql_command)){
      // echo $sql_command;
      $status = 'complete';
      echo '<script>
        setTimeout(function() {
            swal({
                title: "สมัครสมาชิกสำเร็จ !",
                text: "กรุณาตรวจสอบอีเมลของท่าน เพื่อทำการยืนยันการสมัคร !",
                type: "success"
            }).then(function() {
                window.location = "index.php";
            });
        }, 300);
        </script>'; 
    }

  }
  }
  if ($appaction == "systemlogin"){
    if (empty($_REQUEST['member_email'])) { $member_email = ""; } else { $member_email = $_REQUEST["member_email"]; }
    if (empty($_REQUEST['member_password'])) { $member_password = ""; } else { $member_password = $_REQUEST["member_password"]; }

    $sql_login = " SELECT * FROM member WHERE member_email = '$member_email' AND member_password = '$member_password' AND member_status = 'N'";

    $data_result = $conn->query($sql_login);
    $data_count = $data_result->num_rows;
    if ($data_count == 1 ) {

        if ($data_result){
            $result_rs = mysqli_fetch_assoc($data_result);
            $member_id = $result_rs["member_id"];
            $member_email= $result_rs["member_email"];
            $member_password= $result_rs["member_password"];
            $member_firstname = $result_rs["member_name"];
            $member_lastname = $result_rs["member_lastname"];
            $member_permission = $result_rs["member_permission"];
            $member_images = $result_rs["member_images"];
            $approve = $result_rs["approve"];

            }
            $_SESSION["ss_member_id"] = $member_id;
            $_SESSION["ss_member_email"] = $member_email;
            $_SESSION["member_password"] = $member_password;
            
            $_SESSION["ss_member_firstname"] = $member_firstname;
            $_SESSION["ss_member_lastname"] = $member_lastname;
            $_SESSION["ss_member_permission"] = $member_permission;
            $_SESSION["ss_member_images"] = $member_images;

            mysqli_close($conn);
            // echo $member_id.' '.$member_email;
            if($member_permission == 0 ){
                header("Location:management-user.php");
            } 
            else if ($member_permission == 1 && $approve == 0 ) {
            session_destroy();  
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "กรุณายืนยันตัวตนก่อน!",
                        text: "กรุณาตรวจสอบอีเมลของท่าน !",
                        type: "success"
                    }).then(function() {
                        window.location = "index.php";
                    });
                }, 300);
            </script>';           
            }
            else if ($member_permission == 1 && $approve == 1 ) {
            header("Location:index.php");
            }
            else if ($member_permission == 2 && $approve == 0 ) {
            session_destroy();  
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "กรุณายืนยันตัวตนก่อน!",
                        text: "กรุณาตรวจสอบอีเมลของท่าน !",
                        type: "success"
                    }).then(function() {
                        window.location = "index.php";
                    });
                }, 300);
            </script>';  
            }
            else if ($member_permission == 2 && $approve == 1 ) {
            header("Location:index.php");
            }
           
    }
    else {
        session_destroy(); 
        echo '<script>
        setTimeout(function() {
            swal({
                title: "รหัสผ่านผิด !",
                text: "กรุณาตรวจสอบรหัสผ่านของท่าน และลองอีกครั้ง !",
                type: "success"
            }).then(function() {
                window.location = "index.php";
            });
        }, 300);
    </script>';  
        }
 }
 ?>
    <div class="navbar-custom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg  w-100 layout-nav">
                        <a class="navbar-brand " href="index.php">
                            <img src="img/logo-w.png" alt="" height="50" class="swap-scroll">
                        </a>
                        <!-- <form class="uk-inline w-25 searchbar search-dpn" action="search-result.php" method="get">
                            <span class="uk-form-icon uk-form-icon" uk-icon="search"></span>
                            <input class="uk-input border-g bg-white border-radius-20 box-sd-nb input-search" type="text" name="search_result"  placeholder="ค้นหา" >
                        </form> -->
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="">
                                </li>
                            </ul>
                            <span class="navbar-text desktop-menu-list">
                                <ul class="navbar-nav mr-auto f-19 ">
                                    <?php
                                      if ($_SESSION['ss_member_permission'] == 1 || $_SESSION['ss_member_permission'] == 2 ){
                                     ?>
                                    <li class="">
                                        <a class="nav-link color-white custom-font-scroll"
                                            href="submit.php">เพิ่มสถานที่</a>
                                    </li>
                                    <?php }  ?>
                                    <li class="">
                                        <a class="nav-link color-white custom-font-scroll"
                                            href="see-room.php">รายการสถานที่ทั้งหมด</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link color-white custom-font-scroll" href="#">จัดประสบการณ์</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link color-white custom-font-scroll" href="#">ความช่วยเหลือ</a>
                                    </li>

                                    <?php
                                      if ($_SESSION['ss_member_permission'] == ""  ){
                                     ?>
                                    <li class="">
                                        <a class="nav-link color-white custom-font-scroll" href="#"
                                            uk-toggle="target: #modal-regis">ลงทะเบียน</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link color-white custom-font-scroll" href="#"
                                            uk-toggle="target: #modal-login">เข้าสู่ระบบ</a>
                                    </li>
                                    <?php }  if ($_SESSION['ss_member_permission'] == 1 || $_SESSION['ss_member_permission'] == 2){           
                                        ?>



                                    <li class="px-1 m-auto cursor">
                                        <img src="img/<?php echo $_SESSION["ss_member_images"]; ?>"
                                            class="uk-border-circle rm-bd" alt="" height="30" width="30" type="button">

                                        <div uk-dropdown="mode: click">
                                            <ul class="uk-nav uk-dropdown-nav">
                                                <li class="bd-bt py-1"><a href="profile.php"><span uk-icon="user"
                                                            class="pr-2"></span>โปรไฟล์</a></li>
                                                <li class="py-1"><a href="#" onclick="JSalerts()"><span
                                                            uk-icon="sign-out" class="pr-2"></span>ออกจากระบบ</a></li>

                                            </ul>
                                        </div>
                                    </li>
                                    <?php }  ?>

                                </ul>
                            </span>
                            <?php include 'component/modal.php';?>
                            <!-- include modal  -->
                            <span class="navbar-text mobile-menu-list">
                                <ul class="navbar-nav mr-auto f-19 mobile-menu-list">
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll" href="index.php">หน้าแรก</a>
                                    </li>
                                    <?php  if ($_SESSION['ss_member_permission'] == 1 || $_SESSION['ss_member_permission'] == 2){           
                                    ?>
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll"
                                            href="profile.php">โปรไฟล์</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll"
                                            href="submit.php">เพิ่มสถานที่</a>
                                    </li>
                                    <?php } ?>
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll"
                                            href="see-room.php">รายการสถานที่ทั้งหมด</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll"
                                            href="#">แนะนำเจ้าของที่พัก</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll" href="#">สำหรับธุรกิจ</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll" href="#">ลงประกาศที่พัก</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll" href="#">ความช่วยเหลือ</a>
                                    </li>
                                    <?php
                                      if ($_SESSION['ss_member_permission'] == ""  ){
                                     ?>
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll" href="#"
                                            uk-toggle="target: #modal-login">เข้าสู่ระบบ</a>
                                    </li>
                                    <?php } ?>
                                    <?php
                                      if ($_SESSION['ss_member_permission'] == 1 || $_SESSION['ss_member_permission'] == 2){
                                     ?>
                                    <li class="py-2">
                                        <a class="nav-link color-white custom-font-scroll" href="logout.php"
                                            uk-toggle="target: #modal-comfirm-logout">ออกจากระบบ</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-position-relative">
        <div id="slideshow">
            <div>
                <img src="img/0ffd8594-f123-43f0-85bb-7ef88c6f0624.jpg" class="img-hero">
            </div>
            <div>
                <img src="img/a904c8dd-2325-425a-a48c-40bbbcd6ade2.jpg" class="img-hero">
            </div>
            <div>
                <img src="img/wall-slide-show.jpg" class="img-hero">
            </div>
        </div>
        <div class="uk-position-top">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12" style="padding-top:80px">
                        <div class="box-search-desktop">
                            <h3>ค้นหาสถานที่พักที่ไม่เหมือนใคร</h3>
                            <form action="search-result.php" method="get">
                                <fieldset class="uk-fieldset">
                                    <p class="mb-0 f-14">ที่ไหน</p>
                                    <div class="my-2">
                                        <input class="uk-input biginput" type="text" placeholder="ที่ใดก็ตาม"
                                            id="autocomplete" name="search_result">
                                    </div>
                                    <div class="uk-margin row">
                                        <div class="col-6">
                                            <p class="mb-0 f-14">เช็คอิน</p>
                                            <input id="datepicker" type="date" class="my-2 w-100 border-g" />
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0 f-14">เช็คเอ้าท์</p>
                                            <input id="datepicker" type="date" class="my-2 w-100 border-g" />
                                        </div>
                                    </div>
                                    <p class="mb-0 f-14">ผู้เข้าพัก</p>
                                    <div class="my-2">
                                        <select class="uk-select">
                                            <option>
                                                <div style="background-color:black">aaa</div>
                                                <div>aaa</div>
                                            </option>
                                            <option>Option 02</option>
                                        </select>
                                    </div>
                                    <div class="text-right my-3">
                                        <button class="uk-button uk-button-danger">ค้นหา</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search mobile -->
        <div class="title-search-mobile uk-position-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-white text-center">ค้นหาสถานที่พักที่ไม่เหมือนใคร</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 box-search-mobile py-4">
                <form action="search-result.php" method="get">
                    <fieldset class="uk-fieldset">
                        <p class="mb-0 f-14">ที่ไหน</p>
                        <div class="my-2">
                            <input class="uk-input biginput h-46" type="text" placeholder="ที่ใดก็ตาม"
                                id="autocompletes" name="search_result">
                        </div>
                        <div class="uk-margin row">
                            <div class="col-6 pr-1">
                                <p class="mb-0 f-14">เช็คอิน</p>
                                <input id="datepicker" type="date" class="my-2 w-100 border-g p-1" />
                            </div>
                            <div class="col-6 pl-1">
                                <p class="mb-0 f-14">เช็คเอ้าท์</p>
                                <input id="datepicker" type="date" class="my-2 w-100 border-g p-1" />
                            </div>
                        </div>
                        <p class="mb-0 f-14">ผู้เข้าพัก</p>
                        <div class="my-2">
                            <select class="uk-select h-46">
                                <option>
                                    <div>aaa</div>
                                    <div>aaa</div>
                                </option>
                                <option>Option 02</option>
                            </select>
                        </div>
                        <div class="text-right my-3 ">
                            <button class="uk-button uk-button-danger w-100 h-46">ค้นหา</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12 py-3">
                <h3>สำรวจ Airbnb</h3>
                <div class="">
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="finite: true">
                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                            <li class="m-2 col-3 box-slide">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img src="img/0ffd8594-f123-43f0-85bb-7ef88c6f0624.jpg" alt="">
                                    </div>
                                    <div class="col-sm-6 m-auto">
                                        <p class="text-black m-0">บ้าน</p>
                                    </div>
                                </div>
                            </li>
                            <li class="m-2 col-3 box-slide">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img src="img/0ffd8594-f123-43f0-85bb-7ef88c6f0624.jpg" alt="">
                                    </div>
                                    <div class="col-sm-6 m-auto">
                                        <p class="text-black m-0">บ้าน</p>
                                    </div>
                                </div>
                            </li>
                            <li class="m-2 col-3 box-slide">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img src="img/0ffd8594-f123-43f0-85bb-7ef88c6f0624.jpg" alt="">
                                    </div>
                                    <div class="col-sm-6 m-auto">
                                        <p class="text-black m-0">บ้าน</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                            uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                            uk-slider-item="next"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 py-3">
                        <h3>แนะนำสำหรับคุณ</h3>
                    </div>
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="finite: true">
                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                            <li class="p-2">
                                <img src="img/slider1.jpg" alt="" class="img-hero-slide">
                                <div class="uk-position-bottom uk-panel text-center pb-3">
                                    <h5>เขมร</h5>
                                    <p>เฉลี่ย $131/คืน</p>
                                </div>
                            </li>
                            <li class="p-2">
                                <img src="img/slider2.jpg" alt="" class="img-hero-slide">
                                <div class="uk-position-bottom uk-panel text-center pb-3">
                                    <h5>ลอนดอน</h5>
                                    <p>เฉลี่ย $131/คืน</p>
                                </div>
                            </li>
                            <li class="p-2">
                                <img src="img/slider3.jpg" alt="" class="img-hero-slide">
                                <div class="uk-position-bottom uk-panel text-center pb-3">
                                    <h5>ภูเก็ต</h5>
                                    <p>เฉลี่ย $131/คืน</p>
                                </div>
                            </li>
                            <li class="p-2">
                                <img src="img/slider4.jpg" alt="" class="img-hero-slide">
                                <div class="uk-position-bottom uk-panel text-center pb-3">
                                    <h5>คุณมิง</h5>
                                    <p>เฉลี่ย $131/คืน</p>
                                </div>
                            </li>
                            <li class="p-2">
                                <img src="img/slider2.jpg" alt="" class="img-hero-slide">
                                <div class="uk-position-bottom uk-panel text-center pb-3">
                                    <h5>โตเกียว</h5>
                                    <p>เฉลี่ย $131/คืน</p>
                                </div>
                            </li>
                            <li class="p-2">
                                <img src="img/slider3.jpg" alt="" class="img-hero-slide">
                                <div class="uk-position-bottom uk-panel text-center pb-3">
                                    <h5>ชิบุยะ</h5>
                                    <p>เฉลี่ย $131/คืน</p>
                                </div>
                            </li>
                        </ul>
                        <a class="uk-position-center-left uk-position-small button-slide-custom" href="#"
                            uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small button-slide-custom" href="#"
                            uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <h3>ขอแนะนำ Airbnb Plus</h3>
                <p>ที่พักที่ได้มาตรฐานทั้งด้านคุณภาพและการออกแบบ</p>
            </div>
            <div class="col-md-12 uk-inline">
                <img src="img/photographer.jpg" alt="" class="img-hero-banner">
                <div class="uk-position-center uk-overlay">
                    <div>
                        <h3 class="text-white text-center">Logo</h3>
                    </div>
                    <div><button class="uk-button uk-button-deflaut">สำรวจบ้าน</button></div>
                </div>
            </div>
        </div>
    </div>
    <?php
        // for display in page index.php
        $sql_viewhome = "SELECT * FROM home WHERE  home_status = 'N' and approve = 1 limit 8 ";
        $sql_result_viewhome = $conn->query($sql_viewhome);
        $sql_count_viewhome = $sql_result_viewhome->num_rows;

        // for see-room.php
        $sql_viewhome_all = "SELECT * FROM home WHERE home_status = 'N' and approve = 1 ";
        $sql_result_viewhome_all = $conn->query($sql_viewhome_all);
        $sql_count_viewhome_all = $sql_result_viewhome_all->num_rows;
    ?>
    <div class="container py-3 custom-a">
        <div class="row">
            <div class="col-md-12">
                <h3>ประสบการณ์ที่ได้คะแนนสูง</h3>
                <p class="f-18">จองกิจกรรมที่จัดโดยผู้จัดประสบการณ์ซึ่งเป็นคนในท้องถิ่นสำหรับการเดินทางครั้งต่อไป</p>
            </div>
            <?php
                while($home_result_query = mysqli_fetch_array($sql_result_viewhome,MYSQLI_ASSOC)){
                $pic_name = $home_result_query["pic_name"];
                $home_name = $home_result_query["home_name"];
                $home_id = $home_result_query["home_id"];
                $home_price = $home_result_query["home_price"];
                $member_id_vw= $home_result_query["member_id"]; 

            ?>
            <?php 
             // query เอารูปบ้าน จาก id ในตาราง home_pic
             $query_img = "SELECT * FROM picture_home WHERE home_id = '$home_id' and pic_status = 'N' limit 1 ";
             $sql_img_query = mysqli_query($conn,$query_img);
             $sql_img_result = mysqli_fetch_array($sql_img_query,MYSQLI_ASSOC);
             $query_img_result = $sql_img_result["pic_name"];
            // query เอาชื่อmember จาก id ในตาราง home
                $sql_owner = "SELECT * FROM member WHERE member_id = '$member_id_vw' ";
                $sql_owner_query = mysqli_query($conn,$sql_owner);
                $sql_owner_result = mysqli_fetch_array($sql_owner_query,MYSQLI_ASSOC);
                // data 
                $name_owner = $sql_owner_result["member_name"];
                $lastname_owner = $sql_owner_result["member_lastname"];
             
            ?>
            <a href="see-room-detail.php?home_id=<?php echo $home_id ?>" class="col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="img/home/<?php echo $query_img_result ?>" width="100%" alt="" class="img-hv-zoom">
                <div class="py-2">
                    <!-- <p class="f-14 mb-0 font-weight-bold color-snowgray">เดย์ทริป · ริโอเดอจาเนโร</p> -->
                    <p class="f-18 mb-0 font-weight-bold color-gray"><?php echo $home_name ?></p>
                    <p class="f-15 mb-0 color-snowgray">฿<?php echo number_format( $home_price )?> ต่อคน</p>
                    <p class="f-14 mb-0  color-snowgray"><span class="color-blue">4.95 *</span> (160) ·
                        ให้บริการเป็นภาษาปอร์ตุกีส ฝรั่งเศส 3 และภาษาอื่นๆ</p>
                    <p class="f-15 color-snowgray"><span class="color-blue">ผู้ขาย :</span>
                        <?php echo $name_owner.' '.$lastname_owner ?></p>

                </div>
            </a>
            <?php          
                }
            ?>
            <div class="col-md-12 py-5">
                <h5 class="color-blue btn-see-dt"><a href="see-room.php">แสดงประสบการณ์ทั้งหมด
                        (<?php echo $sql_count_viewhome_all ?>)</a> ></h5>
            </div>
        </div>
    </div>
    <a href="#" uk-scroll>
        <img src="img/up.png" alt="" width="50" class="totop dpn">
    </a>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <!-- <script src="js/layout.js"></script> -->
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/currency-autocomplete.js"></script>
    <!-- <script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script> -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>

    <!-- <script>
        function validate() {
            $("#file_error").html("");
            $(".demoInputBox").css("border-color","#F0F0F0");
            var file_size = $('#filUpload')[0].files[0].size;
            if(file_size>2097152) {
                $("#file_error").html("File size is greater than 2MB");
                $(".demoInputBox").css("border-color","#FF0000");
                return false;
            } 
            return true;
        }
    </script> -->
    <script>
    // $( function() {
    //     /* Check width on page load*/
    //     if ( $(".detail-profile").height() > 500) {
    //     $('.footer').addClass('pst-unset');
    //     }
    //     else{
    //         $('.footer').removeClass('pst-unset');
    //     }
    // });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#filUpload").change(function() {
        readURL(this);
    });
    </script>
</body>

</html>