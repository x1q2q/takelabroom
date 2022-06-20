<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?= base_url('/member'); ?>" class="app-brand-link">
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
    <li class="menu-item <?= (url_is('member/dashboard*') || url_is('member')) ? 'active':'' ?>">
      <a href="<?= base_url('/dashboard'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-stats"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Reservasi</span>
    </li>
    <li class="menu-item <?= url_is('member/add-reservation*') ? 'active':'' ?>">
      <a href="<?= base_url('member/add-reservation'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-add-to-queue"></i>
        <div data-i18n="Basic">Ajukan Reservasi</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('member/my-reservation*') ? 'active':'' ?>">
      <a href="<?= base_url('member/my-reservation'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-history"></i>
        <div data-i18n="Basic">Reservasi Saya</div>
      </a>
    </li>
    
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Profile</span>
    </li>
    <li class="menu-item <?= url_is('member/my-profile*') ? 'active':'' ?>">
      <a href="<?= base_url('member/my-profile'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-user-detail"></i>
        <div data-i18n="Basic">Profile Saya</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('member/setting-profile*') ? 'active':'' ?>">
      <a href="<?= base_url('member/setting-profile'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-toggle-left"></i>
        <div data-i18n="Basic">Profile Setting</div>
      </a>
    </li>
  </ul>
</aside>