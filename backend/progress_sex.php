<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';
  $ipddetail = $_GET["ipddetail"];

 if($ipddetail == 'ipdall'){

  $sqlipd = "SELECT 
  round(COUNT(CASE WHEN SEX_M IS NOT NULL THEN 1 END)/(COUNT(CASE WHEN SEX_ALL IS NOT NULL THEN 1 END)/100)) as MM,
  round(COUNT(CASE WHEN SEX_F IS NOT NULL THEN 1 END)/(COUNT(CASE WHEN SEX_ALL IS NOT NULL THEN 1 END)/100)) as FF
  FROM(
  SELECT
  SEX,
    CASE when sex = 'M' THEN AN END AS SEX_M,
  CASE when sex = 'F' THEN AN END AS SEX_F,
  CASE when sex IN ('M','F') THEN AN END AS SEX_ALL
    FROM
      IPDTRANS
    INNER JOIN PATIENTS on IPDTRANS.HN = PATIENTS.HN
  
    WHERE
      IPDTRANS.DATEDISCH IS NULL
    AND TO_CHAR(
      IPDTRANS.DATEADMIT,
      'yyyy/mm/dd'
    )<= TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd'))X
  
  
  
  ";

 }else if($ipddetail == 'ipdnew'){

  $sqlipd = "SELECT 
  round(COUNT(CASE WHEN SEX_M IS NOT NULL THEN 1 END)/(COUNT(CASE WHEN SEX_ALL IS NOT NULL THEN 1 END)/100)) as MM,
  round(COUNT(CASE WHEN SEX_F IS NOT NULL THEN 1 END)/(COUNT(CASE WHEN SEX_ALL IS NOT NULL THEN 1 END)/100)) as FF
  FROM(
  SELECT
  SEX,
    CASE when sex = 'M' THEN AN END AS SEX_M,
  CASE when sex = 'F' THEN AN END AS SEX_F,
  CASE when sex IN ('M','F') THEN AN END AS SEX_ALL
    FROM
      IPDTRANS
    INNER JOIN PATIENTS on IPDTRANS.HN = PATIENTS.HN
  
    WHERE
     TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') = TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
  and IPDTRANS.DATEDISCH is null)X
  
  
  

  ";
}else if($ipddetail == 'ipdold'){

  $sqlipd = "SELECT 
  round(COUNT(CASE WHEN SEX_M IS NOT NULL THEN 1 END)/(COUNT(CASE WHEN SEX_ALL IS NOT NULL THEN 1 END)/100)) as MM,
  round(COUNT(CASE WHEN SEX_F IS NOT NULL THEN 1 END)/(COUNT(CASE WHEN SEX_ALL IS NOT NULL THEN 1 END)/100)) as FF
  FROM(
  SELECT
  SEX,
    CASE when sex = 'M' THEN AN END AS SEX_M,
  CASE when sex = 'F' THEN AN END AS SEX_F,
  CASE when sex IN ('M','F') THEN AN END AS SEX_ALL
    FROM
      IPDTRANS
    INNER JOIN PATIENTS on IPDTRANS.HN = PATIENTS.HN
  
    WHERE
   TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') < TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
  and IPDTRANS.DATEDISCH is null)X
  
  
  

  ";

 }else if($ipddetail == 'ipdout'){

  $sqlipd = "SELECT 
  round(COUNT(CASE WHEN SEX_M IS NOT NULL THEN 1 END)/(COUNT(CASE WHEN SEX_ALL IS NOT NULL THEN 1 END)/100)) as MM,
  round(COUNT(CASE WHEN SEX_F IS NOT NULL THEN 1 END)/(COUNT(CASE WHEN SEX_ALL IS NOT NULL THEN 1 END)/100)) as FF
  FROM(
  SELECT
  SEX,
    CASE when sex = 'M' THEN AN END AS SEX_M,
  CASE when sex = 'F' THEN AN END AS SEX_F,
  CASE when sex IN ('M','F') THEN AN END AS SEX_ALL
    FROM
      IPDTRANS
    INNER JOIN PATIENTS on IPDTRANS.HN = PATIENTS.HN
  
    WHERE
   TO_CHAR(IPDTRANS.DATEDISCH, 'yyyy/mm/dd') = TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd'))X
  
  
  

  ";

 }
 



$data=array();

$strSQL  = $sqlipd;
//and DISEASE_WAREHOUSE.HN = '".$hn."'

$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


	 $a['m']=$rs_pmk[0];
  $a['f']=intval($rs_pmk[1]);
 
	
	


	
	array_push($data,$a);

	
}	
	
// $data_array2 = array("data" => $data);

echo json_encode($data);



oci_close($objConnect);





?>
