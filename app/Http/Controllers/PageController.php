<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function main(){

        $totalSum = Credit::sum('total_price');
        $totalCredits = Credit::count();

        return view('main', compact('totalSum', 'totalCredits'));
    }

    public function get_search(Request $request){
        $key = $request->key;
        $credits = Credit::where('name', 'like', '%'.$key.'%')
                    ->orwhere('phone', 'like', '%'.$key.'%')
                    ->orwhere('total_price', 'like', '%'.$key.'%')
                    ->orderBy('id', 'DESC')->paginate(15);

        return view('credits.search', compact('credits', 'key'));
    }

    public function login(){
        return view('layouts.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('login');
    }
}
