<?php

namespace App\Http\Controllers;

use App\Models\Centre_Point;
use App\Models\Spot;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function belum_buat()
    {
        return view('layouts.404');
    }

    public function map_tugas1()
    {
        return view('leaflet.map-tugas1');
    }
    public function spots(){
        $centerPoint = Center_Point::get()->first();
        $spot =Spot::get();

        return view('frontend.home',[
            'centerPoint'=>$centerPoint,
            'spot'=>$spot
        ]);
    }
}
