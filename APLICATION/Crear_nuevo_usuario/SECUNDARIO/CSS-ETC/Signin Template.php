<!DOCTYPE html>

<html>

<?php
	session_start();
	//USER AND PASS
	$_USER = md5($_GET["user"]);
	$_PASS = "'".md5($_GET["pass"])."'";

	//logic
    $save = strlen($_USER);
    $save1 = strlen($_PASS);


	//echo '<br>';
    //echo $_PASS;

	//tiene que cumplir este if para que pueda continuar!
	if( $save > 2 && $save1 > 2){

		//ingresar a la base de datos
		$c = oci_pconnect('progra1', 'progra1', 'DBTEC');

		$sql = "SELECT PASSWORD, ID_SYSTEM_USER FROM SYSTEM_USER WHERE USER_NAME ='".$_SESSION["User"]."'";

		$stid = oci_parse($c, $sql);

		oci_execute($stid);

		$row1 = oci_fetch_array($stid, OCI_BOTH);

		if($_USER == $row1[0]){


			echo "FUNCIONA";

			$sql = "BEGIN Update_System_User(".$row1[1].", '".$_SESSION["User"]."', ".$_PASS."); END;";

			$stid = oci_parse($c, $sql);

			oci_execute($stid);

			$sql = "BEGIN insert_Binnacle(".$row1[1].",TO_DATE(SYSDATE, 'YYYY/MM/DD HH:MI:SS'), '".$_USER."',".$_PASS."); END;";

			$stid = oci_parse($c, $sql);

			oci_execute($stid);
			
			echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=Personal.php'>";

			$_SESSION["Pass"] = $_PASS;
		}else{//en caso de nofuncionar lo regresa de vuelta a la pag

		echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=Signin Template.html'>";

	}

		

	}else{//en caso de nofuncionar lo regresa de vuelta a la pag

		echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=Signin Template.html'>";

	}
?>


</html>