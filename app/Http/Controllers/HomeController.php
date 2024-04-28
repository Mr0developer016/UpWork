<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all locations with the count of associated vacancies
        $locations = Location::withCount('vacancies')
                             ->orderBy('name')
                             ->get();

        // Fetch all categories with the count of associated vacancies
        $categories = Category::withCount('vacancies')
                             ->orderBy('name')
                             ->get();

        // Pass locations and categories data to the view
        return view('home.index', compact('locations', 'categories'));
    }
}
