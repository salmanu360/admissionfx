<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(!session()->has('url.intended'))
    {
        session(['url.intended' => url()->previous()]);

    }
    else
    {
        session(['url.intended' => url()->previous()]);
    }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url ='';
        if($request->user()->role === 'manager')
        {
            $url = 'manager/dashboard';
        } 
        elseif($request->user()->role === 'application'){
           return redirect('application/dashboard');
        }
        elseif($request->user()->role === 'rm'){
            return redirect('rmanager/dashboard');
        }
        elseif($request->user()->role === 'student'){
            return redirect('student/dashboard');

        }
        elseif($request->user()->role === 'recruiter'){
            return redirect('recruiter/dashboard');

        }

        return redirect()->intended($url);
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
