<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Color;
use App\Models\Location;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'user' => 'nullable|integer|min:1',
            'location' => 'nullable|integer|min:1',
            'brand' => 'nullable|integer|min:1',
            'brandModel' => 'nullable|integer|min:1',
            'color' => 'nullable|integer|min:1',
            'year' => 'nullable|integer|min:1',
            'minPrice' => 'nullable|numeric|min:0',
            'maxPrice' => 'nullable|numeric|min:0',
            'credit' => 'nullable|boolean',
            'exchange' => 'nullable|boolean',
            'hasImage' => 'nullable|boolean',
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_user = $request->has('user') ? $request->user : null;
        $f_location = $request->has('location') ? $request->location : null;
        $f_brand = $request->has('brand') ? $request->brand : null;
        $f_brandModel = $request->has('brandModel') ? $request->brandModel : null;
        $f_color = $request->has('color') ? $request->color : null;
        $f_year = $request->has('year') ? $request->year : null;
        $f_minPrice = $request->has('minPrice') ? $request->minPrice : null;
        $f_maxPrice = $request->has('maxPrice') ? $request->maxPrice : null;
        $f_credit = $request->has('credit') ? $request->credit : 0;
        $f_exchange = $request->has('exchange') ? $request->exchange : 0;
        $f_hasImage = $request->has('hasImage') ? $request->hasImage : 0;

        $objs = Car::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where('title', 'like', '%' . $f_q . '%');
        })
            ->when(isset($f_user), function ($query) use ($f_user) {
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
            ->when(isset($f_minPrice), function ($query) use ($f_minPrice) {
                return $query->where('price', '>=', $f_minPrice);
            })
            ->when(isset($f_maxPrice), function ($query) use ($f_maxPrice) {
                return $query->where('price', '<=', $f_maxPrice);
            })
            ->when($f_credit, function ($query) {
                return $query->where('credit', 1);
            })
            ->when($f_exchange, function ($query) {
                return $query->where('exchange', 1);
            })
            ->when($f_hasImage, function ($query) {
                return $query->whereNotNull('image');
            })
            ->with('user', 'location', 'brand', 'brandModel', 'year', 'color')
            ->orderBy('id', 'desc') // desc => Z-A, asc => A-Z
            ->paginate(40)
            ->withQueryString();

        $users = User::withCount('cars')
            ->orderBy('name')
            ->get();
        $locations = Location::withCount('cars')
            ->orderBy('name')
            ->get();
        $brands = Brand::with('brandModels')
            ->withCount('cars')
            ->orderBy('name')
            ->get();
        $colors = Color::withCount('cars')
            ->orderBy('name')
            ->get();
        $years = Year::withCount('cars')
            ->orderBy('name')
            ->get();

        return view('car.index')
            ->with([
                'objs' => $objs,
                'users' => $users,
                'locations' => $locations,
                'brands' => $brands,
                'colors' => $colors,
                'years' => $years,
                'f_q' => $f_q,
                'f_user' => $f_user,
                'f_location' => $f_location,
                'f_brand' => $f_brand,
                'f_brandModel' => $f_brandModel,
                'f_color' => $f_color,
                'f_year' => $f_year,
                'f_minPrice' => $f_minPrice,
                'f_maxPrice' => $f_maxPrice,
                'f_credit' => $f_credit,
                'f_exchange' => $f_exchange,
                'f_hasImage' => $f_hasImage,
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
