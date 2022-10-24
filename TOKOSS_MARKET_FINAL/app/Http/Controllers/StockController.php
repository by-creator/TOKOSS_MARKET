<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\ArchiveStock;
use App\Models\Product;
use App\Models\User;
use Session;

class StockController extends Controller
{
    public function error()
    {
        return view('pages/stock/error');
    }

    public function delete(Request $request)
    {
        $s = Stock::find($request->id);
        if($s !=null)
        {
            $archive_stock = new ArchiveStock();

            $archive_stock->product_id = $s->product_id;
            $archive_stock->product_action_id = $s->product_action_id;
            $archive_stock->user_id = $s->user_id;
            $archive_stock->date = $s->date;
            $archive_stock->quantity = $s->quantity;

            $archive_stock->save();

            //$s->delete();

            $userData = User::find($s->user_id);
        
                if($userData->role_id == 1)
                {
                    return redirect()->route('index.admin');
                }
                else if($userData->role_id == 3)
                {
                    return redirect()->route('index.vendor');
                }
        }

        
    }
    public function updates(Request $request)
    {
        //
        $data= Stock::find($request->id);

        $data->date = $request->date;

        $data->quantity = $request->quantity;

        $data->product_id = $request->product;

        $data->product_action_id = $request->product_action;

        $data->user_id = Session::get('id');
        

        if($request->product_action == 1)
        {
            $user_data= new User();

            $user_data->id = Session::get('id');

            $user = User::find($user_data->id);

            $p = Product::find($request->product);

            $p->quantity = $p->quantity + $request->quantity;

            $p->save();

            $data->save();

            if($user->role_id == 1)
            {
                return view('pages/index/index_admin');
            }
            else if($user->role_id == 3)
            {
                return view('pages/index/index_vendor');
            }

        }
        else if($request->product_action == 2)
        {
            $data->user_id = Session::get('id');

            $user = User::find($data->user_id);

            $p = Product::find($request->product);

            if($request->quantity>$p->quantity)
            {
                return redirect()->route('stock.error');
            }
            else
            {
                $p->quantity = $p->quantity - $request->quantity;

                $p->save();

                $data->save();

                if($user->role_id == 1)
                {
                    return view('pages/index/index_admin');
                }
                else if($user->role_id == 3)
                {
                    return view('pages/index/index_vendor');
                }
            }$data->user_id = Session::get('id');

           
        }

        
    }

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
        $stockData = Stock::all();

        return view('pages/stock/create',['stockData'=>$stockData]);
    }

    public function vendorcreate()
    {
        //
        $stockData = Stock::all();

        return view('pages/stock/vendorcreate',['stockData'=>$stockData]);
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
        $data= new Stock();

        $data['date'] = $request->date;

        $data['quantity'] = $request->quantity;

        $data['product_id'] = $request->product;

        $data['product_action_id'] = $request->product_action;

        $data['user_id'] = Session::get('id');
        

        if($request->product_action == 1)
        {
            $user_data= new User();

            $user_data['id'] = Session::get('id');

            $user = User::find($user_data['id']);

            $p = Product::find($request->product);

            $p->quantity = $p->quantity + $request->quantity;

            $p->save();

            $data->save();

            if($user->role_id == 1)
            {
                return view('pages/index/index_admin');
            }
            else if($user->role_id == 3)
            {
                return view('pages/index/index_vendor');
            }

        }
        else if($request->product_action == 2)
        {
            $data['user_id'] = Session::get('id');

            $user = User::find($data['user_id']);

            $p = Product::find($request->product);

            if($request->quantity>$p->quantity)
            {
                return redirect()->route('stock.error');
            }
            else
            {
                $p->quantity = $p->quantity - $request->quantity;

                $p->save();

                $data->save();

                if($user->role_id == 1)
                {
                    return view('pages/index/index_admin');
                }
                else if($user->role_id == 3)
                {
                    return view('pages/index/index_vendor');
                }
            }$data['user_id'] = Session::get('id');

           
        }

        
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
        $stock = Stock::find($id);
        
        return view('pages/stock/edit',['stock'=>$stock]);
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
