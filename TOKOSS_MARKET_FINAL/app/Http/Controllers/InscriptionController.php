<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;

class InscriptionController extends Controller
{
    public function error()
    {
        return view('pages/inscription/error');
    }

    public function email_error()
    {
        return view('pages/inscription/email_error');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages/inscription/inscription');
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
        //
        $data= new User();

        $role_id = Role::find(3);
        
        $data['firstname']= strtoupper($request->firstname);
        $data['lastname']= strtoupper($request->lastname);
        $data['adress']= $request->adress;
        $data['city']= $request->city;
        $data['tel']= $request->tel;
        $data['email']= $request->email;
        $data['password']= Crypt::encryptString($request->password);
        $data['trade_name']= $request->trade_name;
        $data['role_id']= $role_id->id;

        $userData = User::where('email', '=',$request->email)->get();

        $u = $userData->first();
    
        if($u!=null)
        {
            
            return redirect()->route('inscription.email_error');
        }
        elseif($u==null)
        {
            
            
            if( $request->password ==  $request->confirm_password)
            {
                $data->save();

                return redirect()->route('connexion');
            }
            else
            {
                return redirect()->route('inscription.error');
            }
            
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
