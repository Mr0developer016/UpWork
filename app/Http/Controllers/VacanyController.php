<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vacancy;
use App\Models\Experience;
use App\Models\Location;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;

class vacancyController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'user' => 'nullable|integer|min:1',
            'location' => 'nullable|integer|min:1',
            'category' => 'nullable|integer|min:1',
            'experiences' => 'nullable|array|min:0',
            'experiences.*' => 'nullable|integer|min:1',
            'contacts' => 'nullable|array|min:0',
            'contacts.*' => 'nullable|integer|min:1',
            'minPrice' => 'nullable|numeric|min:0',
            'maxPrice' => 'nullable|numeric|min:0',
            'sortBy' => 'nullable|in:newToOld,lowToHigh,highToLow',
        ]);
        // return $request->all();
        $f_q = $request->has('q') ? $request->q : null;
        $f_user = $request->has('user') ? $request->user : null;
        $f_location = $request->has('location') ? $request->location : null;
        $f_category = $request->has('category') ? $request->category : null;
        $f_experiences = $request->has('experiences') ? $request->experiences : [];
        $f_contacts = $request->has('contacts') ? $request->contacts : [];
        $f_minPrice = $request->has('minPrice') ? $request->minPrice : null;
        $f_maxPrice = $request->has('maxPrice') ? $request->maxPrice : null;
        $f_sortBy = $request->has('sortBy') ? $request->sortBy : null;

        $objs = Vacancy::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where(function ($query) use ($f_q) {
                $query->where('title', 'like', '%' . $f_q . '%')
                    ->orWhere('body', 'like', '%' . $f_q . '%');
            });
        })
            ->when(isset($f_user), function ($query) use ($f_user) {
                return $query->where('user_id', $f_user);
            })
            ->when(isset($f_location), function ($query) use ($f_location) {
                return $query->where('location_id', $f_location);
            })
            ->when(isset($f_category), function ($query) use ($f_category) {
                return $query->where('category_id', $f_category);
            })
            ->when(count($f_experiences) > 0, function ($query) use ($f_experiences) {
                return $query->whereIn('experience_id', $f_experiences);
            })
            ->when(count($f_contacts) > 0, function ($query) use ($f_contacts) {
                return $query->whereIn('contact_id', $f_contacts);
            })
            ->when(isset($f_minPrice), function ($query) use ($f_minPrice) {
                return $query->where('price', '>=', $f_minPrice);
            })
            ->when(isset($f_maxPrice), function ($query) use ($f_maxPrice) {
                return $query->where('price', '<=', $f_maxPrice);
            })
            ->with('user', 'location', 'category', 'experience', 'contact')
            ->when(isset($f_sortBy), function ($query) use ($f_sortBy) {
                if ($f_sortBy == 'lowToHigh') {
                    return $query->orderBy('price');
                } elseif ($f_sortBy == 'highToLow') {
                    return $query->orderBy('price', 'desc');
                } else {
                    return $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                return $query->orderBy('id', 'desc'); // desc => Z-A, asc => A-Z
            })
            ->paginate(40)
            ->withQueryString();

        $users = User::withCount('vacancies')
            ->orderBy('name')
            ->get();
        $locations = Location::withCount('vacancies')
            ->orderBy('name')
            ->get();
        $categorys = Category::with('categoryModels')
            ->withCount('vacancies')
            ->orderBy('name')
            ->get();
        $experiences = Experience::withCount('vacancies')
            ->orderBy('name')
            ->get();
        $contacts = Contact::withCount('vacancies')
            ->orderBy('name')
            ->get();

        return view('vacancy.index')
            ->with([
                'objs' => $objs,
                'users' => $users,
                'locations' => $locations,
                'categories' => $categories,
                'experiences' => $experiences,
                'contacts' => $contacts,
                'f_q' => $f_q,
                'f_user' => $f_user,
                'f_location' => $f_location,
                'f_category' => $f_category,
                'f_categoryModel' => $f_categoryModel,
                'f_experiences' => $f_experiences,
                'f_contacts' => $f_contacts,
                'f_minPrice' => $f_minPrice,
                'f_maxPrice' => $f_maxPrice,
                'f_sortBy' => $f_sortBy,
            ]);
    }


    public function show($id)
    {
        $obj = Vacancy::findOrFail($id);

        return view('vacancy.show')
            ->with([
                'obj' => $obj,
            ]);
    }
}
