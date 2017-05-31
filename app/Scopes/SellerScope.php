<?php

namespace App\Scopes;
/**
 * Global Scope
 * Es una consulta que se puede ejecutar de manera global cada vez que se le solicita una instancia a buyer
 */
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

//los Scopes deben impementar una interfaz llamada Scope
class SellerScope implements Scope{
	//Builder es el constructor de la consulta
	public function apply(Builder $builder, Model $model){
		$builder->has('products');
	}
}
