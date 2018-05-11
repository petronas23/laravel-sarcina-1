<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class City extends Model
{

	protected $table = 'city';
	
	public function insert_city($to_insert)
	{
		DB::table($this->table)->insert(
			$to_insert
		);
	}
	
	public function get_all()
	{
		return DB::table($this->table)
            ->leftjoin('country', 'city.id_country', '=', 'country.id')
            ->select('city.*', 'country.country')
            ->get();
	}   
	
	public function get_city($id)
	{
		return DB::table($this->table)->where('id', '=', $id)->first();
	}
	
	public function update_city($to_update, $id)
	{
		DB::table($this->table)->where('id', $id)->update($to_update);
	}
	
	public function delete_city($id)
	{
		DB::table($this->table)->where('id', '=', $id)->delete();
	}
   
}