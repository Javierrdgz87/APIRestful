<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoryTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //obtiene la lista de las transacciones por categoria
    public function index(Category $category)
    {
        $transactions = $category->products()
                        //whereHas nos sirve para ver que alguno de los productos tenga al menos una transaccion
                        ->whereHas('transactions')
                        ->with('transactions')
                        ->get()
                        ->pluck('transactions')
                        ->collapse();

        return $this->showAll($transactions);
    }
}
