<?php

namespace App\Http\Controllers;

use App\Models\Laptops;
use Illuminate\Http\Request;

class LaptopController extends Controller
{

    public function index()
    {
        $laptops = Laptops::all();
        return response()->json($laptops);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'ram_size' => 'required|integer',
            'storage_size' => 'required|integer',
            'processor' => 'required|string',
        ]);

        $laptop = Laptops::create($validatedData);
        return response()->json($laptop, 201);}


    public function show(Laptops $laptop)
    {
        if (!$laptop) {
            return response()->json(['message' => 'Laptop not found'], 404);
        }
        return response()->json($laptop);
    }

    public function update(Request $request, Laptops $laptop)
    {
        $validatedData = $request->validate([
            'brand' => 'sometimes|required|string',
            'model' => 'sometimes|required|string',
            'ram_size' => 'sometimes|required|integer',
            'storage_size' => 'sometimes|required|integer',
            'processor' => 'sometimes|required|string',
        ]);

        $laptop->update($validatedData);
        return response()->json($laptop);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laptops $laptop)
    {
        $laptop->delete();
        return response()->json(['message' => 'Laptop deleted successfully'], 204);
    }
}
