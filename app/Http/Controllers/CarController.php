<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'status' => 'required|in:available,unavailable',
            'image' => 'nullable|image|max:2048',
        ]);

        $car = new Car($request->except('image'));

        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('car_images');
        }

        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'status' => 'required|in:available,unavailable',
            'image' => 'nullable|image|max:2048',
        ]);

        $car->fill($request->except('image'));

        if ($request->hasFile('image')) {
            if ($car->image) Storage::delete($car->image);
            $car->image = $request->file('image')->store('car_images');
        }

        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        if ($car->image) Storage::delete($car->image);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
