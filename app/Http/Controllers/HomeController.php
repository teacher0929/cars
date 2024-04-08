<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Location;

class HomeController extends Controller
{
    public function index()
    {
        $locations = Location::withCount('cars')
            ->orderBy('name')
            ->get();

        $brands = Brand::with('brandModels')
            ->withCount('cars')
            ->orderBy('name')
            ->get();

        return view('home.index')
            ->with([
                'locations' => $locations,
                'brands' => $brands,
            ]);
    }
}
