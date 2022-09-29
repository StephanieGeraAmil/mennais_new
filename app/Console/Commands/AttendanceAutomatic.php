<?php

namespace App\Console\Commands;

use App\Models\Inscription;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AttendanceAutomatic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:attendance';

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
        $inscription_list = Inscription::all();        
        $date = Carbon::now();
        $seeder = [];
        foreach ($inscription_list as $inscription) {
            $has_28 = false;
            $has_29 = false;
            foreach($inscription->attendances as $attendance){
                if($attendance->date == '2022-09-28'){
                    $has_28 = true;
                }
                if($attendance->date == '2022-09-29'){
                    $has_29 = true;
                }
            }
            if(!$has_28){
                $seed_data = [                        
                            'inscription_id'=>$inscription->id,
                            'date'=>'2022-09-28',
                            'user_id'=>'1',
                            'created_at' => $date
                ];
                array_push($seeder,$seed_data);
            }
            if(!$has_29){
                $seed_data = [                        
                            'inscription_id'=>$inscription->id,
                            'date'=>'2022-09-29',
                            'user_id'=>'1',
                            'created_at' => $date
                ];
                array_push($seeder,$seed_data);
            }
        }
        Log::debug($seeder);
        DB::table('attendances')->insert($seeder);
    }
}
