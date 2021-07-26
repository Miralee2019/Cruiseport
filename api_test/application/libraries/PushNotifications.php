<?php 
// Server file
class PushNotifications {
	// (Android)API access key from Google API's Console.
	// private static $API_ACCESS_KEY = 'AIzaSyDG3fYAj1uW7VB-wejaMJyJXiO5JagAsYI';
	private static $API_ACCESS_KEY = 'AIzaSyBETLsT43WlgW5yLYu4DSdHMCE6gfgQOPI';//'AIzaSyBhcxVMzHlXWIDyPSxH2XieYfQFYRH_JfA';
	// (iOS) Private key's passphrase.
	private static $passphrase = '';
	// (Windows Phone 8) The name of our push channel.
        private static $channelName = "joashp";
	
	// Change the above three vriables as per your app.
	public function __construct() {
		exit('Init function is not allowed');
	}
	
        // Sends Push notification for Android users
	public static function android($data, $reg_id) {
	        $url = 'https://android.googleapis.com/gcm/send';
	        // $message = array(
	        //     'title' => $data['mtitle'],
	        //     'message' => $data['mdesc'],
	        //     'subtitle' => '',
	        //     'tickerText' => '',
	        //     'msgcnt' => 1,
	        //     'vibrate' => 1
	        // );
	        $message = $data;
	        
	        $headers = array(
	        	'Authorization: key=' .self::$API_ACCESS_KEY,
	        	'Content-Type: application/json'
	        );
	
	        $fields = array(
	            'registration_ids' => array($reg_id),
	            'data' => $message,
	        );

	        // Open connection
		    $ch = curl_init();

		    // Set the url, number of POST vars, POST data
		    curl_setopt($ch, CURLOPT_URL, $url);

		    curl_setopt($ch, CURLOPT_POST, true);
		    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		    // Disabling SSL Certificate support temporarily
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

		    // Execute post
		    $result = curl_exec($ch);
		    if ($result === FALSE) {
		        die('Curl failed: ' . curl_error($ch));
		    }

		    // Close connection
		    curl_close($ch);
		    return $result;

			// $res = $this->useCurl($url, $headers, json_encode($fields));
	    	// return $this->useCurl($url, $headers, json_encode($fields));
	    	// return $res;
    	}

    	// Curl 
	private function useCurl(&$model, $url, $headers, $fields = null) {
		return "hello";
	        // Open connection
	        // $ch = curl_init();
	        // if ($url) {
	        //     // Set the url, number of POST vars, POST data
	        //     curl_setopt($ch, CURLOPT_URL, $url);
	        //     curl_setopt($ch, CURLOPT_POST, true);
	        //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	     
	        //     // Disabling SSL Certificate support temporarly
	        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        //     if ($fields) {
	        //         curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	        //     }
	     
	        //     // Execute post
	        //     $result = curl_exec($ch);
	        //     if ($result === FALSE) {
	        //         die('Curl failed: ' . curl_error($ch));
	        //     }
	     
	        //     // Close connection
	        //     curl_close($ch);
	
	        //     return $result;
        // }
    }

	
	// Sends Push's toast notification for Windows Phone 8 users
	public function WP($data, $uri) {
		$delay = 2;
		$msg =  "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
		        "<wp:Notification xmlns:wp=\"WPNotification\">" .
		            "<wp:Toast>" .
		                "<wp:Text1>".htmlspecialchars($data['mtitle'])."</wp:Text1>" .
		                "<wp:Text2>".htmlspecialchars($data['mdesc'])."</wp:Text2>" .
		            "</wp:Toast>" .
		        "</wp:Notification>";
		
		$sendedheaders =  array(
		    'Content-Type: text/xml',
		    'Accept: application/*',
		    'X-WindowsPhone-Target: toast',
		    "X-NotificationClass: $delay"
		);
		
		$response = $this->useCurl($uri, $sendedheaders, $msg);
		
		$result = array();
		foreach(explode("\n", $response) as $line) {
		    $tab = explode(":", $line, 2);
		    if (count($tab) == 2)
		        $result[$tab[0]] = trim($tab[1]);
		}
		
		return $result;
	}
	
        // Sends Push notification for iOS users
	 // Sends Push notification for iOS users
    public static function iOS($message, $deviceToken ,$notice_type) {
        $badge = "1";
        $sound = "chime";
        $notification_type = $notice_type;
        $json_details = $message;
        $body = array();
        $body['aps'] = array('alert' => $message);
        if ($badge)
            $body['aps']['badge'] = $badge;
        if ($sound)
            $body['aps']['sound'] = $sound;

        if ($notification_type)
            $body['aps']['notification_type'] = $notification_type;

        if ($json_details)
            $body['aps']['json_details'] = $json_details;

        /* End of Configurable Items */

        $apnsHost = 'gateway.sandbox.push.apple.com'; //// for testing
//$apnsHost = 'gateway.push.apple.com'; //// for live
        $apnsPort = 2195;
//$apnsCert = 'dev_APNs_certificates.pem';


        $apnsCert = 'Certificates.pem';
//$apnsCert = 'Apns_new_dev_Certificates.pem';
        $passphrase = '';

        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', $apnsCert);
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
        $fp = stream_socket_client('ssl://' . $apnsHost . ':' . $apnsPort, $error, $errorString, 60, STREAM_CLIENT_CONNECT, $ctx);

        if (!$fp) {
            print "Failed to connect $errorString \n";
            return;
        } else {
            //  print "Connection OK";
        }
        $payload = json_encode($body);

// request one
        $msg = chr(0) . pack("n", 32) . pack('H*', $deviceToken) . pack("n", strlen($payload)) . $payload;
//print "sending message :" . $payload . "\n";
        $payload;

        fwrite($fp, $msg);

        fclose($fp);
        return $msg;
    }
	
    
}
?>