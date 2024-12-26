<?php

namespace App\Http\Controllers;

use App\Models\BatchEggs;
use App\Models\EggTransaction;
use Auth;
use Illuminate\Http\Request;

class UserEgg extends Controller
{
    public function index()
    {
        $eggs = BatchEggs::all();
        return view('user.egg.index', compact('eggs'));
    }

    public function show($id)
    {
        $eggs = BatchEggs::findOrFail($id); // Fetch the specific chicken item
        return view('user.egg.details', compact('eggs'));
    }

    public function store(Request $request, $batch_id)
    {
        // Validate the incoming request
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Fetch the batch details
        $batch = BatchEggs::findOrFail($batch_id);

        // Calculate the total price
        $priceEach = $batch->price;
        $total = $priceEach * $request->quantity;

        // Create a new transaction
        EggTransaction::create([
            'batch_id' => $batch_id,
            'user_id' => Auth::id(), // Get the logged-in user's ID
            'quantity' => $request->quantity,
            'price_each' => $priceEach,
            'total' => $total,
        ]);

        // Optionally, reduce the batch's quantity
        $batch->decrement('quantity', $request->quantity);

        // Redirect to the user.dashboard route with a success message
        return redirect()->route('user.egg')->with('success', 'Purchase successful!');
    }
}
