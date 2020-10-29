<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';
// $ipddetail = "ipdall";
  $ipddetail = $_GET["ipddetail"];
 if($ipddetail == 'ipdall'){

  $sqlipd = "select  
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '24:00:00' and '01:00:00' then '1' end )  as time24,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '01:00:00' and '02:00:00' then '1' end )  as time1,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '02:00:00' and '03:00:00' then '1' end )  as time2,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '03:00:00' and '04:00:00' then '1' end )  as time3,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '04:00:00' and '05:00:00' then '1' end )  as time4,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '05:00:00' and '06:00:00' then '1' end )  as time5,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '06:00:00' and '07:00:00' then '1' end )  as time6,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '07:00:00' and '08:00:00' then '1' end )  as time7,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '08:00:00' and '09:00:00' then '1' end )  as time8,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '09:00:00' and '10:00:00' then '1' end )  as time9,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '10:00:00' and '11:00:00' then '1' end )  as time10,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '11:00:00' and '12:00:00' then '1' end )  as time11,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '12:00:00' and '13:00:00' then '1' end )  as time12,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '13:00:00' and '14:00:00' then '1' end )  as time13,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '14:00:00' and '15:00:00' then '1' end )  as time14,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '15:00:00' and '16:00:00' then '1' end )  as time15,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '16:00:00' and '17:00:00' then '1' end )  as time16,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '17:00:00' and '18:00:00' then '1' end )  as time17,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '18:00:00' and '19:00:00' then '1' end )  as time18,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '19:00:00' and '20:00:00' then '1' end )  as time19,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '20:00:00' and '21:00:00' then '1' end )  as time20,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '21:00:00' and '22:00:00' then '1' end )  as time21,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '22:00:00' and '23:00:00' then '1' end )  as time21,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '23:00:00' and '24:00:00' then '1' end )  as time23
  from IPDTRANS 
  where IPDTRANS.DATEDISCH is null
  and TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') <= TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
  
  ";

 }else if($ipddetail == 'ipdnew'){

  $sqlipd = "select  
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '24:00:00' and '01:00:00' then '1' end )  as time24,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '01:00:00' and '02:00:00' then '1' end )  as time1,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '02:00:00' and '03:00:00' then '1' end )  as time2,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '03:00:00' and '04:00:00' then '1' end )  as time3,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '04:00:00' and '05:00:00' then '1' end )  as time4,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '05:00:00' and '06:00:00' then '1' end )  as time5,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '06:00:00' and '07:00:00' then '1' end )  as time6,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '07:00:00' and '08:00:00' then '1' end )  as time7,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '08:00:00' and '09:00:00' then '1' end )  as time8,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '09:00:00' and '10:00:00' then '1' end )  as time9,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '10:00:00' and '11:00:00' then '1' end )  as time10,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '11:00:00' and '12:00:00' then '1' end )  as time11,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '12:00:00' and '13:00:00' then '1' end )  as time12,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '13:00:00' and '14:00:00' then '1' end )  as time13,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '14:00:00' and '15:00:00' then '1' end )  as time14,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '15:00:00' and '16:00:00' then '1' end )  as time15,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '16:00:00' and '17:00:00' then '1' end )  as time16,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '17:00:00' and '18:00:00' then '1' end )  as time17,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '18:00:00' and '19:00:00' then '1' end )  as time18,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '19:00:00' and '20:00:00' then '1' end )  as time19,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '20:00:00' and '21:00:00' then '1' end )  as time20,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '21:00:00' and '22:00:00' then '1' end )  as time21,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '22:00:00' and '23:00:00' then '1' end )  as time21,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '23:00:00' and '24:00:00' then '1' end )  as time23
  from IPDTRANS 
