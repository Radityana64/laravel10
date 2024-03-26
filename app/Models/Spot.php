<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageAsset(){
        if($this->image){
            return asset('storage/ImageSpots/'.$this->image);
        }

        return 'https://placehold.co/200x400?text=Gambar+Kosong';
    }
}

