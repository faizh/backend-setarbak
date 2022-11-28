<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {   
        $data = CartModel::where('user_id', $user_id)->get();

        return response()->json($data, 200);
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
        $cart   = new CartModel;
        $input  = (object) $request->input();
        
        $cart->user_id  = $input->user_id;
        $cart->menu_id  = $input->menu_id;
        $cart->qty      = $input->qty;
        $cart->notes    = $input->notes;

        if ($cart->save()) {
            $msg    = "Insert Success";
            $code   = 200;
        }else{
            $msg    = "Insert failed";
            $code   = 500;
        }

        $data = [
            'msg'   => $msg
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
        $cart   = CartModel::find($id);
        $input  = (object) $request->input();

        $cart->qty      = $input->qty;
        $cart->notes    = $input->notes;
        
        if ($cart->save()) {
            $msg    = "Update Success";
            $code   = 200;
        }else{
            $msg    = "Update failed";
            $code   = 500;
        }

        $data = [
            'msg'   => $msg
        ];
        
        return response()->json($data, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = CartModel::find($id);

        if ($cart->delete()) {
            $msg    = "Delete Success";
            $code   = 200;
        }else{
            $msg    = "Delete failed";
            $code   = 500;
        }

        $data = [
            'msg'   => $msg
        ];
        
        return response()->json($data, $code);
    }
}
