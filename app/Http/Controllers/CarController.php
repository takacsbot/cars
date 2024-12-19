<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('owner')->get();
        return response()->json($cars);
    }
        
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validator= Validator::make($request->all(),[
    'brand' => 'required|string',
    'model' => 'required|string',
    'license_plate' => 'required|string',
    'owner_id' => 'required|exists:owners,id',
    
    ]);
    if($validator->fails()){
    return response()->json($validator->errors(), 422);
    };
    
    $cars = Car::create($request->all());
    return response()->json($car, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::with('owner')->find($id);
        if(!$car){
            return response()->json(['message' => 'Car not found'], 404);
        }
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
