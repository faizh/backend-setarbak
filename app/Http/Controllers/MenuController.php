<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\SubCategoryModel;

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
        if ($param == 'get_all') {
            $param = '';
        }

        $data = MenuModel::where('name', 'like', '%'.$param.'%')
                ->where('category', 1)
                ->paginate(6);

        return response()->json($data, 200);
    }

    public function searchCategoryBeveragesMenu($search, Request $param)
    {
        $categories = $param->categories;
        if ($categories[0] == 'all') {
            $data = SubCategoryModel::all();

            $categories = [];
            foreach ($data as $value) {
                $categories[] = $value->name;
            }
        }

        if ($search == 'all') {
            $search = '';
        }

        $data = MenuModel::select('menus.*')
                ->join('sub_category', 'sub_category.id', '=', 'menus.sub_category')
                ->whereIn('sub_category.name',  $categories)
                ->where('category', 1)
                ->where('menus.name','like', '%'.$search.'%')
                ->paginate(6);

        return response()->json($data, 200);
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

    public function filterMenuData(Request $request)
    {
        $category       = $request->category;
        $sub_category   = $request->sub_category;
        $search_keyword = $request->search_keywords;
        $category_id    = NULL;

        if ($category== 'beverages') {
            $category_id = 1;
        }elseif ($category == 'foods') {
            $category_id = 2;
        }

        if ($sub_category[0] == 'all') {
            $data = SubCategoryModel::all();

            $sub_category = [];
            foreach ($data as $value) {
                $sub_category[] = $value->name;
            }
        }

        $query = MenuModel::select('menus.*')
                ->join('sub_category', 'sub_category.id', '=', 'menus.sub_category')
                ->whereIn('sub_category.name',  $sub_category)
                ->where('category', $category_id);
        
        if ($search_keyword != 'empty_keywords') {
            $query->where('menus.name','like', '%'.$search_keyword.'%');
        }

        $results = $query->paginate(6);

        $headers = array(
            "Access-Control-Allow-Origin" => "*"
        );
        
        return response()->json($results, 200)->header('Access-Control-Allow-Origin', '*');
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
