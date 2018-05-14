<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a><i class="fa fa-university"></i> Data Lembaga <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('profil.index') }}">Profil Lembaga</a></li>
                    <li><a href="{{ route('pelayanan.index') }}">Pelayanan Lembaga</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart"></i> Statistik <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Rating Pengguna</a></li>
                    <li><a href="#">Pengunjung Bebas</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-cogs"></i> Setup <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('akun.index') }}"><i class="fa fa-config"></i> Pengaturan Akun</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>