<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
 
trait ApiResponser{
	//muestra el mensaje obtenido
	private function successResponse($data, $code){
		return response()->json($data, $code);
	}

	protected function errorResponse($message, $code){
		return response()->json(['error' => $message, 'code' => $code], $code);
	}

	//muestra todos los registros existentes
	protected function showAll(Collection $collection, $code = 200){
		return $this->successResponse(['data' => $collection], $code);
	}

	//muestra un registro existente
	protected function showOne(Model $instance, $code = 200){
		return $this->successResponse(['data' => $instance], $code);
	}

	protected function showMessage($message, $code = 200){
		return $this->successResponse(['data' => $message], $code);
	}
}