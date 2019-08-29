<?php
include 'appsystem/inc_config.php';
$home_id = $_GET["home_id"];
$sql = "UPDATE home SET approve='1' WHERE home_id='$home_id'";
$query = mysqli_query($conn,$sql);
if ($query == TRUE) {
    $message = 'อนุมัติสถานที่สำเร็จ ';
    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"management-estate.php\");
    </SCRIPT>";
}
else {
    $message = 'อนุมัติสถานที่ของท่านไม่สำเร็จ กรุณาลองใหม่ ';
    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"management-estate.php\");
    </SCRIPT>";
}
mysqli_close($conn);
