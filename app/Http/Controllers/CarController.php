<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Location;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'user' => 'nullable|integer|min:1',
            'location' => 'nullable|integer|min:1',
            'brand' => 'nullable|integer|min:1',
            'brandModel' => 'nullable|integer|min:1',
            'color' => 'nullable|integer|min:1',
            'year' => 'nullable|integer|min:1',
        ]);
        $f_user = $request->has('user') ? $request->user : null;
        $f_location = $request->has('location') ? $request->location : null;
        $f_brand = $request->has('brand') ? $request->brand : null;
        $f_brandModel = $request->has('brandModel') ? $request->brandModel : null;
        $f_color = $request->has('color') ? $request->color : null;
        $f_year = $request->has('year') ? $request->year : null;

        $objs = Car::when(isset($f_user), function ($query) use ($f_user) {
            return $query->where('user_id', $f_user);
        })
            ->when(isset($f_location), function ($query) use ($f_location) {
                return $query->where('location_id', $f_location);
            })
            ->when(isset($f_brand), function ($query) use ($f_brand) {
                return $query->where('brand_id', $f_brand);
            })
            ->when(isset($f_brandModel), function ($query) use ($f_brandModel) {
                return $query->where('brand_model_id', $f_brandModel);
            })
            ->when(isset($f_color), function ($query) use ($f_color) {
                return $query->where('color_id', $f_color);
            })
            ->when(isset($f_year), function ($query) use ($f_year) {
                return $query->where('year_id', $f_year);
            })
            ->orderBy('id', 'desc')
            ->paginate(40)
            ->withQueryString();

        $locations = Location::withCount('cars')
            ->orderBy('name')
            ->get();

        $brands = Brand::with('brandModels')
            ->withCount('cars')
            ->orderBy('name')
            ->get();

        return view('car.index')
            ->with([
                'objs' => $objs,
                'locations' => $locations,
                'brands' => $brands,
                'f_user' => $f_user,
                'f_location' => $f_location,
                'f_brand' => $f_brand,
                'f_brandModel' => $f_brandModel,
                'f_color' => $f_color,
                'f_year' => $f_year,
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
