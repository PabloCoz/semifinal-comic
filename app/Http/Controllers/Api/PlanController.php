<?php

namespace App\Http\Controllers\Api;

use App\Events\PlanCreated;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Culqi\Culqi;
use Exception;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|min:3',
            'interval' => 'required',
            'interval_count' => 'required',
            'trial_period_days' => 'nullable|min:1|max:5',
            'limit' => 'required'
        ]);

        $culqi = new Culqi(
            array(
                'api_key' => env('CULQI_SECRET_KEY')
            )
        );
        try {
            $plan = $culqi->Plans->create(
                array(
                    "name" => $request->name,
                    "amount" => $request->price * 100,
                    "currency_code" => "PEN",
                    "interval" => $request->interval,
                    "interval_count" => $request->interval_count,
                    "trial_days" => $request->trial_period_days,
                    "limit" => $request->limit,
                )
            );

            PlanCreated::dispatch($plan);

            return redirect()->route('admin.plans.index')->with('success-plan', 'El plan se creó con éxito');
        } catch (Exception $e) {
            return redirect()->route('admin.plans.index')->with('error-plan', 'El plan no se creó con éxito');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        return response()->json($plan);
        $culqi = new Culqi(array('api_key' => env('CULQI_SECRET_KEY')));
        $culqi->Plans->delete($plan->culqi_id);
        $plan->delete();
        return redirect()->route('admin.plans.index')->with('delete-plan', 'El plan se eliminó con éxito');
    }
}
