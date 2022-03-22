@extends('layouts.master')

@section('title')
    <title>Invoice</title>
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
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
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> #
                            <small class="float-right">Date: {{ date('Y-m-d') }}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice #{{ $userid }}</b><br>
                        <br>
                        <b>Order ID:</b> {{ $trxheader[0]->userid }}<br>
                        <b>Payment Due:</b> {{ date('Y-m-d') }}<br>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Produk</th>
                                    <th>Barcode</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trxdetail as $t)
                                    <tr>
                                        <td>{{ $t->qty }}</td>
                                        <td>{{ $t->produk->name }}</td>
                                        <td>
                                            @php
                                                echo DNS1D::getBarcodeSVG($t->produk->barcode, 'C128');
                                            @endphp
                                        </td>
                                        <td>Rp. {{ number_format($t->harga, 2, '.', ',') }}</td>
                                        <td>Rp. {{ number_format($t->subTotal, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->

                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Amount Due {{ date('Y-m-d') }}</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>Rp. {{ number_format($subtotal, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <th>PPN 10%</th>
                                    <td>Rp. {{ number_format($subtotal / 10, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>Rp. {{ number_format($subtotal + $subtotal / 10, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <th>Dibayar</th>
                                    <th>Rp. {{ number_format($trxheader[0]->dibayar, 2, '.', ',') }}</th>
                                </tr>
                                <tr>
                                    <th>Kembalian</th>
                                    <th>Rp.
                                        {{ number_format($trxheader[0]->dibayar - ($subtotal + $subtotal / 10), 2, '.', ',') }}
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                    </button> --}}
                        <button type="button" onclick="window.print();" class="btn btn-primary btn-generate float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                        </button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('.btn-generate').click(function() {
                window.print();
            });
        })
    </script>
@endsection
