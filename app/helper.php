<?php

if (! function_exists('test')) {
    function test() {
        $data = [
            'key' => env('VONAGE_KEY', '20fb412f'),
            'secret' => env('VONAGE_SECRET', 'BXQ1IWzxb9tXg15L'),
        ];
        return $data;
    }
}

if(! function_exists('smsSend')){
    function smsSend($number,$app,$message) {
        
        $basic  = new \Vonage\Client\Credentials\Basic("20fb412f", "BXQ1IWzxb9tXg15L");
        $client = new \Vonage\Client($basic);

     
        // dd($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("8801521471117",'onlinestore', 'A text message sent using the Nexmo SMS API')
        );

        return true;
}
}
?>
