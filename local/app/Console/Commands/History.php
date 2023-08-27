<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\HistoryPoints;

class History extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'history:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data =[
            "user_id"=>1,
            "diemcu"=>"123",
            "diemconlai"=>123
        ];
        HistoryPoints::create($data);
    }
}
