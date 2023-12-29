#edit

<?php

use MyApp\Core\Message;

$data = Message::getData();

if ($data) {
    $opname['stock_tso'] = $data['stock_tso'];
    $opname['real_tso'] = $data['real_tso'];
    $opname['description_tso'] = $data['description_tso'];
    $opname['time_tso'] = $data['time_tso'];
    $opname['id_tso'] = $data['id_tso'];
}

Message::flash();
?>

<div class="container-fluid">
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pagetitle">
                                <h1><?= $title ?></h1>
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/home">Home</a></li>
                                        <li class="breadcrumb-item active">Stok</li>
                                    </ol>
                                </nav>
                            </div><!-- End Page Title -->
                            <!-- Multi Columns Form -->
                            <form action="<?= BASEURL; ?>/opname/edit_opname" method="POST" class="row g-3" id="form">
                                <input type="hidden" name="id_tso" value="<?= $opname['id_tso'] ?>">
                                <input type="hidden" name="mode" id="mode">

                                <div class="col-md-6">
                                    <label for="id_tmd" class="form-label">Nama Obat</label>
                                    <select id="id_tmd" name="id_tmd" class="form-select" required>
                                        <option selected disabled>Pilih Obat</option>
                                        <?php foreach ($obat as $obatItem) : ?>
                                            <option value="<?= $obatItem['id_tmd']; ?>" <?php if ($opname['id_tmd'] == $obatItem['id_tmd']) echo 'selected'; ?>>
                                                <?= $obatItem['name_tmd']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Input hidden untuk menyimpan nilai id_tmd yang dipilih -->
                                <input type="hidden" name="id_tmd_hidden" id="id_tmd_hidden" value="<?= $opname['id_tmd']; ?>">
                                <div class="col-md-6">
                                    <label for="time_tso" class="form-label">Tanggal</label>
                                    <input type="date" name="time_tso" class="form-control" id="time_tso" value="<?= $opname['time_tso'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="real_tso" class="form-label">Real</label>
                                    <input type="text" name="real_tso" class="form-control" id="real_tso" value="<?= $opname['real_tso'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="description_tso" class="form-label">Deskripsi</label>
                                    <input type="text" name="description_tso" class="form-control" id="description_tso" value="<?= $opname['description_tso'] ?>" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" style="margin-right: 5px;"><a href="<?= BASEURL ?>/opname" style="color:white">
                                            <span><i class="ti ti-arrow-back"></i></span>
                                            <span class='hide-menu'>Back</span>
                                        </a></button>
                                    <button class="btn btn-success save-btn" type="submit" onclick="edit('update')" style="margin-right: 5px;">
                                        <span><i class='ti ti-edit'></i></span>
                                        <span class='hide-menu'>Update</span>
                                    </button>
                                    <button class='btn btn-danger' type="submit" onclick="edit('delete')">
                                        <span>
                                            <i class='ti ti-trash'></i>
                                        </span>
                                        <span class='hide-menu'>Delete</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>