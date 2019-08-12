<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('app::index');
    }

    public function category ($category) {
        return view('app::category');
    }

    public function courses()
    {
        return view('app::courses');
    }

    public function course($course)
    {
        return view('app::course');
    }

    public function me()
    {
        return view('app::me');
    }
}
