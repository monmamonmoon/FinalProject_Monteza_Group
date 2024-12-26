<?php

namespace App\Http\Controllers;

use App\Models\BatchEggs;
use Illuminate\Http\Request;

class BatchEggsController extends Controller
{
    public function index()
    {
        $batches = BatchEggs::all();
        return view('admin.egg_batches.index', compact('batches'));
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'batch_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'quality' => 'required|in:small,medium,large',
            'price' => 'required|numeric|min:0',
        ]);

        // Create a new batch
        BatchEggs::create([
            'batch_name' => $request->batch_name,
            'quantity' => $request->quantity,
            'quality' => $request->quality,
            'price' => $request->price,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Batch created successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'batch_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'quality' => 'required|in:small,medium,large',
            'price' => 'required|numeric|min:0',
        ]);

        $batch = BatchEggs::findOrFail($id);
        $batch->update($request->all());

        return redirect()->back()->with('success', 'Batch updated successfully!');
    }

    public function destroy($id)
    {
        $batch = BatchEggs::findOrFail($id);
        $batch->delete();

        return redirect()->back()->with('success', 'Batch deleted successfully!');
    }


}
