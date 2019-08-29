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
    <link rel="stylesheet" href="css/sweetalert.css"> 
    <link rel="stylesheet" href="assets/css/sweetalert.css"> 
    <script src="assets/js/sweetalert2@8.js"></script>
</head>
<body class="boon-fonts-regular" id="thankyou">
    <?php 
      // edit code
        if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }
        
        if ($appaction == "edituser"){
        if (empty($_REQUEST['member_name'])) { $home_name = ""; } else { $member_name = $_REQUEST["member_name"]; }
        if (empty($_REQUEST['member_lastname'])) { $member_lastname = ""; } else { $member_lastname = $_REQUEST["member_lastname"]; }
        if (empty($_REQUEST['member_password'])) { $member_password = ""; } else { $member_password = $_REQUEST["member_password"]; }
        if (empty($_REQUEST['member_birthday'])) { $member_birthday = ""; } else { $member_birthday = $_REQUEST["member_birthday"]; }
        if (empty($_REQUEST['member_permission'])) { $member_permission = ""; } else { $member_permission = $_REQUEST["member_permission"]; }
        if (empty($_REQUEST['member_images'])) { $member_images = ""; } else { $member_images = $_REQUEST["member_images"]; }
        if (empty($_REQUEST['member_about_me'])) { $member_about_me = ""; } else { $member_about_me = $_REQUEST["member_about_me"]; }
        if (empty($_REQUEST['member_tel'])) { $member_tel = ""; } else { $member_tel = $_REQUEST["member_tel"]; }
        if (empty($_REQUEST['member_facebook'])) { $member_facebook = ""; } else { $member_facebook = $_REQUEST["member_facebook"]; }
        if (empty($_REQUEST['member_ig'])) { $member_ig = ""; } else { $member_ig = $_REQUEST["member_ig"]; }
        if (empty($_REQUEST['member_line'])) { $member_line = ""; } else { $member_line = $_REQUEST["member_line"]; }
                // @unlink("myfile/".$_POST["hdnOldFile"]);
                $sql = "UPDATE member SET 
                    member_name     = '$member_name' ,
                    member_lastname = '$member_lastname' ,
                    member_password = '$member_password' ,
                    member_birthday = '$member_birthday' ,
                    member_tel      = '$member_tel',
                    member_facebook = '$member_facebook',
                    member_ig       = '$member_ig',
                    member_line     = '$member_line',
                    member_about_me = '$member_about_me'
                    WHERE member_id = '$ss_member_id' ";
                    $query = mysqli_query($conn,$sql);
                    if ($query == TRUE) {
                        $message = 'สำเร็จ ';
                        echo '<script>
                        setTimeout(function() {
                            swal({
                                title: "แก้ไขข้อมูลส่วนตัวสำเร็จ !",
                                type: "success"
                            }).then(function() {
                                window.location = "profile.php";
                            });
                        }, 300);
                    </script>';  
                    }
                    else {
                        echo '<script>
                            setTimeout(function() {
                                swal({
                                    title: "แก้ไขข้อมูลส่วนตัวไม่สำเร็จ !",
                                    type: "success"
                                }).then(function() {
                                    window.location = "edit-profile.php";
                                });
                            }, 300);
                        </script>';  
                    }
                    // ถ้ารูปไม่เท่ากับค่าว่าง ให้เข้าเงื่อนไขอัพรูป
                	if($_FILES["filUpload"]["name"] != "")
                    {
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
                        $path_link="img/".$newname;
                            if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],$path_copy))
                            {

                                //*** ลบรูปเก่าทิ้ง ***//			
                                @unlink("img/".$_POST["hdnOldFile"]);
                                
                                //*** เพิ่มรูปใหม่ลงไป ***//
                                $sql = "UPDATE member SET 
                                member_name     = '$member_name' ,
                                member_lastname = '$member_lastname' ,
                                member_password = '$member_password' ,
                                member_birthday = '$member_birthday' ,
                                member_images   = '$newname',
                                member_tel      = '$member_tel',
                                member_facebook = '$member_facebook',
                                member_ig       = '$member_ig',
                                member_line     = '$member_line',
                                member_about_me = '$member_about_me'
                                WHERE member_id = '$ss_member_id' ";
                                $query = mysqli_query($conn,$sql);		

                                if ($query == TRUE) {
                                    $message = 'สำเร็จ ';
                                    echo '<script>
                                    setTimeout(function() {
                                        swal({
                                            title: "แก้ไขข้อมูลส่วนตัวสำเร็จ !",
                                            type: "success"
                                        }).then(function() {
                                            window.location = "profile.php";
                                        });
                                    }, 300);
                                </script>';  
                                }
                                else {
                                    echo '<script>
                                        setTimeout(function() {
                                            swal({
                                                title: "แก้ไขข้อมูลส่วนตัวไม่สำเร็จ !",
                                                type: "success"
                                            }).then(function() {
                                                window.location = "edit-profile.php";
                                            });
                                        }, 300);
                                    </script>';  
                                }

                            }
                    }
        }

            $strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
            $objQuery               = mysqli_query($conn,$strSQL);
            $objResult              = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
            $main_member_id         = $objResult["member_id"];
            $main_member_name       = $objResult["member_name"];
            $main_member_lastname   = $objResult["member_lastname"];
            $main_member_email      = $objResult["member_email"];
            $main_member_permission = $objResult["member_permission"];
            $main_member_images     = $objResult["member_images"];
            $main_member_brithday   = $objResult["member_birthday"];
            $main_member_password   = $objResult["member_password"];
            $main_member_tel        = $objResult["member_tel"];
            $main_member_facebook   = $objResult["member_facebook"];
            $main_member_ig         = $objResult["member_ig"];
            $main_member_line       = $objResult["member_line"];
            $main_member_about_me   = $objResult["member_about_me"];
    ?>
    <!-- header -->
    <?php include 'component/header.php';?> 
    <!-- container -->
    <div class="container pt-90 pb-3 maxw-90pc">
        <div class="row">
            <div class="col-md-4 col-lg-3 text-center">
                <div class="box-profile">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-12 img-profile py-3">
                            <img src="img/<?php echo $main_member_images ?>" alt="" class="uk-border-circle oj-fit" width="150" height="150">
                            <div class="dpn-mobile pt-3">
                                <a href="profile.php"><span uk-icon="user" class="pr-2"></span>กลับไปหน้าโปรไฟล์</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 py-2 text-left m-auto">
                            <div class="show-mobile text-center text-sm-left text-md-left">
                                <h3 class="text-left p-0 m-0 text-center text-sm-left text-md-left">สวัสดี <?php echo $main_member_name.' '.$main_member_lastname?></h3>
                                <span>เข้าร่วมเมื่อ 2019 · <a href="profile.php">กลับไปหน้าโปรไฟล์</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9 detail-profile box-detail-profile">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="one py-3 mb-0"><span class=" f-24">แก้ไขโปรไฟล์</span></h1>
                        <form action="#" class="m-auto" style="max-width:800px;" method="post" enctype="multipart/form-data" />
                            <!-- ชื่อสถานที่ -->
                        <div class="d-flex flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                อีเมลผู้ใช้
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <input type="text" class="form-control" name="" value="<?php echo $main_member_email ?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                ชื่อ
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <input type="text" class="form-control" name="member_name" value="<?php echo $main_member_name ?>">
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                นามสกุล
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <input type="text" class="form-control" name="member_lastname" value="<?php echo $main_member_lastname ?>">
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                รหัสผ่าน
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <input type="text" class="form-control" name="member_password" value="<?php echo $main_member_password ?>">
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                วันเกิด
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <input type="date" class="form-control" name="member_birthday" value="<?php echo $main_member_brithday ?>">
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                เกี่ยวกับฉัน
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <textarea class="form-control" id="member_about_me" name="member_about_me" rows="3" maxlength="250"><?php echo $main_member_about_me; ?></textarea>
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                รูปภาพ
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="input-resp p-1">
                                <div class="bd-aroundtw p-3">
                                    <div>
                                        <input type='file' onchange="readURL(this);" accept=".png, .jpg, .jpeg" id="filUpload" name="filUpload"/>
                                    </div>
                                    <div class="text-center">
                                        <!-- <input type="hidden" name="hdnOldFile" value="img/<?php echo $main_member_images; ?>"> -->
                                        <img id="blah" src="img/<?php echo $main_member_images; ?>" alt="your image" class="uk-border-circle oj-fit"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-3">
                            <h2 class="f-20 font-weight-normal">ช่องทางการติดต่อ</h2>
                        </div>
                        <div class="d-flex flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                เบอร์โทรศัพท์
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <input  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10" class="form-control" name="member_tel" value="<?php echo $main_member_tel; ?>">
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                เฟสบุ๊ค
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <input type="text" class="form-control" name="member_facebook" value="<?php echo $main_member_facebook ;?>">
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column">
                            <div class="p-1 label-resp m-auto">
                                อิสตราแกรม
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <input type="text" class="form-control" name="member_ig" value="<?php echo $main_member_ig ;?>">
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column bd-bt pb-3" >
                            <div class="p-1 label-resp m-auto">
                                ไลน์ / ไลน์ ads
                            </div>
                            <div class="p-1 w-5 m-auto dpn-tablet">
                                :
                            </div>
                            <div class="p-1 input-resp">
                                <input type="text" class="form-control" name="member_line" value="<?php echo $main_member_line ?>">
                            </div>
                        </div>
                    </div>                         
                                <?php
                                    print "  <input type=\"hidden\" name=\"appaction\" id=\"appaction\" value=\"edituser\">";
                                ?>
                                <div class="text-center py-3 m-auto">
                                    <button class="uk-button uk-button-primary">บันทึกข้อมูล</button>
                                </div>
                        </form>
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
    <!-- <script type="text/javascript"  src="js/jquery.validate.min.js"></script> -->
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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
