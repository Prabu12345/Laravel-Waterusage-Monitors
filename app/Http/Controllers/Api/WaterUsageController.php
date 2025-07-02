<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WaterUsage;

class WaterUsageController extends Controller
{
    public function index(Request $request)
    {
        // get all water usage records response
        $waterUsages = WaterUsage::all();
        return response()->json([
            'message' => 'Water usage records retrieved successfully',
            'data' => $waterUsages
        ]);
    }

    public function store(Request $request)
    {
        // store water usage data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'meter_usage' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $waterUsage = WaterUsage::create($request->all());
        return response()->json([
            'message' => 'Water usage record created successfully',
            'data' => $waterUsage
        ]);
    }

    public function show($id)
    {
        // Logic to retrieve a specific water usage record
        if (!is_numeric($id)) {
            return response()->json(['message' => 'Invalid ID format'], 400);
        }
        // Find the water usage record by ID
        if (!$id) {
            return response()->json(['message' => 'ID is required'], 400);
        }
        if ($id <= 0) {
            return response()->json(['message' => 'ID must be a positive integer'], 400);
        }
        if (!WaterUsage::where('id', $id)->exists()) {
            return response()->json(['message' => 'Water usage record not found'], 404);
        }

        $waterUsage = WaterUsage::findOrFail($id);
        return response()->json([
            'message' => 'Water usage record retrieved successfully',
            'data' => $waterUsage
        ]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific water usage record
        $waterUsage = WaterUsage::findOrFail($id);

        if (!$waterUsage) {
            return response()->json(['message' => 'Water usage record not found'], 404);
        }
        if (!is_numeric($id)) {
            return response()->json(['message' => 'Invalid ID format'], 400);
        }
        if ($id <= 0) {
            return response()->json(['message' => 'ID must be a positive integer'], 400);
        }

        // validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'meter_usage' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $waterUsage->update($request->all());
        return response()->json([
            'message' => 'Water usage record updated successfully',
            'data' => $waterUsage
        ]);
    }

    public function destroy($id)
    {
        // Logic to delete a specific water usage record
        $waterUsage = WaterUsage::findOrFail($id);
        if (!$waterUsage) {
            return response()->json(['message' => 'Water usage record not found'], 404);
        }
        if (!is_numeric($id)) {
            return response()->json(['message' => 'Invalid ID format'], 400);
        }
        if ($id <= 0) {
            return response()->json(['message' => 'ID must be a positive integer'], 400);
        }
        if (!$waterUsage->exists()) {
            return response()->json(['message' => 'Water usage record not found'], 404);
        }
        if (!$waterUsage->user_id) {
            return response()->json(['message' => 'User ID is required'], 400);
        }
        $waterUsage->delete();
        return response()->json([
            'message' => 'Water usage record deleted successfully'
        ]);
    }
}
