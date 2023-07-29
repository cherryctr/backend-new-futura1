<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailgambar extends Model
{
    use HasFactory;

    protected $table = 'detailgambars';
    protected $fillable = [
       'produk_id', 'thumbnail1', 'thumbnail2', 'thumbnail3', 'thumbnail4'
    ];
}
