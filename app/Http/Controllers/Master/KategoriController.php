<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //select * from kategori
        $list_content = DB::table('kategori')->get();

        return view('master/listkategori',compact('list_content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master/formkategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode_kategori = $request->input('code');
        $name = $request->input('name');
        
        DB::table('kategori')->insert(['kode' => $kode_kategori, 'nama' => $name]);

        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //select * from kategori where id = 1 limit 1;
        $detail = DB::table('kategori')->where('id', $id)->first();

        return view('master/ubahkategori', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kode_kategori = $request->input('code');
        $name = $request->input('name');
        
        //update kategori set kode = '', nama = '' where id = 1;\        DB::table('kategori')->insert(['kode' => $kode_kategori, 'nama' => $name]);
        DB::table('kategori')->where('id',$id)->update(['kode' => $kode_kategori, 'nama' => $name]);

        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hapus($id)
    {
        DB::table('kategori')->where('id', $id)->delete();

        return redirect('kategori');
    }
}
