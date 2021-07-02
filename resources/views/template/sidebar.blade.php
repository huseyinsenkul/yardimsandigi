<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">

            <a href="index.html" class="logo"><img src="assets/images/logo-dark.png" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('admin.index') }}" class="waves-effect">
                        <i class="dripicons-meter"></i>
                        <span> Anasayfa </span>
                    </a>
                </li>

                <li class="menu-title">Kullanıcı İşlemleri</li>

                <li>
                    <a href="{{ route('admin.users.create') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Kullanıcı Ekle </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.users.index')}}" class="waves-effect">
                        <i class="dripicons-user"></i>
                        <span> Kullanıcı Listesi </span>
                    </a>
                </li>

                <li class="menu-title">Aidat İşlemleri</li>

                <li>
                    <a href="{{ route('admin.revenue.create') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Aidat Tahsilatı </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.revenue.index') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Üye Sorgulama </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.revenue.month') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Aylık Sorgulama </span>
                    </a>
                </li>

                <li class="menu-title">Borç İşlemleri</li>

                <li>
                    <a href="{{ route('admin.debt.index') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Borç İşlemleri </span>
                    </a>
                </li>

                <li class="menu-title">Genel İşlemler</li>

                <li>
                    <a href="{{ route('admin.settings') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Ayarlar </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.backup') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Yedek Al </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.excel.aidat') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Excel Yedeği (Aidat Ödemeleri) </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.excel.borc') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Excel Yedeği (Borçlar) </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.transactions') }}" class="waves-effect">
                        <i class="dripicons-plus"></i>
                        <span> Son İşlemler </span>
                    </a>
                </li>


            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
