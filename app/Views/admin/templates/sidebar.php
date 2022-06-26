<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo bg-primary mt-0">
    <a href="<?= site_url('/admin'); ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
          <i class='bx bxs-face text-white bx-md'></i>
      </span>
      <span class="app-brand-text demo menu-text fw-bolder text-white ms-2">Admin</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Umum</span>
    </li>
    <li class="menu-item <?= (url_is('admin/infographics*') || url_is('admin')) ? 'active':'' ?>">
      <a href="<?= site_url('admin/infographics'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-stats"></i>
        <div data-i18n="Analytics">Infografis</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/list-facilities*') ? 'active':'' ?>">
      <a href="<?= site_url('admin/list-facilities'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-desktop"></i>
        <div data-i18n="Basic">Data Fasilitas</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/lab-category*') ? 'active':'' ?>">
      <a href="<?= site_url('admin/lab-category'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-category-alt"></i>
        <div data-i18n="Basic">Kategori Lab</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/list-labrooms*') ? 'active':'' ?>">
      <a href="<?= site_url('admin/list-labrooms'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-vector"></i>
        <div data-i18n="Basic">Data Labroom</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/list-members*') ? 'active':'' ?>">
      <a href="<?= site_url('admin/list-members'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-group"></i>
        <div data-i18n="Basic">Data Member</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Reservasi</span>
    </li>
    <li class="menu-item <?= url_is('admin/schedule-reservation') ? 'active':'' ?>">
      <a href="<?= site_url('admin/schedule-reservation'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-grid"></i>
        <div data-i18n="Basic">Jadwal Reservasi</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/all-reservations') ? 'active':'' ?>">
      <a href="<?= site_url('admin/all-reservations'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-notepad"></i>
        <div data-i18n="Basic">Semua Reservasi</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/paid-reservations') ? 'active':'' ?>">
      <a href="<?= site_url('admin/paid-reservations'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-dollar-circle"></i>
        <div data-i18n="Basic">Reservasi Berbayar</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('admin/report-reservation*') ? 'active':'' ?>">
      <a href="<?= site_url('admin/report-reservation'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
        <div data-i18n="Basic">Laporan Reservasi</div>
      </a>
    </li>
  </ul>
</aside>