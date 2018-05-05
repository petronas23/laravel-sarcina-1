<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{	
	public function insert_country($to_insert)
	{
		DB::table($this->table)->insert(
			$to_insert;
		);
	}
}
