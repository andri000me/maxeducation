<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">

      <div class="pull-left image">
        <!-- <img src="<?= base_url('uploads/images/avatars/'.$user_siswa->avatar) ?>" class="img-circle"> -->
        <?php if (empty($user_siswa->avatar)): ?>
          <img src="<?= base_url('uploads/images/avatars/avatar.jpg') ?>" class="img-circle" alt="User Image">

        <?php else: ?>
          <img src="<?= base_url('uploads/images/avatars/'.$user_siswa->avatar) ?>" class="img-circle" alt="User Image">
        <?php endif ?>
      </div>
      <div class="pull-left info">
        <p><?= $user_siswa->nama_lengkap_siswa ?></p>
        <span class="label label-success"><?= $user->role ?></span>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">KELAS</li>

      <?php foreach ($kelas as $kelas): ?>
        <li class="<?= $kelas->slug == $this->uri->segment(3) ? 'active' : '' ?>">
          <a href="<?= site_url('siswa/kelas/'.$kelas->slug) ?>">
            <i class="fa fa-reorder <?= $kelas->slug == $this->uri->segment(3) ? 'text-green' : '' ?>"></i> <span><?= $kelas->nama_kelas ?></span>
          </a>
        </li>
      <?php endforeach ?>

      <!-- <li class="header">GROUP</li>
      <li>
        <a href="#"><i class="fa fa-plus text-red"></i> <span>Tambah Group</span></a>
      </li> -->
      <!-- <li><a href="#"><i class="fa fa-group text-aqua"></i> <span>Nama Group</span></a></li> -->

    </ul>
  </section>

</aside>