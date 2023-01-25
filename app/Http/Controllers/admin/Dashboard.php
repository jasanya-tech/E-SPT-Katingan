<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
