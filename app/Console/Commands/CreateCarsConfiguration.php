<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class CreateCarsConfiguration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car:configuration';

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
     * @return mixed
     */
    public function handle()
    {
        DB::table('cars_configuration')->truncate();
        DB::table('cars_configuration')->insert([
            [
                'config_name' => 'model',
                'config_desc' => "Car make name",
                'config_value' => json_encode(['Maruti Swift', 'Maruti Swift Dzire', 'Maruti Wagon R', 'Maruti Ertiga', 'Toyota Innova Crysta', 'Hyundai XCent'])
            ],[
                'config_name' => 'fuel',
                'config_desc' => "Fuel type",
                'config_value' => json_encode(['Petrol', 'Diesel', 'CNG', 'Electrical'])
            ],[
                'config_name' => 'vehicle_type',
                'config_desc' => "Whether vehicle is MUV, SUV for hatchback",
                'config_value' => json_encode(['SUV', 'Sedan', 'Hatchback', 'Micro'])
            ],[
                'config_name' => 'seater_type',
                'config_desc' => "How many pasaners can seat comfortably",
                'config_value' => json_encode(['2', '4', '6'])
            ]
        ]);
        $this->info('Car Configurations are generated successfully..');
    }
}
