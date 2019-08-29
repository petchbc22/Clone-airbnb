<?php
    include 'appsystem/inc_config.php';
    include 'appsystem/check_login.php';
//   get session id home
    $home_id = $_GET["home_id"];
    $ss_member_id = $_SESSION["ss_member_id"];
    // for header 
    $strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
    $img_frist = $objResult_img["pic_name"];
// พ่นค่าออกมาเพื่อเอาไปเข้าเงื่อนไขข้างล่าง
    $sql_img = "SELECT * FROM vw_home WHERE home_id = '$home_id' and home_status = 'N' and pic_status ='N' ";
    $sql_img_query = mysqli_query($conn,$sql_img);
    $sql_img_result = mysqli_fetch_array($sql_img_query,MYSQLI_ASSOC);
    $pic_name_0 = $sql_img_result["pic_name"];
    $member_id_vw = $sql_img_result["member_id"];
//   เงื่อนไขการดูหน้านี้ว่า สิทธิ์ไหนมีสิทธิ์เข้าดูบ้าง
        if($ss_member_id == "" ){ //ถ้าไม่มีการเข้าสู่ระบบ ให้โชว์บ้านที่อนุมัติแล้ว
            $sql_home = " SELECT * FROM home WHERE home_id = '$home_id' AND home_status = 'N' AND approve = 1 ";
                $home_result = $conn->query($sql_home);
                $home_count = $home_result->num_rows;
                if($home_count == 1) {
                    if ($home_result){
                        $result_rs = mysqli_fetch_assoc($home_result);
                        $home_name = $result_rs["home_name"];
                        $home_detail = $result_rs["home_detail"];
                        $home_bedroom = $result_rs["home_bedroom"];
                        $home_toilet = $result_rs["home_toilet"];
                        $home_bed = $result_rs["home_bed"];
                        $home_price = $result_rs["home_price"];
                        $home_video_link = $result_rs["home_video_link"];
                        $home_status = $result_rs["home_status"];
                    }
                    if(strpos($home_video_link,'youtube')>0){
                        $video_link_new = str_ireplace("https://www.youtube.com/watch?v=","",$home_video_link);
                        $link_new = "https://www.youtube.com/embed/".$video_link_new;
                    }else if(strpos($home_video_link,'vimeo')>0){
                        $video_link_new = str_ireplace("https://vimeo.com/","",$home_video_link);
                        $link_new = "https://player.vimeo.com/video/".$video_link_new;
                     }
                }
                else {
                    header("Location:404.php");
                }  
        }
        else if ($ss_member_id == $member_id_vw) { // ถ้าเข้าสู่ระบบแล้วสามารถดูหน้าที่ยังไม่อนุมัติได้ เฉพาะของตัวเองเท่านั้น
            $sql_home = " SELECT * FROM home WHERE home_id = '$home_id' AND home_status = 'N'";
            $home_result = $conn->query($sql_home);
            $home_count = $home_result->num_rows;
          
            if($home_count == 1) {
                if ($home_result){
                    $result_rs = mysqli_fetch_assoc($home_result);
                    $home_name = $result_rs["home_name"];
                    $home_detail = $result_rs["home_detail"];
                    $home_bedroom = $result_rs["home_bedroom"];
                    $home_toilet = $result_rs["home_toilet"];
                    $home_bed = $result_rs["home_bed"];
                    $home_price = $result_rs["home_price"];
                    $home_video_link = $result_rs["home_video_link"];
                    $home_status = $result_rs["home_status"];
                }   
                if(strpos($home_video_link,'youtube')>0){
                    $video_link_new = str_ireplace("https://www.youtube.com/watch?v=","",$home_video_link);
                    $link_new = "https://www.youtube.com/embed/".$video_link_new;
                }else if(strpos($home_video_link,'vimeo')>0){
                    $video_link_new = str_ireplace("https://vimeo.com/","",$home_video_link);
                    $link_new = "https://player.vimeo.com/video/".$video_link_new;
                 }
            }
            else {
                header("Location:404.php");
            }   
        }
        else if ($ss_member_id != $member_id_vw) { //ถ้าเข้าสู่ระบบไม่สามารถดูหน้าที่ยังไม่ได้อนุมัติของคนอื่นได้
            $sql_home = " SELECT * FROM home WHERE home_id = '$home_id' AND home_status = 'N' AND approve = 1";
            $home_result = $conn->query($sql_home);
            $home_count = $home_result->num_rows;
          
            if($home_count == 1) {
                if ($home_result){
                    $result_rs = mysqli_fetch_assoc($home_result);
                    $home_name = $result_rs["home_name"];
                    $home_detail = $result_rs["home_detail"];
                    $home_bedroom = $result_rs["home_bedroom"];
                    $home_toilet = $result_rs["home_toilet"];
                    $home_bed = $result_rs["home_bed"];
                    $home_price = $result_rs["home_price"];
                    $home_video_link = $result_rs["home_video_link"];
                    $home_status = $result_rs["home_status"];
                }   
                if(strpos($home_video_link,'youtube')>0){
                    $video_link_new = str_ireplace("https://www.youtube.com/watch?v=","",$home_video_link);
                    $link_new = "https://www.youtube.com/embed/".$video_link_new;
                }else if(strpos($home_video_link,'vimeo')>0){
                    $video_link_new = str_ireplace("https://vimeo.com/","",$home_video_link);
                    $link_new = "https://player.vimeo.com/video/".$video_link_new;
                 }
            }
            else {
                header("Location:404.php");
            }
        }
        else {
            header("Location:404.php");
        }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>
        <?php echo $home_name; ?> | Real Estate
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
    <link rel="stylesheet" href="assets/assets/css/fileinput.min.css" type="text/css">
    <link rel="stylesheet" href="assets/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sweetalert.css"> 
