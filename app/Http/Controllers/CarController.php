<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarFormRequest;
use App\Models\Car;

class CarController extends Controller
{
    public function index() {
        $cars = Car::all();
        return view('car.index', ['cars' => $cars]);
    }

    public function show($id) {
        $car = Car::findOrFail($id);
        return view('car.show', ['car' => $car]);
    }

    public function edit($id) {
        $car = Car::findOrFail($id);
        return view('car.edit', ['car' => $car]);
    }

    public function update(CarFormRequest $request, $id) {
        $car = Car::findOrFail($id);
        $car->brand = $request->input('brand');
        $car->type = $request->input('type') === null ? "" : $request->input('type') ;
        $car->comment = $request->input('comment') === null ? "" : $request->input('comment') ;
        $car->save();
        return view('car.details', ['car' => $car]);
    }

    public function details($id) {
        $car = Car::findOrFail($id);
        return view('car.details', ['car' => $car]);
    }
}
