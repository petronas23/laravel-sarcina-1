<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse; // ??
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Country;
class CountryController extends Controller
{
	
   function form_add_country()
   {
	  return view('country/add_country');
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
				'denumire' => $request->country_name,
				'cod' => $request->country_cod
		];
		
		$countriesobj = new Country();
		$countriesobj->insert_country($to_insert);
		
		return response()->json([
			'success' => true,
			'message' => 'Country was succefully added'
		]);
   }
   
    function get_all_countries()
    {
		$countriesobj = new Country();
		$data['countries'] = $countriesobj->get_all();
		
		return view('country/country', $data);
    }
}
