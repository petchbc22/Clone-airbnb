<?php
  include 'appsystem/inc_config.php';
  include 'appsystem/check_login.php';
  $home_id = $_GET["home_id"];
    
 
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
                                    <div class="p-1 w-80">
                                        <div class="input_fields_wrap">
                                            <div class="form-group">
                                                <input id="file-upload" name="picture[]" type="file" class="file" multiple="multiple" data-show-upload="false" data-show-caption="false" data-show-remove="false" accept="image/jpeg,image/png" data-browse-class="btn btn-default" data-browse-label="เลือกรูปภาพ">
                                                <figure class="note"><strong>หมายเหตุ : </strong> คุณสามารถอัปโหลดภาพทั้งหมดในครั้งเดียว !</figure>
                                            </div>
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
</body>

</html>