<!DOCTYPE html>

<html>

<?php

    //PERSON
	$_Username1 = $_GET["username"];
	$_Password1 = md5($_GET["password"]);
	$_Username = "'".$_GET["username"]."'";
	$_Password = "'".md5($_GET["password"])."'";

	//logic
	$save = strlen($_Username);
	$save1 = strlen($_Password);

	//echo '<br>';
    //echo $_Username;
    

	//tiene que cumplir este if para que pueda continuar!

	if($save > 2 && $save1 > 2 && $save < 17 && $save1 < 100){

		//ingresar a la base de datos
		$c = oci_pconnect('progra1', 'progra1', 'DBTEC');
		
		//pregunta para saber el pass y usuario del que acabamos de guardar
		$sql1 = "SELECT USER_NAME, PASSWORD, ID_PERSON FROM SYSTEM_USER WHERE USER_NAME = ".$_Username." ";  

	    $stid = oci_parse($c, $sql1);
		
		oci_execute($stid);
		
		$row1 = oci_fetch_array($stid, OCI_BOTH);

		//pregunta para saber el pass y usuario del que acabamos de guardar
		$sql1 = "SELECT TYPE_NAME FROM PEOPLE_TYPE  WHERE ID_PERSON = ".$row1[2]." ";  

	    $stid = oci_parse($c, $sql1);
		
		oci_execute($stid);
		
		$row2 = oci_fetch_array($stid, OCI_BOTH);

		if($row1[0] == $_Username1 && $row1[1] == $_Password1 && $row2[0] == "ornithologist" || $row2[0] == "Amateur" ){
			session_start();
			
			$_SESSION["User"] = $_Username1;
			$_SESSION["Pass"] = $_Password1;
			
			echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=SECUNDARIO/Wall.php'>";
		
		}elseif($row1[0] == $_Username1 && $row1[1] == $_Password1 && $row2[0] == "Admin"){

			echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=SECUNDARIO\Administrador\TODA LA INFO\Material Dashboard by Creative Tim.php'>";

		}else{

			echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=Login Template.html'>";
		}




	}else{//en caso de nofuncionar lo regresa de vuelta a la pag

		echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=ERROR.html'>";

	}
?> 


</html>