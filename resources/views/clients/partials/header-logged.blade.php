<div class="header">
    <div class="title__top">
        <div class="container title__top-des">
            <h1 class="title__top-heading"><a class="title__top-heading-link" href="{{route('client.showDashboardLogged')}}">Web Dân Trí</a></h1>
            <div class="tittle__search">
                <input type="text" class="tittle__search-input" placeholder="Nhập để tìm kiếm...">
                <a href="">
                    <i class="fa-solid fa-magnifying-glass tittle__search-icon"></i>
                </a>
            </div>
            <ul class="socials-list">
                <li class="socials-item">
                    <a href="" class="socials-item-icon" title="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                </li>
                <li class="socials-item">
                    <a href="" class="socials-item-icon" title="twitter"><i class="fa-brands fa-twitter"></i></i></a>
                </li>
                <li class="socials-item">
                    <a href="" class="socials-item-icon" title="youtube"><i class="fa-brands fa-youtube"></i></i></a>
                </li>
                <li class="socials-item">
                    <a href="" class="socials-item-icon" title="tiktok"><i class="fa-brands fa-tiktok"></i></i></a>
                </li>
            </ul>

            <div class="menu__mobile-btn">
                <i id="menuMobile-Btn"  class="fa-solid fa-bars"></i>
            </div>
        </div>
    </div>
    <div class="title__bottom">
        <div class="container">
            <div class="header__navbar">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="{{route('client.showDashboardLogged')}}" class="header__navbar-link"><i class="fa-solid fa-house"></i></a>
                    </li>
                    @foreach($dataNavBar as $key => $value)
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-link"><span class="navbar-text">{{$value->name}}</span></a>
                        </li>
                    @endforeach
                </ul>
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a id=""  class="header__navbar-link">Xin chào: {{session('sessionUserName')}}</a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="{{route('client.handleLogout')}}" id=""  class="header__navbar-link">Thoát</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
