<?php

namespace Brantwladichuk\Sparkify\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class SendSpark implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $postFields;

    public function __construct($postFields)
    {
        $this->postFields = $postFields;
    }

    public function handle()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.sparkpost.com/api/v1/transmissions",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($this->postFields),
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: " . config('sparkify.sparkpost_api_key'),
                "cache-control: no-cache",
                "content-type: application/json"
            ]
        ]);

        curl_exec($curl);

        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            Log::error("cURL Error: " . $error);
        }
    }
}
