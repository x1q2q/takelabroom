<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?= site_url('/admin/dashboard'); ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
          <i class='bx bxs-user-pin bx-md'></i>
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-item <?= (url_is('admin/dashboard*') || url_is('admin')) ? 'active':'' ?>">
      <a href="<?= site_url('admin/dashboard'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-stats"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Labroom</span>
    </li>
    <li class="menu-item <?= url_is('admin/fasilitas*') ? 'active':'' ?>"">
      <a href="<?= site_url('admin/fasilitas'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-desktop"></i>
        <div data-i18n="Basic">Fasilitas</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/kategori*') ? 'active':'' ?>"">
      <a href="<?= site_url('admin/kategori'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-category-alt"></i>
        <div data-i18n="Basic">Kategori Lab</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/labroom*') ? 'active':'' ?>"">
      <a href="<?= site_url('admin/labroom'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-vector"></i>
        <div data-i18n="Basic">Data Lab</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">General</span>
    </li>
    <li class="menu-item <?= url_is('admin/reservasi') ? 'active':'' ?>"">
      <a href="<?= site_url('admin/reservasi'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-notepad"></i>
        <div data-i18n="Basic">Reservasi</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/reservasi-order*') ? 'active':'' ?>"">
      <a href="<?= site_url('admin/reservasi-order'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-dollar-circle"></i>
        <div data-i18n="Basic">Reservasi Order</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/daftar-user*') ? 'active':'' ?>"">
      <a href="<?= site_url('admin/daftar-user'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-group"></i>
        <div data-i18n="Basic">Data User</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/laporan*') ? 'active':'' ?>"">
      <a href="<?= site_url('admin/laporan'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
        <div data-i18n="Basic">Laporan</div>
      </a>
    </li>
  </ul>
</aside>