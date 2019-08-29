    <div class="navbar-custom bg-white bd-bt">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg w-100 layout-nav">
                        <a class="navbar-brand " href="index.php">
                            <img src="img/logo.png" alt="" height="50" class="swap-scroll">
                        </a>
                        <form class="uk-inline w-25 searchbar" action="search-result.php" method="get">
                            <span class="uk-form-icon uk-form-icon" uk-icon="search"></span>
                            <input class="uk-input border-g bg-white border-radius-20 box-sd-nb" type="text" name="search_result"  placeholder="ค้นหา" >
                        </form>
                        <div class="search-mobile">
                            <!-- <input type="text" class="input-search p-2"/> -->
                            <form class="uk-inline w-100" action="search-result.php" method="get">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="search"></span>
                                <input class="uk-input input-search" type="text" name="search_result" placeholder="ค้นหา">
                            </form>
                            <!-- <span uk-icon="search" class="text-black squresize"></span> -->
                        </div>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="">
                                </li>
                            </ul>
                            <span class="navbar-text desktop-menu-list">
                                <ul class="navbar-nav mr-auto f-19 ">
                                    <?php
                                      if ($_SESSION['ss_member_permission'] == 1 || $_SESSION['ss_member_permission'] == 2 ){
                                     ?>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="submit.php">เพิ่มสถานที่</a>
                                    </li>
                                    <?php }  ?>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="see-room.php">รายการสถานที่ทั้งหมด</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="#">จัดประสบการณ์</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="#">ความช่วยเหลือ</a>
                                    </li>
                                    <?php
                                      if ($_SESSION['ss_member_permission'] == ""  ){
                                     ?>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="#" uk-toggle="target: #modal-regis">ลงทะเบียน</a>
                                    </li>
                                    <li class="">
                                        <a class="nav-link navbar-items" href="#" uk-toggle="target: #modal-login">เข้าสู่ระบบ</a>
                                    </li>
                                      <?php } ?>
                                    <!-- <li class="">
                                        <a class="nav-link navbar-items" href="#" uk-toggle="target: #modal-login">Log in</a>
                                    </li> -->
                                    <!-- check session  -->
                                    <?php
                                      if ($_SESSION['ss_member_permission'] == 1 || $_SESSION['ss_member_permission'] == 2 ){
                                     ?>
                                    <li class="px-1 m-auto cursor">
                                        <img src="img/<?php echo $objResult["member_images"]; ?>" class="uk-border-circle rm-bd" alt="" height="30" width="30" type="button">

                                        <div uk-dropdown="mode: click">
                                            <ul class="uk-nav uk-dropdown-nav">
                                                <li class="bd-bt py-1"><a href="./profile.php"><span uk-icon="user" class="pr-2"></span>โปรไฟล์</a></li>
                                                <li class="py-1"><a href="#" onclick="JSalerts()"><span uk-icon="sign-out" class="pr-2"></span>ออกจากระบบ</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </span>
                            <?php include 'modal.php';?>  <!-- include modal  -->
                            <span class="navbar-text mobile-menu-list">
                                <ul class="navbar-nav mr-auto f-19 mobile-menu-list">
                                    <li class="py-2">
                                        <a class="nav-link " href="index.php">หน้าแรก</a>
                                    </li>
                                     <!-- check session -->
                                     <?php  if ($_SESSION['ss_member_permission'] == 1 || $_SESSION['ss_member_permission'] == 2){           
                                    ?>
                                    <li class="py-2">
                                        <a class="nav-link " href="profile.php">โปร์ไฟล์</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="submit.php">เพิ่มสถานที่</a>
                                    </li>
                                     <?php } ?>
                                    <li class="py-2">
                                        <a class="nav-link " href="see-room.php">รายการสถานที่ทั้งหมด</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">เชิญเพื่อน</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">แนะนำเจ้าของที่พัก</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">สำหรับธุรกิจ</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">ลงประกาศที่พัก</a>
                                    </li>
                                    <li class="py-2">
                                        <a class="nav-link " href="#">ความช่วยเหลือ</a>
                                    </li>
                                    <!-- check session -->
                                    <?php
                                      if ($_SESSION['ss_member_permission'] == ""  ){
                                     ?>
                                    <li class="py-2">
                                        <a class="nav-link " href="#" uk-toggle="target: #modal-login">เข้าสู่ระบบ</a>
                                    </li>
                                    <?php } ?>
                                    <?php
                                      if ($_SESSION['ss_member_permission'] == 1 || $_SESSION['ss_member_permission'] == 2){
                                     ?>
                                    <li class="py-2">
                                        <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
