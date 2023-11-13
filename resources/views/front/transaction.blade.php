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
                        <h3 class="card-title">History Transaction</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-10p border-bottom-0 text-center">Type</th>
                                        <th class="wd-15p border-bottom-0 text-center">Amount</th>
                                        <th class="wd-15p border-bottom-0 text-center">Status</th>
                                        <th class="wd-10p border-bottom-0 text-center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1?>
                                    @foreach ($data as $item )
                                        <tr>
                                            <td class="text-center">{{$item['type']}}</td>
                                            <td class="text-center"><img src="{{asset('assets/images/logo/trx.svg')}}" alt="" srcset="" width="20px" height="20px" class="m-0"> {{number_format($item['amount'])}} TRX</td>
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
                                            <td class="text-center">{{date('Y-M-d H:i:s', strtotime($item['created_at']))}}</td>
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