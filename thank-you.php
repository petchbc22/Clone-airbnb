<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/assets/css/fileinput.min.css" type="text/css">
    <link rel="stylesheet" href="assets/assets/css/style.css" type="text/css">
</head>
<body class="boon-fonts-regular" id="thankyou">
    <div class="navbar-custom bg-white bd-bt">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg  w-100 layout-nav">
                        <a class="navbar-brand " href="index.php">
                            <img src="img/logo.png" alt="" height="50" class="swap-scroll">
                        </a>
                        <div class="uk-inline w-25 searchbar">
                            <span class="uk-form-icon uk-form-icon" uk-icon="search"></span>
                            <input class="uk-input border-g bg-white border-radius-20 box-sd-nb" type="text" placeholder="ค้นหา" >
                        </div>
                        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> -->
                        <div class="search-mobile">
                            <span uk-icon="search" class="text-black squresize"></span>
                        </div>
                        <!-- <div class="nav-mobile">
                            <a id="nav-toggle" href="#!" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                <span uk-icon="menu" class="custom-icons"></span>
                            </a>
                        </div> -->
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="">
                                </li>
                            </ul>
                            <span class="navbar-text desktop-menu-list">
                                <ul class="navbar-nav mr-auto f-19 ">
                                    <li class="">
                                        <a class="nav-link navbar-items" href="#">ให้เช่าที่พัก</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="#">จัดประสบการณ์</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="#">ความช่วยเหลือ</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="#" uk-toggle="target: #modal-regis">ลงทะเบียน</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="#" uk-toggle="target: #modal-login">Log in</a>
                                    </li>
                                </ul>
                            </span>
                            <?php include 'component/modal.php';?>  <!-- include modal  -->
                            <span class="navbar-text mobile-menu-list">
                                <ul class="navbar-nav mr-auto f-19 mobile-menu-list">
                                    <li class="bd-bt py-3">
                                        <a class="nav-link " href="#">หน้าแรก</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">ดาวน์โหลดแอพ</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">เชิญเพื่อน</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">แนะนำเจ้าของที่พัก</a>
                                    </li>
                                    <li class="bd-bt py-3">
                                        <a class="nav-link " href="#">สำหรับธุรกิจ</a>
                                    </li>
                                    <li class="bd-bt py-3">
                                        <a class="nav-link " href="#">ลงประกาศที่พัก</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">ความช่วยเหลือ</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">ลงทะเบียน</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#" uk-toggle="target: #modal-login">Log in</a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
    <div class="container pt-90">
        <div class="row">
            <div class="col-md-12 text-center py-5">
                <div class="box-thankyou uk-card uk-card-default p-5 m-auto">
                    <i class="far fa-check-circle custom"></i>
                    <h1 class="f-26 font-weight-bold mb-0 text-green">ขอบคุณ !</h1>
                    <p>เราได้รับข้อมูลของท่านแล้ว รอการตอบกลับจากทางเราในเร็ว ๆ นี้</p>
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
