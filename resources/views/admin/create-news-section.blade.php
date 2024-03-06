@extends('layouts.app')
@section('css')
<style>
    .table-responsive{
        overflow-x:visible !important;
    }
    .app-utility-item .dropdown-menu.show {
        top: 2px !important;
    }

</style>
@endsection
@section('content')
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row">
                   <div class="col-md-6">
                        <h1 class="app-page-title">Add News Section</h1>
                   </div>
                   <div class="col-md-6">
                        <h6 style="float: right;"><a href="{{route('home')}}">Home</a> / News Section</h6>
                   </div>
                </div>

                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form method="post" action="{{route('admin.save-news-section')}}" class="settings-form">
                                    @csrf
                                    <div class="mb-3">
                                        @if (!isset($parent_id))
                                            <label for="setting-input-2" class="form-label">Enter Section Name</label>
                                        @else
                                            <label for="setting-input-2" class="form-label">Enter Sub Section Name Under {{$parent_details->name}}</label>
                                        @endif
                                        @if (isset($record))
                                            <input type="hidden" name="editable_id" value="{{$record->id}}">
                                        @endif
                                        @if (isset($parent_id))
                                            <input type="hidden" name="parent_id" value="{{$parent_id}}">
                                        @endif
                                        <input type="text" class="form-control" id="setting-input-2" name="name"  placeholder="Type Here" value="{{isset($record)?$record->name:''}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="setting-input-2" class="form-label">Remarks</label>
                                        <textarea class="form-control" id="remarks" name="remarks" rows="4" cols="50" style="height: 80%">{{isset($record)?$record->remarks:''}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        @php
                                            if(isset($record)){
                                                $appearence_array = json_decode($record->appearence);
                                            }
                                        @endphp
                                        <input type="checkbox" id="vehicle1" name="appearence[]" value="top" @if(isset($record) && $appearence_array) {{in_array('top',$appearence_array)?'checked':''}} @endif>
                                        <label for="vehicle1"> Top Menu</label><br>
                                        <input type="checkbox" id="vehicle2" name="appearence[]" value="sub" @if(isset($record) && $appearence_array) {{in_array('sub',$appearence_array)?'checked':''}} @endif>
                                        <label for="vehicle2"> Sub Menu</label><br>
                                        <input type="checkbox" id="vehicle3" name="appearence[]" value="main_content" @if(isset($record) && $appearence_array) {{in_array('main_content',$appearence_array)?'checked':''}} @endif>
                                        <label for="vehicle2"> Homepage Main Content</label><br>
                                        <input type="checkbox" id="vehicle3" name="appearence[]" value="left_content" @if(isset($record) && $appearence_array) {{in_array('left_content',$appearence_array)?'checked':''}} @endif>
                                        <label for="vehicle2"> Homepage Left Content</label><br>
                                    </div>
                                    <button type="submit" class="btn app-btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                            <div class="tab-content" id="orders-table-tab-content">
                                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                                        <div class="app-card-body">
                                            <div class="table-responsive">
                                                <table class="table app-table-hover mb-0 text-left">
                                                    <thead>
                                                        <tr>
                                                            <th class="cell">Section Name</th>
                                                            <th class="cell">Slug</th>
                                                            <th class="cell">Status</th>
                                                            <th class="cell">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $stack=[];
                                                        @endphp
                                                        @foreach ($list as $key=>$li)
                                                            @include('admin.common.news-section-list')
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <hr class="my-4">
            </div>
        </div>
@endsection
@section('js')
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
@endsection
