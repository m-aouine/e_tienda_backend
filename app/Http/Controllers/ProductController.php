<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{


    public function mostrar()
    {

$user = Auth::user();
    $products= Product::all();
    return response()->json([
       'products' => $products,
       'user' => $user,

   ]);
}


public function cotizar(Request $request)
{
   
    $requestData = $request->all();

    $totalPrice = 0;
    foreach ($requestData['order']['items'] as $item) {
        $totalPrice += $item['totalPrice'];
    }

    return response()->json([
        'message' => 'Data received successfully',
        'data' => $requestData,
        'totalPrice' => $totalPrice,
    ]);
}



}


