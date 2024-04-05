<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'brand' => 'nullable|integer|min:1',
            'brandModel' => 'nullable|integer|min:1',
        ]);
        $f_brand = $request->has('brand') ? $request->brand : null;
        $f_brandModel = $request->has('brandModel') ? $request->brandModel : null;

        $objs = Car::when(isset($f_brand), function ($query) use ($f_brand) {
            return $query->where('brand_id', $f_brand);
        })
            ->when(isset($f_brandModel), function ($query) use ($f_brandModel) {
                return $query->where('brand_model_id', $f_brandModel);
            })
            ->orderBy('id', 'desc')
            ->paginate(40)
            ->withQueryString();


        return view('car.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function show($id)
    {
        $obj = Car::findOrFail($id);

        return view('car.show')
            ->with([
                'obj' => $obj,
            ]);
    }
}
