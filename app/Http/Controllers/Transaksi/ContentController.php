<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index()
    {
        // select * from content inner join kategori on id = kat_id
        $list = DB::table('content')
            ->join('kategori', 'content.kategori_id', 'kategori.id')->get();
        return view('content/listcontent', compact('list'));
    }
}
