<?php
  include 'appsystem/inc_config.php';
  include 'appsystem/check_login.php';
  include 'appsystem/check_permission.php';
  $home_id = $_GET["home_id"];

  $sql_images = " SELECT * FROM picture_home WHERE home_id = '$home_id' and pic_status = 'N' ";
  $sql_images_result = $conn->query($sql_images);
  $sql_images_result_count = $sql_images_result->num_rows;

  if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }
  if (empty($_REQUEST["pic_no"])) { $pic_no = ""; } else { $pic_no = $_REQUEST["pic_no"]; }
  if (empty($_REQUEST["delete_room"])) { $appaction_delete = ""; } else { $appaction_delete = $_REQUEST["delete_room"]; }
  if ($appaction == "editroom"){
    if (isset($_FILES['picture']['name'])){
        $count = count($_FILES['picture']['name']);
        // $count = 10 ;
        } else {
        echo 'test';
        }
        if (isset($_POST["chk_fa"])){
            $count_fa = count($_POST["chk_fa"]);
        } else {
            echo 'test1';
        }
    if (empty($_REQUEST['home_name'])) { $home_name = ""; } else { $home_name = $_REQUEST["home_name"]; }
    if (empty($_REQUEST['home_price'])) { $home_price = ""; } else { $home_price = $_REQUEST["home_price"]; }
    if (empty($_REQUEST['home_detail'])) { $home_detail = ""; } else { $home_detail = $_REQUEST["home_detail"]; }
    if (empty($_REQUEST['home_bed'])) { $home_bed = ""; } else { $home_bed = $_REQUEST["home_bed"]; }
    if (empty($_REQUEST['home_toilet'])) { $home_toilet = ""; } else { $home_toilet = $_REQUEST["home_toilet"]; }
    if (empty($_REQUEST['home_bedroom'])) { $home_bedroom = ""; } else { $home_bedroom = $_REQUEST["home_bedroom"]; }
    if (empty($_REQUEST['home_video_link'])) { $home_video_link = ""; } else { $home_video_link = $_REQUEST["home_video_link"]; }
    
    $i=0;
    $picture_name =$_FILES['picture']['name'][$i];

    if($picture_name != 0){
        $sql = "UPDATE home SET 
        home_name = '$home_name' ,
        home_price = '$home_price' ,
        home_detail = '$home_detail' ,
        home_bed = '$home_bed' ,
        home_toilet = '$home_toilet',
        home_bedroom = '$home_bedroom',
        home_video_link = '$home_video_link',
        approve = '0'
        WHERE home_id = '$home_id' ";

        if (mysqli_query($conn, $sql)){
            date_default_timezone_set('Asia/Bangkok');
            $date = date("Ymdhis");	
            $numrand = (mt_rand());
            $iLastID = mysqli_insert_id($conn);
            $status = 'complete';
            $uds = '_';
            // $i = 8;$x = 0; $x <= 10; $x++
            for ($i = 0; $i < $count ; $i++ ){
                $picture_name =$_FILES['picture']['name'][$i];
                $tmp = $_FILES['picture']['tmp_name'][$i];
                $newnamepic = $date.$numrand.'_'.$picture_name;
                move_uploaded_file($tmp, 'img/home/'.$newnamepic);
            
                $sql_command_add_pic = " INSERT INTO picture_home ( pic_name, home_id, member_id,pic_status,order_picture ) VALUES ('$newnamepic','$home_id','$ss_member_id','N',$i)";
                    if (mysqli_query($conn, $sql_command_add_pic)){
                        $sql_chk = "UPDATE facilities SET cus_fa_status = 'D' WHERE home_id = '$home_id'";
                        if (mysqli_query($conn, $sql_chk)){
                            for ($f = 0; $f< $count_fa; $f++)
                            {
                                $fa_name = $_POST["chk_fa"][$f];
                                $sql_command_add_fa = " INSERT INTO facilities ( cus_fa_name, home_id, cus_fa_status ) VALUES ('$fa_name', '$home_id', 'N')";
                                if (mysqli_query($conn, $sql_command_add_fa)) {
                                    $message = 'แก้ไขสถานที่แบบแนบรูปภาพ สำเร็จ! ';
                                    echo "<SCRIPT type='text/javascript'> //not showing me this
                                        alert('$message');
                                    </SCRIPT>";
                                }
                            }
                        }

                        
                    }
            }
        } 
    }
    else{
        $sql = "UPDATE home SET 
        home_name = '$home_name' ,
        home_price = '$home_price' ,
        home_detail = '$home_detail' ,
        home_bed = '$home_bed' ,
        home_toilet = '$home_toilet',
        home_bedroom = '$home_bedroom',
        home_video_link = '$home_video_link',
        approve = '0'
        WHERE home_id = '$home_id' ";

        if (mysqli_query($conn, $sql)){
            $sql_chk = "UPDATE facilities SET cus_fa_status = 'D' WHERE home_id = '$home_id'";
            if (mysqli_query($conn, $sql_chk)){
                for ($f = 0; $f< $count_fa; $f++)
                {
                    $fa_name = $_POST["chk_fa"][$f];
                    $sql_command_add_fa = " INSERT INTO facilities ( cus_fa_name, home_id, cus_fa_status ) VALUES ('$fa_name', '$home_id', 'N')";
                    if (mysqli_query($conn, $sql_command_add_fa)) {
                        $message = 'แก้ไขสถานที่สำเร็จ! ';
                        echo "<SCRIPT type='text/javascript'> //not showing me this
                            alert('$message');
                        </SCRIPT>";
                    }
                }
            }
            // $message = 'แก้ไขสถานที่สำเร็จ! ';
            // echo "<SCRIPT type='text/javascript'> //not showing me this
            //     alert('$message');
            // </SCRIPT>";
        }
    }
}


