<?php
include 'appsystem/inc_config.php';
include 'appsystem/check_login.php';
include 'appsystem/check_permission.php';
// check ค่าว่าง จะได้ไม่โชว์ error ทำทุกครั้งที่มี การ update add ในหน้าเดียวกัน
if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }
if (empty($_REQUEST["home_id"])) { $home_id = ""; } else { $home_id = $_REQUEST["home_id"]; }
if (empty($_REQUEST["approve_room"])) { $appaction_approve = ""; } else { $appaction_approve = $_REQUEST["approve_room"]; }
if (empty($_REQUEST["block_room"])) { $appaction_block = ""; } else { $appaction_block = $_REQUEST["block_room"]; }
if (empty($_REQUEST["delete_room"])) { $appaction_delete = ""; } else { $appaction_delete = $_REQUEST["delete_room"]; }

if ($appaction == "add_home"){
    if (isset($_FILES['picture']['name'])){
    $count = count($_FILES['picture']['name']);

    // $picture_name = $_FILES['picture']['name'];
    // $tmp = $_FILES['picture']['tmp_name'];
    // move_uploaded_file($tmp, 'img/home/'.$picture_name);
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

    $sql_command_addhome = " INSERT INTO home ( home_name, home_detail, home_bedroom, home_toilet, home_bed, home_price, home_video_link, member_id, home_status) VALUES ('$home_name', '$home_detail', '$home_bedroom', '$home_toilet', '$home_bed', '$home_price', '$home_video_link', '$ss_member_id', 'N') ";

    if (mysqli_query($conn, $sql_command_addhome)){
    // echo $sql_command;
    $iLastID = mysqli_insert_id($conn);
    $status = 'complete';
    for ($i = 0; $i<$count; $i++ ){
    $picture_name =$_FILES['picture']['name'][$i];
    $tmp = $_FILES['picture']['tmp_name'][$i];
    move_uploaded_file($tmp, 'img/home/'.$picture_name);

    $sql_command_add_pic = " INSERT INTO picture_home ( pic_name, home_id, member_id,pic_status,order_picture ) VALUES ('$picture_name','$iLastID','$ss_member_id','N',$i)";
    if (mysqli_query($conn, $sql_command_add_pic)){
    $status_pic = 'complete';
    }
    }

    for ($f = 0; $f<$count_fa; $f++)
        {
        $fa_name = $_POST["chk_fa"][$f];
        $sql_command_add_fa = " INSERT INTO facilities ( cus_fa_name, home_id, cus_fa_status ) VALUES ('$fa_name', '$iLastID', 'N')";
            if (mysqli_query($conn, $sql_command_add_fa)) {
            $status_fa = 'complete';
            }

        }
    }
}
// approve
if ($appaction_approve == "approveroom"){
    $sql = "UPDATE home SET approve='1' WHERE home_id='$home_id'";
    $query = mysqli_query($conn,$sql);
    if ($query == TRUE) {
        $message = 'อนุมัติสถานที่สำเร็จ ';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
        </SCRIPT>";
    }
    else {
        $message = 'อนุมัติสถานที่ไม่สำเร็จ กรุณาลองใหม่ ! ';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
        </SCRIPT>";
    }
}
// block
if ($appaction_block == "block_room"){
    $sql = "UPDATE home SET approve='0' WHERE home_id='$home_id'";
    $query = mysqli_query($conn,$sql);

    if ($query == TRUE) {
        $message = 'บล็อคสถานที่สำเร็จ ';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
        </SCRIPT>";
    }
    else {
        $message = 'บล็อคสถานที่ไม่สำเร็จ กรุณาลองใหม่ ! ';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
        </SCRIPT>";
    }
}
// delete
if ($appaction_delete == "delete_room"){
    $sql = "UPDATE home SET home_status='D' AND approve = 0  WHERE home_id='$home_id'";
    $query = mysqli_query($conn,$sql);
    // ลบรูปประกอบ
    $sql_pic = "UPDATE picture_home SET pic_status='D' WHERE home_id='$home_id'";
    $query_pic = mysqli_query($conn,$sql_pic);
    // ลบรูปที่ติ๊ก ddl
    $sql_facilities = "UPDATE facilities SET cus_fa_status='D' WHERE home_id='$home_id'";
    $query_sql_facilities = mysqli_query($conn,$sql_facilities);
    if ($query == TRUE) {
        $message = 'ลบสถานที่สถานที่สำเร็จ ';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
        </SCRIPT>";
    }
    else {
        $message = 'ลบสถานที่ไม่สำเร็จ กรุณาลองใหม่ ! ';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
        </SCRIPT>";
    }
}

if ($ss_member_permission != 0){
    $message = 'หน้านี้เป็นสิทธิ์สงวนสำหรับผู้ดูแลระบบ !!';
    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"index.php\");
    </SCRIPT>";
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
การจัดการสถานที่ | Real Estate
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
    <?php 
     echo $appaction;
     ?>
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
                    <a class="navbar-brand font-weight-bold" href="#">การจัดการสถานที่</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <p class="text-dark">ยินดีต้อนรับ คุณ <?php echo $objResult["member_name"];?> <?php echo $objResult["member_lastname"];?></p>
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
            <div class="row">
                <div class="col-md-12">
                    <ul class="uk-tab uk-flex-center" data-uk-tab="{connect:'#my-id'}" >
                        <li><a href="" ><span class="f-18"><i class="fas fa-plus pr-2"></i>เพิ่มสถานที่ให้เช่าของท่าน</span></a></li>
                        <li class="uk-active"><a href=""><span  class="f-18"><i class="fas fa-list pr-2"></i>แสดงรายการสถานที่</span></a></li>
                    </ul>
                    <ul id="my-id" class="uk-switcher uk-margin bgw-bdr">
                        <li>
                            <div>
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
                                        <input type="text" class="form-control" name="home_name" required>
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
                                        <input type="number" class="form-control" name="home_price" pattern="\d*" required>
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
                                        <textarea class="form-control" rows="8" name="home_detail" required></textarea>
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
                                                <select name="location" id="submit-location" class="form-control" required>
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
                                                <select name="type" id="submit-property-type" class="form-control" required>
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
                                                <select name="type-shop" id="submit-status" class="form-control" required>
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
                                        <input type="number" class="form-control" id="submit-Beds" name="home_bed" pattern="\d*" required>
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
                                        <input type="number" class="form-control " id="submit-toilet" name="home_toilet" pattern="\d*" required>
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
                                        <input type="number" class="form-control " id="submit-bedroom" name="home_bedroom" pattern="\d*" required>
                                    </div>
                                </div>
                                <!-- วิดีโอ -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        URL วิดีโอ :
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <div class="input_fields_wrap">
                                            <div>
                                                <input type="text" class="form-control count-form" style="float:left;width:100%" name="home_video_link">
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
                                                <input type="text" class="form-control" id="submit-area" name="area" pattern="\d*" required>
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
                                                <input type="text" class="form-control" id="submit-garages" name="garages" pattern="\d*" required>
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
                                                <input type="text" class="form-control" id="address-map" name="address" required>
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
                                    <div class="p-1 w-80">
                                        <div class="center">
                                            <div class="p-3 bd-aroundtw">
                                                <input name="picture[]" type="file" multiple class="multi with-preview" data-maxfile="3072" class="boon-fonts-regular" />
                                            </div>
                                            <figure class="note"><strong>หมายเหตุ : </strong> คุณสามารถอัปโหลดภาพทั้งหมดในครั้งเดียว !</figure>
                                        </div>
                                    </div>
                                </div>
                                <!-- ถนน -->
                                <?php
                                    $sql_fa = " SELECT * FROM main_facilities WHERE fa_status = 'N' ";
                                    $home_result_fa = $conn->query($sql_fa);
                                    $home_count_fa = $home_result_fa->num_rows;
                                ?>
                                    <div class="d-flex">
                                        <div class="p-1 w-15 m-auto">
                                            คุณสมบัติของสถานที่
                                        </div>
                                        <div class="p-1 w-5 m-auto">
                                            :
                                        </div>
                                        <div class="p-1 w-80">
                                            <ul class="submit-features">
                                                <?php
                                                    while($fa_home_result_query = mysqli_fetch_array($home_result_fa,MYSQLI_ASSOC)){
                                                ?>
                                                <li>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="chk_fa[]" class="mr-2" value="<?php echo $fa_home_result_query["fa_id"]; ?>">
                                                            <?php echo $fa_home_result_query["fa_name"]; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <?php }
                                                ?>
                                                    <!-- <li><div class="checkbox"><label><input type="checkbox" class="mr-2">ที่พัก</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">เครื่องทำความร้อน</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">อินเตอร์เน็ต</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">ไมโครเวฟ</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">ที่สูบบุหรี่</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">สระว่ายน้ำ</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">เครื่องปิ้งขนมปัง</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">หม้อกาแฟ</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">เคเบิ้ลทีวี</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">ปาร์เกต์</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">ระเบียงดาดฟ้า</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">ระเบียง</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">เตารีด</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">ทะเล</label></div></li>
                                                <li><div class="checkbox"><label><input type="checkbox" class="mr-2">โรงรถ</label></div></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <?php
                                        print "  <input type=\"hidden\" name=\"appaction\" id=\"appaction\" value=\"add_home\">";
                                    ?>
                                    <div class="text-center bd-t py-3">
                                        <button class="uk-button uk-button-primary">บันทึกข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li>
                         
                            <div class="uk-container uk-container-center">
                                <ul class="uk-tab uk-flex-center" data-uk-tab="{connect:'#my-id'}">
                                    <li><a href="">สถานที่ ที่อนุมัติแล้ว</a></li>
                                    <li><a href="">สถานที่ ที่ยังไม่ได้อนุมัติ</a></li>
                                </ul>
                                <ul id="my-id" class="uk-switcher uk-margin">
                                    <li>
                                        <a href="#" id="autoplayer" data-uk-switcher-item="next"></a>
                                        <?php
                                            $sql_home = " SELECT * FROM home WHERE home_status = 'N' and approve = 1";
                                            $home_result = $conn->query($sql_home);
                                            $home_count = $home_result->num_rows;
                                        ?>
                                        <div class="table-responsive">
                                            <table id="approve-table" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับที่</th>
                                                        <th>รูปภาพ</th>
                                                        <th>ชื่อสถานที่</th>
                                                        <th>รายละเอียด</th>
                                                        <th>เจ้าของ</th>
                                                        <th>การจัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i = 1;
                                                        while($home_result_query = mysqli_fetch_array($home_result,MYSQLI_ASSOC)){
                                                            $member_id_appr = $home_result_query["member_id"];
                                                            $home_id_appr = $home_result_query["home_id"];
                                                            $pic_name_appr = $home_result_query["pic_name"];
                                                            $home_name_appr = $home_result_query["home_name"];
                                                            $home_detail_appr = $home_result_query["home_detail"];
                                                            
                                                            $query_img = "SELECT pic_name FROM picture_home WHERE home_id = '$home_id_appr' and pic_status = 'N' limit 1 ";
                                                            $sql_img_query = mysqli_query($conn,$query_img);
                                                            $sql_img_result = mysqli_fetch_array($sql_img_query,MYSQLI_ASSOC);
                                                            $query_img_result = $sql_img_result["pic_name"];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                        <?php echo $i; ?>
                                                        </td>
                                                        <td>
                                                            <img src="img/home/<?php echo $query_img_result ?>" width="350" alt="">
                                                        </td>
                                                        <td>
                                                            <?php echo $home_name_appr ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $home_detail_appr ?>
                                                        </td>
                                                        <?php 
                                                            $sql_owner = "SELECT * FROM member WHERE member_id = '$member_id_appr' ";
                                                            $sql_owner_query = mysqli_query($conn,$sql_owner);
                                                            $sql_owner_result = mysqli_fetch_array($sql_owner_query,MYSQLI_ASSOC);
                                                            $owner_name = $sql_owner_result["member_name"];
                                                            $owner_lastname = $sql_owner_result["member_lastname"];
                                                        ?>
                                                        <td>
                                                            <?php echo $owner_name.' '.$owner_lastname ?>
                                                        </td>
                                                        <td>
                                                            <a href="management-see-room-detail.php?home_id=<?php echo $home_result_query["home_id"]; ?>" data-toggle="tooltip" title="ดูสถานที่"><i class="fas fa-eye color-blue"></i></a>
                                                            <?php
                                                                if($home_result_query["approve"] == 0){
                                                            ?>
                                                            <a href="JavaScript:if(confirm('คุณต้องการอนุมัติสถานที่นี้ ?')==true){window.location='management-estate.php?home_id=<?php echo $home_result_query["home_id"]; ?>&approve_room=approveroom';}" data-toggle="tooltip " title="อนุมัติ">
                                                            <i class="fas fa-check text-green"></i></a>
                                                            <?php
                                                                } else {
                                                            ?>
                                                            <a href="JavaScript:if(confirm('คุณต้องการบล็อคสถานที่นี้ ?')==true){window.location='management-estate.php?home_id=<?php echo $home_result_query["home_id"]; ?>&block_room=block_room';}" data-toggle="tooltip" title="ไม่อนุมัติ">
                                                            <i class="fas fa-times text-orange"></i></a>
                                                            <?php
                                                                }
                                                            ?>
                                                            <a href="JavaScript:if(confirm('ยืนยันที่จะแก้ไขสถานที่ ?')==true){window.location='management-edit-room.php?home_id=<?php echo $home_result_query["home_id"];?>';}" data-toggle="tooltip" title="แก้ไข"><i class="fas fa-edit"></i></a>
                                                            <a href="JavaScript:if(confirm('ยืนยันที่จะลบสถานที่ ?')==true){window.location='management-estate.php?home_id=<?php echo $home_result_query["home_id"];?>&delete_room=delete_room';}" data-toggle="tooltip" title="ลบ"><i class="fas fa-trash-alt text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $i++;
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </li>
                                    <li>
                                        <?php
                                            $sql_home = " SELECT * FROM home WHERE home_status = 'N' and approve = 0 ";
                                            $home_result = $conn->query($sql_home);
                                            $home_count = $home_result->num_rows;
                                        ?>
                                        <div class="table-responsive">
                                            <table id="no-approve-table" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับที่</th>
                                                        <th>รูปภาพ</th>
                                                        <th>ชื่อสถานที่</th>
                                                        <th>รายละเอียด</th>
                                                        <th>เจ้าของ</th>
                                                        <th>การจัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i = 1;
                                                        while($home_result_query = mysqli_fetch_array($home_result,MYSQLI_ASSOC)){
                                                            $home_id_appr = $home_result_query["home_id"];
                                                            $member_id_appr = $home_result_query["member_id"];
                                                            $pic_name_appr = $home_result_query["pic_name"];
                                                            $home_name_appr = $home_result_query["home_name"];
                                                            $home_detail_appr = $home_result_query["home_detail"];

                                                            $query_img = "SELECT pic_name FROM picture_home WHERE home_id = '$home_id_appr' and pic_status = 'N' limit 1 ";
                                                            $sql_img_query = mysqli_query($conn,$query_img);
                                                            $sql_img_result = mysqli_fetch_array($sql_img_query,MYSQLI_ASSOC);
                                                            $query_img_result = $sql_img_result["pic_name"];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                        <?php echo $i; ?>
                                                        </td>
                                                        <td>
                                                            <img src="img/home/<?php echo $query_img_result ?>" width="350" alt="">
                                                        </td>
                                                        <td>
                                                            <?php echo $home_name_appr ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $home_detail_appr ?>
                                                        </td>
                                                        <?php 
                                                            $sql_owner = "SELECT * FROM member WHERE member_id = '$member_id_appr' ";
                                                            $sql_owner_query = mysqli_query($conn,$sql_owner);
                                                            $sql_owner_result = mysqli_fetch_array($sql_owner_query,MYSQLI_ASSOC);
                                                            $owner_name = $sql_owner_result["member_name"];
                                                            $owner_lastname = $sql_owner_result["member_lastname"];
                                                        ?>
                                                        <td>
                                                            <?php echo $owner_name.' '.$owner_lastname ?>
                                                        </td>
                                                        <td>
                                                            <a href="management-see-room-detail.php?home_id=<?php echo $home_id_appr ?>" data-toggle="tooltip" title="ดูสถานที่"><i class="fas fa-eye color-blue"></i></a>
                                                            <?php
                                                                if($home_result_query["approve"] == 0){
                                                            ?>
                                                            <a href="JavaScript:if(confirm('คุณต้องการอนุมัติสถานที่นี้ ?')==true){window.location='management-estate.php?home_id=<?php echo $home_id_appr ?>&approve_room=approveroom';}" data-toggle="tooltip " title="อนุมัติ">
                                                            <i class="fas fa-check text-green"></i></a>
                                                            <?php
                                                                } else {
                                                            ?>
                                                            <a href="JavaScript:if(confirm('คุณต้องการบล็อคสถานที่นี้ ?')==true){window.location='management-estate.php?home_id=<?php echo $home_id_appr ?>&block_room=block_room';}" data-toggle="tooltip" title="ไม่อนุมัติ">
                                                            <i class="fas fa-times text-orange"></i></a>
                                                            <?php
                                                                }
                                                            ?>
                                                            <a href="JavaScript:if(confirm('ยืนยันที่จะแก้ไขสถานที่ ?')==true){window.location='management-edit-room.php?home_id=<?php echo $home_id_appr?>';}" data-toggle="tooltip" title="แก้ไข"><i class="fas fa-edit"></i></a>
                                                            <a href="JavaScript:if(confirm('ยืนยันที่จะลบสถานที่ ?')==true){window.location='management-estate.php?home_id=<?php echo $home_id_appr?>&delete_room=delete_room';}" data-toggle="tooltip" title="ลบ"><i class="fas fa-trash-alt text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $i++;
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
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
<script src="js/custom.js"></script>
<script type="text/javascript" src="js/uikit-icons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="assets/assets/js/custom-map.js"></script>
<script type="text/javascript" src="assets/assets/js/custom.js"></script>
<script src="js/jquery.MultiFile.js"></script>
<script>
$(document).ready(function() {
    $('#all-user-table').DataTable({
        "language": {
            "sLengthMenu": "แสดงผล _MENU_ รายการ",
            "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "sSearch": "ค้นหา",
            "paginate": {
                "previous": "ก่อนหน้า",
                "next": "ถัดไป"
            }
        }
    });
    $('#approve-table').DataTable({
        "language": {
            "sLengthMenu": "แสดงผล _MENU_ รายการ",
            "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "sSearch": "ค้นหา",
            "paginate": {
                "previous": "ก่อนหน้า",
                "next": "ถัดไป"
            }
        }
    });
    $('#no-approve-table').DataTable({
        "language": {
            "sLengthMenu": "แสดงผล _MENU_ รายการ",
            "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "sSearch": "ค้นหา",
            "paginate": {
                "previous": "ก่อนหน้า",
                "next": "ถัดไป"
            }
        }
    });
});
</script>
</body>

</html>