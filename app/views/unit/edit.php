Berikut adalah perubahan pada file `views/unit/edit.php` sesuai dengan tabel `unit` pada SQL:

```php
<?php

use MyApp\Core\Message;

$data = Message::getData();
if ($data) {
    $unit['id_tmdu'] = $data['id_tmdu'];
    $unit['name_tmdu'] = $data['name_tmdu'];
    //Tambahkan variabel sesuai dengan kolom pada tabel unit
}

Message::flash();
?>

<div class="container-fluid">
    <main id="main" class="main">
        <section class="section dashboard">

            <div class="row">

                <!-- Start Ngoding Disini -->

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
                            <form action="<?= BASEURL; ?>/unit/edit_unit" method="POST" class="row g-3" id="form">
                                <input type="hidden" name="id_tmdu" value="<?= $unit['id_tmdu'] ?>">
                                <input type="hidden" name="mode" id="mode" value="update">

                                <div class="col-md-12">
                                    <label for="name_tmdu" class="form-label">Nama unit</label>
                                    <input type="text" name="name_tmdu" class="form-control" id="name_tmdu" value="<?= $unit['name_tmdu'] ?>" required>
                                    <!-- Ganti input name dan id sesuai dengan kolom pada tabel unit -->
                                </div>
                                <!-- Tambahkan form input sesuai dengan kolom pada tabel unit -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" style="margin-right: 5px;"><a href="<?= BASEURL ?>/unit" style="color:white">
                                            <span><i class="ti ti-arrow-back"></i></span>
                                            <span class='hide-menu'>Back</span>
                                        </a></button>
                                    <button class="btn btn-success save-btn" type="submit" style="margin-right: 5px;">
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
                            </form><!-- End Multi Columns Form -->
                        </div>
                    </div>
                </div>
            </div><!-- End Modal Dialog Scrollable-->
        </section>
    </main>
</div>