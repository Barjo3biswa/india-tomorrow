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
                                                            <th class="cell">Add Title</th>
                                                            <th class="cell">Status</th>
                                                            <th class="cell">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

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
