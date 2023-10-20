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
@else
    <div class="ms-auto pageheader-btn">
        <a class="btn btn-primary modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8"><i class="fa fa-arrow-up"></i> TopUp</a>
    </div>
@endif