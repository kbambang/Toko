<!-- Left side column. contains the logo and sidebar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
               <img src="{{ asset('images/gg.png') }}" class="img-circle img-profil" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{  Auth::user()->name }} </p>
                <a><i class="bi bi-circle-fill text-success"></i> Online</a> <!-- Status Online -->
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            @if(Auth::user()->role == 'admin')
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="header">MASTER</li>
            <li>
                <a href="{{ route('kasir.index') }}">
                    <i class="bi bi-people-fill"></i> <span>Kasir</span>
                </a>
            </li>
            <li>
                <a href="{{ route('barang.index') }}">
                    <i class="bi bi-box"></i> <span>Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pembayaran.index') }}">
                    <i class="bi bi-credit-card"></i> <span>Pembayaran</span>
                </a>
            </li>
            <li class="header">Transaksi</li>
            <li>
                <a href="{{ route('transaksis.index') }}">
                    <i class="bi bi-wallet2"></i> <span>Transaksi Penjualan</span>
                </a>
            </li>
            <li class="header">Laporan</li>
            <li>
                <a href="{{ route('laporan.pendapatan') }}">
                    <i class="bi bi-file-earmark-text"></i> <span>Laporan</span>
                </a>
            </li>
            <li class="header">Akun</li>
            <li>
                <a href="/logout" class="bi bi-box-arrow-right"> <span>Logout >></span> </a>
            </li>            
            @endif
            @if(Auth::user()->role == 'kasir')
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksis.index') }}">
                    <i class="bi bi-wallet2"></i> <span>Transaksi Penjualan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('barang.index') }}">
                    <i class="bi bi-wallet2"></i> <span>Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksis.index') }}">
                    <i class="bi bi-wallet2"></i> <span>Histori Order</span>
                </a>
            </li>
            <li>
                <a href="/logout" class="bi bi-box-arrow-right"> <span>Logout >></span> </a>
            </li>  
            @endif
            @if(Auth::user()->role == 'owner')
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kasir.index') }}">
                    <i class="bi bi-people-fill"></i> <span>Kasir</span>
                </a>
            </li>
            <li>
                <a href="{{ route('barang.index') }}">
                    <i class="bi bi-wallet2"></i> <span>Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksis.index') }}">
                    <i class="bi bi-wallet2"></i> <span>Histori Order</span>
                </a>
            </li>
            <li>
                <a href="{{ route('laporan.pendapatan') }}">
                    <i class="bi bi-file-earmark-text"></i> <span>Laporan</span>
                </a>
            </li>
            <li>
                <a href="/logout" class="bi bi-box-arrow-right"> <span>Logout >></span> </a>
            </li>  
            @endif
            

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
