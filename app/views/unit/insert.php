<?php
use MyApp\Core\Message;

$data = Message::getData();
$nama = "";
//Tambahkan variabel sesuai dengan kolom pada tabel kategori

if ($data) {
    $nama = $data['name_tmdu'];
    //Tambahkan inisialisasi variabel sesuai dengan data yang akan diubah
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
                                        <li class="breadcrumb-item active">Master Data</li>
                                    </ol>
                                </nav>
                            </div><!-- End Page Title -->
                            <!-- Multi Columns Form -->
                            <form action="<?= BASEURL; ?>/unit/insert_unit" method="POST" class="row g-3" id="form">
                                <input type="hidden" name="id_tmdu" id="id_tmdu">
                                <div class="col-md-12">
                                    <label for="name_tmdu" class="form-label">Nama Jenis</label>
                                    <input type="text" name="nama" class="form-control" id="name_tmdu" value="<?= $nama ?>" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" style="margin-right: 5px;"><a href="<?= BASEURL ?>/unit" style="color:white">Cancel</a></button>
                                    <button class="btn btn-primary save-btn" id="saveButton" type="submit">Save</button>
                                </div>
                            </form><!-- End Multi Columns Form -->
                        </div>
                    </div>
                </div>
            </div><!-- End Modal Dialog Scrollable-->
        </section>
    </main>
</div>
