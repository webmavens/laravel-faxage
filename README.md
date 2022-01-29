# Performs action on fax using faxage api
## Send HIPAA Compliant Fax Service by FAXAGE

## What It Does

This package allows you to send/resend/list/get and notify faxes through faxage with laravel.

## Installation

You can install the package via composer:

```bash
composer require webmavens/laravel-faxage
```

## Usage

- Please add below parameters to your .env file.

```php
FAXAGE_USERNAME=YOUR_FAXAGE_USERNAME
FAXAGE_PASSWORD=YOUR_FAXAGE_PASSOWRD
FAXAGE_COMPANY_ID=YOUR_COMPANY_ID
FAXAGE_FAXNO=YOUR_FAXNO
FAXAGE_URL_NOTIFY=CALLBACK_URL
FAXAGE_TAG_NUMBER=YOUR_TAG_NUMBER (EX. 1.123.123.1234)
```

- Send Fax

```php
$laravelFaxage = new Webmavens\LaravelFaxage();
$response = $laravelFaxage->sendFax($params);
```

Below parameters is required for sending fax.

```php
recipname = DESTINATION_NAME
faxno = DESTINATION_NUMBER
faxfilenames = FAX_FILE_NAME
faxfiledata = FAX_FILE_DATA
opration = 'sendfax'
```

- Resend Fax

```php
$laravelFaxage = new Webmavens\LaravelFaxage();
$response = $laravelFaxage->sendFax($params);
```

Below parameters is required for resend fax.

```php
recipname = DESTINATION_NAME
faxno = DESTINATION_NUMBER
faxfilenames = FAX_FILE_NAME
faxfiledata = FAX_FILE_DATA
opration = 'resend'
jobid = FAX_JOB_ID
```

- List Fax

```php
$laravelFaxage = new Webmavens\LaravelFaxage();
$response = $laravelFaxage->listFax();
```

- Get Fax

```php
$laravelFaxage = new Webmavens\LaravelFaxage();
$faxId = FAX_ID
$response = $laravelFaxage->getFax($faxId);
```

- Notify Fax

```php
$laravelFaxage = new Webmavens\LaravelFaxage();
$faxId = FAX_ID
$response = $laravelFaxage->notifyFaxage($faxId);
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [webmavnes](https://github.com/webmavens)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
