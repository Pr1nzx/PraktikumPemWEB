<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', ['items' => $items]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'gender' => 'nullable|string|in:male,female',
            'file' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048', // vvalidasi file
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
            $validatedData['file_path'] = $filePath;
        }

        Item::create($validatedData);

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'gender' => 'nullable|string|in:male,female',
            'file' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048', // validasi fiel
        ]);

        $item = Item::findOrFail($id);

        if ($request->hasFile('file')) {
            if ($item->file_path) {
                Storage::disk('public')->delete($item->file_path); //mbuat ngehapus file ( ketika diupdate)
            }
            $filePath = $request->file('file')->store('uploads', 'public');
            $validatedData['file_path'] = $filePath;
        }

        $item->update($validatedData);

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        if ($item->file_path) {
            Storage::disk('public')->delete($item->file_path); 
        }
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
