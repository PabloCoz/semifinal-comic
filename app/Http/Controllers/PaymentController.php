<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Plan;
use Illuminate\Http\Request;
use Culqi\Culqi;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Plan $plan)
    {
        $card = Card::where('customer_id', auth()->user()->id)
                    ->where('default', true)->first();
        return view('payment.index', compact('plan', 'card'));
    }
}
