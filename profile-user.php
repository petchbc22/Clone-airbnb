<?php
    error_reporting (E_ALL ^ E_NOTICE);
    include 'appsystem/inc_config.php';
    $member_id = $_GET["member_id"];
    // include 'appsystem/check_login.php';
    $ss_member_id = $_SESSION["ss_member_id"];
    $ss_member_email = $_SESSION["ss_member_email"];
    $ss_member_permission = $_SESSION["ss_member_permission"];
//     if (  $ss_member_id == ""   or   $ss_member_email == "" or $ss_member_permission == "" ) {
//     mysqli_close($conn);
//         $message = 'กรุณาเข้าสู่ระบบก่อน !!';

//         echo "<SCRIPT type='text/javascript'> //not showing me this
//             alert('$message');
//             window.location.replace(\"index.php\");
//         </SCRIPT>";
//     exit();
//   }
   
    // select data session for header
	$strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
	$objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
    $main_member_id = $objResult["member_id"];
    $main_member_name = $objResult["member_name"];
    $main_member_lastname = $objResult["member_lastname"];
    $main_member_email = $objResult["member_email"];
    $main_member_permission = $objResult["member_permission"];
    // select data to show in page
    $sql_member = "SELECT * FROM member WHERE member_id = '$member_id' and approve = 1";
    $member_result = $conn->query($sql_member);
    $member_count = $member_result->num_rows;
    if($member_count == 1) {
        if ($member_result){
            $result_rs = mysqli_fetch_assoc($member_result);
            $member_email = $result_rs["member_email"];
            $member_name = $result_rs["member_name"];
            $member_lastname = $result_rs["member_lastname"];
            $member_birthday = $result_rs["member_birthday"];
            $member_images = $result_rs["member_images"];
            $member_permission = $result_rs["member_permission"];
            $approve = $result_rs["approve"];
            $member_tel = $result_rs["member_tel"];
            $member_facebook = $result_rs["member_facebook"];
            $member_ig = $result_rs["member_ig"];
            $member_line = $result_rs["member_line"];
            $member_about_me = $result_rs["member_about_me"];
        }
    }
    else {
        header("Location:404.php");
    } 

    // $objQuery_member = mysqli_query($conn,$sql_member);
    // $objResult_member = mysqli_fetch_array($objQuery_member,MYSQLI_ASSOC);
    // $member_email = $objResult_member["member_email"];
    // $member_name = $objResult_member["member_name"];
    // $member_lastname = $objResult_member["member_lastname"];
    // $member_birthday = $objResult_member["member_birthday"];
    // $member_images = $objResult_member["member_images"];
    // $member_permission = $objResult_member["member_permission"];
    // $approve = $objResult_member["approve"];
    // $member_tel = $objResult_member["member_tel"];
    // $member_facebook = $objResult_member["member_facebook"];
    // $member_ig = $objResult_member["member_ig"];
    // $member_line = $objResult_member["member_line"];
    // $member_about_me = $objResult_member["member_about_me"];

    // select sql home approve 
    $sql_vwhome = "SELECT * FROM home WHERE member_id = '$member_id' AND approve = 1 AND home_status = 'N' limit 6 ";
    $home_result_vwhome = $conn->query($sql_vwhome);
    $home_count_vwhome = $home_result_vwhome->num_rows;

    //count room
    $sql_vwhome_count = "SELECT * FROM home WHERE member_id = '$member_id' AND approve = 1 AND home_status = 'N'";
    $home_result_vwhome_count = $conn->query($sql_vwhome_count);
    $home_count_vwhome_count = $home_result_vwhome_count->num_rows;
    // select sql home not approve 


    // // report member
    // if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }
    // if ($appaction == "report_member"){
    //     if (empty($_REQUEST['detail_report'])) { $detail_report = ""; } else { $detail_report = $_REQUEST["detail_report"]; }

	// 	$sql = "INSERT INTO report_member (member_report_id,member_victim_id,detail_report,date_report) VALUES ";
    //     $sql .= "('$ss_member_id','$member_id','$detail_report',now())";
    //     $result = $conn->query($sql);
    //     if ($result == TRUE) {
    //         $message = 'สำเร็จ ';
    //         echo "<SCRIPT type='text/javascript'> //not showing me this
    //             alert('$message');
    //         </SCRIPT>";
    //     }
    //     else {
    //         $message = 'ไม่สำเร็จ กรุณาลองใหม่ ! ';
    //         echo "<SCRIPT type='text/javascript'> //not showing me this
    //             alert('$message');
    //         </SCRIPT>";
    //     }
    // }
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sweetalert.css"> 
</head>
<body class="boon-fonts-regular" id="thankyou">
    <?php 
        // report member
        if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }
        if ($appaction == "report_member"){
            if (empty($_REQUEST['detail_report'])) { $detail_report = ""; } else { $detail_report = $_REQUEST["detail_report"]; }
    
            $sql = "INSERT INTO report_member (member_report_id,member_victim_id,detail_report,date_report) VALUES ";
            $sql .= "('$ss_member_id','$member_id','$detail_report',now())";
            $result = $conn->query($sql);
            if ($result == TRUE) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("รายงานผู้ใช้งานสำเร็จ !","Message!","success");';
                echo '}, 500);</script>';
            }
            else {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("รายงานผู้ใช้งานไม่สำเร็จ กรุณาลองใหม่ !","Message!","warning");';
                echo '}, 500);</script>';
            }
        }
    ?>
    <!-- header -->
    <?php include 'component/header.php';?>
    <!-- container -->
    <div class="container pt-90 pb-3 set-h-js">
        <div class="row pt-5">
            <div class="col-md-4 text-center">
                <img src="img/<?php echo $member_images ?>" alt="" class="oj-fit" width="200" height="200">
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
                <p class="f-14 color-blue font-weight-bold"><?php if($result_rs["member_permission"] == '0'){ echo 'ผู้ดูแลระบบ';}else if($result_rs["member_permission"] == '1'){ echo 'ผู้ใช้งานทั่วไป';}else if($result_rs["member_permission"] == '2'){ echo 'Agency';} ?></p>
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
            if ( $(".set-h-js").height() > 400) {
            $('.footer').addClass('pst-unset');
            }
            else{
                $('.footer').removeClass('pst-unset');
            }
        });
    </script>

</body>
</html>
