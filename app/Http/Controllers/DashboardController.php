<?php

namespace App\Http\Controllers;

use App\Category;
use App\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.master');
    }


}
