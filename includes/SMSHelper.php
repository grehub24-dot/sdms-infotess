<?php
class SMSHelper {
    public function send($to, $message) {
        $api_key = '$2y$10$6oYYcjc6Ge3/W.P.1Yqk6eHBs0ERVFR6IaBQ2qpYGBnMYp28B3uPe';
        $username = 'amanvid'; // using sender ID as username per standard Wigal API docs
        $sender_id = 'INFOTESS'; // Must be an approved sender ID, falling back to INFOTESS
        $endpoint = 'https://frogapi.wigal.com.gh/api/v3/sms/send';

        $postData = array(
            'senderid' => $sender_id,
            'destinations' => array(
                array(
                    'destination' => $to,
                    'message' => $message,
                    'msgid' => uniqid('MSG'),
                    'smstype' => 'text'
                )
            )
        );

        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'API-KEY: ' . $api_key,
            'USERNAME: ' . $username
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        
        // Disable SSL verification for local WAMP if needed, but best left on in prod
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        // Optional: Still log it locally to track API responses
        $dir = __DIR__ . '/../sms_logs';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        $logEntry = "[" . date('Y-m-d H:i:s') . "] To: $to | Message: $message | API Response: $response | Curl Error: $error" . PHP_EOL;
        file_put_contents($dir . '/sms.log', $logEntry, FILE_APPEND);
        
        return $response ? true : false;
    }
}
?>