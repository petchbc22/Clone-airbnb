<?php
  include 'appsystem/inc_config.php';
  include 'appsystem/check_login.php';
  include 'appsystem/check_permission.php';
  $home_id = $_GET["home_id"];
  $ss_member_id = $_SESSION["ss_member_id"];
  if ($ss_member_permission != 0){
    $message = 'หน้านี้เป็นสิทธิ์สงวนสำหรับผู้ดูแลระบบ !!';
    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"index.php\");
    </SCRIPT>";
  }
 
  $sql_home = " SELECT * FROM home WHERE home_id = '$home_id' AND home_status = 'N' ";
  $home_result = $conn->query($sql_home);
  $home_count = $home_result->num_rows;
  

  if($home_count = 1) {
    if ($home_result){
        $result_rs = mysqli_fetch_assoc($home_result);
        $home_name = $result_rs["home_name"];
        $home_detail = $result_rs["home_detail"];
        $home_bedroom = $result_rs["home_bedroom"];
        $home_toilet = $result_rs["home_toilet"];
        $home_bed = $result_rs["home_bed"];
        $home_price = $result_rs["home_price"];
        $home_video_link = $result_rs["home_video_link"];

    }
    $sql_img = "SELECT * FROM vw_home WHERE home_id = '$home_id' and home_status = 'N' and pic_status ='N' ";
    $sql_img_query = mysqli_query($conn,$sql_img);
    $sql_img_result = mysqli_fetch_array($sql_img_query,MYSQLI_ASSOC);
    $pic_name_0 = $sql_img_result["pic_name"];
    $member_id_vw = $sql_img_result["member_id"];
    // mysqli_close($conn);
    
    if(strpos($home_video_link,'youtube')>0){
        $video_link_new = str_ireplace("https://www.youtube.com/watch?v=","",$home_video_link);
        $link_new = "https://www.youtube.com/embed/".$video_link_new;
    }else if(strpos($home_video_link,'vimeo')>0){
        $video_link_new = str_ireplace("https://vimeo.com/","",$home_video_link);
        $link_new = "https://player.vimeo.com/video/".$video_link_new;
     }
  }
  
  $strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
  $objQuery = mysqli_query($conn,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="img/logo.png">
<link rel="icon" type="image/png" href="img/logo.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
        <?php echo $home_name; ?> | Real Estate
</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!-- CSS Files -->
<link href="css/components.css" rel="stylesheet">
<link href="css/layout.css" rel="stylesheet">
<link href="admin-screen/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css" />
<link rel="stylesheet" href="assets/assets/css/fileinput.min.css" type="text/css">
<link rel="stylesheet" href="assets/assets/css/style.css" type="text/css">
</head>

<body class="boon-fonts-regular" id="addplace">
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
                <li>
                    <a href="management-user.php">
                        <i class="nc-icon nc-single-02"></i>
                        <p>การจัดการผู้ใช้งาน</p>
                    </a>
                </li>
                <li class="active">
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
                        <li><a href="management-estate.php" class="f-20 font-weight-bold">การจัดการสถานที่</a></li>
                        <li><span class="f-20 font-weight-bold"><?php echo $home_name; ?> </span></li>
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
                            <p>ยินดีต้อนรับ คุณ <?php echo $objResult["member_name"];?> <?php echo $objResult["member_lastname"];?></p>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-rotate" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- <div class="panel-header panel-header-lg">

    <canvas id="bigDashboardChart"></canvas>

    </div> -->
    <div class="content">   
        <div class="bgw-bdr">
            <div class="container" id="images-banner">
                <div class="row">
                    <div class="col-12 f-18">
                        <!-- <h3 class=" text-left">LOGO</h3> -->
                        <p class="custom-name-room text-center" style="color:black;"><?php echo $home_name; ?></p>
                    </div>
                    <div class="col-12 text-center heading-room-img">

                        
                            <?php if(empty($home_video_link)) { ?>
                            <img src="img/home/<?php echo $pic_name_0 ?>" alt="" width="100%">
                            <?php } else { ?>
                                <div class="uk-inline embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $link_new; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            <?php } ?>
                            <!-- <div class="uk-position-bottom-right p-3"><button class="uk-button  bg-gray"><span uk-icon="list"></span> สำรวจบ้าน</button></div> -->
                      
                    </div>
                </div>
            </div>
            <section class="container-room">
                <div class="container bd-bt pb-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <!-- <p class="f-16 font-weight-bold pr-3">ผู้เข้าพัก 4 คน</p> -->
                                <b class="f-16 font-weight-bold pr-3" style="color: black;">  <?php echo $home_bedroom; ?> ห้องนอน</b>
                                <b class="f-16 font-weight-bold pr-3" style="color: black;">  <?php echo $home_bed; ?> เตียง</b>
                                <b class="f-16 font-weight-bold pr-3" style="color: black;">  ห้องน้ำ <?php echo $home_toilet; ?> ห้อง</b>
                            </div>
                            <p class="mb-0 f-16" style="color:black; line-height:1.43; font-size:20px;">
                                <?php echo $home_detail; ?>
                            </p>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <?php
                $sql_pic = " SELECT * FROM picture_home WHERE home_id = '$home_id' AND  pic_status = 'N' limit 8 ";
                $home_result_pic = $conn->query($sql_pic);
                $home_count_pic = $home_result_pic->num_rows;
                ?>
                <div class="container bd-bt pb-3">
                    <div class="row">
                        <div class="col-md-12 py-3">
                            <h1 class="text-left mb-0">ภาพภายในบ้านพัก</h1>
                        </div>
                        <?php
                        while($pic_home_result_query = mysqli_fetch_array($home_result_pic,MYSQLI_ASSOC)){
                        ?>
                        <div class="col-md-3 text-center py-2">
                            <div class="uk-inline">
                                <img src="img/home/<?php echo $pic_home_result_query["pic_name"]; ?>" class="oj-fit" width="100%" height="200" alt="">
                                <!-- <div class="uk-overlay uk-overlay-primary uk-position-bottom p-1">
                                    <p>พื้นที่อยู่อาศัย</p>
                                </div> -->
                            </div>
                        </div>
                        <?php
                    }
                        ?>

                        <?php
                            $sql_pics = " SELECT * FROM picture_home WHERE home_id = '$home_id' AND  pic_status = 'N'  ";
                            $home_result_pics = $conn->query($sql_pics);
                            $home_count_pics = $home_result_pics->num_rows;
                        ?>
                        <div class="col-md-12 py-3">
                            <a href="#" class="f-18 font-weight-bold ">ดูรูปทั้งหมด <?php echo $home_count_pics; ?> รูป</a>
                        </div>
                    </div>
                </div>
                <?php
                $sql_fa = " SELECT * FROM vw_facilities WHERE home_id = '$home_id' AND  cus_fa_status = 'N' ";
                $home_fa = $conn->query($sql_fa);
                $home_fa_count = $home_fa->num_rows;

                ?>
                <div class="container bd-bt pb-3">
                    <div class="row">
                        <div class="col-md-12 py-3">
                            <h1 class="text-left mb-0">สิ่งอำนวยความสะดวก</h1>
                            <p class="f-18">สิ่งอำนวยความสะดวกสำหรับคุณ</p>
                        </div>
                        <div class="col-md-12">
                            <p class="f-18 font-weight-bold">ประจำวัน</p>
                            <div class="row">
                            <?php
                            while($fa_home_result_query = mysqli_fetch_array($home_fa,MYSQLI_ASSOC)){
                            ?>
                                <div class="col-md-2">
                                    <div class="bg-gray">
                                        <img src="img/facilities/<?php echo $fa_home_result_query["fa_pic"];?>" alt="" width="100%">
                                        <p class="f-16 text-center py-3" style="color:black;"><?php echo $fa_home_result_query["fa_name"]; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 py-3">
                            <h1 class="text-left mb-0">ตำแหน่งที่ตั้ง</h1>
                            <p class="f-18">เกรเทอร์ลอนดอน, England, สหราชอาณาจักร</p>
                        </div>
                        <div class="col-md-12">
                            <p class="f-16">
                                The property boasts easy access to the bustling Shoreditch, home to great restaurants, pubs,
                                and nightlife. The home is also close to Bethnal Green and Hoxton stations for easy public
                                transportation access to the rest of London.
                            </p>
                            <div id="submit-map"></div>
                        </div>
                    </div>
                </div>
            </section>        
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
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="js/uikit-icons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="assets/assets/js/custom-map.js"></script>
<script type="text/javascript" src="assets/assets/js/custom.js"></script>
</body>

</html>