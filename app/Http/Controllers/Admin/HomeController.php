<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class HomeController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Load login page for admin 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadLogin(Request $request)
    {
        if(Auth::user()){
            return redirect('/admin/home');
        }
        return view('admin.login');
    }

    public function postLogin(Request $request){
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/admin');
    }

    /**
     * Load Dashboard page for admin 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function loadHome(Request $request){
        $user = Auth::user();
        return view('admin.pages.dashboard', ['title' => 'Dashboard', 'user' => $user]);
    }
}
