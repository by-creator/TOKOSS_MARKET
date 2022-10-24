<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function error()
    {
        return view('pages/cart/error');
    }
    public function list()
    {
        $cartData = Cart::all();

        return view('pages/cart/cart', compact('cartData'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages/cart/cart');
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

        $data = new Cart();

        $product = Product::Find($request->id);

        if($request->quantity>$product->quantity)
        {
            return redirect()->route('cart.error');

        }
        else
        {
            $product_id = $request->id;

            $c = Cart::where('id', '=',$product_id)->get();

            $c_exist = $c->first();

            if(isset($c_exist))
            {
                $product = Product::find($product_id);

                $c_exist['product_id']= $request->id;
    
                $c_exist['quantity'] =  $c_exist->quantity + $request->quantity;
                
                $c_exist['price'] = $product->price * $c_exist['quantity'];

                $c_exist->save();
    
            }
            else
            {
            
            $product = Product::find($product_id);

            $data['product_id']= $request->id;

            $data['quantity'] = $request->quantity;
            
            $data['price'] = $product->price * $request->quantity;

            if($request->quantity ==0)
            {
                return view('pages/product/zero_quantity');
            }
            else
            {
            
                $data->save();
            }
            
            }

            


        }

        return redirect()->route('cart.list');

        
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
        $cartData = Cart::find($id);
        
        return view('pages/cart/edit',compact('cartData'));
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
     * @param  Request $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       
    }

    public function delete(Request $request)
    {
        //
        $cart = Cart::find($request->id);
        if($cart !=null)
        {
            $cart->delete();
        }

        return redirect()->route('cart.list');
    }
}
