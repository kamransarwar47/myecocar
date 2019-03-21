<?php
function sendMessage($message, array $telephones, $senderName){
	if (count($telephones) > 0 && strlen($message) > 0){
		require_once('/home/myecocar/sms/OvhApi.php');
		$ovh = new OvhApi(); 
		
		$account = "sms-sm206642-1";
		$smsAccount = '/sms/'.$account;
		
		$smsJobs = $ovh->get($smsAccount);
		
		if ($smsJobs["creditsLeft"] > 0){
			$content = (object) array(
				"charset"=> "UTF-8",
				"class"=> "phoneDisplay",
				"coding"=> "7bit",
				"message"=> $message,
				"noStopClause"=> true,
				"priority"=> "high",
				"receivers"=> $telephones,
				"sender" => $senderName,
				"senderForResponse"=> true,
				"validityPeriod"=> 2880
				);
			
			$result = $ovh->post($smsAccount.'/jobs', $content); // appel sur le compte SMS
		}else $result["error"] = "QUOTA";
	}else $result["error"] = "DATAS";
	
	return $result;
}

function getCodeSMS($dec){
    if( $dec < 0){ $dec = abs($dec); }
	$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
       
    do{
        $h = $chars[($dec%36)] . $h;
        $dec /= 36;
    } while( $dec >= 1 );
   
    return $h;
}
?>