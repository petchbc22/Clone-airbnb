<?php
  include 'appsystem/inc_config.php';
  include 'appsystem/check_login.php';
  $strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
  $objQuery = mysqli_query($conn,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ไม่พบหน้าที่คุณต้องการ | Real Estate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/assets/css/fileinput.min.css" type="text/css">
    <link rel="stylesheet" href="assets/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="css/sweetalert.css"> 
</head>
<body class="boon-fonts-regular" id="thankyou">
    <?php include 'component/header.php';?>
    <!-- container -->
    <div class="container pt-90">
        <div class="row">
            <div class="col-md-12 text-center py-5">
                <div class="box-thankyou uk-card uk-card-default p-5 m-auto">
                    <i class="far fa-frown custom"></i>
                    <h1 class="f-26 font-weight-bold mb-0 text-danger">ขออภัย !</h1>
                    <p>หน้าเว็บไซต์ดังกล่าวอาจมีการเปลี่ยนที่ เปลี่ยนชื่อ หรือพิมพ์ URL ไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง</p>
                    <a href="index.php">   
                        <button class="uk-button uk-button-primary">กลับสู่หน้าหลัก</button>
                    </a>
                 
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include 'component/footer.php';?> 
    <!-- fixed -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/currency-autocomplete.js"></script>
    <script type="text/javascript"  src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="assets/assets/js/custom-map.js"></script>
    <script type="text/javascript" src="assets/assets/js/custom.js"></script>
</body>
</html>
