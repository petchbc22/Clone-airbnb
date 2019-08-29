<?php
  include 'appsystem/inc_config.php';
  include 'appsystem/check_login.php';
  $home_id = $_GET["home_id"];
 ?>

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
    <link rel="stylesheet" href="assets/assets/css/fileinput.min.css" type="text/css">
    <link rel="stylesheet" href="assets/assets/css/style.css" type="text/css">
</head>
<body class="boon-fonts-regular" id="show-all-picture">
    <div class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-3">
                    <div class="d-flex">
                        <div class="">
                            <a href="see-room-detail.php?home_id=<?php echo $home_id ?>">
                                <span uk-icon="icon: chevron-left; ratio: 2"></span>
                            </a>
                        </div>
                        <div class="">
                            <button class="uk-button uk-button-default" id="toggle-list-details" type="button"><i class="fas fa-list"></i><span class="text">ดูห้องทั้งหมด</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $sql_pic = " SELECT * FROM picture_home WHERE home_id = '$home_id' AND  pic_status = 'N' ";
        $home_result_pic = $conn->query($sql_pic);
        $home_count_pic = $home_result_pic->num_rows;
    ?>
    <div class="container bd-bt pb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-left mb-0">ภาพภายในบ้านพัก</h1>
            </div>
            <?php
                while($pic_home_result_query = mysqli_fetch_array($home_result_pic,MYSQLI_ASSOC)){
            ?>
            <div class="col-md-3 text-center py-2">
                <div class="uk-inline">
                    <img src="img/home/<?php echo $pic_home_result_query["pic_name"]; ?>" class="oj-fit" width="100%" height="200" alt="">
                    <!-- <div class="uk-overlay uk-overlay-primary uk-position-bottom p-1">
                        <p>พื้นที่อยู่อาศัย</p>
                    </div> -->
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

    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/currency-autocomplete.js"></script>
    <script type="text/javascript"  src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/uikit-icons.min.js"></script>
    <script>
        $("#toggle-list-details").click(function() {
            $(this).find('span').text(function(i, text){
                return text === " ดูห้องทั้งหมด" ? " สำรวจสถานที่" : " ดูห้องทั้งหมด";
            });                                
            $(this).find('i').toggleClass('fas fa-th'); 
        }
        );
    </script>
</body>
</html>