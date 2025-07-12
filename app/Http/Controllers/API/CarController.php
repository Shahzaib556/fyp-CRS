<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    // List all cars
    public function index()
    {
        return Car::all();
    }

    // Add a new car
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|digits:4|integer',
            'price_per_day' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'availability' => 'required|in:available,rented'
        ]);

        $car = new Car($request->except('image'));

        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('cars');
        }

        $car->save();

        return response()->json(['message' => 'Car added successfully', 'car' => $car]);
    }

    // Show single car (optional)
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car);
    }

    // Update a car
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string',
            'model' => 'sometimes|required|string',
            'year' => 'sometimes|required|digits:4|integer',
            'price_per_day' => 'sometimes|required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'availability' => 'sometimes|required|in:available,rented'
        ]);

        $car->fill($request->except('image'));

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::delete($car->image);
            }
            $car->image = $request->file('image')->store('cars');
        }

        $car->save();

        return response()->json(['message' => 'Car updated successfully', 'car' => $car]);
    }

    // Delete a car
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        if ($car->image) {
            Storage::delete($car->image);
        }

        $car->delete();

        return response()->json(['message' => 'Car deleted successfully']);
    }
}