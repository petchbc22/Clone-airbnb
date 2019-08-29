<?php
include 'appsystem/inc_config.php';
include 'appsystem/check_login.php';
include 'appsystem/check_permission.php';

if ($ss_member_permission != 0){
    $message = 'หน้านี้เป็นสิทธิ์สงวนสำหรับผู้ดูแลระบบ !!';
    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"index.php\");
    </SCRIPT>";
  }
// member display session data
$strSQL = "SELECT * FROM member WHERE member_id = '$ss_member_id' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
// data report member display in tables
$sql_report_member = " SELECT * FROM report_member";
$sql_report_member_result = $conn->query($sql_report_member);
$report_member_count = $sql_report_member_result->num_rows;
   // data report home display in tables
$sql_report_home = " SELECT * FROM report_home";
$sql_report_home_result = $conn->query($sql_report_home);
$report_home_count = $sql_report_home_result->num_rows;
                   
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="img/logo.png">
<link rel="icon" type="image/png" href="img/logo.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
การจัดการรายงาน | Real Estate
</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!-- CSS Files -->
<link href="css/components.css" rel="stylesheet">
<link href="css/layout.css" rel="stylesheet">
<link href="admin-screen/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="assets/assets/css/fileinput.min.css" type="text/css">
<link rel="stylesheet" href="assets/assets/css/style.css" type="text/css">

</head>

