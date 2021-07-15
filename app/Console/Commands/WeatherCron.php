<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\Models\WeatherReports;

class WeatherCron extends Command
{
    /**
     * The default header application
     * 
     * @var string 
     */
    const DEFAULT_ACCEPT_HEADER = 'application/json';
    /**
     * The default cache header application
     * 
     * @var string 
     */
    const DEFAULT_CACHE_HEADER = 'no-cache';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump the weather data from openweathermap api';

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
        \Log::info("Cron is working fine!");
        // API Call For Get data from api.openweathermap.org        
         $response =  \Http::get('https://api.openweathermap.org/data/2.5/weather?q=London&appid=78999c4e6a6e64a8796843cfdf61838c');         
         $response = json_encode($response->json());         
         WeatherReports::create(['data' => $response]);         
        $this->info('weather:cron Cummand Run successfully!');
        return 0;
    }
}
