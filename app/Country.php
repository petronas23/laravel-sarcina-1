<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country extends Model
{	
	protected $table = 'country';
	
	public function insert_country($to_insert)
	{
		DB::table($this->table)->insert(
			$to_insert
		);
	}
	
	public function get_all()
	{
		return DB::table($this->table)->get();
	}
}
