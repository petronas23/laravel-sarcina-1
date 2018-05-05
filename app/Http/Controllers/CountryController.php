<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse; // ??
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Country;
class CountryController extends Controller
{
	
   function form_add_country()
   {
	  return view('country/add_country');
   }
   
   
   function add_country(Request $request)
   {		
		/*$v = $this->validate($request, [
        'country_name' => 'required',
        'country_cod' => 'required',
		]);*/
			
		$validator = Validator::make($request->all(), [
            'country_name' => 'required',
            'country_cod' => 'required',
        ]);
		$errors = (new ValidationException($validator))->errors();

		throw new HttpResponseException(response()->json([
			'success' => false,
			'errors' => $errors,
		], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));


        /*if ($validator->passes()) {

			return response()->json(['success'=>'Added new records.']);
        }

    	return response()->json(['error'=>$validator->errors()->all()]);*/
	
		$to_insert = [
				'denumire' => $request->country_name,
				'cod' => $request->country_cod
		];
		
		db::table('country')->insert(
			$to_insert
		);
   }
}
