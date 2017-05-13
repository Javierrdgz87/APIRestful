<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //$fillable -> atributos que pueden ser asignados de manera masiva
    protected $fillable = [
    	'name',
    	'description',
    ];

    public function products(){
    	return $this->belongsToMany(Product::class);
    }
}
