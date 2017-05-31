<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SellerTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
                        //obtenemos todos los productos de un vendedor
        $transactions = $seller->products()
                        //obtenemos todos los productos que tienen al menos una transacción
                        ->whereHas('transactions')
                        //iggerloadin productos unicamente con tales transacciones
                        ->with('transactions')
                        ->get()
                        ->pluck('transactions')
                        ->collapse();

        return $this->showAll($transactions);
    }
}
