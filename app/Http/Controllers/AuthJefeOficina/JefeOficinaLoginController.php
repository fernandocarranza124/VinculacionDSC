<?php

namespace App\Http\Controllers\AuthJefeOficina;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\JefeOficina;
use App\Http\Controllers\Controller;

class JefeOficinaLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function username()
    {
        return 'noControl';
    }

    public function __construct()
    {
        $this->middleware('guest:jefeoficina')->except('logout');
    }

     public function showLoginForm()
    {
        return view('index');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        
        $this->validate($request, [
            'noControl' => 'required',
            'password' => 'required|min:1'
        ]);

        $credential = [
            'noControl' => $request->noControl,
            'password' => $request->password
        ];
        
        
        // Attempt to log the user in
        if (Auth::guard('jefeoficina')->attempt($credential, $request->member)){
            // If login succesful, then redirect to their intended location
             
            return redirect()->intended(route('jefeoficina.home'));
        }
        
        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('noControl', 'remember'));
    }
}


    

