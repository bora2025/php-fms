<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetManagementController extends Controller
{
    public function index()
    {
        return view('budget-management');
    }
}
