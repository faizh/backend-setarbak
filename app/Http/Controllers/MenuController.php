<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MenuModel::all();

        return response()->json($data, 200);
    }
    

    public function getBeverages()
    {
        $data = MenuModel::where('category', 1)->get();

        return response()->json($data, 200);
    }

    public function getBeveragesPaginations()
    {
        $data = MenuModel::where('category', 1)->paginate(6);

        return response()->json($data, 200);
    }

    public function searchBeveragesMenu($param)
    {
        $data = MenuModel::where('name', 'like', '%'.$param.'%')
                ->where('category', 1)
                ->paginate(6);

        return response()->json($data, 200);
    }

    public function searchCategoryBeveragesMenu($param)
    {
        dump($param);
        // $data = MenuModel::where('name', 'like', '%'.$param.'%')
        //         ->where('category', 1)
        //         ->paginate(6);

        // return response()->json($data, 200);
    }

    public function getFoods()
    {
        $data = MenuModel::where('category', 2)->get();

        return response()->json($data, 200);
    }

    public function getFoodsPaginations()
    {
        $data = MenuModel::where('category', 2)->paginate(6);

        return response()->json($data, 200);
    }

    public function searchFoodsMenu($param)
    {
        $data = MenuModel::where('name', 'like', '%'.$param.'%')
                ->where('category', 2)
                ->paginate(6);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MenuModel::find($id);

        return response()->json($data, 200);
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
