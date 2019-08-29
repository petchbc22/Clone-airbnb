<?php
  include 'appsystem/inc_config.php';
  include 'appsystem/check_login.php';
//   check login if empty session redirect to login
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


    $home_id = $_GET["home_id"];
//   for image home
    $sql_images = " SELECT * FROM picture_home WHERE home_id = '$home_id' and pic_status = 'N' ";
    $sql_images_result = $conn->query($sql_images);
    $sql_images_result_count = $sql_images_result->num_rows;


    $sql_home = " SELECT * FROM home WHERE home_id = '$home_id' AND home_status = 'N' ";
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
          $home_video_links = $result_rs["home_video_link"];
          $member_id_tocheck = $result_rs["member_id"];

          if($ss_member_id != $member_id_tocheck ){
            header("Location:404.php");
          }
      }
    }
    else {
        header("Location:404.php");
    }
 ?>

<!DOCTYPE html>

<html lang="en-US">
<head>
    <link rel="apple-touch-icon" sizes="76x76" href="img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">
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
    <title>แก้ไขสถานที่ให้เช่าของท่าน | Real Estate</title>
</head>
<body class="boon-fonts-regular" id="addplace">
    <?php
      if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }
      if (empty($_REQUEST["home_id"])) { $home_id = ""; } else { $home_id = $_REQUEST["home_id"]; }
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
                // $i = 0;
                // $i = 8;$x = 0; $x <= 10; $x++
                for ($i = 0; $i < $count ; $i++ ){
                    $picture_name =$_FILES['picture']['name'][$i];
                    $tmp = $_FILES['picture']['tmp_name'][$i];
                    $newnamepic = $date.'_'.$numrand.'_'.$picture_name;
                    move_uploaded_file($tmp,'img/home/'.$newnamepic);

                    $sql_command_add_pic = " INSERT INTO picture_home ( pic_name, home_id, member_id,pic_status,order_picture ) VALUES ('$newnamepic','$home_id','$ss_member_id','N',$i)";
                        if (mysqli_query($conn, $sql_command_add_pic)){
                            $sql_chk = "UPDATE facilities SET cus_fa_status = 'D' WHERE home_id = '$home_id'";
                            if (mysqli_query($conn, $sql_chk)){
                                for ($f = 0; $f< $count_fa; $f++)
                                {
                                    $fa_name = $_POST["chk_fa"][$f];
                                    $sql_command_add_fa = " INSERT INTO facilities ( cus_fa_name, home_id, cus_fa_status ) VALUES ('$fa_name', '$home_id', 'N')";
                                    if (mysqli_query($conn, $sql_command_add_fa)) {
                                        echo '<script>
                                        setTimeout(function() {
                                            swal({
                                                title: "บันทึกรายการแก้ไขสำเร็จ แบบมีรูปภาพแนบ !",
            
                                                type: "success"
                                            }).then(function() {
                                                window.location = "profile.php";
                                            });
                                        }, 300);
                                    </script>';
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
                            echo '<script>
                                setTimeout(function() {
                                    swal({
                                        title: "บันทึกรายการแก้ไขสำเร็จ !",

                                        type: "success"
                                    }).then(function() {
                                        window.location = "profile.php";
                                    });
                                }, 300);
                            </script>';
                        }
                    }
                }

            }
        }
    }
    if ($appaction_delete == "delete_room"){

        $sql = "UPDATE picture_home SET pic_status='D'  WHERE pic_no='$pic_no'";
        $query = mysqli_query($conn,$sql);
        if ($query == TRUE) {
            echo "<script>location.href='edit-estate.php?home_id=$home_id#gallery'</script>";
        }
        // else {
        //     $message = 'ลบสถานที่ไม่สำเร็จ กรุณาลองใหม่ ! ';
        //     echo "<SCRIPT type='text/javascript'> //not showing me this
        //         alert('$message');
        //     </SCRIPT>";
        // }
    }
    

    $strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id'";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

    ?>
    <?php include 'component/header.php';?>
    <form action="#" class="m-auto" method="post" enctype="multipart/form-data" />
    <div class="uk-inline">
        <img src="img/stock-photo-hotel-near-the-green-mountains-summer-cafe-resting-place-summer-1355374106.jpg" alt="" class="img-hero-banner">
        <div class="uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
                <section id="basic-information" class="container pt-80">
                    <header><h2>แก้ไขสถานที่ให้เช่าของท่าน</h2></header>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="submit-title">ชื่อสถานที่</label>
                                <input type="text" class="form-control border-g" id="submit-title" name="home_name" value="<?php echo $home_name ?>" required>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="submit-price">ราคา</label>
                                <div class="input-group">
                                    <input type="number" class="form-control border-g w-100" id="submit-price" name="home_price" pattern="\d*" value="<?php echo $home_price ?>" required>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="submit-description">คำอธิบาย</label>
                        <textarea class="form-control border-g" id="submit-description" rows="8" name="home_detail"  required><?php echo $home_detail ?></textarea>
                    </div><!-- /.form-group -->
                </section><!-- /#basic-information -->
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
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
                                        <input type="text" class="form-control border-g" id="submit-Beds" name="home_bed" pattern="\d*" value="<?php echo $home_bed ?>" required>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submit-Baths">ห้องน้ำ</label>
                                        <input type="text" class="form-control border-g" id="submit-Baths" name="home_toilet" pattern="\d*" value="<?php echo $home_toilet ?>" required>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submit-area">ห้องนอน</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-g w-100" id="submit-area" name="home_bedroom" pattern="\d*" value="<?php echo $home_bedroom ?>" required>

                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="submit-garages">ถนน</label>
                                        <input type="text" class="form-control border-g" id="submit-garages" name="garages" pattern="\d*" disabled>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                                <section class="col-md-12 pt-3" id="gallery">
                                    <header><h2>วิดีโอ</h2></header>
                                    <div class="center">
                                        <div class="form-group">
                                            <div class="input_fields_wrap">
                                                <div>
                                                    <input type="text" class="form-control border-g pt-2 pb-2 count-form" style="float:left;width:85%" name="home_video_link" value="<?php echo $home_video_links?>" placeholder="กรุณากรอกลิ้งค์วิดีโอของท่าน">
                                                    <a href="#" class="add_field_button f-20 float-left pt-2 pb-2 cursor" style="float:left;width:15%;height: 44px;"><span uk-icon="plus"></span></a>
                                                </div>
                                            </div>
                                            <!-- <div class="p-4 float-left w-100 text-center">

                                                <button class="add_field_button uk-button uk-button-danger f-20">+</button>
                                            </div> -->
                                            <figure class="note float-left w-100 text-center"><strong>หมายเหตุ : </strong> คุณสามารถเพิ่มลิ้งค์ Youtube ได้หลายลิ้งค์โดยการกดปุ่ม + </figure>
                                        </div>
                                    </div>
                                </section>
                            </div><!-- /.row -->
                            <!-- <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="border-g">Allow user rating <i class="fa fa-question-circle tool-tip"  data-toggle="tooltip" data-placement="right" title="Users can give you a stars rating which is displayed in property detail"></i>
                                </label>
                            </div> -->
                        </section>
                    </div>
                    <div class="col-md-6">
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

            <section class="col-md-12" id="gallery">
                <header><h2>รูปภาพ</h2></header>
                <div class="row">
                <?php
                    while($images_result_query = mysqli_fetch_array($sql_images_result,MYSQLI_ASSOC)){
                        $pic_no = $images_result_query["pic_no"];
                        $pic_name = $images_result_query["pic_name"];
                ?>
                    <div class="col-md-3 py-3">
                        <a href="edit-estate.php?pic_no=<?php echo $pic_no;?>&home_id=<?php echo $home_id;?>&delete_room=delete_room"><img src="img/x.png" alt="" class="close-update-pic"></a>
                        <img src="img/home/<?php echo $pic_name ; ?>" alt="" height="200" width="100%" class="oj-fit">


                    </div>
                <?php } ?>
                </div>
                <div class="center">
                    <div class="form-group p-3 bd-aroundtw">
                        <input name="picture[]" type="file" multiple class="multi with-preview" data-maxfile="3072" />
                    </div>
                    <figure class="note"><strong>หมายเหตุ : </strong> คุณสามารถอัปโหลดภาพทั้งหมดในครั้งเดียว !</figure>
                </div>
            </section>
        </div>
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
        <div class="col-md-12">
            <div class="p-1 m-auto">
                <header class="section-title">
                    <h2>คุณสมบัติของสถานที่</h2>
                </header>
            </div>
            <div class="p-1">
                <div class="row">
                    <?php
                        while($fa_home_result_query = mysqli_fetch_array($home_fa,MYSQLI_ASSOC)){
                            $cus_fa_id = $fa_home_result_query["cus_fa_id"];

                    ?>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-2" id="fa_home_edit">
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
