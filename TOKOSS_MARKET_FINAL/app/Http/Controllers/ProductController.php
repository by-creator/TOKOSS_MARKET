<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Stock;
use App\Models\ArchiveStock;
use App\Models\ArchiveCommand;
use App\Models\Command;
use Session;

class ProductController extends Controller
{

    public function filter($id)
    {

        $productData = Product::where('id', '=',$id)->get();
        
        return view('pages/product/product', compact('productData'));
    }

    public function search(Request $request)
    {
        $name = $request->product_search;
        $id = Session::get('id');
        $user = User::find($id);
        $search_condition = ['name'=> $name, 'user_id' => $id ];
        $productData = product::where($search_condition)->get();

        if(isset($productData))
        {
            
            if($user->role_id == 1)
            {   
                
                return view('pages/product/search_admin', compact('productData'));
            }
            else if($user->role_id == 3)
            {
                return view('pages/product/search_vendor', compact('productData'));
            }
            
            
        }
        else
        {
            return redirect()->route('product.error');
        }

       
    }

    public function admin_order()
    {
        return view('pages/product/admin_order');
    }

    public function list()
    {
        $productData = Product::orderBy('name','asc')->get();

        return view('pages/product/list', compact('productData'));
    }

    public function delete(Request $request)
    {
        $p = Product::find($request->id);
        $commandData = Command::where('product_id', '=',$p->id)->get();
        $stockData = Stock::where('product_id', '=',$p->id)->get();
        $archiveCommandData = ArchiveCommand::where('product_id', '=',$p->id)->get();
        $archiveStockData = ArchiveStock::where('product_id', '=',$p->id)->get();

       if($archiveCommandData->isEmpty())
       {
            if($archiveStockData->isEmpty())
            {
                if($commandData->isEmpty())
                {
                    if($stockData->isEmpty())
                    {
                        $p->delete();
                    }
                    else
                    {
                        $userData = User::find($p->user_id);
    
                        if($userData->role_id == 1)
                        {
                            return view('pages.product.admin_stock');
                        }
                        else if($userData->role_id == 3)
                        {
                            return view('pages.product.vendor_stock');
                        }
                    }
                }
                else
                {
                    $userData = User::find($p->user_id);

                    if($userData->role_id == 1)
                    {
                        return view('pages.product.admin_order');
                    }
                    else if($userData->role_id == 3)
                    {
                        return view('pages.product.vendor_order');
                    }
                }
            }
            else
            {
                $userData = User::find($p->user_id);

                if($userData->role_id == 1)
                {
                    return view('pages.product.admin_stock');
                }
                else if($userData->role_id == 3)
                {
                    return view('pages.product.vendor_stock');
                }
            }
            
       }
       else
       {
            $userData = User::find($p->user_id);

            if($userData->role_id == 1)
            {
                return view('pages.product.admin_order');
            }
            else if($userData->role_id == 3)
            {
                return view('pages.product.vendor_order');
            }
       }
        

       
        $userData = User::find($p->user_id);

        if($userData->role_id == 1)
        {
            return redirect()->route('index.admin');
        }
        else if($userData->role_id == 3)
        {
            return redirect()->route('index.vendor');
        }
                         
    }
    public function updates(Request $request)
    {
        

        $data =  Product::find($request->id);

            if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('products/images'), $filename);
            $data->image= $filename;
        }
      

        $data->name= strtoupper($request->name);

        $data->description= $request->description;

        $data->quantity= $request->quantity;

        $data->price= $request->price;

        $data->user_id = Session::get('id');

        $data->category_id= $request->category;

        $user = User::find($data->user_id);

          
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages/product/product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::orderBy('name','asc')->get();

        return view('pages/product/create',['category'=>$category]);
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
        $data= new Product();

            if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('products/images'), $filename);
            $data['image']= $filename;
        }
      

        $data['name']= strtoupper($request->name);

        $data['description']= $request->description;

        $data['quantity']= $request->quantity;

        $data['price']= $request->price;

        $data['user_id']= Session::get('id');

        $data['category_id']= $request->category;

        $user = User::find($data['user_id']);
            
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
        $product = Product::find($id);

        if($product->user_id == 1)
        {
            return view('pages/product/edit',['product'=>$product]);
        }
        else
        {
            return view('pages/product/edit_vendor',['product'=>$product]);
        }
        
        
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
