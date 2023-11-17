@extends('layouts.main')

@section('content')
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">List Transaction</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Transaction</li>
                </ol>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Transaction</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom w-100" id="table-topup">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0 text-center">No</th>
                                        <th class="wd-15p border-bottom-0 text-center">Email User</th>
                                        <th class="wd-15p border-bottom-0 text-center">Type</th>
                                        <th class="wd-20p border-bottom-0 text-center">Amount</th>
                                        <th class="wd-15p border-bottom-0 text-center">Status</th>
                                        <th class="wd-15p border-bottom-0 text-center">Address Destination</th>
                                        <th class="wd-10p border-bottom-0 text-center">Date Request</th>
                                        <th class="wd-25p border-bottom-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1?>
                                    @foreach ($data as $item )
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{isset($item->user->email) ? $item->user->email : ''}}</td>
                                            <td>{{$item->type}}</td>
                                            <td><img src="{{asset('assets/images/logo/trx.svg')}}" alt="" srcset="" width="20px" height="20px" class="m-0"> {{number_format($item['amount'])}} TRX</td>
                                            <td class="text-center">
                                                @if ($item['status'] == "Pending")
                                                    <span style="color: yellow"><i class="fa fa-refresh"></i> {{$item['status']}}</span>
                                                @elseif ($item['status'] == "Success")
                                                    <span style="color: green"><i class="fa fa-check"></i> {{$item['status']}}</span>
                                                @elseif ($item['status'] == "Reject")
                                                    <span style="color: red"><i class="fa fa-close"></i> {{$item['status']}}</span>
                                                @elseif ($item['status'] == "Not Found")
                                                    <span style="color: red"><i class="fa fa-close"></i> {{$item['status']}}</span>
                                                @endif
                                            </td>
                                            <td>{{$item->address_destination}}</td>
                                            <td class="text-center">{{date('Y-M-d H:i:s', strtotime($item['created_at']))}}</td>
                                            <td class="text-center">
                                                @if ($item['type'] == "Deposit")
                                                    <button class="btn btn-sm btn-success" title="ACC" onclick="transaction('acc', {{$item['id']}}, 'topup')"><i class="fa fa-check"></i></button>
                                                    <button class="btn btn-sm btn-danger" title="Reject" onclick="transaction('reject', {{$item['id']}}, 'topup')"><i class="fa fa-times"></i></button>
                                                    <button class="btn btn-sm btn-warning" title="Sync" onclick="transaction('sync', {{$item['id']}}, 'topup')"><i class="fa fa-refresh"></i></button>
                                                @else
                                                    <button class="btn btn-sm btn-success" title="ACC" onclick="transaction('acc', {{$item['id']}}, 'withdrawal')"><i class="fa fa-check"></i></button>
                                                    <button class="btn btn-sm btn-danger" title="Reject" onclick="transaction('reject', {{$item['id']}}, 'withdrawal')"><i class="fa fa-times"></i></button>
                                                @endif
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
            $('#table-topup').DataTable({
                "order": [[ 6, "desc" ]],
                // "scrollX": true
            });
        });

        function transaction(status, id_transaction, type) {
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
                            id_transaction: id_transaction,
                            type: type
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