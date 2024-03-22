<?php

namespace App\Http\Controllers;
use App\Mail\profileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('login.show');
    }

//     protected function authenticated(Request $request, $user)
// {
//     if ($user->role === 'admin') {
//         return redirect()->route('admin.index');
//     }

//     return redirect('/homepage');
// }

    public function login(Request $request)
    {
        // $values = $request->post();

        $login = $request->login;
        $password = $request->password;

        $credentials =['email' => $login, 'password' => $password];
        
        if (Auth::attempt($credentials)) {
            $profile=Auth::user();
            //connectewh ila activa gmail
                    if (!($profile->email_verified_at == null)) {
                            if ($profile->role === 'Admin') {
                                $request->session()->regenerate(true);
                                return redirect()->route('admin.myProfile_admin')->with('success','Welcome '.$login.'.');
                            }
                            else {
                                $request->session()->regenerate(true);
                                return to_route('homepage')->with('success','Welcome '.$login.'.');
                            }

                    }
                    //  ila  gmail non activ
                    else {
                        $request->session()->invalidate();
                        $profile=Auth::user();
                        Mail::to($profile->email)->send(new profileMail($profile));
                        return back()->withErrors([
                            'login' => 'Please verify your account at email address: '.$profile->email
                        ])->onlyInput('login');
                    }            
        } else {
            //ila chi hj ghalta
            return back()->withErrors([
                'login' => 'Incorrect email or password.'
            ])->onlyInput('login');
        }
        
    }

    public function logout()
    {
        //1:vider session
        Session::flush();

        Auth::logout();

        return to_route('login')->with('success','You are disconnected.');

    }
}
