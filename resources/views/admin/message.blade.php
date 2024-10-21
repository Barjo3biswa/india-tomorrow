@extends('layouts.app')
@section('css')
<style>
    .img-border{
        border: 2px solid #a7a0a0;
        border-radius: 4px;
        display: flex;
        align-items: center;
        height: 200px;
        justify-content: center;
    }
</style>
@endsection
@section('content')
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row">
                   <div class="col-md-6">
                        <h1 class="app-page-title">Messages</h1>
                   </div>
                   <div class="col-md-6">
                        <h6 style="float: right;"><a href="{{route('home')}}">Home</a> /Messages</h6>
                   </div>
                </div>
                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-12">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">SL. No.</th>
                                                <th class="cell">Email</th>
                                                <th class="cell">Phone</th>
                                                <th class="cell">Name</th>
                                                <th class="cell">Message </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($message as $key=>$msg)
                                                <tr>
                                                    <td>{{++$key}}
                                                    @if ($msg->is_read==0)
                                                        <span class="badge bg-danger">New</span>
                                                    @endif</td>
                                                    <td>{{$msg->email}}</td>
                                                    <td>{{$msg->phone}}</td>
                                                    <td>{{$msg->name}}</td>
                                                    <td>{{$msg->message}}</td>
                                                </tr>
                                                @php
                                                    $msg->update(['is_read'=>1]);
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
            </div>
        </div>
@endsection
