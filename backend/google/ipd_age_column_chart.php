<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';

 $ipddetail = $_GET["ipddetail"];
//  $ipddetail = "ipdall";
if($ipddetail == 'ipdall'){

  $sqlipd = "SELECT
  places.halfplace,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) < 5 THEN AN END) AS age_less_5,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 5 and 9 THEN AN END) AS age_5_9,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 10 and 14 THEN AN END) AS age_10_14,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 15 and 59 THEN AN END) AS age_15_59,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) >= 60 THEN AN END) AS age_more_60
    FROM
      IPDTRANS
  INNER JOIN PATIENTS on IPDTRANS.HN = PATIENTS.HN
  INNER JOIN PLACES on IPDTRANS.PLA_PLACECODE = PLACES.PLACECODE
  
    WHERE
  IPDTRANS.DATEDISCH IS NULL
    AND TO_CHAR (
      IPDTRANS.DATEADMIT,
      'yyyy/mm/dd'
    ) <= TO_CHAR (CURRENT_DATE, 'yyyy/mm/dd')
  GROUP BY places.halfplace
  ORDER BY count(an) desc
  
  
  
  ";
}else if($ipddetail == 'ipdnew'){

  $sqlipd = "SELECT
  places.halfplace,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) < 5 THEN AN END) AS age_less_5,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 5 and 9 THEN AN END) AS age_5_9,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 10 and 14 THEN AN END) AS age_10_14,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 15 and 59 THEN AN END) AS age_15_59,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) >= 60 THEN AN END) AS age_more_60
    FROM
      IPDTRANS
  INNER JOIN PATIENTS on IPDTRANS.HN = PATIENTS.HN
  INNER JOIN PLACES on IPDTRANS.PLA_PLACECODE = PLACES.PLACECODE
  
    WHERE
    TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') = TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
and IPDTRANS.DATEDISCH is null
  GROUP BY places.halfplace
  ORDER BY count(an) desc
  
  
  
  ";
}else if($ipddetail == 'ipdold'){

  $sqlipd = "SELECT
  places.halfplace,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) < 5 THEN AN END) AS age_less_5,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 5 and 9 THEN AN END) AS age_5_9,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 10 and 14 THEN AN END) AS age_10_14,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 15 and 59 THEN AN END) AS age_15_59,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) >= 60 THEN AN END) AS age_more_60
    FROM
      IPDTRANS
  INNER JOIN PATIENTS on IPDTRANS.HN = PATIENTS.HN
  INNER JOIN PLACES on IPDTRANS.PLA_PLACECODE = PLACES.PLACECODE
  
    WHERE
    TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') < TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
and IPDTRANS.DATEDISCH is null
  GROUP BY places.halfplace
  ORDER BY count(an) desc
  
  
  
  ";

 }else if($ipddetail == 'ipdout'){

  $sqlipd = "SELECT
  places.halfplace,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) < 5 THEN AN END) AS age_less_5,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 5 and 9 THEN AN END) AS age_5_9,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 10 and 14 THEN AN END) AS age_10_14,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) BETWEEN 15 and 59 THEN AN END) AS age_15_59,
  count(CASE when trunc(months_between(IPDTRANS.DATEADMIT ,PATIENTS.BIRTHDAY)/12) >= 60 THEN AN END) AS age_more_60
    FROM
      IPDTRANS
  INNER JOIN PATIENTS on IPDTRANS.HN = PATIENTS.HN
  INNER JOIN PLACES on IPDTRANS.PLA_PLACECODE = PLACES.PLACECODE
  
    WHERE
    TO_CHAR(IPDTRANS.DATEDISCH, 'yyyy/mm/dd') = TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
  GROUP BY places.halfplace
  ORDER BY count(an) desc
  
  
  
  ";

 }

$data=array();

$strSQL   = $sqlipd;


  
	
;


$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
 $data[] = array("ห้องตรวจ", "< 5 ปี", "5-9 ปี", "10-14 ปี", "15-59 ปี", "60 > ปี");
// $data[] = array("Year", "Austria", "Bulgaria", "Denmark", "Greece","thai");
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


  $data[] = array($rs_pmk[0],
  (int)$rs_pmk[1],
  (int)$rs_pmk[2],
  (int)$rs_pmk[3],
  (int)$rs_pmk[4],
  (int)$rs_pmk[5]);
	






	
	
}	
	

echo json_encode($data);


oci_close($objConnect);





?>
