{{-- <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="">Your Balance</h6>
                        <h3 class="mb-2 number-font" id="wallet-user"><i class="fa fa-dollar"></i> {{Auth::user() ? Auth::user()->wallet : '0,00'}}</h3>
                        <p class="text-muted mb-0">
                            <a class="btn btn-primary modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8"><i class="fa fa-arrow-up"></i> TopUp</a>
                        </p>
                    </div>
                    <div class="col col-auto">
                        <div class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
                            <i class="fe fe-dollar-sign text-white mb-5 "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-primary img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{Auth::user() ? Auth::user()->wallet : '0,00'}}</h2>
                        <p class="text-white mb-0">Your Balance</p>
                    </div>
                    <div class="ms-auto"> <i class="fa fa-dollar text-white fs-30 me-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-secondary img-card box-secondary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{Auth::user() ? Auth::user()->wallet : '0,00'}}</h2>
                        <p class="text-white mb-0">Your Balance</p>
                    </div>
                    <div class="ms-auto"> <i class="fa fa-dollar text-white fs-30 me-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card  bg-success img-card box-success-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{Auth::user() ? Auth::user()->wallet : '0,00'}}</h2>
                        <p class="text-white mb-0">Your Balance</p>
                    </div>
                    <div class="ms-auto"> <i class="fa fa-dollar text-white fs-30 me-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-info img-card box-info-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{Auth::user() ? Auth::user()->wallet : '0,00'}}</h2>
                        <p class="text-white mb-0">Your Balance</p>
                    </div>
                    <div class="ms-auto"> <i class="fa fa-dollar text-white fs-30 me-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
</div>

<div class="modal fade"  id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered modal-lg text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">TopUp Saldo</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="topup_email" style="float: left;">Email</label>
                        <div class="input-icon">
                            <input type="email" class="form-control" placeholder="Email" id="topup_email" required disabled value="{{Auth::user()->email}}" name="email">
                        </div>
                    </div>
                    <div class="col-md-12 mb-12 mt-2">
                        <label for="topup_saldo" style="float: left;">Nominal</label>
                        <div class="input-icon">
                            <input type="number" class="form-control" placeholder="Nominal" id="topup_saldo" required name="saldo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="topup()">Submit</button>
                <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>