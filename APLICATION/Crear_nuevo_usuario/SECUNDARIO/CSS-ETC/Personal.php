<!DOCTYPE html>
<!-- saved from url=(0052)https://socialyte.codeplus.it/personal-profile.html? -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Personal Profile Template</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./Personal Profile Template_files/bootstrap.min.css" type="text/css">
    <script src="./Personal Profile Template_files/jquery-3.2.0.min.js.download"></script><style>@media print {#ghostery-purple-box {display:none !important}}</style>
    <script src="./Personal Profile Template_files/bootstrap.min.js.download"></script>
    <link rel="stylesheet" href="./Personal Profile Template_files/font-awesome.min.css">
    <link rel="stylesheet" href="./Personal Profile Template_files/bootstrap-switch.min.css">
    <script src="./Personal Profile Template_files/bootstrap-switch.min.js.download"></script>
    <script src="./Personal Profile Template_files/twemoji.min.js.download"></script>
    <script src="./Personal Profile Template_files/lazy-load.min.js.download"></script>
    <script src="./Personal Profile Template_files/socialyte.min.js.download"></script>
    <link href="./Personal Profile Template_files/css" rel="stylesheet">
    <link rel="stylesheet" href="./Personal Profile Template_files/style.css" type="text/css">
<!-- Bootstrap core CSS     -->
    <link href="./Material Dashboard by Creative Tim_files/bootstrap.min.css" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="./Material Dashboard by Creative Tim_files/material-dashboard.css" rel="stylesheet">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="./Material Dashboard by Creative Tim_files/demo.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href="./Material Dashboard by Creative Tim_files/font-awesome.min.css" rel="stylesheet">
    <link href="./Material Dashboard by Creative Tim_files/css" rel="stylesheet" type="text/css">
<style>@media print {#ghostery-purple-box {display:none !important}}</style><script type="text/javascript" charset="UTF-8" src="./Material Dashboard by Creative Tim_files/common.js.download"></script><script type="text/javascript" charset="UTF-8" src="./Material Dashboard by Creative Tim_files/util.js.download"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/30/7/stats.js"></script>

    <style>
       #map {
        height: 700px;
        width: 100%;
       }
       body {
            background-color: #C0C0C0;
        }
    </style>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


  

</head>

<body id="personal">
    <?php  session_start(); ?>

    <!--Header with Nav -->
    <header class="text-right">
        
        <div class="menu-icon">
            <div class="dropdown">
                <span class="dropdown-toggle" role="button" id="dropdownSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Settings</span>

                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownSettings">
                    <li>
                        <a href="../../Login Template.html" title="Settings">
                          
                            <div class="col-xs-8 text-left">
                                <span>Logout</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="second-icon menu-icon">
            <span><a href="Personal.php" title="Profile">Profile</a>
            </span>
        </div>
        <div class="second-icon menu-icon">
            <span><a href="../wall.php" title="Wall">Wall</a>
            </span>
        </div>
    </header>

    <!--Left Sidebar with info Profile -->
    <div class="sidebar-nav">
        <a href="Personal.php" title="Profile">
            <?PHP
            //ingresar a la base de datos
                    $c = oci_pconnect('progra1', 'progra1', 'DBTEC');


                    $sql = "SELECT ID_PERSON FROM SYSTEM_USER WHERE USER_NAME ='".$_SESSION["User"]."'"; 

                    $stid = oci_parse($c, $sql);
                                        
                    oci_execute($stid);

                    $row6 = oci_fetch_array($stid, OCI_BOTH);
                    

                    $sql = "SELECT PHOTO_PATH FROM PERSON WHERE ID_PERSON = ".$row6[0].""; 

                    $stid22 = oci_parse($c, $sql);
                                        
                    oci_execute($stid22);

                    $HOLA = oci_fetch_array($stid22, OCI_BOTH);

                   echo "<img src='../../FOTOS/".$HOLA[0]."' alt='User name' class='img-circle img-user'>";
            ?>
        </a>
        <?php
             echo "<h2 class='text-center hidden-xs'><a title='Profile'>Welcome: ".$_SESSION["User"]." </a></h2>"
        ?>
        <p class="text-center user-description hidden-xs">
            <?php
                    
                    //pregunta para saber el pass y usuario del que acabamos de guardar
                    $sql1 = "SELECT ID_PERSON FROM SYSTEM_USER WHERE USER_NAME = '".$_SESSION["User"]."' ";  

                    $stid = oci_parse($c, $sql1);
                    
                    oci_execute($stid);
                    
                    $row1 = oci_fetch_array($stid, OCI_BOTH);

                    $sql2 = "SELECT Type_name FROM People_type WHERE ID_PERSON = ".$row1[0]." ";  

                    $s = oci_parse($c, $sql2);
                    
                    oci_execute($s);
                    
                    $row2 = oci_fetch_array($s, OCI_BOTH);

                    
                    echo "<i>".$row2[0]."</i>"
                ?>
        </p>
    </div>

    <div class="content-posts profile-content">
        <div class="banner-profile">
        </div>
        <!-- Tab Panel -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="personal-profile.html?#posts" role="tab" id="postsTab" data-toggle="tab" aria-controls="posts" aria-expanded="true">BIRD SIGHTING INFORMATION</a></li>
            <li class=""><a href="personal-profile.html?#profile" role="tab" id="profileTab" data-toggle="tab" aria-controls="profile" aria-expanded="false">USER INFORMATION</a></li>
            <li class=""><a href="personal-profile.html?#chat" role="tab" id="chatTab" data-toggle="tab" aria-controls="chat" aria-expanded="false">Add New Sighting</a></li>
        </ul>

        <!--Start Tab Content-->
        <div class="tab-content">

            <!-- Tab Posts -->
            <div class="tab-pane fade active in" role="tabpanel" id="posts" aria-labelledby="postsTab">
                <div id="posts-container" class="container-fluid container-posts">

                        
                <?php
                    //ingresar a la base de datos
                    $c = oci_pconnect('progra1', 'progra1', 'DBTEC');

                    

                    $sql = "SELECT ID_PERSON FROM SYSTEM_USER  WHERE USER_NAME ='".$_SESSION["User"]."' "; 

                    $stid = oci_parse($c, $sql);
                                        
                    oci_execute($stid);

                    $row6 = oci_fetch_array($stid, OCI_BOTH);

                    $sql = " SELECT    PERSON.ID_PERSON,
                                       PERSON.FULL_NAME,
                                       PERSON.PHOTO_PATH,
                                       SIGHTING.ID_SIGHTING SIGHTING,
                                       SIGHTING.COORDINATE,
                                       SPECIES.ID_SPECIES SPECIES,
                                       DISTRICT.DISTRICT_NAME DISTRICT,
                                       PICTURE.PHOTO_PATH PICTURE 
                                FROM PERSON
                                INNER JOIN SIGHTING ON SIGHTING.ID_PERSON = PERSON.ID_PERSON
                                INNER JOIN SPECIES ON SPECIES.ID_SPECIES = SIGHTING.ID_SPECIES
                                INNER JOIN DISTRICT ON DISTRICT.ID_DISTRICT = SIGHTING.ID_DISTRICT 
                                INNER JOIN PICTURE ON PICTURE.ID_SIGHTING = SIGHTING.ID_SIGHTING 
                                WHERE PERSON.ID_PERSON = ".$row6[0].""; 

                    $stid22 = oci_parse($c, $sql);
                                        
                    oci_execute($stid22);

                    while (($row1 = oci_fetch_array($stid22, OCI_BOTH)) != false) {
                        
                        //pregunta para saber el pass y usuario del que acabamos de guardar
                        $sql1 = "   SELECT  KIND.ID_KIND, 
                                            KIND.SCIENTIFIC_NAME, 
                                            KIND.ENGLISH_NAME,
                                            ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                            SUBORDER.SUBORDER_NAME SUBORDER,
                                            FAMILY.FAMILY_NAME Family,
                                            GENDER.GENDER_NAME GENDER,
                                            SPECIES.SPECIES_NAME SPECIES,
                                            STATURE.BIRD_STATURE STATURE
                                            FROM KIND
                                            INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                            INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                            INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                            INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                            INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                            INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                            WHERE SPECIES.ID_SPECIES  = ".$row1[5]."
                                            ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                        $stid1 = oci_parse($c, $sql1);
                                            
                        oci_execute($stid1);


                        //pregunta para saber el pass y usuario del que acabamos de guardar
                        $sql2 = "SELECT COUNT(*) FROM SIGHTINGXPERSON WHERE ID_SIGHTING= ".$row1[3]."";  

                        $stid2 = oci_parse($c, $sql2);
                                            
                        oci_execute($stid2);

                        $row2 = oci_fetch_array($stid2, OCI_BOTH);


                        while (($row = oci_fetch_array($stid1, OCI_BOTH)) != false) {

                            echo"<div class='card-post'>";
                                echo"<div class='row'>";
                                    echo"<div class='col-xs-3 col-sm-2'>";
                                        echo"<a href='#' title='User Profile'>";
                                            echo"<img src='../../FOTOS/".$row1[2]."' alt='User name' class='img-circle img-user'>";
                                        echo"</a>";
                                    echo"</div>";
                                    echo"<div class='col-xs-9 col-sm-10 info-user'>";
                                                echo "<h2><a href='#' title='User Profile'>SIGHTING BY: ".$row1[1]." </a></h2>";
                                    echo"</div>";
                                echo"</div>";
                                echo"<div class='row'>";
                                    echo"<div class='col-sm-8 col-sm-offset-2 data-post'>";
                                        echo"<p><i>SCIENTIFIC:  ".$row[1]."</i></p>";
                                        echo"<p>ENGLISH NAME:".$row[2]."</p>";
                                        echo"<p>ORDERLINESS: ".$row[3]."</p>";
                                        echo"<p>SUBORDER:    ".$row[4]."</p>";
                                        echo"<p>FAMILY:      ".$row[5]."</p>";
                                        echo"<p>GENDER:      ".$row[6]."</p>";
                                        echo"<p>SPECIES:     ".$row[7]."</p>";
                                        echo"<p>STATURE:     ".$row[8]."</p>";
                                        echo"<p>DISTRICT:    ".$row1[6]."</p>";
                                        //echo"<p>COORDINATE:    ".$row[9]."</p>";
                                        echo"<img src='../../FOTOS/".$row1[7]."' alt='image post' class='img-post'>";
                                        echo"<div class='reaction'>";
                                        
                                      echo"</div>";
                                    echo"</div>";
                                echo"</div>";
                            echo"</div>";
                        }
                    }
                ?>

                </div>
            </div><!-- end Tab Posts -->

            <!--Start Tab Profile-->
            <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profileTab">
                <div class="container-fluid container-posts">
                    <div class="card-post">
                        <ul class="profile-data">
                            <?php

                            $sqll = "SELECT ID_PERSON FROM SYSTEM_USER WHERE USER_NAME = '".$_SESSION["User"]."' ";  

                            $sti = oci_parse($c, $sqll);
                            
                            oci_execute($sti);
                            
                            $roww = oci_fetch_array($sti, OCI_BOTH);

                            $sql2 = "SELECT FULL_NAME, EMAIL, TO_NUMBER(TO_CHAR(BIRTH_DATE, 'YYYY')) FROM PERSON WHERE ID_PERSON = ".$roww[0]." ";  

                            $stid2 = oci_parse($c, $sql2);
                            
                            oci_execute($stid2);
                            
                            $row2 = oci_fetch_array($stid2, OCI_BOTH);

                            $sql3 = "SELECT PROFESSION_NAME FROM PROFESSION WHERE ID_PERSON = ".$roww[0]." ";  

                            $stid3 = oci_parse($c, $sql3);
                            
                            oci_execute($stid3);
                            
                            $roww2 = oci_fetch_array($stid3, OCI_BOTH);

                            $edad = 2017-$row2[2];

                            echo "<li><b>Username: </b>".$row2[0]."</li>";
                            echo "<li><b>Age:</b>".$edad."</li>";
                            echo "<li><b>Job: </b>".$roww2[0]."</li>";
                            echo "<li><b>Email: </b>".$row2[1]."</li>";
                            ?>
                        </ul>
                        <p><a href="Signin Template.html" title="edit profile"><i class="fa fa-pencil" aria-hidden="true"></i>CHANGE PASSWORD</a></p>
                    </div>
                </div>
            </div><!-- end tab Profile -->

            <!-- Start Tab chat-->
            <div class="tab-pane fade" role="tabpanel" id="chat" aria-labelledby="chatTab">
                <div class="container-fluid container-posts">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                            <FORM action="Material Dashboard by Creative Tim.php">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="red">
                                    </div>
                                    <div class="card-content">
                                        <h3><p class="category">BIRD STATISTICS INFORMATION</p></h3>
                                        
                                            <input type="submit" name="hola">
                                    </div>
                                </div>
                            </FORM>
                    </div>
                </div>



                <div class="container-fluid container-posts">
                                            <div id="map"></div>
                                            <script>

                                              function initMap() {

                                                var map = new google.maps.Map(document.getElementById('map'), {
                                                  zoom: 3,
                                                  center: {lat: 9.748916999999999, lng: -83.753428}
                                                });

                                                // Create an array of alphabetical characters used to label the markers.
                                                var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                                                // Add some markers to the map.
                                                // Note: The code uses the JavaScript Array.prototype.map() method to
                                                // create an array of markers based on a given "locations" array.
                                                // The map() method here has nothing to do with the Google Maps API.
                                                var markers = locations.map(function(location, i) {
                                                  return new google.maps.Marker({
                                                    position: location,
                                                    label: labels[i % labels.length]
                                                  });
                                                });

                                                // Add a marker clusterer to manage the markers.
                                                var markerCluster = new MarkerClusterer(map, markers,
                                                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
                                              }
                                              <?php

                                                $sqll = "SELECT ID_PERSON FROM SYSTEM_USER WHERE USER_NAME = '".$_SESSION["User"]."'";  

                                                $sti = oci_parse($c, $sqll);

                                                oci_execute($sti);
                                                
                                                $roww = oci_fetch_array($sti, OCI_BOTH);

                                                $sqll = "SELECT COORDINATE FROM SIGHTING WHERE ID_PERSON = ".$roww[0]."";  

                                                $sti = oci_parse($c, $sqll);

                                                oci_execute($sti);


                                                echo "var locations = [";

                                                while (($roww = oci_fetch_array($sti, OCI_BOTH)) != false){

                                                        echo "".$roww[0].",";
                                                
                                                }
                                                echo "]";


                                                //echo "var locations = [{lat: 9.748916999999999, lng: -83.753428},
                                                //                       {lat: 9.6183044, lng: -84.6315218},
                                                //                       {lat: 9.898253799999999, lng: -84.0654685}]";
                                              ?>

                                            </script>
                                            <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
                                            </script>
                                            <script async defer
                                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf61PRJn5WIYDJJTL_V6YtnrW8z8nQOk4&callback=initMap">
                                            </script>  

                            
                        
                </div>

                <br>

                <div class="container-fluid container-posts">

                    <div class="container">
                    <h2 id="text-center">Enter Location: </h2>
                    <form id="location-form">
                      <input type="text" id="location-input" class="form-control form-control-lg">
                      <br>
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                    <div class="card-block" id="formatted-address"></div>
                    <div class="card-block" id="address-components"></div>
                    <div class="card-block" id="geometry"></div>
                  </div>

                  <script>
                    // Call Geocode
                    //geocode();

                    // Get location form
                    var locationForm = document.getElementById('location-form');

                    // Listen for submiot
                    locationForm.addEventListener('submit', geocode);

                    function geocode(e){
                      // Prevent actual submit
                      e.preventDefault();

                      var location = document.getElementById('location-input').value;

                      axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
                        params:{
                          address:location,
                          key:'AIzaSyDf61PRJn5WIYDJJTL_V6YtnrW8z8nQOk4'
                        }
                      })
                      .then(function(response){
                        // Log full response
                        console.log(response);

                        // Formatted Address
                        var formattedAddress = response.data.results[0].formatted_address;
                        var formattedAddressOutput = `
                          <ul class="list-group">
                            <li class="list-group-item">${formattedAddress}</li>
                          </ul>
                        `;

                        // Address Components
                        var addressComponents = response.data.results[0].address_components;
                        var addressComponentsOutput = '<ul class="list-group">';
                        for(var i = 0;i < addressComponents.length;i++){
                          addressComponentsOutput += `
                            <li class="list-group-item"><strong>${addressComponents[i].types[0]}</strong>: ${addressComponents[i].long_name}</li>
                          `;
                        }
                        addressComponentsOutput += '</ul>';

                        // Geometry
                        var lat = response.data.results[0].geometry.location.lat;
                        var lng = response.data.results[0].geometry.location.lng;
                        var geometryOutput = `
                          <ul class="list-group">
                            <li class="list-group-item"><strong>Latitude</strong>: ${lat}</li>
                            <li class="list-group-item"><strong>Longitude</strong>: ${lng}</li>
                          </ul>
                        `;

                        // Output to app
                        document.getElementById('formatted-address').innerHTML = formattedAddressOutput;
                        document.getElementById('address-components').innerHTML = addressComponentsOutput;
                        document.getElementById('geometry').innerHTML = geometryOutput;
                      })
                      .catch(function(error){
                        console.log(error);
                      });
                    }
                  </script>

                </div>

                <div class="container-fluid container-posts">
                    
                    <form action="loghic1.php" method="GET">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                </div>
                                <div class="card-content">
                                    <p class="category">SELECT THE SPECIES OF THE BIRD</p>
                                    
                                        <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT ID_SPECIES, SPECIES_NAME FROM SPECIES";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='SPECIES'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[1]."</option>";
                                            }
                                            echo "</select>";
                                        ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                </div>
                                <div class="card-content">
                                    <p class="category">SELECT THE DISTRICT OF BIRD</p>
                                    
                                        <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT ID_DISTRICT, DISTRICT_NAME FROM DISTRICT";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='DISTRICT'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[1]."</option>";
                                            }
                                            echo "</select>";
                                        ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                </div>
                                <div class="card-content">
                                    <p class="category">ENTER THE COORDINATE</p>
                                    Latitude:<input type="text" name="Latitude">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                </div>
                                <div class="card-content">
                                    <p class="category">ENTER THE COORDINATE</p>
                                    Longitude:<input type="text" name="Longitude"><br>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                </div>
                                <div class="card-content">
                                    <p class="category">ADD PICTURE</p>
                                        
                                        <input type="file" maxlength="100" name="PHOTO" class="form-control" placeholder="Photo">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                </div>
                                <div class="card-content">
                                    <p class="category">ADD PICTURE</p>
                                        
                                    <input type="date" maxlength="30" name="date_date" class="form-control" placeholder="DATE SIGHTING">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                </div>
                                <div class="card-content">
                                    <p class="category">SAVE SIGHTING</p>
                                    
                                        <input type="submit" name="hola">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                
            </div>


            </div><!-- End Tab chat-->

        </div><!-- Close Tab Content-->

    </div><!--Close content posts-->

</body></html>