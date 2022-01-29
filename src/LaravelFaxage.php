<?php

namespace Webmavens\LaravelFaxage;

use Webmavens\LaravelFaxage\Config\FaxageCredentialsConfig;
use Webmavens\LaravelFaxage\Services\GuzzleRequestService;

class LaravelFaxage
{
    public static function sendFax($params){
        if (count($params) > 0) {
            $configuration = FaxageCredentialsConfig::getCredential();
            //check required parameters
            $errors = '';
            if(!isset($params['recipname']) && $params['recipname'] == ''){
                $errors .= "recipname";
            }
            if(!isset($params['faxno']) || $params['faxno'] == ''){
                $errors .= ", faxno";
            }
            if(!isset($params['faxfilenames']) || $params['faxfilenames'] == ''){
                $errors .= ", faxfilenames";
            }
            if(!isset($params['faxfiledata']) || $params['faxfiledata'] == ''){
                $errors .= ", faxfiledata";
            }
            if(!isset($params['operation']) || $params['operation'] == ''){
                $errors .= ", operation";
            }
            if(!isset($configuration['username']) || $configuration['username'] == ''){
                $errors .= ", username";
            }
            if(!isset($configuration['company']) || $configuration['company'] == ''){
                $errors .= ", company";
            }
            if(!isset($configuration['password']) || $configuration['password'] == ''){
                $errors .= ", password";
            }
            if(!isset($configuration['url_notify']) || $configuration['url_notify'] == ''){
                $errors .= ", url_notify";
            }
            if(!isset($configuration['tagnumber']) || $configuration['tagnumber'] == ''){
                $errors .= ", tagnumber";
            }
            if(isset($params['operation']) && $params['operation'] == 'resend' && (!isset($params['jobid']) || $params['jobid'] == 0 || $params['jobid'] == '')){
                $errors .= ", jobid";
            }
            if ($errors == '') {
                $faxage = array();
                $faxage['username'] = $configuration['username'];
                $faxage['company'] = $configuration['company'];
                $faxage['password'] = $configuration['password'];
                $faxage['url_notify'] = $configuration['url_notify'];
                $faxage['tagnumber'] = $configuration['tagnumber'];
                $faxage['recipname'] = $params['recipname'];
                $faxage['faxno'] = $params['faxno'];
                $faxage['faxfilenames'] = array($params['faxfilenames']);
                $faxage['faxfiledata'] = array(base64_encode($params['faxfiledata']));
                $faxage['operation'] = $params['operation'];
                if($params['operation'] == 'resend'){
                    $faxage['jobid'] = $params['jobid'];
                }
                $url = $configuration['fax_sent_url'];

                $guzzleRequest = new GuzzleRequestService();
                $response = $guzzleRequest->guzzleRequest($url,[], 'POST', $faxage);
                if(isset($response['contents'])){
                    $response = $response['contents'];
                }
                return $response;
            } else {
                return 'Missing details - '.$errors;
            }
        } else {
            return 'Required parameters are missing';
        }
    }

    public static function listFax(){
        $configuration = FaxageCredentialsConfig::getCredential();
        $errors = '';
        if(!isset($configuration['username']) || $configuration['username'] == ''){
            $errors .= ", username";
        }
        if(!isset($configuration['company']) || $configuration['company'] == ''){
            $errors .= ", company";
        }
        if(!isset($configuration['password']) || $configuration['password'] == ''){
            $errors .= ", password";
        }
        if ($errors == '') {
            $faxage = array();
            $faxage['username'] = $configuration['username'];
            $faxage['company'] = $configuration['company'];
            $faxage['password'] = $configuration['password'];
            $faxage['operation'] = 'listfax';
            $faxage['unhandled'] = 1;

            $url = $configuration['fax_sent_url'];
            $guzzleRequest = new GuzzleRequestService();
            $response = $guzzleRequest->guzzleRequest($url,[], 'POST', $faxage);
            if(isset($response['contents'])){
                $response = $response['contents'];
            }
            return $response;
        } else {
            return 'Missing details - '.$errors;
        }
    }

    public static function getFax($faxId){
        $configuration = FaxageCredentialsConfig::getCredential();
        $errors = '';
        if(!isset($configuration['username']) || $configuration['username'] == ''){
            $errors .= ", username";
        }
        if(!isset($configuration['company']) || $configuration['company'] == ''){
            $errors .= ", company";
        }
        if(!isset($configuration['password']) || $configuration['password'] == ''){
            $errors .= ", password";
        }
        if($faxId == ''){
            $errors .= ", faxid";
        }
        if ($errors == '') {
            $faxage = array();
            $faxage['username'] = $configuration['username'];
            $faxage['company'] = $configuration['company'];
            $faxage['password'] = $configuration['password'];
            $faxage['operation'] = 'getfax';
            $faxage['faxid'] = $faxId;
            $faxage['resolution'] = 1;

            $url = $configuration['fax_sent_url'];
            $guzzleRequest = new GuzzleRequestService();
            $response = $guzzleRequest->guzzleRequest($url,[], 'POST', $faxage);
            if(isset($response['contents'])){
                $response = $response['contents'];
            }
            return $response;
        } else {
            return 'Missing details - '.$errors;
        }
    }

    public static function notifyFaxage($faxId)
    {
        $configuration = FaxageCredentialsConfig::getCredential();
        $errors = '';
        if(!isset($configuration['username']) || $configuration['username'] == ''){
            $errors .= ", username";
        }
        if(!isset($configuration['company']) || $configuration['company'] == ''){
            $errors .= ", company";
        }
        if(!isset($configuration['password']) || $configuration['password'] == ''){
            $errors .= ", password";
        }
        if($faxId == ''){
            $errors .= ", faxid";
        }
        if ($errors == '') {
            $faxage = array();
            $faxage['username'] = $configuration['username'];
            $faxage['company'] = $configuration['company'];
            $faxage['password'] = $configuration['password'];
            $faxage['operation'] = 'handled';
            $faxage['recvid'] = $faxId;
            $faxage['handled'] = 1;

            $url = $configuration['fax_sent_url'];
            $guzzleRequest = new GuzzleRequestService();
            $response = $guzzleRequest->guzzleRequest($url,[], 'POST', $faxage);
            if(isset($response['contents'])){
                $response = $response['contents'];
            }
            return $response;
        } else {
            return 'Missing details - '.$errors;
        }
    }
}
