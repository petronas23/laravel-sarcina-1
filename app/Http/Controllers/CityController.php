<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
   function form_add_city($id='')
   {
		$countriesobj = new Country();
		$data['countries'] = $countriesobj->get_all();
		
		if(isset($id)){
			$cityObj = new City();
			$data['city'] = $cityObj->get_city($id);
			
		}
		
		return view('city/add_city', $data);
   }
   
    function add_city(Request $request)
	{	
		$validator = Validator::make($request->all(), [
            'city' => 'required',
            'country_id' => 'required',
        ]);
		
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'errors' => response()->json($validator->errors(), 422)
			]);
        }		
		
		$to_insert = [
				'city' => $request->city,
				'id_country' => $request->country_id
		];
		
		$citiesObj = new City();
		$citiesObj->insert_city($to_insert);
		
		return response()->json([
			'success' => true,
			'message' => 'City was succefully added'
		]);
	}
	
	function edit_city(Request $request)
	{	
		
		$validator = Validator::make($request->all(), [
            'city' => 'required',
            'country' => 'required',
        ]);
		
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'errors' => response()->json($validator->errors(), 422)
			]);
        }		
		
		$to_update = [
				'city' => $request->city,
				'id_country' => $request->country
		];
		
		$cityObj = new City();
		$cityObj->update_city($to_update, $request->id_country);
		
		return response()->json([
			'success' => true,
			'message' => 'City was succefully edited'
		]);
	}
   
    function get_all_cities()
    {
		$citiesObj = new City();
		$data['cities'] = $citiesObj->get_all();
	
		return view('city/city', $data);
    }
	
	function delete_city(Request $request)
	{
		$cityObj = new City();
		$cityObj->delete_city($request->id);
		
		return response()->json([
			'success' => true,
			'message' => 'Country was succefully delited'
		]);
	}
}
