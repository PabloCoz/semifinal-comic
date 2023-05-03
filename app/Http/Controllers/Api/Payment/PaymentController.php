<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Culqi\Culqi;

class PaymentController extends Controller
{
    public function buyPlan(Request $request)
    {
    }

    public function buyCard(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'user_id' => 'required',
        ]);

        $culqi = new Culqi(array('api_key' => env('CULQI_SECRET_KEY')));
        $user = User::find($request->user_id);
        $cad =  Card::where('customer_id', $request->user_id)->exists();
        try {

            $card = $culqi->Cards->create(
                array(
                    "token_id" => $request->token,
                    "customer_id" => $user->customer_id
                )
            );

            $id_cdr = $card->id;
            $source = $card->source;
            $brand =  $source->iin;
            if ($cad) {
                Card::create([
                    'customer_id' => $request->user_id,
                    'card_id' => $id_cdr,
                    'four_digits' => $source->last_four,
                    'brand' => $brand->card_brand,
                    'default' => true,
                ]);
            } else {
                Card::create([
                    'customer_id' => $request->user_id,
                    'card_id' => $id_cdr,
                    'four_digits' => $source->last_four,
                    'brand' => $brand->card_brand,
                    'default' => false,
                ]);
            }
            return response()->json('Tarjeta agregada correctamente');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function subscriptionCreated(Request $request)
    {
        
        
        $culqi = new Culqi(array('api_key' => env('CULQI_SECRET_KEY')));
        
        return response()->json($request->all());

    }
    
}
