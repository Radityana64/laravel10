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
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
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
        $centerPoint = Centre_Point::get()->first();
        $spot = Spot::get();

        return view('hasil.home',[
            'centerPoint'=>$centerPoint,
            'spot'=>$spot
        ]);
    }
    public function detailSpot($id){
        $spot = Spot::findOrFail($id);
        return view('hasil.detail',['spot'=>$spot]);
    }
}
