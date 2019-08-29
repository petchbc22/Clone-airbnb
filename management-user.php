<?php
include 'appsystem/inc_config.php';
include 'appsystem/check_login.php';
include 'appsystem/check_permission.php';
$ss_member_id = $_SESSION["ss_member_id"];

if ($ss_member_permission != 0){
  $message = 'หน้านี้เป็นสิทธิ์สงวนสำหรับผู้ดูแลระบบ !!';
  echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('$message');
      window.location.replace(\"index.php\");
  </SCRIPT>";
}

if (empty($_REQUEST["delete_user"])) { $appaction_delete = ""; } else { $appaction_delete = $_REQUEST["delete_user"]; }


// delete
if ($appaction_delete == "delete_user"){
    $sql = "UPDATE home SET home_status='D' WHERE home_id='$home_id'";
    $query = mysqli_query($conn,$sql);
    // ลบรูปประกอบ
    $sql_pic = "UPDATE picture_home SET pic_status='D' WHERE home_id='$home_id'";
    $query_pic = mysqli_query($conn,$sql_pic);
    // ลบรูปที่ติ๊ก ddl
    $sql_facilities = "UPDATE facilities SET cus_fa_status='D' WHERE home_id='$home_id'";
    $query_sql_facilities = mysqli_query($conn,$sql_facilities);
    if ($query == TRUE) {
        $message = 'ลบสถานที่สถานที่สำเร็จ ';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
        </SCRIPT>";
    }
    else {
        $message = 'ลบสถานที่ไม่สำเร็จ กรุณาลองใหม่ ! ';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
        </SCRIPT>";
    }
}

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
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/sweetalert.css"> 
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
                            <p class="f-16">การจัดการผู้ใช้งาน</p>
                        </a>
                    </li>
                    <li>
                        <a href="management-estate.php">
                            <i class="nc-icon nc-bank"></i>
                            <p class="f-16">การจัดการสถานที่</p>
                        </a>
                    </li>
                    <li>
                        <a href="management-report-user.php">
                            <i class="nc-icon nc-send"></i>
                            <p class="f-16">การจัดการรายงาน</p>
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
                        <a class="navbar-brand font-weight-bold" href="#">การจัดการผู้ใช้งาน</a>
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
                  <ul class="uk-tab uk-flex-center" data-uk-tab="{connect:'#my-id'}">
                    <li><a href=""><span class="f-18"><i class="fas fa-users pr-2"></i>ผู้ใช้ทั้งหมดในระบบ</span></a></li>
                    <li><a href=""><span class="f-18"><i class="fas fa-user pr-2"></i>ผู้ใช้งานประเภทบุคคลทั่วไป</span></a></li>
                    <li><a href=""><span class="f-18"><i class="fas fa-user-tie pr-2"></i>ผู้ใช้งานประเภท Agency</span></a></li>
                  </ul>
                  <ul id="my-id" class="uk-switcher uk-margin bgw-bdr">
                    <li>
                      <?php
                        $sql_member = " SELECT * FROM member WHERE member_status = 'N' ";
                        $member_result = $conn->query($sql_member);
                        $member_count = $member_result->num_rows;
                      ?>
                      <div class="table-responsive">
                        <table id="all-user-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                  <th>ลำดับ</th>
                                  <th>รูปภาพ</th>
                                  <th>ชื่อ</th>
                                  <th>นามสกุล</th>
                                  <th>อีเมล</th>
                                  <th>ประเภท</th>
                                  <th>การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                while($member_result_query = mysqli_fetch_array($member_result,MYSQLI_ASSOC)){
                                  $member_id = $member_result_query["member_id"];
                                  $member_images = $member_result_query["member_images"];
                                  $member_name = $member_result_query["member_name"];
                                  $member_lastname = $member_result_query["member_lastname"];
                                  $member_email = $member_result_query["member_email"];
                                  
                            ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td class="text-center">
                                <?php 
                                    if (empty($member_images)) {
                                ?>
                                <img src="img/No_image_available.svg" alt="" width="80" height="80" class="oj-fit">
                                <?php  } else { ?>
                                <img src="img/<?php echo $member_images ?>" alt="" width="80" height="80" class="oj-fit">
                                <?php } ?>
                                </td>
                                <td><?php echo $member_name ?></td>
                                <td><?php echo $member_lastname ?></td>
                                <td><?php echo $member_email ?></td>
                                <td><?php if($member_result_query["member_permission"] == '0'){ echo 'Admin';}
                                else if($member_result_query["member_permission"] == '1'){ echo 'customer';}
                                else if($member_result_query["member_permission"] == '2'){ echo 'Agency';} ?></td>
                                <td class="text-center">
                                  <a href="management-user-show.php?member_id=<?php echo $member_id ?>" uk-tooltip="title: ดูข้อมูลสมาชิก; pos: bottom"><i class="fas fa-eye"></i></a>
                                  <a href="management-edit-user.php?member_id=<?php echo $member_id ?>" uk-tooltip="title: แก้ไขข้อมูลสมาชิก; pos: bottom"><i class="fas fa-edit"></i></a>
                            
                                </td>
                              </tr>
                              <?php
                                  $i++;
                                  }
                              ?>
                            </tbody>
                        </table>
                      </div>
                    </li>
                    <li>
                      <?php
                        $sql_member_customer = " SELECT * FROM member WHERE member_status = 'N' and member_permission = 1 ";
                        $member_result_customer = $conn->query($sql_member_customer);
                        $member_count_customer = $member_result_customer->num_rows;
                      ?>
                      <div class="table-responsive">
                        <table id="user-table" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                <th>ลำดับ</th>
                                <th>รูปภาพ</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>อีเมล</th>
                                <th>การจัดการ</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                                $i = 1;
                                while($member_result_query_customer = mysqli_fetch_array($member_result_customer,MYSQLI_ASSOC)){
                                  $member_images_customer = $member_result_query_customer["member_images"];
                                  $member_name_customer = $member_result_query_customer["member_name"];
                                  $member_lastname_customer = $member_result_query_customer["member_lastname"];
                                  $member_email_customer = $member_result_query_customer["member_email"];
                                  $member_id_customer = $member_result_query_customer["member_id"];
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="text-center">
                                  <?php 
                                      if (empty($member_images_customer)) {
                                  ?>
                                  <img src="img/No_image_available.svg" alt="" width="80" height="80" class="oj-fit">
                                  <?php  } else { ?>
                                  <img src="img/<?php echo $member_images_customer ?>" alt="" width="80" height="80" class="oj-fit">
                                  <?php } ?>
                                </td>
                                <td><?php echo $member_name_customer ?></td>
                                <td><?php echo $member_lastname_customer ?></td>
                                <td><?php echo $member_email_customer ?></td>
                                <td class="text-center">
                                  <a href="management-user-show.php?member_id=<?php echo $member_id_customer ?>" uk-tooltip="title: ดูข้อมูลสมาชิก; pos: bottom"><i class="fas fa-eye"></i></a>
                                  <a href="management-edit-user.php?member_id=<?php echo $member_id_customer ?>" uk-tooltip="title: แก้ไขข้อมูลสมาชิก; pos: bottom"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                              <?php
                                  $i++;
                                  }
                              ?>
                          </tbody>
                        </table>    
                      </div>                           
                    </li>
                    <li>
                      <?php
                        $sql_member_agency = " SELECT * FROM member WHERE member_status = 'N' and member_permission = 2 ";
                        $member_result_agency = $conn->query($sql_member_agency);
                        $member_count_agency = $member_result_agency->num_rows;
                      ?>
                      <div>
                        <table id="agency-user-table" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                <th>ลำดับ</th>
                                <th>รูปภาพ</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>อีเมล</th>
                                <th>การจัดการ</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                                $i = 1;
                                while($member_result_query_agency = mysqli_fetch_array($member_result_agency,MYSQLI_ASSOC)){
                                  $member_id_agency = $member_result_query_agency["member_id"];
                                  $member_name_agency = $member_result_query_agency["member_name"];
                                  $member_lastname_agency = $member_result_query_agency["member_lastname"];
                                  $member_email_agency = $member_result_query_agency["member_email"];
                                  $member_images_agency = $member_result_query_agency["member_images"];
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td class="text-center">
                                <?php 
                                    if (empty($member_images_agency)) {
                                ?>
                                <img src="img/No_image_available.svg" alt="" width="80" height="80" class="oj-fit">
                                <?php  } else { ?>
                                <img src="img/<?php echo $member_images_agency ?>" alt="" width="80" height="80" class="oj-fit">
                                <?php } ?>
                              </td>
                              <td><?php echo $member_name_agency ?></td>
                              <td><?php echo $member_lastname_agency ?></td>
                              <td><?php echo $member_email_agency ?></td>
                              <td class="text-center">
                                <a href="management-user-show.php?member_id=<?php echo $member_id_agency ?>" uk-tooltip="title: ดูข้อมูลสมาชิก; pos: bottom"><i class="fas fa-eye"></i></a>
                                <a href="management-edit-user.php?member_id=<?php echo $member_id_agency ?>" uk-tooltip="title: แก้ไขข้อมูลสมาชิก; pos: bottom"><i class="fas fa-edit"></i></a>
                              </td>
                            </tr>
                              <?php
                                  $i++;
                                  }
                              ?>
                          </tbody>
                        </table>     
                      </div>                           
                    </li>
                  </ul>
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
    <script src="js/sweetalert.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#all-user-table').DataTable({
          "language": {
              "sLengthMenu": "แสดงผล _MENU_ รายการ",
              "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
              "sSearch": "ค้นหา",
              "paginate": {
                  "previous": "ก่อนหน้า",
                  "next": "ถัดไป"
              }
          }
        });
        $('#user-table').DataTable({
          "language": {
              "sLengthMenu": "แสดงผล _MENU_ รายการ",
              "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
              "sSearch": "ค้นหา",
              "paginate": {
                  "previous": "ก่อนหน้า",
                  "next": "ถัดไป"
              }
          }
        });
        $('#agency-user-table').DataTable({
          "language": {
              "sLengthMenu": "แสดงผล _MENU_ รายการ",
              "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
              "sSearch": "ค้นหา",
              "paginate": {
                  "previous": "ก่อนหน้า",
                  "next": "ถัดไป"
              }
          }
        });
    } );
    </script>
</body>
</html>