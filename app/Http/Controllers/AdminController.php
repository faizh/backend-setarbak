<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\Role;
use App\Models\SubCategoryModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsers()
    {
        $data = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.role_name')
            ->get();

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser($id)
    {
        $data = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.role_name')
            ->where('users.id' , $id)
            ->first();

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $user   = new User();
        $input  = (object) $request->input();
        
        $user->name     = $input->name;
        $user->email    = $input->email;
        $user->role_id  = $input->role_id;

        if ($user->save()) {
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        $user   = User::find($id);
        $input  = (object) $request->input();

        $user->name      = $input->name;
        $user->email    = $input->email;
        $user->role_id  = $input->role_id;
        
        if ($user->save()) {
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
    public function destroyUser($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        $data = DB::table('menus')
                ->join('menu_categories', 'menu_categories.id', '=', 'menus.category')
                ->join('sub_category', 'sub_category.id', '=', 'menus.sub_category')
                ->select('menus.*', 'menu_categories.name as category_name', 'sub_category.name as sub_category_name')
                ->get();

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id)
    {
        $data = DB::table('menus')
                ->join('menu_categories', 'menu_categories.id', '=', 'menus.category')
                ->join('sub_category', 'sub_category.id', '=', 'menus.sub_category')
                ->select('menus.*', 'menu_categories.name as category_name', 'menu_categories.id as category_id', 'sub_category.name as sub_category_name', 'sub_category.id as sub_category_id')
                ->where('menus.id', $id)
                ->first();

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request)
    {
        $menu   = new MenuModel();
        $input  = (object) $request->input();
        
        $menu->name         = $input->name;
        $menu->description  = $input->desc;
        $menu->price        = $input->price;
        $menu->img_src      = $input->img;
        $menu->category     = $input->categoryId;
        $menu->sub_category = $input->subCategoryId;

        if ($menu->save()) {
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
        $menu   = MenuModel::find($id);
        $input  = (object) $request->input();

        $menu->name         = $input->name;
        $menu->description  = $input->desc;
        $menu->price        = $input->price;
        $menu->img_src      = $input->img;
        $menu->category     = $input->categoryId;
        $menu->sub_category = $input->subCategoryId;
        
        if ($menu->save()) {
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
    public function destroyProduct($id)
    {
        $menu = MenuModel::find($id);

        if ($menu->delete()) {
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrders()
    {
        $data = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('order_status', 'order_status.id', '=', 'orders.order_status')
                ->select('orders.*', 'users.name as customer', 'order_status.name as order_status')
                ->get();

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrder($orderId)
    {
        $data = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('order_status', 'order_status.id', '=', 'orders.order_status')
                ->select('orders.*', 'users.name as customer', 'order_status.name as order_status')
                ->where('orders.id', $orderId)
                ->first();

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyOrder($orderId)
    {
        $orderDetail = OrderDetailModel::where('order_id', $orderId);
        $order = OrderModel::find($orderId);

        if ($orderDetail->delete() && $order->delete()) {
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRoles()
    {
        $data = Role::all();

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        $data = Category::all();

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubCategories($categoryId)
    {
        $data = SubCategoryModel::where('category_id', $categoryId)->get();

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
}
