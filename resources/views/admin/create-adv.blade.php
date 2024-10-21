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
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form method="POST" action="{{route('admin.save-advertise')}}" class="settings-form" enctype="multipart/form-data">
                                    @csrf
                                        @if (isset($record))
                                            <input type="hidden" name="editable_id" value="{{$record->id}}">
                                        @endif
                                        <div class="mb-3">
                                            <label for="setting-input-2" class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Type Here"
                                            @if (isset($record))
                                                value="{{$record->title}}"
                                            @else
                                                Value="{{old('news_date')}}"
                                            @endif required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-{{isset($record)?6:12}} mb-3">
                                                <label for="setting-input-2" class="form-label">Image</label>
                                                <input type="file" class="form-control" name="file" placeholder="Type Here" required>
                                            </div>
                                            @if (isset($record))
                                            <div class="col-md-6 img-border">
                                                <img src="{{asset($record->file)}}" alt="uploaded image" style="max-height: 300px; max-width: 300px;">
                                            </div>
                                            @endif
                                        </div>

                                        <div class="mb-3" style="text-align: center;">
                                            <button type="submit" class="btn app-btn-primary">Save as Draft</button>
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
                                        <input type="hidden" id="settings_id" name="settings_id" value="{{$record->id}}">
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="is_main_page" name="is_main_page" {{$record->is_main_page==1?'checked':''}}>
                                            <label class="form-check-label" for="settings-switch-1">Appear in Main Page</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="is_all_news" name="is_all_news" {{$record->is_all_news==1?'checked':''}}>
                                            <label class="form-check-label" for="settings-switch-1">Appear in All News</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="in_specific_news" name="in_specific_news" {{$record->in_specific_news==1?'checked':''}}>
                                            <label class="form-check-label" for="settings-switch-1">Appear in Specific News</label>
                                        </div>
                                        <div class="row">
                                            <label for="setting-input-2" class="form-label">Add to News</label>
                                            <select class="js-example-basic-multiple settings" id="news_ids" name="news_ids[]" multiple="multiple" >
                                                {{-- @php
                                                    $array = json_decode($record->category)??[];
                                                @endphp --}}
                                                @foreach ($news_content as $sec)
                                                    <option value="{{$sec->id}}" {{-- {{in_array($sec->slug, $array)?'selected':''}} --}}>{{$sec->news_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="publish" name="publish" {{$record->publish=='publish'?'checked':''}}>
                                            <label class="form-check-label" for="settings-switch-1">Publish</label>
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
@section('js')
<script>
    $(document).ready(function() {
         $('.js-example-basic-multiple').select2();
     });
 </script>

 <script>
    $(".settings").change(function(e){
    e.preventDefault();
        alert("ok");
        var data = {
            'settings_id': $("#settings_id").val(),
            'news_ids': JSON.stringify($("#news_ids").val()),
            'is_main_page': $("#is_main_page").prop("checked"),
            'in_specific_news': $("#in_specific_news").prop("checked"),
            'is_all_news': $("#is_all_news").prop("checked"),
            'publish': $("#publish").prop("checked"),
        };
        $.ajax({
            type: 'post',
            url: "{{ route('admin.add-settings-store') }}",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                if(response.success){
                    toastr.options =
                    {
                    "closeButton" : true,
                    "progressBar" : true
                    }
                    toastr.success(response.success);
                }else if(response.error){
                    toastr.options =
                    {
                    "closeButton" : true,
                    "progressBar" : true
                    }
                    toastr.error(response.error);
                }
            },
        });
})
 </script>
@endsection
