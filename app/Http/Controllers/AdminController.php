<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
    public function index()
    {
        $admins = DB::table('users')->get();
        return view('admins.index', compact('admins'));
    }

   
}
