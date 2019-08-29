<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">    <meta name="author" content="ThemeStarz">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="assets/assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/assets/css/fileinput.min.css" type="text/css">
    <link rel="stylesheet" href="assets/assets/css/style.css" type="text/css">
    <title>Zoner | Add Your Property</title>
</head>
<body class="boon-fonts-regular" id="addplace">
    <div class="navbar-custom bg-white bd-bt ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg w-100 layout-nav mb-0">
                        <a class="navbar-brand " href="index.php">Navbar w/ text</a>
                        <div class="uk-inline w-25 box-sd-nb searchbar">
                            <span class="uk-form-icon uk-form-icon" uk-icon="search"></span>
                            <input class="uk-input" type="text" placeholder="ค้นหา" >
                        </div>
                        <div class="search-mobile">
                            <span uk-icon="search" class="text-black squresize"></span>
                        </div>
                        <div class="nav-mobile">
                            <a id="nav-toggle" href="#!" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                <span uk-icon="menu" class="custom-icons"></span>
                            </a>
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
                            <?php include '../component/modal-login.php';?>  <!-- include modal  -->
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
    <div id="page-content">
        <div class="container  pt-90">
            <form role="form" id="form-submit" class="form-submit" action="thank-you.html">
                <div class="row">
                    <div class="col-md-12 pt-3">
                        <section id="submit-form">
                            <section id="basic-information">
                                <header><h2>Basic Information</h2></header>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="submit-title">Title</label>
                                            <input type="text" class="form-control" id="submit-title" name="title" required>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="submit-price">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control" id="submit-price" name="price" pattern="\d*" required>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="submit-description">Description</label>
                                    <textarea class="form-control" id="submit-description" rows="8" name="submit-description" required></textarea>
                                </div><!-- /.form-group -->
                            </section><!-- /#basic-information -->
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <section id="summary">
                                            <header><h2>Summary</h2></header>
                                            <div class="form-group">
                                                <label for="submit-location">Location</label>
                                                <select name="type" id="submit-location">
                                                    <option value="1">New York</option>
                                                    <option value="2">Los Angeles</option>
                                                    <option value="3">Chicago</option>
                                                    <option value="4">Houston</option>
                                                    <option value="5">Philadelphia</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="submit-property-type">Property Type</label>
                                                        <select name="type" id="submit-property-type">
                                                            <option value="1">Apartment</option>
                                                            <option value="2">Condominium</option>
                                                            <option value="3">Cottage</option>
                                                            <option value="4">Flat</option>
                                                            <option value="5">House</option>
                                                        </select>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="submit-status">Status</label>
                                                        <select name="type" id="submit-status">
                                                            <option value="1">Sale</option>
                                                            <option value="2">Rent</option>
                                                        </select>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col-md-6 -->
                                            </div><!-- /.row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="submit-Beds">Beds</label>
                                                        <input type="text" class="form-control" id="submit-Beds" name="Beds" pattern="\d*" required>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="submit-Baths">Baths</label>
                                                        <input type="text" class="form-control" id="submit-Baths" name="Baths" pattern="\d*" required>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col-md-6 -->
                                            </div><!-- /.row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="submit-area">Area</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="submit-area" name="area" pattern="\d*" required>
                                                            <span class="input-group-addon">m<sup>2</sup></span>
                                                        </div>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col-md-6 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="submit-garages">Garages</label>
                                                        <input type="text" class="form-control" id="submit-garages" name="garages" pattern="\d*" required>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col-md-6 -->
                                            </div><!-- /.row -->
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">Allow user rating <i class="fa fa-question-circle tool-tip"  data-toggle="tooltip" data-placement="right" title="Users can give you a stars rating which is displayed in property detail"></i>
                                                </label>
                                            </div>
                                        </section><!-- /#summary -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <section id="place-on-map">
                                            <header class="section-title">
                                                <h2>Place on Map</h2>
                                                <span class="link-arrow geo-location">Get My Position</span>
                                            </header>
                                            <div class="form-group">
                                                <label for="address-map">Address</label>
                                                <input type="text" class="form-control" id="address-map" name="address">
                                            </div><!-- /.form-group -->
                                            <label for="address-map">Or drag the marker to property position</label>
                                            <div id="submit-map"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="latitude" name="latitude" readonly>
                                                    </div><!-- /.form-group -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="longitude" name="longitude" readonly>
                                                    </div><!-- /.form-group -->
                                                </div>
                                            </div>
                                        </section><!-- /#place-on-map -->
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                            </section>
                            <section class="block" id="gallery">
                                <header><h2>Gallery</h2></header>
                                <div class="center">
                                    <div class="form-group">
                                        <input id="file-upload" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="false" data-show-remove="false" accept="image/jpeg,image/png" data-browse-class="btn btn-default" data-browse-label="Browse Images">
                                        <figure class="note"><strong>Hint:</strong> You can upload all images at once!</figure>
                                    </div>
                                </div>
                            </section>
                            <section id="property-features" class="block">
                                <section>
                                    <header><h2>Property Features</h2></header>
                                    <ul class="submit-features">
                                        <li><div class="checkbox"><label><input type="checkbox">Air conditioning</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Bedding</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Heating</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Internet</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Microwave</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Smoking allowed</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Use of pool</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Toaster</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Coffee pot</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Cable TV</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Parquet</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Roof terrace</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Terrace</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Balcony</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Iron</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Hi-Fi</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Beach</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox">Garage</label></div></li>
                                    </ul>
                                </section>
                            </section>
                            <hr>
                        </section>
                    </div><!-- /.col-md-9 --> 
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-default large">Proceed to Payment</button>
                            </div><!-- /.form-group -->
                            <figure class="note block">By clicking the “Proceed to Payment” or “Submit” button you agree with our <a href="terms-conditions.html">Terms and conditions</a></figure>
                        </div>
                    </div>
                </div>
            </form><!-- /#form-submit -->
        </div><!-- /.container -->
    </div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript"  src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/kendo.all.min.js"></script>
