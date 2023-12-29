<?php

use MyApp\Core\Message;

$data = Message::getData();
if ($data) {
  $id = $data['id_tmu'];
}
Message::flash();
?>

<div class="container-fluid">
  <main id="main" class="main">
    <section class="section dashboard">
      <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/home" style="color:#003CF0">Home</a></li>
            <li class="breadcrumb-item active" style="color:black">User</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="pagetitle">
                <h2>Data <?= $title ?></h2>
              </div><!-- End Page Title -->
              <p>Data ini adalah semua data user aplikasi <b>SIAGA</b>.</p>
              <button type="button" onclick="location.href='<?= BASEURL . '/user/insert' ?>'" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M16 19h6" />
                    <path d="M19 16v6" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                  </svg>Add User
              </button>
              <button type="button" onclick="deleteSelected()" class="btn btn-danger delete-selected-btn" style="display: none;">
                <span><i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M4 7l16 0" />
                      <path d="M10 11l0 6" />
                      <path d="M14 11l0 6" />
                      <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                      <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                    </svg></i></span>
                <span class='hide-menu'>Delete Selected</span>
              </button>
              <div class="col-lg-12 d-flex align-items-stretch">
                <div class="table-responsive w-100 p-4">
                  <table id="example" class="stripe" style="width:100%">
                    <thead>
                      <tr>
                        <th></th>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($user as $user) {
                        $no++; ?>
                        <tr>
                          <td><input type="checkbox" class="checkbox" data-id="<?= $user['id_tmu']; ?>"></td>
                          <th scope='row'><?= $no ?></th>
                          <td><?= $user["name_tmu"]; ?></td>
                          <td><?= $user["username_tmu"]; ?></td>
                          <td><?= $user["role_tmu"]; ?></td>
                          <td><?= $user["address_tmu"]; ?></td>
                          <td><?= $user["gender_tmu"]; ?></td>
                          <td>
                            <a href="<?= BASEURL; ?>/user/edit/<?= $user['id_tmu'] ?>" class='btn btn-warning'>
                              <span><i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                  </svg></i></span>
                              <span class='hide-menu'>Edit</span>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
</section>
</main>
</div>
<script>
  function deleteSelected() {
    const checkedCheckboxes = document.querySelectorAll('.checkbox:checked');

    if (checkedCheckboxes.length > 0) {
      const selectedIds = Array.from(checkedCheckboxes).map((checkbox) => checkbox.dataset.id);

      window.location.href = '<?= BASEURL; ?>/user/delete_user/' + selectedIds.join(',');
    } else {
      alert('Pilih setidaknya satu item untuk dihapus.');
    }
  }
</script>