<?php

namespace App\Http\Controllers;

use App\Models\BatchEggs;
use App\Models\ChickenTransaction;
use App\Models\EggTransaction;
use Auth;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class UserController extends Controller
{
    public function UserDashboard(){
        return view('user.index');
    }// END METHOD

    public function UserLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/login');
    }// END METHOD

    public function UserLogin(){
        return view('user.user_login');
    }// END METHOD


    public function Egghistory()
    {
        $userId = Auth::id();
    
        // Fetch transactions with related user and batch details
        $transactions = EggTransaction::with(['user', 'batchEggs'])
            ->where('user_id', $userId)
            ->get();
    
        return view('user.egg.history', compact('transactions'));
    }

    public function chickenhistory()
    {
        $userId = Auth::id();
    
        // Fetch transactions with related user and batch details
        $transactions = ChickenTransaction::with(['user', 'batchChicken'])
            ->where('user_id', $userId)
            ->get();
    
        return view('user.chicken.history', compact('transactions'));
    }
    
}
