<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Center_Point;
use App\Models\Spot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DataController extends Controller
{
    public function centerpoint()
    {
        $centerpoint = Center_Point::latest()->get(); 
        return datatables()->of($centerpoint)
        ->addColumn('action', 'backend.CenterPoint.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }

    public function spot()
    {
        $spot = Spot::latest()->get(); 
        return datatables()->of($spot)
        ->addColumn('action', 'backend.Spot.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }
}
