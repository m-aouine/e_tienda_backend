<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{


    public function mostrar()
    {

    $products= Product::all();
    return response()->json([
       'products' => $products,
   ]);
}




    public function cotizar(Request $request)
     {
     return response()->json([
        'message' => 'Cotizando',
    ]);
}

}


