<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search === "name")
            return Country::all();
        return Country::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'season' => 'required|max:255'

        ]);
        return Country::create($request->all());
    }

    public function show($id, Request $request)
    {
        if ($request->embed === "comments")
            return Country::with('comments')->find($id);
        return Country::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'season' => 'required|max:255',

        ]);
        $Country = Country::find($id);
        $Country->update($request->all());
        return $Country;
    }

    public function destroy($id)
    {
        return Country::destroy($id) === 0
            ? response(["status" => "failure"], 404)
            : response(["status" => "success"], 200);
    }
}
