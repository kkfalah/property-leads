<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LeadActivity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLeads = Lead::count();
        $totalActivities = LeadActivity::count();


        return view('dashboard.index', compact('totalLeads', 'totalActivities'));
    }
}
