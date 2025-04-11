<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitialData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:initial-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $quantityContacts = 10;
        for ($i = 0; $i < $quantityContacts; $i++) {
            \App\Models\Contact::factory()->create();
        }
    }
}
