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
                        <h1 class="app-page-title">Add Advertise</h1>
                   </div>
                   <div class="col-md-6">
                        <h6 style="float: right;"><a href="{{route('home')}}">Home</a> /
                            <a href="{{route('admin.advertisement')}}">Advertise List</a> /
                            Add Advertise</h6>
                   </div>
                </div>
                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-{{isset($record)?8:12}}">
                    {{-- <div class="col-12 col-md-8"> --}}
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form method="POST" action="{{route('admin.save-news')}}" class="settings-form" enctype="multipart/form-data">
                                    @csrf
                                        <div class="mb-3">
                                            <label for="setting-input-2" class="form-label">Title</label>
                                            <input type="text" class="form-control" name="news_title" placeholder="Type Here" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="setting-input-2" class="form-label">Image</label>
                                            <input type="file" class="form-control" name="news_title" placeholder="Type Here" required>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if (isset($record))
                        <div class="col-12 col-md-4">
                            <div class="app-card app-card-settings shadow-sm p-4">
                                <div class="app-card-body">
                                    <form class="settings-form">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="first_news" name="first_news">
                                            <label class="form-check-label" for="settings-switch-1">Appear in Main Page</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="appear_in_scroll" name="appear_in_scroll">
                                            <label class="form-check-label" for="settings-switch-1">Appear in All News</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="appear_in_archive" name="appear_in_archive">
                                            <label class="form-check-label" for="settings-switch-1">Appear in Specific News</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <hr class="my-4">
            </div>
        </div>
@endsection
