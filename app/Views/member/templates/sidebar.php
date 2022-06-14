<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?= base_url('/dashboard'); ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
          <i class='bx bxs-layout bx-md'></i>
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">Member</span>
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
        <i class="menu-icon tf-icons bx bx-stats"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Reservasi</span>
    </li>
    <li class="menu-item">
      <a href="<?= base_url('reservasi/add'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-add-to-queue"></i>
        <div data-i18n="Basic">Ajukan Reservasi</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="<?= base_url('reservasi/history'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-history"></i>
        <div data-i18n="Basic">History Reservasi</div>
      </a>
    </li>
    
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Profile</span>
    </li>
    <li class="menu-item">
      <a href="<?= base_url('profile'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-user-detail"></i>
        <div data-i18n="Basic">My Profile</div>
      </a>
    </li>
  </ul>
</aside>