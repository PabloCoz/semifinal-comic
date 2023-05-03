<?php

namespace App\Http\Livewire\Admin\Plans;

use App\Http\Controllers\Api\PlanController;
use App\Models\Plan;
use Livewire\Component;
use Culqi\Culqi;

class PlanCreate extends Component
{
    public $open = false;

    public $name, $price, $interval, $interval_count, $trial_period_days, $limit;

    public function render()
    {
        return view('livewire.admin.plans.plan-create');
    }
}
