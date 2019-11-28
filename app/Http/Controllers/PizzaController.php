<?php

namespace App\Http\Controllers;

use App\Pizza;
use  DB;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function getPizzas(Request $request)
    {
        $take = $request->query('limit', 10);
        $skip =  $request->query('offset', 0);
        $page =  $request->query('page', 1);

        $pizzas= DB::table("pizzas")
            ->take($take)
            ->skip($skip + (($page - 1) * $take))
//            ->orderBy('id','desc')
            ->get();
        return $pizzas;
    }
}
