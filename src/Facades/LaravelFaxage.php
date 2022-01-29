<?php

namespace Webmavens\LaravelFaxage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Webmavens\LaravelFaxage\LaravelFaxage
 */
class LaravelFaxage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-faxage';
    }
}
