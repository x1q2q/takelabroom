<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo bg-info mt-0">
    <a href="<?= base_url('/member'); ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
          <i class='bx bxs-layout bx-md text-white'></i>
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2 text-white">Member</span>
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
    <li class="menu-item <?= (url_is('member/dashboard*') || url_is('member')) ? 'active':'' ?>">
      <a href="<?= base_url('/member/dashboard'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-alt"></i>
        <div data-i18n="Analytics">Beranda</div>
      </a>
    </li>
    <li class="menu-item <?= url_is('member/my-profile*') ? 'active':'' ?>">
      <a href="<?= base_url('member/my-profile'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-id-card"></i>
        <div data-i18n="Basic">Profil Saya</div>
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
  </ul>
</aside>