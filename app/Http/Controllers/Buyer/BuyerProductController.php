<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        //trae los productos relacionados con los compradores a través de la colección de transacciones
        $products = $buyer->transactions()->with('product')
                    ->get()
                    ->pluck('product');
        return $this->showAll($products);
    }
}