</head>
<body class="boon-fonts-regular" id="detail">
    <?php 
        // report member
        if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }
        if ($appaction == "report_room"){
            if (empty($_REQUEST['detail_report'])) { $detail_report = ""; } else { $detail_report = $_REQUEST["detail_report"]; }

            $sql = "INSERT INTO report_home (member_report_id,home_victim_id,detail_report,date_report) VALUES ";
            $sql .= "('$ss_member_id','$home_id','$detail_report',now())";
            $result = $conn->query($sql);
            if ($result == TRUE) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("รายงานสถานที่งานสำเร็จ !","Message!","success");';
                echo '}, 500);</script>';
            }
            else {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("รายงานสถานที่ไม่สำเร็จ กรุณาลองใหม่ !","Message!","warning");';
                echo '}, 500);</script>';
            }
        }
    ?>
    <?php include 'component/header.php';?>
    <div class="container pt-90" id="images-banner">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-4 heading-room f-18 resp-bd-bt">
                <p class="custom-name-room text-left mb-0 text-center text-md-left text-lg-left" style="color:black;"><?php echo $home_name; ?></p>
                <?php if ($_SESSION["ss_member_id"] =="") { ?>
                    <div class="pr-2 py-2 text-center text-md-left text-lg-left"><button class="uk-button uk-button-danger" uk-toggle="target: #modal-login">รายงานสถานที่นี้</button></div>
                <?php } elseif ($ss_member_id == $member_id_vw) { ?>
                    <div class="pr-2"><button class="uk-button uk-button-danger" disabled  uk-tooltip="คุณไม่สามารถรายงานบ้านของตนเอง">รายงานสถานที่นี้</button></div>
                <?php } else { ?>
                    <div class="pr-2"><button class="uk-button uk-button-danger" uk-toggle="target: #modal-report-room">รายงานสถานที่นี้</button></div>
                <?php } ?>
            </div>
            <div class="col-12 col-md-12 col-lg-8 order-first order-lg-1 heading-room-img">
                <?php 
                    if (empty($home_video_link)) {
                ?>
                    <div class="uk-inline w-100">
                        <img src="img/home/<?php echo $pic_name_0 ?>" alt="" width="100%">
                        <div class="uk-position-bottom-right p-3"><button class="uk-button bg-gray"><span uk-icon="list"></span> สำรวจบ้าน</button></div>
                    </div>
                <?php
                    } else {
                    ?>
                    <div class="uk-inline embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?php echo $link_new; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <?php
                        }
                    ?>
            </div>
        </div>
    </div>
    <?php 
        $sql_owner = "SELECT * FROM member WHERE member_id = '$member_id_vw' ";
        $sql_owner_query = mysqli_query($conn,$sql_owner);
        $sql_owner_result = mysqli_fetch_array($sql_owner_query,MYSQLI_ASSOC);
        // data 
        $name_owner = $sql_owner_result["member_name"];
        $lastname_owner = $sql_owner_result["member_lastname"];
        $pic_owner = $sql_owner_result["member_images"];
        $owner_id = $sql_owner_result["member_id"];
    ?>
  
    <section class="container-room">
        <div class="container bd-bt pb-4">
            <div class="row">
                <div class="col-md-12 col-lg-7 resp-bd-bt mb-3 pt-3">
                    <div class="d-flex">
                        <!-- <p class="f-16 font-weight-bold pr-3">ผู้เข้าพัก 4 คน</p> -->
                        <b class="f-16 font-weight-bold pr-3 text-black"><?php echo $home_bedroom; ?> ห้องนอน</b>
                        <b class="f-16 font-weight-bold pr-3 text-black"><?php echo $home_bed; ?> เตียง</b>
                        <b class="f-16 font-weight-bold pr-3 text-black"><?php echo $home_toilet; ?> ห้องน้ำ</b>
                    </div>
                    <p class="pt-3 mb-0 f-16" style="color:black; line-height:1.43; font-size:20px;">
                        <?php echo $home_detail; ?>
                    </p>
                </div>
                <div class="col-md-12 col-lg-5 m-auto">
                    <div class="row border-g border-radius-20 p-2">
                        <h1 class="col-12 show-mobile-992 mb-0 font-weight-bold pt-3 text-center text-md-left text-lg-left">
                            จากเจ้าของที่พักของคุณ
                        </h1>
                        <div class="col-12 col-md-6 col-lg-4 p-2 w-25 text-center">
                            <img src="img/<?php echo $pic_owner ?>" alt="" class="oj-fit uk-border-circle " width="80" height="80">
                        </div>
                        <div class="col-12 col-md-6 col-lg-8 p-2 w-75 m-auto text-center text-md-left text-lg-left">
                            <!-- <p class="f-18">The heated concrete floors allow you to be barefoot in subzero weather, but cool in the summer.</p> -->
                            <p><?php echo $name_owner.' '.$lastname_owner ?></p>
                            <a href="profile-user.php?member_id=<?php echo $owner_id?>">
                                <button class="uk-button uk-button-default">ดูผู้ขายคนนี้</button>
                            </a>
                       
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
        $sql_pic = " SELECT * FROM picture_home WHERE home_id = '$home_id' AND  pic_status = 'N'";
        $home_result_pic = $conn->query($sql_pic);
        $home_count_pic = $home_result_pic->num_rows;
        ?>
        <div class="container bd-bt pb-3"  >
            <div class="row" uk-lightbox="animation: scale">
                <div class="col-md-12 py-3">
                    <h1 class="text-left mb-0 font-weight-bold">ภาพภายในบ้านพัก</h1>
                </div>
                <?php
                while($pic_home_result_query = mysqli_fetch_array($home_result_pic,MYSQLI_ASSOC)){
                ?>
                <div class="col-md-3 text-center py-2">
                    <div class="uk-inline">
                        <div>
                            <a class="uk-inline" href="img/home/<?php echo $pic_home_result_query["pic_name"]; ?>">
                                <img src="img/home/<?php echo $pic_home_result_query["pic_name"]; ?>" class="oj-fit" width="100%" height="200" alt="">
                            </a>
                        </div>
                        
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
         
            </div>
            <div class="row">
                <div class="col-md-12 py-3">
                    <a href="see-all-picture.php?home_id=<?php echo $home_id; ?>" class="f-18 font-weight-bold ">ดูรูปทั้งหมด <?php echo $home_count_pics; ?> รูป</a>
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
                    <h1 class="text-left mb-0 font-weight-bold">สิ่งอำนวยความสะดวก</h1>
                    <p class="f-18">สิ่งอำนวยความสะดวกสำหรับคุณ</p>
                </div>
                <div class="col-md-12">
                    <p class="f-18 font-weight-bold">ประจำวัน</p>
                    <div class="row">
                      <?php
                      while($fa_home_result_query = mysqli_fetch_array($home_fa,MYSQLI_ASSOC)){
                      ?>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="bg-gray resp-md-h">
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
                    <h1 class="text-left mb-0 font-weight-bold">ตำแหน่งที่ตั้ง</h1>
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
    <!-- footer -->
    <?php include 'component/footer.php';?>
    <!-- fixed -->
    <!--<div class="container-fluid Reservations-bar">
        <div class="row">
            <div class="col-md-6 text-center text-sm-center text-md-left dpn-mobile">
                <p class="f-14 mb-0">ลอฟท์ทั้งบริเวณ ใน ลอสแอนเจลิส</p>
                <div  class="px-2">
                    <i class="fas fa-star color-blue f-12"></i>
                    <i class="fas fa-star color-blue f-12"></i>
                    <i class="fas fa-star color-blue f-12"></i>
                    <i class="fas fa-star color-blue f-12"></i>
                    <i class="fas fa-star color-blue f-12"></i>
                    <span class="text-black">186</span>
                </div>
            </div>
            <div class="col-md-6 text-center text-sm-center text-md-right ">
                <div class="px-2">
                    <span class="mb-0 pt-2 ">
                        <span class="mb-0 pt-2">$142 / คืน</span>
                        <span class="show-mobile pb-2">
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <span class="text-black">186</span>
                        </span>
                    </span>
                    <button class="uk-button uk-button-danger" uk-toggle="target: #modal-Reservations">ขอจอง</button>
                </div>
            </div>
        </div>
    </div> -->

    <a href="#" uk-scroll>
        <img src="img/up.png" alt="" width="50" class="totop dpn">
    </a>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/currency-autocomplete.js"></script>
    <script type="text/javascript"  src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="assets/assets/js/custom-map.js"></script>
    <script type="text/javascript" src="assets/assets/js/custom.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script>

    </script>
</body>
</html>
