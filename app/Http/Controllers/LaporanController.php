<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiHeader;
use App\Models\User;
use App\Models\Transaksi_new;
use App\Models\Transaksi_new2;

class LaporanController extends Controller
{
    //
    public function index()
    {
        $transaksi = Transaksi_new::all();
        return view('laporan.index', compact('transaksi'));
    }
    public function search(Request $request)
    {

        $transaksi = Transaksi_new::join('users', 'transaksi_headers.user_id', '=', 'users.id');
        if($request->pegawai != "")
        {
           
            $transaksi = $transaksi->where('users.name', 'like', '%'.$request->pegawai.'%');
        }

        // if($request->mulai != "" && $request->selesai != "")
        // {
        //     // echo "ada mulai selesai";die;
        //     $transaksi = $transaksi->whereBetween('DATE(created_at)', [$request->mulai, $request->selesai]);
        // }

        $transaksi = $transaksi->get();

        return view('laporan.index', compact('transaksi'));
    }

    public function show($id)
    {
        $transaksi = Transaksi_new::findorfail($id);
        $transaksi_2 = Transaksi_new2::join('products', 'transaksi_details.product_id', '=', 'products.id')->where('transaksi_details.transaksi_id', $transaksi->id)->get();

        return view('laporan.show', compact('transaksi', 'transaksi_2'));
    }
}
