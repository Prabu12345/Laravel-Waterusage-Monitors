<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = \App\Models\WaterUsage::where('user_id', auth()->id())->latest()->take(10)->get();
        return view('dashboard.index', compact('items'));
    }

    public function tips()
    {
        return view('dashboard.tips');
    }
}
