<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;
use Auth;
use File;


class ProdukController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produkid = Produk::where('user_id',Auth::user()->id)->get();
        // dd($produkid);
        return view('layouts.listproduk.index',compact('produkid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.listproduk.add');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        // Validate the incoming request data
            $validator = $this->validate($request, [
            'type'  => 'required|string',
            'type_property'  => 'required|string',
            'market'  => 'required|string',
            'title' => 'required|string|max:255',
            'area'  => 'required|string',
            // 'slug'  => 'required|string',
            'luas_bangunan'  => 'required|string',
            'luas_keseluruhan'  => 'required|string',
            'kamar_tidur'  => 'required|numeric',
            'kamar_mandi'  => 'required|numeric',
            'lantai'  => 'required|numeric',
            'sertifikat'  => 'required|string',
            'pemandangan'  => 'required|string',
            'listrik'  => 'required|string',
            'furnish'  => 'required|string',
            'air'  => 'required|string',
            'harga' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:204822',
            'detail_thumbnail' => 'required', // Up to 5 images allowed
            'detail_thumbnail.*' => 'image|mimes:jpeg,png,jpg|max:204909',
            'deskripsi' => 'required|string',
        ]);

        // // Check if the validation fails
        // if ($validator->fails()) {
        //     // If the validation fails, return the error response.
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        // If the validation passes, proceed to save the property data in the database.
        // Assuming you have an Eloquent model for the property, and the thumbnail is being stored in the 'thumbnails' folder:

        $produk = new Produk([
            'user_id' => Auth::user()->id,
            'type' => $request->input('type'),
            'type_property' => $request->input('type_property'),
            'market' => $request->input('market'),
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'area' => $request->input('area'),
            'luas_bangunan' => $request->input('luas_bangunan'),
            'luas_keseluruhan' => $request->input('luas_keseluruhan'),
            'kamar_tidur' => $request->input('kamar_tidur'),
            'kamar_mandi' => $request->input('kamar_mandi'),
            'lantai' => $request->input('lantai'),
            'sertifikat' => $request->input('sertifikat'),
            'pemandangan' => $request->input('pemandangan'),
            'listrik' => $request->input('listrik'),
            'furnish' => $request->input('furnish'),
            'air' => $request->input('air'),
            'harga' => $request->input('harga'),
            'thumbnail' => $request->input('thumbnail'),
            'detail_thumbnail' => $request->input('detail_thumbnail'),
            'deskripsi' => $request->input('deskripsi'),
        ]);


         //upload image
        if ($request->hasFile('thumbnail')) {
            // $post->delete_image();
            $image = $request->file('thumbnail');
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $image->hashName();
            $image->move('img', $name);
            $produk->thumbnail = $name;
        }

         if ($request->hasFile('detail_thumbnail')) {
            foreach ($request->file('detail_thumbnail') as $image) {
                // $image = $request->file('tl');
                // echo $photo_profile;exit;


                $name = rand(1000, 9999) . $image->hashName();
                $image->move('img', $name);


                $data[] = [
                    'url' => asset('img/' . $name),
                ];

            }
        }
        $produk->slug = Str::slug($request->input('title'));
        // dd($produk->slug);
        $produk->detail_thumbnail = json_encode($data,JSON_UNESCAPED_SLASHES);
        // dd($produk);
        $produk->save($validator);


        // Return a success response


        if($produk){
            //redirect dengan pesan sukses
            return redirect()->route('admin.produk.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.produk.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
        // $auth = Auth::user()->id;
        $produkid = Produk::find($id);
        // dd($produkid);
        return view('layouts.listproduk.edit',compact('produkid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        //

        // // Check if the validation fails


        // If the validation passes, proceed to save the property data in the database.
        // Assuming you have an Eloquent model for the property, and the thumbnail is being stored in the 'thumbnails' folder:

        $produk = Produk::findOrFail($id);
        $produk->user_id = Auth::user()->id;
        $produk->type = $request->get('type');
        $produk->type_property = $request->get('type_property');
        $produk->market = $request->get('market');
        $produk->title = $request->get('title');
        $produk->area = $request->get('area');
        $produk->luas_bangunan = $request->get('luas_bangunan');
        $produk->luas_keseluruhan = $request->get('luas_keseluruhan');
        $produk->kamar_tidur = $request->get('kamar_tidur');
        $produk->kamar_mandi = $request->get('kamar_mandi');
        $produk->lantai = $request->get('lantai');
        $produk->sertifikat = $request->get('sertifikat');
        $produk->pemandangan = $request->get('pemandangan');
        $produk->listrik = $request->get('listrik');
        $produk->furnish = $request->get('furnish');
        $produk->air = $request->get('air');
        $produk->harga = $request->get('harga');
        $produk->thumbnail= $request->get('thumbnail_old');
        $produk->deskripsi = $request->get('deskripsi');
       //dd($produk);



        if ($request->hasFile('thumbnail')) {
            // $post->delete_image();

            if($request->file('thumbnail') == ""){
                $image = $request->file('thumbnail_old');
            }else{
                 $image = $request->file('thumbnail');
            }
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $image->hashName();
            $image->move('img', $name);
            $product->thumbnail = $name;
            // dd($category);
        }

        $produk->update();


        // Return a success response


        if($produk){
            //redirect dengan pesan sukses
            return redirect()->route('admin.produk.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.produk.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        if($produk){
            //redirect dengan pesan sukses
            return redirect()->route('admin.produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.produk.index')->with(['error' => 'Data Gagal Dihapus!']);
        }

    }
}
