<?php

namespace Webmavens\LaravelFaxage\Commands;

use Illuminate\Console\Command;

class LaravelFaxageCommand extends Command
{
    public $signature = 'laravel-faxage';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
