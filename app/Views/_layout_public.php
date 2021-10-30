<!doctype html>
<html lang="<?= $locale ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= @$pageDescription ?>">
    <meta name="author" content="<?= $siteInfo->siteAuthor ?>">
    <meta property="og:title" content="<?= @$pageTitle ?> · <?= $siteInfo->siteName ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="<?= @$pageDescription ?>">
    <!--<meta property="og:image" content="[PAGE_SOCIAL_IMAGE]">-->
    <meta property="og:site_name" content="<?= $siteInfo->siteName ?>">
    <meta name="twitter:site" content="<?= $siteInfo->siteTwitterInfo ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= @$pageTitle ?> · <?= $siteInfo->siteName ?>">
    <meta name="twitter:description" content="<?= @$pageDescription ?>">
    <!--<meta name="twitter:image" content="[PAGE_SOCIAL_IMAGE]">-->
    <meta property="fb:pages" content="<?= $siteInfo->siteFacebookInfo ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon-32x32.png') ?>">
    <link rel="apple-touch-icon" sizes="96x96" href="<?= base_url('assets/images/favicon-96x96.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/favicon-180x180.png') ?>">
    <link rel="canonical" href="<?= current_url() ?>">
    <title><?= @$pageTitle ?> · <?= $siteInfo->siteName ?></title>
    <!-- CSS -->
    <link href="<?= base_url('plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css') ?>" rel="stylesheet"/>
    <!--<link href="<?= base_url('assets/project-banana/css/admin.min.css') ?>" rel="stylesheet"/>-->
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark mb-5">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Fixed navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <main class="container mt-5 py-5">
        <?= $this->renderSection('content') ?>
    </main>
    <script src="<?= base_url('plugins/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('plugins/fontawesome-free-5.15.4-web/js/all.min.js') ?>"></script>
  </body>
</html>
