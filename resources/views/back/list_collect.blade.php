@extends('layouts.main')

@section('content')
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Collect Address</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Collect Address</li>
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
                                        <th class="wd-15p border-bottom-0">Name User</th>
                                        <th class="wd-15p border-bottom-0">Email</th>
                                        <th class="wd-15p border-bottom-0">Wallet</th>
                                        <th class="wd-15p border-bottom-0">Wagger</th>
                                        <th class="wd-15p border-bottom-0">Address</th>
                                        <th class="wd-20p border-bottom-0">Balance Address</th>
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1?>
                                    @foreach ($data as $item )
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item['name']}}</td>
                                            <td>{{$item['email']}}</td>
                                            <td><img src="{{asset('assets/images/logo/trx.svg')}}" alt="" srcset="" width="20px" height="20px" class="m-0"> {{number_format($item['wallet'])}} TRX</td>
                                            <td><img src="{{asset('assets/images/logo/trx.svg')}}" alt="" srcset="" width="20px" height="20px" class="m-0"> {{isset($item->totalBets->total_bet) ? number_format($item->totalBets->total_bet) : 0}} TRX</td>
                                            <td>{{$item->address->address}}</td>
                                            <td>{{$item->address->balance_address}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" title="Update Balance" onclick="update_balance({{$item['id']}})"><i class="fa fa-refresh"></i></button>
                                                <button class="btn btn-sm btn-primary" title="Transfer" onclick="transfer_balance({{$item['id']}})"><i class="fa fa-exchange"></i></button>
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

        function update_balance(id_user) {
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
                        url: "/update_balance",
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            id_user: id_user
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

        function transfer_balance(id_user) {
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
                        url: "/transfer_balance",
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            id_user: id_user
                        },
                        success: function (response) {
                            if (response.status) {
                                Swal.fire({
                                    title: "success!",
                                    text: response.message,
                                    icon: "success"
                                });

                                location.reload();   
                            }else{
                                Swal.fire({
                                    title: "error!",
                                    text: response.message,
                                    icon: "error"
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection