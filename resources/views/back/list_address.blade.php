@extends('layouts.main')

@section('content')
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Master Address</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master Address</li>
                </ol>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Basic Datatable</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">No</th>
                                        <th class="wd-15p border-bottom-0">Address</th>
                                        <th class="wd-20p border-bottom-0">Description</th>
                                        <th class="wd-15p border-bottom-0">Status</th>
                                        <th class="wd-10p border-bottom-0">Created At</th>
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1?>
                                    @foreach ($data as $item )
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item['address']}}</td>
                                            <td>{{$item['description']}}</td>
                                            <td>{{$item['status'] == 1 ? "active" : ""}}</td>
                                            <td>{{$item['created_at']}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" title="Edit" onclick="action_edit({{$item['id']}})"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-sm btn-danger" title="Delete" onclick="action_delete({{$item['id']}})"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php $no++?>
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
 
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#basic-datatable').DataTable();
        });
    </script>
@endsection