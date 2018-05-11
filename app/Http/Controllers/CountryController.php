<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Country;
class CountryController extends Controller
{
	
   function form_add_country($id='')
   {
		$data=[];
		if(isset($id)){
			$countryObj = new Country();
			$data['country'] = $countryObj->get_country($id);
			
		}
	  
	  return view('country/add_country', $data);
   }
   
   
   function add_country(Request $request)
   {	
		$validator = Validator::make($request->all(), [
            'country_name' => 'required',
            'country_cod' => 'required',
        ]);
		
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'errors' => response()->json($validator->errors(), 422)
			]);
        }		
		
		$to_insert = [
				'country' => $request->country_name,
				'cod' => $request->country_cod
		];
		
		$countriesobj = new Country();
		$countriesobj->insert_country($to_insert);
		
		return response()->json([
			'success' => true,
			'message' => 'Country was succefully added'
		]);
	}
   
   function edit_country(Request $request)
   {	
		$validator = Validator::make($request->all(), [
            'country_name' => 'required',
            'country_cod' => 'required',
        ]);
		
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'errors' => response()->json($validator->errors(), 422)
			]);
        }		
		
		$to_update = [
				'country' => $request->country_name,
				'cod' => $request->country_cod
		];
		
		$countriesobj = new Country();
		$countriesobj->update_country($to_update, $request->id_country);
		
		return response()->json([
			'success' => true,
			'message' => 'Country was succefully edited'
		]);
	}
   
    function get_all_countries()
    {
		$countriesobj = new Country();
		$data['countries'] = $countriesobj->get_all();
		
		return view('country/country', $data);
    }
	
	function delete_country(Request $request)
	{
		$countryObj = new Country();
		$countryObj->delete_country($request->id);
		
		return response()->json([
			'success' => true,
			'message' => 'Country was succefully delited'
		]);
	}
}
