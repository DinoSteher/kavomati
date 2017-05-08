<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kavomati extends Model
{
    protected $table = 'kavomati';
	public $timestamps = false;
	
	public function lokacija(){
		return $this->belongsTo('App\Models\Lokacije');
	}
}