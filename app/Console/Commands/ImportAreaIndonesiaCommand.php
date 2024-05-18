<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportAreaIndonesiaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:obat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Obhat Alkes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        try {
            DB::unprepared(file_get_contents('database/migrations/obatalkes_m.sql'));
            $this->info("success import");
        } catch(\Execption $e) {
            var_dump($e->getMessage());
        }
    }
}
