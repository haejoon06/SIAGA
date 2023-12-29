#edit

<?php

use MyApp\Core\Message;

$data = Message::getData();
$stock_tso = "";
$real_tso = "";
$difference_tso = "";
$description_tso = "";
$time_tso = "";

if ($data) {
    $stock_tso = $data['stock_tso'];
    $real_tso = $data['real_tso'];
    $description_tso = $data['description_tso'];
    $time_tso = $data['time_tso'];
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
                            <form action="<?= BASEURL; ?>/opname/insert_opname" method="POST" class="row g-3" id="form">
                                <div class="col-md-6">
                                    <label for="id_tmd" class="form-label">Obat</label>
                                    <select id="id_tmd" name="id_tmd" class="form-select" required>
                                        <option selected disabled>Pilih Obat</option>
                                        <?php foreach ($obat as $obatItem) : ?>
                                            <option value="<?= $obatItem['id_tmd']; ?>"><?= $obatItem['name_tmd']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="time_tso" class="form-label">Tanggal</label>
                                    <input type="date" name="time_tso" class="form-control" id="time_tso" value="<?= $time_tso ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="real_tso" class="form-label">Real</label>
                                    <input type="text" name="real_tso" class="form-control" id="real_tso" value="<?= $real_tso ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="description_tso" class="form-label">Deskripsi</label>
                                    <input type="text" name="description_tso" class="form-control" id="description_tso" value="<?= $description_tso ?>" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="margin-right: 5px;"><a href="<?= BASEURL ?>/opname" style="color:white">Cancel</a></button>
                                    <button class="btn btn-primary save-btn" id="saveButton" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>