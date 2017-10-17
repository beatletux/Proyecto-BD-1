<?php

session_start();

$SPECIES   = $_GET["SPECIES"];
$Latitude  = $_GET["Latitude"];
$Longitude = $_GET["Longitude"];
$PHOTO     = $_GET["PHOTO"];
$DATE      = $_GET["date_date"];
$DISTRICT  = $_GET["DISTRICT"];

$LATLNG = "{lat:".$Latitude.", lng:".$Longitude."}";

//echo $KIND;
//echo "<br>";
//echo $LATLNG;
//echo "<br>";
//echo $PHOTO;
//echo "<br>";
//echo $DATE;
//echo "<br>";
//echo $DISTRICT;
	
	//ingresar a la base de datos
    $c = oci_pconnect('progra1', 'progra1', 'DBTEC');
                    
    //pregunta para saber el pass y usuario del que acabamos de guardar
    $sql1 = "SELECT ID_PERSON FROM SYSTEM_USER WHERE USER_NAME = '".$_SESSION["User"]."'";

    $stid = oci_parse($c, $sql1);
                    
    oci_execute($stid);

    $row1 = oci_fetch_array($stid, OCI_BOTH);



if(strlen($LATLNG)>0 && strlen($Longitude)>0 && strlen($DATE)>0 && strlen($PHOTO)>0){

 	$sql3 = "BEGIN INSERT_SIGHTING(".$row1[0].",".$DISTRICT.",'".$LATLNG."',to_date('".$DATE."', 'YYYY,MM,DD'),".$SPECIES."); END;";
 	
 	$stid = oci_parse($c, $sql3);
                    
    oci_execute($stid);

    $sql3 = "SELECT MAX(ID_SIGHTING) from SIGHTING";
    
    $stid = oci_parse($c, $sql3);
                    
    oci_execute($stid);

    $row1 = oci_fetch_array($stid, OCI_BOTH);

    $sql = "BEGIN insert_Picture(".$row1[0].", '".$PHOTO."'); END;";
   
 	$sti = oci_parse($c, $sql);
                    
    oci_execute($sti);

    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=Personal.php'>";
}else{
	echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=Personal.php'>";
}
?>