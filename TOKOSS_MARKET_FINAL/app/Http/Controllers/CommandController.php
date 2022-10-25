<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Cart;
use App\Models\Command;
use App\Models\ArchiveCommand;
use App\Models\Product;
use App\Models\State;
use App\Mail\CommandClientMail;
use App\Mail\CommandVendorMail;
use Illuminate\Support\Facades\Mail;


class CommandController extends Controller
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

    

    public function delete(Request $request)
    {
        $c = Command::find($request->id);
        if($c !=null)
        {  

            $archive_command = new ArchiveCommand();

            $archive_command->state_id = $c->state_id;
            $archive_command->user_id = $c->user_id;
            $archive_command->user_command_id = $c->user_command_id;
            $archive_command->product_id = $c->product_id;
            $archive_command->quantity = $c->quantity;
            $archive_command->price = $c->price;

            $archive_command->save();

            //$c->delete();

            $userData = User::find($c->user_id);
        
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

    public function addcommand(Request $request)
    {
        //
        $cartData = Cart::all();

        if($cartData->isEmpty())
        {
            return redirect()->route('checkout.error');
        }
        else
        {
            foreach($cartData as $cart)
            {
           
                $data_command = new Command();

                $state = State::find(2);

                $data_command->state_id = $state->id;

                $data_command->product_id = $cart->product_id;

                $data_command->quantity = $cart->quantity;

                $data_command->price = $cart->price;

                $userData = User::where('email', '=',$request->email)->get();

                $user = $userData->first();

                $data_command->user_command_id = $user->id;

                $productData = Product::where('id', '=',$cart->product_id)->get();
                
                $data_product = $productData->first();

                $data_product->quantity = $data_product->quantity - $data_command->quantity;

                $data_command->user_id = $data_product->user_id;

               
                $data_product->save();

                $data_command->save();

                Cart::truncate();

                $user_vendor = User::find($data_command->user_id);

                Mail::to($user_vendor->email)->send(new CommandVendorMail($user_vendor->lastname,$user_vendor->firstname,$user_vendor->trade_name));
                Mail::to($request->email)->send(new CommandClientMail($user->lastname,$user->firstname));
        
                

                
            }

            return redirect()->route('checkout.success');
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
        $userData = User::where('email', '=',$request->email)->get();

        $user = $userData->first();

        if(isset($user))
        {
            return $this->addcommand($request);
        }
        else
        {
            $data_user= new User();

            $role_id = Role::find(2);

            $data_user['firstname']= $request->firstname;
            $data_user['lastname']= $request->lastname;
            $data_user['adress']= $request->adress;
            $data_user['city']= $request->city;
            $data_user['tel']= $request->tel;
            $data_user['email']= $request->email;
            $data_user['role_id']= $role_id->id;

            


            $data_user->save();

            return $this->addcommand($request);
        
        }
        
        

    }
    public function updates(Request $request)
    {
        

        $userData = User::where('email', '=',$request->email)->get();

        $user_command = $userData->first();

        $data_user_command= User::find($user_command->id);

        $role_id = Role::find(3);

        $data_user_command->firstname= $request->firstname;
        $data_user_command->lastname= $request->lastname;
        $data_user_command->adress= $request->adress;
        $data_user_command->city= $request->city;
        $data_user_command->tel= $request->tel;
        $data_user_command->email= $request->email;
        $data_user_command->role_id= $role_id->id;

        $data_user_command->save();

        $data_command = Command::find($request->id);

        $data_command->state_id = $request->state;

        $productData = Product::where('name', '=',$request->product_name)->get();

        $product_command = $productData->first();

        $data_command->user_id = $product_command->user_id;

        $user_command = User::find($data_command->user_id);

        $data_command->product_id = $product_command->id;

        $data_command->quantity = $request->product_quantity;

        $data_command->price = $data_command->quantity * $product_command->price;

        if($data_command->state_id == 3)
        {
            if($product_command->quantity==0)
            {
                $product_command->quantity = $request->product_quantity;
            }
            else
            {   
                $product_command->quantity = $product_command->quantity - $request->product_quantity;

                $product_command->save();
            }
            
        }
        else if($data_command->state_id == 1)
        {
            $product_command->quantity = $product_command->quantity + $request->product_quantity;

            $product_command->save();
        }

        $data_command->save();

        if($user_command->role_id == 1)
        {
            return view('pages/index/index_admin');
        }
        else if($user_command->role_id == 3)
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
        $command = Command::find($id);
        
        return view('pages/command/edit',['command'=>$command]);
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
