<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li>
              <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase"></i><span>Inventaris</span></a>
              <ul class="dropdown-menu">
                <li class=""><a class="nav-link" href="{{ route('inventori.index') }}">Data Inventaris</a></li>
                <li><a class="nav-link" href="{{route('jenis.index')}}">Data Jenis Inventaris</a></li>
                <li><a href="/kondisi" class="nav-link"><span>Kondisi</span></a></li>
              </ul>
            </li>
            
            <li><a class="nav-link" href="#"><i class="fas fa-clipboard"></i> <span>Laporan</span></a></li>
            <li><a class="nav-link" href="{{route('peminjaman')}}"><i class="fas fa-th"></i> <span>Peminjaman</span></a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-users"></i> <span>Petugas</span></a></li>
           <li>
              <a href="{{ route('ruang.index') }}" class="nav-link"><i class="fas fa-columns"></i><span>Ruang</span></a>
            </li>
          </ul>

          </aside>
      </div>