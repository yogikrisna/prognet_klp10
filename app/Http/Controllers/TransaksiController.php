<?php

namespace App\Http\Controllers;
use App\Models\Product;
// use App\Models\penjualan;
// use App\Models\penjualan_detail;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $barangs = Product::paginate(10);
        $data = array('title' => 'List Produk',
                    'barangs' => $barangs);
        return view('transaksi.home', $data);
    }

    
}
