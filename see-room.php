<?php
include 'appsystem/inc_config.php';
include 'appsystem/check_login.php';


// header data
$strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
$member_name_session = $objResult["member_name"];
$member_lastname_session = $objResult["member_lastname"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert.css"> 
</head>
<body class="boon-fonts-regular" id="main_search">
    <?php include 'component/header.php';?>
 
    <div class="container pt-90 custom-a">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <a href="#" class="col-md-12 py-3">
                        <h3 class="mb-0">พบกับ Airbnb Plus ใน ลอสแอนเจลิส</h3>
                        <p class="f-18 mb-0">ที่พักที่ได้มาตรฐานทั้งด้านคุณภาพและการออกแบบ</p>
                    </a>
                </div>
            </div>
            <?php
              
                // count
                $sql_viewhome_all = "SELECT * FROM home WHERE home_status = 'N' and approve = 1 ";
                $sql_result_viewhome = $conn->query($sql_viewhome_all);
                $sql_count_viewhome_all = $sql_result_viewhome->num_rows;
            ?>
             <?php
                while($home_result_query = mysqli_fetch_array($sql_result_viewhome,MYSQLI_ASSOC)){
                $pic_name = $home_result_query["pic_name"];
                $home_name = $home_result_query["home_name"];
                $home_id = $home_result_query["home_id"];
                $home_price = $home_result_query["home_price"];
                $member_id_vw= $home_result_query["member_id"];  
            ?>
            <?php 
                $query_img = "SELECT * FROM picture_home WHERE home_id = '$home_id' and pic_status = 'N' limit 1 ";
                $sql_img_query = mysqli_query($conn,$query_img);
                $sql_img_result = mysqli_fetch_array($sql_img_query,MYSQLI_ASSOC);
                $query_img_result = $sql_img_result["pic_name"];

                $sql_owner = "SELECT * FROM member WHERE member_id = '$member_id_vw' ";
                $sql_owner_query = mysqli_query($conn,$sql_owner);
                $sql_owner_result = mysqli_fetch_array($sql_owner_query,MYSQLI_ASSOC);
                // data 
                $name_owner = $sql_owner_result["member_name"];
                $lastname_owner = $sql_owner_result["member_lastname"];
             
            ?>
            <a href="see-room-detail.php?home_id=<?php echo $home_id ?>" class="col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="img/home/<?php echo $query_img_result ?>" width="100%" alt="" class="img-hv-zoom">
                <div class="py-2">
                    <!-- <p class="f-14 mb-0 font-weight-bold color-snowgray">เดย์ทริป · ริโอเดอจาเนโร</p> -->
                    <p class="f-18 mb-0 font-weight-bold color-gray"><?php echo $home_name ?></p>
                    <p class="f-15 mb-0 color-snowgray">฿<?php echo number_format( $home_price )?> ต่อคน</p>
                    <p class="f-14 mb-0  color-snowgray"><span class="color-blue">4.95 *</span>  (160) · ให้บริการเป็นภาษาปอร์ตุกีส ฝรั่งเศส 3 และภาษาอื่นๆ</p>
                    <p class="f-15 color-snowgray"><span class="color-blue">ผู้ขาย :</span>  <?php echo $name_owner.' '.$lastname_owner ?></p>

                </div>
            </a>
            <?php          
                }
            ?>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <!-- <script src="js/layout.js"></script> -->
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/currency-autocomplete.js"></script>
    <script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
    <script type="text/javascript"  src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

</body>
</html>
