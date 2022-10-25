<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Product;
use App\Models\Command;
use App\Models\ArchiveCommand;
use App\Models\ArchiveStock;
use App\Models\Stock;
use App\Models\NewsLetter;
use App\Mail\NewsLetterMail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
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

    public function passworderror()
    {
        return view('pages/connexion/passworderror');
    }

    public function contact(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        Mail::to('tokoss-market@gmail.com')->send(new ContactMail($name, $email, $subject, $message));
        return redirect()->route('contact');
    }

    public function newsletter(Request $request)
    {
        
        $newsletterData = NewsLetter::where('email', '=',$request->email)->get();

        $n = $newsletterData->first();
    
        if($n!=null)
        {
            
           return view('pages/user/newsletter_error');
        }
        elseif($n==null)
        {
            $newsletter = new NewsLetter();

            $newsletter->email = $request->email;
            $newsletter->save();
            Mail::to($newsletter->email)->send(new NewsLetterMail());
            return redirect()->route('index');
            
        }
    }

    public function delete(Request $request)
    {
        $u = User::find($request->id);
        $archiveCommandData = ArchiveCommand::where('user_command_id', '=',$u->id)->get();
        $archiveStockData = ArchiveStock::where('user_id', '=',$u->id)->get();
        $command = Command::where('user_command_id', '=',$u->id)->get();
        $product = Product::where('user_id', '=',$u->id)->get();
        $stock = Stock::where('user_id', '=',$u->id)->get();


        if($u !=null)
        {
            if($u->role_id == 1)
            {
                return view('pages/user/admin_user_delete_error');
            }
            else
            {
                if($archiveCommandData->isEmpty())
                {
                    if($archiveStockData->isEmpty())
                    {
                        if($command->isEmpty())
                        {
                            if($product->isEmpty())
                            {
                                if($stock->isEmpty())
                                {
                                    $u->delete();
                                    return redirect()->route('index.admin');
                                }
                            }
                        }
                    }
                }
                
            }
            
            
        }
            
    }
 
    

    public function updates(Request $request)
    {
        $data = User::find($request->id);

        $data->firstname= $request->firstname;
        $data->lastname= $request->lastname;
        $data->adress= $request->adress;
        $data->city= $request->city;
        $data->tel= $request->tel;
        $data->email= $request->email;
        $data['password']= Crypt::encryptString($request->password);
        $data->trade_name= $request->trade_name;

        if( $request->password ==  $request->confirm_password)
        {
            $data->save();

            return redirect()->route('index.admin');
        }
        else
        {
            return view ('pages/user/user_edit_password_error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userData = User::orderBy('lastname','asc')->get();

        return view('pages/user/create',['userData'=>$userData]);
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
        $data= new User();

        $role_id = Role::find(3);
        
        $data['firstname']= $request->firstname;
        $data['lastname']= $request->lastname;
        $data['adress']= $request->adress;
        $data['city']= $request->city;
        $data['tel']= $request->tel;
        $data['email']= $request->email;
        $data['password']= $request->password;
        $data['trade_name']= $request->trade_name;
        $data['role_id']= $role_id->id;

        if( $request->password ==  $request->confirm_password)
        {
            $data->save();

            return redirect()->route('user.create');
        }
        else
        {
            return redirect()->route('user.passworderror');
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
        $user = User::find($id);
        
        return view('pages/user/edit',['user'=>$user]);
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
