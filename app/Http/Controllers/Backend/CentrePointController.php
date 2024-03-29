<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Centre_Point;

class CentrePointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('backend.CentrePoint.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        return view ('backend.CentrePoint.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'koordinat'
        ]);

        $centerPoint = new Centre_Point;
        $centerPoint-> koordinat = $request->input('koordinat');
        $centerPoint->save();

        if($centerPoint){
            return redirect()->route('centre-point.index')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('centre-point.index')->with('error','Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centre_Point $centrePoint)
    {
        $centrePoint = Centre_Point::findOrFail($centrePoint->id);
        return view('backend.CentrePoint.edit', ['centrePoint'=>$centrePoint]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centre_Point $centrePoint)
    {
        $centrePoint = Centre_Point::findOrFail($centrePoint->id);
        $centrePoint -> koordinat = $request->input('koordinat');
        $centrePoint -> update();

        if($centrePoint){
            return redirect()->route('centre-point.index')->with('success','Data berhasil diupdate');
        }else{
            return redirect()->route('centre-point.index')->with('error','Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $centrePoint = Centre_Point::findOrFail($id);
        $centrePoint ->delete();
        return redirect()->back();
    }
}