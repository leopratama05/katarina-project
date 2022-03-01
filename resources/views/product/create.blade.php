@extends('layouts.master')

@section('title')
    <title>Create Page Product</title>
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Product Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
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
                            <h3>Create Product</h3>
                        </div>
                        <div class="card-body">
                            {{-- ngodingnya disini --}}
                            <form action="" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Product Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Product Price">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control"
                                        placeholder="Product Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Qty</label>
                                    <input type="number" name="quantity" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
