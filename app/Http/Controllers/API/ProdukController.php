<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Validator;
use Auth;
use File;

class ProdukController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function product_bagas()
    {
        //
        $produkbagas = Produk::where('user_id',1)->get();
        // dd($produkid);
        return response()->json([
            'success'   => true,
            'message'   => 'List Data',
            'products'  => $produkbagas
        ], 200);
    }



    public function product_rafli()
    {
        //
        $produkrafli = Produk::where('user_id',2)->get();
        // dd($produkid);
        return response()->json([
            'success'   => true,
            'message'   => 'List Data',
            'products'  => $produkrafli
        ], 200);
    }

   
}
