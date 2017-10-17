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

    <style>
       #map {
        height: 500px;
        width: 100%;
       }
    </style>
</head>

<body>

    <?PHP 

                                            $KIND        = $_GET["KIND"];
                                            $ORDERLINESS = $_GET["ORDERLINESS"];
                                            $SUBORDER    = $_GET["SUBORDER"];
                                            $FAMILY      = $_GET["FAMILY"];
                                            $GENDER      = $_GET["GENDER"];
                                            $SPECIES     = $_GET["SPECIES"];
                                            $COLOR       = $_GET["COLOR"];
                                            $STATURE     = $_GET["STATURE"];
                                            $DISTRICT    = $_GET["DISTRICT"];

                    //ingresar a la base de datos
                    $c = oci_pconnect('progra1', 'progra1', 'DBTEC');
    ?>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            
            <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="b1f92eab-e739-27bb-fa37-774b01d3e7f8">
                <ul class="nav">
                    <li class="active">
                        <a href="Material Dashboard by Creative Tim.php">
                            <i class="material-icons">dashboard</i>
                            <p>GO BACK DASHBORD</p>
                        </a>
                    </li>
                </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        <div class="sidebar-background" style="background-image: url(../assets/img/sidebar-1.jpg) "></div></div>
        <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="cd1abc3e-54fa-19ff-c1ff-3da4e986199e">
            <div class="content">
                <div class="container-fluid">
                <?php
                    if(strlen($KIND)>0){
                        echo    "<div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>";
                                                    
                                                
                                                //echo    "<tr><th>ID</th>";
                                                echo    "<th>SCIENTIFIC</th>";
                                                 echo    "<th>ENGLISH</th>";
                                                echo    "<th>ORDERLINESS</th>";
                                                echo    "<th>SUBORDER</th>";
                                                echo    "<th>FAMILY</th>";
                                                echo    "<th>GENDER</th>";
                                                echo    "<th>SPECIES</th>";
                                                echo    "<th>STATURE</th>";
                                                echo    "<th>COLOR</th>";
                                                echo    "<th>DISTRITO</th>";
                                                echo    "</tr></thead>";
                                                echo    "<tbody>";
                                                

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_KIND FROM KIND WHERE SCIENTIFIC_NAME = '".$KIND."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row1 = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "    SELECT KIND.ID_KIND, 
                                                                    KIND.SCIENTIFIC_NAME,
                                                                    KIND.ENGLISH_NAME, 
                                                                    ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                    SUBORDER.SUBORDER_NAME SUBORDER,
                                                                    FAMILY.FAMILY_NAME Family,
                                                                    GENDER.GENDER_NAME GENDER,
                                                                    SPECIES.SPECIES_NAME SPECIES,
                                                                    STATURE.BIRD_STATURE STATURE,
                                                                    KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                    COLOR.COLOR_NAME COLOR,
                                                                    KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                    DISTRICT.DISTRICT_NAME DISTRICT 
                                                        FROM KIND
                                                        INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                        INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                        INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                        INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                        INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                        INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                        INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                        INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                        INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                        INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                        WHERE KIND.ID_KIND = ".$row1[0]."
                                                        ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                                    echo    "<tr>";
                                                       // echo        "<td>".$row[0]."</td>";
                                                        echo        "<td><em>".$row[1]."</em></td>";
                                                        echo        "<td>".$row[2]."</td>";
                                                        echo        "<td>".$row[3]."</td>";
                                                        echo        "<td>".$row[4]."</td>";
                                                        echo        "<td>".$row[5]."</td>";
                                                        echo        "<td>".$row[6]."</td>";
                                                        echo        "<td>".$row[7]."</td>";
                                                        echo        "<td>".$row[8]."</td>";
                                                        echo        "<td>".$row[10]."</td>";
                                                        echo        "<td>".$row[12]."</td>";

                                                    echo    "</tr>";
                                                }
                                                
                                    echo        "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>";   
                                                
                    }

                    if(strlen($ORDERLINESS)>0){
                        echo    "<div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION ABOUT ORDERLINESS</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>";
                                                    
                                                
                                                //echo    "<tr><th>ID</th>";
                                                echo    "<th>ORDERLINESS</th>";
                                                echo    "<th>SUBORDER</th>";
                                                echo    "<th>FAMILY</th>";
                                                echo    "<th>GENDER</th>";
                                                echo    "<th>SPECIES</th>";
                                                echo    "<th>STATURE</th>";
                                                echo    "<th>COLOR</th>";
                                                echo    "<th>DISTRITO</th>";
                                                echo    "</tr></thead>";
                                                echo    "<tbody>";
                                                

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_ORDERLINESS FROM ORDERLINESS WHERE ORDERLINESS_NAME = '".$ORDERLINESS."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "   SELECT KIND.ID_KIND, 
                                                                   KIND.SCIENTIFIC_NAME, 
                                                                   ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                   SUBORDER.SUBORDER_NAME SUBORDER,
                                                                   FAMILY.FAMILY_NAME Family,
                                                                   GENDER.GENDER_NAME GENDER,
                                                                   SPECIES.SPECIES_NAME SPECIES,
                                                                   STATURE.BIRD_STATURE STATURE,
                                                                   KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                   COLOR.COLOR_NAME COLOR,
                                                                   KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                   DISTRICT.DISTRICT_NAME DISTRICT 
                                                            FROM KIND
                                                            INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                            INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                            INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                            INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                            INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                            INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                            INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                            INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                            WHERE ORDERLINESS.ID_ORDERLINESS = ".$row[0]."
                                                            ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                                    echo    "<tr>";
                                                        echo        "<td>".$row[2]."</td>";
                                                        echo        "<td>".$row[3]."</td>";
                                                        echo        "<td>".$row[4]."</td>";
                                                        echo        "<td>".$row[5]."</td>";
                                                        echo        "<td>".$row[6]."</td>";
                                                        echo        "<td>".$row[7]."</td>";
                                                        echo        "<td>".$row[9]."</td>";
                                                        echo        "<td>".$row[11]."</td>";

                                                    echo    "</tr>";
                                                }
                                                
                                    echo        "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                    }


                    if(strlen($SUBORDER)>0){
                        echo    "<div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION ABOUT SUBORDER</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>";
                                                    
                                                
                                                echo    "<th>SUBORDER</th>";
                                                echo    "<th>FAMILY</th>";
                                                echo    "<th>GENDER</th>";
                                                echo    "<th>SPECIES</th>";
                                                echo    "<th>STATURE</th>";
                                                echo    "<th>COLOR</th>";
                                                echo    "<th>DISTRITO</th>";
                                                echo    "</tr></thead>";
                                                echo    "<tbody>";
                                                

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_SUBORDER FROM SUBORDER WHERE SUBORDER_NAME = '".$SUBORDER."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "   SELECT KIND.ID_KIND, 
                                                                   KIND.SCIENTIFIC_NAME, 
                                                                   ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                   SUBORDER.SUBORDER_NAME SUBORDER,
                                                                   FAMILY.FAMILY_NAME Family,
                                                                   GENDER.GENDER_NAME GENDER,
                                                                   SPECIES.SPECIES_NAME SPECIES,
                                                                   STATURE.BIRD_STATURE STATURE,
                                                                   KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                   COLOR.COLOR_NAME COLOR,
                                                                   KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                   DISTRICT.DISTRICT_NAME DISTRICT 
                                                            FROM KIND
                                                            INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                            INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                            INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                            INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                            INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                            INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                            INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                            INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                            WHERE SUBORDER.ID_SUBORDER = ".$row[0]."
                                                            ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                                    echo    "<tr>";
                                                        echo        "<td>".$row[3]."</td>";
                                                        echo        "<td>".$row[4]."</td>";
                                                        echo        "<td>".$row[5]."</td>";
                                                        echo        "<td>".$row[6]."</td>";
                                                        echo        "<td>".$row[7]."</td>";
                                                        echo        "<td>".$row[9]."</td>";
                                                        echo        "<td>".$row[11]."</td>";

                                                    echo    "</tr>";
                                                }
                                                
                                    echo        "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                    }

                    if(strlen($FAMILY)>0){
                        echo    "<div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION ABOUT FAMILY</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>";
                                                    
                                                
                                                echo    "<th>FAMILY</th>";
                                                echo    "<th>GENDER</th>";
                                                echo    "<th>SPECIES</th>";
                                                echo    "<th>STATURE</th>";
                                                echo    "<th>COLOR</th>";
                                                echo    "<th>DISTRITO</th>";
                                                echo    "</tr></thead>";
                                                echo    "<tbody>";
                                                

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_FAMILY FROM FAMILY WHERE FAMILY_NAME = '".$FAMILY."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "   SELECT KIND.ID_KIND, 
                                                                   KIND.SCIENTIFIC_NAME, 
                                                                   ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                   SUBORDER.SUBORDER_NAME SUBORDER,
                                                                   FAMILY.FAMILY_NAME Family,
                                                                   GENDER.GENDER_NAME GENDER,
                                                                   SPECIES.SPECIES_NAME SPECIES,
                                                                   STATURE.BIRD_STATURE STATURE,
                                                                   KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                   COLOR.COLOR_NAME COLOR,
                                                                   KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                   DISTRICT.DISTRICT_NAME DISTRICT 
                                                            FROM KIND
                                                            INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                            INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                            INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                            INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                            INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                            INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                            INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                            INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                            WHERE FAMILY.ID_FAMILY = ".$row[0]."
                                                            ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                                    echo    "<tr>";
                                                        echo        "<td>".$row[4]."</td>";
                                                        echo        "<td>".$row[5]."</td>";
                                                        echo        "<td>".$row[6]."</td>";
                                                        echo        "<td>".$row[7]."</td>";
                                                        echo        "<td>".$row[9]."</td>";
                                                        echo        "<td>".$row[11]."</td>";

                                                    echo    "</tr>";
                                                }
                                                
                                    echo        "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                    }

                    if(strlen($GENDER)>0){
                        echo    "<div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION ABOUT GENDER</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>";
                                                    
                                                
                                                echo    "<th>GENDER</th>";
                                                echo    "<th>SPECIES</th>";
                                                echo    "<th>STATURE</th>";
                                                echo    "<th>COLOR</th>";
                                                echo    "<th>DISTRITO</th>";
                                                echo    "</tr></thead>";
                                                echo    "<tbody>";
                                                

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_GENDER FROM GENDER WHERE GENDER_NAME = '".$GENDER."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "   SELECT KIND.ID_KIND, 
                                                                   KIND.SCIENTIFIC_NAME, 
                                                                   ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                   SUBORDER.SUBORDER_NAME SUBORDER,
                                                                   FAMILY.FAMILY_NAME Family,
                                                                   GENDER.GENDER_NAME GENDER,
                                                                   SPECIES.SPECIES_NAME SPECIES,
                                                                   STATURE.BIRD_STATURE STATURE,
                                                                   KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                   COLOR.COLOR_NAME COLOR,
                                                                   KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                   DISTRICT.DISTRICT_NAME DISTRICT 
                                                            FROM KIND
                                                            INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                            INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                            INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                            INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                            INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                            INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                            INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                            INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                            WHERE GENDER.ID_GENDER = ".$row[0]."
                                                            ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                                    echo    "<tr>";
                                                        echo        "<td>".$row[5]."</td>";
                                                        echo        "<td>".$row[6]."</td>";
                                                        echo        "<td>".$row[7]."</td>";
                                                        echo        "<td>".$row[9]."</td>";
                                                        echo        "<td>".$row[11]."</td>";

                                                    echo    "</tr>";
                                                }
                                                
                                    echo        "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                    }

                    if(strlen($SPECIES)>0){
                        echo    "<div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION ABOUT SPECIES</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>";
                                                    
                                                
                                                echo    "<th>SPECIES</th>";
                                                echo    "<th>STATURE</th>";
                                                echo    "<th>COLOR</th>";
                                                echo    "<th>DISTRITO</th>";
                                                echo    "</tr></thead>";
                                                echo    "<tbody>";
                                                

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_SPECIES FROM SPECIES WHERE SPECIES_NAME = '".$SPECIES."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "   SELECT KIND.ID_KIND, 
                                                                   KIND.SCIENTIFIC_NAME, 
                                                                   ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                   SUBORDER.SUBORDER_NAME SUBORDER,
                                                                   FAMILY.FAMILY_NAME Family,
                                                                   GENDER.GENDER_NAME GENDER,
                                                                   SPECIES.SPECIES_NAME SPECIES,
                                                                   STATURE.BIRD_STATURE STATURE,
                                                                   KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                   COLOR.COLOR_NAME COLOR,
                                                                   KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                   DISTRICT.DISTRICT_NAME DISTRICT 
                                                            FROM KIND
                                                            INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                            INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                            INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                            INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                            INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                            INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                            INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                            INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                            WHERE SPECIES.ID_SPECIES = ".$row[0]."
                                                            ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                                    echo    "<tr>";
                                                        echo        "<td>".$row[6]."</td>";
                                                        echo        "<td>".$row[7]."</td>";
                                                        echo        "<td>".$row[9]."</td>";
                                                        echo        "<td>".$row[11]."</td>";

                                                    echo    "</tr>";
                                                }
                                                
                                    echo        "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                    }


                    if(strlen($COLOR)>0){
                        echo    "<div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION ABOUT COLOR</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>";
                                                    
                                                
                                                echo    "<th>KIND</th>";
                                                echo    "<th>STATURE</th>";
                                                echo    "<th>COLOR</th>";
                                                echo    "<th>DISTRITO</th>";
                                                echo    "</tr></thead>";
                                                echo    "<tbody>";
                                                

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_COLOR FROM COLOR WHERE COLOR_NAME = '".$COLOR."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "   SELECT KIND.ID_KIND, 
                                                                   KIND.SCIENTIFIC_NAME, 
                                                                   ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                   SUBORDER.SUBORDER_NAME SUBORDER,
                                                                   FAMILY.FAMILY_NAME Family,
                                                                   GENDER.GENDER_NAME GENDER,
                                                                   SPECIES.SPECIES_NAME SPECIES,
                                                                   STATURE.BIRD_STATURE STATURE,
                                                                   KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                   COLOR.COLOR_NAME COLOR,
                                                                   KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                   DISTRICT.DISTRICT_NAME DISTRICT 
                                                            FROM KIND
                                                            INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                            INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                            INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                            INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                            INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                            INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                            INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                            INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                            WHERE COLOR.ID_COLOR = ".$row[0]."
                                                            ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                                    echo    "<tr>";
                                                        echo        "<td>".$row[1]."</td>";
                                                        echo        "<td>".$row[7]."</td>";
                                                        echo        "<td>".$row[9]."</td>";
                                                        echo        "<td>".$row[11]."</td>";

                                                    echo    "</tr>";
                                                }
                                                
                                    echo        "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                    }

                    if(strlen($STATURE)>0){
                        echo    "<div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION ABOUT STATURE</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>";
                                                    
                                                
                                                echo    "<th>KIND</th>";
                                                echo    "<th>STATURE</th>";
                                                echo    "<th>DISTRITO</th>";
                                                echo    "</tr></thead>";
                                                echo    "<tbody>";
                                                

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_STATURE FROM STATURE WHERE BIRD_STATURE = '".$STATURE."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "   SELECT KIND.ID_KIND, 
                                                                   KIND.SCIENTIFIC_NAME, 
                                                                   ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                   SUBORDER.SUBORDER_NAME SUBORDER,
                                                                   FAMILY.FAMILY_NAME Family,
                                                                   GENDER.GENDER_NAME GENDER,
                                                                   SPECIES.SPECIES_NAME SPECIES,
                                                                   STATURE.BIRD_STATURE STATURE,
                                                                   KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                   COLOR.COLOR_NAME COLOR,
                                                                   KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                   DISTRICT.DISTRICT_NAME DISTRICT 
                                                            FROM KIND
                                                            INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                            INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                            INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                            INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                            INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                            INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                            INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                            INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                            INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                            WHERE STATURE.ID_STATURE = ".$row[0]."
                                                            ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                                    echo    "<tr>";
                                                        echo        "<td>".$row[1]."</td>";
                                                        echo        "<td>".$row[7]."</td>";
                                                        echo        "<td>".$row[11]."</td>";

                                                    echo    "</tr>";
                                                }
                                                
                                    echo        "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                        }

                        if(strlen($DISTRICT)>0){
                        echo    "<div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>";
                                                    
                                                
                                                //echo    "<tr><th>ID</th>";
                                                echo    "<th>SCIENTIFIC</th>";
                                                 echo    "<th>ENGLISH</th>";
                                                echo    "<th>ORDERLINESS</th>";
                                                echo    "<th>SUBORDER</th>";
                                                echo    "<th>FAMILY</th>";
                                                echo    "<th>GENDER</th>";
                                                echo    "<th>SPECIES</th>";
                                                echo    "<th>STATURE</th>";
                                                echo    "<th>COLOR</th>";
                                                echo    "<th>DISTRITO</th>";
                                                echo    "</tr></thead>";
                                                echo    "<tbody>";
                                                

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_DISTRICT FROM DISTRICT WHERE DISTRICT_NAME = '".$DISTRICT."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row1 = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "    SELECT KIND.ID_KIND, 
                                                                    KIND.SCIENTIFIC_NAME,
                                                                    KIND.ENGLISH_NAME, 
                                                                    ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                    SUBORDER.SUBORDER_NAME SUBORDER,
                                                                    FAMILY.FAMILY_NAME Family,
                                                                    GENDER.GENDER_NAME GENDER,
                                                                    SPECIES.SPECIES_NAME SPECIES,
                                                                    STATURE.BIRD_STATURE STATURE,
                                                                    KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                    COLOR.COLOR_NAME COLOR,
                                                                    KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                    DISTRICT.DISTRICT_NAME DISTRICT 
                                                        FROM KIND
                                                        INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                        INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                        INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                        INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                        INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                        INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                        INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                        INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                        INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                        INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                        WHERE DISTRICT.ID_DISTRICT = ".$row1[0]."
                                                        ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);
                                                
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                                    echo    "<tr>";
                                                       // echo        "<td>".$row[0]."</td>";
                                                        echo        "<td><em>".$row[1]."</em></td>";
                                                        echo        "<td>".$row[3]."</td>";
                                                        echo        "<td>".$row[4]."</td>";
                                                        echo        "<td>".$row[5]."</td>";
                                                        echo        "<td>".$row[6]."</td>";
                                                        echo        "<td>".$row[7]."</td>";
                                                        echo        "<td>".$row[8]."</td>";
                                                        echo        "<td>".$row[10]."</td>";
                                                        echo        "<td>".$row[12]."</td>";

                                                    echo    "</tr>";
                                                }
                                                
                                    echo        "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                    }

                
                ?> 

                 <div class='col-lg-6 col-md-12'>
                                    <div class='card'>
                                        <div class='card-header' data-background-color='orange'>
                                            <h4 class='title'>BIRD ALL INFORMATION ABOUT STATURE</h4>
                                        </div>
                                        <div class='card-content table-responsive'>
                                            <table class='table table-hover'>
                                                <thead class='text-warning'>

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

                                              //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT ID_KIND FROM KIND WHERE SCIENTIFIC_NAME = '".$KIND."'";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row1 = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "    SELECT KIND.ID_KIND, 
                                                                    KIND.SCIENTIFIC_NAME,
                                                                    KIND.ENGLISH_NAME, 
                                                                    ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
                                                                    SUBORDER.SUBORDER_NAME SUBORDER,
                                                                    FAMILY.FAMILY_NAME Family,
                                                                    GENDER.GENDER_NAME GENDER,
                                                                    SPECIES.ID_SPECIES SPECIES,
                                                                    STATURE.BIRD_STATURE STATURE,
                                                                    KINDSXCOLOR.ID_COLOR KINDSXCOLOR,
                                                                    COLOR.COLOR_NAME COLOR,
                                                                    KINDSXDISTRICT.ID_KIND KINDSXDISTRICT,
                                                                    DISTRICT.DISTRICT_NAME DISTRICT 
                                                        FROM KIND
                                                        INNER JOIN ORDERLINESS    ON KIND.ID_KIND = ORDERLINESS.ID_KIND
                                                        INNER JOIN SUBORDER       ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_ORDERLINESS
                                                        INNER JOIN FAMILY         ON SUBORDER.ID_SUBORDER= FAMILY.ID_SUBORDER
                                                        INNER JOIN GENDER         ON FAMILY.ID_FAMILY = GENDER.ID_FAMILY
                                                        INNER JOIN SPECIES        ON GENDER.ID_GENDER = SPECIES.ID_GENDER
                                                        INNER JOIN STATURE        ON KIND.ID_KIND = STATURE.ID_STATURE
                                                        INNER JOIN KINDSXCOLOR    ON KINDSXCOLOR.ID_KIND = KIND.ID_KIND
                                                        INNER JOIN COLOR          ON COLOR.ID_COLOR = KINDSXCOLOR.ID_COLOR
                                                        INNER JOIN KINDSXDISTRICT ON KINDSXDISTRICT.ID_KIND = KIND.ID_KIND
                                                        INNER JOIN DISTRICT       ON KINDSXDISTRICT.ID_DISTRICT = DISTRICT.ID_DISTRICT 
                                                        WHERE KIND.ID_KIND = ".$row1[0]."
                                                        ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC";  

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                $row1 = oci_fetch_array($stid, OCI_BOTH);

                                                //pregunta para saber el pass y usuario del que acabamos de guardar
                                                $sql1 = "SELECT COORDINATE FROM SIGHTING WHERE ID_SPECIES = ".$row1[0]."";

                                                $stid = oci_parse($c, $sql1);
                                                
                                                oci_execute($stid);

                                                echo "var locations = [";
                                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false){
                                                        echo "".$row[0].",";
                                                }
                                                echo "]";
                                              ?>

                                            </script>
                                            <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
                                            </script>
                                            <script async defer
                                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf61PRJn5WIYDJJTL_V6YtnrW8z8nQOk4&callback=initMap">
                                            </script>   

                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


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