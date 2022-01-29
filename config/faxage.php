<?php
// config for Webmavens/LaravelFaxage
return [
    'FAXAGE_USERNAME' => env('FAXAGE_USERNAME'),

    'FAXAGE_PASSWORD' => env('FAXAGE_PASSWORD'),

    'FAXAGE_COMPANY_ID' => env('FAXAGE_COMPANY_ID'),

    'FAXAGE_SENT_FAX_URL' => 'https://api.faxage.com/httpsfax.php',

    'FAXAGE_URL_NOTIFY' => env('FAXAGE_URL_NOTIFY'),

    'FAXAGE_TAG_NUMBER' => env('FAXAGE_TAG_NUMBER'),
];
