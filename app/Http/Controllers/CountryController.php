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
		
		insert_country($to_insert);
		
		/*db::table('country')->insert(
			$to_insert
		);*/
		
		return response()->json([
			'success' => true,
			'message' => 'Country was succefully added'
		]);
   }
   
    function get_all_countries()
    {
		$countriesobj = new Country();
		$countries = $countriesobj->get_all();
		echo '<pre>';
		print_r(json_decode($countries,true));
			echo '</pre>';
		die;

		return view('country/add_country', $countries);
    }
}
