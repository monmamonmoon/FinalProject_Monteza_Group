<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
        $user = Auth::user();
    }// END METHOD

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }// END METHOD

    public function AdminLogin(){
        return view('admin.admin_login');
    }// END METHOD
}
