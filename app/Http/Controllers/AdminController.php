<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
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
