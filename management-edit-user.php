<?php
include 'appsystem/inc_config.php';
include 'appsystem/check_login.php';
include 'appsystem/check_permission.php';
$ss_member_id = $_SESSION["ss_member_id"];
$member_id = $_GET["member_id"];
// check session 
if ($ss_member_permission != 0){
  $message = 'หน้านี้เป็นสิทธิ์สงวนสำหรับผู้ดูแลระบบ !!';
  echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('$message');
      window.location.replace(\"index.php\");
  </SCRIPT>";
}
// edit code
if (empty($_REQUEST["appaction"])) { $appaction = ""; } else { $appaction = $_REQUEST["appaction"]; }
  
if ($appaction == "edituser"){
  if (empty($_REQUEST['member_name'])) { $home_name = ""; } else { $member_name = $_REQUEST["member_name"]; }
  if (empty($_REQUEST['member_lastname'])) { $member_lastname = ""; } else { $member_lastname = $_REQUEST["member_lastname"]; }
  if (empty($_REQUEST['member_birthday'])) { $member_birthday = ""; } else { $member_birthday = $_REQUEST["member_birthday"]; }
  if (empty($_REQUEST['member_permission'])) { $member_permission = ""; } else { $member_permission = $_REQUEST["member_permission"]; }

        // @unlink("myfile/".$_POST["hdnOldFile"]);
        $sql = "UPDATE member SET 
            member_name = '$member_name' ,
            member_lastname = '$member_lastname' ,
            member_birthday = '$member_birthday' ,
            member_permission = '$member_permission'
            WHERE member_id = '$member_id' ";
            $query = mysqli_query($conn,$sql);
            if ($query == TRUE) {
                $message = 'สำเร็จ ';
                echo "<SCRIPT type='text/javascript'> //not showing me this
                    alert('$message');
                </SCRIPT>";
            }
            else {
                $message = 'ไม่สำเร็จ กรุณาลองใหม่ ! ';
                echo "<SCRIPT type='text/javascript'> //not showing me this
                    alert('$message');
                </SCRIPT>";
            }
}
// select data to show in input
$sql_member = " SELECT * FROM member WHERE member_id = '$member_id' AND member_status = 'N' ";
$home_result_member = $conn->query($sql_member);
$home_count_member = $home_result_member->num_rows;


if($home_count_member = 1) {
  if ($home_result_member){
      $result_rs = mysqli_fetch_assoc($home_result_member);
    //   $member_permission = $result_rs["member_permission"];
      $member_name = $result_rs["member_name"];
      $member_lastname = $result_rs["member_lastname"];
      $member_email = $result_rs["member_email"];
      $member_birthday = $result_rs["member_birthday"];
      $member_images = $result_rs["member_images"];
      $approve = $result_rs["approve"];
  }
  // mysqli_close($conn);
}
// select to display data in header !!
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
        การจัดการผู้ใช้งาน | Real Estate
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="admin-screen/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
</head>
<body class="boon-fonts-regular">
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
                    <li class="active ">
                        <a href="management-user.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>การจัดการผู้ใช้งาน</p>
                        </a>
                    </li>
                    <li>
                        <a href="management-estate.php">
                            <i class="nc-icon nc-bank"></i>
                            <p>การจัดการสถานที่</p>
                        </a>
                    </li>
                    <li>
                        <a href="management-report-user.php">
                            <i class="nc-icon nc-send"></i>
                            <p>การจัดการรายงาน</p>
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
                            <li><a href="management-estate.php" class="f-20 font-weight-bold">การจัดการผู้ใช้งาน</a></li>
                            <li><span class="f-20 font-weight-bold">แก้ไขข้อมูลผู้ใช้งาน : <?php echo $member_name.' '.$member_lastname; ?> </span></li>
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
                                <p class="text-dark">ยินดีต้อนรับ คุณ <?php echo $objResult["member_name"];?> <?php echo $objResult["member_lastname"];?></p>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link btn-rotate" href="logout.php" uk-toggle="target: #modal-comfirm-logout">
                                  <i class="fas fa-sign-out-alt"></i>
                                  <p>
                                      <span class="d-lg-none d-md-block">Account</span>
                                  </p>
                              </a>
                          </li>
                        </ul>
                    </div>
                </div>
                <?php include 'component/modal.php';?> 
            </nav>
            <!-- End Navbar -->
            <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>

</div> -->
            <div class="content">
                <div class="uk-container uk-container-center " >

                  <div id="my-id" class="uk-margin bgw-bdr">
              
                                <form action="#" class="m-auto" style="max-width:800px" method="post" enctype="multipart/form-data" />
                                <!-- ชื่อสถานที่ -->
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        อีเมลผู้ใช้
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="text" class="form-control" name="" value="<?php echo $member_email ?>" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        ชื่อ
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="text" class="form-control" name="member_name" value="<?php echo $member_name ?>">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        นามสกุล
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="text" class="form-control" name="member_lastname" value="<?php echo $member_lastname ?>">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        วันเกิด
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="date" class="form-control" name="member_birthday" value="<?php echo $member_birthday ?>">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        รูปภาพ
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <div class="avatar-upload m-0">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" name="filUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url(img/user-temp.png);">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="p-1 w-15 m-auto">
                                        ประเภทผู้ใช้งาน
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <select class="uk-select" name="member_permission">
                                            <option disabled selected value> -- กรุณาเลือกประเภท -- </option>
                                            <option value="1">บุคคลทั่วไป</option>
                                            <option value="2">อเจนซี่</option>
                                        </select>                                    
                                </div>
                                </div>
                                <!-- <div class="d-flex pb-3">
                                    <div class="p-1 w-15 m-auto">
                                        การยืนยันผู้ใช้งาน
                                    </div>
                                    <div class="p-1 w-5 m-auto">
                                        :
                                    </div>
                                    <div class="p-1 w-80">
                                        <input type="text" class="form-control" name="" value="<?php if($result_rs["approve"] == '0'){ echo 'ยังไม่ได้รับการอนุมัติ';}else if($result_rs["approve"] == '1'){ echo 'อนุมัติแล้ว';} ?>">
                                    </div>
                                </div> -->
                         
                                
                         
                             
                                    <?php
                                        print "  <input type=\"hidden\" name=\"appaction\" id=\"appaction\" value=\"edituser\">";
                                    ?>
                                    <div class="text-center bd-t py-3">
                                        <button class="uk-button uk-button-primary">บันทึกข้อมูล</button>
                                    </div>
                                </form>
                           
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#all-user-table').DataTable();
        $('#user-table').DataTable();
        $('#agency-user-table').DataTable();
    } );
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
</body>
</html>