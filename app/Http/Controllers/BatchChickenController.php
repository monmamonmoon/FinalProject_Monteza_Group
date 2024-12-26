<?php

namespace App\Http\Controllers;

use App\Models\BatchChicken;
use DB;
use Illuminate\Http\Request;

class BatchChickenController extends Controller
{
    public function index()
    {
        $batches = BatchChicken::all();
        return view('admin.chicken_batches.index', compact('batches'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'batch_name' => 'required|string|max:255',
            'arrival_date' => 'required|date',
            'supplier_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'status' => 'nullable|string|in:Processing,Complete',
            'batch_images' => 'nullable|image|max:2048', // Optional image upload
        ]);

        // Define the upload directory
        $uploadDir = public_path('upload/batch_images');

        // Check if the directory exists; if not, create it
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Handle image upload if provided
        $batchImagePath = null;
        if ($request->hasFile('batch_images')) {
            $image = $request->file('batch_images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($uploadDir, $imageName);
            $batchImagePath = 'upload/batch_images/' . $imageName; // Path to save in the database
        }

        // Create a new batch record in the database
        BatchChicken::create([
            'batch_name' => $request->batch_name,
            'arrival_date' => $request->arrival_date,
            'supplier_name' => $request->supplier_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'status' => $request->status ?? 'Processing',
            'batch_image' => $batchImagePath, // Save the public path
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Batch created successfully!');
    }


    public function update(Request $request, $batchId)
    {
        // Validate the incoming request data
        $request->validate([
            'batch_name' => 'required|string|max:255',
            'arrival_date' => 'required|date',
            'supplier_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'status' => 'nullable|string|in:Processing,Complete',
            'batch_image' => 'nullable|image|max:2048', // Optional image upload
        ]);

        // Find the batch by ID
        $batch = BatchChicken::findOrFail($batchId);

        // Define the upload directory
        $uploadDir = public_path('upload/batch_images');

        // Check if the directory exists; if not, create it
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Handle image upload if provided
        $batchImagePath = $batch->batch_image; // Retain the old image if no new one is uploaded
        if ($request->hasFile('batch_image')) {
            // Delete the old image if it exists
            if ($batchImagePath && file_exists(public_path($batchImagePath))) {
                unlink(public_path($batchImagePath));
            }

            $image = $request->file('batch_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($uploadDir, $imageName);
            $batchImagePath = 'upload/batch_images/' . $imageName; // Path to save in the database
        }

        // Update the batch record in the database
        $batch->update([
            'batch_name' => $request->batch_name,
            'arrival_date' => $request->arrival_date,
            'supplier_name' => $request->supplier_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'status' => $request->status ?? 'Processing',
            'batch_image' => $batchImagePath, // Save the public path
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Batch updated successfully!');
    }


    public function destroy($batchId)
    {
        // Find the batch by ID
        $batch = BatchChicken::findOrFail($batchId);

        // Check if the batch has an associated image and delete it
        if ($batch->batch_image && file_exists(public_path($batch->batch_image))) {
            unlink(public_path($batch->batch_image));
        }

        // Delete the batch record from the database
        $batch->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Batch deleted successfully!');
    }



}
