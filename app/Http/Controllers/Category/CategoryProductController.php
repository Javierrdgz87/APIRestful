<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoryProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    //Nos permite obtener la lista de todos los productos de una categoria dada
    public function index(Category $category)
    {
        $products = $category->products;

        return $this->showAll($products);
    }
}
