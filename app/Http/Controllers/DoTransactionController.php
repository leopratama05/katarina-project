<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiHeader;
use App\Models\UserCart;
use App\Models\TransaksiDetail;
use Auth;

class DoTransactionController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $tgl = NOW();
        $transaksi = new TransaksiHeader;
        $transaksi->user_id = $user_id;
        $transaksi->jumlah = $request->input('total');
        $transaksi->tipe_pembayaran = "tunai";
        $transaksi->dibayar = $request->input('dibayar');
        $transaksi->status = "proses";
        $transaksi->save();

        $idtransaksi = TransaksiHeader::findOrFail($transaksi->id);
        $usercart = UserCart::where('user_id', $user_id)->get();
        foreach ($usercart as $cart) {
            $trxDetail = new TransaksiDetail;
            $trxDetail->transaksi_id = $idtransaksi->id;
            $trxDetail->product_id = $cart->product_id;
            $trxDetail->harga = $cart->subTotal;
            $trxDetail->qty = $cart->quantity;
            $trxDetail->subtotal = $cart->subTotal;
            $trxDetail->user_id = $user_id;
            $trxDetail->save();
        }
        UserCart::where('user_id', $user_id)->delete();
        return redirect()->route('invoice.index');
    }
}