<script type="text/javascript" src="assets/assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="assets/assets/js/custom-map.js"></script>
<script type="text/javascript" src="assets/assets/js/custom.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->
<script>
    var _latitude = 48.87;
    var _longitude = 2.29;
    google.maps.event.addDomListener(window, 'load', initSubmitMap(_latitude,_longitude));
    function initSubmitMap(_latitude,_longitude){
        var mapCenter = new google.maps.LatLng(_latitude,_longitude);
        var mapOptions = {
            zoom: 15,
            center: mapCenter,
            disableDefaultUI: false,
            //scrollwheel: false,
            styles: mapStyles
        };
        var mapElement = document.getElementById('submit-map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new MarkerWithLabel({
            position: mapCenter,
            map: map,
            icon: 'assets/img/marker.png',
            labelAnchor: new google.maps.Point(50, 0),
            draggable: true
        });
        $('#submit-map').removeClass('fade-map');
        google.maps.event.addListener(marker, "mouseup", function (event) {
            var latitude = this.position.lat();
            var longitude = this.position.lng();
            $('#latitude').val( this.position.lat() );
            $('#longitude').val( this.position.lng() );
        });
//      Autocomplete
        var input = /** @type {HTMLInputElement} */( document.getElementById('address-map') );
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            $('#latitude').val( marker.getPosition().lat() );
            $('#longitude').val( marker.getPosition().lng() );
            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });
    }
    function success(position) {
        initSubmitMap(position.coords.latitude, position.coords.longitude);
        $('#latitude').val( position.coords.latitude );
        $('#longitude').val( position.coords.longitude );
    }

    $('.geo-location').on("click", function() {
        if (navigator.geolocation) {
            $('#submit-map').addClass('fade-map');
            navigator.geolocation.getCurrentPosition(success);
        } else {
            error('Geo Location is not supported');
        }
    });
</script>
</body>
</html>