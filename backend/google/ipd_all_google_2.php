<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';
// $opdno = $_GET["opdno"];




$data=array();

$strSQL  = "SELECT
PLACES.HALFPLACE,
  COUNT(*)AS ipdall
FROM
  IPDTRANS
INNER JOIN PLACES on IPDTRANS.PLA_PLACECODE = PLACES.PLACECODE
WHERE
  IPDTRANS.DATEDISCH IS NULL
AND TO_CHAR(
  IPDTRANS.DATEADMIT,
  'yyyy/mm/dd'
)<= TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
GROUP BY PLACES.HALFPLACE
ORDER BY 	COUNT(*) DESC


	
";


$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
$data[] = array('halfplace','ipdall');
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


  $data[] = array($rs_pmk[0],(int)$rs_pmk[1]);
	






	
	
}	
	

echo json_encode($data);


oci_close($objConnect);





?>
