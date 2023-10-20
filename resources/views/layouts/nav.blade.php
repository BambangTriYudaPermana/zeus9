<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="index.html">
            <div><img src="{{asset('assets/images/logo/logo.png')}}" class="header-brand-img desktop-logo" alt="logo" style="float: left;"><span class="text-white" style="font-size: 16pt;">TRON-X</span></div>
            {{-- <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo"> --}}
            {{-- <img src="{{asset('assets/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{asset('assets/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo"> --}}
            {{-- <div><img src="{{asset('assets/images/logo/logo.png')}}" class="header-brand-img light-logo1 float-left" alt="logo"><span>TRON-X</span></div> --}}
            {{-- <img src="{{asset('assets/images/logo/logo.png')}}" class="header-brand-img light-logo1" alt="logo"> --}}
        </a><!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li><h3>Main</h3></li>
        <li class="slide">
            <a class="side-menu__item"  data-bs-toggle="slide" href="/"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
        </li>
        <li><h3>Management</h3></li>
        <li>
            <a class="side-menu__item" href="/transaction"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">List Topup</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="/address"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Address</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon fe fe-globe"></i><span class="side-menu__label">Maps</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="maps1.html" class="slide-item">Leaflet Maps</a></li>
                <li><a href="maps2.html" class="slide-item">Mapel Maps</a></li>
                <li><a href="maps.html" class="slide-item">Vector Maps</a></li>
            </ul>
        </li>
        <li><h3>Game</h3></li>
        <li>
            <a class="side-menu__item" href="/slide"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Slider</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="/trenball"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">TrenBall</span></a>
        </li>
</aside>
<!--/APP-SIDEBAR-->