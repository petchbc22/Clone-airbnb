                            <!-- modal login -->
                            <div id="modal-login" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>

                                    <button class="uk-button uk-button-primary w-100 p-2 my-2">
                                        <div class="m-auto">
                                            <span uk-icon="facebook" ratio="1.5" ></span><span class="f-16 pl-1">เข้าสู่ระบบด้วย Facebook</span>
                                        </div>
                                    </button>
                                    <button class="uk-button uk-button-default w-100 p-2 my-2">
                                        <div class="m-auto">
                                            <span uk-icon="google" ratio="1.5" ></span><span class="f-16 pl-1">เข้าสู่ระบบด้วย Google</span>
                                        </div>
                                    </button>
                                    <h2 class="color-gray py-2">หรือ</h2>
                                    <form name="login" method="post" action="index.php">
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="mail"></span>
                                                <input class="uk-input" type="text" name="member_email" placeholder="อีเมล" required>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                                                <input class="uk-input" type="password" name="member_password" placeholder="รหัสผ่าน" id="input-password" required>
                                            </div>
                                        </div>
                                        <div class="text-right cursor uk-margin" id="check">แสดงรหัสผ่าน</div>
                                            <?php
                                                print "  <input type=\"hidden\" name=\"appaction\" id=\"appaction\" value=\"systemlogin\">";
                                            ?>
                                        <div class="py-2">
                                            <button class="uk-button uk-button-danger w-100 f-16 h-57" type="submit">เข้าสู่ระบบ</button>
                                        </div>
                                        <div class="bd-bt py-2">
                                            <p class="f-16 text-center mb-0"><a href="#" class="font-weight-bold" uk-toggle="target: #modal-forget-password">ลืมรหัสผ่านใช่ไหม</a></p>
                                        </div>
                                        <div class="py-2">
                                            <p class="f-16">ไม่มีบัญชีใช่ไหม <a href="#" class="font-weight-bold" uk-toggle="target: #modal-regis">ลงทะเบียน</a> </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- modal register -->
                            <div id="modal-regis" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <button class="uk-button uk-button-primary w-100 p-2 my-2">
                                        <div class="m-auto">
                                            <span uk-icon="facebook" ratio="1.5" ></span><span class="f-16">ดำเนินการต่อโดยใช้ Facebook</span>
                                        </div>
                                    </button>
                                    <button class="uk-button uk-button-default w-100 p-2 my-2">
                                        <div class="m-auto">
                                            <span uk-icon="google" ratio="1.5" ></span><span class="f-16">ดำเนินการต่อโดยใช้ Google</span>
                                        </div>
                                    </button>
                                    <h2 class="color-gray py-2">หรือ</h2>
                                    <div class="py-2">
                                        <button class="uk-button uk-button-danger w-100 f-16 h-57" uk-toggle="target: #modal-regis-email">ลงทะเบียนโดยใช้อีเมล</button>
                                    </div>
                                </div>
                            </div>
                            <!-- email-register -->
                            <div id="modal-regis-email" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <div class="uk-margin">
                                        <p class="f-18 text-center">สมัครด้วย <a href="#">Facebook</a> หรือ <a href="#">Google</a></p>
                                    </div>

                                    <h2 class="color-gray py-2">หรือ</h2>
                                    <form name="registration" id="form1" method="post" enctype="multipart/form-data" onSubmit="return validate();" action="index.php">
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <i class="uk-form-icon uk-form-icon-flip" uk-icon="mail"></i>
                                                <input class="uk-input" type="text" autocomplete="off" placeholder="ที่อยู่อีเมล" name="member_email" id="member_email" required>
                                                <span id="availability"></span>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="user"></span>
                                                <input class="uk-input" type="text" autocomplete="off" placeholder="ชื่อ" name="member_firstname" id="firstname" required>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="user"></span>
                                                <input class="uk-input" type="text" placeholder="นามสกุล" name="member_lastname" id="lastname" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                                                <input class="uk-input" type="password" placeholder="รหัสผ่าน" name="member_password" id="input-password-regis" autocomplete="off" required>
                                                <div class="text-right cursor pt-1" id="check-pwd-regis">แสดงรหัสผ่าน</div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="tag"></span>
                                                <select class="uk-select" name="member_permission" id="member_permission" required>
                                                    <option disabled selected value> -- กรุณาเลือกประเภท -- </option>
                                                    <option value="1">บุคคลทั่วไป</option>
                                                    <option value="2">อเจนซี่</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <p class="f-18 font-weight-bold">วันเกิด</p>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="calendar"></span>
                                                <input class="uk-input unstyled" type="date" placeholder="วันเกิด" name="member_birthday" id="member_birthday" required>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <p class="f-18 font-weight-bold">รูปโปรไฟล์</p>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <label for="filUpload" class="uk-input text-center f-14">กรุณาเลือกรูปภาพ *ขนาดไม่เกิน 3 MB</label>
                                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="image"></span>
                                                <input style="" class="uk-input visible-h demoInputBox" type='file' id="filUpload" name="filUpload" accept=".png, .jpg, .jpeg" required>
                                                <span id="file_error"></span>
                                            </div>
                                        </div>
                                        <div class="avatar-upload">
                                            <!-- <div class="avatar-edit">
                                                <input type='file' id="filUpload" name="filUpload" accept=".png, .jpg, .jpeg" required>
                                                <label for="filUpload"></label>
                                            </div> -->
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url(img/user-temp.png);">
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <?php
                                        print "<input type=\"hidden\" name=\"appaction\" id=\"appaction\" value=\"register\">";
                                        ?>
                                        <div class="uk-margin py-2">
                                            <button class="uk-button uk-button-danger w-100 f-16 h-57" type="submit" id="btnsubmit" disabled="true">ลงทะเบียน</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- modal forget password -->
                            <div id="modal-forget-password" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <h3>รีเซ็ตรหัสผ่าน</h3>
                                    <p class="f-18">ป้อนอีเมลแอดเดรสที่เชื่อมโยงกับบัญชีของคุณ จากนั้นเราจะส่งอีเมลไปให้คุณตั้งรหัสผ่านใหม่</p>

                                    <form action="" name="resetpwd">
                                        <div class="uk-margin">
                                            <div class="uk-inline w-100">
                                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="mail"></span>
                                                <input class="uk-input" type="text" placeholder="อีเมล" name="email" required>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="uk-margin row">
                                                <div class="col-md-6 m-auto text-center">
                                                    <a href="#" uk-toggle="target: #modal-login">< กลับไปที่หน้าเข้าสู่ระบบ</a>
                                                </div>
                                                <div class="col-md-6 text-center text-lg-right">
                                                    <button class="uk-button uk-button-danger" type="submit">ส่งลิ้งค์รีเซ็ตรหัสผ่าน</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- modal จอง -->
                            <div id="modal-Reservations" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <p class="mb-0">$125 / คืน</p>
                                    <div class="bd-bt pb-3">
                                        <i class="fas fa-star color-blue f-12"></i>
                                        <i class="fas fa-star color-blue f-12"></i>
                                        <i class="fas fa-star color-blue f-12"></i>
                                        <i class="fas fa-star color-blue f-12"></i>
                                        <i class="fas fa-star color-blue f-12"></i>
                                        <span class="text-black">xxx</span>
                                    </div>
                                    <form action="">
                                        <p class="mb-0 f-16 pt-2">วันที่</p>
                                        <!-- <div class="d-flex w-100"> -->
                                            <div class="w-100">
                                                <input id="input-clone-date-md" type="text" class="my-2 w-100 border-g text-center" placeholder="เช็คอิน" onfocus="(this.type='date')" onblur="(this.type='text')"/>
                                            </div>
                                            <!-- <div class="w-50">
                                                <input id="datepicker" type="text" class="my-2 w-100 border-g text-center" placeholder="เช็คเอ้าท์" onfocus="(this.type='date')" onblur="(this.type='text')"/>
                                            </div>
                                        </div> -->
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
                             <!-- modal รายละเอียดสิ่งอำนวยความสะดวก -->
                             <div id="modal-amenities" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <div class="bd-bt pb-3">
                                        <h1 class="mb-0 f-22">สิ่งอำนวยความสะดวก</h1>
                                        <h3 class="f-18 pb-2">พื้นฐาน</h3>
                                        <p class="mb-1 f-16">WiFi</p>
                                        <p class="mb-0 f-15">มี WiFi ทั่วบริเวณที่พัก</p>
                                    </div>
                                    <div class="bd-bt py-3">
                                        <p class="mb-1 f-16">สถานที่ทำงานที่เหมาะกับแล็ปท็อป</p>
                                        <p class="mb-0 f-15">โต๊ะหรือโต๊ะทำงานที่มีพื้นที่สำหรับวางแล็ปท็อปและเก้าอี้ที่ทำงานได้สะดวกสบาย</p>
                                    </div>
                                    <div class="bd-bt py-3">
                                        <p class="mb-1 f-16">เครื่องปรับอากาศ</p>
                                    </div>
                                    <div class="bd-bt py-3">
                                        <p class="mb-1 f-16">สิ่งจำเป็น</p>
                                        <p class="mb-0 f-15">ผ้าขนหนู ผ้าคลุมเตียง สบู่และกระดาษชำระ</p>
                                    </div>
                                    <div class="bd-bt py-3">
                                        <p class="mb-1 f-16">ทีวี</p>
                                    </div>
                                    <div class="bd-bt py-3">
                                        <p class="mb-0 f-15">น้ำร้อน</p>
                                        <p class="mb-1 f-16 font-weight-bold py-1">สิ่งอำนวยความสะดวกบริเวณที่พัก</p>
                                        <p class="mb-0 f-15">ลิฟท์</p>
                                    </div>
                                    <div class="bd-bt py-3">
                                        <p class="mb-1 f-16">มีที่จอดรถฟรีบริเวณที่พัก</p>
                                    </div>
                                    <div class="bd-bt py-3">
                                        <p class="mb-1 f-16">ยิม</p>
                                        <p class="mb-0 f-15">ฟรี ในอาคารหรือใกล้เคียง</p>
                                    </div>
                                    <div class="bd-bt py-3">
                                        <p class="mb-1 f-16">สระว่ายน้ำ</p>
                                        <p class="mb-0 f-15">ส่วนตัวหรือที่ใช้ร่วมกัน</p>
                                    </div>
                                    <div class="bd-bt py-3">
                                        <p class="mb-1 f-15">จอดบนถนนฟรี</p>
                                        <p class="mb-0 f-16 font-weight-bold py-1">การทานอาหาร</p>
                                        <p class="mb-1 f-16">ห้องครัว</p>
                                        <p class="mb-1 f-15">ที่พักที่ผู้เข้าพักทำอาหารทานเองได้</p>
                                        <p class="mb-0 f-16 font-weight-bold py-1">การขนส่ง</p>
                                        <p class="mb-1 f-16">รับฝากกระเป๋าเดินทาง</p>
                                        <p class="mb-1 f-15">เพื่อความสะดวกของผู้เข้าพักเวลาที่เข้าเช็คอินแต่เช้าหรือเช็คเอาท์ค่ำ</p>
                                    </div>
                                </div>
                            </div>
                            
