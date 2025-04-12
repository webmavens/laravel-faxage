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

- Sendfax Operation 

```php
$laravelFaxage = new \Webmavens\LaravelFaxage\LaravelFaxage();
$params = [
            'recipname'    => 'test',
            'faxno'        => 8884732963,
            'faxfilenames' => 'fax.HTML',
            'faxfiledata'  => '<h1>Hello World</h1>',
            'operation'    => 'sendfax',
        ];
$response = $laravelFaxage->sendFax($params);
```

Below parameters is required for sending fax.

```php
recipname = DESTINATION_NAME(32 characters max)
faxno = DESTINATION_NUMBER(10 digits, numeric only)
faxfilenames = FAX_FILE_NAME(Supported File Types: PDF, PS, DOC or DOCX, DOT, WPS, WPD, ODT, RTF, XLS or XLSX, PPT or PPTX, ODS, CSV, HTM, HTML, BMP, GIF, JPG, JPEG, TIF, TIFF, PNG, PCL, TXT)
faxfiledata = FAX_FILE_DATA(strings that are the contents/data of the file in faxfilenames)
operation = 'sendfax'
```

- Resend operation (This operation is used to ‘re-send’ a previously-completed fax)

```php
$laravelFaxage = new \Webmavens\LaravelFaxage\LaravelFaxage();
$params = [
            'recipname'    => 'test',
            'faxno'        => 8884732963,
            'faxfilenames' => 'fax.HTML',
            'faxfiledata'  => '<h1>Hello World</h1>',
            'operation'    => 'resend',
            'jobid'        => 1011792410,
        ];
$response = $laravelFaxage->sendFax($params);
```

Below parameters is required for resend fax.

```php
recipname = DESTINATION_NAME
faxno = DESTINATION_NUMBER
faxfilenames = FAX_FILE_NAME
faxfiledata = FAX_FILE_DATA
operation = 'resend'
jobid = FAX_JOB_ID
```

- Listfax Operation (This operation is used to gather a list of incoming faxes for your account. )

```php
$laravelFaxage = new \Webmavens\LaravelFaxage\LaravelFaxage();
$response = $laravelFaxage->listFax();
```

- Getfax Operation (Thisoperation is used to download a received fax image. Note that faxes will be returned as either PDF’s or TIFF’s, depending on the settings in the website under ‘Admin’ -> ‘Company Settings’ -> ‘Fax Format’. The default is PDF unless changed. )

```php
$laravelFaxage = new \Webmavens\LaravelFaxage\LaravelFaxage();
$faxId = FAX_ID(The numeric ID of the fax to get, retrieved from the listfax
operation (the recvid in listfax));
$response = $laravelFaxage->getFax($faxId);
```

- Notify Fax (This operation is used to mark an incoming fax as ‘handled’)

```php
$laravelFaxage = new \Webmavens\LaravelFaxage\LaravelFaxage();
$faxId = FAX_ID
$response = $laravelFaxage->notifyFaxage($faxId);
```

## Demo Video
Watch the demo video to learn how to use this package:

👉 [Click here to watch on YouTube](https://youtu.be/c2Zi_S-a65o)

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
