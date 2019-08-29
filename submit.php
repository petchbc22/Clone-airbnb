
<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">    <meta name="author" content="ThemeStarz">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="assets/assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/assets/css/fileinput.min.css" type="text/css">
    <link rel="stylesheet" href="assets/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="css/sweetalert.css"> 
    <title>เพิ่มสถานที่ให้เช่าของท่าน | Real Estate</title>
</head>
<body class="boon-fonts-regular" id="addplace">
<?php
include 'appsystem/inc_config.php';
include 'appsystem/check_login.php';

if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }

if ($appaction == "add_home"){
if (isset($_FILES['picture']['name'])){
$count = count($_FILES['picture']['name']);
$count = $count - 1 ;

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

$sql_command_addhome = " INSERT INTO home ( home_name, home_detail, home_bedroom, home_toilet, home_bed, home_price, home_video_link,home_create, member_id, home_status) VALUES ('$home_name', '$home_detail', '$home_bedroom', '$home_toilet', '$home_bed', '$home_price', '$home_video_link',now(), '$ss_member_id', 'N') ";

    if (mysqli_query($conn, $sql_command_addhome)){
    // echo $sql_command;
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Ymdhis");	
    $numrand = (mt_rand());
    $iLastID = mysqli_insert_id($conn);
    $status = 'complete';
    $uds = '_';
    $i = 0;
    for ($i = 0; $i<$count; $i++ ){
    $picture_name =$_FILES['picture']['name'][$i];
    $tmp = $_FILES['picture']['tmp_name'][$i];
    $newnamepic = $date.$numrand.'_'.$picture_name;
    move_uploaded_file($tmp, 'img/home/'.$newnamepic);

    $sql_command_add_pic = " INSERT INTO picture_home ( pic_name, home_id, member_id,pic_status,order_picture ) VALUES ('$newnamepic','$iLastID','$ss_member_id','N',$i)";
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
//  code alert
echo '<script>
        setTimeout(function() {
            swal({
                title: "เพิ่มสถานที่สำเร็จ !",
                text: "ทางเราได้รับข้อมูลของท่านแล้ว กรุณารอการยืนยันจากผู้ดูแลระบบ !",
                type: "success"
            }).then(function() {
                window.location = "submit.php";
            });
        }, 300);
        </script>'; 
}
   // select data to show in profile detail
   $strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
   $objQuery = mysqli_query($conn,$strSQL);
   $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
    <?php include 'component/header.php';?>
    <?php echo $count; ?>
    <form action="#" class="m-auto" method="post" enctype="multipart/form-data" name="addplace" />
    <div class="uk-inline">
        <img src="img/stock-photo-hotel-near-the-green-mountains-summer-cafe-resting-place-summer-1355374106.jpg" alt="" class="img-hero-banner">
        <div class="uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
                <section id="basic-information" class="container pt-80">
                    <header><h2>เพิ่มสถานที่ให้เช่าของท่าน</h2></header>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="submit-title">ชื่อสถานที่</label>
                                <input type="text" class="form-control border-g" id="submit-title" name="home_name" placeholder="กรุณาระบุชื่อสถานที่" required>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="submit-price">ราคา</label>
                                <div class="input-group">
                                    
                                    <input type="number" class="form-control border-g w-100" id="submit-price" name="home_price" pattern="\d*" placeholder="กรุณาระบุราคา" required>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="submit-description">คำอธิบาย</label>
                        <textarea class="form-control border-g" id="submit-description" rows="8" name="home_detail" placeholder="กรุณาระบุคำอธิบายสถานที่ของท่าน" required></textarea>
                    </div><!-- /.form-group -->
                </section><!-- /#basic-information -->
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 pt-3">
                        <section id="summary">
                            <header><h2>ภาพรวม</h2></header>
                            <div class="form-group">
                                <label for="submit-location">ตั้งอยู่ที่</label>
                                <select name="location" id="submit-location" class="w-100" disabled>
                                    <option value="1">New York</option>
                                    <option value="2">Los Angeles</option>
                                    <option value="3">Chicago</option>
                                    <option value="4">Houston</option>
                                    <option value="5">Philadelphia</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submit-property-type">ประเภทสถานที่</label>
                                        <select name="type" id="submit-property-type" class="w-100" disabled>
                                            <option value="1">Apartment</option>
                                            <option value="2">Condominium</option>
                                            <option value="3">Cottage</option>
                                            <option value="4">Flat</option>
                                            <option value="5">House</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submit-status">Status</label>
                                        <select name="type-shop" id="submit-status" class="w-100" disabled>
                                            <option value="1">Sale</option>
                                            <option value="2">Rent</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submit-Beds">เตียง</label>
                                        <input type="number" class="form-control border-g" id="submit-Beds" name="home_bed" pattern="\d*" placeholder="กรุณาระบุจำนวนเตียง" required>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submit-Baths">ห้องน้ำ</label>
                                        <input type="number" class="form-control border-g" id="submit-Baths" name="home_toilet" pattern="\d*" placeholder="กรุณาระบุจำนวนห้องน้ำ" required>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submit-area">ห้องนอน</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control border-g w-100" id="submit-area" name="home_bedroom" pattern="\d*" placeholder="กรุณาระบุจำนวนห้องนอน" required>
                                            
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submit-garages">ถนน</label>
                                        <input type="text" class="form-control border-g" id="submit-garages" name="garages" pattern="\d*" disabled>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <!-- <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="border-g">Allow user rating <i class="fa fa-question-circle tool-tip"  data-toggle="tooltip" data-placement="right" title="Users can give you a stars rating which is displayed in property detail"></i>
                                </label>
                            </div> -->
                        </section>
                    </div>
                    <div class="col-md-6 pt-3">
                        <section id="place-on-map">
                            <header class="section-title">
                                <h2>Place on Map</h2>
                                
                            </header>
                            <div class="form-group">
                                <span class="link-arrow geo-location">รับตำแหน่ง</span>
                                <label for="address-map">ที่อยู่</label>
                                <input type="text" class="form-control border-g" id="address-map" name="address" disabled>
                            </div><!-- /.form-group -->
                            <label for="address-map">เลื่อนหมุดเพือปักตำแหน่ง</label>
                            <div id="submit-map"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control border-g" id="latitude" name="latitude" readonly>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control border-g" id="longitude" name="longitude" readonly>
                                    </div><!-- /.form-group -->
                                </div>
                            </div>
                        </section><!-- /#place-on-map -->
                    </div><!-- /.col-md-6 -->
                </div>
            </div>
        </div>
        <div class="row">
            <section class="col-md-6 pt-2" id="gallery">
                <header><h2>วิดีโอ</h2></header>
                <div class="center">
                    <div class="form-group">
                        <div class="input_fields_wrap">
                            <div> 
                                <input type="text" class="form-control border-g pt-2 pb-2 count-form" style="float:left;width:85%" name="home_video_link" placeholder="กรุณากรอกลิ้งค์วิดีโอของท่าน">
                                <a href="#" class="add_field_button f-20 float-left pt-2 pb-2 cursor" style="float:left;width:15%;height: 44px;"><span uk-icon="plus"></span></a> 
                            </div>
                        </div>    
                        <!-- <div class="p-4 float-left w-100 text-center">
                        
                            <button class="add_field_button uk-button uk-button-danger f-20">+</button>                                    
                        </div> -->
                        <figure class="note float-left w-100 text-center"><strong>หมายเหตุ : </strong> คุณสามารถเพิ่ม URLได้หลายลิ้งค์โดยการกดปุ่ม + </figure>
                    </div>
                </div>
            </section>
            <section class="col-md-6 pt-2" id="gallery">
                <header><h2>รูปภาพ</h2></header>
                <div class="center">
                    <div class="form-group">
                    <input name="picture[]" type="file" multiple class="multi with-preview " data-maxfile="3072" required/>
                            <!-- <input id="file-upload" name="picture[]" type="file" class="file"  data-show-upload="false" data-show-caption="false" data-show-remove="false" accept="image/jpeg,image/png" data-browse-class="btn btn-default" data-browse-label="เลือกรูปภาพ" multiple class="multi" maxlength="3" data-maxfile="1024"> -->
                            <figure class="note"><strong>หมายเหตุ : </strong> คุณสามารถอัปโหลดภาพทั้งหมดในครั้งเดียว !</figure>
                    </div>
                </div>
            </section>
        </div>
        <?php
        $sql_fa = " SELECT * FROM main_facilities WHERE fa_status = 'N' ";
        $home_result_fa = $conn->query($sql_fa);
        $home_count_fa = $home_result_fa->num_rows;
    ?>
        <div class="col-md-12">
            <div class="p-1 m-auto">
                <header class="section-title">
                    <h2>คุณสมบัติของสถานที่</h2>    
                </header>
            </div>
            <div class="p-1">
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
                </ul>
            </div>
        </div>
    </div>
        <?php
            print "  <input type=\"hidden\" name=\"appaction\" id=\"appaction\" value=\"add_home\">";
        ?>
        <div class="text-center bd-t py-3">
            <button class="uk-button uk-button-primary">บันทึกข้อมูล</button>
        </div>
    </form>
    <!-- footer -->
    <?php include 'component/footer.php';?> 
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript"  src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="assets/assets/js/custom-map.js"></script>
<script type="text/javascript" src="assets/assets/js/custom.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/jquery.MultiFile.js"></script>
</body>
</html>