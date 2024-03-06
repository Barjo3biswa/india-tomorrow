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
                        <h1 class="app-page-title">Add News</h1>
                   </div>
                   <div class="col-md-6">
                        <h6 style="float: right;"><a href="{{route('home')}}">Home</a> / Add News</h6>
                   </div>
                </div>
                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-{{isset($record)?8:12}}">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form method="POST" action="{{route('admin.save-news')}}" class="settings-form" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($record))
                                        <input type="hidden" name="editable_id" value="{{$record->id}}">
                                    @endif
                                    <div class="mb-3">
                                        <label for="setting-input-2" class="form-label">News Title</label>
                                        <input type="text" class="form-control" name="news_title" placeholder="Type Here"
                                        @if (isset($record))
                                            value="{{$record->news_title}}"
                                        @endif required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="setting-input-2" class="form-label">News Sub Title</label>
                                        <input type="text" class="form-control" name="news_sub_title" placeholder="Type Here"
                                        @if (isset($record))
                                            value="{{$record->news_sub_title}}"
                                        @endif required>
                                    </div>

                                    <div class="row">
                                       <div class="col-md-{{isset($record)?6:12}} mb-3">
                                            <label for="setting-input-2" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" name="image"
                                            {{-- @if (isset($record))
                                                {{$record->image?'':'required'}}
                                            @endif --}}
                                             accept="image/jpeg, image/jpg, image/png">
                                       </div>
                                       @if (isset($record))
                                       <div class="col-md-6 img-border">
                                            <img src="{{asset($record->image)}}" alt="uploaded image" style="max-height: 300px; max-width: 300px;">
                                       </div>
                                       @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="setting-input-2" class="form-label">Enter Image Caption</label>
                                        <input type="text" class="form-control" name="image_caption" placeholder="Type Here"
                                        @if (isset($record))
                                            value="{{$record->image_caption}}"
                                        @endif>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-{{isset($record->youtube_url)?6:12}} mb-3">
                                            <label for="setting-input-2" class="form-label">Enter Youtube URL</label>
                                            <input type="text" class="form-control" name="youtube_url" placeholder="Type Here"
                                            @if (isset($record->youtube_url))
                                                value="{{$record->youtube_url}}"
                                            @endif>
                                        </div>
                                        @if (isset($record->youtube_url))
                                        <div class="col-md-6 img-border">
                                            <iframe width="300" height="150" src="https://www.youtube.com/embed/{{$record->youtube_url}}"></iframe>
                                        </div>
                                        @endif
                                     </div>

                                    <div class="mb-3">
                                        <label for="setting-input-2" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description">
                                            @if (isset($record))
                                                {!!$record->description!!}
                                            @endif
                                        </textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="setting-input-2" class="form-label">News Date</label>
                                            <input type="date" class="form-control" name="news_date"
                                            @if (isset($record))
                                                value="{{date('Y-m-d', strtotime($record->news_date))}}"
                                            @endif required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="setting-input-2" class="form-label">News Time</label>
                                            <input type="time" class="form-control" name="news_time"
                                            @if (isset($record))
                                                value="{{$record->news_time}}"
                                            @endif required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="setting-input-2" class="form-label">Reported By</label>
                                            <input type="text" class="form-control" name="reported_by" placeholder="Type Here"
                                            @if (isset($record))
                                                value="{{$record->reported_by}}"
                                            @endif required>
                                        </div>
                                    </div><br/>

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
                                            <label class="form-check-label" for="settings-switch-1"><strong>Show Video or Photo first.</strong></label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="text-align: right;">
                                                <input class="settings" type="radio" id="photo" name="photo_or_video" value="photo" {{$record->photo_or_video=='photo'?'checked':''}}>
                                                <label for="photo">Photo</label><br>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="settings" type="radio" id="video" name="photo_or_video" value="video" {{$record->photo_or_video=='video'?'checked':''}}>
                                                <label for="video">Video</label><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="setting-input-2" class="form-label">Add to News Section</label>
                                            <select class="js-example-basic-multiple settings" id="section" name="section[]" multiple="multiple">
                                                @php
                                                    $array = json_decode($record->category)??[];
                                                @endphp
                                                @foreach ($news_sections as $sec)
                                                    <option value="{{$sec->slug}}" {{in_array($sec->slug, $array)?'selected':''}}>{{$sec->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="first_news" name="first_news" {{$record->first_news=='true'?'checked':''}}
                                            onclick="return confirm('Are you sure you change?');">
                                            <label class="form-check-label" for="settings-switch-1">Appear as First News</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="appear_in_scroll" name="appear_in_scroll" {{$record->scrolling=='true'?'checked':''}}>
                                            <label class="form-check-label" for="settings-switch-1">Appear in Scrolling</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="appear_in_archive" name="appear_in_archive" {{$record->archive=='true'?'checked':''}}>
                                            <label class="form-check-label" for="settings-switch-1">Appear in Archive</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input settings" type="checkbox" id="publish_news" name="publish_news" {{$record->status=='Published'?'checked':''}} onclick="return confirm('Are you sure you want to publish this news?');">
                                            <label class="form-check-label" for="settings-switch-1">Publish</label>
                                        </div>
                                        {{-- <div class="mb-3" style="text-align: center;">
                                            <button type="submit" class="btn app-btn-primary">Save</button>
                                        </div> --}}
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
CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            customConfig : "{{asset('ckeditor/config.js')}}",
            filebrowserUploadMethod: 'form',
            allowedContent:true,
            height: '300px',
            width: '100%',
    })
</script>
<script>
$(".settings").change(function(e){
    e.preventDefault();

        var data = {
            'settings_id': $("#settings_id").val(),
            'photo_or_video': $("input[name='photo_or_video']:checked").val(),
            'section': JSON.stringify($("#section").val()),
            'first_news': $("#first_news").prop("checked"),
            'appear_in_scroll': $("#appear_in_scroll").prop("checked"),
            'appear_in_archive': $("#appear_in_archive").prop("checked"),
            'publish_news': $("#publish_news").prop("checked"),
        };
        $.ajax({
            type: 'post',
            url: "{{ route('admin.settings-store') }}",
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
