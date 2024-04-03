<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::with(['brandModels' => function ($query) {
            $query->withCount('cars');
        }])
            ->withCount('cars')
            ->orderBy('name')
            ->get();

        return view('index')
            ->with([
                'brands' => $brands,
            ]);
    }
}