WHERE TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') = TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
and IPDTRANS.DATEDISCH is null


  ";
}else if($ipddetail == 'ipdold'){

  $sqlipd = " select  
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '24:00:00' and '01:00:00' then '1' end )  as time24,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '01:00:00' and '02:00:00' then '1' end )  as time1,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '02:00:00' and '03:00:00' then '1' end )  as time2,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '03:00:00' and '04:00:00' then '1' end )  as time3,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '04:00:00' and '05:00:00' then '1' end )  as time4,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '05:00:00' and '06:00:00' then '1' end )  as time5,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '06:00:00' and '07:00:00' then '1' end )  as time6,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '07:00:00' and '08:00:00' then '1' end )  as time7,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '08:00:00' and '09:00:00' then '1' end )  as time8,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '09:00:00' and '10:00:00' then '1' end )  as time9,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '10:00:00' and '11:00:00' then '1' end )  as time10,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '11:00:00' and '12:00:00' then '1' end )  as time11,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '12:00:00' and '13:00:00' then '1' end )  as time12,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '13:00:00' and '14:00:00' then '1' end )  as time13,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '14:00:00' and '15:00:00' then '1' end )  as time14,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '15:00:00' and '16:00:00' then '1' end )  as time15,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '16:00:00' and '17:00:00' then '1' end )  as time16,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '17:00:00' and '18:00:00' then '1' end )  as time17,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '18:00:00' and '19:00:00' then '1' end )  as time18,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '19:00:00' and '20:00:00' then '1' end )  as time19,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '20:00:00' and '21:00:00' then '1' end )  as time20,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '21:00:00' and '22:00:00' then '1' end )  as time21,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '22:00:00' and '23:00:00' then '1' end )  as time21,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '23:00:00' and '24:00:00' then '1' end )  as time23
  from IPDTRANS 
WHERE
TO_CHAR(IPDTRANS.DATEADMIT, 'yyyy/mm/dd') < TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')
and IPDTRANS.DATEDISCH is null


  ";

 }else if($ipddetail == 'ipdout'){

  $sqlipd = " select  
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '24:00:00' and '01:00:00' then '1' end )  as time24,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '01:00:00' and '02:00:00' then '1' end )  as time1,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '02:00:00' and '03:00:00' then '1' end )  as time2,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '03:00:00' and '04:00:00' then '1' end )  as time3,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '04:00:00' and '05:00:00' then '1' end )  as time4,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '05:00:00' and '06:00:00' then '1' end )  as time5,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '06:00:00' and '07:00:00' then '1' end )  as time6,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '07:00:00' and '08:00:00' then '1' end )  as time7,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '08:00:00' and '09:00:00' then '1' end )  as time8,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '09:00:00' and '10:00:00' then '1' end )  as time9,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '10:00:00' and '11:00:00' then '1' end )  as time10,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '11:00:00' and '12:00:00' then '1' end )  as time11,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '12:00:00' and '13:00:00' then '1' end )  as time12,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '13:00:00' and '14:00:00' then '1' end )  as time13,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '14:00:00' and '15:00:00' then '1' end )  as time14,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '15:00:00' and '16:00:00' then '1' end )  as time15,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '16:00:00' and '17:00:00' then '1' end )  as time16,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '17:00:00' and '18:00:00' then '1' end )  as time17,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '18:00:00' and '19:00:00' then '1' end )  as time18,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '19:00:00' and '20:00:00' then '1' end )  as time19,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '20:00:00' and '21:00:00' then '1' end )  as time20,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '21:00:00' and '22:00:00' then '1' end )  as time21,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '22:00:00' and '23:00:00' then '1' end )  as time21,
  count(case when TO_CHAR(IPDTRANS.TIMEADMIT, 'HH24:MI:SS') BETWEEN '23:00:00' and '24:00:00' then '1' end )  as time23
  from IPDTRANS 
WHERE
TO_CHAR(IPDTRANS.DATEDISCH, 'yyyy/mm/dd') = TO_CHAR(CURRENT_DATE, 'yyyy/mm/dd')

 

  ";

 }
 



$data=array();

$strSQL  = $sqlipd;
//and DISEASE_WAREHOUSE.HN = '".$hn."'

$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


   $a['time']=array((int)$rs_pmk[0],
                    (int)$rs_pmk[1],
                    (int)$rs_pmk[2],
                    (int)$rs_pmk[3],
                    (int)$rs_pmk[4],
                    (int)$rs_pmk[5],
                    (int)$rs_pmk[6],
                    (int)$rs_pmk[7],
                    (int)$rs_pmk[8],
                    (int)$rs_pmk[9],
                    (int)$rs_pmk[10],
                    (int)$rs_pmk[11],
                    (int)$rs_pmk[12],
                    (int)$rs_pmk[13],
                    (int)$rs_pmk[14],
                    (int)$rs_pmk[15],
                    (int)$rs_pmk[16],
                    (int)$rs_pmk[17],
                    (int)$rs_pmk[18],
                    (int)$rs_pmk[19],
                    (int)$rs_pmk[20],
                    (int)$rs_pmk[21],
                    (int)$rs_pmk[22],
                    (int)$rs_pmk[23]
                  );

 
	
	


	
	array_push($data,$a);

	
}	
	
// $data_array2 = array("data" => $data);

echo json_encode($data);



oci_close($objConnect);





?>
