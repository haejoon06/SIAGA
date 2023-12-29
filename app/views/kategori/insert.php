<?php
use MyApp\Core\Message;

$data = Message::getData();
$nama = "";
//Tambahkan variabel sesuai dengan kolom pada tabel kategori

if ($data) {
    $nama = $data['nama'];
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
                            <form action="<?= BASEURL; ?>/kategori/insert_kategori" method="POST" class="row g-3" id="form">
                                <input type="hidden" name="id_kategori" id="id_kategori">
                                <!-- Tambahkan input hidden untuk id_kategori jika diperlukan -->
                                <div class="col-md-12">
                                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                    <input type="text" name="nama" class="form-control" id="nama_kategori" value="<?= $nama ?>" required>
                                    <!-- Ganti input name dan id sesuai dengan kolom pada tabel kategori -->
                                </div>
                                <!-- Tambahkan form input sesuai dengan kolom pada tabel kategori -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" style="margin-right: 5px;"><a href="<?= BASEURL ?>/kategori" style="color:white">Cancel</a></button>
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
