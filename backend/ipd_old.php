<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';
// $opdno = $_GET["opdno"];




$data=array();

$strSQL  = "SELECT
count(*) ipdold
FROM
IPDTRANS
WHERE
TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') < TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
and IPDTRANS.DATEDISCH is null

";
//and DISEASE_WAREHOUSE.HN = '".$hn."'

$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


	$a['ipdold']=$rs_pmk[0];

	
	


	
	array_push($data,$a);
}	
	
// $data_array2 = array("data" => $data);

echo json_encode($data);

oci_close($objConnect);





?>
