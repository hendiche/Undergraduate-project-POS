<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function dashboard() {
    	return view('admin.dashboard');
    }

    public function logout() {
    	Auth::logout();
    	return redirect()->route('frontend.home');
    }
}
