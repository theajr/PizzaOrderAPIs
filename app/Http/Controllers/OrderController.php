<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $request->user()->orders()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $order = new Order([
            'address_id' => $request->address_id
        ]);
        $amount = 0;
        $orderItems = [];
        foreach ($request->cart as $pizzaId => $qty) {
            $item = Pizza::find($pizzaId);
            $amount = $amount + ($item->price * $qty);
            $order->amount = $amount;
            $orderItem = new OrderItem([
                'pizza_id' => $item->id,
                'amount' => $item->price,
                'quantity' => $qty
            ]);
            array_push($orderItems, $orderItem);
        }
        $newOrder = $request->user()->orders()->save($order);
        $newOrder->items()->saveMany($orderItems);
        return response()->json([
            'message' => 'Successfully Placed Order!',
            'orders' => $request->user()->orders()->get(),
            'new' => $newOrder
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, $id)
    {
        $order =  Order::with('items')->where('id',$id)->first();
        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
