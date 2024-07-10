<?php

namespace SmartDato\Brt\Commands;

use Illuminate\Console\Command;

class BrtCommand extends Command
{
    public $signature = 'brt';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
