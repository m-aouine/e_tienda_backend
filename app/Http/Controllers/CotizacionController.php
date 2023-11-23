<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cotizacion;



class CotizacionController extends Controller
{


    public function save(Request $request)
    {
        $requestData = $request->all();
    
     
        $items = !empty($requestData['order']['items']) ? $requestData['order']['items'] : [];
    
    
        $totalPrice = 0;
        $user =  $requestData['order']['user'];

        $user_id= $requestData['order']['user']['id'];
        $user_name= $requestData['order']['user']['name'];
        $user_email= $requestData['order']['user']['email'];
    
       
        foreach ($items as $item) {
            $totalPrice += isset($item['totalPrice']) ? $item['totalPrice'] : 0;
        }
    
     
        if (!empty($items)) {
           Cotizacion::create([
                'total_price' => $totalPrice,
                'user_id' => $user_id,
                'user_name' => $user_name,
                'user_email' =>$user_email,
              
            ]);


          return response()->json([
            'message' =>  'New  entry  added successfully',
            "user_id"=>$user_id,
            "user_name"=>$user_name,
            "user_email"=> $user_email,
          
        ]);
         

        }
    
        return response()->json([
            'message' =>  'No entry  added empty data',
          
        ]);
    }
    
    



public function show()
{
   
    $cotizaciones=Cotizacion::all();
    return response()->json([
        'cotizaciones' => $cotizaciones,      
    ],200);
}



}
