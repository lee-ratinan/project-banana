<!doctype html>
<html lang="<?= $locale ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= lang('BananaAdmin.pageInfo.'.$pageSlug.'.description') ?>">
    <meta name="author" content="<?= $siteInfo->siteAuthor ?>">
    <meta property="og:title" content="<?= lang('BananaAdmin.pageInfo.'.$pageSlug.'.title') ?> · <?= $siteInfo->siteName ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?= lang('BananaAdmin.pageInfo.'.$pageSlug.'.description') ?>">
    <!--<meta property="og:image" content="[PAGE_SOCIAL_IMAGE]">-->
    <meta property="og:site_name" content="<?= $siteInfo->siteName ?>">
    <meta name="twitter:site" content="<?= $siteInfo->siteTwitterInfo ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= lang('BananaAdmin.pageInfo.'.$pageSlug.'.title') ?> · <?= $siteInfo->siteName ?>">
    <meta name="twitter:description" content="<?= lang('BananaAdmin.pageInfo.'.$pageSlug.'.description') ?>">
    <!--<meta name="twitter:image" content="[PAGE_SOCIAL_IMAGE]">-->
    <meta property="fb:pages" content="<?= $siteInfo->siteFacebookInfo ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon-32x32.png') ?>">
    <link rel="apple-touch-icon" sizes="96x96" href="<?= base_url('assets/images/favicon-96x96.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/favicon-180x180.png') ?>">
    <link rel="canonical" href="<?= current_url() ?>">
    <title><?= lang('BananaAdmin.pageInfo.'.$pageSlug.'.title') ?> · <?= $siteInfo->siteName ?></title>
    <!-- CSS -->
    <link href="<?= base_url('plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/project-banana/css/admin.min.css') ?>" rel="stylesheet"/>
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?= base_url('admin') ?>"><?= $siteInfo->siteName ?></a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <div class="navbar-nav">
        <div class="nav-item text-nowrap d-none d-md-block">
          <a class="nav-link px-3" href="<?= base_url($locale . '/logout') ?>"><?= lang('BananaAdmin.buttons.signOut') ?></a>
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><?= lang('BananaAdmin.genericTerms.cms') ?></h6>
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link <?= ('dashboard' == $pageSlug ? 'active' : '') ?>" aria-current="page" href="<?= base_url('admin') ?>"><i class="fas fa-home fa-fw"></i> <?= lang('BananaAdmin.pageInfo.dashboard.title') ?></a></li>
              <li class="nav-item"><a class="nav-link <?= ('pages' == $pageSlug ? 'active' : '') ?>" aria-current="page" href="<?= base_url('admin/pages') ?>"><i class="fas fa-file-alt fa-fw"></i> <?= lang('BananaAdmin.pageInfo.pages.title') ?></a></li>
              <li class="nav-item"><a class="nav-link <?= ('blogs' == $pageSlug ? 'active' : '') ?>" aria-current="page" href="<?= base_url('admin/blogs') ?>"><i class="fas fa-pen-square fa-fw"></i> <?= lang('BananaAdmin.pageInfo.blogs.title') ?></a></li>
              <li class="nav-item"><a class="nav-link <?= ('settings' == $pageSlug ? 'active' : '') ?>" aria-current="page" href="<?= base_url('admin/settings') ?>"><i class="fas fa-cogs fa-fw"></i> <?= lang('BananaAdmin.pageInfo.settings.title') ?></a></li>
              <li class="nav-item"><a class="nav-link <?= ('users' == $pageSlug ? 'active' : '') ?>" aria-current="page" href="<?= base_url('admin/users') ?>"><i class="fas fa-users fa-fw"></i> <?= lang('BananaAdmin.pageInfo.users.title') ?></a></li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><?= lang('BananaAdmin.genericTerms.profile') ?></h6>
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link <?= ('profile' == $pageSlug ? 'active' : '') ?>" aria-current="page" href="<?= base_url('admin/profile') ?>"><i class="fas fa-user-circle fa-fw"></i> <?= lang('BananaAdmin.pageInfo.profile.title') ?></a></li>
              <li class="nav-item"><a class="nav-link" href="<?= base_url($locale . '/logout') ?>"><i class="fas fa-sign-out-alt"></i> <?= lang('BananaAdmin.buttons.signOut') ?></a></li>
            </ul>
            <!-- AREA FOR OTHER MENU -->
          </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><?= lang('BananaAdmin.pageInfo.'.$pageSlug.'.title') ?></h1>
          </div>
          <?= $this->renderSection('content') ?>
        </main>
      </div>
    </div>
    <script src="<?= base_url('plugins/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('plugins/fontawesome-free-5.15.4-web/js/all.min.js') ?>"></script>
  </body>
</html>
