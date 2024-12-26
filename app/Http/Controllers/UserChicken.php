<?php

namespace App\Http\Controllers;

use App\Models\BatchChicken;
use App\Models\ChickenTransaction;
use Auth;
use Illuminate\Http\Request;

class UserChicken extends Controller
{
    public function index()
    {
        $chicken = BatchChicken::all();
        return view('user.chicken.index', compact('chicken'));
    }

    public function show($id)
    {
        $chicken = BatchChicken::findOrFail($id); // Fetch the specific chicken item
        return view('user.chicken.details', compact('chicken'));
    }

    public function store(Request $request, $batch_id)
    {
        // Validate the incoming request
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Fetch the batch details
        $batch = BatchChicken::findOrFail($batch_id);

        // Calculate the total price
        $priceEach = $batch->price;
        $total = $priceEach * $request->quantity;

        // Create a new transaction
        ChickenTransaction::create([
            'batch_id' => $batch_id,
            'user_id' => Auth::id(), // Get the logged-in user's ID
            'quantity' => $request->quantity,
            'price_each' => $priceEach,
            'total' => $total,
        ]);

        // Optionally, reduce the batch's quantity
        $batch->decrement('quantity', $request->quantity);

        // Redirect to the user.dashboard route with a success message
        return redirect()->route('user.chicken')->with('success', 'Purchase successful!');
    }

}
