<?php

namespace Webmavens\LaravelFaxage\Config;

Class FaxageCredentialsConfig
{
    public static function getCredential(){
        $config = array();
        $config['username'] = config('faxage.FAXAGE_USERNAME');
        $config['company'] = config('faxage.FAXAGE_COMPANY_ID');
        $config['password'] = config('faxage.FAXAGE_PASSWORD');
        $config['fax_sent_url'] = config('faxage.FAXAGE_SENT_FAX_URL');
        $config['url_notify'] = config('faxage.FAXAGE_URL_NOTIFY');
        $config['tagnumber'] = config('faxage.FAXAGE_TAG_NUMBER');

        return $config;
    }
}