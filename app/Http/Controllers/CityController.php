<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
   function form_add_city()
   {
	  return view('city/add_city');
   }
}
