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
                        <h1 class="app-page-title">Add New Advertise</h1>
                   </div>
                   <div class="col-md-6">
                        <h6 style="float: right;"><a href="{{route('home')}}">Home</a> / News Section</h6>
                   </div>
                </div>

                <hr class="mb-4">
                <div class="row" >
                    <div class="col-md-2" style="margin-left: 80%; margin-bottom: 8px;">
                        <a href="{{route('admin.create-add')}}" class="btn app-btn-primary">Add New</a>
                    </div>
                </div>
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-12">
                            <div class="tab-content" id="orders-table-tab-content">
                                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                                        <div class="app-card-body">
                                            <div class="table-responsive">
                                                <table class="table app-table-hover mb-0 text-left" id="dtExample">
                                                    <thead>
                                                        <tr>
                                                            <th class="cell">Title</th>
                                                            <th class="cell">Status</th>
                                                            <th class="cell">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($list as $li)
                                                        <tr>
                                                            <th>{{$li->title}}</th>
                                                            <th>@include('admin.common.status')</th>
                                                            <th>
                                                                <div class="app-utility-item app-user-dropdown dropdown">
                                                                    <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                                                                        href="#" role="button" aria-expanded="false"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear icon"
                                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                                                                    </svg></a>
                                                                    <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                                                        <li><a class="dropdown-item" href="{{route('admin.advertise-edit',Crypt::encrypt($li->id))}}">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                            <br>
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
    $(document).ready( function () {
        $('#dtExample').DataTable({
            "lengthMenu": [ [50, 100, -1], [50, 100, "All"] ], // Define custom length menu
            "pageLength": 100, // Set default page length to 100
        });
    } );
</script>
@endsection
