<?php

namespace App\Http\Controllers\Api\Buy;

use App\Events\BuyMoney;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Culqi\Culqi;
use Exception;

class MoneyController extends Controller
{
    public function buyMoney(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'amount' => 'required|min:1'
        ]);

        $culqi = new Culqi(array('api_key' => env('CULQI_SECRET_KEY')));
        $tkn = $culqi->Tokens->get($request->token);
        $user = $request->user_id;
        try {
            $chg = $culqi->Charges->create([
                "amount" => $request->amount,
                "currency_code" => "PEN",
                "description" => "Compra de monedas en Baps Comics",
                "email" => $tkn->email,
                "source_id" => $request->token
            ]);
            
            BuyMoney::dispatch($chg, $user);
            return ['Compra exitosa'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
