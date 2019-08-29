<?php
    error_reporting (E_ALL ^ E_NOTICE);
    include 'appsystem/inc_config.php';
    // include 'appsystem/check_login.php';
    $ss_member_id = $_SESSION["ss_member_id"];
    $ss_member_email = $_SESSION["ss_member_email"];
    $ss_member_permission = $_SESSION["ss_member_permission"];
    if (  $ss_member_id == ""   or   $ss_member_email == "" or $ss_member_permission == "" ) {
    mysqli_close($conn);
        $message = 'กรุณาเข้าสู่ระบบก่อน !!';

        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
            window.location.replace(\"index.php\");
        </SCRIPT>";
    exit();
  }
    // select data to show in profile detail
	$strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
	$objQuery               = mysqli_query($conn,$strSQL);
    $objResult              = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
    $main_member_id         = $objResult["member_id"];
    $main_member_name       = $objResult["member_name"];
    $main_member_lastname   = $objResult["member_lastname"];
    $main_member_email      = $objResult["member_email"];
    $main_member_permission = $objResult["member_permission"];
    $main_member_tel        = $objResult["member_tel"];
    $main_member_facebook   = $objResult["member_facebook"];
    $main_member_ig         = $objResult["member_ig"];
    $main_member_line       = $objResult["member_line"];

    // select sql home approve 
    $sql_vwhome = "SELECT * FROM home WHERE member_id = '$ss_member_id' AND approve = 1 AND home_status = 'N' ";
    $home_result_vwhome = $conn->query($sql_vwhome);
    $home_count_vwhome = $home_result_vwhome->num_rows;

    // select sql home not approve 
    $sql_vwhome_no_appr = "SELECT * FROM home WHERE member_id = '$ss_member_id' AND approve = 0 AND home_status = 'N' ";
    $home_result_vwhome_no_appr = $conn->query($sql_vwhome_no_appr);
    $home_count_vwhome_no_appr = $home_result_vwhome_no_appr->num_rows;
      

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>โปร์ไฟล์ของคุณ | Real Estate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="css/sweetalert.css"> 

</head>
<body class="boon-fonts-regular" id="thankyou">
    <!-- header -->
    <?php include 'component/header.php';?>
    <!-- container -->
    <div class="container pt-90 pb-3 maxw-90pc">
        <div class="row">
            <div class="col-md-4 col-lg-3 text-center">
                <div class="box-profile">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-12 img-profile py-3">
                            <img src="img/<?php echo $objResult["member_images"]; ?>" alt="" class="uk-border-circle oj-fit" width="150" height="150">
                            <div class="dpn-mobile pt-3">
                            <a href="edit-profile.php"><span uk-icon="file-edit" class="pr-2"></span>แก้ไขโปรไฟล์</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 py-2 text-left">
                            <div class="show-mobile text-center text-sm-left text-md-left">
                                <h1 class="text-left p-0 m-0 text-center text-sm-left text-md-left">สวัสดี <?php echo $main_member_name.' '.$main_member_lastname?></h1>
                                <span>เข้าร่วมเมื่อ 2019 · <a href="edit-profile.php">แก้ไขโปรไฟล์</a></span>
                            </div>
                            <div class="contact-ico pb-3">
                                <!-- <div class="py-2"><h4 class="font-weight-bold pb-0 m-0 text-center text-md-center text-lg-left one f-18">ชื่อ : <span style="font-weight:500"> <?php echo $main_member_name.' '.$main_member_lastname?></span></h4></div> -->
                                <div class="py-2"><h4 class="font-weight-bold pb-0 m-0 text-center text-md-center text-lg-left one f-18">ประเภท : <span style="font-weight:500"><?php if($objResult["member_permission"] == '0'){ echo 'ผู้ดูแลระบบ';}else if($objResult["member_permission"] == '1'){ echo 'ผู้ใช้งานทั่วไป';}else if($objResult["member_permission"] == '2'){ echo 'Agency';} ?></span></h4></div>
                                <div class="py-2"><h4 class="font-weight-bold pb-0 m-0 text-center text-md-center text-lg-left one f-18">คุณมาจาก : <span style="font-weight:500"> Austin , Texas</span></h4></div>
                            </div>
                            <div>
                                <h2 class="f-17 pt-2 font-weight-bold">ช่องทางการติดต่อ</h2>
                            </div>
                            <div class="pt-2 text-left">
                                <img src="img/phone-call.png" width="20" height="20" class="mr-2"><?php if (empty($main_member_tel)){ echo 'ยังไม่ได้ระบุเบอร์โทรศัพท์';}else{echo $main_member_tel;} ?>
                            </div>
                            <div class="pt-2 text-left">
                                <img src="img/mail-black-envelope-symbol.png" width="20" height="20" class="mr-2"><?php if (empty($main_member_email)){ echo 'ยังไม่ได้ระบุอีเมล';}else{echo $main_member_email;} ?>
                            </div>
                            <div class="pt-2 text-left">
                                <span uk-icon="icon: facebook; ratio: 1" class="pr-2 color-blue"></span><?php if (empty($main_member_facebook)){ echo 'ยังไม่ได้ระบุ facebook';}else{echo $main_member_facebook;}  ?>
                            </div>
                            <div class="pt-2 text-left">
                                <img src="img/instagram-new-2016-logo-4773FE3F99-seeklogo.com.png" width="20" height="20" class="mr-2"><?php if (empty($main_member_ig)){ echo 'ยังไม่ได้ระบุ Instagram';}else{echo $main_member_ig;}  ?>
                            </div>
                            <div class="pt-2 text-left">
                                <img src="img/line.png" width="20" height="20" class="mr-2"><?php if (empty($main_member_line)){ echo 'ยังไม่ได้ระบุ Line ID';}else{echo $main_member_line;}  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9 detail-profile">
                <div class="box-detail-profile  minh-70">
                    <div class="dpn-mobile">
                        <h1 class="text-left p-0 m-0">สวัสดี <?php echo $objResult["member_name"];?> <?php echo $objResult["member_lastname"];?></h1>
                        <span>เข้าร่วมเมื่อ 2019 </span>
                    </div>
                    <div class="pt-3">
                        <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" style="border-bottom: 1px solid gainsboro;padding-bottom: 20px;">
                            <li class="w-50 text-center"><a href="#"><span><i class="fas fa-map-marked-alt pr-3"></i>สถานที่ของคุณ</span></a></li>
                            <li class="w-50 text-center"><a href="#"><span><i class="fas fa-hourglass-end pr-3"></i>สถานที่ของคุณที่รอการอนุมัติ</span></a></li>
                        </ul>
                        <ul class="uk-switcher uk-margin">
                        <?php if ( $home_count_vwhome >= 1) { ?>
                            <li>
                                <?php
  
                                    while($home_result_query_vwhome = mysqli_fetch_array($home_result_vwhome,MYSQLI_ASSOC)){
                                        $home_id_appr = $home_result_query_vwhome["home_id"];
                                        $query_img = "SELECT * FROM picture_home WHERE home_id = '$home_id_appr' and pic_status = 'N' limit 1 ";
                                        $sql_img_query = mysqli_query($conn,$query_img);
                                        $sql_img_result = mysqli_fetch_array($sql_img_query,MYSQLI_ASSOC);
                                        $query_img_result = $sql_img_result["pic_name"];
                                ?>
                                <div class="row py-3 bd-bt">
                                    <div class="col-md-6 col-lg-4 py-3">
                                        <img src="img/home/<?php echo $query_img_result; ?>" alt="" class="img-my-estate">
                                    </div>
                               
                                    <div class="col-md-6 col-lg-8 m-auto">
                                        <h3 class="font-weight-bold color-blue">
                                            <a href="see-room-detail.php?home_id=<?php echo $home_result_query_vwhome["home_id"]; ?>">
                                                <?php echo $home_result_query_vwhome["home_name"]; ?>
                                            </a>
                                        </h3>
                                        <div class="d-flex">
                                           
                                            <div class="pr-3">
                                                <p class="f-16 mb-0"><a href="see-room-detail.php?home_id=<?php echo $home_result_query_vwhome["home_id"]; ?>"><span><i class="fas fa-eye pr-3"></i></i></span>ดูสถานที่นี้</a></p>
                                            </div>
                                            <div class="pr-3">
                                                <p class="f-16 mb-0"><a href="edit-estate.php?home_id=<?php echo $home_result_query_vwhome["home_id"]; ?>"><span><i class="fas fa-edit pr-3"></i></i></span>แก้ไข</a></p>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <span class="text-black">186</span>
                                        </div>
                                    </div>
                                </div>
                             <?php } ?>
                            </li>
                            <?php 
                            } else {    
                            ?>
                            <div class="f-20 text-danger text-center">ไม่พบสถานที่ของคุณ</div>
                            <?php }?>

                            <?php if ( $home_count_vwhome_no_appr >= 1) { ?>
                            <li>
                                <?php
                                    // } else {
                                    while($home_result_query_vwhome_no_appr = mysqli_fetch_array($home_result_vwhome_no_appr,MYSQLI_ASSOC)){
                                        $home_id_appr = $home_result_query_vwhome_no_appr["home_id"];
                                        $query_img = "SELECT * FROM picture_home WHERE home_id = '$home_id_appr' and pic_status = 'N' limit 1 ";
                                        $sql_img_query = mysqli_query($conn,$query_img);
                                        $sql_img_result = mysqli_fetch_array($sql_img_query,MYSQLI_ASSOC);
                                        $query_img_result = $sql_img_result["pic_name"];
                                ?>
                                <div class="row py-3 bd-bt">
                                    <div class="col-md-6 col-lg-4 py-3">
                                        <img src="img/home/<?php echo $query_img_result; ?>" alt="" class="img-my-estate">
                                    </div>
                               
                                    <div class="col-md-6 col-lg-8 m-auto">
                                        <h3 class="font-weight-bold color-blue">
                                            <a href="see-room-detail.php?home_id=<?php echo $home_result_query_vwhome_no_appr["home_id"]; ?>">
                                                <?php echo $home_result_query_vwhome_no_appr["home_name"]; ?>
                                            </a>
                                        </h3>
                                        <div class="d-flex">
                                           
                                            <div class="pr-3">
                                                <p class="f-16 mb-0"><a href="see-room-detail.php?home_id=<?php echo $home_result_query_vwhome_no_appr["home_id"]; ?>"><span><i class="fas fa-eye pr-3"></i></i></span>ดูสถานที่นี้</a></p>
                                            </div>
                                            <div class="pr-3">
                                                <p class="f-16 mb-0"><a href="edit-estate.php?home_id=<?php echo $home_result_query_vwhome_no_appr["home_id"]; ?>"><span><i class="fas fa-edit pr-3"></i></i></span>แก้ไข</a></p>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <i class="fas fa-star color-blue f-12"></i>
                                            <span class="text-black">186</span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </li>
                            <?php 
                                } else {
                            ?>
                                <div class="f-20 text-danger text-center">ไม่พบสถานที่ของคุณที่ยังไม่ได้รับการอนุมัติ</div>
                            <?php 
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include 'component/footer.php';?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <script>
        $( function() {
            /* Check width on page load*/
            if ( $(".detail-profile").height() > 500) {
            $('.footer').addClass('pst-unset');
            }
            else{
                $('.footer').removeClass('pst-unset');
            }
        });
    </script>

</body>
</html>
