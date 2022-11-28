<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class CheckoutController extends Controller
{
    public function success()
    {
        return view('pages/checkout/success');
    }

    public function error()
    {
        return view('pages/checkout/error');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages/checkout/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       

        return view('pages/checkout/create');
    }

    public function search_store(Request $request)
    {
        $userData = User::where('email', '=',$request->email)->get();

        $search_user = $userData->first();

        $cartData = Cart::all();

        if(isset($search_user))
        {
            return view('pages/checkout/search_store',['search_user'=>$search_user, 'cartData'=>$cartData]);
        }
        else
        {
            return view('pages/checkout/search_error');
        }

        
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
        $cartData = Cart::all();

        return view('pages/checkout/create',['cartData'=>$cartData]);
  
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
