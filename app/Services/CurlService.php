<?php

namespace App\Services;

class CurlService
{
    /**
     * @param $url
     * @return mixed
     */
    function get($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 200);
        curl_setopt($curl, CURLOPT_TIMEOUT, 200);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }
}
