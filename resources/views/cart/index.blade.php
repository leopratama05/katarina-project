@extends('layouts.master')

@section('title')
    <title>Pos Ujikom</title>
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Cart</h1>
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
            @if ($msg = Session::get('gagal'))
                <div class="alert alert-danger">
                    <p>{{ $msg }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ Session::get('success') }}</li>
                    </ul>
                </div>
            @endif
            <div class="row">

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profil Kasir</h3>
                        </div>
                        <div class="card-body d-flex justify-content-between">

                            <div class="d-flex flex-column">
                                <p>Nama Kasir : {{ Auth::user()->name }}</b> </p>
                                <p class="ref"></p>
                                <p class="tgl">Tanggal : {{ date('Y-m-d') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pilih Barang</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="">Pilih Produk</label>
                                    <select name="product_id" class="form-control">
                                        <option value="0">Pilih Produk</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Qty</label>
                                    <input type="number" name="quantity" value="1" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total Belanja</h3>
                            </div>
                            <div class="card-body bg-warning d-flex align-items-center justify-content-center">
                                <h1 class="text-white text-bold totalnya">Rp.
                                    {{ number_format($total_belanja, 2, ',', '.') }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title">Keranjang Barang</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Barcode</th>
                                        <th>Qty</th>
                                        <th>Harga (Rp.)</th>
                                        <th>Subtotal (Rp.)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $ct)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ct->product->name }}</td>
                                            <td>{{ $ct->product->barcode }}</td>
                                            <td>{{ $ct->quantity }}</td>
                                            <td>{{ $ct->product->price }}</td>
                                            <td>{{ $ct->subTotal }}</td>
                                            <td>
                                                <form action="{{ route('cart.destroy', $ct->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="cart_id" value="{{ $ct->id }}">
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="#" class="btn btn-sm btn-primary">CheckOut</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
