<?php
    if (Auth::user()) {
?>
<div class="modal fade"  id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered modal-lg text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Balance Information</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class=" tab-menu-heading">
                        <div class="tabs-menu1 ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li>
                                    <a href="#tab5" class="active me-1" data-bs-toggle="tab">
                                        <img src="{{asset('assets/images/pngs/deposit.png')}}" alt="" width="50px;" height="50px">
                                        Deposit
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab6" data-bs-toggle="tab" class="me-1">
                                        <img src="{{asset('assets/images/pngs/withdraw.png')}}" alt="" width="50px;" height="50px"> 
                                        Withdraw
                                    </a>
                                </li>
                                {{-- <li><a href="#tab7" data-bs-toggle="tab" class="me-1">Tab 3</a></li>
                                <li><a href="#tab8" data-bs-toggle="tab">Tab 4</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane active " id="tab5">
                                <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <label for="topup_email" style="float: left;">Email</label>
                                        <div class="input-icon">
                                            <input type="email" class="form-control" placeholder="Email" id="topup_email" required disabled value="{{Auth::user()->email}}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12 mt-2">
                                        <label for="topup_saldo" style="float: left;">Amount</label>
                                        <br>
                                        <div class="input-icon">
                                            <img src="{{asset('assets/images/logo/trx2.png')}}" alt="" srcset="" width="40px" height="35px" style="float: right; margin-top: 10px">
                                            <input type="number" class="form-control w-90" placeholder="Amount in TRX" id="topup_saldo" required name="saldo">
                                            <span>Minimum Deposit : <b>5.0000000000</b> TRX</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12 mt-2">
                                        <button class="btn btn-primary" onclick="topup()" style="float: right;">Request Deposit</button>
                                    </div>
                                </div>

                                <div class="form-row" id="address_topup" style="display: none;">
                                    <div class="col-md-12 mb-12">
                                        <label class="form-label" style="float: left;">Address</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Address" value="{{Auth::user()->address->address}}">
                                            <span class="input-group-text btn btn-primary" onclick="copy_address('{{Auth::user()->address->address}}')"><i class="fa fa-clipboard"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane " id="tab6">
                                <div class="col-md-12 mb-12 mt-2">
                                    <label for="topup_saldo" style="float: left;">Currentcy</label>
                                    <br>
                                    <div class="input-icon">
                                        <img src="{{asset('assets/images/logo/trx2.png')}}" alt="" srcset="" width="40px" height="35px" style="float: right; margin-top: 10px">
                                        <input type="text" class="form-control w-90" placeholder="Amount in TRX" required disabled value="TRX">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-12">
                                    <label for="topup_email" style="float: left;">Network</label>
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Network" required disabled value="TRX20">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-12">
                                    <label class="form-label" style="float: left;">Amount to Withdraw</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="" id="balance">
                                        <span class="input-group-text btn btn-primary" onclick="max_balance()">Max</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-12 mt-2">
                                    <ul style="text-align: left">
                                        <li>Available Balance : <b>{{Auth::user()->wallet}}</b></li>
                                        <li>Minimum Withdraw : <b>5.0000000</b></li>
                                        <li>Network Fee : <b>5.0000000</b></li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="col-md-12 mb-12">
                                    <label class="form-label">Your Destination Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <button class="btn btn-primary" style="float: right;">Request Withdraw</button>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>
<?php 
    }
?>
