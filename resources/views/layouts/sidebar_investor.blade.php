      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(auth()->user()->foto)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/investor/admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/investor/mitra" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mitra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/investor/user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/investor/anggota" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/investor/ukm" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    UKM
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
          </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/investor/pesanan" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Pesanan
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/investor/peta" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Peta
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/investor/pesanan_selesai" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Selesaikan Pesanan
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/investor/kategori" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Kategori Produk
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/investor/produk" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Produk
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/investor/ongkir" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Ongkos Kirim
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/investor/banner" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
               Banner
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/investor/komponenharga" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Komponen Harga
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/investor/berita" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Berita
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="/admin/profil" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Profil
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="/investor/logout" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Keluar
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->