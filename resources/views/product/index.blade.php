@extends('layouts.master')

@section('title')
    <title>{{ $title }}</title>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary card-title">Create Product</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Barcode</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($product as $pr)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pr->name }}</td>
                                            <td><img src="{{ Storage::url($pr->image) }}" width="100"></td>
                                            <td>{{ $pr->barcode }}</td>
                                            <td>{{ number_format($pr->price, 2) }}</td>
                                            <td>{{ $pr->quantity }}</td>
                                            @if ($pr->status == 1)
                                                <td><a href="#" class="btn btn-success">Active</a></td>
                                            @else
                                                <td><a href="#" class="btn btn-danger">Inactive</a></td>
                                            @endif
                                            <td><a href="{{ route('product.edit', $pr->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="{{ route('product.destroy', $pr->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Belum Ada Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
