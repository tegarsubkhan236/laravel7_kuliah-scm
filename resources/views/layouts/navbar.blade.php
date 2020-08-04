<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">CleaningShareFish</a>
            <a class="navbar-brand hidden" href="./">CSF</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <h3 class="menu-title">Entity</h3>
                @if (Auth::user()->name == 'penjualan')
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Admin Penjualan</a>
                    <ul class="sub-menu children">
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('marketing') }}">Marketing</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('cuci') }}">Jenis Cuci</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('order') }}">Order</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('finish') }}">Order Selesai</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (Auth::user()->name == 'gudang')
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Admin Gudang</a>
                    <ul class="sub-menu children">
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('supplier') }}">Supplier</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('stock') }}">Stock</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('penyaluran') }}">Penyaluran</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('pembelian') }}">Pembelian</a>
                        </li>
                        
                    </ul>
                </li>
                @endif
                @if (Auth::user()->name == 'worker')
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Admin Worker</a>
                    <ul class="sub-menu children"> {{-- dropdown-menu --}}
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('worker') }}">Worker</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('temp_stock') }}">Temporary Stock</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('order_ditampung') }}">Order Ditampung</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('order_dikerjakan') }}">Order Dikerjakan</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (Auth::user()->name == 'owner')
                <h3 class="menu-title">Reports</h3>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Laporan Penjualan</a>
                    <ul class="sub-menu children">
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('finish') }}">Penghasilan</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Laporan Gudang</a>
                    <ul class="sub-menu children">
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('stock') }}">Stock</a>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('pembelian') }}">Pembelian</a>
                        </li>    
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('penyaluran') }}">Penyaluran</a>
                        </li>     
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Laporan Worker</a>
                    <ul class="sub-menu children">
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('order_ditampung') }}">Order Belum Selesai</a>
                        </li>   
                        <li>
                            <i class="fa fa-puzzle-piece"></i><a href="{{ url('order_dikerjakan') }}">Order Selesai</a>
                        </li>      
                    </ul>
                </li>
                @endif

            </ul>
        </div>
    </nav>
</aside>