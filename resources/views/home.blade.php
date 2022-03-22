@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (Auth::user()->level == 'admin')
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>#</h3>
                                <p>Orders Count</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>#</h3>
                                <p>Income</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>#</h3>

                                <p>Income Today</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Customers Count</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">LogActivity</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-vcenter font-size-m">
                                    @foreach ($activity_log as $item)
                                        <tr>
                                            <td class="font-w600 text-center" style="width: 100px"><span
                                                    class="badge badge-success">{{ $item->user->name }}</span></td>
                                            <td class="d-none d-sm-table-cell">
                                                <span class="badge badge-success">{{ $item->description }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-danger">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
