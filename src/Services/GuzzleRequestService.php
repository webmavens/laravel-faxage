<?php

namespace Webmavens\LaravelFaxage\Services;

use Illuminate\Support\Facades\Http;
use Throwable;

Class GuzzleRequestService
{
    public function guzzleRequest($url = '', $header = array(), $method = 'POST', $data = array())
    {
        $contents = array();
        try{
            if($method == 'POST'){
                $response = Http::asForm()->post($url, $data);
                $contents['code'] = $response->getStatusCode();
                $contents['contents'] = $response->getBody()->getContents();
                $contents['body'] = $response->getBody();
            }
        } catch (Throwable $e){
            report($e);
            $contents['error'] = $e;
        }
        return $contents;
    }
}