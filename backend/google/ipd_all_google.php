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
$rows = array();
  $table = array();
  $table['cols'] = array(

    array('label' => 'Weekly Task', 'type' => 'string'),
    array('label' => 'Percentage', 'type' => 'number')

);

$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);

while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){



	$temp = array();

	// The following line will be used to slice the Pie chart

	$temp[] = array('v' => (string) $rs_pmk[0]); 

	// Values of the each slice

	$temp[] = array('v' => (int) $rs_pmk[1]); 
	$rows[] = array('c' => $temp);
	
	
}	
	


$table['rows'] = $rows;

// convert data into JSON format
$jsonTable = json_encode($table);
echo $jsonTable;

oci_close($objConnect);





?>
