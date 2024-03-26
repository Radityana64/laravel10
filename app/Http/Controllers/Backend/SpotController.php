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

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.Spot.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centerPoint = Center_Point::get()->first();
        return view('backend.Spot.create', ['centerPoint'=> $centerPoint]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_dinas'=>'required',
            'koordinat'=>'required',
            'alamat'=>'required',
            'deskripsi'=>'required',
            'tipe'=>'required',
            'gambar' => 'file|image|mimes:png,jpg,jpeg'
        ]);
        
        $spot = new Spot;
        if($request->hasFile('gambar')){

            $file = $request->file('gambar');
            $file -> storeAs('public/GambarSpots',$file->hashName());
            $spot-> image = $file->hashName();
        }

        $spot->nama_dinas = $request->input('nama_dinas');
        $spot->koordinat = $request->input('koordinat');
        $spot->alamat = $request->input('alamat');
        $spot->deskripsi = $request->input('deskripsi');
        $spot->tipe = $request->input('tipe');
        $spot->save();

         if($spot){
            return redirect()->route('spot.index')->with('success','Data berhasil disimpan');
        }else{
            return redirect()->route('spot.index')->with('error','Data gagal disimpan');
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
    public function edit(Spot $spot)
    {
        $centerPoint = Center_Point::get()->first();
        return view('backend.Spot.edit',[
            'centerPoint' => $centerPoint,
            'spot'=>$spot
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spot $spot)
    {
        $this->validate($request,[
            'nama_dinas'=>'required',
            'koordinat'=>'required',
            'alamat'=>'required',
            'deskripsi'=>'required',
            'tipe'=>'required',
            'gambar' => 'file|gambar|mimes:png,jpg,jpeg'
        ]);
    

    if($request->hasFile('gambar')){
        Storage::disk('local')->delete('public/GambarSpots/' . ($spot->gambar));
        $file = $request->file('Gambar');
        $file->storeAs('public/GambarSpots', $file->hashName());
        $spot->gambar = $file->hashName();
    }

        $spot->nama_dinas = $request->input('nama_dinas');
        $spot->koordinat = $request->input('koordinat');
        $spot->alamat = $request->input('alamat');
        $spot->deskripsi = $request->input('deskripsi');
        $spot->tipe = $request->input('tipe');
        $spot->update();

     if ($spot) {
            return to_route('spot.index')->with('success', 'Data berhasil diupdate');
        } else {
            return to_route('spot.index')->with('error', 'Data gagal diupdate');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $spot = Spot::findOrFail($id);
        if (File::exists('upload/spots/' . $spot->gambar)) {
            File::delete('upload/spots/' . $spot->gambar);
        }

        // Storage::disk('local')->delete('public/ImageSpots/' . ($spot->image));
        $spot ->delete();
        return redirect()->back(); 
    }
}
