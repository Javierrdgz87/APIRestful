<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $sellers = $buyer->transactions()->with('product.categories')
                    ->get()
                    ->pluck('product.categories')
                    //nos sirve para juntar toda  la lista de categorias en una sola lista
                    ->collapse()
                    ->unique('id')
                    ->values();
        //dd($sellers);

        return $this->showAll($sellers);
    }

}
