@extends('layouts.main')

@section('content')
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">List TopUp</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List TopUp</li>
                </ol>
            </div>
            @if (!Auth::user())
                <div class="ms-auto pageheader-btn">
                    <a href="/register" class="btn btn-primary btn-icon text-white me-2">
                        <span>
                            <i class="fa fa-user-plus"></i>
                        </span> Register
                    </a>
                    <a href="/login" class="btn btn-success btn-icon text-white">
                        <span>
                            <i class="fa fa-sign-in"></i>
                        </span> Login
                    </a>
                </div>
            @endif
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
                                        <th class="wd-15p border-bottom-0 text-center">No</th>
                                        <th class="wd-15p border-bottom-0 text-center">Email User</th>
                                        <th class="wd-20p border-bottom-0 text-center">Saldo TopUp</th>
                                        <th class="wd-15p border-bottom-0 text-center">Status</th>
                                        <th class="wd-10p border-bottom-0 text-center">Date Request</th>
                                        <th class="wd-25p border-bottom-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1?>
                                    @foreach ($data as $item )
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->user->email}}</td>
                                            <td>{{number_format($item['saldo'])}}</td>
                                            <td>{{$item['status']}}</td>
                                            <td>{{$item['created_at']}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-success" title="ACC" onclick="transaction('acc', {{$item['id']}})"><i class="fa fa-check"></i></button>
                                                <button class="btn btn-sm btn-danger" title="Reject" onclick="transaction('reject', {{$item['id']}})"><i class="fa fa-times"></i></button>
                                                <button class="btn btn-sm btn-warning" title="Sync" onclick="transaction('sync', {{$item['id']}})"><i class="fa fa-refresh"></i></button>
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

        function transaction(status, id_transaction) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/transaction",
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            status: status,
                            id_transaction: id_transaction
                        },
                        success: function (response) {
                            Swal.fire(
                                'success!',
                                'Success',
                                'success'
                            );

                            location.reload();
                        }
                    });
                }
            });
        }
    </script>
@endsection