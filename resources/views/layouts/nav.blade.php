<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="/">
            <div><img src="{{asset('assets/images/logo/logo.png')}}" class="header-brand-img desktop-logo" alt="logo" style="float: left;"></div>
            {{-- <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo"> --}}
            <img src="{{asset('assets/images/logo/logo.png')}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{asset('assets/images/logo/logo.png')}}" class="header-brand-img light-logo" alt="logo">
            <img src="{{asset('assets/images/logo/logo.png')}}" class="header-brand-img light-logo1" alt="logo">
        </a><!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li><h3>Main</h3></li>
        <li class="slide">
            <a class="side-menu__item"  data-bs-toggle="slide" href="/"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Home</span></a>
        </li>
        <?php
            if (Auth::user() && Auth::user()->role->role == 'admin') {
        ?>
        <li><h3>Management</h3></li>
        <li>
            <a class="side-menu__item" href="{{route('transaction.index')}}"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">List Transaction</span></a>
        </li>
        {{-- <li>
            <a class="side-menu__item" href="/address"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Address</span></a>
        </li> --}}
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon fa fa-money"></i><span class="side-menu__label">Address</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{route('address.index')}}" class="slide-item">Master Address</a></li>
                <li><a href="{{route('collect.index')}}" class="slide-item">Collect Address</a></li>
            </ul>
        </li>
        <?php } ?>
        {{-- <li><h3>Game</h3></li>
        <li>
            <a class="side-menu__item" href="/slide"><i class="side-menu__icon fa fa-sliders"></i><span class="side-menu__label">Slider</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="/trenball"><i class="side-menu__icon fa fa-gamepad"></i><span class="side-menu__label">TrenBall</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="/slot"><i class="side-menu__icon fa fa-gamepad"></i><span class="side-menu__label">Slot</span></a>
        </li>
        <li><h3></h3></li>
        <li>
            <a class="side-menu__item" href="/game"><i class="side-menu__icon fa fa-gamepad"></i><span class="side-menu__label">Game</span></a>
        </li> --}}
</aside>
<!--/APP-SIDEBAR-->