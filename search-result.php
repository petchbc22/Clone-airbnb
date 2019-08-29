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
    
    if (isset($_GET['search_result'])) {
        $keySearch = $_GET['search_result'];
        $sqlsearch = "SELECT * FROM vw_search_home where home_name like '%$keySearch%' or member_name like '%$keySearch%' or member_lastname like '%$keySearch%' or member_email like '%$keySearch%' or home_price like '%$keySearch%' or home_detail like '%$keySearch%'";
        // $objQuery = mysqli_query($conn,$sqlsearch);
        $objQuerys = $conn->query($sqlsearch);
        $home_count_search = $objQuerys->num_rows;
    } 
        

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $keySearch ; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert.css"> 
</head>
<body class="boon-fonts-regular" id="main_search">
    <?php include 'component/header.php';?>
    <div class="bd-bt">
        <div class="container pt-90">
            <div class="row">
                <div class="col-md-12 p-3 ">
                   <h5 class="color-snowgray">ผลการค้นหาทั้งหมด  สำหรับ '<?php echo $_GET['search_result'];?>' พบ <?php echo $home_count_search ;?> รายการ</h5> 
                </div>
            </div>
        </div>
    </div>
    <div class="container py-3 pt-90 custom-a">

        <div class="row">
            
            <?php
                if ( $home_count_search >= 1) {
                    while($search_result_query = mysqli_fetch_array($objQuerys,MYSQLI_ASSOC)){
                        $search_home_id = $search_result_query["home_id"];
                        $search_home_name = $search_result_query["home_name"];
                        $search_home_price = $search_result_query["home_price"];
                        $search_home_detail = $search_result_query["home_detail"];
                        $search_home_owner_mail = $search_result_query["member_email"];
                        $search_home_owner_name = $search_result_query["member_name"];
                        $search_home_owner_lastname = $search_result_query["member_lastname"];

                        $strSQL2 = "SELECT * FROM picture_home WHERE home_id = '$search_home_id' AND  pic_status = 'N' limit 1  ";
                        $objQuery2  = mysqli_query($conn,$strSQL2);
                        $objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC);
                        $pic_name_2 = $objResult2["pic_name"];
                    
            ?>
            <a href="see-room-detail.php?home_id=<?php echo $search_home_id; ?>" class="col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="img/home/<?php echo $pic_name_2; ?>" width="100%" alt="" class="img-hv-zoom">
                <div class="py-2">
                    <!-- <p class="f-14 mb-0 font-weight-bold color-snowgray">เดย์ทริป · ริโอเดอจาเนโร</p> -->
                    <p class="f-18 mb-0 font-weight-bold color-gray"><?php echo $search_home_name ?></p>
                    <p class="f-15 mb-0 color-snowgray">฿<?php echo number_format( $search_home_price )?> ต่อคน</p>
                    <p class="f-14 mb-0  color-snowgray"><span class="color-blue">4.95 *</span>  (160) · ให้บริการเป็นภาษาปอร์ตุกีส ฝรั่งเศส 3 และภาษาอื่นๆ</p>
                    <p class="f-15 color-snowgray"><span class="color-blue">ผู้ขาย :</span>  <?php echo $search_home_owner_name.' '.$search_home_owner_lastname ?></p>
                </div>
            </a>
            <?php 
                    }   
                } else {  
            ?> 
             <div class="col-md-12 text-center py-5">
                <div class="box-thankyou uk-card uk-card-default p-5 m-auto">
                    <img src="img/1178479.svg" alt="" class="search-img-404">
                    <h1 class="f-26 font-weight-bold mb-0 text-danger">ขออภัย !</h1>
                    <p>ไม่พบสิ่งที่ท่านค้นหา กรุณาตรวจสอบอีกครั้ง</p>
                    <a href="index.php">   
                        <button class="uk-button uk-button-primary">กลับสู่หน้าหลัก</button>
                    </a>
                 
                </div>
            </div>
          
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
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
</body>
</html>
