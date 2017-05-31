<?php

namespace App\Http\Controllers\Product;

use App\User;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductBuyerTransactionController extends ApiController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product, User $buyer)
    {
        $rules = [
            'quantity' => 'required|integer|min:1'
        ];

        $this->validate($request, $rules);

        //verificamos que el comprador sea diferente del vendedor
        if ($buyer->id == $product->seller_id) {
            return $this->errorRespose('El comprador debe ser diferente al vendedor', 409);
        }
        //verificamos que el comprador este registrado
        if (!$buyer->esVerificado()) {
            return $this->errorResponse('El comprador debe ser un usuario verificado', 409);
        }
        //verificamos que el vendedor este registrado
        if (!$product->seller->esVerificado) {
            return $this->errorResponse('El vendedor debe ser un usuario verificado', 409);
        }
        //verificamos que el producto este disponible
        if (!$product->estaDisponible()) {
            return $this->errorResponse('El producto para esta transacción no está disponible', 409);
        }
        //verificamos que haya la cantidad necesaria del producto solicitado
        if ($product->quantity < $request->quantity) {
            return $this->errorResponse('El producto no tiene la cantidad disponible requerida para esta transacción', 409);
        }

        //transacciones de la BD
        return DB::transaction(function() use($request, $product, $buyer){
            $product->quantity == $request->quantity;
            $product->save();

            $transaction = Transaction::create([
                'quantity' => $request->quantity,
                'buyer_id' => $buyer->id,
                'product_id' => $product->id,
            ]);

            return $this->showOne($transaction, 201);

        });
    }


}
