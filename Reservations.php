<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
</head>
<body class="boon-fonts-regular" id="reservations">
    <div class="navbar-custom bg-white bd-bt">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg w-100 layout-nav">
                        <a class="navbar-brand " href="index.php">
                            <img src="img/logo.png" alt="" height="50" class="swap-scroll">
                        </a>
                        <div class="uk-inline w-25 searchbar">
                            <span class="uk-form-icon uk-form-icon" uk-icon="search"></span>
                            <input class="uk-input border-g bg-white border-radius-20 box-sd-nb" type="text" placeholder="ค้นหา" >
                        </div>
                        <div class="search-mobile">
                            <span uk-icon="search" class="text-black squresize"></span>
                        </div>
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
    <div class="container pt-80" id="images-banner">
        <div class="row" uk-lightbox="animation: slide">
            <div class="col-md-6 p-0 dpn-mobile-992">
                <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                    <a class="uk-inline" href="img/photographer.jpg">
                        <img class="uk-transition-scale-up uk-transition-opaque" src="img/85b4835d-08e6-4962-a233-2ceca64524d1.webp" alt="">
                    </a>
                </div>              
            </div>
            <div class="col-md-6 dpn-mobile-992">
                <div class="row">
                    <div class="col-md-6 p-0">
                        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                            <a class="uk-inline" href="img/photographer.jpg">
                                <img class="uk-transition-scale-up uk-transition-opaque" src="img/160d6e82_original.webp" alt="">
                            </a>
                        </div>   
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                            <a class="uk-inline" href="img/photographer.jpg">
                                <img class="uk-transition-scale-up uk-transition-opaque" src="img/b58e00f7-190f-4384-8a0c-532867f5337b.webp" alt="">
                            </a>
                        </div>   
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                            <a class="uk-inline" href="img/photographer.jpg">
                                <img class="uk-transition-scale-up uk-transition-opaque" src="img/6a1cab43-9353-459c-9b54-d3cbac5c8c82.webp" alt="">
                            </a>
                        </div> 
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                            <a class="uk-inline" href="img/a904c8dd-2325-425a-a48c-40bbbcd6ade2.jpg">
                                <img class="uk-transition-scale-up uk-transition-opaque" src="img/1ea25be4-7a75-4fdf-b86b-6b2cd43204ba.webp" alt="">
                            </a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 show-mobile-992 p-0">
                <div uk-slideshow="animation: push">

                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                
                        <ul class="uk-slideshow-items">
                            <li>
                                <img src="img/85b4835d-08e6-4962-a233-2ceca64524d1.webp" alt="" uk-cover>
                            </li>
                            <li>
                                <img src="img/160d6e82_original.webp" alt="" uk-cover>
                            </li>
                            <li>
                                <img src="img/b58e00f7-190f-4384-8a0c-532867f5337b.webp" alt="" uk-cover>
                            </li>
                            <li>
                                <img src="img/6a1cab43-9353-459c-9b54-d3cbac5c8c82.webp" alt="" uk-cover>
                            </li>
                            <li>
                                <img src="img/1ea25be4-7a75-4fdf-b86b-6b2cd43204ba.webp" alt="" uk-cover>
                            </li>
                        </ul>
                
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                
                    </div>
                
                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
                
                </div>
            </div>
        </div>
    </div>
    <section class="container-room">
        <div class="container  pb-5">
            <div class="row">
                <div class="col-lg-7 ">
                    <h3>Phuket Town Condominium#1 - Seaview Swimming Pool</h3>
                    <a href="#">Talad Yai</a>
                    <div class="py-3">
                        <p class="f-18 font-weight-bold mb-0"><span><i class="fas fa-home pr-3"></i></span>อพาร์ทเมนท์ทั้งหลัง</p>
                        <div class="pl-37px">
                            <span>ผู้เข้าพัก 2 คน</span>
                            <span>1 ห้องนอน</span>
                            <span> 1 เตียง</span>
                            <span>ห้องน้ำ</span>
                        </div>
                    </div>
                    <div class="pb-3">
                        <p class="f-18 font-weight-bold mb-0"><span><i class="fas fa-medal pr-3"></i></span>Kokoe เป็นเจ้าของที่พักดีเด่น</p>
                        <div class="pl-37px">
                           <p class="f-16 mb-0">เจ้าของที่พักดีเด่นคือ เจ้าของที่พักที่มีประสบการณ์และได้รับคะแนนสูง และเป็นผู้ที่ทุ่มเทเรื่องการให้เช่าที่พักเพื่อให้ผู้เข้าพักได้รับประสบการณ์อันยอดเยี่ยม</p>
                        </div>
                    </div>
                    <div class="pb-3 bd-bt pb-3">
                        <p class="f-18 font-weight-bold mb-0"><span>  <i class="fas fa-broom pr-3"></i></span>สะอาดเอี่ยมอ่อง</p>
                        <div class="pl-37px">
                            <p class="f-16">ผู้เข้าพักล่าสุด 12 คนบอกว่าที่พักสะอาดเอี่ยม</p>
                        </div>
                    </div>
                    <div class="bd-bt pb-3">
                        <p class="f-18 py-3 mb-0">FIND YOUR LIFE THIS IS YOUR LIFE Marvel at the Sino-Portuguese architecture and the charm that
                             has been retained in this condominium with full facilities include Gym, Business Lounge, Swimming
                              Pools (Top floor with Ocean view).
                        </p>
                        <ul uk-accordion class="pl-0">
                            <li>
                                <a class="uk-accordion-title f-19 color-blue font-weight-bold" href="#">อ่านเพิ่มเติมเกี่ยวกับที่พัก</a>
                                <div class="uk-accordion-content py-3 accordian-detail-rsv">
                                    <h3>ที่พัก</h3>
                                    <p>
                                        Live right in the heart of a city long regarded as a melting pot, where the east meets west, and be inspired by both its rich past and exciting future.
                                    </p>
                                    <h3>ผู้เข้าพักใช้อะไรได้บ้าง</h3>
                                    <ul>
                                        <li>Carpark</li>
                                        <li>Lobby (2nd floor)</li>
                                        <li>Swimming Pool (2nd floor)</li>
                                        <li>Business Centre (2nd floor)</li>
                                        <li>Gym (14th floor)</li>
                                        <li>Swimming Pool - Seaview (14th floor)</li>
                                    </ul>
                                    <h3>การสื่อสารกับผู้เข้าพัก</h3>
                                    <p>
                                        We are here to help. If you need guide, transport rental, local bars, local restaurant or any emergency PLEASE don't hesitate to let us know.                                    
                                    </p>
                                    <h3>สิ่งอื่นที่ควรรู้</h3>
                                    <ul>
                                        <li>Check-in 14:00
                                        <li>Check-out 12:00 (noon)</li>
                                        <li>Please do not check-in or check-out with the condo staff.</li>
                                        <br>
                                        <li>Can cook (please close bedroom partition while cooking)</li>
                                        <li>2 Air-conditions have 1 remote (in the bedroom)</li>
                                        <li>Cannot take food and alcohol beverages to the gym and swimming pool.</li>
                                        <li>Please keep the room clean, respect neighbours and save electricity.</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <p class="f-19 color-blue font-weight-bold">ติดต่อเจ้าของที่พัก</p>
                    </div>
                    <div class="py-3 bd-bt">
                        <h3 class="f-18">สิ่งอำนวยความสะดวก</h3>
                        <div class="d-flex">
                            <div class="p-1 w-50">
                                <p class="f-18"><span><i class="fas fa-utensils pr-3"></i></span>ห้องครัว</p>
                            </div>
                            <div class="p-1 w-50">
                                <p class="f-18"><span><i class="fas fa-wifi pr-3"></i></span>ห้องครัว</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="p-1 w-50">
                                <p class="f-18"><span><i class="fas fa-list-alt pr-3"></i></span>ลิฟท์</p>
                            </div>
                            <div class="p-1 w-50">
                                <p class="f-18"><span><i class="fas fa-parking pr-3"></i></span>มีที่จอดรถฟรีบริเวณที่พัก</p>
                            </div>
                        </div>
                        <div class="p-1 w-100">
                            <p class="f-18"><span><i class="fab fa-creative-commons pr-3"></i></span><s>ไม่มี: เครื่องตรวจจับคาร์บอนมอนอกไซด์เครื่องตรวจจับคาร์บอนมอนอกไซด์</s></p>
                            <p class="font-weight-bold f-14 mb-0">เจ้าของที่พักยังไม่ได้รายงานว่ามีอุปกรณ์ตรวจจับก๊าซคาร์บอนมอนอกไซด์ในที่พัก</p>
                            
                        </div>
                        <div class="py-3"><a href="#" class="f-19 font-weight-bold color-blue" uk-toggle="target: #modal-amenities">Show all 18 amenities</a></div>
                    </div>
                    <div class="py-3 bd-bt">
                        <h3 class="f-18">การจัดที่นอน</h3>
                        <div class="d-flex">
                            <div class="p-1">
                                <div class="box-option">
                                    <i class="fas fa-utensils pr-3"></i>
                                    <p class="f-18 font-weight-bold mb-0">ห้องนอน 1</p>
                                    <p class="f-18">1 เตียงคิงไซส์</p>
                                </div>
                            </div>
                            <div class="p-1">
                                <div class="box-option">
                                    <i class="fas fa-utensils pr-3"></i>
                                    <p class="f-18 font-weight-bold mb-0">พื้นที่ส่วนกลาง</p>
                                    <p class="f-18">1 โซฟา</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 bd-bt">
                        <h3 class="f-18">สถานะว่าง</h3>
                        <p class="f-16">ปรับปรุงวันนี้</p>
                        <div id="d-flex">
                            <input type="text" id="main-date-reservation" name="daterange"  class="w-100 pl-3 pr-3 border-g"/>

                            
                        </div>
                    </div>
                    <div class="py-3 bd-bt">
                       <p class="font-weight-bold f-22 mb-0">149 รีวิว
                           <span>
                                <i class="fas fa-star color-blue f-14"></i>
                                <i class="fas fa-star color-blue f-14"></i>
                                <i class="fas fa-star color-blue f-14"></i>
                                <i class="fas fa-star color-blue f-14"></i>
                                <i class="fas fa-star color-blue f-14"></i>
                            </span>
                        </p>
                    </div>
                    <div class="py-3 bd-bt mx-1 row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 p-1">
                                    <p class="f-16 mb-0">ความถูกต้อง</p>
                                </div>
                                <div class="col-6">
                                    <span>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 p-1">
                                    <p class="f-16 mb-0">ตำแหน่งที่ตั้ง</p>
                                </div>
                                <div class="col-6">
                                    <span>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 p-1">
                                    <p class="f-16 mb-0">การสื่อสาร</p>
                                </div>
                                <div class="col-6">
                                    <span>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 p-1">
                                    <p class="f-16 mb-0">เช็คอิน</p>
                                </div>
                                <div class="col-6">
                                    <span>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 p-1">
                                    <p class="f-16 mb-0">ความสะอาด</p>
                                </div>
                                <div class="col-6">
                                    <span>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 p-1">
                                    <p class="f-16 mb-0">ความคุ้มค่า</p>
                                </div>
                                <div class="col-6">
                                    <span>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                        <i class="fas fa-star color-blue f-14"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 bd-bt">
                        <div class="uk-card">
                            <div class="uk-card-header p-0">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto">
                                        <img class="uk-border-circle" width="40" height="40" src="img/photographer.jpg">
                                    </div>
                                    <div class="uk-width-expand">
                                        <h3 class="uk-card-title uk-margin-remove-bottom f-16">Title</h3>
                                        <p class="uk-text-meta uk-margin-remove-top f-16"><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body p-0 pt-3">
                                <p class="f-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 bd-bt">
                        <div class="uk-card">
                            <div class="uk-card-header p-0">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto">
                                        <img class="uk-border-circle" width="40" height="40" src="img/photographer.jpg">
                                    </div>
                                    <div class="uk-width-expand">
                                        <h3 class="uk-card-title uk-margin-remove-bottom f-16">Title</h3>
                                        <p class="uk-text-meta uk-margin-remove-top f-16"><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body p-0 pt-3">
                                <p class="f-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 bd-bt">
                        <div class="row">
                            <div class="col-9">
                                <h1 class="text-left f-18 mb-0">ให้เช่าที่พักโดย Kokoe</h1>
                                <p class="f-16 ">ภูเก็ต, ไทย · เข้าร่วมตั้งแต่ สิงหาคม 2016</p>
                            </div>
                            <div class="col-3 text-right m-auto">
                                <img src="img/photographer.jpg" alt="" class="uk-border-circle" width="50" height="50">
                            </div>
                        </div>
                    </div>
                    <div class="py-3 bd-bt">
                        <p class="f-16 mb-0"><span class="font-weight-bold f-16">Kokoe เป็นเจ้าของที่พักดีเด่น ·</span> เจ้าของที่พักดีเด่นคือผู้ที่มีประสบการณ์ และได้รับการจัดอันดับด้วยคะแนนที่สูง เป็นผู้ที่มุ่งมั่นจะให้ประสบการณ์สำหรับการเข้าพักของผู้เข้าพักดีเยี่ยมที่สุด</p>
                    </div>
                    <div class="py-3 bd-bt">
                        <p class="f-16 mb-0">ภาษา : <span class="font-weight-bold">English, ภาษาไทย</span></p>
                        <p class="f-16 mb-0">อัตราการตอบกลับ : <span class="font-weight-bold">100%</span</p>
                        <p class="f-16 mb-0">เวลาตอบ : <span class="font-weight-bold">ภายใน 1 ชั่วโมง</span></p>
                        <div class="py-3">
                            <button class="uk-button uk-button-default">ติดต่อเจ้าของที่พัก</button>
                        </div>
                    </div>
                    <div class="py-3">
                        <h1 class="f-18 text-left">นโยบาย</h1>
                        <p class="f-16 font-weight-bold">กฎของที่พัก</p>
                        <ul class="m-0 p-0">
                            <li>ไม่ปลอดภัยหรือไม่เหมาะกับทารก (ต่ำกว่า 2 ปี) และสัตว์เลี้ยง</li>
                            <li>ห้ามสูบบุหรี่ จัดปาร์ตี้ หรือจัดงาน</li>
                            <li>เวลาเช็คอินคือ 14:00 - 22:00 และเช็คเอาท์ภายใน 12:00</li>
                        </ul>
                        <ul uk-accordion class="pl-0 pt-3">
                            <li>
                                <a class="uk-accordion-title f-19 color-blue font-weight-bold" href="#">อ่านเพิ่มเติมเกี่ยวกับที่พัก</a>
                                <div class="uk-accordion-content py-3 accordian-detail-rsv">
                                        <p class="mb-0 font-weight-bold f-18">การยกเลิก</p>
                                        <p class="mb-0 font-weight-bold f-18">เข้มงวด - ยกเลิกฟรีเป็นเวลา 48 ชั่วโมง</p>
                                        หลังจากนั้น ยกเลิกก่อนเช็คอิน 7 วัน รับเงินคืน 50% ยกเว้นค่าบริการ
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- reservations in desktop display -->
                <div class="col-lg-5 dpn-mobile-992">
                    <div class="uk-card uk-card-default uk-card-body" style="z-index: 980;" uk-sticky="offset: 100; bottom: #top">
                        <h3 class="f-20">$40 ต่อคืน</h3>
                        <div class="bd-bt pb-3">
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <span class="text-black">186</span>
                        </div>
                        <form action="">
                            <p class="mb-0 f-16 pt-2">วันที่</p>
                            <!-- <div class="d-flex w-100"> -->
                                <div class="w-100">
                                    <input id="input-clone-date" type="text" class="my-2 w-100 border-g text-center" placeholder="เช็คอิน" onfocus="(this.type='date')" onblur="(this.type='text')"/>
                                </div>
                                <!-- <div class="w-50">
                                    <input id="datepicker" type="text" class="my-2 w-100 border-g text-center" placeholder="เช็คเอ้าท์" onfocus="(this.type='date')" onblur="(this.type='text')"/>
                                </div> -->
                            <!-- </div> -->
                            <p class="mb-0 f-16 pt-2">ผู้เข้าพัก</p>
                            <div class="w-100">
                                <select class="uk-select">
                                    <option>
                                        <div style="background-color:black">aaa</div>
                                        <div>aaa</div>
                                    </option>
                                    <option>Option 02</option>
                                </select>
                            </div>
                            <div class="py-3">
                                <button class="uk-button uk-button-danger w-100">ขอจอง</button>
                            </div>
                            <p class="text-center f-16">คุณจะยังไม่เสียค่าใช้จ่าย</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- footer -->
    <?php include 'component/footer.php';?> 
    <!-- fixed -->
   <div class="container-fluid Reservations-bar">
        <div class="row">
            <div class="col-md-6 text-center text-sm-center text-md-left dpn-mobile">
                <p class="f-14 mb-0">ลอฟท์ทั้งบริเวณ ใน ลอสแอนเจลิส</p>
                <div  class="px-2">
                    <i class="fas fa-star color-blue f-12"></i>
                    <i class="fas fa-star color-blue f-12"></i>
                    <i class="fas fa-star color-blue f-12"></i>
                    <i class="fas fa-star color-blue f-12"></i>
                    <i class="fas fa-star color-blue f-12"></i>
                    <span class="text-black">186</span>
                </div>
            </div>
            <div class="col-md-6 text-center text-sm-center text-md-right ">
                <div class="px-2">
                    <span class="mb-0 pt-2 ">
                        <span class="mb-0 pt-2">$142 / คืน</span>
                        <span class="show-mobile pb-2">
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <i class="fas fa-star color-blue f-12"></i>
                            <span class="text-black">186</span>
                        </span> 
                    </span>
                    <button class="uk-button uk-button-danger" uk-toggle="target: #modal-Reservations">ขอจอง</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/currency-autocomplete.js"></script>
    <script type="text/javascript"  src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
        $('input[name="daterange"]').daterangepicker({
            timePicker: true,
            startDate: moment(),
            endDate: moment(),
                
            opens: 'center'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
        });
        $(function() {                                       // <== Doc Ready
            $("#main-date-reservation").change(function() {                  // When the email is changed
                $('#input-clone-date').val(this.value);                  // copy it over to the mail
                $('#input-clone-date').removeAttr("onfocus onblur");
                $('#input-clone-date-md').val(this.value);                  // copy it over to the mail
                $('#input-clone-date-md').removeAttr("onfocus onblur");
            });
        });
    </script>
</body>
</html>
