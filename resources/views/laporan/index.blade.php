@extends('layouts.master')

@section('title')
    <title>Catatan Transaksi</title>
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Home Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="background: linear-gradient(black, lightblue);">
                        </div>
                        <div class="card-body">
                            <form action="{{ route('laporan.search')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Pegawai</label>
                                    <input type="text" class="form-control" name="pegawai">
                                </div>
                                {{-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tanggal mulai</label>
                                            <input type="date" class="form-control" name="mulai">
                                        </div>
                                        <div class="col-6">
                                            <label>Tanggal Selesai</label>
                                            <input type="date" class="form-control" name="selesai">
                                        </div>
                                    </div>

                                </div> --}}
                                <div class="form-group">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" style="background:  linear-gradient(black, lightblue);">
                            {{-- <a href="{{ route('product.create') }}" class="btn btn-primary card-title">Create Product</a> --}}
                        </div>
                        <div class="card-body">
                            <div style="overflow-x: auto">
                                <table class="table table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Pegawai</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transaksi as $data)
                                        <?php
                                            $nama_produk = "";
                                            $total = 0;

                                            $data_details = App\Models\Transaksi_new2::join('products', 'transaksi_details.product_id', '=', 'products.id')->where('transaksi_details.transaksi_id', $data->id)->get();
                                            if(count($data_details) > 0){
                                                foreach ($data_details as $key => $value) {
                                                    $nama_produk .= " ". $value->name;
                                                    if(count($data_details) != ($key+1)){
                                                        $nama_produk .= "+";
                                                    }

                                                    $total += $value->harga;

                                                }
                                            }

                                            $nama_user = "";
                                            $data_user = DB::table('users')->find($data->user_id);
                                            if($data_user != ""){
                                                $nama_user = $data_user->name;
                                            }
                                        ?>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $nama_produk }}</td>
                                                <td>Rp. {{ number_format($total) }}</td>
                                                <td>{{ $data->status }}</td>
                                                <td>{{ $nama_user }}</td>
                                                <td>{{ $data->created_at }}</td>
                                                <td><a href="{{ route('laporan.show', $data->id) }}" class="btn btn-primary">View</a></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Belum Ada Data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let table = new DataTable('#example', {
            // options
        });
    </script>
@endsection