if ($appaction_delete == "delete_room"){
        
    $sql = "UPDATE picture_home SET pic_status='D'  WHERE pic_no='$pic_no'";
    $query = mysqli_query($conn,$sql);
    if ($query == TRUE) {
        echo "<script>location.href='management-edit-room.php?home_id=$home_id#gallery'</script>";
    }
    // else {
    //     $message = 'ลบสถานที่ไม่สำเร็จ กรุณาลองใหม่ ! ';
    //     echo "<SCRIPT type='text/javascript'> //not showing me this
    //         alert('$message');
    //     </SCRIPT>";
    // }
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
    // mysqli_close($conn);

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
        <?php echo $home_name; ?> | แก้ไข | Real Estate
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
                            <li><span class="f-20 font-weight-bold">การแก้ไข : <?php echo $home_name; ?> </span></li>
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
            <div class="content">   
                <div class="bgw-bdr">     
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="#" class="m-auto" style="max-width:800px" method="post" enctype="multipart/form-data" />
                                <!-- ชื่อสถานที่ -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        ชื่อสถานที่
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="text" class="form-control" name="home_name" value="<?php echo $home_name ?>">
                                    </div>
                                </div>
                                <!-- ราคา -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        ราคา
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="number" class="form-control" name="home_price" pattern="\d*" value="<?php echo $home_price ?>" >
                                    </div>
                                </div>
                                <!-- คำอธิบาย -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        รายละเอียด
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <textarea class="form-control" rows="8" name="home_detail"><?php echo $home_detail ?></textarea>
                                    </div>
                                </div>
                                <!-- ตั้งอยู่ที่ -->
                                <!-- <div class="d-flex">
                                            <div class="p-1 w-15 m-auto">
                                                ตั้งอยู่ที่
                                            </div>
                                            <div class="p-1 w-5 m-auto">
                                                :
                                            </div>
                                            <div class="p-1 w-80">
                                                <select name="location" id="submit-location" class="form-control" >
                                                    <option value="1">New York</option>
                                                    <option value="2">Los Angeles</option>
                                                    <option value="3">Chicago</option>
                                                    <option value="4">Houston</option>
                                                    <option value="5">Philadelphia</option>
                                                </select>
                                            </div>
                                        </div> -->
                                <!-- ประเภทสถานที่ -->
                                <!-- <div class="d-flex">
                                            <div class="p-1 w-15 m-auto">
                                                ประเภทสถานที่
                                            </div>
                                            <div class="p-1 w-5 m-auto">
                                                :
                                            </div>
                                            <div class="p-1 w-80">
                                                <select name="type" id="submit-property-type" class="form-control" >
                                                    <option value="1">Apartment</option>
                                                    <option value="2">Condominium</option>
                                                    <option value="3">Cottage</option>
                                                    <option value="4">Flat</option>
                                                    <option value="5">House</option>
                                                </select>
                                            </div>
                                        </div> -->
                                <!-- Status -->
                                <!-- <div class="d-flex">
                                            <div class="p-1 w-15 m-auto">
                                                    Status
                                            </div>
                                            <div class="p-1 w-5 m-auto">
                                                :
                                            </div>
                                            <div class="p-1 w-80">
                                                <select name="type-shop" id="submit-status" class="form-control" >
                                                    <option value="1">Sale</option>
                                                    <option value="2">Rent</option>
                                                </select>
                                            </div>
                                        </div> -->
                                <!-- เตียง -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        จำนวนเตียง
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="number" class="form-control" id="submit-Beds" name="home_bed" pattern="\d*" value="<?php echo $home_bed ?>">
                                    </div>
                                </div>
                                <!-- ห้องน้ำ -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        จำนวนห้องน้ำ
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="number" class="form-control " id="submit-toilet" name="home_toilet" pattern="\d*" value="<?php echo $home_toilet ?>">
                                    </div>
                                </div>
                                <!-- ห้อง -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        จำนวนห้องนอน
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="number" class="form-control " id="submit-bedroom" name="home_bedroom" pattern="\d*" value="<?php echo $home_bedroom ?>">
                                    </div>
                                </div>
                                <!-- วิดีโอ -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        วิดีโอ Youtube
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <div class="input_fields_wrap">
                                            <div>
                                                <input type="text" class="form-control count-form" style="float:left;width:85%" name="home_video_link" value="<?php echo $home_video_link ?>">
                                                <!-- <a href="#" class="add_field_button f-20 float-left pt-2 pb-2 cursor" style="float:left;width:15%;height: 44px;"><span uk-icon="plus"></span></a>
                                                        <figure class="note float-left w-100"><strong>หมายเหตุ : </strong> คุณสามารถเพิ่มลิ้งค์ Youtube ได้หลายลิ้งค์โดยการกดปุ่ม + </figure> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ขนาด -->
                                <!-- <div class="d-flex">
                                            <div class="p-1 w-15 m-auto">
                                                    ขนาด
                                            </div>
                                            <div class="p-1 w-5 m-auto">
                                                :
                                            </div>
                                            <div class="p-1 w-80">
                                                <input type="text" class="form-control" id="submit-area" name="area" pattern="\d*" >
                                            </div>
                                        </div> -->
                                <!-- ถนน -->
                                <!-- <div class="d-flex">
                                            <div class="p-1 w-15 m-auto">
                                                    ถนน
                                            </div>
                                            <div class="p-1 w-5 m-auto">
                                                :
                                            </div>
                                            <div class="p-1 w-80">
                                                <input type="text" class="form-control" id="submit-garages" name="garages" pattern="\d*" >
                                            </div>
                                        </div> -->
                                <!-- ที่อยู่ -->
                                <!-- <div class="d-flex">
                                            <div class="p-1 w-15 m-auto">
                                                    ที่อยู่
                                            </div>
                                            <div class="p-1 w-5 m-auto">
                                                :
                                            </div>
                                            <div class="p-1 w-80">
                                                <input type="text" class="form-control" id="address-map" name="address" >
                                                <label for="address-map">เลื่อนหมุดเพือปักตำแหน่ง</label>
                                                <div id="submit-map"></div>
                                            </div>
                                        </div> -->

                                <!-- รูปภาพ -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        รูปภาพ
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80 row">
                                    <section class="col-md-12" id="gallery">
                                        
                                        <div class="row">
                                        <?php
                                            while($images_result_query = mysqli_fetch_array($sql_images_result,MYSQLI_ASSOC)){
                                                $pic_no = $images_result_query["pic_no"];   
                                                $pic_name = $images_result_query["pic_name"];   
                                        ?>
                                            <div class="col-md-3 py-3">
                                                <a href="management-edit-room.php?pic_no=<?php echo $pic_no;?>&home_id=<?php echo $home_id;?>&delete_room=delete_room"><img src="img/x.png" alt="" class="close-update-pic"></a>
                                                <img src="img/home/<?php echo $pic_name ; ?>" alt="" height="100" width="100%" class="oj-fit">
                                            
                                        
                                            </div>
                                        <?php } ?>
                                        </div>
                                        <div class="center">
                                            <div class="p-3 bd-aroundtw">
                                                <input name="picture[]" type="file" multiple class="multi with-preview" accept=".png, .jpg, .jpeg" data-maxfile="3072" />
                                            </div>
                                            <figure class="note"><strong>หมายเหตุ : </strong> คุณสามารถอัปโหลดภาพทั้งหมดในครั้งเดียว !</figure>
                                        </div>
                                    </section>
                                    </div>
                                </div>
                                <!-- ถนน -->
                                <?php
                                    $sql_fa = " SELECT * FROM main_facilities WHERE fa_status = 'N' ";
                                    $home_fa = $conn->query($sql_fa);
                                    $home_fa_count = $home_fa->num_rows;

                                    $sql_check = " SELECT cus_fa_name FROM facilities WHERE home_id = '$home_id' AND cus_fa_status = 'N' ";
                                    $sql_check_command = $conn->query($sql_check);
                                    $sql_check_count = $sql_check_command->numrows;
                                    while($objcheck = mysqli_fetch_array($sql_check_command,MYSQLI_ASSOC)){
                                    $arr_check[]=$objcheck["cus_fa_name"];


                                    }

                                    // print_r($arr_check);
                                ?>
                                    <div class="d-flex">
                                        <div class="p-1 w-15 m-auto">
                                            คุณสมบัติของสถานที่
                                        </div>
                                        <div class="p-1 w-5 m-auto">
                                            :
                                        </div>
                                        <div class="p-1 w-80">
                                        <div class="p-1">
                                            <div class="row">
                                                    <?php
                                                        while($fa_home_result_query = mysqli_fetch_array($home_fa,MYSQLI_ASSOC)){
                                                            $cus_fa_id = $fa_home_result_query["cus_fa_id"];

                                                    ?>
                                                <div class="col-6 col-sm-6 col-md-4 col-lg-4" id="fa_home_edit">
                                                        <!-- <a href="edit-estate.php?pic_no=<?php echo $cus_fa_id;?>&home_id=<?php echo $home_id;?>&delete_room=delete_room"><img src="img/x.png" alt="" class="close-update-pic"></a> -->
                                                        <div class="bg-gray resp-md-h">
                                                            <input type="checkbox" name="chk_fa[]" value="<?php echo $fa_home_result_query["fa_id"]; ?>" id="<?php echo $fa_home_result_query["fa_id"]; ?>" <?php if(in_array($fa_home_result_query["fa_id"],$arr_check)){ echo 'checked'; }?> />
                                                            <label for="myCheckbox1"><img src="img/facilities/<?php echo $fa_home_result_query["fa_pic"];?>" alt="" width="100%" /></label>
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
                                    <?php
                                        print "  <input type=\"hidden\" name=\"appaction\" id=\"appaction\" value=\"editroom\">";
                                    ?>
                                    <div class="text-center bd-t py-3">
                                        <button class="uk-button uk-button-primary">บันทึกข้อมูล</button>
                                    </div>
                                </form>
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
<script src="js/jquery.MultiFile.js"></script>
</body>

</html>