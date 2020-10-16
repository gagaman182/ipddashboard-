<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';
// $opdno = $_GET["opdno"];




$data=array();

$strSQL  = "select count(*) as ipdall from IPDTRANS where 
IPDTRANS.DATEDISCH is null
and TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') <= TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')






	

	
";
//and DISEASE_WAREHOUSE.HN = '".$hn."'

$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


	$a['ipdall']=$rs_pmk[0];

	
	


	
	array_push($data,$a);
}	
	
// $data_array2 = array("data" => $data);

echo json_encode($data);

oci_close($objConnect);





?>
