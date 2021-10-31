<?= $this->extend('_layout_public') ?>
<?= $this->section('content') ?>
  <div class="row">
    <div class="col">
      <p>LOGIN</p>
      <?php if ($siteInfo->userAllowPublicRegistration) : ?>
        <p>SIGN UP FORM</p>
      <?php endif; ?>
    </div>
  </div>
<?= $this->endSection() ?>