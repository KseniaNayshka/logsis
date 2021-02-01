<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Couriers;
use App\Orders;
use Illuminate\Support\Facades\DB;

class CouriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date("Y-m-d");
        $couriers = Couriers::all();
        $orders = Orders::all();
        
        $fio = DB::table('couriers')
            ->leftJoin('orders', 'orders.courier_id', '=', 'couriers.id')
            ->where('couriers.status', '=', 1)
            ->where('orders.delivery_date', '=', date("Y-m-d"))
            ->select('fio')
            ->groupBy()
            ->get();
        return view('couriers', ['fio' => $fio, 'date' => $date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show_with_date(Request $request)
    {
        $couriers = Couriers::all();
        $orders = Orders::all();    
        $fio = DB::table('couriers')
            ->leftJoin('orders', 'orders.courier_id', '=', 'couriers.id')
            ->where('couriers.status', '=', 1)
            ->where('orders.delivery_date', '=', $request['calendar'])
            ->select('fio')
            ->groupBy()
            ->get();
        return view('couriers', ['fio' => $fio, 'date' => $request['calendar']]);
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