<!DOCTYPE html>
<!-- saved from url=(0072)http://demos.creative-tim.com/material-dashboard/examples/dashboard.html -->
<html lang="en" class="perfect-scrollbar-on">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
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


</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            
            <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="b1f92eab-e739-27bb-fa37-774b01d3e7f8">
                <ul class="nav">
                    <li class="active">
                        <a href="Personal.php">
                            <i class="material-icons">dashboard</i>
                            <p>GO BACK TO PROFILE</p>
                        </a>
                    </li>
                </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        <div class="sidebar-background" style="background-image: url(../assets/img/sidebar-1.jpg) "></div></div>
        <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="cd1abc3e-54fa-19ff-c1ff-3da4e986199e">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <h2>ALL BIRD INFORMATION</h2>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                </div>
                                <div class="card-content">
                                    <p class="category">Class</p>
                                    <?php
                                    
                                        //ingresar a la base de datos
                                        $c = oci_pconnect('progra1', 'progra1', 'DBTEC');
                                        
                                        //pregunta para saber el pass y usuario del que acabamos de guardar
                                        $sql1 = "SELECT FUNCTIONS_KIND_COUNTING FROM KIND";  

                                        $stid = oci_parse($c, $sql1);
                                        
                                        oci_execute($stid);
                                        
                                        $row1 = oci_fetch_array($stid, OCI_BOTH);

                                        echo "<h3 class='title'>".$row1[0]."</h3>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                </div>
                                <div class="card-content">
                                    <p class="category">Order</p>
                                    <?php
                                        
                                        //pregunta para saber el pass y usuario del que acabamos de guardar
                                        $sql1 = "SELECT FUNCTIONS_ORDERLINESS_COUNTING FROM ORDERLINESS";  

                                        $stid = oci_parse($c, $sql1);
                                        
                                        oci_execute($stid);
                                        
                                        $row1 = oci_fetch_array($stid, OCI_BOTH);

                                        echo "<h3 class='title'>".$row1[0]."</h3>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                </div>
                                <div class="card-content">
                                    <p class="category">Suborder</p>
                                    <?php
                                        
                                        //pregunta para saber el pass y usuario del que acabamos de guardar
                                        $sql1 = "SELECT FUNCTIONS_SUBORDER_COUNTING FROM SUBORDER";  

                                        $stid = oci_parse($c, $sql1);
                                        
                                        oci_execute($stid);
                                        
                                        $row1 = oci_fetch_array($stid, OCI_BOTH);

                                        echo "<h3 class='title'>".$row1[0]."</h3>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                </div>
                                <div class="card-content">
                                    <p class="category">Family</p>
                                    <?php
                                        
                                        //pregunta para saber el pass y usuario del que acabamos de guardar
                                        $sql1 = "SELECT FUNCTIONS_FAMILY_COUNTING FROM FAMILY";  

                                        $stid = oci_parse($c, $sql1);
                                        
                                        oci_execute($stid);
                                        
                                        $row1 = oci_fetch_array($stid, OCI_BOTH);

                                        echo "<h3 class='title'>".$row1[0]."</h3>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                </div>
                                <div class="card-content">
                                    <p class="category">GENDER</p>
                                    <?php
                                        
                                        //pregunta para saber el pass y usuario del que acabamos de guardar
                                        $sql1 = "SELECT FUNCTIONS_GENDER_COUNTING FROM GENDER";  

                                        $stid = oci_parse($c, $sql1);
                                        
                                        oci_execute($stid);
                                        
                                        $row1 = oci_fetch_array($stid, OCI_BOTH);

                                        echo "<h3 class='title'>".$row1[0]."</h3>";
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                </div>
                                <div class="card-content">
                                    <p class="category">Species</p>
                                    <?php
                                        
                                        //pregunta para saber el pass y usuario del que acabamos de guardar
                                        $sql1 = "SELECT FUNCTIONS_SPECIES_COUNTING FROM SPECIES";  

                                        $stid = oci_parse($c, $sql1);
                                        
                                        oci_execute($stid);
                                        
                                        $row1 = oci_fetch_array($stid, OCI_BOTH);

                                        echo "<h3 class='title'>".$row1[0]."</h3>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <h2>PERSON WITH MORE LIKES</h2>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                </div>
                                <div class="card-content">
                                    <p class="category">PERSON WITH MORE LIKES:</p>
                                    <form  method="GET">
                                        <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT max(ID_PERSON) FROM SIGHTINGXPERSON";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            $row1 = oci_fetch_array($stid, OCI_BOTH);

                                            $sql1 = "SELECT FULL_NAME FROM PERSON WHERE ID_PERSON=".$row1[0]."";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            $row1 = oci_fetch_array($stid, OCI_BOTH);


                                            echo "<h3 class='title'>".$row1[0]."</h3>";
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <h2>TOP "5" PERSON WITH MORE SIGHTING</h2>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                </div>
                                <div class="card-content">
                                    <p class="category">PERSON WITH MORE SIGHTING:</p>
                                    <form  method="GET">
                                        <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT * FROM (SELECT DISTINCT SIGHTING.ID_PERSON FROM SIGHTING ORDER BY SIGHTING.ID_PERSON  ) WHERE ROWNUM <= 5";  

                                            $stid2 = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid2);
                                            
                                            
                                            while(($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {

                                            $sql1 = "SELECT FULL_NAME FROM PERSON WHERE ID_PERSON=".$row2[0]."";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);

                                            $row1 = oci_fetch_array($stid, OCI_BOTH);

                                            echo "<h3 class='title'>".$row1[0]."</h3>";
                                            }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h2>BIRD EXTINCT</h2>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                </div>
                                <div class="card-content">
                                    <p class="category">BIRD's IN EXTINCT:</p>
                                    <form  method="GET">
                                        <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT COUNT(*) from SIGHTING";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            $row1 = oci_fetch_array($stid, OCI_BOTH);

                                            $num =  $row1[0]/5;
                                            
                                            $sql1 = "SELECT ID_SPECIES from SIGHTING GROUP BY ID_SPECIES HAVING COUNT(*) <=".((int)$num)."";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);

                                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                $sql1 = "SELECT SPECIES_NAME FROM SPECIES WHERE ID_SPECIES = ".$row[0]."";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                $row1 = oci_fetch_array($stid, OCI_BOTH);


                                                echo "<h3 class='title'>".$row1[0]."</h3>";
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <form action="loghic.php" method="GET">
                    <div class="row">
                        <h2>SPECIFIC INFORMATION</h2>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                </div>
                                <div class="card-content">
                                    <p class="category">Class</p>
                                    <form  method="GET">
                                        <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT SCIENTIFIC_NAME FROM KIND";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='KIND'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[0]."</option>";
                                            }
                                            echo "</select>";
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                </div>
                                <div class="card-content">
                                    <p class="category">Order</p>
                                        <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT ORDERLINESS_NAME FROM ORDERLINESS";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='ORDERLINESS'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[0]."</option>";
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
                                    <p class="category">Suborder</p>
                                    <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT SUBORDER_NAME FROM SUBORDER";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='SUBORDER'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[0]."</option>";
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
                                    <p class="category">Family</p>
                                    <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT FAMILY_NAME FROM FAMILY";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='FAMILY'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[0]."</option>";
                                            }
                                            echo "</select>";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                </div>
                                <div class="card-content">
                                    <p class="category">GENDER</p>
                                    <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT GENDER_NAME FROM GENDER";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='GENDER'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[0]."</option>";
                                            }
                                            echo "</select>";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                </div>
                                <div class="card-content">
                                    <p class="category">Species</p>
                                    <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT SPECIES_NAME FROM SPECIES";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='SPECIES'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[0]."</option>";
                                            }
                                            echo "</select>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                </div>
                                <div class="card-content">
                                    <p class="category">COLOR</p>
                                    <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT COLOR_NAME FROM COLOR";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='COLOR'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[0]."</option>";
                                            }
                                            echo "</select>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                </div>
                                <div class="card-content">
                                    <p class="category">STATURE</p>
                                    <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT BIRD_STATURE FROM STATURE";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='STATURE'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[0]."</option>";
                                            }
                                            echo "</select>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                </div>
                                <div class="card-content">
                                    <p class="category">DISTRICT</p>
                                    <?php
                                            //pregunta para saber el pass y usuario del que acabamos de guardar
                                            $sql1 = "SELECT DISTRICT_NAME FROM DISTRICT";  

                                            $stid = oci_parse($c, $sql1);
                                            
                                            oci_execute($stid);
                                            
                                            //$row1 = oci_fetch_array($stid, OCI_BOTH);
                                            echo "<select name='DISTRICT'>";
                                            echo"<option value=''></option>";
                                            while(($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {

                                                    echo"<option value='".$row1[0]."'>".$row1[0]."</option>";
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
                                    <p class="category">ASK INFORMATION</p>
                                    
                                        <input type="submit" name="hola">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>

            
<!--   Core JS Files   -->
<script src="./Material Dashboard by Creative Tim_files/jquery-3.2.1.min.js.download" type="text/javascript"></script>
<script src="./Material Dashboard by Creative Tim_files/bootstrap.min.js.download" type="text/javascript"></script>
<script src="./Material Dashboard by Creative Tim_files/material.min.js.download" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="./Material Dashboard by Creative Tim_files/chartist.min.js.download"></script>
<!--  Dynamic Elements plugin -->
<script src="./Material Dashboard by Creative Tim_files/arrive.min.js.download"></script>
<!--  Sharrre Plugin -->
<script src="./Material Dashboard by Creative Tim_files/jquery.sharrre.js.download"></script>
<!--  PerfectScrollbar Library -->
<script src="./Material Dashboard by Creative Tim_files/perfect-scrollbar.jquery.min.js.download"></script>
<!--  Notifications Plugin    -->
<script src="./Material Dashboard by Creative Tim_files/bootstrap-notify.js.download"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="./Material Dashboard by Creative Tim_files/js"></script>
<!-- Material Dashboard javascript methods -->
<script src="./Material Dashboard by Creative Tim_files/material-dashboard.js.download"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="./Material Dashboard by Creative Tim_files/demo.js.download"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

</body></html>