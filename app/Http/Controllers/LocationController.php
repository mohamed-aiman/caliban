<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function index(Request $request)
    {
        $locations = $this->location
            ->orderBy('name', 'asc')
            ->get();

        return view('locations.index', compact('locations'));
    }

    public function show(Request $request, $slug)
    {
        $location = $this->location
            ->where('slug', $slug)
            ->firstOrFail();
        return view('locations.show', compact('location'));
    }

    public function create(Request $request)
    {
        $locations = $this->location->select('id','name','type')
            ->orderBy('name', 'asc')
            ->get();

        return view('locations.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
        ]);

        $location = $this->location->create([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        return redirect()->route('locations.show', $location->slug);
    }

    public function edit(Request $request, $slug)
    {
        $location = $this->location
            ->where('slug', $slug)
            ->firstOrFail();
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
        ]);

        $location = $this->location
            ->where('slug', $slug)
            ->firstOrFail();

        $location->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        return redirect()->route('locations.show', $location->slug);
    }

    public function destroy(Request $request, $slug)
    {
        $location = $this->location
            ->where('slug', $slug)
            ->firstOrFail();

        $location->delete();

        return redirect()->route('locations.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string',
        ]);

        $locations = $this->location->select('id','name','type')
            ->where('name', 'like', '%'.$request->q.'%')
            ->orderBy('name', 'asc')
            ->get();

        return view('locations.index', compact('locations'));
    }

    public function searchByType(Request $request, $type)
    {
        $locations = $this->location->select('id','name','type')
            ->where('type', $type)
            ->orderBy('name', 'asc')
            ->get();

        return view('locations.index', compact('locations'));
    }
}
