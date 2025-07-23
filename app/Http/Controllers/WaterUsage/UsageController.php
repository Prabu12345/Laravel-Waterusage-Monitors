<?php

namespace App\Http\Controllers\WaterUsage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);

        $query = \App\Models\WaterUsage::where('user_id', auth()->id());

        // Filtering
        if ($request->filled('start_date')) {
            $query->where('start_date', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->where('end_date', '<=', $request->input('end_date'));
        }
        if ($request->filled('min_meter_usage')) {
            $query->where('meter_usage', '>=', $request->input('min_meter_usage'));
        }
        if ($request->filled('max_meter_usage')) {
            $query->where('meter_usage', '<=', $request->input('max_meter_usage'));
        }
        if ($request->filled('sort_by')) {
            $sortBy = $request->input('sort_by');
            $sortDirection = $request->input('sort_direction', 'asc');
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $items = $query->paginate($perPage)->appends($request->except('page'));

        return view('waterUsage.index', compact('items'));
    }

    public function create()
    {
        return view('waterUsage.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'meter_usage' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        \App\Models\WaterUsage::create($data);

        return redirect()->route('waterusage.index')->with('success', 'Data created successfully.');
    }

    public function edit($id)
    {
        $item = \App\Models\WaterUsage::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        return view('waterUsage.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'meter_usage' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $item = \App\Models\WaterUsage::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        $item->update($request->all());

        return redirect()->route('waterusage.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $item = \App\Models\WaterUsage::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        $item->delete();

        return redirect()->route('waterusage.index')->with('success', 'Data deleted successfully.');
    }
}
