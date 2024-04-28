<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;

class HomeController extends Controller
{
    public function index()
    {
        $locations = Location::withCount('vacancies')
            ->orderBy('name')
            ->get();

        $categories = category::with('categoryModels')
            ->withCount('vacancies')
            ->orderBy('name')
            ->get();

        return view('home.index')
            ->with([
                'locations' => $locations,
                'categories' => $categories,
            ]);
    }
}
