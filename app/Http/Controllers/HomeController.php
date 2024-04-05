<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::with('brandModels')
            ->withCount('cars')
            ->orderBy('name')
            ->get();

        return view('home.index')
            ->with([
                'brands' => $brands,
            ]);
    }
}
