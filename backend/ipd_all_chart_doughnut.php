<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';
 $ipddetail = $_GET["ipddetail"];
 if($ipddetail == 'ipdall'){

  $sqlipd = "SELECT
  DEGREE_OF_IPD_PT_TYPE.NAME,
    COUNT(*)AS ipdall
  FROM
    IPDTRANS
  INNER JOIN DEGREE_OF_IPD_PT_TYPE on IPDTRANS.DEGREE_OF_PATIENT_CODE = DEGREE_OF_IPD_PT_TYPE.CODE
  WHERE
    IPDTRANS.DATEDISCH IS NULL
  AND TO_CHAR(
    IPDTRANS.DATEADMIT,
    'yyyy/mm/dd'
  )<= TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
  GROUP BY   DEGREE_OF_IPD_PT_TYPE.NAME
  ORDER BY 	COUNT(*) DESC
  ";

 }else if($ipddetail == 'ipdnew'){

  $sqlipd = "SELECT
  DEGREE_OF_IPD_PT_TYPE.NAME,
    COUNT(*)AS ipdall
FROM
IPDTRANS
  INNER JOIN DEGREE_OF_IPD_PT_TYPE on IPDTRANS.DEGREE_OF_PATIENT_CODE = DEGREE_OF_IPD_PT_TYPE.CODE
WHERE
TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') = TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
and IPDTRANS.DATEDISCH is null
 GROUP BY  DEGREE_OF_IPD_PT_TYPE.NAME
  ORDER BY 	COUNT(*) DESC

  ";
}else if($ipddetail == 'ipdold'){

  $sqlipd = "SELECT
  DEGREE_OF_IPD_PT_TYPE.NAME,
    COUNT(*)AS ipdall
FROM
IPDTRANS
  INNER JOIN DEGREE_OF_IPD_PT_TYPE on IPDTRANS.DEGREE_OF_PATIENT_CODE = DEGREE_OF_IPD_PT_TYPE.CODE
WHERE
TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') < TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
and IPDTRANS.DATEDISCH is null
GROUP BY   DEGREE_OF_IPD_PT_TYPE.NAME
  ORDER BY 	COUNT(*) DESC

  ";

 }else if($ipddetail == 'ipdout'){

  $sqlipd = "SELECT
  DEGREE_OF_IPD_PT_TYPE.NAME,
     COUNT(*)AS ipdall
 FROM
 IPDTRANS
  INNER JOIN DEGREE_OF_IPD_PT_TYPE on IPDTRANS.DEGREE_OF_PATIENT_CODE = DEGREE_OF_IPD_PT_TYPE.CODE
 WHERE
 TO_CHAR(IPDTRANS.DATEDISCH, 'yyyy/mm/dd') = TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
 GROUP BY   DEGREE_OF_IPD_PT_TYPE.NAME
   ORDER BY 	COUNT(*) DESC

  ";

 }
 



$data=array();

$strSQL  = $sqlipd;
//and DISEASE_WAREHOUSE.HN = '".$hn."'

$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


	 $a['halfplace']=$rs_pmk[0];
  $a['ipdall']=intval($rs_pmk[1]);
 
	
	


	
	array_push($data,$a);

	
}	
	
// $data_array2 = array("data" => $data);

echo json_encode($data);



oci_close($objConnect);





?>
