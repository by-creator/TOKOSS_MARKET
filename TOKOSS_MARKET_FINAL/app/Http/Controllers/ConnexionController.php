<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Session;


class ConnexionController extends Controller
{
    public function error()
    {
        return view('pages/connexion/error');
    }

    public function usernotfound()
    {
        return view('pages/connexion/usernotfound');
    }

    public function password_reset()
    {
        return view('pages/connexion/password_reset');
    }

    public function password_reset_store(Request $request)
    {
        $user = User::where('email', '=',$request->email)->get();

        $u = $user->first();

        if(isset($u))
        {
            Mail::to($u->email)->send(new PasswordResetMail($u->lastname, $u->firstname));

            return view('pages/connexion/password_reset_success');
        }
        else
        {
            return view('pages/connexion/error');
        }

        
    }

    public function edits()
    {
        return view('pages/connexion/edit');
    }

  
    public function updates(Request $request)
    {
        $userData = User::where('email', '=',$request->email)->get();
        $u = $userData->first();
    
        if($u==null)
        {
            
            return view('pages/connexion/edit_email_error');
        }
        elseif($u!=null)
        {
            $u->email = $request->email;
            $u->password = Crypt::encryptString($request->password);
             
            if( $request->password ==  $request->confirm_password)
            {
                $u->save();

                return view('pages/connexion/password_reset_success_ok');
            }
            else
            {
                return view('pages/connexion/edit_password_error');
            }
            
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
       
        return view('pages/connexion/connexion');
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
        $user = User::where('email', '=',$request->email)->get();

        if(isset($user)==null)
        {
            return redirect()->route('connexion.usernotfound');
        }
        else
        {
            $u = $user->first();

            if(isset($u)==null)
            {
                return redirect()->route('connexion.usernotfound');
            }
           
            else if($u->email == $request->email && Crypt::decryptString($u->password) == $request->password)
            {
                if($u->role_id == 1)
                {
                    Session::put('id',$u->id);
                    
                    //dd($session_id);
                    return view('pages/index/index_admin');
                    
                    
                }
                else if($u->role_id == 3)
                {
                              
                    Session::put('id',$u->id);
                    
                    //dd($session_id);
                    return view('pages/index/index_vendor');
                }
            }
            else
            {
                return redirect()->route('connexion.error');
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
