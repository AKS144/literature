<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    public $table = 'equipments';

    public function profile(){
    	return $this->belongsTo(Profile::class);
    }
}
