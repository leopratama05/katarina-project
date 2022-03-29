@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (Auth::user()->level == 'manager')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-vcenter font-size-m">
                                    <tr>
                                    <thead>
                                        <th class="text-center">User</th>
                                        <th class="text-center">Level</th>
                                        <th class="text-center">Aktivity</th>
                                        <th class="text-center">Time</th>
                                    </thead>
                                    </tr>
                                    @foreach ($activity_log as $item)
                                        <tr>
                                            <td class="font-w600 text-center" style="width: 100px"><span
                                                    class="badge badge-success">{{ $item->user->name }}</span></td>
                                            <td class="font-w600 text-center" style="width: 100px"> <span class="badge badge-primary"> {{ $item->user->level}} </span></td>
                                            <td class="d-none d-sm-table-cell">
                                                {{ $item->description }}
                                            </td>
                                            <td class="text-center">
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
