<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';


$sqlipd = "SELECT
TO_CHAR(DATEADMIT, 'mm') as month_number ,
to_char( DATEADMIT, 'Month','NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI')as months,
	    COUNT(*)AS ipdall
FROM
	IPDTRANS
INNER JOIN PATIENTS ON IPDTRANS.HN = PATIENTS.HN
INNER JOIN PLACES ON IPDTRANS.PLA_PLACECODE = PLACES.PLACECODE
WHERE
	TO_CHAR(DATEADMIT, 'YYYY')= TO_CHAR(CURRENT_DATE, 'yyyy')
GROUP BY TO_CHAR(DATEADMIT, 'mm'),to_char( DATEADMIT, 'Month','NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI')
ORDER BY TO_CHAR(DATEADMIT, 'mm')  ";



$data=array();

$strSQL   = $sqlipd;


  
	



$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
$data[] = array('months','จำนวนคน');
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


  $data[] = array($rs_pmk[1],(int)$rs_pmk[2]);
	






	
	
}	
	

echo json_encode($data);


oci_close($objConnect);





?>
