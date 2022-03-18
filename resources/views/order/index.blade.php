@extends('layouts.master')

@section('title')
    <title>CheckoutPage</title>
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Checkout</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title">CheckOut</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Barcode</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>SubTotal(Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <div class="form-group">
                        <label for="">SubTotal</label>
                        <p>Rp. 0</p>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <p>Rp. 0</p>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Cash</label>
                        @if ($cash = Session::get('cash'))
                            <p>Rp. {{ number_format($cash, 2, ',', '.') }}</p>
                        @else
                            <p>Rp. 0</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Kembali</label>
                        @if ($cash = Session::get('cash'))
                            <p>Rp. {{ number_format($cash - ($subtotal + $subtotal / 10), 2, ',', '.') }}</p>
                        @else
                            <p>Rp. 0</p>
                        @endif
                    </div>
                    <div class="form-group d-flex">
                        <button type="button" class="btn-payment btn btn-sm btn-success ml-1" data-toggle="modal"
                            data-target="#modalPayment">
                            Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
