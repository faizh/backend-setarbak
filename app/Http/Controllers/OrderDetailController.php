<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetailModel;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $orderDetails  = new OrderDetailModel;
        $input          = (object) $request->input();

        $orderDetails->order_id     = $input->order_id;
        $orderDetails->menu_id   = $input->menu_id;
        $orderDetails->qty    = $input->qty;
        $orderDetails->price    = $input->price;
        $orderDetails->notes    = $input->notes;

        if ($orderDetails->save()) {
            $msg    = "Insert Success";
            $code   = 200;
        }else{
            $msg    = "Insert failed";
            $code   = 500;
        }

        $data = [
            'msg'       => $msg
        ];
        
        return response()->json($data, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
