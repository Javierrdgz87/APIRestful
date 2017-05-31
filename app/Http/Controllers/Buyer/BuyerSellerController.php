<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerSellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        //obtiene lansacciones de un comprador y obtiene el vendedor de cada product
        $sellers = $buyer->transactions()->with('product.seller')
                    ->get()
                    //indica que debe ingresar a product y luego a seller
                    ->pluck('product.seller')
                    //los valores obtenidos sean unicos
                    ->unique('id')
                    //trae los valores que no sean vacíos
                    ->values();
        //dd($sellers);
        return $this->showAll($sellers);
    }
}
