<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="<?= base_url('/'); ?>" class="app-brand-link">
              <span class="app-brand-logo demo">
                  <i class='bx bx-book-open bx-md'></i>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">PTIKV2</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="<?= base_url('/dashboard'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Staff</span>
            </li>
            <li class="menu-item">
              <a href="<?= base_url('staff/user'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">Data User</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-group"></i>
                <div data-i18n="Basic">Staff Akademik</div>
              </a>
            </li>
            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Matakuliah</span>
            </li>
            <li class="menu-item">
              <a href="<?= base_url('matakuliah'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Basic">Daftar Matakuliah</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Fasilitas</span>
            </li>
            <li class="menu-item">
              <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-buildings"></i>
                <div data-i18n="Basic">Daftar Fasilitas</div>
              </a>
            </li>

          </ul>
        </aside>