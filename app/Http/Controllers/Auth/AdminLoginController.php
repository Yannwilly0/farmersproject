<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;


class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        //$data['title']  = media_text::where('id',1)->select('text')->first();
        //$data['name']  = media_text::where('id',2)->select('text')->first();
        return view('auth.adminLogin');
    }

    public function login(Request $request)
    {
       $this->validate( $request,[
            'email'=>'required|email',
            'password' => 'required|min:4',
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],False))
        {
            
            return redirect()->intended(route('admin.index'));
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors(
            [
                'email' => 'email ou mot de passe invalide',
                'password' => 'email ou mot de passe invalide'
            ]
        );
    }
}
