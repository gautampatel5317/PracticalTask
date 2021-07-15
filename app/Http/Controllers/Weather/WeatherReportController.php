<?php
namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use App\Models\WeatherReports;
use Illuminate\Http\Request;

class WeatherReportController extends Controller 
{
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display Weather report from the https://openweathermap.org/api
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() 
	{
		$weatherReport = WeatherReports::first();
		$weatherData   = !empty($weatherReport['data'])?json_decode($weatherReport['data'], true):[];
		$weatherData   = ($weatherData['cod'] == 200)?$weatherData['list']:[];
		return view('dashboard')->with(['weatherData' => $weatherData]);
	}

	/**
	 * The filter by the date time to get weather data
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function filterByTime(Request $request) 
	{
		header("Access-Control-Allow-Origin: *");
		$time        = strtotime($request->time);
		$data        = WeatherReports::first();
		$jsonDecode  = json_decode($data['data'], true);
		$weatherData = ['message'            => $jsonDecode['message'], 'cod'            => $jsonDecode['cod'], 'count'            => $jsonDecode['count']];
		foreach ($jsonDecode['list'] as $key => $value) {
			if ($value['dt'] == $time) {
				$weatherData['list'][] = $value;
			}
		}
		$weatherData = isset($weatherData['list'])?$weatherData['list']:[];
		$returnHTML  = view('tabledata')
			->with(['weatherData' => $weatherData])
			->render();
		return response()->json($returnHTML);
	}
}
