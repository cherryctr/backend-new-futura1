<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $fillable = [
       'user_id', 'type','type_property','market','title','area','area','luas_bangunan','luas_keseluruhan','kamar_tidur','kamar_mandi','lantai','sertifikat','pemandangan','listrik','furnish','air','harga','thumbnail','detail_thumbnail','deskripsi'
    ];

    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/img/' . $value),
        );
    }

    // protected function detailThumbnail(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => asset('/img/' . $value),
    //     );
    // }
}
