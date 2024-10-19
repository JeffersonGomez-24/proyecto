<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>User<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>User</h1>

    <dl>
      <dt>email</dt>
      <dd><?= esc($user->email)?></dd>

      <dt>First name</dt>
      <dd><?= esc($user->firs_name)?></dd>

      <dl>Created</dl>
      <dd><?= $user->created_at->humanize() ?></dd>
    </dl>
  
<?= form_open("admin/users/" . $users->id . "/toggle-ban") ?>

  <button><?= $users->isBanned() ? "Unban" : "Ban" ?></button>


<?= $this->endSection() ?>