<!-- modal comfirm logout -->

<div id="modal-comfirm-logout" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3 class="uk-modal-title text-center">คุณยืนยันที่จะออกจากระบบ ?</h3>
        <p class="text-center">
            <button class="uk-button uk-button-default uk-modal-close" type="button">ยกเลิก</button>
            <button class="uk-button uk-button-primary" type="button"><a href="./logout.php" class=" text-white">ออกจากระบบ</a></button>
        </p>
    </div>
</div>
<!-- modal ติดต่อผู้ซื้อ -->
<div id="modal-Contact" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">ติดต่อผู้ขาย</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Save</button>
        </p>
    </div>
</div>
<!-- modal รีพอดผู้ซื้อ -->
<div id="modal-report" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title f-24">รายงานผู้ขาย</h2>
        <form method="post" action="profile-user.php?member_id=<?php echo $member_id?>">
            <div class="uk-margin">
                <textarea class="uk-textarea" rows="5" placeholder="กรอกข้อมูลรายงานผู้ขาย" name="detail_report" id="detail_report"></textarea>
            </div>
            <p class="uk-text-right">
                <?php
                    print "<input type=\"hidden\" name=\"appaction\" id=\"appaction\" value=\"report_member\">";
                ?>
                <button class="uk-button uk-button-primary" type="submit">ส่งข้อมูลรายงาน</button>
                <button class="uk-button uk-button-default uk-modal-close" type="button">ยกเลิก</button>
            </p>
        </form>

    </div>
</div>
<!-- modal รีพอดห้อง -->
<div id="modal-report-room" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title f-24">รายงานสถานที่</h2>
        <form method="post" action="see-room-detail.php?home_id=<?php echo $home_id?>">
            <div class="uk-margin">
                <textarea class="uk-textarea" rows="5" placeholder="กรอกข้อมูลรายงานสถานที่" name="detail_report" id="detail_report"></textarea>
            </div>
            <p class="uk-text-right">
                <?php
                    print "<input type=\"hidden\" name=\"appaction\" id=\"appaction\" value=\"report_room\">";
                ?>
                <button class="uk-button uk-button-primary" type="submit">ส่งข้อมูลรายงาน</button>
                <button class="uk-button uk-button-default uk-modal-close" type="button">ยกเลิก</button>
            </p>
        </form>

    </div>
</div>