<body class="boon-fonts-regular" id="addplace">
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
    <?php 
     echo $appaction;
     ?>
    <!-- <div class="logo-image-big">
    <img src="admin-screen/img/logo-big.png">
    </div> -->
    </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
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
                <li class="active">
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
                    <a class="navbar-brand font-weight-bold" href="#">การจัดการรายงาน</a>
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
                            <a class="nav-link btn-rotate" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="uk-container uk-container-center " >
                <ul class="uk-tab uk-flex-center" data-uk-tab="{connect:'#my-id'}">
                    <li><a href=""><span class="f-18"><i class="fas fa-users pr-2"></i>การรายงานผู้ใช้งาน</span></a></li>
                    <li><a href=""><span class="f-18"><i class="fas fa-building pr-2"></i>การรายงานสถานที่</span></a></li>
                </ul>
                <ul id="my-id" class="uk-switcher uk-margin bgw-bdr">
                <li>
                    <table id="report-table" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ผู้แจ้ง</th>
                                <th>ผู้ถูกรายงาน</th>
                                <th>ลายระเอียด</th>
                                <th>วันที่ / เวลา</th>
                                <th>การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            while($report_member_result_query = mysqli_fetch_array($sql_report_member_result,MYSQLI_ASSOC)){
                                $report_id = $report_member_result_query["report_id"];
                                $member_report_id = $report_member_result_query["member_report_id"];
                                $member_victim_id = $report_member_result_query["member_victim_id"];
                                $detail_report = $report_member_result_query["detail_report"];
                                $date_report = $report_member_result_query["date_report"];
                            //   รับค่า id จากตาราง report_member มาดึงชื่อ สกุลจากตาราง member ส่วนนี้จะเป็นของผู้แจ้ง
                                $strSQL_m = "SELECT member_name , member_lastname FROM member WHERE member_id = '$member_report_id' ";
                                $objQuery_m = mysqli_query($conn,$strSQL_m);
                                $objResult_m = mysqli_fetch_array($objQuery_m,MYSQLI_ASSOC);
                                $name_report = $objResult_m["member_name"];
                                $lname_report = $objResult_m["member_lastname"];
                                //   รับค่า id จากตาราง report_member มาดึงชื่อ สกุลจากตาราง member ส่วนนี้จะเป็นของผู้ถูกรายงาน
                                $strSQL_v = "SELECT member_id, member_name , member_lastname FROM member WHERE member_id = '$member_victim_id' ";
                                $objQuery_v = mysqli_query($conn,$strSQL_v);
                                $objResult_v = mysqli_fetch_array($objQuery_v,MYSQLI_ASSOC);
                                $id_victim = $objResult_v["member_id"];
                                $name_victim = $objResult_v["member_name"];
                                $lname_victim = $objResult_v["member_lastname"];
                        ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $name_report.' '.$lname_report ; ?></td>
                            <td><a href="management-user-show.php?member_id=<?php echo $id_victim; ?>"><?php echo $name_victim.' '.$lname_victim ; ?></a></td>
                            <td><?php echo $detail_report ?></td>
                            <td><?php echo $date_report ?></td>
                            <td><a href="#">บล็อคบุคคลนี้</a> </td>
                            </tr>
                            <?php
                                $i++;
                                }
                            ?>
                        </tbody>
                    </table>                  
                </li>
                <li>
                    <table id="report-home-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ผู้แจ้ง</th>
                                <th>รูปภาพ</th>
                                <th>สถานที่ที่โดนรายงาน</th>
                                <th>ลายระเอียด</th>
                                <th>วันที่ / เวลา</th>
                                <th>การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            while($report_home_result_query = mysqli_fetch_array($sql_report_home_result,MYSQLI_ASSOC)){
                                $report_home_id = $report_home_result_query["report_home_id"];
                                $member_report_id = $report_home_result_query["member_report_id"];
                                $home_victim_id = $report_home_result_query["home_victim_id"];
                                $detail_report = $report_home_result_query["detail_report"];
                                $date_report = $report_home_result_query["date_report"];
                            //   รับค่า id จากตาราง report_home มาดึงชื่อ สกุลจากตาราง member ส่วนนี้จะเป็นของผู้แจ้ง
                                $strSQL_m_h = "SELECT member_name , member_lastname FROM member WHERE member_id = '$member_report_id' ";
                                $objQuery_m_h = mysqli_query($conn,$strSQL_m_h);
                                $objResult_m_h = mysqli_fetch_array($objQuery_m_h,MYSQLI_ASSOC);
                                $name_report_h = $objResult_m_h["member_name"];
                                $lname_report_h = $objResult_m_h["member_lastname"];
                                //   รับค่า id จากตาราง report_home มาดึงชื่อ สกุลจากตาราง home ส่วนนี้จะเป็นของผู้ถูกรายงาน
                                $strSQL_h = "SELECT * FROM vw_home WHERE home_id = '$home_victim_id' AND order_picture ='0' AND home_status ='N' ";
                                $objQuery_h = mysqli_query($conn,$strSQL_h);
                                $objResult_h = mysqli_fetch_array($objQuery_h,MYSQLI_ASSOC);
                                $home_name_h = $objResult_h["home_name"];
                                $home_pic_h = $objResult_h["pic_name"];
                       
                        ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $member_report_id; ?></td>
                            <td><img src="img/home/<?php echo $home_pic_h; ?>" width="200" alt=""></td>
                            <td><a href="management-see-room-detail.php?home_id=<?php echo $home_victim_id; ?>"><?php echo $home_name_h ; ?></a></td>
                            <td><?php echo $detail_report ?></td>
                            <td><?php echo $date_report ?></td>
                            <td><a href="#">บล็อคสถานที่นี้</a> </td>
                            </tr>
                            <?php
                                $i++;
                                }
                            ?>
                        </tbody>
                    </table>                    
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
<script src="js/custom.js"></script>
<script type="text/javascript" src="js/uikit-icons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="assets/assets/js/custom-map.js"></script>
<script type="text/javascript" src="assets/assets/js/custom.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.js"></script>
<script>
$(document).ready(function() {
    $('#report-table').DataTable(
        {
        "language": {
            "sLengthMenu": "แสดงผล _MENU_ รายการ",
            "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "sSearch": "ค้นหา",
            "paginate": {
                "previous": "ก่อนหน้า",
                "next": "ถัดไป"
            }
        }
            
        }
    );
    $('#report-home-table').DataTable({
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

});
</script>
</body>

</html>