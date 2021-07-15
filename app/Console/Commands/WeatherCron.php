<?php

namespace App\Console\Commands;

use App\Models\WeatherReports;

use Illuminate\Console\Command;

class WeatherCron extends Command {
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
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle() {
		\Log::info("Cron is working fine!");
		// Query parameter get from the .ENV files
		$latitude  = env('LATITUDE');
		$longitude = env('LONGITUDE');
		$count     = env('CNT');
		$apiKey    = env('API_KEY');
		// API Call For Get data from api.openweathermap.org
		$response = \Http::get(env('BASEURL')."lat=$latitude&lon=$longitude&cnt=$count&appid=$apiKey");
		$response = json_encode($response->json());
		if (WeatherReports::exists()) {
			WeatherReports::truncate();
		}
		WeatherReports::create(['data' => $response]);
		$this->info('weather:cron Cummand Run successfully!');
		return 0;
	}
}
